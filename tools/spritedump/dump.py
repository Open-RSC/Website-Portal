import re, json, sys

if len(sys.argv) != 3:
    print(f'Usage: {sys.argv[0]} <EntityHandler.java> <output.json>', file=sys.stderr)
    sys.exit(1)

with open(sys.argv[1]) as f:
    text = f.read()

lines = [l.strip() for l in text.split('\n') if 'items.add(new ItemDef' in l]

items = []
for line in lines:
    m = re.search(r'new ItemDef\((.+)\)\)', line)
    if not m:
        continue
    args_str = m.group(1)
    # Split on commas respecting strings and parens
    args = []
    current = ''
    in_str = False
    depth = 0
    for ch in args_str:
        if ch == '"':
            in_str = not in_str
        if not in_str:
            if ch == '(':
                depth += 1
            elif ch == ')':
                depth -= 1
        if ch == ',' and not in_str and depth == 0:
            args.append(current.strip())
            current = ''
        else:
            current += ch
    args.append(current.strip())

    id_val = args[-1].strip()
    try:
        id_val = int(id_val)
    except:
        continue

    # Get spriteLocation (6th arg, index 5) - handle ternary expressions
    sprite_loc_raw = args[5].strip()
    # If it contains a ternary, extract the custom sprites branch (first string)
    if '?' in sprite_loc_raw:
        # Extract first quoted string as the custom sprite location
        strings_in_expr = re.findall(r'"([^"]*)"', sprite_loc_raw)
        if strings_in_expr:
            sprite_loc = strings_in_expr[0]
        else:
            sprite_loc = sprite_loc_raw.strip('"')
    else:
        sprite_loc = sprite_loc_raw.strip('"')

    # pictureMask is index 9
    try:
        pm = int(args[9].strip())
    except:
        pm = 0

    # blueMask present if >14 args
    bm = 0
    if len(args) > 14:
        try:
            bm = int(args[10].strip())
        except:
            bm = 0

    name = args[0].strip().strip('"')
    items.append({
        'id': id_val,
        'name': name,
        'sprite': sprite_loc,
        'mask': pm,
        'blue': bm,
    })

with open(sys.argv[2], 'w') as f:
    json.dump(items, f, separators=(',', ':'))
print(f'Written {len(items)} item defs')

# Verify all sprite locations are clean
issues = 0
for item in items:
    if '?' in item['sprite'] or 'Config' in item['sprite']:
        print(f"  BAD: {item['id']} {item['name']}: {item['sprite']}")
        issues += 1
print(f'{issues} items with bad sprite locations')