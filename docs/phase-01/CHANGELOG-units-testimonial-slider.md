# Change Log — Units Bigger + Functional Testimonial Slider

## Scope
Perubahan hanya pada homepage:
- memperbesar section Unit Pendidikan
- membuat testimonial dots benar-benar berfungsi
- menambah jumlah testimonial placeholder

## Perubahan

### Unit Pendidikan
- ukuran mobile: `180x180`
- ukuran desktop: `260x260`
- heading teks di card diperbesar
- menambah shadow dan hover ringan
- container section dibuat lebih lebar agar proporsi visual lebih kuat

### Testimonial
- menambah data testimonial placeholder dari 3 menjadi 6
- dibagi menjadi 2 slide
- dots bawah sekarang fungsional
- klik dot akan berpindah slide
- ada dukungan swipe sederhana pada touch device
- tetap memakai placeholder netral, belum testimonial final sekolah

## File diubah
- `resources/views/public/home/index.blade.php`

## Tidak diubah
- footer
- navbar
- hero
- internal pages
- route
- database
- CMS

## Verifikasi
```bash
php artisan optimize:clear
npm run build
php artisan test
```
