# Change Log — Visual Proportion Revision

## Ringkasan

Menyesuaikan proporsi desktop agar lebih dekat dengan UI reference tanpa memperlebar seluruh layout secara global.

Prinsip perubahan:

```text
Header / text content  → tetap ±1180px
Hero / visual utama   → maksimal ±1560px
Navbar                → sedikit lebih tinggi dan besar
Mobile navigation     → tidak diubah
```

---

## File yang Diubah

### `resources/css/app.css`

- Mempertahankan `.site-container` dengan `max-width: 1180px`.
- Menambahkan `.hero-container` khusus visual utama dengan `max-width: 1560px` pada desktop.
- Desktop nav link dinaikkan dari 14px menjadi 15px.
- Padding vertikal desktop nav diperbesar untuk hierarchy visual yang lebih dekat dengan reference.
- Tidak mengubah color token, font, section spacing, card, dropdown, atau accessibility baseline.

### `resources/views/components/site/hero.blade.php`

- Wrapper hero berubah dari `.site-container` menjadi `.hero-container`.
- Aspect ratio tetap:
  - mobile `4:3`;
  - small `16:9`;
  - desktop `16:7`.
- Carousel behavior, slides, alt text, controls, lazy loading, dan LCP priority tidak diubah.

### `resources/views/components/site/navbar.blade.php`

- Tinggi navbar desktop menjadi minimum `72px`.
- Mobile header dan off-canvas navigation tidak diubah.
- Struktur route/dropdown tidak diubah.

---

## Database

Tidak ada perubahan.

## Migration

Tidak ada migration baru.

## Route

Tidak ada perubahan.

## Config / ENV

Tidak ada perubahan.

## Dependency

Tidak ada dependency baru.

## Content

Tidak ada perubahan konten.

---

## Verification

Jalankan:

```bash
npm run build
php artisan test
```

Visual QA:

```text
1920 × 1080
1440 × 900
1024 × 768
768 × 1024
390 × 844
```

Periksa:

- hero lebih lebar pada desktop;
- header tetap terpusat dan tidak ikut melebar;
- highlight cards tetap compact;
- navbar desktop tidak terlalu pendek;
- tidak ada horizontal overflow;
- mobile drawer tetap sama;
- hero crop masih masuk akal.

---

## Expected Desktop Proportion

Pada viewport 1920px:

```text
Header / navbar content:
max ±1180px

Hero:
max ±1560px

Main text sections:
max ±1180px
```

Tujuan bukan pixel-perfect copy, tetapi menyamai hierarchy visual reference: **hero lebih dominan daripada header dan body content**.

---

## Risiko

**Risk Level: LOW**

Perubahan terbatas pada presentation layer dan tidak menyentuh business logic, backend, database, atau dependency.
