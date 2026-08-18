# Change Log — Visi & Misi Image Hover

## Objective

Menambahkan micro-interaction pada dua foto Visi & Misi di homepage.

## Normal State

- original image scale;
- existing soft shadow;
- no tint;
- no movement.

## Hover State

Desktop/pointer devices only:

```text
Card lift      : -6px
Image zoom     : 1.05
Zoom duration  : 520ms
Shadow         : stronger, soft
Green tint     : subtle bottom gradient
```

Motion dibuat cukup terlihat tetapi tidak agresif agar tetap sesuai karakter website pendidikan.

## Files Changed

- `resources/views/public/home/index.blade.php`
- `resources/css/app.css`

## Not Changed

- hero
- hero autoplay
- hero fade
- navbar
- feature cards
- testimonial
- news
- footer
- routes
- database
- dependencies

## Risk

LOW
