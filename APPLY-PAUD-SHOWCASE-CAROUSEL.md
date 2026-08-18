# APPLY — PAUD Showcase Carousel V3

Extract ZIP langsung ke root project.

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

Review:

```text
/sekolah/paud
```

Expected:
- decorative label kiri tetap seperti reference;
- 3 gallery cards desktop;
- circular left/right arrows;
- card aktif gelap dengan judul;
- klik arrow menggeser gallery;
- active overlay berpindah;
- mobile dapat swipe.
