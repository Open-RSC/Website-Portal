#!/usr/bin/env python3
"""
decode_filter.py - decode the OpenRSC mudclient-177 web-client chat filter
(filter3.jag) into human-editable text files. Its companion is encode_filter.py.

QUICK START
-----------
    cd .../Website-Portal/tools/badwords
    python3 decode_filter.py          # filter3.jag -> the 4 .txt files below
    # ...edit badwords.txt (add/remove words)...
    python3 encode_filter.py          # .txt files -> filter3.jag (backs up .bak)

    python3 decode_filter.py other.jag   # decode a specific archive instead

    These scripts live in tools/badwords/ and read/write the client cache at
    ../../portal/public/client/cache/ (that is where filter3.jag[.bak] live).
    The .txt / .rot13.txt files are written next to the scripts (tools/badwords/).

    # To VERSION the censor list in git as diffable-but-obfuscated text, run
    #   python3 generate_rot13_filter.py           # the 4 .txt -> the 4 .rot13.txt
    # AFTER decoding (encode_filter.py also refreshes them automatically). So the
    # jag -> rot13 path is two steps: decode_filter.py, then generate_rot13_filter.py.
    # The reverse,
    #   python3 generate_rot13_filter.py --decode   # the 4 .rot13.txt -> the 4 .txt
    # restores plaintext from the committed rot13 without needing the jag.
    # Note: generate_rot13_filter.py never reads filter3.jag itself.

OUTPUT FILES (written next to the script)
-----------------------------------------
    badwords.txt       censored words - THIS is what you normally edit
    goodfragments.txt  <=3-char allow-list fragments that stop false positives
    hosts.txt          URL host words (rarely edited)
    tlds.txt           top-level-domain rules (rarely edited)

badwords.txt FORMAT
-------------------
    one word per line, lowercase a-z 0-9 '
    * a word ALONE        -> censored anywhere it appears (partial/substring),
                             matching the server's substring behaviour.
    * word <TAB> pairs    -> boundary exceptions: contexts where it is NOT
                             censored (advanced). "pairs" are space-separated
                             "before-after" decimal char-class bytes, e.g.
                                 anal   3-19 3-27 15-25 27-15 27-25
                             Char classes: 1-26=a..z, 27=word boundary/sep,
                             28=apostrophe, 29-38=0..9, 0=none. Leave a word's
                             pairs alone unless you understand method_427.
    '#' comment lines and blank lines are ignored.

WHAT THIS DOES / DOESN'T TOUCH  (important)
-------------------------------------------
* This is the browser CLIENT filter for mudclient 177 (served at /client).
  It is loaded at runtime from cache/filter3.jag by WordFilter.loadFilters, so
  editing the jag is all that's needed - no TeaVM/classes.js rebuild.
* The OTHER web client, /client2, does NOT use filter3.jag. Its censor list is
  plaintext String arrays (censoredWords1/2/3) compiled into client2's
  teavm/classes.js and must be edited there directly. These scripts don't touch it.
* The desktop/server filters are also separate:
      server/badwords.txt                  (modern MessageFilter, substring)
      server/conf/server/badwordsJag.txt   (retro 115 protocol, rot13)
      server/goodwords.txt / wordsJag.txt  (server allow-lists)
* THREE allow-list mechanisms exist in client 177, and they are different:
      badword <TAB> pairs (badwords.txt) = boundary exceptions. The usual way to
          stop a substring badword censoring a real word: list the (before,after)
          char-class pairs of the legit contexts and method_427 skips censoring
          there. e.g. "bish" carries pairs for rubbish/bishop/archbishop. This is
          editable right here in badwords.txt - prefer it.
      goodfragments.txt (this file)  = fragmentsenc, <=3-char fragment HASHES.
          Full words (>3 chars) canNOT go here - they hash out of range.
      WordFilter.goodWords array     = FULL-WORD restore list (e.g. "virginia",
          "virginian"). It lives in teavm/classes.js (function O8, the
          WordFilter clinit) + teavm/src/mudclient/WordFilter.java, NOT here.
          Only needed when the boundary pairs cannot express the context.

FILE FORMAT (for future maintainers)
------------------------------------
    filter3.jag = [3B uncSize][3B compSize][body]
        if uncSize != compSize, body is headerless bzip2 (the 'BZh1' magic is
        stripped; this decoder puts it back). encode_filter.py always writes an
        UNCOMPRESSED archive (uncSize==compSize) which the client reads the same.
    body = [u16 fileCount][ fileCount * (4B nameHash, 3B uncLen, 3B compLen) ]
           [ concatenated file data ]   (each file raw when uncLen==compLen)
    nameHash: h = h*61 + (ord(upper(c)) - 32)   over the entry name.
    badenc/hostenc entry = [i32 count] then per word
        [u8 len][len chars][i32 pairCount][pairCount * (u8,u8)]
    fragmentsenc entry   = [i32 count] then count * [u16 word2hash]
    tldlist entry        = [i32 count] then per entry [u8 type][u8 len][chars]
    word2hash (base-38): iterate chars from the END, h = h*38 + code,
        a-z=1..26, '=27, 0-9=28..37; returns 0 for >6 chars / other chars.
    A stored fragment hash of 0 is dead (WordFilter.method_440 short-circuits on
    all-digit/nul fragments, and any lettered fragment hashes to >=1), so it is
    dropped on decode; round-trips are stable (idempotent) after the first pass.

NOTE: these scripts used to live under public/ (web-servable); they now live in
tools/badwords/, outside the web root, and reach the jag via a relative path
(CACHE_DIR below). Nothing here is secret (it is a censor list) either way.
"""
import bz2, sys, os

