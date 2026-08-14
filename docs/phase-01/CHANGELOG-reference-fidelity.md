# Change Log — Reference Fidelity Rewrite

## Ringkasan

Mengganti pendekatan incremental sizing menjadi **reference-driven layout rewrite** untuk homepage dan shell publik.

Referensi visual:
- topbar dua tingkat;
- navbar lebar sedang;
- hero jauh lebih dominan daripada header;
- feature cards overlap;
- konten utama lebih sempit;
- testimonial berupa green band dengan card overlap;
- news section compact;
- footer 3 kolom.

## File Diubah

- `resources/css/app.css`
- `resources/views/components/site/topbar.blade.php`
- `resources/views/components/site/navbar.blade.php`
- `resources/views/components/site/mobile-menu.blade.php`
- `resources/views/components/site/hero.blade.php`
- `resources/views/public/home/index.blade.php`
- `resources/views/components/site/footer.blade.php`
- `resources/js/app.js`

## Database
Tidak ada perubahan.

## Route
Tidak ada perubahan.

## Dependency
Tidak ada dependency baru.

## Content
Konten inti PAUD tetap digunakan. Struktur visual diubah agar lebih dekat ke reference.

## Verification

```bash
php artisan optimize:clear
npm run build
php artisan test
```

Review visual:
- 1920×1080
- 1440×900
- 1024×768
- 768×1024
- 390×844

## Risiko
Risk Level: MEDIUM

Alasan: perubahan presentation layer lebih luas daripada patch sebelumnya, tetapi tidak menyentuh backend/database.
