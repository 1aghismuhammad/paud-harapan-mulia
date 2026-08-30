# DESIGN — Company Profile PAUD Harapan Mulia

**Version:** 1.5 — Current Public UI + Admin CMS  
**Date:** 30 Agustus 2026

Reconciliation 30 Agustus 2026: hero autoplay, komposisi beranda (Sekolah Kami), logo resmi, dan sumber berita CMS. Navigasi “Sekolah Kami” adalah tautan langsung ke `/sekolah-kami` (bukan dropdown PAUD/TK). Detail implementasi historis: [`history/UI-DESIGN-HISTORY.md`](history/UI-DESIGN-HISTORY.md).

## 1. Visual Direction

UI dibuat **cukup dekat dengan referensi** dalam layout language dan hierarchy, tetapi bukan clone identitas visual institusi referensi.

Dipertahankan:

- banyak whitespace;
- centered content;
- top contact row + navigation row;
- dropdown putih dengan shadow lembut;
- hero visual besar;
- card clean;
- section image + text;
- testimonial green section;
- news cards;
- footer tiga kolom.

Diganti:

- blue/purple reference -> hijau, orange, yellow PAUD Harapan Mulia;
- jenjang sekolah reference -> PAUD dan TK;
- copy reference -> konten PAUD Harapan Mulia.

Branding current memakai **logo resmi** (`logo-official.webp`). Logo sementara dataset bersifat historis saja.

## 2. Brand Colors

```text
brand-green-dark   #29693E
brand-green        #5EA10F
brand-green-light  #93C854
brand-orange       #F66F09
brand-yellow       #F4C90F
white              #FFFFFF
surface            #F8FAF8
text               #17201A
muted              #667269
border             #E4E9E5
```

Green dominan. Orange/yellow hanya accent.

## 3. Typography

Reference memiliki karakter geometric sans. Phase 1 menggunakan **Poppins** sebagai implementation approximation yang paling dekat untuk review visual.

```text
font-family: Poppins, ui-sans-serif, system-ui, sans-serif
```

Jika user menilai visual font belum cocok, typography dapat diganti tanpa mengubah component architecture.

## 4. Navigation

### Desktop

```text
Logo + social + WhatsApp + email
────────────────────────────────
Beranda   Tentang Kami▼   Sekolah Kami   Berita
```

Tentang Kami:

```text
Sejarah
Visi & Misi
Fasilitas
```

Sekolah Kami adalah tautan langsung ke `/sekolah-kami`. Tidak ada submenu PAUD/TK pada navigasi primer.

### Mobile

Logo + hamburger. Submenu accordion hanya untuk Tentang Kami. Sekolah Kami adalah tautan langsung.

Tidak ada menu Galeri.

## 5. Hero

- image carousel;
- no heavy text overlay;
- previous/next button;
- pagination dots;
- responsive crop;
- first slide menjadi candidate LCP;
- autoplay sekitar setiap 7 detik;
- pointer di atas hero **tidak** menghentikan autoplay;
- progres berhenti saat tab/document hidden;
- transisi memakai fade-through yang terlihat;
- reduced motion: dissolve sederhana tanpa spatial zoom.

Angka milidetik dan eksperimen fade terdahulu tercatat di [`history/UI-DESIGN-HISTORY.md`](history/UI-DESIGN-HISTORY.md) dan [`phase-01/HOTFIX-hero-fade-v5-visible.md`](phase-01/HOTFIX-hero-fade-v5-visible.md), bukan di dokumen desain ini.

## 6. Homepage Composition

```text
Header
Navigation
Hero
Highlight Cards
Visi & Misi
Profil Sekolah
Sekolah Kami
Testimonial
Berita Terbaru
Footer
```

## 7. Highlight Cards

Tiga card mengikuti reference, diadaptasi menjadi:

1. Lingkungan Islami
2. Pembelajaran Menyenangkan
3. Pendampingan Orang Tua

Ketiganya bersumber dari dokumen sekolah: program keagamaan, pembelajaran kreatif/menyenangkan, dan program parenting.

## 8. Sekolah Kami

Homepage menampilkan **satu showcase sekolah**, bukan dua kartu PAUD/TK.

Maksud visual:

- satu identitas sekolah dan satu lingkungan belajar;
- foto showcase, narasi singkat, nilai sekolah, dan CTA (Kenali Sekolah Kami) ke `/sekolah-kami`;
- halaman publik kanonik `/sekolah-kami` memakai struktur visual halaman PAUD (hero, profil, showcase, keunggulan, berita) dengan narasi satu institusi;
- halaman PAUD dan TK tetap ada sebagai halaman legacy, bukan tujuan navigasi primer.

Layout dua kartu Unit Pendidikan di homepage adalah **desain historis yang sudah diganti**. Lihat [`history/PROJECT-DECISION-LOG.md`](history/PROJECT-DECISION-LOG.md).

## 9. Testimonial

Visual dipertahankan seperti reference: green background + white cards.

Pada Phase 1, isi bersifat placeholder dan ditandai `Preview / Placeholder`. Itu catatan historis, bukan kondisi current.

