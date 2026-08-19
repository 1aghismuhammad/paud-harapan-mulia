# Phase 3D — News CRUD V1

## Summary
Mengaktifkan modul CRUD berita pada admin CMS berdasarkan database `news_posts` dari Phase 3C.

## Scope
- daftar berita admin dengan pagination;
- tambah berita;
- edit berita;
- hapus berita;
- draft / published;
- pemilihan tanggal publikasi, termasuk tanggal masa depan;
- slug otomatis dan unik;
- author otomatis dari admin login;
- excerpt opsional;
- custom tags opsional sebagai JSON;
- meta title dan meta description opsional;
- dashboard dan navigasi admin dihubungkan ke modul berita.

## Files Added
- `app/Http/Controllers/Admin/NewsController.php`
- `app/Http/Requests/Admin/StoreNewsRequest.php`
- `app/Http/Requests/Admin/UpdateNewsRequest.php`
- `database/migrations/2026_08_19_000200_add_tags_to_news_posts_table.php`
- `resources/views/admin/news/index.blade.php`
- `resources/views/admin/news/create.blade.php`
- `resources/views/admin/news/edit.blade.php`
- `resources/views/admin/news/_form.blade.php`
- `tests/Feature/AdminNewsCrudTest.php`

## Files Changed
- `routes/web.php`
- `app/Models/NewsPost.php`
- `database/factories/NewsPostFactory.php`
- `resources/views/components/admin/sidebar.blade.php`
- `resources/views/components/admin/mobile-menu.blade.php`
- `resources/views/admin/dashboard.blade.php`
- `tests/Feature/AdminDashboardTest.php`

## Database Impact
Migration baru menambahkan kolom nullable:

```text
tags JSON NULL
```

Tidak mengubah atau menghapus data Phase 3C.

## Route Impact
Menambahkan 6 route authenticated admin:

```text
GET    /admin/berita
GET    /admin/berita/tambah
POST   /admin/berita
GET    /admin/berita/{newsPost}/edit
PUT    /admin/berita/{newsPost}
DELETE /admin/berita/{newsPost}
```

Tidak menambah public news detail route pada batch ini.

## Dependency Impact
NONE.

## Security
- seluruh route berita berada di middleware `auth`;
- POST/PUT/DELETE memakai CSRF web middleware;
- validation melalui Form Request;
- `user_id` tidak diterima dari form dan selalu berasal dari user login;
- status hanya `draft` atau `published`;
- slug dibuat server-side dan dijaga unik;
- output admin tetap escaped oleh Blade.

## Deferred
Belum dikerjakan pada Phase 3D:
- featured image upload (Phase 3E);
- rich text editor dan inline image (Phase 3F);
- public news integration (Phase 3G);
- categories, comments, soft delete, bulk actions.

## Verification
Jalankan:

```bash
php artisan optimize:clear
php artisan migrate
php artisan test tests/Feature/AdminNewsCrudTest.php
php artisan test tests/Feature/AdminDashboardTest.php
php artisan test
npm run build
php artisan route:list --except-vendor
```

## Risk
MEDIUM

Alasan: menambah migration dan CRUD write operations, tetapi tidak mengubah authentication atau public website.
