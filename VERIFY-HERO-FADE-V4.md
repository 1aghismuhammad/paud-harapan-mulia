# VERIFY — Hero Fade V4

Apply ZIP to repository root.

Then:

```cmd
php artisan optimize:clear
```

Run:

```cmd
php artisan serve
```

and:

```cmd
npm run dev
```

Hard refresh:

```text
Ctrl + Shift + R
```

Wait 7 seconds.

Expected transition:

```text
old image fades out ~900ms
+
new image fades in ~1100ms
```

For exact runtime check:

```js
document.querySelector('[data-carousel]').dataset.carouselTransition
```

During fade:

```text
running
```

After fade:

```text
idle
```

Motion check:

```js
document.querySelector('[data-carousel]').dataset.carouselMotion
```

For visible fade it must be:

```text
full
```

If result is:

```text
reduced
```

the browser/OS accessibility setting is requesting reduced motion, therefore fade is intentionally disabled.