Homepage saat ini memakai 2 testimonial orang tua nyata beserta foto:

- Bunda Cakrawala / Kelas Raudhah
- Orang Tua Murid / PAUD IT Harapan Mulia

## 10. News

Berita Terbaru di homepage dan halaman `/berita` memakai data CMS.

Jika belum ada berita yang dipublikasikan, tampil empty state. Bukan preview statis Phase 1.

## 11. Footer

```text
Dark Green
├── Kontak
├── Link
└── Kata Perenungan

Bottom bar
├── Copyright
└── Social icons
```

## 12. Responsive

Mobile-first dengan breakpoint project:

```text
base < 576px
sm   >= 576px
md   >= 768px
lg   >= 992px
xl   >= 1200px
2xl  >= 1400px
```

Representative QA:

```text
390 × 844
768 × 1024
992 × 900
1200 × 900
1440 × 900
1920 × 1080
```

Boundary QA:

```text
575 / 576
767 / 768
991 / 992
1199 / 1200
1399 / 1400
```

Rule:

- no horizontal overflow;
- navbar desktop tidak dipaksa ke mobile;
- image menggunakan `object-fit: cover` dan content-aware position;
- section dua kolom menjadi satu kolom di mobile;
- footer tiga kolom menjadi stack;
- touch target menu memadai.

## 13. Image Ratios

```text
Hero desktop         ~16:7 / wide
Hero mobile          adaptive / portrait-aware crop
News card            16:9
Sekolah Kami showcase  wide / content-aware crop
Profile visual       4:3
```

## 14. Accessibility Baseline

- semantic landmarks;
- heading hierarchy;
- button untuk action;
- link untuk navigation;
- visible focus;
- keyboard usable dropdown/menu/carousel;
- descriptive alt;
- reduced-motion support;
- tidak mengandalkan warna saja.

## 15. Phase 1 Baseline and Visual Change Policy

Phase 1 menetapkan **baseline UI publik yang stabil** setelah responsive QA, build, dan regression check.

Jangan membuka kembali atau merancang ulang UI yang sudah selesai secara proaktif tanpa alasan konkret.

Perubahan visual setelah baseline diperbolehkan jika:

- diminta atau disetujui secara eksplisit oleh Project Owner;
- memperbaiki bug/regression;
- memperbaiki perilaku responsive atau accessibility;
- menyelaraskan perubahan produk/desain yang sudah disetujui.

Penyempurnaan visual tersebut harus mempertahankan architecture existing kecuali perubahan yang disetujui memang memerlukan perubahan architecture.

Hal yang tetap dapat direvisi tanpa mengubah architecture:

- exact spacing;
- font;
- image selection/crop;
- section height;
- border radius;
- card shadow;
- copy placeholder;
- green/orange shade.


## 16. Admin CMS Visual Direction

Admin CMS menggunakan identitas visual yang sama dengan website publik, tetapi layout dibuat lebih utilitarian dan fokus pada pekerjaan admin.

Prinsip:

- hijau tetap menjadi warna primer;
- background admin menggunakan surface terang dan whitespace cukup;
- sidebar + header reusable;
- informasi akun tampil jelas tanpa mengekspos data sensitif;
- action primer menggunakan tombol hijau;
- destructive action menggunakan treatment terpisah dan selalu membutuhkan konfirmasi;
- admin UI tidak meniru public homepage secara literal;
- tidak memakai dashboard analytics kompleks jika belum ada kebutuhan nyata.

### Desktop

```text
┌──────────────┬─────────────────────────────────────────────┐
│ Sidebar      │ Header / Page Title                        │
│              ├─────────────────────────────────────────────┤
│ Dashboard    │ Main Admin Content                         │
│ Berita       │                                             │
│              │                                             │
│ Lihat Website│                                             │
│ Keluar       │                                             │
└──────────────┴─────────────────────────────────────────────┘
```

### Mobile / Tablet

- sidebar berubah menjadi off-canvas drawer;
- hamburger membuka drawer;
- overlay dan `Escape` dapat menutup drawer;
- body scroll dikunci saat drawer terbuka;
- main content tidak boleh terjepit oleh sidebar desktop.

## 17. News CMS Information Architecture

Phase 3 news CMS menggunakan satu jenis konten: **Berita**. Tidak ada category taxonomy pada MVP.

Field editorial:

```text
Judul              required
Isi Berita         required / rich text
Excerpt            optional
Tags               optional / custom
Featured Image     optional
Status             draft | published
Tanggal Publish    default now, dapat dipilih
Author              otomatis dari admin login
Slug                otomatis dari judul
Meta Title          optional
Meta Description    optional
```

Aturan:

- tidak ada public category management;
- tags dapat dibuat custom;
- slug tidak menjadi input utama admin;
- author tidak dapat dimanipulasi dari form;
- published dengan tanggal masa depan diperlakukan sebagai scheduled;
- draft dan scheduled belum boleh tampil di public scope;
- featured image boleh kosong saat draft maupun published.

