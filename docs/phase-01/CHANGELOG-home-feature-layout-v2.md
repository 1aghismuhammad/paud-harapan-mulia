# Change Log — Homepage Feature Layout V2

## Objective

Membuat hero lebih dominan seperti reference dan merapikan hover highlight cards.

## Visual Change

### Feature position

Sebelum:
- cards overlap ke bagian bawah hero;
- card sudah terlihat pada viewport pertama.

Sesudah:
- feature section berada di bawah hero;
- desktop menggunakan `mt-16` (64px);
- tablet `mt-14`;
- mobile `mt-12`;
- viewport pertama lebih fokus ke hero seperti reference.

### Wrapper shadow

Outer feature wrapper sekarang:
- border tipis;
- shadow lebih jelas tetapi tetap soft;
- mendekati framed box reference.

### Hover

Sebelum:
- border hijau;
- bottom accent;
- card ikut translate/lift;
- icon crossfade + sedikit scale.

Sesudah:
- border hijau;
- bottom accent hijau 7px;
- icon dark -> green menggunakan crossfade;
- tidak ada card lift;
- tidak ada icon scale jump;
- shadow naik sedikit saja.

Hasil hover lebih stabil dan lebih dekat dengan reference.

## Files Changed

- `resources/views/public/home/index.blade.php`
- `resources/css/app.css`

## Assets Preserved

- `public/images/icons/home-features/environment.png`
- `public/images/icons/home-features/environment-green.png`
- `public/images/icons/home-features/learning.png`
- `public/images/icons/home-features/learning-green.png`
- `public/images/icons/home-features/parenting.png`
- `public/images/icons/home-features/parenting-green.png`

## Not Changed

- hero dimensions;
- hero carousel;
- Motion V2;
- navbar;
- testimonial;
- news;
- footer;
- route;
- database;
- dependencies.

## Risk

LOW
