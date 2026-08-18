# CHANGELOG — Official Logo Branding

## Summary
Mengganti identitas/logo sementara pada header website dengan logo resmi PAUD IT Harapan Mulia yang diberikan oleh pemilik project, sekaligus menyesuaikan proporsinya untuk desktop dan mobile.

## Files changed
- `public/images/paud/logo-official.webp` — asset logo resmi yang dioptimalkan untuk web tanpa mengubah desain/logo.
- `public/favicon.ico` — favicon diturunkan dari elemen visual logo resmi.
- `resources/views/components/site/topbar.blade.php` — logo desktop menggunakan asset resmi dan ukuran disesuaikan.
- `resources/views/components/site/navbar.blade.php` — logo mobile navbar menggunakan asset resmi dan ukuran disesuaikan.
- `resources/views/components/site/mobile-menu.blade.php` — logo pada drawer mobile menggunakan asset resmi dan ukuran disesuaikan.
- `resources/views/layouts/public.blade.php` — favicon website ditautkan secara eksplisit.
- `docs/phase-01/CHANGELOG-official-logo-branding.md` — catatan perubahan ini.

## Why
Asset `logo-temporary.jpeg` sebelumnya bukan logo resmi sekolah dan hanya digunakan sebagai placeholder. Logo resmi sekarang sudah tersedia sehingga placeholder harus diganti di seluruh titik branding yang saat ini menampilkan logo.

## Visual adjustments
- Desktop topbar: logo dibuat lebih tinggi dan lebih proporsional untuk rasio logo resmi.
- Mobile navbar: logo menggunakan bidang persegi agar simbol utama tetap terbaca tanpa memperlebar navbar.
- Mobile drawer: mengikuti ukuran mobile navbar agar branding konsisten.
- Nama sekolah di samping logo tetap dipertahankan karena teks lengkap di dalam logo menjadi terlalu kecil pada ukuran navigasi mobile.

## Database impact
None.

## Migration impact
None.

## Route impact
None.

## Dependency impact
None.

## Testing
Static verification performed:
- memastikan tidak ada view aktif yang masih mereferensikan `logo-temporary.jpeg`;
- memastikan semua path asset logo baru tersedia;
- memastikan favicon baru tersedia.

Full Laravel/Vite verification belum dijalankan karena snapshot project yang diterima tidak menyertakan `vendor/` dan `node_modules/`.

## Risk
LOW

## What was NOT changed
- struktur header/navbar;
- navigation behavior/dropdown;
- layout footer;
- warna brand global;
- database/content;
- hero, testimonial, unit pendidikan, atau section homepage lain;
- desain asli logo resmi.
