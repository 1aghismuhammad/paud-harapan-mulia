# APPLY — PAUD Showcase Hover Text V4

Extract ZIP ke root project.

Overwrite:

```text
resources/views/public/school/paud.blade.php
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

Expected:

1. semua gallery card tampil normal tanpa overlay;
2. arahkan mouse ke satu foto;
3. foto tersebut mendapat overlay gelap;
4. teks muncul dengan fade;
5. mouse keluar -> overlay hilang;
6. tombol kiri/kanan carousel tetap bekerja.
