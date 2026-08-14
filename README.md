# PAUD Harapan Mulia

Website **Company Profile PAUD (KB & TK) Islam Terpadu Harapan Mulia** yang dibangun menggunakan Laravel.

Project ini berfokus pada website publik sekolah dengan CMS sederhana untuk mengelola **berita** dan **galeri**, dengan pendekatan **mobile-first responsive**, SEO-friendly, dan deployment ke shared hosting/cPanel.

## Status Project

**Current Phase:** Phase 0 — Foundation & Documentation  
**Status:** IN PROGRESS

Baseline produk, arsitektur, desain, dan standar AI/development sudah tersedia. Development UI publik dimulai setelah keputusan foundation yang masih pending ditutup.

## Scope MVP

### Public Website

- Home
- About Us / Tentang Kami
- Our School / Sekolah Kami
- Berita
- Detail Berita
- Galeri
- Detail Album
- Informasi kontak
- Responsive navigation
- Hero/banner
- Profil, sejarah, visi, misi, tujuan
- Program/kegiatan
- Fasilitas
- SEO baseline

### Admin CMS

- Login admin
- Dashboard
- CRUD berita
- Draft / publish berita
- Featured image
- SEO metadata berita
- CRUD album galeri
- Upload dan pengelolaan foto galeri

## Out of Scope MVP

Belum termasuk:

- akun orang tua;
- data siswa;
- absensi;
- pembayaran/SPP;
- rapor;
- pendaftaran siswa;
- portal guru;
- multi-role kompleks;
- aplikasi mobile native;
- payment gateway;
- sistem akademik.

## Tech Stack

```text
Backend
├── PHP ^8.3
├── Laravel ^13.17
└── Blade

Frontend
├── Tailwind CSS ^4
├── Vite ^8
└── JavaScript secukupnya

Testing
└── Pest ^4

Database
└── MySQL / MariaDB

Local Development
├── PHP 8.3
├── Laragon MySQL
└── php artisan serve

Production Target
├── cPanel
├── ea-php83
├── PHP-FPM
├── MySQL / MariaDB
└── HTTPS
```

## Development Documentation

Dokumen utama project berada di folder [`docs/`](docs/).

| Dokumen | Fungsi |
|---|---|
| [`docs/PRD.md`](docs/PRD.md) | Scope produk, requirement, user, modul, roadmap |
| [`docs/ARCHITECTURE.md`](docs/ARCHITECTURE.md) | Architecture, data model, route, storage, security, deployment |
| [`docs/DESIGN.md`](docs/DESIGN.md) | UI/UX, responsive rules, design system, CMS design |
| [`docs/progress/`](docs/progress/) | Laporan progres pengembangan per phase |
| [`AGENTS.md`](AGENTS.md) | Instruksi global untuk AI coding agent |
| [`.agents/`](.agents/) | Development skills dan project coding standards |

## AI-Assisted Development

Project menggunakan Laravel Boost dan project-specific agent standards.

AI/developer wajib mengikuti:

```text
Pahami
  ↓
Cross-check
  ↓
Ubah Minimum
  ↓
Verifikasi
  ↓
Catat
```

Aturan detail tersedia pada:

```text
AGENTS.md
.agents/skills/paud-project-standards/
```

Prinsip utama:

- jangan mengubah bagian di luar scope;
- jangan melakukan hidden refactor;
- ikuti architecture existing;
- validasi melalui Form Request jika relevan;
- business logic tidak ditumpuk di Controller;
- Repository hanya digunakan jika memang justified;
- test behavior penting;
- setiap perubahan memiliki Change Log;
- setiap phase memiliki Progress Report.

## Local Development

### Requirements

Pastikan tersedia:

```text
PHP 8.3+
Composer 2.x
Node.js kompatibel dengan Vite 8
npm
MySQL / MariaDB
```

### Setup

Clone repository:

```bash
git clone https://github.com/1aghismuhammad/paud-harapan-mulia.git
cd paud-harapan-mulia
```

Install PHP dependencies:

```bash
composer install
```

Buat environment file:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur database pada `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paud_harapan_mulia
DB_USERNAME=root
DB_PASSWORD=
```

Buat database terlebih dahulu, kemudian:

```bash
php artisan migrate
```

Install frontend dependencies:

```bash
npm install
```

Jalankan development:

**Terminal 1**

```bash
php artisan serve
```

**Terminal 2**

```bash
npm run dev
```

Jika menggunakan Laragon, MySQL harus dalam kondisi aktif.

## Testing

Jalankan:

```bash
php artisan test
```

atau sesuai project conventions:

```bash
php artisan test --compact
```

Sebelum merge atau menandai phase selesai, test relevan wajib diperiksa.

## Production Build

Build frontend assets:

```bash
npm run build
```

Production deployment harus mengikuti [`docs/ARCHITECTURE.md`](docs/ARCHITECTURE.md), termasuk:

- `APP_DEBUG=false`;
- HTTPS;
- production `.env`;
- database migration;
- `storage:link`;
- correct document root ke folder `public`;
- permission `storage` dan `bootstrap/cache`;
- smoke test setelah deploy.

## Development Phases

```text
Phase 0
Foundation & Documentation
        ↓
Phase 1
Design System & Global Layout
        ↓
Phase 2
Public Company Profile
        ↓
Phase 3
Admin Authentication & News CMS
        ↓
Phase 4
Gallery CMS
        ↓
Phase 5
SEO, Performance, Accessibility & Hardening
        ↓
Phase 6
UAT & Production Deployment
```

Progress setiap phase dicatat pada:

```text
docs/progress/
```

## Current Next Steps

Prioritas terdekat:

1. Menutup keputusan pending Phase 0.
2. Inventaris dan klasifikasi aset sekolah.
3. Finalisasi referensi CMS berita.
4. Mulai Phase 1:
   - brand tokens;
   - global container;
   - topbar;
   - navbar desktop/mobile;
   - footer;
   - hero statis;
   - responsive QA.

## Repository

```text
https://github.com/1aghismuhammad/paud-harapan-mulia
```

---

Project ini dikembangkan secara bertahap dengan fokus pada perubahan yang **minimal, predictable, consistent, traceable, reversible, dan testable**.
