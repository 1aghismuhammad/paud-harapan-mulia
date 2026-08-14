# Change Log — Phase 1 Implementation Draft

## Ringkasan

Implementasi public UI foundation berdasarkan UI reference yang disetujui.

## File Ditambah / Diubah

### Documentation

- `README.md`
- `docs/PRD.md`
- `docs/ARCHITECTURE.md`
- `docs/DESIGN.md`
- `docs/phase-01/UI-REFERENCE-CONTRACT.md`
- `docs/phase-01/CHANGELOG.md`
- `docs/progress/2026-08-14-phase-00-foundation.md`
- `docs/progress/2026-08-14-phase-01-ui-foundation.md`

### Frontend

- `resources/css/app.css`
- `resources/js/app.js`
- `resources/views/layouts/public.blade.php`
- `resources/views/components/site/*`
- `resources/views/public/home/index.blade.php`
- `resources/views/public/about/*`
- `resources/views/public/school/*`
- `resources/views/public/news/index.blade.php`
- `public/images/paud/*`

### Route

- `routes/web.php`

### Tests

- `tests/Feature/PublicPagesTest.php`

## Database

Tidak ada perubahan.

## Migration

Tidak ada migration baru.

## Config / ENV

Tidak ada perubahan.

## Dependency

Tidak ada package Composer/NPM baru.

Poppins dimuat dari Google Fonts untuk preview typography. Bila nanti ingin self-host, lakukan sebagai perubahan terpisah.

## Dampak

- default Laravel welcome page digantikan oleh route Beranda baru;
- navigation public sudah dapat diuji end-to-end;
- Galeri tidak dibuat;
- halaman static dapat direview sebelum CMS masuk.

## Yang Tidak Diubah

- authentication;
- database schema;
- models;
- admin CMS;
- news persistence;
- Services / Actions / Repositories;
- deployment config.

## Risiko

**Risk Level: LOW**

Perubahan utama berada pada presentation layer dan route static.

## Verifikasi yang Dilakukan di Bundle

- `php -l routes/web.php`;
- `php -l tests/Feature/PublicPagesTest.php`;
- `node --check resources/js/app.js`;
- scan dokumentasi untuk memastikan tidak ada Galeri sebagai fitur aktif.

Verifikasi yang harus dijalankan setelah bundle ditempel ke repository aktual:

```bash
npm run build
php artisan route:list
php artisan test
```
