# APPLY — PAUD/TK Mobile Showcase V5

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

## Mobile QA

Gunakan DevTools:

```text
390 × 844
479 × 910
```

Expected:

1. decorative label hampir selebar viewport;
2. dua pastel panels terlihat besar seperti reference;
3. white label pill berada di kanan bawah;
4. gallery hanya menampilkan satu foto penuh;
5. tidak ada foto berikutnya mengintip;
6. arrow tidak tampil di mobile;
7. swipe tetap berfungsi;
8. overlay teks tampil pada active card;
9. desktop tetap menggunakan hover untuk overlay.
