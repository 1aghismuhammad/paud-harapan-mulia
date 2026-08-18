# VERIFY — Hero Carousel V3

## 1. Apply

Extract ZIP to repository root and overwrite:

```text
resources/js/app.js
resources/css/app.css
```

## 2. Clear Cache

```cmd
php artisan optimize:clear
```

## 3. Start Development

Terminal 1:

```cmd
php artisan serve
```

Terminal 2:

```cmd
npm run dev
```

## 4. Hard Refresh

```text
Ctrl + Shift + R
```

## 5. Exact Runtime Test

Open DevTools Console.

Run:

```js
document.querySelector('[data-carousel]').dataset.carouselActive
```

Expected initially:

```text
0
```

Wait 8 seconds and run again:

```js
document.querySelector('[data-carousel]').dataset.carouselActive
```

Expected:

```text
1
```

Then:

```js
document.querySelector('[data-carousel]').dataset.carouselAutoplay
```

Expected:

```text
running
```

Then:

```js
document.querySelector('[data-carousel]').dataset.carouselMotion
```

Expected normally:

```text
full
```

If it says:

```text
reduced
```

your operating system/browser is requesting reduced motion. Autoplay will still work, but fade is intentionally disabled for accessibility.

## Optional Debug

Open:

```text
http://localhost:8000/?carouselDebug=1
```

Then watch Console while waiting for transitions.
