# VERIFY — Longer Hero Fade

Apply ZIP ke root project, lalu:

```cmd
php artisan optimize:clear
```

Pastikan:

```cmd
php artisan serve
```

dan:

```cmd
npm run dev
```

Hard refresh:

```text
Ctrl + Shift + R
```

Tunggu 7 detik.

Expected:
- gambar lama fade-out sekitar 1.4 detik;
- gambar baru fade-in sekitar 1.6 detik;
- perpindahan harus jauh lebih terlihat daripada versi sebelumnya.