# tools/badwords/ holds the scripts + .txt/.rot13.txt; the jag it decodes lives
# in the client cache two directories up. Resolve both relative to this script
# so it works no matter what the current working directory is.
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
CACHE_DIR = os.path.normpath(os.path.join(SCRIPT_DIR, '..', '..', 'portal', 'public', 'client', 'cache'))

# ---------- byte helpers ----------
def u16(b, o): return (b[o] << 8) | b[o + 1]
def i24(b, o): return (b[o] << 16) | (b[o + 1] << 8) | b[o + 2]
def i32(b, o): return (b[o] << 24) | (b[o + 1] << 16) | (b[o + 2] << 8) | b[o + 3]

def name_hash(name):
    h = 0
    for c in name.upper():
        h = (h * 61 + ord(c) - 32) & 0xFFFFFFFF
    return h

def bunzip(data):
    # RSC/Jagex strip the 4-byte "BZh1" bzip2 magic; put it back.
    return bz2.decompress(b'BZh1' + bytes(data))

def unhash(h):
    # inverse of WordFilter.word2hash (base-38: a-z=1..26, '=27, 0-9=28..37)
    out = []
    while h > 0:
        r = h % 38; h //= 38
        if 1 <= r <= 26:  out.append(chr(r - 1 + 97))
        elif r == 27:     out.append("'")
        elif 28 <= r <= 37: out.append(chr(r - 28 + 48))
        else:             out.append('?')
    return ''.join(out)


# ---------- archive ----------
def unpack_jag(raw):
    unc, comp = i24(raw, 0), i24(raw, 3)
    body = raw[6:6 + comp]
    if unc != comp:
        body = bunzip(body)
    if len(body) != unc:
        raise ValueError("archive size mismatch")
    count = u16(body, 0)
    entries, off = [], 2 + count * 10
    for i in range(count):
        base = 2 + i * 10
        ulen, clen = i24(body, base + 4), i24(body, base + 7)
        chunk = body[off:off + clen]
        data = bunzip(chunk) if ulen != clen else bytes(chunk)
        entries.append({'hash': i32(body, base), 'data': data})
        off += clen
    return entries

# ---------- entry decoders ----------
def parse_words(data):
    # badenc / hostenc: [i32 count] then per word [u8 len][chars][i32 npairs][pairs]
    words, n, o = [], i32(data, 0), 4
    for _ in range(n):
        wlen = data[o]; o += 1
        w = bytes(data[o:o + wlen]).decode('latin1'); o += wlen
        npairs = i32(data, o); o += 4
        pairs = []
        for _ in range(npairs):
            pairs.append((data[o], data[o + 1])); o += 2
        words.append((w, pairs))
    return words

