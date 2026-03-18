// Command spritedump extracts item sprites from a Custom_Sprites.osar archive
// and outputs them as PNG files. It applies the color masking (pictureMask and
// blueMask) that the OpenRSC client uses when rendering items. It also generates
// note variants (note background + scaled item) for noteable items.
package main

import (
	"bytes"
	"compress/gzip"
	_ "embed"
	"encoding/binary"
	"encoding/json"
	"flag"
	"fmt"
	"image"
	"image/color"
	"image/draw"
	"image/png"
	"io"
	"log"
	"os"
	"path/filepath"
	"strings"
)

const UseShift = true

//go:embed itemdefs.json
var itemDefsJSON []byte

type itemDef struct {
	ID     int    `json:"id"`
	Name   string `json:"name"`
	Sprite string `json:"sprite"`
	Mask   int    `json:"mask"`
	Blue   int    `json:"blue"`
}

type frame struct {
	Width       int
	Height      int
	UseShift    bool
	OffsetX     int
	OffsetY     int
	BoundWidth  int
	BoundHeight int
	Pixels      []int
}

type entry struct {
	Name   string
	Frames []*frame
}

type subspace struct {
	Name    string
	Entries []*entry
}

func main() {
	log.SetFlags(0)

	notes := flag.Bool("notes", false, "also generate note variants for each item")
	flag.Parse()

	if flag.NArg() < 2 {
		fmt.Fprintf(os.Stderr, "Usage: spritedump [flags] <Custom_Sprites.osar> <output-dir>\n")
		fmt.Fprintf(os.Stderr, "Flags:\n")
		flag.PrintDefaults()
		os.Exit(1)
	}

	osarPath := flag.Arg(0)
	outDir := flag.Arg(1)

	var defs []itemDef
	if err := json.Unmarshal(itemDefsJSON, &defs); err != nil {
		log.Fatalf("parsing embedded item defs: %v", err)
	}

	subspaces, err := parseOSAR(osarPath)
	if err != nil {
		log.Fatalf("parsing OSAR: %v", err)
	}

	spriteTree := make(map[string]map[string]*entry)
	for _, ss := range subspaces {
		m := make(map[string]*entry)
		for _, e := range ss.Entries {
			m[e.Name] = e
		}
		spriteTree[ss.Name] = m
	}

	if err := os.MkdirAll(outDir, 0o755); err != nil {
		log.Fatalf("creating output dir: %v", err)
	}

	var noteSprite *frame
	if items, ok := spriteTree["items"]; ok {
		if e, ok := items["438"]; ok && len(e.Frames) > 0 {
			noteSprite = e.Frames[0]
		}
	}

	for _, def := range defs {
		parts := strings.SplitN(def.Sprite, ":", 2)
		if len(parts) != 2 {
			continue
		}
		category, spriteName := parts[0], parts[1]

		ssMap, ok := spriteTree[category]
		if !ok {
			log.Printf("warning: subspace %q not found for item %d (%s)", category, def.ID, def.Name)
			continue
		}
		e, ok := ssMap[spriteName]
		if !ok {
			log.Printf("warning: sprite %q not found in subspace %q for item %d (%s)", spriteName, category, def.ID, def.Name)
			continue
		}
		if len(e.Frames) == 0 {
			continue
		}

		f := e.Frames[0]
		img := padCenter(renderSprite(f, def.Mask, def.Blue), 48, 32)

		outPath := filepath.Join(outDir, fmt.Sprintf("%d.png", def.ID))
		if err := writePNG(outPath, img); err != nil {
			log.Printf("error writing %s: %v", outPath, err)
			continue
		}

		if *notes && noteSprite != nil {
			noteImg := renderNote(noteSprite, f, def.Mask, def.Blue)
			notePath := filepath.Join(outDir, fmt.Sprintf("%d_note.png", def.ID))
			if err := writePNG(notePath, noteImg); err != nil {
				log.Printf("error writing %s: %v", notePath, err)
			}
		}
	}

	log.Printf("done: sprites written to %s", outDir)
}

