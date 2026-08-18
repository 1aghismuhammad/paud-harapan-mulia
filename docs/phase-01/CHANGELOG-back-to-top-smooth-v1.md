# Back To Top Smooth V1

## Summary
Mengubah perilaku tombol "Kembali ke atas" pada footer dari navigasi anchor biasa menjadi animasi scroll vertikal yang lebih lambat dan halus.

## Files changed
- `resources/views/components/site/footer.blade.php`
- `resources/js/app.js`

## Why
Klik tombol sebelumnya mengikuti perilaku anchor/native smooth scroll sehingga perpindahan ke atas dapat terasa terlalu cepat. Implementasi baru menggunakan `requestAnimationFrame` dengan easing `easeInOutCubic` dan durasi sekitar 1.3–1.8 detik tergantung jarak scroll.

## Database impact
None.

## Migration impact
None.

## Route impact
None.

## Dependency impact
None.

## Accessibility
`prefers-reduced-motion: reduce` tetap dihormati; pada kondisi tersebut halaman kembali ke atas tanpa animasi panjang.

## Risk
LOW

## What was NOT changed
- Layout footer
- Ukuran/warna tombol
- Navbar
- Route
- Konten halaman lain
