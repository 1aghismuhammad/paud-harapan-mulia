# Phase 3E — News Featured Image V1

## Summary
Phase 3E mengaktifkan featured image opsional untuk modul berita admin tanpa mengubah schema database, karena kolom `featured_image` sudah tersedia sejak Phase 3C.

## Files changed
- `app/Http/Controllers/Admin/NewsController.php`
- `app/Http/Requests/Admin/StoreNewsRequest.php`
- `app/Http/Requests/Admin/UpdateNewsRequest.php`
- `resources/views/admin/news/_form.blade.php`
- `resources/views/admin/news/create.blade.php`
- `resources/views/admin/news/edit.blade.php`
- `resources/views/admin/news/index.blade.php`
- `tests/Feature/AdminNewsFeaturedImageTest.php`

## Behavior
- Featured image bersifat opsional untuk draft maupun published.
- Format yang diterima: JPG, JPEG, PNG, WEBP.
- Ukuran maksimum: 5 MB.
- File disimpan pada public disk di folder `news/` dengan nama file yang dihasilkan Laravel.
- Admin dapat melihat preview gambar baru sebelum submit.
- Edit dapat mengganti atau menghapus featured image.
- File lama dibersihkan setelah penggantian berhasil.
- File featured image ikut dibersihkan saat berita dihapus.
- Daftar berita menampilkan thumbnail bila tersedia.

## Database impact
NONE. Tidak ada migration baru.

## Route impact
NONE. Route Phase 3D tetap digunakan.

## Dependency impact
NONE.

## Security
- Server-side validation memastikan file merupakan gambar.
- Format dibatasi ke JPG/JPEG/PNG/WEBP.
- Ukuran dibatasi maksimal 5 MB.
- Storage menggunakan generated filename, bukan path yang dikirim user.

## Verification
Jalankan:

```bash
php artisan optimize:clear
php artisan storage:link
php artisan test tests/Feature/AdminNewsFeaturedImageTest.php
php artisan test tests/Feature/AdminNewsCrudTest.php
php artisan test
npm run build
php artisan route:list --except-vendor
```

Jika `public/storage` sudah tersedia, `php artisan storage:link` tidak perlu diulang.

## Risk
MEDIUM — fitur mulai menulis dan menghapus file pada public storage, tetapi tidak mengubah database schema, authentication, atau public routes.

## What was NOT changed
- Rich text editor.
- Inline image dalam content.
- Public news detail page.
- Category.
- Route structure.
