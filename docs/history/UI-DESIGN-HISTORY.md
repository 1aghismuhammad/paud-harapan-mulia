# UI Design History — PAUD Harapan Mulia

Status: **historical narrative**. Current UI is whatever the Blade, CSS, and JavaScript files do today.

## How to Read This Document

This file summarizes how major public UI areas evolved during Phase 1 and later homepage work.

- **Final / Current Behavior** is checked against source at consolidation time. If source later changes, source wins.
- Numeric CSS tables live in `docs/phase-01/CHANGELOG-*`. This file records intent, rejected approaches, and where to look.
- Retired root wrappers (`APPLY-*.md`, `VERIFY-*.md`, `REVIEW-ALL-PAGES.md`) are named as historical sources only. They are not live files.

---

## Global Layout and Reference Fidelity

### Initial Intent

Public pages should feel close to the approved visual reference in hierarchy and whitespace, using Harapan Mulia brand colors and Indonesian navigation. The site is a company profile, not a clone of another institution’s identity.

### Important Iterations

1. Early Phase 1 built a working public skeleton (topbar, nav, hero, page shells).
2. Incremental sizing was replaced by a **reference-driven layout rewrite** (narrower content frames, overlapping feature/testimonial language, stronger hero dominance).
3. Inner pages were aligned as a set (Sejarah, Visi & Misi, Fasilitas, PAUD/TK, Berita, footer).
4. Later proportion, desktop scale, and breakpoint standardization refined the same language without another full rewrite.

### Superseded Approaches

Tweaking isolated pixel sizes without rewriting layout. That approach did not match the reference closely enough.

### Final / Current Behavior

Centered content, two-row header, large hero, highlight cards, green testimonial band, compact news, three-column footer. No Galeri module.

### Current Implementation

- `resources/views/layouts/public.blade.php`
- `resources/views/components/site/*`
- `resources/css/app.css`
- `resources/views/public/**`

### Historical Sources

Retired: `APPLY-REFERENCE-REWRITE.md`, `REVIEW-ALL-PAGES.md`

Kept: [`CHANGELOG-reference-fidelity.md`](../phase-01/CHANGELOG-reference-fidelity.md), [`CHANGELOG-all-pages-reference-alignment.md`](../phase-01/CHANGELOG-all-pages-reference-alignment.md), [`CHANGELOG-visual-proportion.md`](../phase-01/CHANGELOG-visual-proportion.md), [`CHANGELOG-homepage-desktop-scale.md`](../phase-01/CHANGELOG-homepage-desktop-scale.md), [`CHANGELOG-responsive-breakpoint-standardization-v1.md`](../phase-01/CHANGELOG-responsive-breakpoint-standardization-v1.md)

---

## Topbar, Navbar, Dropdown, and Mobile Navigation

### Initial Intent

Desktop: contact/logo row plus primary nav with Tentang Kami and Sekolah Kami dropdowns. Mobile: hamburger and accordion submenus. No Galeri item.

### Important Iterations

1. Mobile off-canvas drawer and accordion submenus.
2. Dropdown V10: the panel sat `14px` below the trigger, so a slow pointer path closed the menu. A transparent **hover bridge** (`h-5` / 20px) plus `top: calc(100% + 3px)` and a wider panel (`300px`) with larger item padding fixed that. Mobile nav was intentionally left unchanged.

### Superseded Approaches

Relying on `group-hover` alone across a visible gap under the trigger.

### Final / Current Behavior

Desktop dropdowns stay open while the pointer travels from the label into the panel. Both Tentang Kami and Sekolah Kami use the same bridge pattern. Mobile uses a left drawer; closing it restores focus to the menu button (Phase 4 a11y).

### Current Implementation

- `resources/views/components/site/topbar.blade.php`
- `resources/views/components/site/navbar.blade.php`
- `resources/views/components/site/mobile-menu.blade.php`
- `resources/js/app.js` (mobile menu)
- `resources/css/app.css` (`.dropdown-panel`, `.nav-link`)

### Historical Sources

Retired: `APPLY-DROPDOWN-V10.md`, `ARTIFACT-CHECKS.json`

Kept: [`CHANGELOG-dropdown-hover-bridge-v10.md`](../phase-01/CHANGELOG-dropdown-hover-bridge-v10.md), [`CHANGELOG-mobile-navigation.md`](../phase-01/CHANGELOG-mobile-navigation.md)

---

## Hero Carousel

### Initial Intent

A large image carousel on the homepage: previous/next, dots, calm autoplay, first slide as LCP candidate.

