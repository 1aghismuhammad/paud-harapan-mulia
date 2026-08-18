# Home Profile Image Hover V1

## Summary
Merapikan visual gambar pada section Profil Sekolah di homepage dengan menghapus label "Video / Gambar" dan menambahkan hover image yang lebih halus dan premium.

## Files changed
- `resources/views/public/home/index.blade.php`

## Changes
- Menghapus teks overlay "Video / Gambar".
- Mempertahankan ribbon vertikal "Harapan Mulia" sebagai identitas section.
- Menambahkan subtle lift + shadow saat hover.
- Menambahkan zoom halus, brightness/saturation ringan, gradient overlay, highlight sweep, dan inner frame saat hover.
- Tidak menambah dependency atau JavaScript baru.

## Database impact
None.

## Route impact
None.

## Dependency impact
None.

## Risk
LOW

## What was NOT changed
- Copy Profil Sekolah
- CTA Lihat Profil Sekolah
- Gambar source
- Navbar/footer
- Section lain pada homepage
