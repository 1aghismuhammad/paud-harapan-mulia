# Phase 3F — Rich Text + Inline Media V1

Tanggal: 19 Agustus 2026

## Scope

Batch ini mengaktifkan editor rich text untuk isi berita, upload gambar inline, caption, dan sanitasi HTML server-side.

### Fitur

- editor `contenteditable` tanpa dependency frontend baru;
- paragraph, H2, H3, bold, italic, bullet list, numbered list, blockquote, link, undo/redo;
- upload inline image ke `storage/app/public/news/content/`;
- caption gambar opsional;
- endpoint upload hanya untuk admin terautentikasi dan dibatasi `throttle:30,1`;
- format upload: JPG, JPEG, PNG, WEBP, maksimal 5 MB;
- CSRF token untuk upload asynchronous;
- sanitasi HTML server-side sebelum create/update;
- allowlist tag dan URL scheme;
- script, iframe, object, event handler, inline style, dan URL `javascript:` dibuang;
- image di dalam artikel hanya boleh merujuk ke `/storage/news/content/...`;
- tidak ada migration baru dan tidak ada dependency baru.

## Route baru

- `POST /admin/berita/media` → `admin.news.media.store`

Expected application routes setelah batch: 18.

## File utama

- `app/Support/NewsContentSanitizer.php`
- `app/Http/Controllers/Admin/NewsMediaController.php`
- `app/Http/Requests/Admin/UploadNewsMediaRequest.php`
- `app/Http/Controllers/Admin/NewsController.php`
- `app/Http/Requests/Admin/StoreNewsRequest.php`
- `app/Http/Requests/Admin/UpdateNewsRequest.php`
- `resources/views/admin/news/_form.blade.php`
- `resources/views/layouts/admin.blade.php`
- `routes/web.php`
- `tests/Feature/AdminNewsRichTextTest.php`
- `tests/Feature/AdminNewsInlineImageTest.php`

## Catatan

Inline image yang sudah di-upload tetapi artikel kemudian dibatalkan belum dibersihkan otomatis pada V1. Garbage collection media orphan ditunda ke hardening agar Phase 3F tidak berkembang menjadi media library kompleks.
