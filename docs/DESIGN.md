# DESIGN — Company Profile PAUD Harapan Mulia

**Dokumen:** UI/UX & Visual Design Specification  
**Versi:** 1.0 Draft Baseline  
**Tanggal:** 14 Agustus 2026

---

## 1. Design Direction

Website harus terasa:

- ramah;
- hangat;
- ceria;
- cocok untuk institusi PAUD;
- tetap profesional;
- tidak berlebihan seperti website anak yang penuh dekorasi;
- mudah dibaca orang tua;
- cepat dipahami;
- kuat pada foto kegiatan nyata.

Arah visual utama:

```text
Friendly Education
+
Islamic School Identity
+
Clean Company Profile
+
Real Activity Photography
```

Foto sekolah harus menjadi pusat visual, bukan ilustrasi dekoratif yang berlebihan.

---

## 2. Design References yang Diberikan

Referensi awal menunjukkan struktur:

### Header

- logo;
- social/contact info di top area;
- WhatsApp/telepon;
- email;
- navbar.

### Navbar

Referensi label:

```text
Home
About Us
Our School
Berita
```

Galeri dapat ditambahkan sebagai menu utama atau submenu `Our School` setelah implementasi layout diuji.

### Hero

- image carousel;
- navigasi kiri/kanan;
- pagination indicator;
- large visual focus.

### Feature Cards

Di bawah hero terdapat card keunggulan seperti:

- Learning Skills;
- Expert Teachers;
- Certificates.

Label final harus menggunakan konten nyata sekolah, bukan placeholder.

### Footer

Referensi terdiri dari tiga kolom:

```text
Contact
Links
Kata Perenungan
```

Footer menggunakan dark green.

---

## 3. Color System

Warna berikut diambil/diaproksimasi dari referensi palet dan footer yang diberikan.

### Brand Colors

| Token | Hex | Penggunaan |
|---|---|---|
| `brand-green-900` | `#29693E` | footer, dark section, strong brand |
| `brand-green-600` | `#5EA10F` | primary accent |
| `brand-green-300` | `#93C854` | soft accent/background |
| `brand-orange-500` | `#F66F09` | CTA/highlight |
| `brand-yellow-400` | `#F4C90F` | icon/accent |
| `brand-orange-300` | `#F09712` | secondary warm accent |

### Neutral

Recommended:

```text
White       #FFFFFF
Surface     #F8FAF8
Text        #17201A
Muted       #667269
Border      #E4E9E5
```

Neutral boleh disesuaikan saat visual QA.

### Color Usage Rule

Gunakan hijau sebagai identitas utama.

Orange/yellow adalah accent, bukan warna dominan pada seluruh halaman.

Rule:

```text
70% neutral / white
20% green
10% orange/yellow accent
```

Ini bukan formula pixel yang kaku, tetapi batas visual agar halaman tidak terlalu ramai.

---

## 4. Typography

Baseline:

```text
Primary: Instrument Sans
Fallback: ui-sans-serif, system-ui, sans-serif
```

Alasan:

- sudah selaras dengan current project baseline;
- modern;
- readable;
- tidak perlu menambah dependency font hanya untuk membuat MVP berjalan.

Jika kemudian stakeholder meminta font yang lebih playful, perubahan font harus menjadi design decision terpisah.

### Type Scale

Suggested:

```text
Display/Hero    clamp(2rem, 5vw, 4rem)
H1              2.25rem desktop / 1.875rem mobile
H2              1.875rem desktop / 1.5rem mobile
H3              1.25rem - 1.5rem
Body            1rem
Small           0.875rem
Caption         0.75rem - 0.875rem
```

Gunakan responsive/fluid sizing secara terkontrol.

Jangan menggunakan ukuran font kecil hanya agar semua teks muat.

---

## 5. Layout System

### Mobile-first

Base CSS adalah mobile.

Kemudian enhancement:

```text
sm   >= 640px
md   >= 768px
lg   >= 1024px
xl   >= 1280px
2xl  >= 1536px
```

### Practical QA Classes

```text
Mobile     < 768px
Tablet     768 - 1023px
Desktop    >= 1024px
Wide       >= 1536px
```

