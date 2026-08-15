# Phase 1I — Motion & Interaction System

## Summary

Menambahkan sistem motion ringan untuk public website PAUD Harapan Mulia tanpa dependency animasi baru.

Motion direction:
- soft educational motion
- singkat, tenang, tidak berlebihan
- dominan `opacity`, `transform`, `translate`, dan `scale`
- progressive enhancement
- menghormati `prefers-reduced-motion`

## Files changed

- `resources/css/app.css`
- `resources/js/app.js`
- `resources/views/public/home/index.blade.php`

## Added

### Cross-page transition
Native View Transition progressive enhancement:
- outgoing page fade: ~160 ms
- incoming page fade: ~240 ms

Jika browser tidak mendukung, navigasi tetap normal.

### Initial page motion
Hero:
- fade in
- translateY kecil
- ~420 ms

### Scroll reveal
Top-level public sections:
- opacity 0 -> 1
- translateY 12px -> 0
- ~460 ms

Homepage highlight cards:
- stagger 70 ms per card

### Hover / micro interactions
Applied to:
- reference cards
- soft cards
- news cards
- media cards
- navbar links
- dropdown items
- icon buttons
- carousel controls
- pagination dots
- footer links
- green CTA buttons

Motion remains subtle:
- card lift ~4px
- media scale ~1.035
- controls scale ~1.05
- dots scale ~1.22

### Mobile navigation
Drawer now:
- overlay fades in/out
- panel slides from left
- close waits for transition before `hidden`

Mobile submenu:
- fade + translateY
- plus vertical line is synchronized with expanded state

### Hero carousel
- carousel controls now scoped to each `[data-carousel]`
- slide change gets a light fade-in
- autoplay pauses on pointer hover/focus
- autoplay disabled for reduced-motion users

### Testimonial
Moved testimonial behavior from inline Blade script into:
`resources/js/app.js`

Preserved:
- dot navigation
- touch swipe

Added:
- keyboard ArrowLeft / ArrowRight support

## Removed

Inline `<script>` testimonial logic from:
`resources/views/public/home/index.blade.php`

## Database impact

NONE

## Route impact

NONE

## Dependency impact

NONE

## Content impact

NONE

## Risk

LOW-MEDIUM

Reason:
Presentation and interaction layer only, but JavaScript behavior for navigation/carousels is touched.

## Verification

Run:

```bash
php artisan optimize:clear
npm run build
php artisan test
php artisan route:list
```

Browser QA:

- 390 × 844
- 768 × 1024
- 1440 × 900
- 1920 × 1080

Interaction QA:

1. Open homepage: hero appears softly.
2. Scroll: sections fade-up only once.
3. Hover cards: slight lift, no layout shift.
4. Navigate Beranda -> Sejarah -> PAUD -> Berita: cross-fade when supported.
5. Open/close mobile drawer: panel and overlay animate smoothly.
6. Expand mobile submenu: transition works, plus/minus state remains correct.
7. Hero prev/next/dots work.
8. Hero autoplay pauses while hovered/focused.
9. Testimonial dots work.
10. Testimonial swipe works.
11. Reduced-motion OS/browser setting removes non-essential motion.

## Not changed

- database
- migrations
- routes
- controllers
- auth
- CMS
- content
- asset paths
- design dimensions
- footer structure
- homepage proportions
