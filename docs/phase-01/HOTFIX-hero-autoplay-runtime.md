# Hotfix — Hero Autoplay Runtime

## Root Cause

Autoplay hero sebenarnya sudah ada di repository, tetapi dihentikan oleh:

```js
carousel.addEventListener('pointerenter', stop);
carousel.addEventListener('pointerleave', restart);
```

Karena hero memenuhi sebagian besar viewport, cursor desktop sangat mudah berada di area hero setelah load. Akibatnya timer berhenti dan carousel terlihat seperti tidak mempunyai autoplay.

## Fix

### Autoplay
- interval: `7000ms`
- tidak berhenti hanya karena pointer berada di hero
- manual prev/next/dot tetap me-reset timer
- timer berhenti saat browser/tab hidden
- timer aktif lagi saat tab visible

### Crossfade
- `900ms` -> `1000ms`
- easing menggunakan `--ease-smooth`

### Subtle Hero Zoom
- `scale(1.03)` -> `scale(1.025)`
- `5000ms` -> `6500ms`

## Files Changed

- `resources/js/app.js`
- `resources/css/app.css`

## Not Changed

- hero markup
- hero images
- dimensions
- routes
- database
- dependencies
- other homepage sections

## Risk

LOW

## Verification

Run development servers:

```cmd
php artisan serve
```

```cmd
npm run dev
```

Hard refresh:

```text
Ctrl + Shift + R
```

Then leave the mouse anywhere on the hero and do not click.

Expected:
- at ~7 seconds, slide 1 -> slide 2 automatically;
- transition takes ~1 second;
- another ~7 seconds later, slide 2 -> slide 3;
- dots update automatically.

Browser console quick check:

```js
document.querySelectorAll('[data-carousel-slide]').length
```

Expected:

```text
3
```

After 8 seconds:

```js
[...document.querySelectorAll('[data-carousel-slide]')].map((el) => el.classList.contains('is-active'))
```

The `true` value should have moved from the first slide to the second slide.
