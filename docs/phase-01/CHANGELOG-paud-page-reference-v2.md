# Change Log — PAUD Page Reference Match V2

## Objective

Mendekatkan halaman PAUD Harapan Mulia ke screenshot reference halaman TK tanpa menyalin branding reference.

## Visual Analysis

Reference memiliki:

1. Heading profile besar dan centered.
2. Dua portrait image berdampingan.
3. Decorative accent bar di belakang profile images.
4. Text column kanan lebih lega.
5. Showcase rows dengan label decorative:
   - accent bar;
   - dua stacked pastel panels;
   - floating white label pill.
6. Tiga media card per row dengan proporsi sedikit portrait.
7. Vertical spacing antarrow lebih besar.

Current PAUD sebelumnya:

- dua profile image tanpa decorative accent;
- profile image ratio lebih pendek;
- label Fasilitas/Aktivitas/Pembiasaan hanya kotak pastel sederhana;
- media card square;
- row spacing terlalu rapat.

## Changes

### Profile
- desktop profile grid: `470px + content`
- gap desktop: `72px`
- image ratio: `3/4`
- green decorative vertical accent
- larger image shadow
- copy desktop: `15px`, line-height `2`
- heading desktop diperbesar hingga `46px`

### Fasilitas / Aktivitas / Pembiasaan
- decorative stacked label design
- brand accent disesuaikan:
  - Fasilitas: green
  - Aktivitas: warm orange
  - Pembiasaan: dark green
- pastel panels mengikuti reference language, bukan reference brand color
- white floating label pill
- media cards: `aspect-[6/7]`
- desktop row grid: `255px + gallery`
- gallery gap desktop: `28px`
- row vertical spacing desktop: `96px`

## Files Changed

- `resources/views/public/school/paud.blade.php`

## Important

`resources/css/app.css` TIDAK diubah.

Alasan:
untuk menghindari regression pada:
- Hero Carousel V5;
- feature-card hotfix;
- Motion V2;
- homepage hover.

Semua penyesuaian PAUD menggunakan Tailwind utility langsung di Blade.

## Not Changed

- hero PAUD;
- Keunggulan Sekolah;
- Berita Sekolah;
- routes;
- database;
- dependencies;
- global CSS;
- JavaScript.

## Responsive

- mobile: showcase label berada di atas gallery;
- tablet+: label + gallery berdampingan;
- media gallery menjadi 3 columns mulai `sm`;
- tidak menambah breakpoint custom.

## Risk

LOW
