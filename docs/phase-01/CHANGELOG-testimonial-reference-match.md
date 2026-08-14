# Change Log — Testimonial Reference Match

## Scope

Hanya memperbaiki section testimonial pada homepage.

## Pengukuran visual dari screenshot 1920px

Reference:
- green band ≈ 395px
- testimonial content width ≈ 1440px
- card width ≈ 460px
- card height ≈ 465px
- card top berada ≈128px sebelum akhir green band

Sebelum revisi:
- testimonial content width ≈1180px
- card width ≈376px
- card height ≈300px

## Perubahan

### Green band
- desktop min-height `395px`
- desktop top padding `112px`
- label desktop `16px`
- heading desktop `50px`

### Cards
- desktop max-width `1440px`
- desktop gap `28px`
- card desktop min-height `465px`
- desktop horizontal padding `48px`
- quote desktop `17px`
- line height ≈ `2.02`

### Avatar
- memakai neutral SVG avatar placeholder
- tidak memakai foto orang palsu
- siap diganti foto testimonial asli

### Copy
- placeholder dibuat lebih panjang hanya untuk visual QA
- tetap diberi nama `Placeholder 01–03`
- tidak boleh menjadi testimonial production

### Pagination
- menambahkan dua dots seperti reference
- sementara bersifat visual/static

### News spacing
- old artificial `pt-[240px]` dihapus
- testimonial sekarang memiliki flow normal sehingga section Berita memakai `pt-20` desktop

## Tidak Diubah
- header
- hero
- feature cards
- visi/misi
- profil
- unit pendidikan
- footer
- internal pages
- routes
- database
- CMS
- dependency

## Risk
LOW

## Verification

```bash
php artisan optimize:clear
npm run build
php artisan test
```

Review:
- 1920×1080
- 1440×900
- 768×1024
- 390×844