func parseOSAR(path string) ([]*subspace, error) {
	data, err := os.ReadFile(path)
	if err != nil {
		return nil, err
	}

	gr, err := gzip.NewReader(bytes.NewReader(data))
	if err != nil {
		return nil, fmt.Errorf("gzip open: %w", err)
	}
	defer gr.Close()

	raw, err := io.ReadAll(gr)
	if err != nil {
		return nil, fmt.Errorf("gzip read: %w", err)
	}

	r := &byteReader{data: raw}

	subspaceCount := int(r.readByte())
	result := make([]*subspace, 0, subspaceCount)

	for i := 0; i < subspaceCount; i++ {
		name := r.readString()
		ss := &subspace{Name: name}

		numEntries := int(r.readUint16())
		for j := 0; j < numEntries; j++ {
			entryName := r.readString()
			entryType := int(r.readByte())

			if entryTypeHasLayers(entryType) {
				_ = r.readByte()
			}

			frameCount := int(r.readByte())
			e := &entry{Name: entryName, Frames: make([]*frame, frameCount)}

			tableSize := int(r.readByte()) + 1
			colorTable := make([]int, tableSize)
			for k := 0; k < tableSize; k++ {
				red := int(r.readByte())
				green := int(r.readByte())
				blue := int(r.readByte())
				colorTable[k] = (red << 16) | (green << 8) | blue
			}

			for k := 0; k < frameCount; k++ {
				width := int(r.readUint16())
				height := int(r.readUint16())
				useShift := r.readByte() == 1
				offsetX := int(r.readInt16())
				offsetY := int(r.readInt16())
				boundWidth := int(r.readUint16())
				boundHeight := int(r.readUint16())

				pixels := make([]int, width*height)
				for p := range pixels {
					pixels[p] = colorTable[int(r.readByte())]
				}

				e.Frames[k] = &frame{
					Width:       width,
					Height:      height,
					UseShift:    useShift,
					OffsetX:     offsetX,
					OffsetY:     offsetY,
					BoundWidth:  boundWidth,
					BoundHeight: boundHeight,
					Pixels:      pixels,
				}
			}

			ss.Entries = append(ss.Entries, e)
		}

		result = append(result, ss)
	}

	return result, nil
}

func entryTypeHasLayers(t int) bool {
	return t >= 1 && t <= 3
}

// padCenter places src centered on a new canvas of the given size.
func padCenter(src *image.NRGBA, w, h int) *image.NRGBA {
	srcW := src.Bounds().Dx()
	srcH := src.Bounds().Dy()
	if srcW >= w && srcH >= h {
		return src
	}
	dst := image.NewNRGBA(image.Rect(0, 0, w, h))
	ox := (w - srcW) / 2
	oy := (h - srcH) / 2
	draw.Draw(dst, image.Rect(ox, oy, ox+srcW, oy+srcH), src, src.Bounds().Min, draw.Over)
	return dst
}

