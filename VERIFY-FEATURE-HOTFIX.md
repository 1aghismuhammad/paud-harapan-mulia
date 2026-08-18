# VERIFY — Feature Card Regression Hotfix

Hotfix ini dibuat dari `paud1.zip` yang dikirim user.

Apply ke root project, overwrite:

```text
resources/css/app.css
```

Kemudian jalankan:

```cmd
php artisan optimize:clear
```

Pastikan:

```cmd
npm run dev
```

dan:

```cmd
php artisan serve
```

Hard refresh:

```text
Ctrl + Shift + R
```

Jangan push sebelum:
1. icon tidak dobel;
2. card box kembali;
3. hover hijau bekerja;
4. hero autoplay tetap bekerja.
