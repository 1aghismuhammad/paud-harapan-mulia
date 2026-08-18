# Unit Showcase Autoplay V1

## Summary
Menambahkan autoplay 5 detik pada carousel Fasilitas, Aktivitas, dan Pembiasaan di halaman PAUD dan TK.

## Files changed
- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`

## Why
Carousel sebelumnya hanya berpindah melalui tombol panah atau swipe. Autoplay ditambahkan agar dokumentasi foto berganti otomatis seperti pola interaksi carousel hero.

## Behavior
- Autoplay setiap 5000 ms pada mobile, tablet, dan desktop.
- Transisi slide 850 ms dengan easing halus.
- Desktop bergerak melalui seluruh posisi valid untuk 3 kartu terlihat; tablet 2 kartu; mobile 1 kartu.
- Tombol panah dan swipe tetap bekerja dan mereset timer autoplay.
- Autoplay berhenti ketika tab browser tidak aktif dan berjalan kembali saat tab aktif.
- `prefers-reduced-motion` menghilangkan animasi gerak, tetapi pergantian konten tetap berjalan.

## Database impact
None.

## Route impact
None.

## Dependency impact
None.

## Risk
LOW.

## What was NOT changed
- Konten showcase.
- Layout showcase.
- Halaman lain.
- Database dan route.
