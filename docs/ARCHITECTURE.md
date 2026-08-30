# ARCHITECTURE — Company Profile PAUD Harapan Mulia

**Version:** 1.4  
**Date:** 30 Agustus 2026

Reconciliation 30 Agustus 2026: routing mixed, sitemap, schema `news_posts` implemented, testing SQLite vs MySQL. Halaman kanonik `GET /sekolah-kami` (`school.index`) ditambahkan; `/sekolah/paud` dan `/sekolah/tk` tetap sebagai route legacy. Tidak merancang ulang architecture.

## 1. Architecture Style

Single Laravel monolith.

```text
Browser
   ↓
Laravel 13
   ├── Public Blade Website
   └── Admin CMS
   ↓
MySQL / MariaDB
   +
Laravel Filesystem
```

Tidak menggunakan SPA, microservices, atau Repository Pattern secara default.

## 2. Technical Baseline

```text
PHP                 ^8.3
Laravel             ^13.17
Blade               Laravel native
Tailwind CSS        ^4
Vite                ^8
Pest                ^4
Production target   cPanel + ea-php83 + PHP-FPM
```

## 3. Request Flow

Halaman about yang masih static memakai `Route::view`. Halaman yang membutuhkan data atau orkestrasi memakai Controller.

```text
Route
  ↓
Controller (bila data/auth)
  ↓
Form Request / Authorization bila relevan
  ↓
Action bila ada satu use-case bernama (contoh: AuthenticateAdmin)
  ↓
Eloquent
  ↓
Blade / HTTP response
```

Abstraksi (Action/Service/Repository) hanya ditambah jika punya tanggung jawab nyata. Jangan membungkus Eloquent secara mekanis.

## 4. Route Map

Nama route mengikuti [`routes/web.php`](../routes/web.php).

```text
GET  /                                      home
GET  /sitemap.xml                           sitemap
GET  /tentang-kami/sejarah                  about.history
GET  /tentang-kami/visi-misi                about.vision-mission
GET  /tentang-kami/fasilitas                about.facilities
GET  /sekolah-kami                          school.index
GET  /sekolah/paud                          school.paud
GET  /sekolah/tk                            school.tk
GET  /berita                                news.index
GET  /berita/{newsPost:slug}                news.show

GET  /admin/login                           admin.login
POST /admin/login                           admin.login.store
POST /admin/logout                          admin.logout
GET  /admin                                 admin.dashboard
GET  /admin/berita                          admin.news.index
GET  /admin/berita/tambah                   admin.news.create
POST /admin/berita                          admin.news.store
POST /admin/berita/media                    admin.news.media.store
GET  /admin/berita/{newsPost}/edit          admin.news.edit
PUT  /admin/berita/{newsPost}               admin.news.update
DELETE /admin/berita/{newsPost}             admin.news.destroy
```

Pemetaan controller:

- `HomeController` — beranda
- `SchoolController` — Sekolah Kami (kanonik), plus halaman legacy PAUD / TK
- `PublicNewsController` — daftar dan detail berita
- `SitemapController` — sitemap
- `Admin\AuthController` + `AuthenticateAdmin` — login/logout
- `Admin\DashboardController` — dashboard
- `Admin\NewsController` — CRUD berita
- `Admin\NewsMediaController` — unggah media inline (throttle)

About pages: `Route::view`. Route `/sekolah/paud` dan `/sekolah/tk` adalah halaman legacy (bukan sitemap/navigasi primer). Tidak ada route Galeri.

## 5. View Structure

```text
resources/views/
├── layouts/
│   ├── public.blade.php
│   └── admin.blade.php
├── components/site/     (topbar, navbar, hero, footer, …)
├── components/admin/
├── public/
│   ├── home/index.blade.php
│   ├── about/
│   ├── school/
│   ├── news/index.blade.php
│   ├── news/show.blade.php
│   └── sitemap.blade.php
└── admin/
    ├── auth/login.blade.php
    ├── dashboard.blade.php
    └── news/
```

## 6. Media / Storage

Static developer assets:

```text
public/images/paud/
```

Logo current: `logo-official.webp`. Logo sementara dataset tidak lagi current.

Unggahan berita:

```text
storage/app/public/news/
public/storage -> storage/app/public
```

## 7. JavaScript Policy

Vanilla JavaScript (tanpa Alpine/React/Vue untuk kebutuhan public UI ini).

`resources/js/app.js`:

- mobile navigation dan submenu accordion;
- hero carousel;
- testimonial slider;
- motion / scroll reveal.

Script di view halaman terkait:

- showcase dan keunggulan Sekolah Kami (struktur sama pada halaman legacy PAUD/TK);
- carousel fasilitas.

## 8. CSS / Design Tokens

Tailwind CSS 4 `@theme` digunakan untuk token brand.

```text
brand-green-dark  #29693E
brand-green       #5EA10F
brand-green-light #93C854
brand-orange      #F66F09
brand-yellow      #F4C90F
```

Typography memakai Poppins dengan fallback system sans.

## 9. Authentication

Session-based authentication.

- satu authenticated role: Admin;
- public registration disabled;
- CSRF default Laravel;
- password hashing default Laravel;
- admin route memakai middleware `auth` / `guest`;
- login divalidasi `LoginRequest` dan dijalankan `App\Actions\Admin\AuthenticateAdmin`.

## 10. News Model — Implemented

Tabel `news_posts` (dari migration, termasuk tags):

```text
news_posts
├── id
├── user_id nullable FK users, nullOnDelete
├── title
├── slug unique
├── excerpt nullable
├── content longText
├── featured_image nullable
├── status indexed (default draft)
├── published_at nullable indexed
├── tags JSON nullable
├── meta_title nullable
├── meta_description nullable
└── timestamps
```

Tidak ada `softDeletes`. Tidak ada schema Galeri.

Scope publik `published()`:

```text
status = published
AND published_at IS NOT NULL
AND published_at <= now()
```

## 11. Testing

Pest Feature tests mencakup antara lain: public pages, SEO/sitemap, security headers, admin auth, dashboard, news database/CRUD, rich text, featured image, inline image.

Otomatis: SQLite in-memory (`phpunit.xml`). Itu tidak membuktikan locking/semantics production MySQL.

Target development/production: MySQL / MariaDB.

## 12. Security Baseline

- Blade escaped output default;
- raw HTML hanya untuk konten berita yang sudah disanitasi;
- file upload divalidasi;
- no secret committed;
- production `APP_DEBUG=false`;
- HTTPS di production;
- admin route protected.

## 13. Production

Document root:

```text
/path/project/public
```

Deployment baseline:

```bash
composer install --no-dev --optimize-autoloader
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Command dijalankan sesuai capability hosting.

## 14. Architecture Constraints

- jangan menambah Action/Service/Repository tanpa tanggung jawab nyata;
- jangan menambah dependency jika stack existing sudah cukup;
- perubahan architecture harus dikonfirmasi bila bertentangan dengan PRD/design/AGENTS.
