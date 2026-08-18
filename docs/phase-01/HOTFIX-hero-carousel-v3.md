# Hotfix — Hero Carousel V3 Deterministic

## Source

Fix dibuat langsung dari project `paud1(1).zip` yang diberikan user.

## Diagnosis

Source project sudah mempunyai:

- interval hero 7000ms;
- CSS crossfade 1000ms;
- Vite terkoneksi;
- browser log tanpa JavaScript error.

Namun autoplay dan fade sama-sama dikontrol oleh:

```js
prefersReducedMotion()
```

Pada implementation sebelumnya:

```js
if (!prefersReducedMotion()) {
    timer = setInterval(...)
}
```

dan pada `show()`:

```js
if (prefersReducedMotion()) {
    slide.hidden = ...
    return;
}
```

Jika OS/browser melaporkan `prefers-reduced-motion: reduce`:

1. timer autoplay tidak dibuat;
2. transition CSS tidak digunakan;
3. slide hanya diganti menggunakan `hidden`.

Ini satu kondisi yang dapat menjelaskan dua gejala sekaligus:
- gambar tidak ganti otomatis;
- fade in/out tidak terlihat.

## Fix V3

### Autoplay

Autoplay sekarang independen dari reduced motion:

```text
7000ms per slide
```

Menggunakan chained `setTimeout`, bukan repeating `setInterval`.

Manfaat:
- lebih deterministic;
- timer mudah di-reset setelah manual navigation;
- tidak menumpuk interval;
- tidak drift ketika tab hidden.

### Reduced Motion

Reduced motion hanya mengubah visual:

```text
normal motion:
7s autoplay + 1.2s crossfade

reduced motion:
7s autoplay + instant cut
```

Jadi functionality carousel tetap ada.

### Real Crossfade

Semua slide tetap rendered pada enhanced mode.

Inactive:

```text
opacity: 0
z-index: 1
```

Active:

```text
opacity: 1
z-index: 2
```

Transition:

```text
opacity 1200ms ease-in-out
```

Ini menghasilkan dissolve/fade yang lebih jelas dibanding perubahan state sebelumnya.

### Image Preload

Slide 2 dan 3 dipreload melalui native `Image()` supaya fade pertama tidak menunggu lazy image network request.

### Subtle Zoom

```text
scale 1.02 -> 1
6800ms
```

### Runtime Diagnostics

Carousel sekarang mempunyai:

```text
data-carousel-active
data-carousel-autoplay
data-carousel-motion
```

Contoh:

```html
data-carousel-active="1"
data-carousel-autoplay="running"
data-carousel-motion="full"
```

## Files Changed

- `resources/js/app.js`
- `resources/css/app.css`

## Preserved

- feature-card CSS regression hotfix;
- feature hover;
- homepage Blade;
- hero dimensions;
- image paths;
- navbar;
- testimonial;
- routes;
- database;
- dependencies.

## Risk

LOW-MEDIUM

JavaScript hero behavior diubah, tetapi scope dibatasi ke carousel public hero.

## Local Verification

Run:

```cmd
php artisan optimize:clear
php artisan serve
npm run dev
```

Hard refresh.

Console:

```js
document.querySelector('[data-carousel]').dataset
```

Expected values include:

```text
carouselActive
carouselAutoplay
carouselMotion
```

Check active:

```js
document.querySelector('[data-carousel]').dataset.carouselActive
```

Immediately:

```text
0
```

After ±8 seconds:

```text
1
```

After another ±7 seconds:

```text
2
```

Autoplay:

```js
document.querySelector('[data-carousel]').dataset.carouselAutoplay
```

Expected:

```text
running
```

Motion mode:

```js
document.querySelector('[data-carousel]').dataset.carouselMotion
```

Normal:

```text
full
```

If browser has reduced motion:

```text
reduced
```

Even in `reduced`, `carouselActive` must still advance every 7 seconds.
