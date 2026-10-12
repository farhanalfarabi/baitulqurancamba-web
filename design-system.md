# Tactile Neo-Brutalist Design System

Welcome to the **Tactile Neo-Brutalist EdTech** design system for **KRACKERZ** (as extracted and engineered from Stitch). This design system rejects sterile, clinical corporate minimalism in favor of visceral physical presence, intentional friction, tactile collage aesthetics, and high-octane graphic pop.

---

## 1. Brand Philosophy & Aesthetic Movement

- **Movement:** Tactile Neo-Brutalist Collage & Physical Ephemera.
- **Personality:** Irreverent, confident, high-voltage, tactile, and unapologetic.
- **Visual Pillars:**
  - **Hard-Offset Geometry:** Thick `#121212` outlines, deliberate mechanical offsets, and solid drop shadows with 0px blur.
  - **High-Voltage Pop Accents:** High-contrast friction between Electric Lime (`#D4FF00`), rich grounding Vintage Wine (`#4A0E17`), and Terracotta / Burnt Biscuit Red (`#C83D2D`).
  - **Paper & Tactility:** Warm unbleached paper cream backing (`#FAF7F0`) with subtle dot-matrix pattern, scalloped cracker borders, die-cut stamp tabs, and vinyl decal stickers with white halos.
  - **Mechanical Physics:** Tactile button depression on `:active` simulating a physical mechanical stamp.

---

## 2. Color Palette & Semantic Roles

| Token Name | Hex Code | Semantic Role | Usage Context |
| :--- | :--- | :--- | :--- |
| **Canvas Backing** | `#FAF7F0` | Primary viewport ground | Main page canvas, organic unbleached paper warmth |
| **Canvas Light** | `#FCF9F2` | Secondary warm surface | Section alternation & card backings |
| **Component Surface** | `#FFFFFF` | Crisp elevated container | Inputs, white cards, modal bodies, sticker halos |
| **Electric Lime** | `#D4FF00` | High-voltage primary action | Primary CTA buttons, key highlight stickers, live badges |
| **Vintage Wine** | `#4A0E17` | Structural ground & emphasis | Heroic modules, featured pricing card, dark footer |
| **Burnt Biscuit Red** | `#C83D2D` / `#E53935` | Secondary accent & mascot | Mascot body, ticket stamps, alert tags, cursive script |
| **Jet Charcoal (Ink)** | `#121212` | Structural outlines & ink | 2px-3px solid strokes, typography, hard drop shadows |
| **Muted Slate** | `#555555` / `#717171` | Secondary metadata | Captions, subtitle text, muted table headers |

---

## 3. Typography Hierarchy

The type system creates expressive tension between punchy neo-grotesque display headers, monoline technical badges, clean geometric body copy, and playful editorial cursive scripts.

| Style Role | Font Family | Weight | Size (Desktop) | Tracking / Letter Spacing |
| :--- | :--- | :--- | :--- | :--- |
| **Display Hero** | `Bricolage Grotesque`, `Impact` | 800 / 900 | `64px` | `-0.03em` |
| **Headline XL** | `Bricolage Grotesque` | 800 | `48px` - `56px` | `-0.025em` |
| **Headline LG** | `Bricolage Grotesque` | 800 | `36px` - `42px` | `-0.02em` |
| **Headline MD** | `Bricolage Grotesque` | 700 | `24px` - `28px` | `-0.01em` |
| **Editorial Cursive** | `Caveat`, cursive | 700 | `1.15em` - `1.3em` | Hand-drawn slant (`-3deg`) |
| **Body LG / MD** | `Plus Jakarta Sans` | 400 / 500 | `16px` / `18px` | `0` |
| **Badges & Labels** | `Space Grotesk` | 700 | `12px` - `14px` | `+0.05em` (Uppercase) |
| **Monospace / Codes** | `JetBrains Mono`, monospace | 600 | `11px` - `13px` | `+0.04em` |

---

## 4. Elevation, Shadows & Physics

### Hard-Offset Shadow (The Brutalist Drop)
Depth strictly avoids Gaussian ambient blurs. Shadows are crisp, opaque, and physical:

- **Standard Card Surface:**
  ```css
  box-shadow: 4px 4px 0px 0px #121212;
  border: 2px solid #121212;
  ```
- **High-Impact Statement Container:**
  ```css
  box-shadow: 6px 6px 0px 0px #121212;
  border: 2.5px solid #121212;
  ```
- **Sticker Vinyl Decals:**
  ```css
  border: 3px solid #FFFFFF;
  box-shadow: 3px 3px 0px 0px #121212;
  transform: rotate(-3deg);
  ```

### Active Button Depression
When a user presses an interactive element, it mechanically collapses:
```css
.btn-tactile:hover {
  transform: translate(-1px, -1px);
  box-shadow: 5px 5px 0px 0px #121212;
}

.btn-tactile:active {
  transform: translate(3px, 3px);
  box-shadow: 1px 1px 0px 0px #121212;
}
```

---

## 5. Shape Language & Specialty Cuts

1. **Pill Action Modules (`rounded-full`):** High-priority buttons and interactive tags use full pill borders (`9999px`).
2. **Standard Rounded Cards (`rounded-xl` / `rounded-2xl`):** `12px` to `16px` border-radius with crisp 2px ink border.
3. **Cracker-Bite Corner Notch:** Circular radial cutout on the top-right corner using CSS `mask-image` or radial clip geometry.
4. **Scalloped Borders:** Continuous semi-circular cracker edge waves for section dividers and quote cards.
5. **Folder Tabs Navigation:** Asymmetrical die-cut folder tabs anchored to card top perimeters.

---

## 6. Components Specification

### Primary CTA Button (Electric Lime Pill)
- **Background:** `#D4FF00`
- **Text:** `#121212` (Uppercase `Space Grotesk`, Bold)
- **Border:** `2.5px solid #121212`
- **Radius:** `9999px`
- **Trailing Icon:** Circular black disc with red or lime forward arrow `➔`
- **Shadow:** `4px 4px 0px #121212`

### Sticker Badges
- **Starburst Badge:** 12-point scalloped star with uppercase technical copy (`BITE LEARN REPEAT`).
- **Ticket Stamp:** Scalloped end notches, vibrant red background (`#E53935`), white bold text.
- **Tilted Keyword Sticker:** Solid black pill or angled rectangle with `#D4FF00` text, rotated `-2deg` to `-4deg`.

### Interactive Accordion (FAQ)
- Crisp white rounded card with `2px solid #121212`.
- Right-aligned circular lime pill toggle icon with `+` turning into `−` or rotating upon expansion.
- Smooth height animation.

### Interactive Draggable Laptop Sticker Deck
- Realistic MacBook silhouette surface with subtle apple logo.
- Draggable decal stickers featuring cursor physics, dynamic z-index on drag, and position persistence.
