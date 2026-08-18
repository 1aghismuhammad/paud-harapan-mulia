# Change Log — Homepage Feature Cards Lower Position

## Summary

Menurunkan posisi tiga highlight card homepage setelah hero.

## Before

```text
base: -mt-8
md:   -mt-11
lg:   -mt-12
```

Desktop overlap sekitar 48px.

## After

```text
base: -mt-2
md:   -mt-3
lg:   -mt-4
```

Desktop overlap sekarang sekitar 16px.

Artinya card turun sekitar 32px pada desktop, tetapi masih mempertahankan sedikit overlap dengan hero seperti desain reference.

## Files Changed

- `resources/views/public/home/index.blade.php`

## Not Changed

- feature card hover
- icon assets
- card dimensions
- Motion V2
- hero
- navbar
- content
- responsive breakpoints
- database
- routes
- dependencies

## Risk

LOW
