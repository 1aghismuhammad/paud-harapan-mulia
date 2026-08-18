# APPLY — Testimonial Responsive Slider V9

Extract ZIP ke root project dan overwrite:

```text
resources/js/app.js
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

## Desktop QA

Viewport contoh:

```text
1440 × 900
1920 × 1080
```

Expected:
1. 3 komentar terlihat;
2. tunggu 6.5 detik;
3. slide berpindah ke 3 komentar berikutnya;
4. klik salah satu card -> langsung slide berikutnya;
5. klik dot -> pindah grup.

## Mobile QA

Viewport:

```text
390 × 844
479 × 910
```

Expected:
1. hanya 1 komentar terlihat;
2. tidak ada 3 card bertumpuk ke bawah;
3. tunggu 6.5 detik -> komentar berikutnya;
4. tap/click card -> komentar berikutnya;
5. swipe kiri/kanan tetap bekerja;
6. setelah testimonial ke-6 kembali ke testimonial pertama.

Sebelum push:

```cmd
npm run build
php artisan test
git diff --check
```
