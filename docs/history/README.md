# Documentation History

This directory is a **historical narrative and index** for public UI work on PAUD Harapan Mulia.

It exists so humans and future AI agents can reconstruct important design decisions without reading dozens of one-off APPLY / VERIFY / REVIEW wrappers that used to live at the repository root.

## What these documents are

| File | Role |
| --- | --- |
| [`UI-DESIGN-HISTORY.md`](UI-DESIGN-HISTORY.md) | How major public UI areas evolved |
| [`UI-VERIFICATION-HISTORY.md`](UI-VERIFICATION-HISTORY.md) | Meaningful QA failures, hotfixes, and final verified behavior |
| [`PROJECT-DECISION-LOG.md`](PROJECT-DECISION-LOG.md) | Durable product/design decisions that should not be rediscovered by accident |

## What these documents are not

- They are **not** current product requirements.
- They are **not** current architecture.
- They are **not** Agent runbooks or patch instructions.
- They are **not** a substitute for `docs/phase-01/` changelogs and hotfixes.
- They must **not** be applied as if they were a current UI spec.

Historical documentation must not override current implementation, canonical project rules, current architecture, migrations, or current approved product requirements.

## Precedence

When history, canonical docs, and code disagree, use this order:

1. **Current implementation** (`resources/views/`, `resources/css/app.css`, `resources/js/app.js`, routes, tests)
2. **Project rules** (`AGENTS.md`, `AGENTS.custom-section.md`, `.agents/`)
3. **Current canonical product / architecture / design documentation** (`docs/PRD.md`, `docs/ARCHITECTURE.md`, `docs/DESIGN.md`, `docs/MASTER-PROMPT.md`, `docs/phase-01/UI-REFERENCE-CONTRACT.md`)
4. **Formal phase completion and changelog records** (`docs/phase-01/`, `docs/phase-03/`, `docs/phase-04/`, `docs/progress/`)
5. **This `docs/history/` narrative** (last)

If a historical note describes pause-on-hover, Unit Pendidikan homepage cards, ZIP extraction, or a debug query parameter, treat that as **past work** unless current source still does it.

## How future AI should use this folder

- Read these files to avoid repeating **rejected** approaches.
- Do **not** re-apply retired root wrappers (`APPLY-*.md`, `VERIFY-*.md`, `REVIEW-ALL-PAGES.md`).
- Do **not** restore superseded homepage Unit Pendidikan cards unless a Project Owner explicitly reopens that product decision.
- For numeric CSS, exact patch file lists, and per-commit change logs, open the linked `docs/phase-01/CHANGELOG-*` or `HOTFIX-*` file.
- After reading history, **re-check current source** before changing UI.

## Formal records that remain in place

Detailed Phase 1 implementation notes stay under [`docs/phase-01/`](../phase-01/). That includes:

- `CHANGELOG-*.md`
- `HOTFIX-*.md`
- [`UI-REFERENCE-CONTRACT.md`](../phase-01/UI-REFERENCE-CONTRACT.md)

Phase 3, Phase 4, and dated progress reports also stay where they are. This folder indexes and narrates; it does not replace those files.

## Retired delivery workflow

The deleted root Markdown files were short **ZIP apply/verify wrappers**: extract an archive, overwrite a few files, hard-refresh the browser. That delivery method is retired. The lasting knowledge is the behavior and the decisions, not the extract steps.

---

## Consolidated Historical Sources

Retired filenames below are **historical labels**, not live paths. Do not link them as current files.

### Global layout / reference fidelity

- `APPLY-REFERENCE-REWRITE.md`
- `REVIEW-ALL-PAGES.md`

Formal records kept: [`CHANGELOG-reference-fidelity.md`](../phase-01/CHANGELOG-reference-fidelity.md), [`CHANGELOG-all-pages-reference-alignment.md`](../phase-01/CHANGELOG-all-pages-reference-alignment.md)

### Topbar, navbar, dropdown, mobile

- `APPLY-DROPDOWN-V10.md`
- `ARTIFACT-CHECKS.json` (retired machine artifact from the dropdown V10 check; booleans only)

Formal record kept: [`CHANGELOG-dropdown-hover-bridge-v10.md`](../phase-01/CHANGELOG-dropdown-hover-bridge-v10.md), [`CHANGELOG-mobile-navigation.md`](../phase-01/CHANGELOG-mobile-navigation.md)

### Hero carousel / autoplay / fade

- `APPLY-HERO-AUTOPLAY.md`
- `VERIFY-HERO-AUTOPLAY.md`
- `VERIFY-HERO-CAROUSEL-V3.md`
- `VERIFY-HERO-FADE-LONGER.md`
- `VERIFY-HERO-FADE-V4.md`
- `VERIFY-HERO-FADE-V5.md`

Formal records kept: [`CHANGELOG-hero-autoplay-smooth-crossfade.md`](../phase-01/CHANGELOG-hero-autoplay-smooth-crossfade.md), [`HOTFIX-hero-autoplay-runtime.md`](../phase-01/HOTFIX-hero-autoplay-runtime.md), [`HOTFIX-hero-carousel-v3.md`](../phase-01/HOTFIX-hero-carousel-v3.md), [`HOTFIX-hero-fade-longer.md`](../phase-01/HOTFIX-hero-fade-longer.md), [`HOTFIX-hero-fade-v4.md`](../phase-01/HOTFIX-hero-fade-v4.md), [`HOTFIX-hero-fade-v5-visible.md`](../phase-01/HOTFIX-hero-fade-v5-visible.md)

### Homepage feature cards

- `APPLY-FEATURE-HOVER.md`
- `APPLY-FEATURE-LAYOUT-V2.md`
- `VERIFY-FEATURE-HOTFIX.md`