### Representative Viewports

```text
390 × 844
768 × 1024
1440 × 900
1920 × 1080
```

**Catatan penting:** responsive design tidak bekerja berdasarkan "rasio perangkat" tertentu. Yang utama adalah available width dan bagaimana content mulai tidak nyaman. Viewport di atas adalah QA samples, bukan device-specific code.

---

## 6. Container

Suggested public container:

```text
max-width: 1280px - 1440px
```

Untuk viewport 1920px, content utama tetap memiliki max-width agar line length dan alignment tidak terlalu lebar.

Hero dapat menggunakan width lebih besar daripada content text jika desain memerlukan.

Suggested horizontal padding:

```text
Mobile   16px
sm       24px
lg       32px
Wide     40px / container centered
```

---

## 7. Spacing

Gunakan spacing konsisten dari Tailwind scale.

Recommended section rhythm:

```text
Mobile:
py-12 / py-14

Desktop:
py-16 / py-20 / py-24
```

Card gap:

```text
gap-4 mobile
gap-6 tablet
gap-8 desktop
```

Hindari arbitrary margin berbeda di setiap halaman tanpa alasan.

---

## 8. Header & Navigation

### Desktop

Structure:

```text
Top Info Bar
└── Social | Phone/WhatsApp | Email

Main Navigation
├── Logo
├── Home
├── About Us
├── Our School
├── Berita
├── Galeri
└── Optional search / CTA
```

Top bar dapat dibuat ringan dan tidak mengambil terlalu banyak tinggi.

### Mobile

Structure:

```text
Logo                  Menu Button
```

Menu membuka panel/dropdown.

Contact/social dapat:

- dipindahkan ke dalam mobile menu;
- atau tampil ringkas pada bagian footer.

Jangan memaksakan desktop topbar penuh pada layar kecil.

### Sticky

Navbar dapat sticky setelah visual test.

Jangan mengaktifkan sticky bila menyebabkan terlalu banyak layar mobile tertutup.

---

## 9. Hero / Banner

Hero adalah visual utama Home.

### Desktop

Recommended ratio:

```text
~16:7 hingga 2:1
```

Referensi desktop yang diberikan menggunakan banner lebar.

### Tablet

Recommended:

```text
16:9 atau crop content-aware
```

### Mobile

Recommended:

```text
4:5, 3:4, atau crop portrait yang tetap menjaga subject
```

Jangan mengandalkan satu crop landscape untuk semua ukuran bila wajah/subjek terpotong.

Gunakan:

- `<picture>`;
- responsive image source;
- atau `object-position` per breakpoint bila asset memungkinkan.

### Carousel Rules

- 3–5 slide ideal untuk MVP;
- tidak autoplay terlalu cepat;
- kontrol previous/next;
- indicator;
- keyboard usable;
- image pertama diprioritaskan karena berpotensi menjadi LCP;
- slide lain jangan semua eager-loaded.

---

## 10. Home Page Composition

Recommended order:

```text
1. Header / Navbar
2. Hero
3. School Highlights / Keunggulan
4. Tentang Singkat
5. Program / Aktivitas
6. Fasilitas
7. Berita Terbaru
8. Galeri / Dokumentasi
9. Optional Video Profile
10. Footer
```

### Highlight Cards

3 card desktop, stack/scroll responsive di mobile.

Content example final harus berdasarkan sekolah:

```text
Pendidikan Islami
Pembelajaran Menyenangkan
Guru Berpengalaman
```

Final wording harus divalidasi.

---

## 11. About Us

Recommended sections:

```text
Page Hero / Breadcrumb
Profil Singkat
Sejarah
Visi
Misi
Tujuan
School Photography
```

Gunakan layout text + image bergantian untuk menghindari halaman berupa teks panjang tanpa visual.

---

## 12. Our School

Recommended:

```text
Keunggulan
Program/Kegiatan
Fasilitas
Dokumentasi terkait
```

Kegiatan parenting dapat menjadi section/program jika stakeholder menyetujuinya.

---

## 13. News Public UI

### News Listing

Card:

```text
Featured image
Date
Title
Excerpt
Read More
```

Grid:

