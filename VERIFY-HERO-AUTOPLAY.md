# VERIFY HERO AUTOPLAY

1. Extract ZIP into repository root.
2. Run:

```cmd
php artisan optimize:clear
```

3. Start:

```cmd
php artisan serve
```

and:

```cmd
npm run dev
```

4. Hard refresh: `Ctrl + Shift + R`.
5. Keep the cursor on top of the hero.
6. Wait 7–8 seconds.

The slide must change automatically even while the cursor remains on the hero.

Before push:

```cmd
npm run build
php artisan test
git diff --check
```
