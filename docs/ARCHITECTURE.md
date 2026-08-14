# ARCHITECTURE — Company Profile PAUD Harapan Mulia

**Dokumen:** Software Architecture  
**Versi:** 1.0 Draft Baseline  
**Tanggal:** 14 Agustus 2026  
**Produk:** Company Profile PAUD Harapan Mulia

---

## 1. Tujuan Architecture

Dokumen ini menetapkan bagaimana produk dibangun secara teknis agar:

- sederhana untuk tim kecil;
- mudah dideploy ke cPanel/shared hosting;
- konsisten dengan Laravel;
- mudah dirawat;
- tidak overengineered;
- SEO-friendly;
- mobile-first;
- aman untuk CMS internal sederhana;
- dapat dikembangkan bertahap.

---

## 2. Architecture Decision Summary

### ADR-001 — Single Laravel Monolith

**Keputusan:** gunakan satu Laravel monolith.

Alasan:

- website public + CMS admin berada dalam satu domain aplikasi;
- kebutuhan tidak memerlukan microservices;
- tim development kecil;
- shared hosting lebih cocok untuk monolith;
- mengurangi deployment complexity.

```text
Browser
   |
   v
Laravel Application
   |
   +-- Public Website
   |
   +-- Admin CMS
   |
   v
MySQL + Filesystem
```

### ADR-002 — Server-rendered Blade

**Keputusan:** public site dan admin menggunakan Blade.

Tidak menggunakan SPA React/Vue pada MVP.

Alasan:

- SEO publik penting;
- scope interaksi tidak membutuhkan SPA;
- deployment sederhana;
- stack existing sudah Blade;
- lebih rendah kompleksitas.

### ADR-003 — Single Admin Role

**Keputusan:** hanya role `admin`.

Tidak membuat RBAC kompleks pada MVP.

Authorization tetap dapat menggunakan middleware/policy bila resource membutuhkan aturan akses yang lebih spesifik di masa depan.

### ADR-004 — Static Company Profile Content

Profil, visi, misi, sejarah, tujuan, fasilitas, dan program pada MVP disimpan di Blade/config.

Hanya berita dan galeri yang menjadi dynamic CMS content.

### ADR-005 — Filesystem for Media

Image/video disimpan sebagai file.

Database hanya menyimpan:

- path;
- metadata;
- alt text;
- caption;
- relationship.

Tidak menyimpan binary media di database.

---

## 3. Current Technical Baseline

Berdasarkan repository saat dokumen dibuat:

```text
PHP                 ^8.3
Laravel Framework   v13.25.0 locked
Laravel constraint  ^13.17
Blade               Laravel native
Tailwind CSS        ^4.0
Vite                ^8.0
Pest                ^4.7
Laravel Boost       v2.5.3 locked
```

Target runtime local:

```text
PHP 8.3.33
MySQL Laragon
```

Target production:

```text
cPanel
ea-php83
PHP-FPM
MySQL/MariaDB hosting
HTTPS
```

Node.js tidak harus menjadi runtime production apabila asset sudah dibuild sebelum deploy.

---

## 4. Logical Architecture

```text
HTTP Request
    |
    v
Route
    |
    v
Middleware
    |
    +-- guest/public
    |
    +-- auth/admin
    |
    v
Controller
    |
    +-- Form Request
    |      |
    |      +-- validation
    |
    +-- Policy/Gate only when needed
    |
    v
Service OR Action
    |
    +-- business orchestration
    |
    v
Eloquent Model / Query Scope
    |
    +-- Repository only if justified
    |
    v
MySQL

Media:
Controller / Service
    |
    v
Laravel Filesystem
    |
    v
storage/app/public
    |
    v
public/storage
```

---

## 5. Layer Rules

Architecture wajib mengikuti rules project yang sudah ada di `.agents`.

### Controller

Controller:

- menerima request;
- memanggil Form Request;
- melakukan authorization;
- memanggil Service/Action;
- memilih View/Redirect.

Controller tidak menampung business logic besar.

### Form Request

Wajib untuk admin form yang menerima input:

- Login bila custom;
- Store News;
- Update News;
- Store Album;
- Update Album;
- Store Gallery Image bila diperlukan.

Gunakan `validated()`.

### Service

Gunakan apabila ada orchestration nyata, contoh:

```text
PublishNewsService
GalleryService
MediaUploadService
```

Jangan membuat Service untuk membungkus satu baris Eloquent tanpa manfaat.

### Action

Gunakan untuk use-case spesifik jika membantu readability:

```text
PublishNews
DeleteGalleryAlbum
ReorderGalleryImages
```

Tidak wajib untuk CRUD sederhana.

### Repository

**Tidak digunakan secara default.**

Eloquent cukup untuk MVP.