```text
Mobile: 1 column
Tablet: 2 columns
Desktop: 3 columns
```

### News Detail

```text
Breadcrumb
Title
Publish date
Featured image
Article content
Optional share
Related/latest news
```

Article max-width lebih sempit daripada full website container agar nyaman dibaca.

Recommended text width:

```text
~65–75 characters per line
```

---

## 14. Gallery UI

### Album Listing

```text
Cover
Album title
Photo count optional
Description optional
```

Grid:

```text
Mobile: 1–2 columns depending content
Tablet: 2–3
Desktop: 3–4
```

### Album Detail

Photo grid menggunakan consistent crop, tetapi full image dapat dilihat melalui modal/lightbox jika feature dipilih.

Album cover default ratio:

```text
4:3
```

Gallery card dapat:

```text
4:3
```

Foto manusia tidak boleh dicrop terlalu agresif.

---

## 15. Media Aspect Ratio Standard

Recommended standard untuk mengurangi layout inconsistency:

```text
Hero desktop       16:7 / wide
News card          16:9
News detail        natural / max constrained
Gallery album      4:3
Gallery thumbnail  4:3
Profile square     1:1
Portrait feature   4:5
Video landscape    16:9
Video portrait     9:16
```

Dataset saat ini memiliki video landscape sekitar 848×478 dan video portrait sekitar 478×850, sehingga kedua orientasi memang tersedia.

---

## 16. Image Handling

Setiap image wajib punya purpose.

### Static Profile Image

Alt text ditulis di Blade.

### CMS Image

Admin harus dapat memberikan alt text.

### Decorative Image

Gunakan empty alt jika benar-benar decorative.

### File Naming

Sebelum aset dataset masuk public production, rename.

Contoh:

```text
home-parenting-paud-harapan-mulia-01.jpg
akhirussanah-paud-harapan-mulia-2026-01.jpg
```

---

## 17. Footer

Mengikuti referensi:

```text
Dark Green Footer

Column 1
Contact
- WhatsApp/phone
- Email
- Address

Column 2
Links
- Home
- Tentang
- Sekolah
- Berita
- Galeri

Column 3
Kata Perenungan
- quote/short message
```

### Mobile

3 kolom berubah menjadi vertical stack.

Social media dapat ditambahkan dekat contact atau bottom footer.

---

## 18. Buttons

### Primary

Green.

Use:

- main CTA;
- publish/save primary action bila sesuai.

### Accent

Orange.

Use:

- CTA penting tertentu;
- badge/highlight.

Jangan menggunakan orange untuk seluruh tombol sehingga hierarchy hilang.

### Danger

Gunakan red semantic untuk destructive action, bukan brand orange.

---

## 19. CMS Admin Design

Arah:

```text
WordPress-inspired publishing experience
NOT WordPress clone
```

### Admin Shell

Recommended desktop:

```text
Sidebar
├── Dashboard
├── Berita
└── Galeri

Topbar
└── User / Logout

Content Area
```

Mobile admin:

- collapsible sidebar;
- form tetap usable;
- table dapat berubah menjadi cards/scroll container bila dibutuhkan.

### News List

Columns:

```text
Title
Status
Published At
Updated At
Action
```

Feature:

- search;
- status filter;
- pagination;
- create button.

### News Editor

Recommended desktop composition:

```text
Main Column
├── Title
├── Slug
├── Excerpt
└── Rich Text Editor

Side Column
├── Publish Status
├── Published At
├── Featured Image
├── Alt Text
└── SEO
```

Pada mobile, semua section menjadi satu kolom.

### Save Behavior

Actions:

```text
Save Draft
Preview
Publish / Update
```

Destructive delete terpisah dan perlu confirmation.

---

## 20. CMS Empty/Loading/Error States

Setiap dynamic screen harus punya:

### Empty

Contoh:

```text
Belum ada berita.
[Tambah Berita]
```

### Loading

Gunakan feedback yang tidak membuat layout lompat.

### Success

Toast/alert:

```text
Berita berhasil disimpan.
```

### Error

Message actionable.

Jangan tampilkan raw stack trace kepada admin production.

---

## 21. Form Rules

