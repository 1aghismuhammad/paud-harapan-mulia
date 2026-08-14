# PRD — Company Profile PAUD Harapan Mulia

**Dokumen:** Product Requirements Document  
**Produk:** Company Profile PAUD Harapan Mulia  
**Institusi:** PAUD (KB & TK) Islam Terpadu Harapan Mulia  
**Versi:** 1.0 Draft Baseline  
**Tanggal:** 14 Agustus 2026  
**Status:** Siap digunakan sebagai baseline development

---

## 1. Ringkasan Produk

Company Profile PAUD Harapan Mulia adalah website publik untuk memperkenalkan PAUD (KB & TK) Islam Terpadu Harapan Mulia kepada masyarakat, calon orang tua/wali, dan pihak lain yang ingin mengetahui profil sekolah.

Produk ini berfokus pada:

1. membangun identitas digital resmi sekolah;
2. menyajikan informasi profil sekolah secara terstruktur;
3. menampilkan dokumentasi kegiatan dan fasilitas;
4. menyediakan berita sekolah yang dapat diperbarui melalui CMS;
5. menyediakan galeri foto berbasis album;
6. meningkatkan discoverability melalui SEO dan desain responsive mobile-first.

Website ini adalah **single institution website**, bukan SaaS dan bukan sistem informasi akademik.

---

## 2. Latar Belakang dan Masalah

PAUD Harapan Mulia membutuhkan "muka digital" resmi agar sekolah:

- lebih mudah ditemukan dan dikenal masyarakat;
- memiliki satu sumber informasi resmi;
- dapat menyampaikan profil, visi, misi, program, kegiatan, fasilitas, dan kontak;
- dapat mempublikasikan berita tanpa harus meminta developer setiap kali ada berita baru;
- dapat menampilkan dokumentasi sekolah secara lebih profesional.

Masalah yang diselesaikan produk ini bukan pengelolaan akademik internal, melainkan **visibilitas, kredibilitas, komunikasi publik, dan publikasi konten sekolah**.

---

## 3. Tujuan Produk

### 3.1 Tujuan Utama

- Menjadi website resmi Company Profile PAUD Harapan Mulia.
- Membantu masyarakat memahami identitas dan karakter sekolah.
- Menampilkan kegiatan, fasilitas, dan dokumentasi sekolah.
- Memberikan CMS sederhana dan nyaman untuk mengelola berita.
- Memberikan modul galeri berbasis album.
- Menjadi fondasi digital untuk pengembangan fitur lain pada fase berikutnya.

### 3.2 Sasaran Keberhasilan

Produk dianggap berhasil apabila:

- pengunjung dapat memahami profil sekolah tanpa perlu login;
- halaman utama bekerja dengan baik di mobile, tablet, dan desktop;
- admin dapat login dan mengelola berita;
- admin dapat mengelola album galeri dan foto;
- berita memiliki URL yang bersih dan dapat dibagikan;
- website memiliki metadata SEO, sitemap, robots, canonical, Open Graph, dan struktur semantic HTML;
- gambar dapat ditampilkan dengan performa yang memadai;
- website dapat dideploy ke shared hosting/cPanel yang telah disiapkan.

---

## 4. Scope Produk

### 4.1 In Scope — MVP

#### Website Publik

- Home
- About Us / Tentang Kami
- Our School / Sekolah Kami
- Berita
- Detail Berita
- Galeri
- Detail Album
- Contact information pada header/footer
- Responsive navigation
- Hero/banner carousel
- Informasi keunggulan sekolah
- Informasi fasilitas
- Informasi program/kegiatan
- Visi, misi, tujuan, sejarah, dan profil sekolah
- Tautan media sosial
- Video profil bila digunakan
- SEO teknis dasar dan advanced baseline

#### Admin / CMS

- Login admin
- Dashboard admin
- Manajemen berita
- Manajemen galeri
- Upload gambar
- Draft/publish berita
- Preview berita sebelum publish
- Delete/restore sesuai implementasi soft delete
- Search/filter daftar konten

