#!/usr/bin/env python3
"""
encode_filter.py - rebuild the OpenRSC mudclient-177 web-client chat filter
(filter2.jag) from the text files produced by decode_filter.py.

    cd .../Website-Portal/tools/badwords
    python3 decode_filter.py       # first, to produce the .txt files
    # ...edit badwords.txt...
    python3 encode_filter.py       # writes the client cache filter2.jag (backs up .bak once)
    python3 encode_filter.py -o out.jag    # or write to a specific path
    python3 encode_filter.py --no-rot13    # skip refreshing the .rot13.txt copies

Reads badwords.txt, goodfragments.txt, hosts.txt, tlds.txt from next to this
script (tools/badwords/); all four required, run decode_filter.py first if any
are missing. Writes filter2.jag into ../../portal/public/client/cache/ (the
client cache). See decode_filter.py's header for the full format reference, the
badwords.txt syntax, and the important caveats (this only affects /client 177,
NOT /client2; to stop a substring badword censoring a real word, prefer the
badword's boundary pairs in badwords.txt - full-word WordFilter.goodWords in
classes.js is only for contexts the pairs cannot express).

Behaviour:
* Rebuilds filter2.jag as an UNCOMPRESSED archive (uncSize==compSize). The
  client reads it identically to the original bzip2 one; the file is just a bit
  larger. No TeaVM/classes.js rebuild is needed - the client loads this jag at
  runtime.
* Backs up an existing filter2.jag to filter2.jag.bak the first time only.
* fragmentsenc hashes are sorted + de-duplicated (the client binary-searches
  them). Each badword's boundary-pairs are written back in file order, so keep
  them sorted by (before,after) if you hand-edit them. decode->encode is
  idempotent (byte-stable) after the first pass.
* Fragments >3 chars / with invalid chars can't be represented (they hash out
  of the u16 range) and are skipped with a printed note.
* Runs a self-check that decodes its own output and confirms all four entries.
* After writing the jag it refreshes the rot13 versioning copies (the four
  .rot13.txt files) via generate_rot13_filter.py, so the diffable-but-obfuscated
  text committed to git stays in sync with the jag. Pass --no-rot13 to skip that.
"""
import sys, os, shutil

# tools/badwords/ holds the scripts + .txt/.rot13.txt; the jag we (re)write lives
# in the client cache two directories up. Resolve both relative to this script so
# it works regardless of the current working directory.
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
CACHE_DIR = os.path.normpath(os.path.join(SCRIPT_DIR, '..', '..', 'portal', 'public', 'client', 'cache'))

# ---------- byte helpers ----------
def u16(b, o): return (b[o] << 8) | b[o + 1]
def i24(b, o): return (b[o] << 16) | (b[o + 1] << 8) | b[o + 2]
def i32(b, o): return (b[o] << 24) | (b[o + 1] << 16) | (b[o + 2] << 8) | b[o + 3]
def p16(v): return bytes([(v >> 8) & 255, v & 255])
def p24(v): return bytes([(v >> 16) & 255, (v >> 8) & 255, v & 255])
def p32(v): return bytes([(v >> 24) & 255, (v >> 16) & 255, (v >> 8) & 255, v & 255])

def name_hash(name):
    h = 0
    for c in name.upper():
        h = (h * 61 + ord(c) - 32) & 0xFFFFFFFF
    return h

def word2hash(w):
    # WordFilter.word2hash (base-38); returns 0 for >6 chars or invalid chars
    if len(w) > 6:
        return 0
    h = 0
    for i in range(len(w)):
        c = w[len(w) - 1 - i]
        if 'a' <= c <= 'z':   h = h * 38 + (ord(c) - 97 + 1)
        elif c == "'":        h = h * 38 + 27
        elif '0' <= c <= '9': h = h * 38 + (ord(c) - 48 + 28)
        else:                 return 0
    return h

# ---------- read text files ----------
def read_lines(path):
    if not os.path.exists(path):
        sys.exit(f"error: {path} not found (run decode_filter.py first)")
    out = []
    for raw in open(path, encoding='latin1'):
        line = raw.rstrip('\n').rstrip('\r')
        if not line.strip() or line.lstrip().startswith('#'):
            continue
        out.append(line)
    return out

def read_words(path):
    words = []
    for line in read_lines(path):
        if '\t' in line:
            w, spec = line.split('\t', 1)
            pairs = []
            for tok in spec.split():
                try:
                    a, b = tok.split('-')
                    pairs.append((int(a) & 255, int(b) & 255))
                except ValueError:
                    sys.exit(f"error in {path}: bad pair {tok!r} (want 'before-after') on: {line}")
            words.append((w.lower(), pairs))
        else:
            words.append((line.lower(), []))
    return words

