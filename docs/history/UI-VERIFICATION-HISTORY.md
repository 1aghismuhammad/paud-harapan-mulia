# UI Verification History

Status: **historical QA narrative**. This is not a command script and not a current test plan.

Retired root wrappers (`VERIFY-*.md`, `REVIEW-ALL-PAGES.md`, `APPLY-*.md`) are named only as historical sources. Repeat ZIP / `artisan serve` / hard-refresh instructions are omitted unless they explain a real failure.

When behavior conflicts with this file, **current implementation wins**.

---

## Hero Autoplay Regression

### Problem

Autoplay existed in source but appeared dead on desktop. Pause-on-hover (`pointerenter` → stop, `pointerleave` → restart) was the cause: the hero occupies most of the viewport, so the pointer almost always sat on the carousel after load.

An early APPLY note (`APPLY-HERO-AUTOPLAY.md`) had described pause on hover as expected. That expectation is **historical and superseded**.

### Fix

Stop pausing merely because the pointer is over the hero. Keep 7s interval. Reset the timer on manual prev/next/dot. Pause while the document is hidden; resume when visible.

### Final verified behavior

Current `resources/js/app.js` has **no** `pointerenter` / `pointerleave` pause on the hero. Autoplay continues with the cursor on the hero. This is **current** behavior, not a bug.

### Historical sources

Retired: `APPLY-HERO-AUTOPLAY.md`, `VERIFY-HERO-AUTOPLAY.md`

Kept: [`HOTFIX-hero-autoplay-runtime.md`](../phase-01/HOTFIX-hero-autoplay-runtime.md), [`CHANGELOG-hero-autoplay-smooth-crossfade.md`](../phase-01/CHANGELOG-hero-autoplay-smooth-crossfade.md)

---

## Hero Fade Evolution

### V3

Runtime checks used `data-carouselActive` (0 then 1 after ~8s) and `data-carouselAutoplay=running`. `data-carouselMotion` could be `full` or `reduced` (OS/browser reduced-motion). A `?carouselDebug=1` console helper existed for that iteration. **`carouselDebug` is not current**; it is **removed** from `app.js`.

### Longer fade

An intermediate pass lengthened outgoing/incoming opacity so the change was easier to see than the first short crossfade. **Superseded.**

### V4

Staged fade (~900ms out / ~1100ms in) and `data-carouselTransition` `running` / `idle`. Visible fade required `carouselMotion=full`. **Superseded** by V5.

### V5

Visible fade-through: old image fades, a brief lighter/white overlay, new image fades in. Intended so similar photos still show a transition. Timings in the formal hotfix match current JS (outgoing ~1200ms, overlay ~1750ms, incoming delay ~280ms then ~1500ms).

### Final verified behavior

Hero block in `app.js` is labeled V5 and uses Web Animations plus `[data-carousel-fade-layer]`. Reduced motion still gets opacity dissolve without zoom. **V5/current wins.**

### Historical sources

Retired: `VERIFY-HERO-CAROUSEL-V3.md`, `VERIFY-HERO-FADE-LONGER.md`, `VERIFY-HERO-FADE-V4.md`, `VERIFY-HERO-FADE-V5.md`

Kept: [`HOTFIX-hero-carousel-v3.md`](../phase-01/HOTFIX-hero-carousel-v3.md), [`HOTFIX-hero-fade-longer.md`](../phase-01/HOTFIX-hero-fade-longer.md), [`HOTFIX-hero-fade-v4.md`](../phase-01/HOTFIX-hero-fade-v4.md), [`HOTFIX-hero-fade-v5-visible.md`](../phase-01/HOTFIX-hero-fade-v5-visible.md)

---

## Feature Card CSS Regression

### Problem

Homepage markup already used `.home-feature-card` with default and hover icons. A later CSS snapshot from an older tree only styled `.home-feature-container`. Result: both icons visible (stacked), missing card box, hover chrome gone. Hero autoplay still had to keep working after the CSS fix.

### Fix

Restore framed card CSS, icon overlay, green border/bottom bar, and hover shadow without bringing back the old icon stacking.

### Final verified behavior

Current homepage still uses dual icons (`.home-feature-icon-default` / `.home-feature-icon-hover`). Do not ship CSS that predates that markup.

### Historical sources

Retired: `VERIFY-FEATURE-HOTFIX.md`, `APPLY-FEATURE-HOVER.md`, `APPLY-FEATURE-LAYOUT-V2.md`

Kept: [`HOTFIX-feature-card-css-regression.md`](../phase-01/HOTFIX-feature-card-css-regression.md)

---

## Motion V2 Activation

### Problem

Motion V2 CSS reveal rules were gated on `.js ...`, but the document sometimes only had class `motion-ready`. Reveals then never ran. Elements already in view could also become `motion-visible` on the same frame as observer attach, so the first paint never showed the hidden state.

### Fix

Add both `js` and `motion-ready` on `document.documentElement`. Delay observer setup by two `requestAnimationFrame` ticks. Confirm `--motion-reveal` is `600ms` when motion is enabled. Reduced-motion media query should remain respected.

### Final verified behavior

Current `app.js` still does `classList.add('js', 'motion-ready')`. `--motion-reveal: 600ms` remains in `app.css`. This is **current**.

`data-motion-unit-card` was a V2 homepage card hook. It is **historical / removed** from views (those cards no longer exist). Do not treat it as a current selector.

### Historical sources

Retired: `VERIFY-MOTION-HOTFIX.md`, `APPLY-MOTION-SYSTEM.md`, `APPLY-MOTION-SYSTEM-V2.md`

Kept: [`HOTFIX-motion-v2-activation.md`](../phase-01/HOTFIX-motion-v2-activation.md), [`CHANGELOG-motion-system-v2.md`](../phase-01/CHANGELOG-motion-system-v2.md)

