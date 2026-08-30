# Project Decision Log

Durable product and design decisions for PAUD Harapan Mulia.

This log is **historical context**, not a substitute for current source or canonical PRD/architecture/design docs. If a later approved change contradicts an entry, update this log in a dedicated documentation pass — do not “fix” history silently inside application patches.

---

## No Galeri in the MVP

Date / Phase: Phase 0 / Phase 1A (UI reference contract approved 14 August 2026)

Context:
Early company-profile discussions included a gallery-style module in some references.

Decision:
MVP navigation has no Galeri. Photos are used as supporting visuals on profile and news pages, not as a standalone gallery product.

Reason:
Recorded in the Phase 1A contract and PRD as a locked MVP boundary.

Current effect:
Routes and nav omit Galeri. Do not add a gallery module without an explicit scope change.

Historical sources:
- [`docs/phase-01/UI-REFERENCE-CONTRACT.md`](../phase-01/UI-REFERENCE-CONTRACT.md)
- [`docs/PRD.md`](../PRD.md)
- [`docs/progress/2026-08-14-phase-00-foundation.md`](../progress/2026-08-14-phase-00-foundation.md)

---

## Reference-like design, not a literal clone

Date / Phase: Phase 1A / DESIGN v1.3

Context:
A visual reference guided layout language (whitespace, header, hero, cards, green testimonial band).

Decision:
Stay close to the reference in hierarchy and composition. Use Harapan Mulia green / orange / yellow, Indonesian labels, and PAUD/TK as the school units — not the reference institution’s identity or colors.

Reason:
DESIGN and the UI contract: similar layout language, not cloned branding.

Current effect:
Tokens and copy are Harapan Mulia-specific. Layout still follows the reference-driven rewrite.

Historical sources:
- [`docs/DESIGN.md`](../DESIGN.md)
- [`docs/phase-01/UI-REFERENCE-CONTRACT.md`](../phase-01/UI-REFERENCE-CONTRACT.md)

---

## Reference rewrite instead of endless incremental sizing

Date / Phase: Phase 1 (reference fidelity rewrite)

Context:
Pixel tweaks were not producing a page that read like the approved reference.

Decision:
Replace incremental sizing with a reference-driven layout rewrite of homepage and public shells (content width, hero dominance, overlapping feature/testimonial treatment, footer columns).

Reason:
Documented in the reference-fidelity changelog: incremental sizing was insufficient.

Current effect:
Public layout is the rewritten structure, later refined by all-pages alignment and proportion/breakpoint changelogs — not the pre-rewrite skeleton.

Historical sources:
- Retired wrapper: `APPLY-REFERENCE-REWRITE.md`
- [`CHANGELOG-reference-fidelity.md`](../phase-01/CHANGELOG-reference-fidelity.md)

---

## Hero does not pause simply on pointer hover

Date / Phase: Phase 1 hero autoplay hotfix

Context:
Early autoplay used pause on pointer enter. The APPLY wrapper `APPLY-HERO-AUTOPLAY.md` described pause on hover/focus as expected. On desktop the hero fills most of the viewport, so the cursor usually rested on the carousel and the timer never ran. Autoplay looked missing.

Decision:
Do **not** stop autoplay merely because the pointer is over the hero. Manual controls still reset the timer. Autoplay still pauses while the browser tab is hidden.

Reason:
Documented root cause in the autoplay runtime hotfix: pause-on-pointer plus a viewport-sized hero.

Current effect:
`resources/js/app.js` has no hero `pointerenter` pause. **Pause-on-hover is superseded historical behavior**, not a current requirement. `docs/DESIGN.md` may still mention hover pause; that is canonical drift for a later reconciliation pass.

Historical sources:
- Retired: `APPLY-HERO-AUTOPLAY.md`, `VERIFY-HERO-AUTOPLAY.md`
- [`HOTFIX-hero-autoplay-runtime.md`](../phase-01/HOTFIX-hero-autoplay-runtime.md)

