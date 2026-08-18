# APPLY — PAUD/TK Mobile Profile V6

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

Cek:

```text
390 × 844
479 × 910
```

Expected:
- accent hijau terlihat di belakang sisi kiri foto;
- dua foto tetap berdampingan;
- foto lebih tinggi/portrait;
- gap lebih rapat;
- komposisi memenuhi lebar mobile tetapi tetap punya margin;
- desktop tetap sama seperti sebelumnya.
