# Phase 4 Baseline

Tanggal baseline: 2026-08-25

Dokumen ini mengunci kondisi repository sebelum implementasi Phase 4. Tidak ada perubahan aplikasi pada batch ini.

## Repository

- branch: `main`
- tracking: `origin/main` (up to date)
- working tree: clean
- latest commit: `9f9b20c` (`9f9b20cdffe33a83733bc5dfa160163beabbf17a`)
- latest commit message: `remove backup zip file`
- latest commit date: 2026-08-25 14:29:39 +0700

Recent history:

```text
9f9b20c remove backup zip file
428491c add profile video redirect
5a7d3bf update perbaikan berita
416fe36 docs: update project status and phase roadmap
949c388 feat: complete public news integration
```

## Environment

Recorded from the local CLI at baseline time.

- Laravel version: 13.25.0 (`laravel/framework` v13.25.0; project constraint `^13.17`)
- PHP version: 8.3.33
- Node version: v22.21.0
- npm version: 11.6.2

Target stack from `docs/ARCHITECTURE.md` remains:

```text
PHP                 ^8.3
Laravel             ^13.17
Blade               Laravel native
Tailwind CSS        ^4
Vite                ^8
Pest                ^4
Production target   cPanel + ea-php83 + PHP-FPM
```

## Test Result

Command:

```bash
php artisan test
```

Result:

- passed tests: 55
- failed tests: 0
- skipped tests: 0
- assertions: 220
- duration: 4.681s
- overall: PASSED

Coverage of the suite at baseline:

| Area | Test file | Role |
| --- | --- | --- |
| Public static pages | `tests/Feature/PublicPagesTest.php` | `200` for `/`, tentang-kami, sekolah, `/berita` |
| Public news | `tests/Feature/PublicNewsTest.php` | homepage latest 3, listing, detail slug, draft/future 404 |
| Admin auth | `tests/Feature/AdminAuthenticationTest.php` | login, guest redirect, throttle, logout |
| Admin dashboard | `tests/Feature/AdminDashboardTest.php` | auth boundary and news stats |
| News CMS CRUD | `tests/Feature/AdminNewsCrudTest.php` | create/update/delete, slug, validation |
| Featured image | `tests/Feature/AdminNewsFeaturedImageTest.php` | upload, replace, remove, delete file |
| Inline upload | `tests/Feature/AdminNewsInlineImageTest.php` | auth, mime, 5 MB limit, storage path |
| Rich text sanitizer | `tests/Feature/AdminNewsRichTextTest.php` | allowlist HTML, dangerous tags stripped |
| News schema/scope | `tests/Feature/NewsDatabaseTest.php` | columns, unique slug, published scope |

No test failures were fixed. None were needed.

## Current Features Verified

Verification method: existing Pest feature tests against the Laravel HTTP kernel, plus `php artisan route:list --except-vendor`. No UI, Blade, CSS, or JS files were modified. Live browser QA was not repeated in this baseline lock.

Application routes present at baseline (19 application routes):

```text
GET  /                                      home
GET  /tentang-kami/sejarah                  about.history
GET  /tentang-kami/visi-misi                about.vision-mission
GET  /tentang-kami/fasilitas                about.facilities
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

### Public pages

Verified `200` for:

- `/`
- `/tentang-kami/sejarah`
- `/tentang-kami/visi-misi`
- `/tentang-kami/fasilitas`
- `/sekolah/paud`
- `/sekolah/tk`
- `/berita`

Verified `/berita/{slug}`:

- published post renders `200` with title, author, tags, featured image, and SEO metadata
- draft and future-scheduled posts return `404`

### News CMS

Verified:

- guest cannot access news management routes
- authenticated admin can open index and create form
- draft create, unique slug, publish date, update, and delete work
- public listing and homepage show only currently published posts

### Admin authentication

Verified:

- `/admin/login` is available to guests
- unauthenticated `/admin` redirects to login
- valid credentials authenticate and redirect to dashboard
- invalid credentials are rejected
- repeated failed logins are rate limited
- logout invalidates the session
- authenticated users are redirected away from the login page

### Upload system

Verified:

- featured image stores on the public disk, can be replaced or removed, and is deleted with the post
- non-image featured uploads are rejected
- inline media route is auth-protected and throttled in routing (`throttle:30,1`)
- inline images store under `news/content/`
- non-image and oversized (> 5 MB) inline uploads are rejected
- stored HTML is sanitized; scripts and disallowed tags are stripped

## Known Existing Issues

Only issues already recorded in project documentation or the Phase 4 planning audit. No new issues were invented during this baseline lock.

### From project documentation

- Phase 2 static content is still waiting for client confirmation (`docs/progress/2026-08-23-project-status.md`, `docs/progress/2026-08-23-phase-03-completion.md`).
- Testimonial placeholders must be replaced with real testimonials or the section disabled before production (`docs/PRD.md` §9, `README.md`).
- Footer still contains preview copy marked as waiting for school-final text.
- Sejarah page still contains an editorial note that history detail needs school verification before production.
- Inline news images that are uploaded and then abandoned are not garbage-collected automatically; this was deferred to hardening (`docs/phase-03/CHANGELOG-news-rich-text-inline-media-v1.md`).
- Root `README.md` status block is stale relative to progress reports (still shows Phase 1 as `REVIEW / CLOSURE QA` and Phase 3 as `NOT STARTED`).

### From Phase 4 planning audit (not yet implemented)

These are starting-point gaps for Phase 4, not regressions found by the baseline test run:

- No canonical URL on the public layout.
- No XML sitemap.
- `public/robots.txt` currently allows all paths, including `/admin`.
- Open Graph exists on news detail only; static public pages do not have site-wide OG/Twitter tags.
- No JSON-LD structured data.
- Homepage has no `<h1>`.
- Fasilitas `<h1>` is hidden on desktop (`lg:hidden`).
- News cards use empty `alt=""` on featured images.
- Production HTTPS / trusted proxy / `SESSION_SECURE_COOKIE` are not documented as a locked production contract in `.env.example`.
- Application timezone remains `UTC` while publish scheduling is compared with `now()`.

## Phase 4 Starting Point

Status:

```text
Phase 0 complete
Phase 1 complete
Phase 2 pending content confirmation
Phase 3 complete
Phase 4 ready
```

Phase 4.0 (this document) locks the baseline. Implementation of SEO, performance, accessibility, and security hardening must not start until this baseline is accepted.

Phase 4 rule from `docs/phase-04/README.md`:

> Jangan menambah fitur baru sebelum hardening selesai kecuali requirement berubah.

Out of scope for upcoming Phase 4 implementation unless explicitly requested:

- new product features
- UI redesign
- Blade component refactor
- database/migration changes
- new Composer/NPM dependencies
