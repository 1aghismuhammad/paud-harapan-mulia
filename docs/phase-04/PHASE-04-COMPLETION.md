# Phase 4 Hardening Completion

Tanggal: 2026-08-25

Status: DONE

## 1. Objective

Meningkatkan kualitas aplikasi sebelum production tanpa menambah fitur produk baru.

Scope dari [`docs/phase-04/README.md`](README.md):

1. Security audit
2. SEO preparation
3. Performance optimization
4. Accessibility review
5. Production readiness

Baseline sebelum implementasi dikunci di [`docs/phase-04/BASELINE-PHASE-04.md`](BASELINE-PHASE-04.md) pada commit `9f9b20c` (`php artisan test`: 55 passed).

## 2. Completed phases

### 4.1 Security Foundation

Commit: `86b3278` — `security: add phase 4 foundation hardening`

- Timezone aplikasi `Asia/Jakarta` (`config/app.php`, `.env.example`, `phpunit.xml`).
- HTTPS: `URL::forceScheme('https')` hanya ketika `isProduction()`.
- `trustProxies('*')` hanya di production.
- Session cookie `secure` default `true` di production jika `SESSION_SECURE_COOKIE` tidak di-set.
- Middleware header: `X-Content-Type-Options: nosniff`, `X-Frame-Options: SAMEORIGIN`, `Referrer-Policy: strict-origin-when-cross-origin`. Tidak ada CSP.
- `public/robots.txt`: `Allow: /`, `Disallow: /admin`, `Disallow: /up`.
- Tes: `tests/Feature/SecurityFoundationTest.php`.

### 4.2 SEO Improvement

Commit: `3a4885e` — `seo: implement phase 4.2 metadata and sitemap optimization`

- Canonical, Open Graph, Twitter, dan JSON-LD `EducationalOrganization` pada layout publik.
- Detail berita: OG/Twitter article + JSON-LD `NewsArticle`.
- Title halaman PAUD/TK: `PAUD — PAUD Harapan Mulia`, `TK — PAUD Harapan Mulia`.
- `GET /sitemap.xml` (halaman publik + berita yang `published()` saja).
- `public/robots.txt` tetap statis; baris `Sitemap:` ditunda sampai domain production diketahui.
- Hotfix runtime: deklarasi XML di sitemap tidak boleh ditulis sebagai `<?xml ...?>` mentah di Blade (diparsing sebagai PHP). View memakai `{!! '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL !!}`.
- Tes: `tests/Feature/PublicSeoTest.php`.

### 4.3 Performance Optimization

Commit: `53b49cf` — `performance: optimize image loading strategy`

Hanya atribut gambar. Tidak ada perubahan `src`, class, JS, CSS, cache, atau WebP.

- Hero slide pertama: `fetchpriority="high"` + `decoding="async"` (tanpa lazy).
- Hero slide lain: `loading="lazy"` + `decoding="async"`.
- Hero unit PAUD/TK dan featured image detail berita: `decoding="async"` saja.
- Gambar below-the-fold (beranda, sekolah, sejarah, showcase, news-card, fasilitas non-pertama): lazy + async.
- Logo tidak di-lazy-load (above the fold).

### 4.4 Accessibility Review

Commit: `61e7cd5` — `a11y: improve phase 4.4 accessibility compliance`

Hanya semantik HTML, ARIA, hierarki heading, dan fokus keyboard. Tidak ada redesign visual.

- Beranda: `<h1 class="sr-only">PAUD Islam Terpadu Harapan Mulia</h1>`.
- Fasilitas: `lg:hidden` pada h1 diganti `lg:sr-only` (satu-satunya swap Tailwind yang disetujui).
- Sejarah dan Visi & Misi: judul `.page-title` dari `<h2>` menjadi `<p>` agar tidak menduplikasi h1 page-hero.
- Login admin: `aria-invalid` + `aria-describedby` pada error email/password.
- Menu mobile: fokus dikembalikan ke tombol menu saat menu ditutup.
- Kartu testimonial: atribut `role="button"`, `tabindex="0"`, dan `aria-label` generik dihapus; klik mouse tetap memajukan slide.

### 4.5 Production Readiness

Commit: `39bafaf` — `ops: prepare production readiness configuration`

