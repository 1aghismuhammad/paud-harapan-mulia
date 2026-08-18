# Change Log — Homepage Feature Cards Reference Hover

## Summary

Menyesuaikan tiga highlight card homepage agar hover behavior lebih dekat dengan reference Sekolah Cinta Kasih Tzu Chi.

Reference behavior yang diadaptasi:

- group card berada di atas white framed container;
- normal state menggunakan card putih dengan shadow ringan;
- hover menampilkan outline;
- hover menampilkan accent bar tebal di bagian bawah;
- icon berubah warna pada hover;
- movement sangat kecil, bukan card lift besar.

Warna accent reference biru **tidak disalin**. Accent disesuaikan ke brand PAUD Harapan Mulia: `#5EA10F`.

## Files Changed

- `resources/views/public/home/index.blade.php`
- `resources/css/app.css`

## Assets Added

- `public/images/icons/home-features/environment.png`
- `public/images/icons/home-features/environment-green.png`
- `public/images/icons/home-features/learning.png`
- `public/images/icons/home-features/learning-green.png`
- `public/images/icons/home-features/parenting.png`
- `public/images/icons/home-features/parenting-green.png`

Source icon berasal dari file PNG reference yang diberikan user pada task ini.

## Hover Behavior

Normal:

```text
white card
dark icon
subtle shadow
transparent border
```

Hover:

```text
green 1px outline
green 7px bottom accent
icon dark -> green
translateY(-1px)
shadow slightly stronger
```

## Responsive

- Mobile tetap single-column sesuai grid existing.
- Tablet/desktop tetap 3 column.
- Hover hanya aktif pada pointer device dengan `(hover: hover) and (pointer: fine)`.
- Tidak ada informasi penting yang bergantung pada hover.

## Motion System

Motion V2 existing tetap dipertahankan.

Highlight card masih menjadi target stagger reveal karena selector existing:

```css
.js .home-feature-container > *
```

masih valid.

## Database / Routes / Dependencies

Tidak ada perubahan.

## Risk

LOW

## Verification

```bash
php artisan optimize:clear
npm run dev
```

Kemudian hard refresh dan arahkan pointer bergantian ke ketiga highlight card.

Sebelum push:

```bash
npm run build
php artisan test
git diff --check
```
