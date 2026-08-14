# Change Log — All Public Pages Reference Alignment

## Ringkasan

Menyesuaikan ukuran, hierarchy, spacing, dan komposisi seluruh halaman publik agar mengikuti UI reference yang diberikan.

## Reference Layout Rules

```text
Header content          ≈ 1120px
Inner page green banner ≈ wide frame / max 1880px
Main page content       ≈ 1080–1160px
History article         ≈ 1120px
Centered history image  ≈ 700px
Unit page hero          ≈ max 1660px
Facility media area     ≈ max 860px
News card grid          ≈ max 1080px
Footer inner            ≈ 1120px
```

## File Diubah

- `resources/css/app.css`
- `resources/views/components/site/page-hero.blade.php`
- `resources/views/components/site/news-card.blade.php`
- `resources/views/components/site/footer.blade.php`
- `resources/views/public/about/history.blade.php`
- `resources/views/public/about/vision-mission.blade.php`
- `resources/views/public/about/facilities.blade.php`
- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`
- `resources/views/public/news/index.blade.php`

## Perubahan Utama

### Sejarah
- Layout 2 kolom dihapus.
- Mengikuti reference: banner hijau → heading → gambar centered → artikel panjang.

### Visi & Misi
- Card layout dihapus.
- Mengikuti reference: simple editorial text layout.

### Fasilitas
- 2-column layout diganti menjadi centered facility showcase.
- 3 media card per baris dengan arrow visual.
- Dua kelompok content untuk menjaga ritme reference.

### PAUD / TK
- Dibuat wide unit hero.
- Profil unit menggunakan 2 image + text.
- Ditambahkan tiga showcase row.
- Ditambahkan Keunggulan section 2 kolom.
- Ditambahkan 3 news cards.

### Berita
- Dibuat centered headline + 3 reference-sized cards.
- Page hero hijau tidak dipakai karena reference news menggunakan whitespace besar.

### Footer
- Typography dan inner width disesuaikan agar konsisten di seluruh halaman.

## Yang Tidak Diubah

- Database
- Migration
- Authentication
- CMS backend
- Route
- Model
- Service
- Dependency Composer/NPM
- Mobile drawer logic
- Homepage content

## Database
Tidak ada perubahan.

## Route
Tidak ada perubahan.

## Dependency
Tidak ada dependency baru.

## Risk
**Risk Level: MEDIUM**

Perubahan cukup luas pada presentation layer, tetapi tidak menyentuh backend atau business logic.

## Verification

Jalankan:

```bash
php artisan optimize:clear
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

Review seluruh halaman:

```text
/tentang-kami/sejarah
/tentang-kami/visi-misi
/tentang-kami/fasilitas
/sekolah/paud
/sekolah/tk
/berita
```