### 4.2 Out of Scope — MVP

Belum termasuk:

- akun orang tua;
- data siswa;
- absensi;
- pembayaran/SPP;
- rapor;
- pendaftaran siswa;
- portal guru;
- multi-role kompleks;
- multi-institution/multi-tenant;
- payment gateway;
- aplikasi mobile native;
- notifikasi WhatsApp otomatis;
- sistem akademik.

Fitur tersebut hanya dapat masuk melalui keputusan scope baru pada fase lanjutan.

---

## 5. Pengguna dan Role

### 5.1 Public Visitor

Tidak memerlukan login.

Kebutuhan utama:

- melihat informasi sekolah;
- membaca berita;
- melihat galeri;
- mendapatkan alamat/kontak;
- membuka media sosial;
- mengenal program dan karakter sekolah.

### 5.2 Admin

MVP hanya menggunakan **satu role: Admin**.

Admin dapat:

- login;
- membuka dashboard;
- membuat berita;
- mengedit berita;
- menyimpan berita sebagai draft;
- mempublikasikan berita;
- menghapus/memulihkan berita bila soft delete digunakan;
- membuat album galeri;
- mengunggah foto ke album;
- mengedit metadata konten.

Tidak ada Super Admin pada MVP.

---

## 6. Struktur Informasi Website

Struktur utama mengikuti referensi visual yang diberikan.

```text
Home
├── Hero / Banner
├── Keunggulan
├── Tentang Singkat
├── Program / Kegiatan
├── Fasilitas
├── Berita Terbaru
├── Galeri
└── Footer

About Us
├── Profil
├── Sejarah
├── Visi
├── Misi
└── Tujuan

Our School
├── Program / Kegiatan
├── Fasilitas
└── Keunggulan Sekolah

Berita
├── Daftar Berita
└── Detail Berita

Galeri
├── Daftar Album
└── Detail Album
```

Kontak tidak wajib memiliki halaman terpisah pada MVP. Kontak utama ditampilkan di header/footer sesuai referensi desain.

---

## 7. Sumber Konten Awal

Dataset yang diberikan sudah memuat bahan awal berikut:

- nama resmi sekolah;
- alamat;
- email;
- nomor WhatsApp/telepon;
- akun media sosial;
- visi dan misi;
- sejarah/karakteristik sekolah;
- tujuan;
- dokumentasi kegiatan;
- dokumentasi Home Parenting;
- dokumentasi Akhirussanah;
- foto kelompok;
- foto kegiatan keagamaan;
- foto kunjungan/kegiatan lapangan;
- video landscape dan portrait;
- kebutuhan fasilitas, testimonial, dan berita.

### Identitas yang ditemukan pada dataset

**Nama:** PAUD (KB & TK) Islam Terpadu Harapan Mulia  
**Alamat referensi:** Jl. Caren RT 01 RW 04, Kel. Ngawen, Kec. Ngawen, Kab. Blora  
**Email referensi:** tkitharapanmulia063@gmail.com  
**Nomor referensi:** 089613624186

> Seluruh data kontak dan isi final harus diverifikasi kembali oleh pihak sekolah sebelum production release.

---

## 8. Konten Static vs Dynamic

### 8.1 Static / Hardcoded Blade

Sesuai keputusan project, konten berikut pada MVP disimpan di Blade/config dan hanya diubah melalui source code:

- profil sekolah;
- sejarah;
- visi;
- misi;
- tujuan;
- deskripsi program;
- keunggulan;
- informasi fasilitas;
- informasi kontak;
- tautan sosial media;
- kata perenungan/footer;
- konten hero non-CMS bila tidak menggunakan berita sebagai banner.

Alasan:

- frekuensi perubahan rendah;
- scope admin tetap kecil;
- menghindari CMS generik yang tidak diperlukan pada MVP.

### 8.2 Dynamic / Database

Data yang dikelola melalui database:

- users/admin;
- berita;
- galeri album;
- galeri image;
- metadata terkait konten dynamic.