Repository baru dibuat jika:

- query reusable menjadi kompleks;
- data source berubah;
- domain perlu abstraction nyata.

### Event/Job

Tidak digunakan hanya karena tersedia.

Candidate future:

- image processing berat;
- notification;
- scheduled publish;
- sitemap regeneration bila diperlukan.

---

## 6. Proposed Application Structure

```text
app/
├── Actions/
│   └── ... hanya jika diperlukan
├── Http/
│   ├── Controllers/
│   │   ├── Public/
│   │   └── Admin/
│   └── Requests/
│       ├── News/
│       └── Gallery/
├── Models/
├── Policies/
├── Services/
│   └── ... hanya untuk logic yang justified
└── ...

resources/
├── css/
├── js/
└── views/
    ├── components/
    ├── layouts/
    ├── public/
    │   ├── home/
    │   ├── about/
    │   ├── school/
    │   ├── news/
    │   └── gallery/
    └── admin/
        ├── dashboard/
        ├── news/
        └── gallery/

routes/
└── web.php

docs/
├── PRD.md
├── ARCHITECTURE.md
├── DESIGN.md
└── progress/
```

Jangan membuat folder baru di `app/` tanpa kebutuhan nyata dan tanpa mengikuti `AGENTS.md`.

---

## 7. Domain Model

### 7.1 User

Laravel `users`.

MVP hanya admin.

Candidate fields:

```text
id
name
email
email_verified_at
password
remember_token
timestamps
```

Tidak perlu kolom `role` jika seluruh authenticated user memang admin.

Jika kelak muncul role lain, buat perubahan schema terpisah.

### 7.2 NewsPost

Recommended table:

```text
news_posts
```

Fields:

```text
id
author_id               FK users.id
title                    varchar
slug                     varchar unique
excerpt                  text nullable
content                  longText
featured_image_path      varchar nullable
featured_image_alt       varchar nullable
status                   varchar/index
published_at             timestamp nullable/index
seo_title                varchar nullable
seo_description          varchar nullable
created_at
updated_at
deleted_at               nullable
```

Status awal:

```text
draft
published
```

Gunakan enum jika project memutuskan konsisten menggunakan enum untuk state.

### 7.3 GalleryAlbum

```text
gallery_albums
```

Fields:

```text
id
title
slug unique
description nullable
cover_image_path nullable
cover_alt_text nullable
published_at nullable
created_at
updated_at
deleted_at nullable
```

### 7.4 GalleryImage

```text
gallery_images
```

Fields:

```text
id
gallery_album_id         FK
image_path
alt_text nullable
caption nullable
sort_order integer default 0
created_at
updated_at
```

Foreign key delete behavior harus diputuskan eksplisit pada migration.

Untuk image anak album, cascade dapat dipertimbangkan tetapi file fisik tetap harus dibersihkan secara eksplisit.

---

## 8. Route Architecture

### Public Routes

Candidate:

```text
GET  /                         home
GET  /tentang-kami             about
GET  /sekolah-kami             school
GET  /berita                   news.index
GET  /berita/{newsPost:slug}   news.show
GET  /galeri                   gallery.index
GET  /galeri/{album:slug}      gallery.show
```

Gunakan named route.

### Admin Routes

Prefix:

```text
/admin
```

Middleware:

```text
auth
```

Candidate:

```text
GET       /admin
resource  /admin/berita
resource  /admin/galeri
POST      /admin/galeri/{album}/images
PATCH     /admin/galeri/{album}/images/reorder
```

Exact route tidak dikunci sebelum implementation.

---

## 9. Authentication Architecture

MVP:

```text
Session-based authentication
```

Tidak membutuhkan API token/JWT.

Kebutuhan:

- login;
- logout;
- password hashed menggunakan Laravel;
- regenerate session setelah login;
- CSRF protection;
- guest/auth middleware;
- rate limiting login bila custom auth dibuat.

Public registration harus **disabled**.

Akun admin dibuat secara terkontrol melalui seeder/command/manual administrative process.

---

## 10. News Publishing Flow

```text
Admin Login
   |
   v
News List
   |
   +--> Create
   |
   v
Form Request Validation
   |
   v
Save Draft
   |
   +--> Preview
   |
   +--> Publish
             |
             v
       published_at set
             |
             v
        Public Website
```

Published public query:

```text
status = published
AND published_at <= now()
```

Gunakan scope reusable seperti `published()` bila query digunakan berulang.

---

## 11. Media Storage

Gunakan Laravel `public` disk.

Default:

```text
storage/app/public/
```

Public link:

```text
public/storage -> storage/app/public
```

Command:

```bash
php artisan storage:link
```

Recommended logical path:

```text
storage/app/public/
├── news/
│   └── featured/
└── gallery/
    └── {album-id-or-slug}/
```

