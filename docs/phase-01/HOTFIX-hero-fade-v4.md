# Hero Carousel V4 — Explicit Fade In / Fade Out

## Goal

Membuat perpindahan gambar hero memiliki fade in/fade out yang benar-benar terlihat.

## Why V3 Could Feel Instant

V3 mengandalkan CSS transition pada perubahan class `.is-active`.

Secara spesifikasi itu valid, tetapi perubahan class untuk outgoing dan incoming terjadi pada siklus JavaScript yang sama. Pada beberapa kondisi rendering, efek dissolve dapat terasa sangat tipis atau seperti pergantian gambar biasa.

## V4 Implementation

Fade sekarang dijalankan secara eksplisit menggunakan native Web Animations API.

### Outgoing image

```text
opacity 1 -> 0
900ms
ease-in-out
```

### Incoming image

Mulai `140ms` setelah fade-out dimulai:

```text
opacity 0 -> 1
1100ms
cubic-bezier(0.22, 1, 0.36, 1)
```

Hasilnya adalah cross-dissolve sekitar 1.1 detik yang terlihat tetapi tidak agresif.

## Autoplay

Tetap:

```text
7000ms
```

Countdown berikutnya dijadwalkan setelah transition selesai.

## Manual Controls

Tetap mendukung:

- previous arrow;
- next arrow;
- dots.

Manual navigation me-reset countdown autoplay.

## Reduced Motion

Jika `prefers-reduced-motion: reduce` aktif:

- autoplay tetap 7 detik;
- fade dinonaktifkan;
- slide berganti instant.

Ini mempertahankan accessibility.

## Debug

Carousel memiliki:

```text
data-carousel-active
data-carousel-autoplay
data-carousel-motion
data-carousel-transition
```

Saat fade berjalan:

```text
data-carousel-transition="running"
```

Setelah selesai:

```text
data-carousel-transition="idle"
```

## Files Changed

- `resources/js/app.js`
- `resources/css/app.css`

## Preserved

- feature cards;
- feature hover;
- homepage layout;
- hero dimensions;
- hero images;
- navbar;
- testimonial;
- routes;
- database;
- dependencies.

## Risk

LOW-MEDIUM