File image **tidak disimpan sebagai binary di database**. Database hanya menyimpan path, filename, metadata, alt text, dan relasi.

---

## 9. Modul Berita — CMS WordPress-Inspired

Tujuan UX CMS bukan menyalin WordPress secara identik, tetapi mengambil pola yang sudah familiar dan nyaman.

### 9.1 Daftar Berita

Admin dapat:

- melihat daftar berita;
- search berdasarkan judul;
- filter status;
- melihat tanggal publish;
- melihat status;
- membuka edit;
- menghapus berita;
- membuat berita baru.

### 9.2 Form Berita

Field MVP:

- title;
- slug;
- excerpt/ringkasan;
- content;
- featured image;
- featured image alt text;
- status: `draft` / `published`;
- published_at;
- SEO title;
- SEO meta description.

Field system:

- author_id;
- created_at;
- updated_at;
- deleted_at bila soft delete digunakan.

### 9.3 Rich Text Editor

CMS harus menyediakan editor yang terasa seperti editor publishing modern:

- heading;
- paragraph;
- bold;
- italic;
- bullet list;
- numbered list;
- link;
- image;
- quote bila diperlukan;
- undo/redo;
- clean HTML output.

**Pilihan editor final belum dikunci** dan akan ditentukan setelah referensi CMS dari user diberikan.

Penambahan dependency editor tidak boleh dilakukan tanpa review dependency terlebih dahulu.

### 9.4 Fitur yang Ditunda

Untuk mencegah overengineering, berikut ditunda sampai ada kebutuhan:

- tags;
- banyak kategori;
- scheduled publishing kompleks;
- revision history seperti WordPress;
- multi-author workflow;
- approval workflow;
- comments publik.

---

## 10. Modul Galeri

Galeri menggunakan konsep album.

### 10.1 Album

Field minimum:

- title;
- slug;
- description;
- cover_image;
- cover_alt_text;
- published_at;
- created_at;
- updated_at.

### 10.2 Gallery Image

Field minimum:

- gallery_album_id;
- image_path;
- alt_text;
- caption;
- sort_order;
- created_at.

### 10.3 Candidate Album dari Dataset

Candidate awal berdasarkan aset yang diterima:

- Akhirussanah;
- Home Parenting;
- Kegiatan Keagamaan;
- Kegiatan Lapangan/Kunjungan;
- Kegiatan Siswa;
- Dokumentasi Sekolah.

Nama album final harus mengikuti persetujuan pihak sekolah.

---

## 11. SEO Requirements

Website harus menggunakan pendekatan **people-first + search-friendly**, bukan keyword stuffing.

### 11.1 SEO Teknis

Wajib:

- unique `<title>` per halaman;
- meta description;
- canonical URL;
- Open Graph;
- social preview image;
- robots.txt;
- sitemap.xml;
- clean slug;
- semantic heading hierarchy;
- descriptive image alt;
- descriptive filename untuk aset baru;
- breadcrumb pada halaman yang membutuhkan hierarchy;
- structured data yang sesuai konten;
- 404 page yang benar;
- status HTTP yang benar;
- redirect permanent bila slug berubah dan fitur tersebut dibuat;
- HTTPS di production.

### 11.2 Structured Data

Baseline:

- `Organization` / tipe yang sesuai untuk institusi;
- `Article` atau `NewsArticle` untuk berita bila sesuai;
- `BreadcrumbList` pada detail/hierarchy;
- metadata gambar yang relevan.

Structured data harus sama dengan konten yang terlihat pada halaman.

### 11.3 Mobile SEO

Website menggunakan URL dan HTML yang sama untuk semua perangkat melalui responsive design.

Konten penting tidak boleh hilang di mobile.

### 11.4 Image SEO

- image relevan dengan konteks halaman;
- alt text deskriptif;
- nama file baru dibuat deskriptif;
- ukuran image sesuai kebutuhan;
- hindari image beresolusi sangat kecil;
- gunakan lazy loading untuk image di bawah fold bila tepat;
- hero/LCP image tidak boleh diperlakukan sama seperti image sekunder.

