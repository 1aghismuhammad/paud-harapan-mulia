# Change Log — Responsive Breakpoint Standardization V1

## Ringkasan
Menstandarkan breakpoint responsive Phase 1 ke 576 / 768 / 992 / 1200 / 1400 agar Tailwind utilities, media query CSS, dan JavaScript carousel memakai batas viewport yang konsisten.

## File Diubah
- `resources/css/app.css`
  - Menambahkan custom Tailwind breakpoint `sm`, `md`, `lg`, `xl`, dan `2xl`.
  - Menyesuaikan media query container dari `1023px` menjadi `991px` agar sinkron dengan `lg >= 992px`.
- `resources/views/public/about/facilities.blade.php`
  - Menyelaraskan mobile autoplay dan visible-count carousel ke breakpoint baru.
- `resources/views/public/school/paud.blade.php`
  - Menyelaraskan visible-count showcase carousel ke breakpoint baru.
- `resources/views/public/school/tk.blade.php`
  - Menyelaraskan visible-count showcase carousel ke breakpoint baru.
- `docs/PRD.md`
  - Mengganti baseline responsive lama dengan standar baru dan menambah boundary QA.
- `docs/DESIGN.md`
  - Menyinkronkan breakpoint dan viewport QA dengan PRD.

## Database
Tidak ada perubahan.

## Migration
Tidak ada migration baru.

## Route
Tidak ada perubahan.

## Config / ENV
Tidak ada perubahan config Laravel atau ENV. Breakpoint ditetapkan melalui Tailwind `@theme` di `resources/css/app.css`.

## Dependency
Tidak ada dependency baru.

## Tests / Verification
- Cross-check seluruh hardcoded `640px` / `1024px` pada source frontend yang terkait carousel.
- JavaScript inline PAUD/TK/Fasilitas diverifikasi secara sintaks setelah perubahan.
- Build penuh perlu dijalankan pada environment yang memiliki `node_modules`.
- Responsive visual QA wajib dilakukan pada boundary 575/576, 767/768, 991/992, 1199/1200, dan 1399/1400.

## Dampak
- Utility `sm:` sekarang aktif mulai 576px.
- Utility `lg:` sekarang aktif mulai 992px.
- Utility `xl:` sekarang aktif mulai 1200px.
- Utility `2xl:` sekarang aktif mulai 1400px.
- Layout existing menggunakan class responsive yang sama; hanya titik aktivasi breakpoint yang distandarkan.

## Risiko
MEDIUM.

Perubahan breakpoint bersifat global sehingga semua class `sm:`, `lg:`, `xl:`, dan `2xl:` dapat berubah pada rentang viewport yang sebelumnya berada di antara breakpoint lama dan baru. Tidak ada redesign atau refactor komponen di luar standardisasi ini.

## Rollback
Kembalikan custom `--breakpoint-*` pada `resources/css/app.css` dan nilai `matchMedia` pada tiga view carousel ke nilai sebelumnya.