### Important Iterations

1. **Early autoplay:** interval 7 seconds, roughly 1 second crossfade, subtle zoom `1.025 → 1`. The APPLY wrapper `APPLY-HERO-AUTOPLAY.md` **claimed pause on hover/focus**. That claim is **historical and superseded**. It is not a current requirement.
2. **Runtime hotfix:** pause-on-pointer made autoplay look broken because the hero fills most of the desktop viewport, so the cursor usually sat on the hero. Autoplay was changed so it **does not stop merely because the pointer is over the hero**. Timer still resets on manual prev/next/dot and pauses while the browser tab is hidden.
3. **Fade experiments:** a longer CSS crossfade, then V4 (~900ms out / ~1100ms in) with `data-carouselTransition`, then **V5 visible fade-through** (outgoing fade, brief white overlay, delayed incoming fade, incoming zoom). V5 exists so two similar photographs still *look* like a change.
4. A temporary `?carouselDebug=1` console helper existed during V3 verification. It is **removed** from current JavaScript and is not current behavior.

### Superseded Approaches

- Pause autoplay on `pointerenter` / hover / focus over the hero
- Simple CSS-only crossfade as the only transition
- Intermediate “longer fade” and V4 timings
- `carouselDebug` query debugging

### Final / Current Behavior

Verified in `resources/js/app.js` at consolidation:

- Autoplay interval `7000ms`
- V5 Web Animations: outgoing opacity ~1200ms, incoming delayed ~280ms then ~1500ms, white overlay ~1750ms, incoming scale `1.025 → 1` over ~6200ms when motion is not reduced
- **Does not** pause simply because the pointer is over the hero
- Stops when `document.hidden`; resumes when the tab is visible
- `prefers-reduced-motion: reduce` keeps a gentler opacity dissolve and skips spatial zoom
- Dataset debug attributes (`carouselActive`, `carouselAutoplay`, `carouselTransition`) may still exist for inspection; they are not a public feature

### Current Implementation

- `resources/views/components/site/hero.blade.php` (`data-carousel`, fade layer, dots, arrows)
- `resources/js/app.js` (hero block labeled “Hero carousel V5”)
- `resources/css/app.css` (`[data-carousel]`)

### Historical Sources

Retired: `APPLY-HERO-AUTOPLAY.md`, `VERIFY-HERO-AUTOPLAY.md`, `VERIFY-HERO-CAROUSEL-V3.md`, `VERIFY-HERO-FADE-LONGER.md`, `VERIFY-HERO-FADE-V4.md`, `VERIFY-HERO-FADE-V5.md`

Kept: [`CHANGELOG-hero-autoplay-smooth-crossfade.md`](../phase-01/CHANGELOG-hero-autoplay-smooth-crossfade.md), [`HOTFIX-hero-autoplay-runtime.md`](../phase-01/HOTFIX-hero-autoplay-runtime.md), [`HOTFIX-hero-carousel-v3.md`](../phase-01/HOTFIX-hero-carousel-v3.md), [`HOTFIX-hero-fade-longer.md`](../phase-01/HOTFIX-hero-fade-longer.md), [`HOTFIX-hero-fade-v4.md`](../phase-01/HOTFIX-hero-fade-v4.md), [`HOTFIX-hero-fade-v5-visible.md`](../phase-01/HOTFIX-hero-fade-v5-visible.md)

---

## Homepage Feature Cards

### Initial Intent

Three highlight cards (Lingkungan Islami, Pembelajaran Menyenangkan, Pendampingan Orang Tua) overlapping the hero, matching reference hover: green outline, bottom accent, icon dark → green.

### Important Iterations

1. Hover styling.
2. Layout V2: hero remains the first viewport focus; cards appear after a short scroll; hover must not jump/lift the card.
3. A ZIP/CSS mismatch briefly showed both icons at once and lost the card box. Hotfix restored framed cards and overlay icons.

### Superseded Approaches

Older CSS that only styled `.home-feature-container` after markup had moved to `.home-feature-card` / dual icons.

### Final / Current Behavior

Three cards with default and hover icon assets, green hover chrome, no aggressive lift.

### Current Implementation

- `resources/views/public/home/index.blade.php` (`.home-feature-card`)
- `resources/css/app.css`

### Historical Sources

Retired: `APPLY-FEATURE-HOVER.md`, `APPLY-FEATURE-LAYOUT-V2.md`, `VERIFY-FEATURE-HOTFIX.md`

