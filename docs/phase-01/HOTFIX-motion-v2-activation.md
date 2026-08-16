# Hotfix — Motion V2 Activation & First-Paint Reveal

## Problem

Motion System V2 sudah ada di repository, tetapi pada runtime browser user sempat menunjukkan:

```text
document.documentElement.className
"motion-ready"
```

Padahal progressive reveal V2 menggunakan selector berawalan:

```css
.js ...
```

Selain itu, elemen yang sudah berada di viewport saat observer dibuat dapat menerima state visible terlalu cepat, sehingga transisi awal sulit terlihat.

## Fix

### 1. Root motion bootstrap

Sebelum:

```js
document.documentElement.classList.add('motion-ready');
```

Sesudah:

```js
document.documentElement.classList.add('js', 'motion-ready');
```

Dengan ini `app.js` sendiri memastikan kedua class yang dibutuhkan Motion V2 tetap aktif.

### 2. Reveal observer first-paint guard

Observer tidak langsung dipasang pada frame yang sama.

Sekarang observer dimulai setelah dua `requestAnimationFrame()` agar browser sempat merender:

```text
opacity: 0
translateY(20px)
```

sebelum `motion-visible` mengubahnya menjadi:

```text
opacity: 1
translateY(0)
```

Ini membuat reveal pada elemen yang sudah dekat viewport lebih konsisten terlihat.

## Files Changed

- `resources/js/app.js`

## Not Changed

- CSS motion timing
- Blade layout
- homepage layout
- responsive dimensions
- routes
- database
- CMS
- dependencies

## Risk

LOW

## Verification

```bash
php artisan optimize:clear
npm run dev
```

Lalu hard refresh browser.

Console:

```js
document.documentElement.className
```

Expected:

```text
"js motion-ready"
```

Check CSS:

```js
getComputedStyle(document.documentElement).getPropertyValue('--motion-reveal')
```

Expected:

```text
600ms
```

Check reduced motion:

```js
window.matchMedia('(prefers-reduced-motion: reduce)').matches
```

Expected for normal motion:

```text
false
```

Then scroll from hero toward Visi & Misi and verify the 20px / 600ms fade-up is visible.
