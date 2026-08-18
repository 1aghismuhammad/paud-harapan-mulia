# Hotfix — Facilities Mobile Autoplay V3

## Summary
Memperbaiki autoplay carousel Fasilitas pada mobile yang sudah ada di source tetapi dapat berhenti tanpa error.

## Root cause
Implementasi V2 tidak mengikuti scheduling hero sepenuhnya. Timer autoplay Fasilitas diblokir oleh dua kondisi tambahan:
- `prefers-reduced-motion: reduce`
- status visibilitas `IntersectionObserver` minimal 18%

Akibatnya, pada browser/perangkat tertentu carousel tetap menampilkan foto pertama tanpa error JavaScript, sementara hero tetap autoplay karena hero tidak menggunakan dua gate tersebut untuk menjadwalkan slide berikutnya.

## Changes
- Autoplay mobile berjalan selama viewport `< 640px`, tab aktif, dan jumlah foto > 1.
- Menghapus `IntersectionObserver` sebagai gate autoplay.
- `prefers-reduced-motion` tidak lagi mematikan autoplay; hanya mengganti transisi menjadi opacity dissolve tanpa spatial slide/scale.
- Interval autoplay diubah menjadi 5200 ms agar pergantian terlihat lebih jelas saat QA.
- Swipe manual tetap mereset timer.
- Desktop/tablet tidak diubah.

## Files changed
- `resources/views/public/about/facilities.blade.php`
- `docs/phase-01/HOTFIX-facilities-mobile-autoplay-v3.md`

## Database / Route / Dependency impact
None.

## Risk
LOW.

## Verification
- Inline JavaScript syntax check dengan `node --check`.
- Konfirmasi tidak ada lagi gate `IntersectionObserver` pada carousel Fasilitas.
- QA target: mobile 390px dan 478px; tunggu sekitar 5.2 detik dan pastikan foto berpindah otomatis.
- Jalankan di environment project lengkap: `php artisan optimize:clear`, `npm run build`, `php artisan test`.
