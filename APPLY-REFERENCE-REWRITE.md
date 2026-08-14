# Cara Menerapkan Reference Fidelity Rewrite

Copy seluruh isi ZIP ke **root project Laravel** dan izinkan overwrite file.

Target root contoh:

```text
D:\dingcoding\paud1\
```

Setelah copy, verifikasi file:

```powershell
Select-String -Path "resources\views\public\home\index.blade.php" -Pattern "Testimonial: green band"
Select-String -Path "resources\css\app.css" -Pattern "reference-hero-container"
Select-String -Path "resources\views\components\site\hero.blade.php" -Pattern "aspect-\[2.08/1\]"
```

Ketiganya harus menghasilkan output.

Lalu:

```powershell
php artisan optimize:clear
npm run build
php artisan test
```

Untuk development:

```powershell
php artisan serve
```

terminal kedua:

```powershell
npm run dev
```

Lakukan hard refresh browser:

```text
Ctrl + Shift + R
```
