# PAUD Harapan Mulia

Website **Company Profile PAUD (KB & TK) Islam Terpadu Harapan Mulia** berbasis Laravel.

Produk ini adalah website publik single institution dengan **CMS berita admin yang sudah diimplementasikan**. MVP mencakup profil sekolah, halaman kanonik Sekolah Kami (PAUD + TK sebagai satu institusi), fasilitas, berita, responsive design, SEO, dan pengalaman admin yang sederhana.

## Current Status

```text
Phase 0  Foundation & Documentation              DONE
Phase 1  Design System & Public UI               DONE
Phase 2  Static Content Finalization             WAITING CLIENT CONFIRMATION
Phase 3  Admin Authentication & News CMS         DONE
Phase 4  SEO / Performance / A11y / Hardening    DONE
Phase 5  UAT & Production Deployment             NEXT
```

Phase 2 menunggu konten final dari client. Langkah berikutnya adalah Phase 5 UAT dan deployment production.

## Final MVP Navigation

```text
Beranda
Tentang Kami
├── Sejarah
├── Visi & Misi
└── Fasilitas
Sekolah Kami
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
- [`docs/MASTER-PROMPT.md`](docs/MASTER-PROMPT.md)
- [`docs/phase-01/UI-REFERENCE-CONTRACT.md`](docs/phase-01/UI-REFERENCE-CONTRACT.md) (kontrak historis Phase 1A)
- [`docs/phase-04/PHASE-04-COMPLETION.md`](docs/phase-04/PHASE-04-COMPLETION.md)
- [`docs/history/README.md`](docs/history/README.md) — **historical narrative only**, bukan spesifikasi current
- [`docs/progress/`](docs/progress/) — dated snapshots
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

## Public UI

Public UI mengikuti referensi yang disetujui:

- top information bar;
- navigation desktop dan dropdown Tentang Kami; Sekolah Kami adalah tautan langsung;
- mobile navigation;
- hero image carousel;
- highlight cards;
- visi & misi;
- profil sekolah (CTA “Lihat Profil Sekolah” ke `/sekolah-kami`);
- testimonial homepage: 2 testimonial orang tua nyata (Bunda Cakrawala / Kelas Raudhah; Orang Tua Murid / PAUD IT Harapan Mulia);
- berita terbaru dari CMS;
- footer.

Berita publik berasal dari CMS (hanya post yang sudah dipublikasikan).

## Production Rule

Sebelum production:

- konten statis sekolah (termasuk kontak) diverifikasi;
- `APP_DEBUG=false`;
- HTTPS aktif;
- document root mengarah ke folder `public`.
