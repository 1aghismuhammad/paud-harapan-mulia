# ARCHITECTURE — Company Profile PAUD Harapan Mulia

**Version:** 1.2  
**Date:** 14 Agustus 2026

## 1. Architecture Style

Single Laravel monolith.

```text
Browser
   ↓
Laravel 13
   ├── Public Blade Website
   └── Admin CMS (Phase 3)
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

## 3. Public Layer

Phase 1 menggunakan `Route::view` karena halaman masih static dan tidak membutuhkan Controller.

Target flow:

```text
Route
  ↓
Blade View
  ↓
Shared Layout
  ↓
Site Components
```

Ketika data dinamis masuk pada Phase 3:

```text
Route
  ↓
Controller
  ↓
Form Request / Authorization bila relevan
  ↓
Service / Action bila ada business logic nyata
  ↓
Eloquent
  ↓
Database
```

## 4. Public Route Map

```text
GET /                                      home
GET /tentang-kami/sejarah                  about.history
GET /tentang-kami/visi-misi                about.vision-mission
GET /tentang-kami/fasilitas                about.facilities
GET /sekolah/paud                          school.paud
GET /sekolah/tk                            school.tk
GET /berita                                news.index
```

Detail `/berita/{slug}` dibuat pada Phase 3 ketika model berita tersedia.

Tidak ada route Galeri.

## 5. Phase 1 View Structure

```text
resources/views/
├── layouts/
│   └── public.blade.php
├── components/
│   └── site/
│       ├── topbar.blade.php
│       ├── navbar.blade.php
│       ├── mobile-menu.blade.php
│       ├── hero.blade.php
│       ├── page-hero.blade.php
│       ├── section-heading.blade.php
│       ├── news-card.blade.php
│       └── footer.blade.php
└── public/
    ├── home/index.blade.php
    ├── about/
    │   ├── history.blade.php
    │   ├── vision-mission.blade.php
    │   └── facilities.blade.php
    ├── school/
    │   ├── paud.blade.php
    │   └── tk.blade.php
    └── news/index.blade.php
```

## 6. Static Media — Phase 1

```text
public/images/paud/
```

Digunakan untuk temporary logo/reference visual dan foto sekolah yang dikelola developer.

Phase 3 featured image berita menggunakan Laravel public disk:

```text
storage/app/public/news/
public/storage -> storage/app/public
```

## 7. JavaScript Policy

Vanilla JavaScript cukup untuk Phase 1:

- mobile menu;
- mobile submenu accordion;
- hero carousel.

Tidak menambahkan Alpine/React/Vue hanya untuk kebutuhan tersebut.

## 8. CSS / Design Tokens

Tailwind CSS 4 `@theme` digunakan untuk token brand.

Candidate tokens:

```text
brand-green-dark  #29693E
brand-green       #5EA10F
brand-green-light #93C854
brand-orange      #F66F09
brand-yellow      #F4C90F
```

Typography Phase 1 menggunakan Poppins-style geometric sans sesuai reference direction, dengan fallback system sans.

## 9. Authentication — Phase 3

Session-based authentication.

- satu authenticated role: Admin;
- public registration disabled;
- CSRF default Laravel;
- password hashing default Laravel;
- admin route menggunakan `auth` middleware.

## 10. News Model — Phase 3 Candidate

```text
news_posts
├── id
├── author_id
├── title
├── slug unique
├── excerpt nullable
├── content longText
├── featured_image_path nullable
├── featured_image_alt nullable
├── status indexed
├── published_at nullable/indexed
├── seo_title nullable
├── seo_description nullable
├── timestamps
└── softDeletes (jika disetujui saat implementasi)
```

Tidak ada schema Galeri.

## 11. Testing

Phase 1 minimum:

- public routes return 200;
- navigation view dapat dirender;
- no database dependency untuk static pages.

Phase 3 menambah Feature Test untuk authentication, validation, authorization, news CRUD, draft/published visibility, dan upload.

## 12. Security Baseline

- Blade escaped output default;
- raw HTML hanya untuk trusted/sanitized news content pada Phase 3;
- file upload divalidasi;
- no secret committed;
- production `APP_DEBUG=false`;
- HTTPS;
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

- jangan membuat Service/Action/Repository untuk static Phase 1;
- jangan membuat database sebelum feature membutuhkan;
- jangan menambah dependency hanya untuk behavior yang dapat diselesaikan dengan stack existing;
- perubahan architecture harus dikonfirmasi bila bertentangan dengan PRD/design/AGENTS.