### Upload Rules

Harus divalidasi:

- MIME/type;
- extension;
- max file size;
- image dimensions bila relevan.

Database menyimpan path relatif, bukan absolute server path.

### Delete Rules

Delete record yang memiliki media harus mempertimbangkan:

- apakah file dipakai resource lain;
- soft delete;
- cleanup file;
- rollback/recovery.

Tidak boleh menghapus file sembarangan tanpa cross-check dependency.

---

## 12. Asset Strategy

### Static Assets

Logo, decorative icon, default branding asset:

```text
resources/
```

dan diproses Vite jika sesuai.

### User-uploaded CMS Media

Gunakan filesystem public disk.

### Dataset Existing

Aset WhatsApp harus melalui:

1. inventory;
2. rename;
3. classify;
4. crop jika perlu;
5. optimize;
6. alt-text assignment.

Contoh naming:

```text
akhirussanah-2025-2026-siswa-guru-01.jpg
home-parenting-orang-tua-siswa-01.jpg
kegiatan-keagamaan-siswa-01.jpg
```

Hindari publish nama generik seperti:

```text
WhatsApp Image 2026-08-11...
```

---

## 13. Frontend Architecture

### Blade Components

Candidate reusable components:

```text
<x-site.topbar />
<x-site.navbar />
<x-site.hero />
<x-site.section-heading />
<x-site.feature-card />
<x-site.news-card />
<x-site.gallery-card />
<x-site.footer />
<x-ui.button />
<x-ui.input />
<x-ui.alert />
<x-ui.pagination />
```

Jangan memecah component terlalu granular tanpa manfaat.

### CSS

Tailwind CSS 4.

Design token custom ditentukan di `DESIGN.md`.

### JavaScript

JavaScript seminimal mungkin:

- mobile navigation;
- hero carousel;
- admin editor integration;
- gallery lightbox bila dipilih;
- reorder UI bila dibutuhkan.

Hindari framework SPA tanpa requirement baru.

---

## 14. Responsive Architecture

Gunakan **mobile-first utilities**.

Tailwind default breakpoint baseline:

```text
sm   40rem  / 640px
md   48rem  / 768px
lg   64rem  / 1024px
xl   80rem  / 1280px
2xl  96rem  / 1536px
```

Default/base style harus bekerja tanpa prefix.

Contoh:

```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
```

Jangan membuat breakpoint berdasarkan brand device.

Breakpoints hanya ditambah jika layout/content benar-benar membutuhkan.

---

## 15. SEO Architecture

### Page-level SEO Component

Recommended:

```text
resources/views/components/seo.blade.php
```

Inputs:

```text
title
description
canonical
image
type
robots
structuredData
```

Layout public menggunakan component yang sama agar metadata konsisten.

### News

Detail news:

- title;
- description/excerpt;
- canonical;
- featured image;
- Open Graph;
- article metadata;
- structured data bila sesuai.

### Sitemap

Sitemap mencakup:

- static pages;
- published news;
- published gallery album bila relevan.

Draft tidak boleh masuk sitemap.

### Robots

Admin route tidak perlu diindex.

Authentication pages juga tidak ditargetkan untuk indexing.

---

## 16. Performance Architecture

### Core Web Vitals Target

```text
LCP <= 2.5 s
INP < 200 ms
CLS < 0.1
```

### Image

- tentukan intrinsic dimensions;
- responsive display;
- lazy load image sekunder;
- jangan lazy-load LCP/hero secara sembarangan;
- optimalkan ukuran sebelum publish;
- jangan render full-resolution WhatsApp image jika card hanya kecil.

### Vite

Production:

```bash
npm run build
```

Deploy `public/build`.

---

## 17. Security Baseline

Wajib:

- Laravel CSRF;
- Form Request validation;
- authentication admin;
- public registration off;
- sanitize/limit rich text output;
- file upload validation;
- no secret committed;
- production `APP_DEBUG=false`;
- HTTPS;
- secure session/cookie production config;
- no direct DB credentials in docs;
- escape Blade output by default;
- raw HTML hanya dari trusted/sanitized CMS pipeline.

---

## 18. Testing Strategy

Prioritas Feature Test:

```text
Authentication
News CRUD
News validation
News draft visibility
News published visibility
News authorization/auth protection
Gallery CRUD
Gallery upload validation
Public routes
SEO metadata critical path
```

Unit test hanya untuk logic yang benar-benar isolated.

Gunakan Pest sesuai project.

Command:

```bash
php artisan test --compact
```

Setiap bug fix harus memiliki regression test jika feasible.

---

## 19. Local Development

Recommended workflow:

```text
Laragon:
MySQL ON

Terminal 1:
php artisan serve

Terminal 2:
npm run dev
```