Formal records kept: [`CHANGELOG-home-feature-reference-hover.md`](../phase-01/CHANGELOG-home-feature-reference-hover.md), [`CHANGELOG-home-feature-layout-v2.md`](../phase-01/CHANGELOG-home-feature-layout-v2.md), [`HOTFIX-feature-card-css-regression.md`](../phase-01/HOTFIX-feature-card-css-regression.md)

### Homepage visi & misi imagery

- `APPLY-VISION-IMAGE-HOVER.md`

Formal record kept: [`CHANGELOG-vision-images-hover.md`](../phase-01/CHANGELOG-vision-images-hover.md)

### Homepage Unit Pendidikan (superseded) / Sekolah Kami (current)

- `APPLY-UNIT-BIGGER-V2.md`

Formal record kept for the **superseded** card sizing: [`CHANGELOG-unit-pendidikan-bigger-v2.md`](../phase-01/CHANGELOG-unit-pendidikan-bigger-v2.md)

The later Sekolah Kami homepage showcase has no retired APPLY wrapper. See current `resources/views/public/home/index.blade.php` and [`PROJECT-DECISION-LOG.md`](PROJECT-DECISION-LOG.md).

### PAUD / TK pages

- `APPLY-PAUD-REFERENCE-V2.md`
- `APPLY-PAUD-SHOWCASE-CAROUSEL.md`
- `APPLY-PAUD-SHOWCASE-HOVER-V4.md`
- `APPLY-TK-MATCH-PAUD-V4.md`
- `APPLY-PAUD-TK-MOBILE-SHOWCASE-V5.md`
- `APPLY-PAUD-TK-MOBILE-PROFILE-V6.md`
- `APPLY-INTERACTIVE-KEUNGGULAN-V7.md`
- `APPLY-KEUNGGULAN-SMOOTH-V8.md`

Formal records kept under `docs/phase-01/CHANGELOG-paud-*`, `CHANGELOG-tk-match-paud-v4.md`, `CHANGELOG-paud-tk-*`, and [`CHANGELOG-unit-showcase-autoplay-v1.md`](../phase-01/CHANGELOG-unit-showcase-autoplay-v1.md)

### Facilities

- `APPLY-FACILITIES-REFERENCE-V1.md`

Formal records kept: [`CHANGELOG-facilities-reference-layout.md`](../phase-01/CHANGELOG-facilities-reference-layout.md), [`CHANGELOG-facilities-mobile-autoplay-v2.md`](../phase-01/CHANGELOG-facilities-mobile-autoplay-v2.md), [`HOTFIX-facilities-mobile-autoplay-v3.md`](../phase-01/HOTFIX-facilities-mobile-autoplay-v3.md)

### Testimonials

- `APPLY-TESTIMONIAL-V9.md`

Formal records kept: [`CHANGELOG-testimonial-reference-match.md`](../phase-01/CHANGELOG-testimonial-reference-match.md), [`CHANGELOG-testimonial-responsive-slider-v9.md`](../phase-01/CHANGELOG-testimonial-responsive-slider-v9.md)

### Motion

- `APPLY-MOTION-SYSTEM.md`
- `APPLY-MOTION-SYSTEM-V2.md`
- `VERIFY-MOTION-HOTFIX.md`

Formal records kept: [`CHANGELOG-motion-interaction-system.md`](../phase-01/CHANGELOG-motion-interaction-system.md), [`CHANGELOG-motion-system-v2.md`](../phase-01/CHANGELOG-motion-system-v2.md), [`HOTFIX-motion-v2-activation.md`](../phase-01/HOTFIX-motion-v2-activation.md), [`docs/progress/2026-08-15-phase-01i-motion-system-v2.md`](../progress/2026-08-15-phase-01i-motion-system-v2.md)

### Complete retired wrapper list

Root Markdown wrappers removed in this consolidation (27 files):

1. `APPLY-DROPDOWN-V10.md`
2. `APPLY-FACILITIES-REFERENCE-V1.md`
3. `APPLY-FEATURE-HOVER.md`
4. `APPLY-FEATURE-LAYOUT-V2.md`
5. `APPLY-HERO-AUTOPLAY.md`
6. `APPLY-INTERACTIVE-KEUNGGULAN-V7.md`
7. `APPLY-KEUNGGULAN-SMOOTH-V8.md`
8. `APPLY-MOTION-SYSTEM.md`
9. `APPLY-MOTION-SYSTEM-V2.md`
10. `APPLY-PAUD-REFERENCE-V2.md`
11. `APPLY-PAUD-SHOWCASE-CAROUSEL.md`
12. `APPLY-PAUD-SHOWCASE-HOVER-V4.md`
13. `APPLY-PAUD-TK-MOBILE-PROFILE-V6.md`
14. `APPLY-PAUD-TK-MOBILE-SHOWCASE-V5.md`
15. `APPLY-REFERENCE-REWRITE.md`
16. `APPLY-TESTIMONIAL-V9.md`
17. `APPLY-TK-MATCH-PAUD-V4.md`
18. `APPLY-UNIT-BIGGER-V2.md`
19. `APPLY-VISION-IMAGE-HOVER.md`
20. `VERIFY-FEATURE-HOTFIX.md`
21. `VERIFY-HERO-AUTOPLAY.md`
22. `VERIFY-HERO-CAROUSEL-V3.md`
23. `VERIFY-HERO-FADE-LONGER.md`
24. `VERIFY-HERO-FADE-V4.md`
25. `VERIFY-HERO-FADE-V5.md`
26. `VERIFY-MOTION-HOTFIX.md`
27. `REVIEW-ALL-PAGES.md`

Retired machine artifact:

- `ARTIFACT-CHECKS.json`
