# PAUD Harapan Mulia

Website **Company Profile PAUD (KB & TK) Islam Terpadu Harapan Mulia** berbasis Laravel.

Produk ini adalah website publik single institution dengan CMS berita pada fase berikutnya. MVP berfokus pada profil sekolah, unit PAUD/TK, fasilitas, berita, responsive design, SEO, dan pengalaman admin yang sederhana.

## Current Status

```text
Phase 0  Foundation & Documentation         DONE
Phase 1  Design System & Public UI          IN PROGRESS / REVIEW
Phase 2  Static Content Finalization        NOT STARTED
Phase 3  Admin Authentication & News CMS    NOT STARTED
Phase 4  SEO / Performance / A11y           NOT STARTED
Phase 5  UAT & Production Deployment        NOT STARTED
```

## Final MVP Navigation

```text
Beranda
Tentang Kami
├── Sejarah
├── Visi & Misi
└── Fasilitas
Sekolah Kami
├── PAUD
└── TK
Berita
```

**Tidak ada modul Galeri pada MVP.** Dokumentasi foto sekolah tetap digunakan sebagai visual di halaman company profile dan berita.

## Tech Stack

```text
PHP        ^8.3
Laravel    ^13.17
Blade      Server-rendered UI
Tailwind   ^4
Vite       ^8
Pest       ^4
Database   MySQL / MariaDB
```

## Development Documentation

- [`docs/PRD.md`](docs/PRD.md)
- [`docs/ARCHITECTURE.md`](docs/ARCHITECTURE.md)
- [`docs/DESIGN.md`](docs/DESIGN.md)
- [`docs/phase-01/UI-REFERENCE-CONTRACT.md`](docs/phase-01/UI-REFERENCE-CONTRACT.md)
- [`docs/progress/`](docs/progress/)
- [`AGENTS.md`](AGENTS.md)
- [`.agents/`](.agents/)

## Local Development

```bash
composer install
npm install
php artisan migrate
```

Saat development:

```bash
php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

MySQL Laragon harus aktif jika `.env` menggunakan MySQL lokal.

## Phase 1 Preview

Phase 1 membuat public UI foundation berdasarkan referensi yang disetujui:

- top information bar;
- navigation desktop;
- dropdown Tentang Kami / Sekolah Kami;
- mobile navigation;
- hero image carousel;
- highlight cards;
- visi & misi section;
- profile section;
- unit PAUD/TK;
- testimonial placeholder untuk development;
- preview berita;
- footer;
- static page shells agar navigation dapat direview end-to-end.

Testimonial dan berita contoh pada Phase 1 bersifat **placeholder untuk review UI**, bukan konten production.

## Production Rule

Sebelum production:

- placeholder testimonial harus diganti data nyata atau section dinonaktifkan;
- preview berita harus diganti CMS berita;
- seluruh kontak sekolah diverifikasi;
- `APP_DEBUG=false`;
- HTTPS aktif;
- document root mengarah ke folder `public`.
