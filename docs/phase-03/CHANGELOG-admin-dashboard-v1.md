# Change Log — Phase 3B Admin Layout + Dashboard V1

## Ringkasan
Membangun layout admin reusable dan dashboard visual sebagai foundation UI sebelum News CMS dihubungkan ke database pada Phase 3C.

## Scope
- Modul: Admin CMS
- Fitur: Layout admin, sidebar, header, mobile drawer, dashboard overview
- Endpoint: Menggunakan route existing `/admin`
- Database: Tidak ada perubahan

## File Ditambah
- `resources/views/layouts/admin.blade.php`
- `resources/views/components/admin/sidebar.blade.php`
- `resources/views/components/admin/header.blade.php`
- `resources/views/components/admin/mobile-menu.blade.php`
- `tests/Feature/AdminDashboardTest.php`
- `docs/phase-03/CHANGELOG-admin-dashboard-v1.md`

## File Diubah
- `resources/views/admin/dashboard.blade.php`

## Database
Tidak ada perubahan.

## Migration
Tidak ada migration baru.

## Model
Tidak ada perubahan.

## Form Request
Tidak ada perubahan.

## Service / Action
Tidak ada perubahan.

## Controller
Tidak ada perubahan. `DashboardController` existing tetap hanya merender view dashboard.

## Route
Tidak ada perubahan. Patch menggunakan route Phase 3A yang sudah ada:
- `admin.dashboard`
- `admin.logout`
- `home`

## View / Frontend
- Menambahkan layout admin reusable.
- Menambahkan sidebar desktop.
- Menambahkan header admin dengan identitas user terautentikasi.
- Menambahkan mobile off-canvas menu dengan overlay, tombol tutup, Escape close, dan body scroll lock.
- Mengubah dashboard placeholder menjadi dashboard proper.
- Statistik berita masih `—`, bukan angka palsu, sampai Phase 3C membuat database berita.
- Menu Berita dibuat disabled/"Segera" supaya tidak menghasilkan broken route sebelum CRUD tersedia.

## Config / ENV
Tidak ada perubahan.

## Dependency
Tidak ada dependency Composer/NPM baru.

## Tests
Menambahkan `AdminDashboardTest.php` untuk memverifikasi:
- guest diarahkan ke login;
- authenticated admin dapat membuka dashboard;
- identitas admin ditampilkan;
- ringkasan dashboard ditampilkan;
- action aman tersedia;
- route berita yang belum dibuat tidak diekspos sebagai link aktif.

## Risiko
Risk Level: LOW

Perubahan hanya pada admin frontend setelah authentication Phase 3A. Tidak ada database, route, auth logic, public UI, atau dependency yang diubah.

## Backward Compatibility
Aman. Public website dan authentication behavior tidak diubah.

## Rollback
Restore `resources/views/admin/dashboard.blade.php` ke versi Phase 3A dan hapus file layout/component/test yang ditambahkan pada batch ini.

## Verifikasi
Jalankan:

```bash
php artisan optimize:clear
php artisan test tests/Feature/AdminDashboardTest.php
php artisan test
npm run build
php artisan route:list --except-vendor
```

Visual QA:
- `<576px`: mobile header + drawer
- `768–991px`: content tablet
- `>=992px`: desktop sidebar tetap tampil