---

## Hero V5 visible fade-through

Date / Phase: Phase 1 hero fade V5

Context:
Short crossfades (and later V3/V4 opacity-only fades) were hard to see when consecutive photos had similar tone.

Decision:
Use V5 fade-through: outgoing fade, brief white overlay, delayed incoming fade, subtle incoming zoom when motion is not reduced. Reduced motion keeps a gentler opacity dissolve without zoom.

Reason:
Formal V5 hotfix: the change must remain visible even when images look alike.

Current effect:
Current hero JS is the V5 implementation. Intermediate fade versions are **superseded**. `carouselDebug` from V3 verification is **removed**, not current.

Historical sources:
- Retired: `VERIFY-HERO-FADE-LONGER.md`, `VERIFY-HERO-FADE-V4.md`, `VERIFY-HERO-FADE-V5.md`, `VERIFY-HERO-CAROUSEL-V3.md`
- [`HOTFIX-hero-fade-v5-visible.md`](../phase-01/HOTFIX-hero-fade-v5-visible.md)

---

## Dropdown hover bridge

Date / Phase: Phase 1 dropdown V10

Context:
A 14px gap between nav label and panel dropped `group-hover` when the pointer moved slowly downward.

Decision:
Keep a transparent hover bridge and a tighter panel offset (`+3px`), with a wider panel and larger items. Apply to both Tentang Kami and Sekolah Kami. Leave mobile nav unchanged in that change.

Reason:
Documented gap/`group-hover` failure in the V10 changelog.

Current effect:
Still implemented in `navbar.blade.php`. Retired `ARTIFACT-CHECKS.json` only confirmed booleans for that patch.

Historical sources:
- Retired: `APPLY-DROPDOWN-V10.md`, `ARTIFACT-CHECKS.json`
- [`CHANGELOG-dropdown-hover-bridge-v10.md`](../phase-01/CHANGELOG-dropdown-hover-bridge-v10.md)

---

## Motion V2 and activation strategy

Date / Phase: Phase 1I Motion V2 + activation hotfix

Context:
V1 motion was replaced by V2 (reveal ~600ms, stagger, navbar underline, reduced-motion awareness). Reveals still failed when the root node had `motion-ready` but not `js`, because CSS required `.js`.

Decision:
Keep Motion V2 as the motion language. Bootstrap **both** `js` and `motion-ready`. Delay first reveal observation so the hidden state can paint.

Reason:
Activation hotfix: missing `js` class and same-frame visibility.

Current effect:
`app.js` still adds both classes. Homepage Unit Pendidikan card motion (`data-motion-unit-card`) is **historical / removed** with those cards; do not treat it as current.

Historical sources:
- Retired: `APPLY-MOTION-SYSTEM.md`, `APPLY-MOTION-SYSTEM-V2.md`, `VERIFY-MOTION-HOTFIX.md`
- [`CHANGELOG-motion-system-v2.md`](../phase-01/CHANGELOG-motion-system-v2.md)
- [`HOTFIX-motion-v2-activation.md`](../phase-01/HOTFIX-motion-v2-activation.md)

---

## Official logo replacing temporary logo

Date / Phase: Phase 1 branding

Context:
`logo-temporary.jpeg` was a dataset placeholder, not the school’s official mark.

Decision:
Use official `logo-official.webp` (and derived favicon) in public chrome. Keep adjacent school-name text on small nav where the wordmark would be unreadable.

Reason:
Changelog: placeholder was not the official logo; the owner supplied the real mark.

Current effect:
Current views use `logo-official.webp`. `logo-temporary.jpeg` is **superseded / removed**. Do not restore the temporary file as branding.

Historical sources:
- [`CHANGELOG-official-logo-branding.md`](../phase-01/CHANGELOG-official-logo-branding.md)

---

## PAUD / TK shared structure, unit-specific copy

Date / Phase: Phase 1 (TK match PAUD V4 and following)

