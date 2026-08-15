# Change Log — Phase 1I Motion System V2

## Ringkasan

Menyempurnakan motion layer Phase 1 agar karakter animasi lebih dekat dengan benchmark visual Sekolah Cinta Kasih Tzu Chi, tetapi tetap menggunakan implementasi native Laravel Blade + CSS + JavaScript.

Motion diarahkan ke karakter:

`Visible enough to feel polished, subtle enough to stay professional.`

## Scope

- Modul: Public UI
- Fitur: Motion, animation, micro-interaction
- Backend: Tidak berubah
- Database: Tidak berubah

## File Diubah

### `resources/css/app.css`

- Mengganti Motion System V1 dengan Motion System V2.
- Menambahkan motion token global.
- Scroll reveal menjadi `20px / 600ms`.
- Stagger baseline menjadi `80ms`.
- Navbar mendapat animated underline.
- Dropdown menggunakan transisi `200ms`.
- Hero menggunakan entrance `600ms`.
- Hero slide menggunakan crossfade `900ms`.
- Hero image menggunakan subtle zoom `1.03 -> 1` sekitar `5000ms`.
- Card hover menggunakan lift `-4px`.
- Card image menggunakan zoom `1.04 / 450ms`.
- News title berubah ke brand green saat card hover.
- News arrow bergerak `3px`.
- CTA lift `-1px / 220ms`.
- Mobile drawer menggunakan `300ms`.
- Testimonial track menggunakan `550ms`.
- Testimonial card hover dibatasi `-2px`.
- Reduced-motion fallback dipertahankan dan diperketat.

### `resources/js/app.js`

- Mempertahankan mobile navigation existing.
- Memperhalus submenu menggunakan Web Animations API.
- Hero carousel diubah dari fade pendek ke state-based crossfade.
- Autoplay hero tetap `6500ms`.
- Hero berhenti saat hover/focus.
- Testimonial autoplay ditambahkan pada `5500ms`.
- Testimonial berhenti saat hover/focus.
- Testimonial dot, touch swipe, dan keyboard navigation dipertahankan.
- Scroll reveal menggunakan satu `IntersectionObserver`.
- Reveal hanya berjalan satu kali dengan `unobserve()`.

### `resources/views/layouts/public.blade.php`

- Menambahkan progressive-enhancement bootstrap `.js`.
- Menambahkan watchdog fallback agar content tidak tertinggal hidden apabila bundle motion gagal aktif.
- Tidak mengubah layout/header/footer structure.

### `resources/views/public/home/index.blade.php`

- Menambahkan `data-motion-unit-card` pada card PAUD dan TK.
- Tidak mengubah ukuran, content, route, maupun layout Unit Pendidikan.

## File Ditambah

- `docs/phase-01/CHANGELOG-motion-system-v2.md`
- `docs/progress/2026-08-15-phase-01i-motion-system-v2.md`

## File Dihapus

Tidak ada.

## Database

Tidak ada perubahan.

## Migration

Tidak ada migration baru.

## Model

Tidak ada perubahan.

## Route

Tidak ada perubahan.

## Config / ENV

Tidak ada perubahan.

## Dependency

Tidak ada dependency Composer/NPM baru.

Tidak menggunakan:

- GSAP
- AOS
- Framer Motion
- Animate.css
- Swiper
- OWL Carousel
- Slider Revolution

## Tests

Verification yang dapat dilakukan pada artifact:

- `node --check resources/js/app.js`
- pemeriksaan struktur ZIP
- pemeriksaan balance CSS braces

Verification project yang wajib dijalankan setelah diterapkan ke repository lokal:

```bash
php artisan optimize:clear
npm run build
php artisan test
```

## Risiko

Risk Level: LOW-MEDIUM

Alasan:

- tidak ada backend/database/dependency impact;
- behavior carousel, mobile navigation, testimonial, dan global motion JavaScript disentuh;
- rollback cukup mengembalikan empat file frontend yang berubah.

## Backward Compatibility

Aman.

- Laravel navigation tetap MPA normal.
- Native View Transition hanya progressive enhancement.
- Jika JS disabled, `.js` tidak ditambahkan sehingga content tetap visible.
- Jika reduced-motion aktif, animasi non-esensial dinonaktifkan.

## Yang Tidak Diubah

- typography;
- brand colors;
- content;
- layout dimensions;
- responsive breakpoints;
- routes;
- authentication;
- database;
- CMS;
- footer structure;
- public page structure.
