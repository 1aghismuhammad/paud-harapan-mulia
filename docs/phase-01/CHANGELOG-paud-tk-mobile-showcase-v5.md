# Change Log — PAUD & TK Mobile Showcase Reference V5

## Objective

Menyesuaikan tampilan mobile Fasilitas, Aktivitas, dan Pembiasaan dengan screenshot reference mobile.

## Mobile Changes

### Decorative label

Sebelum:
- block sekitar `235 × 200px`;
- terlalu kecil di viewport ±479px.

Sesudah:
- full-width dengan `max-width: 430px`;
- tinggi sekitar `305px`;
- dua pastel panels menjadi besar dan hampir memenuhi lebar layar;
- accent bar tetap berada di sisi kiri;
- white label pill berada di kanan bawah.

### Gallery

Sebelum:
- card pertama `82%` lebar;
- card kedua mengintip di sebelah kanan;
- arrow terlihat di mobile.

Sesudah:
- satu card memenuhi `100%` carousel viewport;
- tidak ada next-card peek;
- previous/next arrow disembunyikan di mobile;
- swipe tetap berfungsi;
- arrow kembali tampil mulai breakpoint `sm`.

### Mobile overlay

Desktop:
- teks tetap hanya muncul saat hover/focus.

Mobile/touch:
- karena tidak ada hover yang reliable, overlay + title muncul pada card carousel yang sedang aktif;
- saat swipe ke card berikutnya, overlay berpindah ke active card.

Ini mengikuti behavior visual screenshot reference mobile.

## Desktop / Tablet

Desktop design yang sudah disetujui tetap dipertahankan.

## Files Changed

- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`

## Not Changed

- global `app.css`
- global `app.js`
- homepage
- hero autoplay/fade
- database
- routes
- dependencies

## Risk

LOW
