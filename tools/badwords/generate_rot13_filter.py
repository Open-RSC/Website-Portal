#!/usr/bin/env python3
"""
generate_rot13_filter.py - write rot13 copies of the client 177 filter text
files so the censor list can be VERSIONED in git as diffable text WITHOUT the
actual words being human-readable at a glance. Companion to decode_filter.py /
encode_filter.py.

    cd .../Website-Portal/tools/badwords
    python3 decode_filter.py            # filter3.jag -> the 4 plaintext .txt
    python3 generate_rot13_filter.py    # the 4 .txt   -> the 4 .rot13.txt
    # commit the .rot13.txt files (and the regenerated filter3.jag)
    # (the plaintext .txt stay gitignored - see .gitignore)

    python3 generate_rot13_filter.py --decode   # reverse: .rot13.txt -> .txt

encode_filter.py imports generate() and runs it automatically right after it
rebuilds the jag (unless you pass encode --no-rot13), so the .rot13.txt copies
stay in sync with every encode - you normally do not need to run this by hand.

WHY rot13 (and why it is NOT security): rot13 is a trivially reversible letter
rotation. The only goal is that badwords.rot13.txt etc. do not show slurs in
plaintext to someone casually browsing the repo / git blame / code search, while
staying line-by-line diffable. It is obfuscation for readability, not encryption.

Only ASCII letters are rotated; digits, apostrophes, tabs, the numeric
boundary-pairs and '#' comment lines pass through unchanged, so the files stay
structurally identical and round-trip byte-for-byte. rot13 is its own inverse,
so the same transform both generates and (with --decode) restores. See
decode_filter.py for the filter format and the badwords.txt syntax.
"""
import sys, os

# All filter text files live next to this script (tools/badwords/), so resolve
# them relative to the script rather than the current working directory.
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))

# The 4 plaintext files decode_filter.py produces, and their rot13 companions.
PLAIN = ['badwords.txt', 'goodfragments.txt', 'hosts.txt', 'tlds.txt']
def rot13_name(name): return name[:-len('.txt')] + '.rot13.txt'  # foo.txt -> foo.rot13.txt
def _path(name): return os.path.join(SCRIPT_DIR, name)

def rot13_bytes(data):
    # rotate ASCII letters only; leaves digits/'/tabs/newlines/# etc. untouched.
    # operates on raw bytes so it is encoding- and newline-agnostic and exact.
    out = bytearray(data)
    for i, b in enumerate(out):
        if 65 <= b <= 90:     out[i] = (b - 65 + 13) % 26 + 65   # A-Z
        elif 97 <= b <= 122:  out[i] = (b - 97 + 13) % 26 + 97   # a-z
    return bytes(out)

def _convert(src, dst):
    with open(src, 'rb') as f:
        data = f.read()
    with open(dst, 'wb') as f:
        f.write(rot13_bytes(data))

def generate(quiet=False):
    # forward: plaintext .txt -> .rot13.txt (also called by encode_filter.py)
    written = []
    for name in PLAIN:
        if not os.path.exists(_path(name)):
            sys.exit(f"error: {name} not found (run decode_filter.py first)")
        _convert(_path(name), _path(rot13_name(name)))
        written.append(rot13_name(name))
    if not quiet:
        print("wrote rot13 filter copies: " + ", ".join(written))
    return written

def restore(quiet=False):
    # reverse: .rot13.txt -> plaintext .txt (rot13 is its own inverse)
    written = []
    for name in PLAIN:
        src = rot13_name(name)
        if not os.path.exists(_path(src)):
            sys.exit(f"error: {src} not found")
        _convert(_path(src), _path(name))
        written.append(name)
    if not quiet:
        print("restored plaintext filter files: " + ", ".join(written))
    return written

def main():
    if '--decode' in sys.argv[1:] or '-d' in sys.argv[1:]:
        restore()
    else:
        generate()

if __name__ == '__main__':
    main()