## 18. News Editor — Gutenberg-Inspired, Not Gutenberg Clone

Referensi UX editor mengambil bagian yang berguna dari WordPress/Gutenberg: **writing canvas besar, title-first flow, post settings di sidebar, dan action publish yang jelas**. Implementasi tetap sederhana dan mempertahankan backend Laravel yang sudah ada.

Yang diambil:

- area menulis menjadi bagian paling dominan;
- title field besar di atas writing canvas;
- toolbar rich-text ringkas;
- sidebar kanan untuk pengaturan post;
- top action untuk `Simpan Draft` dan `Publish`;
- featured image di sidebar;
- excerpt di sidebar;
- publication status + date di sidebar;
- author ditampilkan read-only;
- tags menggunakan interaction yang lebih nyaman seperti chips;
- SEO ditempatkan sebagai pengaturan sekunder;
- responsive layout mengubah sidebar settings menjadi panel/stack di layar kecil.

Yang **tidak** diambil:

- full block editor architecture;
- Categories;
- Template;
- Discussion / Comments;
- Post Format;
- custom HTML editor;
- font family bebas;
- ukuran font bebas;
- warna teks bebas;
- iframe/embed bebas;
- plugin-style settings yang tidak relevan.

Target layout desktop:

```text
┌───────────────────────────────────────────────────────────────────┐
│ ← Berita                        Simpan Draft        Publish        │
├──────────────────────────────────────────────┬────────────────────┤
│                                              │ POST SETTINGS      │
│ Tambahkan judul...                           │                    │
│                                              │ Featured Image     │
│ Rich Text Toolbar                            │ Excerpt            │
│ ──────────────────────────────────────────   │ Status             │
│                                              │ Tanggal Publish    │
│ Writing Canvas                               │ Author             │
│                                              │ Tags               │
│                                              │ SEO                │
│                                              │                    │
└──────────────────────────────────────────────┴────────────────────┘
```

Recommended desktop proportion:

```text
Writing area    ~72–76%
Settings panel  ~24–28%
```

Pada `< 992px`, settings panel tidak dipaksa tetap di kanan. Panel berubah menjadi stack/accordion setelah editor agar writing area tetap luas.

## 19. Rich Text & Media Rules

Toolbar minimum:

```text
Undo
Redo
Paragraph
Heading 2
Heading 3
Bold
Italic
Bullet List
Numbered List
Blockquote
Link
Inline Image
```

Tidak ada tool styling bebas yang dapat merusak konsistensi public article.

### Featured Image

- gambar utama artikel;
- opsional;
- JPG/JPEG/PNG/WEBP;
- maksimum 5 MB;
- disimpan pada public disk di folder `news/`;
- dapat diganti atau dihapus dari editor.

### Inline Image

- digunakan di dalam body artikel;
- dapat memiliki caption;
- disimpan di `news/content/`;
- upload hanya melalui authenticated endpoint;
- format sama dengan featured image;
- bukan remote arbitrary image.

### HTML Sanitization

Rich text harus disanitasi sebelum disimpan/render.

Allowlist elemen utama:

```text
p br h2 h3 strong b em i ul ol li blockquote a figure img figcaption
```

Elemen/atribut berbahaya harus dibuang, termasuk:

```text
script iframe object embed form style
onclick onerror onload
javascript:
```

Inline image yang dipertahankan hanya image dari managed news content storage.

## 20. Public News Design Direction

Public news mengambil hierarchy editorial yang kuat, bukan meniru identitas visual situs referensi.

### News Card

```text
[ Featured Image jika ada ]
Tanggal
Judul
Excerpt / fallback content
Baca Selengkapnya
```

- image ratio default 16:9;
- card tetap rapi jika featured image kosong;
- excerpt boleh fallback ke potongan plain text content;
- hanya `published` dengan `published_at <= now()` yang boleh tampil.

### News Detail

```text
Page Hero / Header
Tanggal Publikasi
Judul Berita
Author

Breadcrumb
Beranda / Berita / Judul

[ Featured Image jika ada ]

Article Content
- paragraph
- H2/H3
- list
- quote
- inline images + caption

Tags jika ada
```

Reading column ditargetkan sekitar `800–900px` pada desktop agar artikel nyaman dibaca.

SEO fallback:

```text
meta_title       -> title jika kosong
meta_description -> excerpt atau potongan content jika kosong
```

## 21. CMS UI QA Gate

Sebelum editor/public news dianggap stabil, lakukan QA minimal pada:

```text
390 × 844
768 × 1024
992 × 900
1200 × 900
1440 × 900
```

Checklist:

- editor tidak horizontal overflow;
- toolbar usable dengan keyboard dan touch;
- settings panel tetap dapat diakses pada mobile;
- save/publish action selalu jelas;
- featured/inline image preview tidak merusak layout;
- focus state terlihat;
- destructive action tidak berdekatan dengan action primer tanpa pembeda;
- admin drawer tidak overlap permanen dengan content;
- public rich-text typography konsisten dengan brand;
- article image responsive dan tidak gepeng.