---

## 12. Performance Requirements

Target baseline:

- mobile-first;
- Core Web Vitals dipantau;
- target LCP ≤ 2.5 s;
- target INP < 200 ms;
- target CLS < 0.1;
- asset CSS/JS dibuild dan versioned melalui Vite;
- gambar tidak dikirim jauh lebih besar dari ukuran render;
- width/height/aspect ratio image ditentukan untuk mengurangi layout shift;
- minimize blocking scripts;
- carousel tidak boleh membebani halaman dengan terlalu banyak image eager-load.

---

## 13. Responsive Requirements

Responsive implementation bersifat **content-driven**, bukan mengunci diri pada nama perangkat tertentu.

Breakpoint project mengikuti baseline Tailwind CSS:

```text
Base      : < 640px
sm        : >= 640px
md        : >= 768px
lg        : >= 1024px
xl        : >= 1280px
2xl       : >= 1536px
```

Untuk QA, kelompok praktis:

```text
Mobile    : < 768px
Tablet    : 768px - 1023px
Desktop   : >= 1024px
Wide      : >= 1536px
```

Representative QA viewport:

```text
390 × 844     Mobile
768 × 1024    Tablet
1440 × 900    Desktop
1920 × 1080   Wide Desktop / reference
```

Breakpoint tidak boleh ditentukan berdasarkan merek perangkat.

---

## 14. Acceptance Criteria MVP

### Public

- [ ] Home tampil normal pada mobile/tablet/desktop.
- [ ] Navbar responsive.
- [ ] Hero/banner berfungsi.
- [ ] Profil, visi, misi, tujuan, dan sejarah tersedia.
- [ ] Berita dapat dilihat publik.
- [ ] Detail berita menggunakan slug.
- [ ] Galeri album dapat dilihat publik.
- [ ] Kontak dan sosial media tampil.
- [ ] Metadata SEO tersedia.
- [ ] Tidak ada konten utama desktop yang hilang pada mobile.

### Admin

- [ ] Admin dapat login.
- [ ] Route admin terlindungi authentication.
- [ ] Admin dapat CRUD berita.
- [ ] Admin dapat upload featured image.
- [ ] Admin dapat draft/publish.
- [ ] Admin dapat CRUD album.
- [ ] Admin dapat upload/hapus/reorder foto album.
- [ ] Validation berjalan.
- [ ] Upload file dibatasi tipe dan ukuran.
- [ ] Error ditampilkan dengan aman.

### QA

- [ ] Feature test penting lulus.
- [ ] Tidak ada secret masuk Git.
- [ ] Tidak ada broken route.
- [ ] Tidak ada N+1 yang diketahui pada list berita/galeri.
- [ ] Production build berhasil.
- [ ] Smoke test production berhasil.

---

## 15. Development Phases

### Phase 0 — Foundation & Documentation

Tujuan:

- kunci PRD;
- kunci architecture;
- kunci design system;
- inventaris asset;
- definisikan folder/route;
- verifikasi environment;
- buat baseline progress reporting.

Output:

- `docs/PRD.md`
- `docs/ARCHITECTURE.md`
- `docs/DESIGN.md`

### Phase 1 — Public UI Foundation

- global layout;
- header;
- navigation;
- hero;
- footer;
- design tokens;
- responsive container;
- component umum;
- static Home skeleton.

### Phase 2 — Static Company Profile

- About Us;
- Our School;
- sejarah;
- visi-misi;
- tujuan;
- fasilitas;
- program/kegiatan;
- konten dataset;
- optimasi asset awal.

### Phase 3 — Admin Authentication & News CMS

- admin login;
- dashboard;
- news schema;
- news CRUD;
- rich text editor;
- upload featured image;
- draft/publish;
- SEO metadata berita;
- public news listing/detail.

### Phase 4 — Gallery CMS