Context:
Two unit routes must feel like one school system without mixing the two units’ wording.

Decision:
PAUD and TK pages share layout, spacing, showcase, keunggulan interaction, and responsive behavior. Headings and body copy stay specific to each unit.

Reason:
Stated in the TK-match APPLY/changelog: same structure, distinct content.

Current effect:
`paud.blade.php` and `tk.blade.php` remain parallel. Navbar still exposes both routes.

Historical sources:
- Retired: `APPLY-TK-MATCH-PAUD-V4.md` and later `APPLY-PAUD-TK-*` / keunggulan wrappers
- [`CHANGELOG-tk-match-paud-v4.md`](../phase-01/CHANGELOG-tk-match-paud-v4.md)

---

## Testimonials remain placeholder pending production content

Date / Phase: Phase 1 (locked in PRD/DESIGN); still pending production content

Context:
The reference includes a testimonial band. Real parent quotes were not available for Phase 1.

Decision:
Keep the section for UI completeness with clearly placeholder quotes. Before production, replace with real testimonials or disable the section.

Reason:
PRD/DESIGN/README production rule: placeholders are development-only.

Current effect:
Homepage still shows placeholder names/quotes. This is **current** until Phase 2/production content lands. Do not treat placeholders as real endorsements.

Historical sources:
- [`docs/PRD.md`](../PRD.md), [`docs/DESIGN.md`](../DESIGN.md)
- Retired: `APPLY-TESTIMONIAL-V9.md`
- [`CHANGELOG-testimonial-responsive-slider-v9.md`](../phase-01/CHANGELOG-testimonial-responsive-slider-v9.md)

---

## Phase 2 client content did not block Phase 3/4 technical work

Date / Phase: 2026-08-23 status through Phase 4 completion (2026-08-25)

Context:
Phase 2 (final static copy, real testimonials, verified contacts) waits on the client.

Decision:
Continue Phase 3 (admin + news CMS) and Phase 4 (hardening) without treating Phase 2 as DONE.

Reason:
Progress and Phase 3/4 records: Phase 2 remains waiting; technical phases proceeded.

Current effect:
CMS and hardening exist. Homepage/testimonial/copy may still be placeholder. Phase 2 is not closed.

Historical sources:
- [`docs/progress/2026-08-23-project-status.md`](../progress/2026-08-23-project-status.md)
- [`docs/progress/2026-08-23-phase-03-completion.md`](../progress/2026-08-23-phase-03-completion.md)
- [`docs/phase-04/PHASE-04-COMPLETION.md`](../phase-04/PHASE-04-COMPLETION.md)

---

## Homepage Unit Pendidikan → Sekolah Kami

Date / Phase: After Phase 1 unit-card work; recorded from current source plus Project Owner rationale (consolidation pass)

Context:
The homepage previously presented **PAUD and TK as two separate Unit Pendidikan cards** (including a later **330×330px** desktop treatment). That card grid is **SUPERSEDED HISTORICAL DESIGN**.

Decision:
Replace that homepage presentation with **one “Sekolah Kami” showcase**.

Reason:
The homepage should present Harapan Mulia as **one school identity and one learning environment** rather than framing the homepage section as a **PAUD-vs-TK choice**.

(No other rationale is recorded. Do not infer conversion, analytics, SEO, marketing research, or user testing.)

Current effect:

- Homepage has one Sekolah Kami showcase
- PAUD/TK cards are no longer shown in that section
- PAUD and TK pages and routes still exist
- PAUD/TK remain reachable through navigation as currently implemented

Historical sources:

- Retired (superseded card sizing only): `APPLY-UNIT-BIGGER-V2.md`
- Kept: [`CHANGELOG-unit-pendidikan-bigger-v2.md`](../phase-01/CHANGELOG-unit-pendidikan-bigger-v2.md)
- Current implementation: `resources/views/public/home/index.blade.php`
- Rationale: Project Owner, documentation consolidation approval
