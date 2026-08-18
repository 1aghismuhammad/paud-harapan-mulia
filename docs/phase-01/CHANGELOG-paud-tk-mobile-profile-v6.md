# Change Log — PAUD/TK Mobile Profile Reference V6

## Objective

Menyesuaikan bagian profile unit PAUD dan TK pada mobile agar lebih dekat dengan screenshot reference.

## Problem

Sebelumnya accent bar profile memakai:

```text
hidden lg:block
```

Akibatnya accent hanya muncul di desktop dan hilang pada mobile.

Foto mobile juga masih memakai ratio `3/4`, sehingga terlihat sedikit lebih pendek dibanding reference.

## Changes

### Accent Bar

Sekarang tampil di semua viewport.

Mobile:
- left: `-8px`
- width: `18px`
- top/bottom: `12%`
- green brand accent
- subtle shadow

Tablet:
- left `-12px`
- width `20px`

Desktop:
- kembali ke proporsi existing:
  - left `-18px`
  - width `22px`
  - top/bottom `8%`

### Profile Photos

Mobile:

```text
aspect-ratio: 2 / 3
```

Lebih tinggi/portrait seperti reference.

Tablet+:

```text
aspect-ratio: 3 / 4
```

sehingga desktop existing tetap proporsional.

### Spacing

- profile mulai sedikit lebih dekat ke heading di mobile;
- gap dua foto `2.5`;
- max-width visual mobile `440px`;
- desktop tetap `470px`.

## Files Changed

- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`

## Not Changed

- global CSS
- global JS
- hero/autoplay/fade
- showcase carousel
- homepage
- routes
- database
- dependencies

## Risk

LOW
