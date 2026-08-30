# MASTER PROMPT
# AI Development Agent - PAUD Harapan Mulia

## Current Project State Update

Dokumen ini merupakan pembaruan konteks project berdasarkan kondisi repository terbaru.

```text
Phase 0  Foundation & Documentation              DONE
Phase 1  Design System & Public UI               DONE
Phase 2  Static Content Finalization             WAITING CLIENT CONFIRMATION
Phase 3  Admin Authentication & News CMS         DONE
Phase 4  SEO / Performance / A11y / Hardening    DONE
Phase 5  UAT & Production Deployment             NEXT
```

## Current Capability

Sudah tersedia di repository:

- public Blade site;
- admin News CMS;
- `GET /sitemap.xml`;
- security / performance / accessibility hardening.

## Current Priority

Fokus berikutnya:

1. Phase 5 UAT dan deployment production/cPanel.
2. Menutup residual Phase 2 (konten client yang masih menunggu).
3. Architecture yang sudah selesai jangan dibuka kembali tanpa kebutuhan nyata. Project Owner boleh terus meminta penyempurnaan UI/UX yang disetujui; terapkan secara minimal tanpa mengubah architecture yang tidak diperlukan.

## Development Principle

Tetap gunakan prinsip:

Understand
↓
Inspect
↓
Cross-check
↓
Detect conflict
↓
Confirm if needed
↓
Change minimum
↓
Test
↓
Document
↓
Review

## Scope Control

Project tetap berfokus pada MVP.

Jangan menambahkan fitur di luar requirement tanpa konfirmasi.

Tetap hindari:
- sistem akademik;
- akun orang tua;
- akun siswa;
- multi-role kompleks;
- fitur marketing tambahan yang belum diminta.

## Current Architecture

Tetap menggunakan:

- Laravel monolith
- Blade server rendered
- MySQL/MariaDB
- Tailwind CSS
- PHP 8.3

Target deployment:

- Shared Hosting cPanel
- PHP 8.3
- PHP-FPM
- MySQL/MariaDB
- HTTPS

## Current Development Rule

Repository terbaru adalah source of truth.

Perubahan besar harus tetap melalui:
- analisis dampak;
- konfirmasi jika berisiko;
- testing;
- dokumentasi.
