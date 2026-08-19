# Phase 3C — News Database Foundation V1

## Summary
Menambahkan foundation database untuk modul berita tanpa membuka CRUD atau route berita admin baru.

## Files changed
- `app/Models/NewsPost.php`
- `app/Models/User.php`
- `app/Http/Controllers/Admin/DashboardController.php`
- `database/factories/NewsPostFactory.php`
- `database/migrations/2026_08_19_000100_create_news_posts_table.php`
- `resources/views/admin/dashboard.blade.php`
- `tests/Feature/NewsDatabaseTest.php`
- `tests/Feature/AdminDashboardTest.php`

## Database impact
Membuat tabel `news_posts` dengan field:
- nullable author `user_id`
- title dan unique slug
- excerpt dan content
- optional featured image path
- status `draft` / `published`
- optional `published_at`
- optional SEO metadata
- timestamps

Foreign key author menggunakan `nullOnDelete()` sehingga penghapusan akun admin tidak menghapus arsip berita.

## Route impact
NONE. Phase 3C tidak membuka route `/admin/berita`.

## Dependency impact
NONE.

## Dashboard impact
Card Total Berita, Published, dan Draft sekarang membaca database nyata. Tombol pengelolaan berita tetap disabled sampai Phase 3D.

## Verification
```bash
php artisan migrate
php artisan test tests/Feature/NewsDatabaseTest.php
php artisan test tests/Feature/AdminDashboardTest.php
php artisan test
npm run build
php artisan route:list --except-vendor
```

Expected:
- migration `news_posts` berhasil
- NewsDatabaseTest PASS
- AdminDashboardTest PASS
- full regression PASS
- Vite build PASS
- route aplikasi tetap sama dengan Phase 3B

## Risk
MEDIUM — menambah schema database dan membuat dashboard membaca data database.

## What was NOT changed
- authentication flow
- admin routes
- public routes
- CRUD berita
- image upload
- rich text editor
- public news integration
