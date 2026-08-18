# Change Log — Testimonial Responsive Slider V9

## Scope

Hanya behavior testimonial homepage.

## Requirements Implemented

### Desktop / Tablet

- tetap menampilkan 3 testimonial sekaligus;
- total testimonial tetap 6;
- otomatis berganti ke grup testimonial berikutnya;
- autoplay setiap `6500ms`;
- transisi slide `600ms`;
- klik salah satu testimonial -> pindah ke grup testimonial berikutnya;
- dots tetap bekerja;
- keyboard arrow tetap bekerja.

### Mobile

- hanya 1 testimonial terlihat;
- testimonial lain tidak lagi ditumpuk vertikal;
- total testimonial tetap 6;
- autoplay berpindah 1 testimonial setiap `6500ms`;
- klik card -> testimonial berikutnya;
- swipe kiri/kanan -> previous/next testimonial;
- existing 2 dots tetap menjadi indikator grup 1-3 / 4-6.

## Implementation

Tidak mengubah Blade testimonial.

Markup existing:

```text
2 groups
×
3 testimonial
=
6 testimonial
```

dipertahankan.

JavaScript mengubah layout responsively:

```text
Desktop >= 768px:
3 cards per viewport

Mobile < 768px:
1 card per viewport
```

## Interaction

Card testimonial sekarang juga:
- clickable;
- keyboard accessible via Enter/Space;
- cursor pointer.

## Autoplay

Autoplay tidak lagi dihentikan hanya karena pointer berada di atas testimonial.

Timer berhenti jika tab/browser hidden dan dimulai lagi ketika visible.

## Files Changed

- `resources/js/app.js`

## Files NOT Changed

- homepage Blade
- global CSS
- hero carousel
- feature cards
- PAUD/TK pages
- routes
- database
- dependencies

## Risk

LOW-MEDIUM

Satu file JavaScript berubah, tetapi patch hanya mengganti blok testimonial.
