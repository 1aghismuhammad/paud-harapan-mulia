# Back To Top Smooth Scroll V2

## Summary
Memperlambat animasi tombol kembali-ke-atas agar perjalanan scroll benar-benar terlihat dan terasa.

## Files changed
- `resources/js/app.js`

## Changes
- Easing diubah dari cubic ke `easeInOutSine` agar akselerasi dan deselerasi lebih gradual.
- Durasi minimum dinaikkan dari sekitar 1.3 detik menjadi sekitar 2.6 detik.
- Durasi maksimum dinaikkan dari 1.8 detik menjadi sekitar 4.2 detik untuk halaman panjang.
- Durasi tetap menyesuaikan jarak scroll.
- `prefers-reduced-motion` tetap dihormati.

## Database impact
None.

## Route impact
None.

## Dependency impact
None.

## Risk
LOW.

## Verification
- `node --check resources/js/app.js`
- Visual QA pada halaman pendek dan panjang.
