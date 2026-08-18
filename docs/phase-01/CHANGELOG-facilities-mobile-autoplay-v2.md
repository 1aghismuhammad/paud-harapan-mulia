# Facilities Mobile Autoplay V2

## Summary
Menambahkan autoplay khusus mobile pada carousel halaman Fasilitas dengan transisi yang lebih halus dan karakter visual mendekati hero carousel.

## Files changed
- `resources/views/public/about/facilities.blade.php`
- `docs/phase-01/CHANGELOG-facilities-mobile-autoplay-v2.md`

## Why
Pada viewport mobile, pengguna perlu melihat variasi dokumentasi fasilitas tanpa harus selalu melakukan swipe manual.

## Behavior
- Autoplay hanya aktif pada viewport `< 640px`.
- Interval pergantian foto: 6000 ms.
- Transisi antar foto berdekatan: slide lembut + opacity + subtle scale selama 950 ms.
- Loop terakhir -> pertama memakai fade-through agar tidak meluncur melewati seluruh daftar foto.
- Swipe manual tetap tersedia dan mereset timer autoplay.
- Autoplay berhenti ketika tab browser tidak aktif atau carousel keluar viewport.
- `prefers-reduced-motion` menonaktifkan autoplay dan mempertahankan navigasi manual.

## Database impact
None.

## Migration impact
None.

## Route impact
None.

## Dependency impact
None.

## Risk
LOW.

## What was NOT changed
- Layout desktop/tablet.
- Isi/nama fasilitas.
- Route.
- Asset foto.
- Navbar, footer, dan halaman lain.

## Verification
- Validasi struktur Blade/JavaScript secara statis.
- Jalankan pada environment project lengkap:
  - `php artisan optimize:clear`
  - `npm run build`
  - `php artisan test`
- Visual QA minimal pada 390x844 dan 478px mobile width.
