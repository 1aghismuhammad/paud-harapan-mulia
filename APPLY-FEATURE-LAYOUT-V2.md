# APPLY — Feature Layout V2

Extract ZIP ke root project lalu overwrite file yang sama.

Jalankan:

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

Lalu hard refresh:

```text
Ctrl + Shift + R
```

Expected desktop:

1. Hero menjadi fokus viewport awal.
2. Feature cards baru muncul setelah scroll sedikit.
3. Outer wrapper memiliki soft shadow seperti reference.
4. Hover card:
   - green outline;
   - green bottom bar;
   - icon dark -> green;
   - tidak ada card jump/lift.
