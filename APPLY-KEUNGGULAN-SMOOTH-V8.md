# APPLY — Keunggulan Smooth V8

Extract ZIP ke root project.

Overwrite:

```text
resources/views/public/school/paud.blade.php
resources/views/public/school/tk.blade.php
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
- komentar `{-- ... --}` tidak boleh terlihat;
- klik menu kiri;
- konten kanan fade/slide dengan halus.

Mobile:
- klik item;
- panel slide-down + fade;
- klik item lain;
- panel lama slide-up, panel baru slide-down;
- klik item aktif;
- panel slide-up dan menutup.
