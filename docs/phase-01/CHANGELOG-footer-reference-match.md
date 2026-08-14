# Change Log — Footer Reference Match

## Tujuan

Menyamakan proporsi footer desktop dengan screenshot reference 1920px.

## Pengukuran Screenshot

Reference:
- green area ≈ 528px
- copyright bar ≈ 88px
- inner content width ≈ 1120px
- start content ≈ x400
- column 2 ≈ x850
- column 3 ≈ x1230

Current sebelum revisi:
- green area ≈ 390px
- copyright bar ≈ 55px

## Perubahan

### Green footer
- desktop min-height: `528px`
- desktop top padding: `116px`
- desktop bottom padding: `90px`
- inner width: `1120px`
- desktop grid: `360px / 280px / 1fr`
- desktop column gap: `95px`

### Typography
- heading desktop: `16px`
- footer body/link desktop: `15px`
- contact label: `13px`
- line-height diperbesar

### Contact
- icon diganti SVG line icon
- ukuran icon ≈32px
- divider horizontal antar kontak

### Copyright bar
- desktop min-height: `88px`
- copyright font: `15px`
- social label text diganti icon
- menambahkan back-to-top button seperti reference

## Tidak Diubah
- warna brand hijau
- alamat/nomor/email sekolah
- route
- database
- CMS
- header
- homepage section
- halaman internal
- dependency

## Risk
LOW

## Verification

```bash
php artisan optimize:clear
npm run build
php artisan test
```

Review pada:
- 1920×1080
- 1440×900
- 390×844