# ---------- build entry binaries ----------
def build_words(words):
    out = bytearray(p32(len(words)))
    for w, pairs in words:
        wb = w.encode('latin1')
        out.append(len(wb)); out += wb
        out += p32(len(pairs))
        for a, b in pairs:
            out += bytes([a & 255, b & 255])
    return bytes(out)

def build_frags(path):
    seen, skipped = set(), []
    for frag in read_lines(path):
        h = word2hash(frag.lower())
        if h == 0 or h > 0xFFFF:
            skipped.append(frag)
            continue
        seen.add(h)
    if skipped:
        print(f"  note: skipped {len(skipped)} fragment(s) that are >3 chars / invalid: {skipped[:10]}"
              + (" ..." if len(skipped) > 10 else ""))
    vals = sorted(seen)  # field_999 is binary-searched -> must be sorted
    out = bytearray(p32(len(vals)))
    for v in vals:
        out += p16(v)
    return bytes(out), len(vals)

def build_tlds(path):
    out_entries = []
    for line in read_lines(path):
        if '\t' not in line:
            sys.exit(f"error in {path}: expected '<type><TAB><text>' on: {line}")
        t, w = line.split('\t', 1)
        out_entries.append((int(t), w))
    out = bytearray(p32(len(out_entries)))
    for t, w in out_entries:
        wb = w.encode('latin1')
        out += bytes([t & 255, len(wb) & 255]) + wb
    return bytes(out), len(out_entries)

# ---------- pack (uncompressed archive) ----------
def pack_jag(named_entries):
    count = len(named_entries)
    headers = bytearray(p16(count))
    data = bytearray()
    for name, blob in named_entries:
        headers += p32(name_hash(name)) + p24(len(blob)) + p24(len(blob))  # uncompressed
        data += blob
    body = bytes(headers) + bytes(data)
    return p24(len(body)) + p24(len(body)) + body

# ---------- self check ----------
def selfcheck(raw):
    unc, comp = i24(raw, 0), i24(raw, 3)
    body = raw[6:6 + comp]
    assert unc == comp and len(body) == unc, "bad outer header"
    count = u16(body, 0); off = 2 + count * 10
    found = {}
    for i in range(count):
        base = 2 + i * 10
        ulen, clen = i24(body, base + 4), i24(body, base + 7)
        assert ulen == clen, "entry should be stored uncompressed"
        found[i32(body, base)] = body[off:off + clen]
        off += clen
    for name in ('badenc.txt', 'fragmentsenc.txt', 'hostenc.txt', 'tldlist.txt'):
        assert name_hash(name) in found, f"{name} missing after pack"
    return found

def main():
    out = os.path.join(CACHE_DIR, 'filter2.jag')
    if '-o' in sys.argv:
        out = sys.argv[sys.argv.index('-o') + 1]

    bad = read_words(os.path.join(SCRIPT_DIR, 'badwords.txt'))
    hosts = read_words(os.path.join(SCRIPT_DIR, 'hosts.txt'))
    frag_blob, nfrag = build_frags(os.path.join(SCRIPT_DIR, 'goodfragments.txt'))
    tld_blob, ntld = build_tlds(os.path.join(SCRIPT_DIR, 'tlds.txt'))

    named = [
        ('fragmentsenc.txt', frag_blob),
        ('badenc.txt', build_words(bad)),
        ('hostenc.txt', build_words(hosts)),
        ('tldlist.txt', tld_blob),
    ]
    raw = pack_jag(named)
    selfcheck(raw)

    if os.path.exists(out) and not os.path.exists(out + '.bak'):
        shutil.copy2(out, out + '.bak')
        print(f"  backed up existing {out} -> {out}.bak")
    open(out, 'wb').write(raw)

    print(f"wrote {out} ({len(raw)} bytes, uncompressed):")
    print(f"  badwords.txt       {len(bad)} words")
    print(f"  goodfragments.txt  {nfrag} fragments")
    print(f"  hosts.txt          {len(hosts)} hosts")
    print(f"  tlds.txt           {ntld} tld rules")

    # refresh the rot13 versioning copies from the same .txt we just packed, so
    # the diffable-but-obfuscated text committed to git can never drift from the
    # jag (pass --no-rot13 to skip; both derive from the same .txt this run).
    if '--no-rot13' not in sys.argv:
        try:
            if SCRIPT_DIR not in sys.path:
                sys.path.insert(0, SCRIPT_DIR)  # import the companion regardless of CWD
            import generate_rot13_filter
            generate_rot13_filter.generate()
        except Exception as e:
            print(f"  warning: could not refresh rot13 copies ({e}); "
                  "run generate_rot13_filter.py manually before committing")

if __name__ == '__main__':
    main()
