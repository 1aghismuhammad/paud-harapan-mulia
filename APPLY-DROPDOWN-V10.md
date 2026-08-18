# APPLY — Dropdown Hover Bridge V10

Extract ZIP ke root project.

Overwrite:

```text
resources/views/components/site/navbar.blade.php
```

Kemudian:

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

## QA

Desktop:

1. hover `Tentang Kami`;
2. gerakkan mouse perlahan ke dropdown;
3. dropdown tidak boleh hilang di tengah perjalanan;
4. ulangi untuk `Sekolah Kami`;
5. cek item lebih mudah diklik karena area lebih besar.

Mobile navigation tidak berubah.
