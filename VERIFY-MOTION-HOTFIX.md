# VERIFY — Motion V2 Activation Hotfix

Apply this ZIP to repository root.

Then run:

```cmd
php artisan optimize:clear
```

Keep these running in two terminals:

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

In Chrome DevTools Console check:

```js
document.documentElement.className
```

Expected:

```text
js motion-ready
```

Then:

```js
getComputedStyle(document.documentElement).getPropertyValue('--motion-reveal')
```

Expected:

```text
600ms
```

Then:

```js
window.matchMedia('(prefers-reduced-motion: reduce)').matches
```

Expected under normal settings:

```text
false
```

Do not push until these runtime checks pass and the reveal is visibly working.
