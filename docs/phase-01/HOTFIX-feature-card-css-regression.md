# Hotfix — Feature Card CSS Regression

## Root Cause

Project ZIP terbaru sudah menggunakan markup homepage baru:

- `.home-feature-card`
- `.home-feature-icon`
- `.home-feature-icon-default`
- `.home-feature-icon-hover`

Tetapi `resources/css/app.css` kembali ke state lama yang hanya mempunyai `.home-feature-container`.

Dampak:

- icon default dan icon hover tampil bersamaan;
- kedua icon bertumpuk vertikal;
- card kehilangan box/shadow;
- hover reference tidak bekerja.

Regression terjadi karena patch frontend sebelumnya membawa file `app.css` dari state sebelum feature-card styling digabungkan.

## Fix

Hotfix ini hanya mengembalikan styling feature card ke CSS project terbaru.

Dipulihkan:

- framed outer container;
- individual white cards;
- icon overlay default/green;
- green border on hover;
- green bottom accent;
- soft hover shadow;
- title/copy sizing;
- responsive dimensions.

## Files Changed

- `resources/css/app.css`

## Intentionally NOT Changed

- `resources/js/app.js`
- hero autoplay
- hero crossfade
- Motion System V2
- homepage Blade
- icon assets
- routes
- database
- dependencies

## Risk

LOW

## Verification

```cmd
php artisan optimize:clear
npm run dev
php artisan serve
```

Hard refresh:

```text
Ctrl + Shift + R
```

Expected:
- hanya satu icon terlihat pada normal state;
- green icon hanya terlihat saat hover;
- tiga cards kembali memiliki white card layout;
- green outline + bottom accent muncul saat hover;
- hero autoplay tetap 7 detik.