Optional:

```bash
composer run dev
```

jika ingin server, queue listener, dan Vite melalui script repo.

---

## 20. Production Deployment — cPanel

Target:

```text
PHP 8.3 / ea-php83
PHP-FPM
MySQL
```

### Document Root

Domain/subdomain harus mengarah ke:

```text
/path/to/project/public
```

Bukan root Laravel.

### Deployment Checklist

```text
1. Backup.
2. Upload/pull source.
3. Set .env production.
4. composer install --no-dev --optimize-autoloader
5. npm build dilakukan sebelum deploy atau pada environment build.
6. php artisan migrate --force
7. php artisan storage:link
8. php artisan optimize
9. permission storage/bootstrap/cache
10. verify APP_DEBUG=false
11. smoke test
```

Command final harus disesuaikan dengan akses terminal hosting dan capability provider.

---

## 21. Logging & Error Handling

Production:

- `APP_DEBUG=false`;
- technical error dicatat ke log;
- user melihat error page yang aman;
- custom 404 dibuat sesuai branding;
- exception tidak membocorkan SQL/stack trace/credential.

---

## 22. Development Roadmap

### Phase 0 — Foundation

Deliverables:

- docs baseline;
- environment verified;
- asset inventory;
- DB design reviewed;
- route map draft.

Gate:

- tidak mulai CMS sebelum public information architecture dan design baseline jelas.

### Phase 1 — Design System + Layout

Deliverables:

- tokens;
- topbar;
- navbar;
- footer;
- responsive container;
- shared components.

### Phase 2 — Public Static Pages

Deliverables:

- Home;
- About;
- Our School;
- responsive;
- dataset content.

### Phase 3 — News CMS

Deliverables:

- auth;
- dashboard;
- DB migration/model;
- CRUD;
- editor;
- image upload;
- public listing/detail;
- tests.

### Phase 4 — Gallery

Deliverables:

- albums;
- images;
- upload;
- reorder;
- public gallery;
- tests.

### Phase 5 — SEO/Performance/A11y

Deliverables:

- SEO component;
- sitemap;
- robots;
- structured data;
- metadata;
- image audit;
- CWV optimization;
- accessibility review.

### Phase 6 — Production

Deliverables:

- UAT;
- deploy;
- smoke test;
- backup;
- Search Console;
- handover.

---

## 23. Phase Gate / Definition of Done

Suatu phase hanya `DONE` jika:

- requirement phase terpenuhi;
- code mengikuti `AGENTS.md`;
- relevant tests lulus;
- no hidden refactor;
- no unexplained dependency;
- responsive check dilakukan;
- change log tersedia;
- progress report dibuat;
- known issue dicatat.

---

## 24. Progress Reporting

Lokasi:

```text
docs/progress/
```

Setiap milestone/phase menghasilkan report.

Template:

```markdown
# Progress Report — Phase X

## Metadata
- Date:
- Branch:
- Commit:
- Status:

## Objective
...

## Completed
- ...

## Changed Files
- ...

## Database / Migration
- ...

## Routes
- ...

## Dependencies
- ...

## Tests
- ...

## Responsive QA
- Mobile:
- Tablet:
- Desktop:

## SEO / Performance
- ...

## Issues / Blockers
- ...

## Decisions
- ...

## Risk
LOW | MEDIUM | HIGH

## Next Step
1. ...
```

Commit hash dicatat setelah perubahan sudah di-commit.

---

## 25. References

### Current Repository

- https://github.com/1aghismuhammad/paud-harapan-mulia
- https://raw.githubusercontent.com/1aghismuhammad/paud-harapan-mulia/main/composer.json
- https://raw.githubusercontent.com/1aghismuhammad/paud-harapan-mulia/main/composer.lock
- https://raw.githubusercontent.com/1aghismuhammad/paud-harapan-mulia/main/package.json

### Laravel 13

- Filesystem: https://laravel.com/docs/13.x/filesystem
- Validation: https://laravel.com/docs/13.x/validation
- Blade: https://laravel.com/docs/13.x/blade
- Authentication: https://laravel.com/docs/13.x/authentication
- CSRF: https://laravel.com/docs/13.x/csrf
- Vite: https://laravel.com/docs/13.x/vite

### Responsive & SEO

- Tailwind responsive design: https://tailwindcss.com/docs/responsive-design
- Responsive Web Design: https://web.dev/articles/responsive-web-design-basics
- Google Mobile-first Indexing: https://developers.google.com/search/docs/crawling-indexing/mobile/mobile-sites-mobile-first-indexing
- Google SEO Starter Guide: https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- Google Image SEO: https://developers.google.com/search/docs/appearance/google-images
- Google Core Web Vitals: https://developers.google.com/search/docs/appearance/core-web-vitals
