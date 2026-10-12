---
name: image-to-component
description: >-
  Expert procedural workflow for slicing and implementing pixel-perfect UI components
  from user-provided images, screenshots, mockups, or Stitch screens into modular HTML,
  Tailwind CSS, and Neo-Brutalist design tokens. Triggers whenever slicing, replicating,
  or refining UI components based on visual references.
---

# UI Slicing Workflow (Image & Stitch to Component)

This skill provides an authoritative, step-by-step playbook for slicing UI components directly from images, screenshots, or Stitch design screens into this project's modular frontend architecture.

---

## Core Principles

1. **Pixel & Style Fidelity**: Match the visual reference 1:1, including borders, hard-offset drop shadows, tilt angles, colors, and typography contrast.
2. **Modular Components**: Every section lives in its own file under `components/<component-name>.html`.
3. **Zero-CORS Synchronization**: Always run `node build.js` immediately after creating or modifying any file in `components/`.
4. **Pure English UI**: Every visible UI string (labels, buttons, placeholders, badges, modal copy) MUST strictly be 100% English.
5. **No Auto Preview**: Never launch browser subagents or automated browser preview unless the user explicitly requests it. Always provide a clear, manual verification guide.

---

## Step-by-Step Slicing Procedure

### Step 1: Visual Deconstruction & Asset Discovery
When receiving an image or Stitch reference:
1. **Analyze Layout & Grid**: Identify flex/grid structures, alignment, max container widths, and vertical padding.
2. **Identify Design System Tokens**:
   - Reference `design-system.md` for consistent tokens:
     - **Canvas**: `#FAF7F0` (warm biscuit cream with dot-matrix pattern)
     - **Primary Action**: `#D4FF00` (Electric Lime, 2.5px solid border, hard shadow)
     - **Deep Surface**: `#4A0E17` (Vintage Wine)
     - **Secondary Accent**: `#E53935` / `#C83D2D` (Burnt Biscuit Red)
     - **Ink & Shadows**: `#121212` (Jet Charcoal, `box-shadow: 4px 4px 0px #121212`)
3. **Detect Vector Assets / Decals**:
   - Check if the image contains vector logos, mascots, or stickers (van, trophy, lightning, badges).
   - If an asset does not exist in `assets/images/`, create a dedicated `.svg` file using clean vector paths.

### Step 2: Component File Selection
1. **Existing Component**: If the screenshot represents an update to an existing section, edit the corresponding file in `components/<name>.html`.
2. **New Component**: If it is a new section:
   - Create `components/<new-name>.html`.
   - Add `<div data-component="<new-name>"></div>` into `index.html` at the appropriate semantic location inside `<main>`.

### Step 3: Markup & Styling Implementation
- Write semantic HTML5 (header, section, nav, button, form).
- Use Tailwind CSS utility classes combined with custom classes from `assets/css/design-system.css`:
  - Hard shadows: `.brutal-shadow`, `.brutal-shadow-lg`, `.brutal-shadow-sm`
  - Tactile physics: `.btn-tactile`
  - Tilted stickers: `.tilt-left`, `.tilt-right`
  - Cracker bite shapes: `.bite-corner-tr`
  - Scalloped waves: `.scallop-divider-top`, `.scallop-divider-bottom`
  - Typography: `.font-display` (Bricolage Grotesque), `.font-cursive` (handwritten accent), `.font-label` (Space Grotesk), `.font-body` (Plus Jakarta Sans).

### Step 4: Interactivity & State Binding (If Applicable)
If the component includes interactive features (e.g. tabs, accordion, modal trigger, drag-and-drop):
- Add clear descriptive IDs or data attributes (e.g., `data-open-modal="waitlist"`, `.folder-tab-btn`).
- Integrate the event handler logic inside `assets/js/main.js`.
- Ensure keyboard accessibility (`aria-expanded`, ESC key support).

### Step 5: Automated Build Synchronization
Whenever any HTML file in `components/` is created or modified, execute:
```powershell
node build.js
```
This updates `assets/js/components.js`, ensuring instant, offline, and CORS-free rendering in browsers.

### Step 6: Manual Verification Reporting
Provide a step-by-step manual testing guide in the chat response and in `walkthrough.md`:
- Target section / element ID.
- Exact click/input steps for the user.
- Expected visual result and interactive behavior.

---

## Component Checklist

Before declaring a slicing task complete, verify:
- [ ] Visual fidelity matches the reference image (colors, fonts, borders, shadows, and spacing).
- [ ] All user-facing text is in 100% Pure English.
- [ ] No inline style clutter; uses Tailwind + `design-system.css`.
- [ ] Mobile and desktop viewports are responsive.
- [ ] `node build.js` has been run and exited with code 0.
- [ ] Manual verification steps provided clearly to the user.