- `bootstrap/app.php`: deteksi production untuk `trustProxies('*')` memakai `config('app.env')` di callback `booted` (bukan `env()`, yang kosong setelah `config:cache`). `trustHosts()` tidak ditambah.
- `.env.example`: komentar panduan production (tanpa secret, tanpa `APP_KEY` nyata, tanpa domain/password nyata):
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL`
  - MySQL/MariaDB
  - `LOG_LEVEL=error`
  - `QUEUE_CONNECTION=sync`

Tidak ada perubahan UI, Blade, CSS/JS, migration, dependency, route, mail, cache, atau queue worker pada batch ini.

## 3. Git commits related to Phase 4

Branch: `main`

Urutan dari baseline ke completion (semua tanggal 2026-08-25):

| Commit | Message | Batch |
| --- | --- | --- |
| `9f9b20c` (`9f9b20cdffe33a83733bc5dfa160163beabbf17a`) | `remove backup zip file` | Baseline sebelum implementasi Phase 4 |
| `86b3278` (`86b32780c8398ff908c8e13f259631b7a1c186e6`) | `security: add phase 4 foundation hardening` | 4.0 baseline doc + 4.1 |
| `3a4885e` (`3a4885edeac8d10b0825c1be0a1df6baddf21774`) | `seo: implement phase 4.2 metadata and sitemap optimization` | 4.2 |
| `53b49cf` (`53b49cfb80e9d6e89f987f32bd247d9d582e1574`) | `performance: optimize image loading strategy` | 4.3 |
| `61e7cd5` (`61e7cd50d337cdb516aefb2346be4a78b7078ed3`) | `a11y: improve phase 4.4 accessibility compliance` | 4.4 |
| `39bafaf` (`39bafaf145e131691e641717d3f106791e77dc7d`) | `ops: prepare production readiness configuration` | 4.5 |

Dokumen baseline [`BASELINE-PHASE-04.md`](BASELINE-PHASE-04.md) masuk bersama commit 4.1 (`86b3278`), merekam kondisi pada `9f9b20c`.

## 4. Verification

### php artisan test

Perintah:

```bash
php artisan test
```

Hasil pada tanggal completion (setelah 4.5):

- passed tests: 70
- failed tests: 0
- skipped tests: 0
- assertions: 334
- duration: 4.308s
- overall: PASSED

Perbandingan dengan baseline Phase 4.0: 55 passed / 220 assertions → 70 passed / 334 assertions.

Tes baru yang ditambahkan selama Phase 4:

- `tests/Feature/SecurityFoundationTest.php`
- `tests/Feature/PublicSeoTest.php`

### Build / test notes

- Suite Pest berjalan lewat HTTP kernel Laravel. Tidak ada tes browser Pest untuk keyboard/fokus 4.4.
- Perubahan `resources/js/app.js` (4.4) memerlukan `npm run build` atau `npm run dev` agar aset production memuat restorasi fokus menu dan kartu testimonial tanpa `role="button"`.
- `public/build` tetap gitignored; deploy harus menyertakan hasil Vite build.
- Sitemap XML declaration diverifikasi runtime (bukan lewat preview editor): response `GET /sitemap.xml` harus diawali deklarasi XML + `urlset`.
- `php artisan optimize` / `config:cache` di production: `trustProxies` mengikuti `config('app.env')` setelah aplikasi `booted`.

## 5. Known issues

### sitemap.blade.php editor warning (non-runtime)

[`resources/views/public/sitemap.blade.php`](../../resources/views/public/sitemap.blade.php) menulis deklarasi XML lewat string Blade:

```blade
{!! '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL !!}
```

Language service / editor dapat menandai `<?xml` sebagai peringatan atau parse error. Ini bukan kegagalan runtime. Blade tidak boleh berisi `<?xml ...?>` mentah karena PHP menafsirkannya sebagai tag PHP (`unexpected identifier "version"`). Jangan “memperbaiki” file ini hanya untuk meredam warning editor.

### Production domain not finalized

- `APP_URL` production belum dikunci.
- `public/robots.txt` sengaja tidak memuat baris `Sitemap:` sampai hostname production diketahui.
- Canonical, OG URL, dan loc sitemap mengikuti `APP_URL` / request host saat deploy.

### Content placeholders are a go-live gate, not a code issue

Phase 2 (konfirmasi konten sekolah) masih menunggu client. Bukan regresi Phase 4:

- Testimonial beranda: `Placeholder 01`–`06` (PRD: ganti data nyata atau nonaktifkan section sebelum production).
- Footer: “Preview copy, menunggu final sekolah”.
- Sejarah: catatan editorial bahwa detail perlu verifikasi sekolah.
- Tautan media sosial topbar/footer masih `href="#"`.

Item ops yang tetap menjadi tanggung jawab deploy (bukan bug kode Phase 4): document root `public/`, `APP_DEBUG=false`, `storage:link`, MySQL (bukan sqlite), user admin nyata (jangan `db:seed` factory `test@example.com`), backup DB + `storage/app/public` + `.env`.

Item yang sengaja ditunda:

- Garbage collection gambar inline berita yang diunggah lalu dibatalkan (catatan Phase 3).
- `trustHosts()` (tidak termasuk 4.5).

## 6. Next phase readiness

Phase 4 Hardening selesai. Aplikasi siap masuk **Phase 5 — UAT & Production Deployment**, dengan syarat go-live:

1. Phase 2 content gate ditutup atau secara sadar diterima sebagai residual.
2. Domain, SSL, dan `.env` production diisi (lihat komentar production di `.env.example`).
3. Deploy cPanel mengikuti kontrak di [`docs/ARCHITECTURE.md`](../ARCHITECTURE.md) §13: `composer install --no-dev --optimize-autoloader`, `npm run build`, `migrate --force`, `storage:link`, `php artisan optimize`.
4. UAT: alur publik, login admin, CRUD berita, unggah gambar, sitemap, HTTPS, cookie session `Secure`.

Status ringkas:

```text
Phase 0  Foundation & Documentation         DONE
Phase 1  Design System & Public UI          DONE
Phase 2  Static Content Finalization        WAITING CLIENT CONFIRMATION
Phase 3  Admin Authentication & News CMS    DONE
Phase 4  SEO / Performance / A11y / Hardening  DONE
Phase 5  UAT & Production Deployment        NEXT
```
