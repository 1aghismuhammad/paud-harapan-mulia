# APPLY — Feature Cards Reference Hover

Extract ZIP langsung ke root repository dan overwrite file yang sama.

Struktur:

```text
resources/
public/
docs/
```

Setelah apply:

```cmd
php artisan optimize:clear
```

Pastikan development server aktif:

```cmd
php artisan serve
```

dan:

```cmd
npm run dev
```

Hard refresh browser:

```text
Ctrl + Shift + R
```

Expected desktop hover:

1. pointer masuk card;
2. outline hijau muncul;
3. bottom accent hijau muncul;
4. icon berubah dark -> hijau;
5. shadow sedikit menguat;
6. card hanya bergerak sekitar 1px.

Jangan push sebelum visual lokal sudah sesuai.
