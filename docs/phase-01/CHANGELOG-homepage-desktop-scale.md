# Change Log — Homepage Desktop Scale & Spacing Pass

## Ringkasan
Menyesuaikan skala desktop homepage agar lebih dekat dengan reference. Mobile dan tablet mempertahankan sizing sebelumnya.

## File Diubah
- `resources/css/app.css`
- `resources/views/public/home/index.blade.php`

## Perubahan
- Main homepage desktop: max `1220px`
- Feature cards desktop: max `980px`
- Visi & Misi image composition: max `550px`
- Desktop section title: `44px`
- Desktop body: `15px`
- Profil image dibuat lebih dominan
- Unit cards desktop: `165px`
- Testimonial inner width: `1180px`
- Testimonial cards: min-height `300px`
- News inner width: `1180px`

## Tidak Diubah
- Hero
- Header / Navbar
- Mobile drawer
- Footer
- Halaman internal
- Route
- Database
- CMS
- Dependency

## Risk
LOW

## Verification
```bash
php artisan optimize:clear
npm run build
php artisan test
```

Visual QA:
- 1920×1080
- 1440×900
- 1024×768
- 768×1024
- 390×844