- label selalu terlihat;
- placeholder bukan pengganti label;
- validation message dekat field;
- required state jelas;
- destructive action tidak dekat primary save tanpa separation;
- focus state terlihat;
- keyboard navigation tetap berfungsi.

---

## 22. Accessibility

Baseline:

- semantic landmarks;
- correct heading order;
- button benar-benar `<button>`;
- link benar-benar `<a>`;
- keyboard usable;
- visible focus;
- sufficient contrast;
- alt text;
- form label;
- tidak mengandalkan warna saja untuk state;
- reduced motion dipertimbangkan untuk animation/carousel.

---

## 23. SEO-Aware Visual Rules

- H1 satu tujuan utama per halaman;
- logo bukan pengganti page title;
- berita punya title text HTML, bukan text di image;
- image ditempatkan dekat text relevan;
- image share/OG harus representatif;
- jangan embed informasi kritis hanya dalam gambar;
- mobile menyajikan content penting yang sama dengan desktop.

---

## 24. Animation

Motion ringan:

- fade/slide kecil;
- hover card;
- menu transition;
- carousel transition.

Tidak menggunakan animation dekoratif berat.

Respect:

```css
prefers-reduced-motion
```

bila motion dibuat.

---

## 25. Responsive Component Rules

### Navbar

```text
Mobile: hamburger
lg+: full menu
```

### Hero

```text
Mobile: portrait/content-aware crop
lg+: wide
```

### Cards

```text
1 col -> 2 col -> 3/4 col
```

### Footer

```text
1 col -> 2 col -> 3 col
```

### Admin Editor

```text
1 col -> main + side panel
```

---

## 26. Design QA Matrix

Setiap public page wajib dicek:

| Check | 390×844 | 768×1024 | 1440×900 | 1920×1080 |
|---|---:|---:|---:|---:|
| No horizontal overflow | ✓ | ✓ | ✓ | ✓ |
| Navbar usable | ✓ | ✓ | ✓ | ✓ |
| Hero crop valid | ✓ | ✓ | ✓ | ✓ |
| Text readable | ✓ | ✓ | ✓ | ✓ |
| Images not distorted | ✓ | ✓ | ✓ | ✓ |
| Footer valid | ✓ | ✓ | ✓ | ✓ |
| CTA visible | ✓ | ✓ | ✓ | ✓ |

Tambahkan intermediate width bila content pecah.

---

## 27. Asset Inventory Rules

Sebelum implementasi final:

```text
assets-source/
├── logo
├── hero
├── facilities
├── activities
├── gallery
├── profile
└── video
```

Folder `assets-source` di atas adalah konsep staging, bukan keputusan wajib untuk source repo.

Production asset harus memiliki naming bersih.

Aset dari WhatsApp tidak boleh langsung dijadikan public filename.

---

## 28. Design Decisions Pending

Masih menunggu/opsional:

1. referensi UI CMS WordPress-like dari user;
2. logo final high-resolution;
3. apakah Galeri menjadi top-level navbar atau submenu;
4. final text highlight card;
5. quote/kata perenungan final;
6. hero slide copy;
7. exact crop image setelah semua asset dipilih.

Keputusan pending tidak menghalangi pembuatan layout foundation.

---

## 29. Recommended First Design Implementation

Urutan:

```text
1. Define Tailwind brand tokens.
2. Create public container/layout.
3. Create topbar.
4. Create navbar desktop/mobile.
5. Create footer.
6. Build hero with one static slide first.
7. Verify responsive behavior.
8. Baru aktifkan carousel.
9. Build common cards.
10. Build Home sections.
```

Jangan mulai dari animation atau CMS editor.

---

## 30. References

- Tailwind Responsive Design: https://tailwindcss.com/docs/responsive-design
- web.dev Responsive Web Design: https://web.dev/articles/responsive-web-design-basics
- Google Mobile-first Indexing: https://developers.google.com/search/docs/crawling-indexing/mobile/mobile-sites-mobile-first-indexing
- Google Image SEO: https://developers.google.com/search/docs/appearance/google-images
- Google SEO Starter Guide: https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- Google Core Web Vitals: https://developers.google.com/search/docs/appearance/core-web-vitals
