# Change Log — Mobile Navigation Revision

## Ringkasan

Menyesuaikan navigasi mobile Phase 1 menjadi pola **off-canvas drawer dari kiri** sesuai referensi UI terbaru.

## File yang Diubah

### `resources/views/components/site/topbar.blade.php`
- Topbar hanya tampil pada desktop (`lg+`).
- Struktur desktop tidak diubah.

### `resources/views/components/site/navbar.blade.php`
- Mobile header menjadi satu baris: logo kiri + hamburger kanan.
- Label `Menu` dihapus.
- Desktop navbar tetap dipertahankan.

### `resources/views/components/site/mobile-menu.blade.php`
- Menu mobile menjadi fixed off-canvas drawer dari kiri.
- Menambahkan dark overlay.
- Menambahkan logo + tombol close pada header drawer.
- Menu item diperbesar dan memakai divider.
- Submenu menggunakan ikon `+ / −`.
- Contact box lama dihapus agar mengikuti reference.

### `resources/js/app.js`
- Menambahkan close via tombol close, overlay, Escape, dan klik link.
- Scroll halaman dikunci ketika drawer terbuka.
- Logic submenu disesuaikan untuk ikon `+ / −`.
- Logic hero carousel dipertahankan.

## Database
Tidak ada perubahan.

## Migration
Tidak ada migration baru.

## Route
Tidak ada perubahan.

## Config / ENV
Tidak ada perubahan.

## Dependency
Tidak ada package baru.

## Tests

Jalankan:

```bash
npm run build
php artisan test
```

Visual QA minimum:

```text
390 × 844
768 × 1024
```

Periksa:
- drawer terbuka dari kiri;
- overlay menutup area di luar drawer;
- body tidak scroll saat drawer terbuka;
- submenu expand/collapse;
- Escape dan klik overlay menutup menu;
- desktop navbar tidak berubah.

## Risiko

**Risk Level: LOW**

Perubahan terbatas pada presentation layer dan behavior mobile navigation.