- album schema;
- gallery image schema;
- admin CRUD;
- upload multiple image;
- reorder;
- public album/gallery.

### Phase 5 — SEO, Performance, Accessibility & Hardening

- sitemap;
- robots;
- structured data;
- Open Graph;
- canonical;
- alt audit;
- performance audit;
- Core Web Vitals optimization;
- keyboard/focus/accessibility checks;
- security review.

### Phase 6 — UAT, Deployment & Production

- content final;
- backup;
- production `.env`;
- database migration;
- storage link;
- production Vite build;
- cPanel deployment;
- SSL;
- smoke test;
- Search Console setup;
- handover.

---

## 16. Progress Reporting

Setiap fase wajib memiliki progress report di:

```text
docs/progress/
```

Format nama:

```text
YYYY-MM-DD-phase-XX-nama-phase.md
```

Contoh:

```text
2026-08-14-phase-00-foundation.md
```

Format laporan minimum:

```markdown
# Progress Report

## Phase
Phase X — Nama

## Status
NOT STARTED | IN PROGRESS | BLOCKED | DONE

## Target
- ...

## Selesai
- ...

## Sedang Dikerjakan
- ...

## Belum Dikerjakan
- ...

## File Ditambah/Diubah
- ...

## Database/Migration
- ...

## Tests
- ...

## Masalah / Blocker
- ...

## Keputusan
- ...

## Risiko
LOW | MEDIUM | HIGH

## Next Step
1. ...
2. ...
```

Perubahan kode individual tetap mengikuti Change Log yang sudah ditentukan di `.agents`.

---

## 17. Prioritas Mulai Development

Urutan pertama yang direkomendasikan:

```text
1. Finalisasi dokumen baseline.
2. Susun asset inventory dan naming.
3. Buat design tokens + layout global.
4. Implement header/navbar/footer.
5. Implement Home static.
6. Implement static profile pages.
7. Baru masuk authentication + CMS berita.
```

Alasan: public design perlu dikunci lebih dulu agar CMS nantinya menghasilkan konten yang jelas akan ditampilkan dalam komponen apa.

---

## 18. Risiko dan Mitigasi

### Scope Creep

Risiko:
project berubah menjadi sistem akademik sebelum MVP selesai.

Mitigasi:
semua fitur di luar PRD masuk backlog, bukan langsung dikembangkan.

### Asset Tidak Konsisten

Risiko:
image berasal dari WhatsApp dengan ukuran/orientasi berbeda.

Mitigasi:
inventaris, rename, crop/aspect convention, dan optimasi sebelum publish.

### CMS Terlalu Kompleks

Risiko:
mencoba meniru WordPress secara penuh.

Mitigasi:
hanya adopsi UX publishing yang relevan dengan kebutuhan sekolah.

### Shared Hosting Constraints

Risiko:
permission storage, symlink, PHP extension, build/deploy.

Mitigasi:
uji deployment sebelum UAT final dan dokumentasikan langkah production.

---

## 19. Backlog Future

Candidate pengembangan berikutnya:

- dynamic settings/profile content;
- admin management;
- user role tambahan;
- parent portal;
- pendaftaran online;
- form kontak;
- newsletter;
- WhatsApp integration;
- analytics dashboard;
- revision history CMS;
- search global;
- category/tag berita.

Tidak masuk MVP tanpa perubahan PRD.

---

## 20. Referensi Teknis

- Repository project: https://github.com/1aghismuhammad/paud-harapan-mulia
- Tailwind responsive design: https://tailwindcss.com/docs/responsive-design
- Responsive Web Design — web.dev: https://web.dev/articles/responsive-web-design-basics
- Google mobile-first indexing: https://developers.google.com/search/docs/crawling-indexing/mobile/mobile-sites-mobile-first-indexing
- Google SEO Starter Guide: https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- Google Image SEO: https://developers.google.com/search/docs/appearance/google-images
- Google Core Web Vitals: https://developers.google.com/search/docs/appearance/core-web-vitals
