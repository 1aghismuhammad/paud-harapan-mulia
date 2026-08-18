# VERIFY — Hero Fade V5

Apply ZIP ke root project.

Kemudian:

```cmd
php artisan optimize:clear
```

Run:

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
1. gambar lama mulai memudar;
2. layar hero menjadi sedikit lebih terang/putih;
3. gambar baru masuk perlahan;
4. seluruh dissolve terlihat sekitar 1.5–1.8 detik.

Runtime state:

```js
document.querySelector('[data-carousel]').dataset.carouselTransition
```

Saat transisi:

```text
running
```

Setelah selesai:

```text
idle
```
