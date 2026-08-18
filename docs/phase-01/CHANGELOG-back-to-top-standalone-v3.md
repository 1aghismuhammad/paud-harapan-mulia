# Back To Top Standalone V3

## Summary
Memperbaiki tombol kembali ke atas yang sebelumnya tetap terasa seperti berpindah instan.

## Root cause
- Source `resources/js/app.js` sudah memiliki animasi custom.
- Tetapi `public/build/assets/app-*.js` di project terbaru lebih lama daripada source `app.js`.
- Saat handler JavaScript terbaru tidak aktif, elemen `<a href="#">` memakai perilaku default browser dan langsung melompat ke atas.
- Selain itu, implementasi lama melakukan instant jump ketika `prefers-reduced-motion` aktif.

## Changes
- Tombol footer diubah dari anchor `href="#"` menjadi `<button type="button">` agar tidak memiliki fallback jump.
- Logic back-to-top dipisahkan menjadi `public/js/back-to-top.js`, sehingga tidak bergantung pada status Vite dev server / stale build untuk fitur ini.
- Durasi normal: sekitar 3.4–5.2 detik tergantung jarak scroll.
- Reduced motion: 1.6 detik, tanpa decorative motion.
- Manual wheel/touch membatalkan animasi agar kontrol tetap di tangan pengguna.
- Handler lama di `resources/js/app.js` dihapus untuk mencegah double binding.

## Files changed
- `resources/js/app.js`
- `resources/views/components/site/footer.blade.php`
- `resources/views/layouts/public.blade.php`
- `public/js/back-to-top.js`

## Database impact
None.

## Route impact
None.

## Dependency impact
None.

## Risk
LOW.

## Verification
- `node --check public/js/back-to-top.js`
- `node --check resources/js/app.js`

## What was NOT changed
- Footer layout
- Navbar
- Page content
- Database
- Routes