---

## Dropdown Hover Bridge

### Problem

Dropdown panel used `top: calc(100% + 14px)`. Moving the pointer slowly from the nav label to the panel crossed a gap and dropped `group-hover`, so the menu closed.

### Fix

Raise the panel (`+3px`), add a 20px transparent bridge under the trigger for both Tentang Kami and Sekolah Kami, widen the panel to 300px, enlarge item hit area. Do not change mobile navigation in that patch.

### Final verified behavior

Current `navbar.blade.php` still has the bridge spans and `!top-[calc(100%+3px)]` / `!w-[300px]`. Retired `ARTIFACT-CHECKS.json` only stored booleans for that patch (`about_hover_bridge`, `school_hover_bridge`, `dropdown_top_3px`, `dropdown_width_300`, `larger_item_area`). Those flags are not a runtime feature.

### Historical sources

Retired: `APPLY-DROPDOWN-V10.md`, `ARTIFACT-CHECKS.json`

Kept: [`CHANGELOG-dropdown-hover-bridge-v10.md`](../phase-01/CHANGELOG-dropdown-hover-bridge-v10.md)

---

## Facilities / PAUD-TK Showcase / Keunggulan / Testimonials

Grouped verification intent (visual/interaction), not a re-run checklist.

### Facilities

Reference QA: green band, 1/2/3 cards by breakpoint, looping arrows, mobile swipe, overlay, no horizontal overflow. Later mobile autoplay (~6s below 640px) and a hotfix. Formal numbers stay in phase-01 changelogs.

Retired: `APPLY-FACILITIES-REFERENCE-V1.md`

Kept: [`CHANGELOG-facilities-reference-layout.md`](../phase-01/CHANGELOG-facilities-reference-layout.md), [`CHANGELOG-facilities-mobile-autoplay-v2.md`](../phase-01/CHANGELOG-facilities-mobile-autoplay-v2.md), [`HOTFIX-facilities-mobile-autoplay-v3.md`](../phase-01/HOTFIX-facilities-mobile-autoplay-v3.md)

### PAUD / TK showcase and profile

Desktop: three gallery cards, arrows, hover overlay (after V4). Mobile: one full image, no peek, no arrows, swipe; profile two portraits with green accent. TK structure matches PAUD; copy stays unit-specific. Showcase autoplay ~5s.

Retired: `APPLY-PAUD-REFERENCE-V2.md`, `APPLY-PAUD-SHOWCASE-CAROUSEL.md`, `APPLY-PAUD-SHOWCASE-HOVER-V4.md`, `APPLY-TK-MATCH-PAUD-V4.md`, `APPLY-PAUD-TK-MOBILE-SHOWCASE-V5.md`, `APPLY-PAUD-TK-MOBILE-PROFILE-V6.md`

Kept: corresponding `docs/phase-01/CHANGELOG-paud-*` and [`CHANGELOG-unit-showcase-autoplay-v1.md`](../phase-01/CHANGELOG-unit-showcase-autoplay-v1.md)

### Keunggulan

Desktop: left menu changes right-hand content; active state must be obvious. Mobile: accordion under the item; opening another closes the previous; tapping the active item can close the panel. Smooth V8 added fade/slide; Blade `{-- --}` comments must not render.

Retired: `APPLY-INTERACTIVE-KEUNGGULAN-V7.md`, `APPLY-KEUNGGULAN-SMOOTH-V8.md`

Kept: [`CHANGELOG-paud-tk-interactive-keunggulan-v7.md`](../phase-01/CHANGELOG-paud-tk-interactive-keunggulan-v7.md), [`CHANGELOG-paud-tk-keunggulan-smooth-v8.md`](../phase-01/CHANGELOG-paud-tk-keunggulan-smooth-v8.md)

### Testimonials

Desktop three-up, mobile one-up, 6.5s autoplay, click/swipe, six placeholders looping. Phase 4 later removed button semantics from cards (see below); slider still advances on click.

Retired: `APPLY-TESTIMONIAL-V9.md`

Kept: [`CHANGELOG-testimonial-responsive-slider-v9.md`](../phase-01/CHANGELOG-testimonial-responsive-slider-v9.md)

---

## All-Pages Visual Review

### What was tested

Desktop ~1920×1080 and mobile ~390×844 across Sejarah, Visi & Misi, Fasilitas, PAUD/TK, Berita, and footer: banner/breadcrumb, measure widths, card counts, stacking, overflow.

### Issues this review was meant to catch

Horizontal overflow, unreadable media grids, profile columns collapsing badly, breadcrumbs clipping, news/footer not stacking.

### Final verified behavior

Treat current Blade as the layout source. The review file was a ZIP-era checklist, not a living QA suite.

### Historical sources

Retired: `REVIEW-ALL-PAGES.md`

Kept: [`CHANGELOG-all-pages-reference-alignment.md`](../phase-01/CHANGELOG-all-pages-reference-alignment.md)

---

## Phase 4 Accessibility Changes Affecting UI Semantics

Phase 4 did not redesign visuals. It changed semantics and keyboard behavior. Do not copy the full Phase 4 report here.

Summary that still matters for UI:

- Homepage: visually hidden `h1`
- Fasilitas: desktop heading via `lg:sr-only` instead of removing it with `lg:hidden`
- Sejarah / Visi & Misi: `.page-title` is a `p`, not a second `h2`
- Mobile menu: focus returns to the toggle when the drawer closes
- Testimonial cards: **`role="button"` removed** (historical mistaken control semantics); click-to-advance remains

Full record: [`docs/phase-04/PHASE-04-COMPLETION.md`](../phase-04/PHASE-04-COMPLETION.md)