func renderSprite(f *frame, pictureMask, blueMask int) *image.NRGBA {
	// When UseShift is set, the pixel data is placed at (OffsetX, OffsetY)
	// within a (BoundWidth x BoundHeight) canvas — matching the client's
	// drawSpriteClipping behaviour.
	outW, outH := f.Width, f.Height
	ox, oy := 0, 0
	var img *image.NRGBA
	if UseShift {
		if f.UseShift && f.BoundWidth > 0 && f.BoundHeight > 0 {
			outW = f.BoundWidth
			outH = f.BoundHeight
			ox = f.OffsetX
			oy = f.OffsetY
		}
		img = image.NewNRGBA(image.Rect(0, 0, outW, outH))
	} else {
		img = image.NewNRGBA(image.Rect(0, 0, f.Width, f.Height))
	}
	maskR := (pictureMask >> 16) & 0xFF
	maskG := (pictureMask >> 8) & 0xFF
	maskB := pictureMask & 0xFF

	blueR := (blueMask >> 16) & 0xFF
	blueG := (blueMask >> 8) & 0xFF
	blueB := blueMask & 0xFF

	for y := 0; y < f.Height; y++ {
		for x := 0; x < f.Width; x++ {
			pixel := f.Pixels[y*f.Width+x]
			if pixel == 0 {
				continue
			}

			r := (pixel >> 16) & 0xFF
			g := (pixel >> 8) & 0xFF
			b := pixel & 0xFF

			if pictureMask != 0 && r == g && g == b {
				r = (maskR * r) >> 8
				g = (maskG * g) >> 8
				b = (maskB * b) >> 8
			} else if blueMask != 0 && r == g && b != r {
				shifter := r * b
				r = (blueR * shifter) >> 16
				g = (blueG * shifter) >> 16
				b = (blueB * shifter) >> 16
			}

			img.SetNRGBA(ox+x, oy+y, color.NRGBA{R: clamp8(r), G: clamp8(g), B: clamp8(b), A: 255})
		}
	}

	return img
}

// renderNote composites a note background with a scaled item sprite on top,
// mimicking BankInterface.java lines 344-356.
func renderNote(noteBg *frame, itemFrame *frame, pictureMask, blueMask int) *image.NRGBA {
	const noteW, noteH = 48, 32
	const itemX, itemY = 7, 5
	const itemW, itemH = 29, 19

	bgImg := renderSprite(noteBg, 0, 0)
	out := image.NewNRGBA(image.Rect(0, 0, noteW, noteH))
	drawScaled(out, bgImg, 0, 0, noteW, noteH)

	itemImg := renderSprite(itemFrame, pictureMask, blueMask)
	drawScaled(out, itemImg, itemX, itemY, itemW, itemH)

	return out
}

func drawScaled(dst *image.NRGBA, src *image.NRGBA, dx, dy, dw, dh int) {
	srcBounds := src.Bounds()
	srcW := srcBounds.Dx()
	srcH := srcBounds.Dy()
	if srcW == 0 || srcH == 0 {
		return
	}

	for y := 0; y < dh; y++ {
		srcY := y * srcH / dh
		for x := 0; x < dw; x++ {
			srcX := x * srcW / dw
			c := src.NRGBAAt(srcBounds.Min.X+srcX, srcBounds.Min.Y+srcY)
			if c.A == 0 {
				continue
			}
			dst.SetNRGBA(dx+x, dy+y, c)
		}
	}
}

func writePNG(path string, img image.Image) error {
	f, err := os.Create(path)
	if err != nil {
		return err
	}
	defer f.Close()

	bounds := img.Bounds()
	nrgba, ok := img.(*image.NRGBA)
	if !ok {
		nrgba = image.NewNRGBA(bounds)
		draw.Draw(nrgba, bounds, img, bounds.Min, draw.Src)
	}

	return png.Encode(f, nrgba)
}

func clamp8(v int) uint8 {
	if v < 0 {
		return 0
	}
	if v > 255 {
		return 255
	}
	return uint8(v)
}

type byteReader struct {
	data []byte
	pos  int
}

func (r *byteReader) readByte() byte {
	b := r.data[r.pos]
	r.pos++
	return b
}

func (r *byteReader) readUint16() uint16 {
	v := binary.BigEndian.Uint16(r.data[r.pos:])
	r.pos += 2
	return v
}

func (r *byteReader) readInt16() int16 {
	v := int16(binary.BigEndian.Uint16(r.data[r.pos:]))
	r.pos += 2
	return v
}

func (r *byteReader) readString() string {
	start := r.pos
	for r.data[r.pos] != 0 {
		r.pos++
	}
	s := string(r.data[start:r.pos])
	r.pos++
	return s
}