def parse_frags(data):
    n = i32(data, 0)
    return [u16(data, 4 + i * 2) for i in range(n)]

def parse_tlds(data):
    # tldlist: [i32 count] then per entry [u8 type][u8 len][chars]
    out, n, o = [], i32(data, 0), 4
    for _ in range(n):
        t = data[o]; o += 1
        ln = data[o]; o += 1
        w = bytes(data[o:o + ln]).decode('latin1'); o += ln
        out.append((t, w))
    return out

def fmt_pairs(pairs):
    # lossless: each pair is two decimal char-class bytes "before-after"
    return ' '.join(f'{a}-{b}' for a, b in pairs)

# ---------- main ----------
def main():
    jag = sys.argv[1] if len(sys.argv) > 1 else os.path.join(CACHE_DIR, 'filter3.jag')
    if not os.path.exists(jag):
        sys.exit(f"error: {jag} not found")
    entries = unpack_jag(open(jag, 'rb').read())
    by = {}
    for name in ('badenc.txt', 'fragmentsenc.txt', 'hostenc.txt', 'tldlist.txt'):
        h = name_hash(name)
        e = next((x for x in entries if x['hash'] == h), None)
        if e is None:
            sys.exit(f"error: {name} missing from {jag}")
        by[name] = e['data']

    # badwords.txt
    bad = parse_words(by['badenc.txt'])
    with open(os.path.join(SCRIPT_DIR, 'badwords.txt'), 'w') as f:
        f.write("# Client 177 bad words. One per line, lowercase a-z 0-9 '.\n"
                "# A word alone = censored anywhere (partial match).\n"
                "# word <TAB> pairs = boundary exceptions where it is NOT censored (advanced).\n"
                "#   each pair is 'before-after' decimal char-class bytes, space separated,\n"
                "#   e.g. 't erection' -> 20-27. Leave a word's pairs as-is unless you know them.\n"
                "# Lines starting with # and blank lines are ignored.\n")
        for w, pairs in bad:
            f.write(w + ("\t" + fmt_pairs(pairs) if pairs else "") + "\n")

    # goodfragments.txt
    frags = parse_frags(by['fragmentsenc.txt'])
    with open(os.path.join(SCRIPT_DIR, 'goodfragments.txt'), 'w') as f:
        f.write("# Allow-listed <=3 char fragments that stop false positives.\n"
                "# One fragment per line. Full words (>3 chars) do NOT belong here.\n"
                "# Lines starting with # and blank lines are ignored.\n")
        written = 0
        for h in frags:
            if h == 0:
                continue   # dead/degenerate entry (never matched by method_440); dropped
            f.write(unhash(h) + "\n")
            written += 1

    # hosts.txt
    hosts = parse_words(by['hostenc.txt'])
    with open(os.path.join(SCRIPT_DIR, 'hosts.txt'), 'w') as f:
        f.write("# URL host words (same format as badwords.txt). Rarely edited.\n")
        for w, pairs in hosts:
            f.write(w + ("\t" + fmt_pairs(pairs) if pairs else "") + "\n")

    # tlds.txt
    tlds = parse_tlds(by['tldlist.txt'])
    with open(os.path.join(SCRIPT_DIR, 'tlds.txt'), 'w') as f:
        f.write("# Top-level-domain rules: <type> <TAB> <text>. type is 1, 2 or 3. Rarely edited.\n")
        for t, w in tlds:
            f.write(f"{t}\t{w}\n")

    print(f"decoded {jag}:")
    print(f"  badwords.txt       {len(bad)} words")
    print(f"  goodfragments.txt  {written} fragments")
    print(f"  hosts.txt          {len(hosts)} hosts")
    print(f"  tlds.txt           {len(tlds)} tld rules")
    print("edit any of these, then run: python3 encode_filter.py")

if __name__ == '__main__':
    main()
