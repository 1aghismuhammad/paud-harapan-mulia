# Change Log — PAUD Showcase Hover Text V4

## Objective

Menyesuaikan behavior gallery PAUD dengan reference:

- card normal hanya menampilkan foto;
- overlay gelap + teks TIDAK tampil otomatis;
- overlay baru muncul saat pointer berada di atas foto;
- keyboard focus juga menampilkan overlay untuk accessibility;
- carousel arrow tetap berfungsi.

## Before

```text
carousel active index
↓
satu card otomatis gelap
↓
judul selalu terlihat
```

## After

```text
normal card
↓
foto bersih

mouse hover / keyboard focus
↓
dark overlay fade-in
↓
judul + kategori muncul
```

## Hover Motion

- overlay opacity: `0 -> 100%`
- duration: `500ms`
- card lift: `-4px`
- shadow sedikit menguat
- image zoom existing tetap bekerja

## Carousel

Tetap:
- previous / next;
- 3 card desktop;
- 2 card tablet;
- 1 card mobile;
- touch swipe;
- transition gallery 500ms.

`activeIndex` sekarang hanya mengontrol posisi carousel, bukan visual overlay.

## Files Changed

- `resources/views/public/school/paud.blade.php`

## Not Changed

- `resources/js/app.js`
- `resources/css/app.css`
- hero
- homepage
- navbar
- routes
- database
- dependencies

## Risk

LOW
