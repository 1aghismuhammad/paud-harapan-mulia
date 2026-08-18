# Facilities Reference Layout

## Summary
Menyesuaikan halaman Fasilitas agar mengikuti proporsi dan pola visual reference Sekolah Cinta Kasih Tzu Chi tanpa menyalin konten/fakta sekolah reference.

## Files changed
- `resources/views/public/about/fasilitas.blade.php`

## Why
Current page masih berupa preview grid sederhana. Reference menggunakan green title/breadcrumb band, section title besar, descriptive copy terpusat, serta media carousel 3-card di desktop dan single-card di mobile.

## Database impact
None.

## Migration impact
None.

## Route impact
None.

## Dependency impact
None.

## Key changes
- Custom facilities page hero khusus halaman Fasilitas.
- Desktop: compact green band + breadcrumb tab kanan.
- Mobile: tall green band + judul Fasilitas.
- Main heading Fasilitas tetap ditampilkan di area content.
- Facility section title diperbesar dan dipusatkan.
- Media menjadi carousel responsive: 3 desktop / 2 tablet / 1 mobile.
- Previous/next controls desktop/tablet.
- Touch swipe untuk mobile.
- Hover/focus overlay pada media.
- Existing PAUD media assets digunakan; tidak menyalin nama Gedung A/B dari reference karena belum ada data resmi sekolah.

## Testing
Manual source review completed.
`npm run build` dan Laravel test belum dijalankan pada snapshot ini karena dependency runtime tidak tersedia di workspace.

## Risk
LOW

## What was NOT changed
- Global navbar/header behavior.
- Footer.
- Routes.
- Database.
- Facility inventory/facts resmi.
- Page lain.