Kept: [`CHANGELOG-home-feature-reference-hover.md`](../phase-01/CHANGELOG-home-feature-reference-hover.md), [`CHANGELOG-home-feature-layout-v2.md`](../phase-01/CHANGELOG-home-feature-layout-v2.md), [`CHANGELOG-home-feature-lower-position.md`](../phase-01/CHANGELOG-home-feature-lower-position.md), [`HOTFIX-feature-card-css-regression.md`](../phase-01/HOTFIX-feature-card-css-regression.md)

---

## Homepage Visi & Misi Imagery

### Initial Intent

Photo hover: slight lift, stronger shadow, gentle zoom, thin green tint, **no layout shift**.

### Final / Current Behavior

Homepage vision/mission images still use that hover language. The inner Visi & Misi **page** is editorial (plain text, no large feature cards), per the all-pages alignment.

### Current Implementation

- `resources/views/public/home/index.blade.php`
- `resources/views/public/about/vision-mission.blade.php`

### Historical Sources

Retired: `APPLY-VISION-IMAGE-HOVER.md`

Kept: [`CHANGELOG-vision-images-hover.md`](../phase-01/CHANGELOG-vision-images-hover.md)

---

## Homepage Unit Pendidikan → Sekolah Kami

### Initial Intent

Homepage “affiliation” block: two Unit Pendidikan cards (PAUD and TK) linking to each unit route.

### Important Iterations

1. Section and slider work with testimonials.
2. **Bigger V2:** desktop cards about **330×330px** (with larger type and gap). That card grid is **SUPERSEDED HISTORICAL DESIGN**. Do not restore it unless the Project Owner explicitly reopens the product decision.
3. Later the homepage section was replaced with one **Sekolah Kami** showcase (not delivered via a root APPLY wrapper).

### Superseded Approaches

Two-card PAUD-vs-TK choice on the homepage, including the 330×330 treatment and any `data-motion-unit-card` motion tied to those cards.

### Final / Current Behavior

Verified in `resources/views/public/home/index.blade.php`:

- One showcase titled with eyebrow **Sekolah Kami**
- Image `images/paud/hero-sekolah.jpeg`
- CTA **Kenali Sekolah Kami** → `route('about.history')`
- PAUD/TK cards are **not** shown in that section
- Routes `/sekolah/paud` and `/sekolah/tk` still exist and remain in navigation

Reason for the product change is recorded in [`PROJECT-DECISION-LOG.md`](PROJECT-DECISION-LOG.md) (Project Owner).

### Current Implementation

- `resources/views/public/home/index.blade.php`
- Nav still: `resources/views/components/site/navbar.blade.php`, `mobile-menu.blade.php`
- Unit pages: `resources/views/public/school/paud.blade.php`, `tk.blade.php`

### Historical Sources

Retired: `APPLY-UNIT-BIGGER-V2.md`

Kept: [`CHANGELOG-unit-pendidikan-bigger-v2.md`](../phase-01/CHANGELOG-unit-pendidikan-bigger-v2.md), [`CHANGELOG-units-testimonial-slider.md`](../phase-01/CHANGELOG-units-testimonial-slider.md)

No APPLY/VERIFY file exists for the Sekolah Kami replacement; current Blade is the source of truth for layout.

---

## PAUD / TK Pages

### Initial Intent

Dedicated unit pages that follow the same visual language, with unit-specific headings and copy.

### Important Iterations

1. PAUD reference layout (hero, profile, showcase, advantages, news).
2. Showcase carousel: three desktop cards, circular arrows, swipe.
3. Hover overlay on gallery (overlay not always on).
4. TK matched to PAUD structure; copy stays TK-specific.
5. Mobile showcase: one full photo, no peek of the next, arrows hidden, swipe kept; desktop still hover overlay.
6. Mobile profile: two portrait photos with green accent.
7. Interactive Keunggulan: desktop tabs; mobile accordion (exclusive open; active item can close).
8. Smooth panel transitions; Blade comments must not leak.
9. Showcase autoplay ~5s (arrows/swipe still reset the timer).

### Superseded Approaches

Always-on desktop overlay as the only gallery state; stacked mobile gallery that showed a sliver of the next photo.

### Final / Current Behavior

Shared chrome in `paud.blade.php` and `tk.blade.php`: `data-showcase-carousel`, `data-advantages` (desktop tabs + mobile accordion). Content strings differ per unit.

### Current Implementation

- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`
- `app/Http/Controllers/SchoolController.php`

### Historical Sources

Retired: `APPLY-PAUD-REFERENCE-V2.md`, `APPLY-PAUD-SHOWCASE-CAROUSEL.md`, `APPLY-PAUD-SHOWCASE-HOVER-V4.md`, `APPLY-TK-MATCH-PAUD-V4.md`, `APPLY-PAUD-TK-MOBILE-SHOWCASE-V5.md`, `APPLY-PAUD-TK-MOBILE-PROFILE-V6.md`, `APPLY-INTERACTIVE-KEUNGGULAN-V7.md`, `APPLY-KEUNGGULAN-SMOOTH-V8.md`

Kept: matching `docs/phase-01/CHANGELOG-paud-*`, `CHANGELOG-tk-match-paud-v4.md`, `CHANGELOG-paud-tk-*`, [`CHANGELOG-unit-showcase-autoplay-v1.md`](../phase-01/CHANGELOG-unit-showcase-autoplay-v1.md)

---

## Facilities

### Initial Intent

Fasilitas page: green title/breadcrumb band, carousel that shows 1/2/3 cards by breakpoint, looping arrows on larger viewports, swipe on mobile, hover/focus overlay, no horizontal overflow.

### Important Iterations

Reference layout V1, then mobile-only autoplay, then a mobile autoplay hotfix. Details stay in the phase-01 files.

### Final / Current Behavior

Dedicated facilities view with its own carousel script in the page (not the homepage hero carousel).

### Current Implementation

- `resources/views/public/about/facilities.blade.php`

### Historical Sources

Retired: `APPLY-FACILITIES-REFERENCE-V1.md`

Kept: [`CHANGELOG-facilities-reference-layout.md`](../phase-01/CHANGELOG-facilities-reference-layout.md), [`CHANGELOG-facilities-mobile-autoplay-v2.md`](../phase-01/CHANGELOG-facilities-mobile-autoplay-v2.md), [`HOTFIX-facilities-mobile-autoplay-v3.md`](../phase-01/HOTFIX-facilities-mobile-autoplay-v3.md)

---

## Testimonials

### Initial Intent

Green band plus white cards, as in the reference. Phase 1 copy is **placeholder** for UI review, not production quotes.

### Important Iterations

Visual match, then V9: desktop three cards, mobile one card, autoplay 6.5s, click/swipe, looping six quotes. Phase 4 removed fake `role="button"` / `tabindex` on cards; mouse click still advances the slider.

### Final / Current Behavior

`data-testimonial-slider` in `app.js` uses `6500ms` autoplay. Placeholders remain until client content or the section is disabled for production.

### Current Implementation

- `resources/views/public/home/index.blade.php`
- `resources/js/app.js` (testimonial block)

### Historical Sources

Retired: `APPLY-TESTIMONIAL-V9.md`

Kept: [`CHANGELOG-testimonial-reference-match.md`](../phase-01/CHANGELOG-testimonial-reference-match.md), [`CHANGELOG-testimonial-responsive-slider-v9.md`](../phase-01/CHANGELOG-testimonial-responsive-slider-v9.md), [`PHASE-04-COMPLETION.md`](../phase-04/PHASE-04-COMPLETION.md) (a11y)

---

## Motion and Hover System

### Initial Intent

Subtle motion: visible enough to feel polished, quiet enough for a school site. Honor `prefers-reduced-motion`.

### Important Iterations

1. Motion V1 (interaction system).
2. Motion V2: global tokens, ~600ms reveal / ~20px rise, ~80ms stagger, navbar underline, smoother dropdown/drawer, hero entrance. Formal changelog also added **`data-motion-unit-card` on homepage PAUD/TK cards**. That attribute is **historical**. It is **not** present in current views; those cards were removed with the Sekolah Kami showcase.
3. Activation hotfix: CSS reveal selectors required a `js` class, but runtime sometimes only had `motion-ready`. `app.js` now adds **both** `js` and `motion-ready`. First-paint used a double `requestAnimationFrame` so the hidden state could paint before `motion-visible`.

### Superseded Approaches

- Motion V1 as the current system
- V2 hero crossfade timings later replaced by hero **V5** (see Hero section)
- `data-motion-*` markup, including **`data-motion-unit-card`**, as current homepage behavior
- APPLY-MOTION-SYSTEM-V2 expected “Unit Pendidikan fade-up” on two cards — **superseded** with those cards

### Final / Current Behavior

Root classes `js motion-ready`. Reveals target CSS/layout selectors (homepage containers, news cards, inner page hero, `.unit-showcase-row` on unit pages, testimonials, and so on), not `data-motion-unit-card`. Reduced motion is still respected in hero and several sliders.

### Current Implementation

- `resources/js/app.js` (bootstrap + IntersectionObserver reveals)
- `resources/css/app.css` (`--motion-reveal`, `.js .motion-visible`)
- `resources/views/layouts/public.blade.php` (fallback class if JS is late)

### Historical Sources

Retired: `APPLY-MOTION-SYSTEM.md`, `APPLY-MOTION-SYSTEM-V2.md`, `VERIFY-MOTION-HOTFIX.md`

Kept: [`CHANGELOG-motion-interaction-system.md`](../phase-01/CHANGELOG-motion-interaction-system.md), [`CHANGELOG-motion-system-v2.md`](../phase-01/CHANGELOG-motion-system-v2.md), [`HOTFIX-motion-v2-activation.md`](../phase-01/HOTFIX-motion-v2-activation.md), [`2026-08-15-phase-01i-motion-system-v2.md`](../progress/2026-08-15-phase-01i-motion-system-v2.md)

---

## Branding

### Initial Intent

Temporary dataset artwork until the official school logo existed.

### Important Iterations

Official logo (`logo-official.webp`) replaced **`logo-temporary.jpeg`** on topbar, navbar, mobile drawer, and favicon. School name text beside the mobile logo was kept because the full wordmark is too small at nav size.

`logo-temporary.jpeg` is **removed / superseded**. Do not treat it as a current asset.

### Current Implementation

- `public/images/paud/logo-official.webp`
- `resources/views/components/site/topbar.blade.php`, `navbar.blade.php`, `mobile-menu.blade.php`
- `resources/views/layouts/public.blade.php`

### Historical Sources

Kept: [`CHANGELOG-official-logo-branding.md`](../phase-01/CHANGELOG-official-logo-branding.md)

---

## Inner Pages

### Initial Intent

Sejarah, Visi & Misi, Fasilitas, Berita, and footer should share the same frame language as the homepage (green banners, centered measure, no gallery module).

### Important Iterations

All-pages reference alignment: Sejarah became a single editorial column (centered image + long article) instead of a two-column shell. Visi & Misi dropped large cards. Footer stayed three columns on desktop and stacks on mobile. Back-to-top was iterated separately (smooth then standalone). About breadcrumb/title scale was adjusted later.

### Final / Current Behavior

Match the current Blade for each route. Do not revive the two-column Sejarah experiment.

### Current Implementation

- `resources/views/public/about/history.blade.php`
- `resources/views/public/about/vision-mission.blade.php`
- `resources/views/public/news/index.blade.php`, `show.blade.php`
- `resources/views/components/site/footer.blade.php`, `page-hero.blade.php`

### Historical Sources

Retired: `REVIEW-ALL-PAGES.md`

Kept: [`CHANGELOG-all-pages-reference-alignment.md`](../phase-01/CHANGELOG-all-pages-reference-alignment.md), [`CHANGELOG-footer-reference-match.md`](../phase-01/CHANGELOG-footer-reference-match.md), [`CHANGELOG-about-breadcrumb-size-v1.md`](../phase-01/CHANGELOG-about-breadcrumb-size-v1.md), [`CHANGELOG-about-history-vision-scale-v1.md`](../phase-01/CHANGELOG-about-history-vision-scale-v1.md), [`CHANGELOG-about-history-vision-scale-v2.md`](../phase-01/CHANGELOG-about-history-vision-scale-v2.md), back-to-top changelogs under `docs/phase-01/`

---

## Superseded / Retired Approaches

Treat the following as **historical**, not as a backlog to restore:

| Topic | Status |
| --- | --- |
| ZIP extract → overwrite → hard refresh wrappers | Retired delivery method |
| Hero **pause on hover** / `pointerenter` stop | **Superseded**; current hero does not pause for pointer-over-hero |
| Hero fade V3 / longer / V4 timings | **Superseded** by V5 |
| `carouselDebug` query param | **Removed** from current JS |
| Homepage Unit Pendidikan 330×330 PAUD/TK cards | **SUPERSEDED HISTORICAL DESIGN** |
| `data-motion-unit-card` | **Historical**; not in current views |
| `logo-temporary.jpeg` | **Superseded / removed** |
| Motion V1 | **Superseded** by V2 (+ later hero V5) |
| Incremental sizing instead of reference rewrite | **Superseded** |
| Sejarah two-column layout | **Superseded** |
| Testimonial `role="button"` | **Removed** in Phase 4 (semantics); click-to-advance remains |
