# Phase 1A — UI Reference Analysis & Implementation Contract

**Project:** PAUD Harapan Mulia  
**Phase:** 1 — Design System & Global Layout  
**Checkpoint:** 1A — UI Reference Analysis  
**Status:** READY FOR USER APPROVAL BEFORE SOURCE-CODE IMPLEMENTATION  
**Date:** 14 Agustus 2026

---

## 1. Tujuan

Dokumen ini mengunci bagaimana referensi UI diterjemahkan ke website PAUD Harapan Mulia sebelum source code Phase 1 ditulis.

Prinsip:

```text
Reference UI
    ↓
Analisis
    ↓
Adaptasi ke PAUD Harapan Mulia
    ↓
Konfirmasi
    ↓
Implementasi
```

Referensi digunakan **cukup dekat secara layout, hierarchy, spacing, typography feel, dropdown behavior, hero, section composition, dan footer**, tetapi branding visual diadaptasi ke PAUD Harapan Mulia.

---

## 2. Scope Change yang Dikunci

### Galeri

Modul Galeri **dihapus dari MVP**.

Konsekuensi:

- tidak ada route `/galeri`;
- tidak ada menu Galeri;
- tidak ada Gallery CMS;
- tidak ada `gallery_albums`;
- tidak ada `gallery_images`;
- tidak ada Gallery Service/Action/Controller;
- tidak ada test Galeri.

Foto kegiatan tetap boleh digunakan sebagai static visual/content atau media berita.

---

## 3. Final Information Architecture

```text
Beranda

Tentang Kami
├── Sejarah
├── Visi & Misi
└── Fasilitas

Sekolah Kami
├── PAUD
└── TK

Berita
```

### Candidate Routes

```text
/                                      → Beranda
/tentang-kami/sejarah                  → Sejarah
/tentang-kami/visi-misi                → Visi & Misi
/tentang-kami/fasilitas                → Fasilitas
/sekolah/paud                          → PAUD
/sekolah/tk                            → TK
/berita                                → Daftar Berita
/berita/{slug}                         → Detail Berita
```

Route final tetap harus cross-check dengan existing `routes/web.php` sebelum implementasi.

---

## 4. Reference → Adaptation Map

| Reference | Adaptasi PAUD Harapan Mulia | Keputusan |
|---|---|---|
| Logo + contact top area | Logo PAUD sementara + sosial/WA/email | ADAPT |
| Main nav | Beranda, Tentang Kami, Sekolah Kami, Berita | ADAPT |
| About Us dropdown | Sejarah, Visi & Misi, Fasilitas | COPY STRUCTURE |
| Our School dropdown | PAUD, TK | ADAPT |
| Blue/purple brand | Hijau + orange + yellow | REPLACE |
| Large hero slider | Image carousel sekolah | ADAPT |
| 3 highlight cards | 3 keunggulan sekolah | ADAPT |
| Program/visi section | Visi & Misi PAUD | ADAPT |
| Profile + video/image | Profil Sekolah | ADAPT |
| Affiliations | Unit Pendidikan: PAUD, TK | REPLACE |
| Testimonial | Tetap digunakan | ADAPT |
| News & Articles | Berita Terbaru | ADAPT |
| 3-column footer | Kontak, Link, Kata Perenungan | COPY STRUCTURE |

---

## 5. Homepage Structure

```text
Header / Topbar
        ↓
Navigation
        ↓
Hero Image Carousel
        ↓
3 Highlight Cards
        ↓
Visi & Misi
        ↓
Profil Sekolah + Video/Gambar
        ↓
Unit Pendidikan
├── PAUD
└── TK
        ↓
Testimonial
        ↓
Berita Terbaru
        ↓
Footer
```

Phase 1 hanya membangun foundation dan skeleton yang dibutuhkan. Content detail halaman internal berada pada Phase 2.

---

## 6. Header Contract

### Desktop

Top area:

```text
Logo
Social icons
WhatsApp/Phone
Email
```

Navbar:

```text
Beranda
Tentang Kami ▼
Sekolah Kami ▼
Berita
```

Dropdown:

- white surface;
- subtle shadow;
- subtle radius;
- divider antar item;
- spacing lega;
- hover/active menggunakan brand color;
- hierarchy visual sedekat mungkin dengan reference.

### Mobile

```text
Logo                     Menu button
```

Saat menu dibuka:

```text
Beranda
Tentang Kami
├── Sejarah
├── Visi & Misi
└── Fasilitas
Sekolah Kami
├── PAUD
└── TK
Berita
```

Submenu menggunakan accordion/collapsible behavior, bukan desktop dropdown yang dipaksa ke mobile.

---

## 7. Hero Contract

Hero mengikuti rekomendasi yang sudah disetujui:

```text
Image carousel
No heavy text overlay
Previous / Next controls
Pagination dots
```

Rules:

- desktop lebar;
- mobile menggunakan content-aware crop;
- image pertama diprioritaskan sebagai potential LCP;
- slide selain pertama tidak semuanya eager-loaded;
- animation tidak terlalu cepat;
- controls accessible;
- `prefers-reduced-motion` dipertimbangkan.

Implementation order:

```text
1. Static hero first
2. Responsive crop QA
3. Baru carousel behavior
```

---

## 8. Unit Pendidikan Contract

Reference affiliation diganti menjadi:

```text
Unit Pendidikan

[ PAUD ]   [ TK ]
```

Card PAUD menuju halaman PAUD.

Card TK menuju halaman TK.

Tidak ada jenjang SD/SMP/SMA/SMK.

---

## 9. Testimonial Contract

Section testimonial dipertahankan.

### Development

Boleh menggunakan placeholder/fiktif untuk menguji layout.

Requirement:

- diberi penanda pada source/data bahwa konten adalah placeholder;
- tidak diklaim sebagai testimoni nyata;
- mudah diganti;
- tidak dipakai sebagai fakta production.

### Production Gate

Sebelum release:

```text
IF testimonial nyata tersedia
→ replace placeholder

ELSE
→ hide/disable section
```

Tidak boleh meninggalkan testimoni fiktif sebagai testimonial resmi sekolah.

---

## 10. Brand Contract

Primary brand:

```text
Dark Green     #29693E
Green          #5EA10F
Light Green    #93C854
Orange         #F66F09
Yellow         #F4C90F
Warm Orange    #F09712
```

Neutral baseline:

```text
White          #FFFFFF
Surface        #F8FAF8
Text           #17201A
Muted          #667269
Border         #E4E9E5
```

Reference blue/purple tidak digunakan sebagai brand utama.

---

## 11. Typography Contract

User meminta font sedekat mungkin dengan reference.

Status exact font:

```text
PENDING VERIFIED IDENTIFICATION
```

AI/developer **tidak boleh menebak** font hanya dari screenshot lalu menganggapnya final.

Urutan:

1. inspect source/computed style reference bila tersedia;
2. verifikasi family dan weight;
3. jika tidak dapat diverifikasi, buat preview menggunakan fallback geometric sans;
4. minta approval user sebelum menambah font dependency final.

Tidak ada font baru ditambahkan pada checkpoint 1A.

---

## 12. Responsive Contract

Mobile-first.

Baseline breakpoint Tailwind:

```text
base < 640
sm   >= 640
md   >= 768
lg   >= 1024
xl   >= 1280
2xl  >= 1536
```

QA viewport:

```text
390 × 844
768 × 1024
1440 × 900
1920 × 1080
```

Tambahkan manual resize test di intermediate width.

Tidak ada layout khusus berdasarkan brand/model device.

---

## 13. Phase 1 Target Directory

**Belum dibuat pada checkpoint 1A.**

Target minimum ketika implementation disetujui:

```text
resources/
├── css/
│   └── app.css
├── js/
│   └── app.js
└── views/
    ├── layouts/
    │   └── public.blade.php
    ├── components/
    │   └── site/
    │       ├── topbar.blade.php
    │       ├── navbar.blade.php
    │       ├── mobile-menu.blade.php
    │       ├── hero.blade.php
    │       └── footer.blade.php
    └── public/
        └── home/
            └── index.blade.php
```

Komponen tambahan hanya dibuat ketika reuse/need sudah nyata.

Jangan membuat lebih awal:

```text
app/Services/
app/Actions/
app/Repositories/
app/DTOs/
```

untuk Phase 1 UI bila tidak diperlukan.

---

## 14. Candidate Reusable Components

Boleh dibuat setelah kebutuhan terlihat:

```text
<x-site.section-heading />
<x-site.feature-card />
<x-site.news-card />
```

Jangan membuat generic design-system component berlebihan sebelum digunakan berulang.

---

## 15. Asset Contract

### Temporary Logo

Gunakan logo PAUD dari dataset yang sudah diberikan.

Status:

```text
TEMPORARY ACCEPTED
```

Dapat diganti dengan file high-resolution tanpa mengubah layout architecture.

### Static Content Images

Candidate location:

```text
resources/images/content/
```

### CMS News Media

Future Phase 3:

```text
storage/app/public/news/
```

### Naming

Jangan publish filename WhatsApp mentah.

Gunakan descriptive filename.

---

## 16. What Phase 1 Will NOT Change

Saat implementation:

- tidak membuat schema berita;
- tidak membuat authentication;
- tidak membuat CMS;
- tidak membuat Galeri;
- tidak membuat role tambahan;
- tidak menambah Repository Pattern;
- tidak mengubah database;
- tidak menambah rich text editor;
- tidak melakukan deployment;
- tidak melakukan refactor unrelated.

---

## 17. Implementation Sub-phases

```text
1A Reference Analysis                 ← CURRENT
1B Design Tokens
1C Global Public Layout
1D Header / Navbar / Mobile Menu
1E Footer
1F Static Hero
1G Home Skeleton
1H Responsive QA
```

Carousel behavior dibuat setelah static hero lolos responsive QA.

---

## 18. Source Code Approval Gate

Source-code implementation baru boleh dimulai setelah user menyetujui contract ini.

Sebelum setiap implementation batch, AI agent harus memberi:

```text
Files to add/change
Purpose
Scope
What will not change
Risk
Verification plan
```

Baru setelah approval user, perubahan dilakukan.

---

## 19. Phase 1 Definition of Done

Phase 1 dianggap selesai apabila:

- [ ] brand tokens tersedia;
- [ ] global public layout tersedia;
- [ ] topbar selesai;
- [ ] desktop navbar selesai;
- [ ] mobile navigation selesai;
- [ ] dropdown hierarchy benar;
- [ ] footer selesai;
- [ ] static hero responsive selesai;
- [ ] carousel selesai;
- [ ] Home skeleton selesai;
- [ ] no horizontal overflow;
- [ ] QA representative viewport selesai;
- [ ] keyboard/focus basic navigation selesai;
- [ ] `npm run build` berhasil;
- [ ] relevant tests/checks lulus;
- [ ] Change Log tersedia;
- [ ] Phase 1 Progress Report diperbarui.

---

## 20. Pending Non-blocking Items

- exact font-family reference;
- final high-resolution logo;
- final testimonial dari pihak sekolah;
- final hero image selection;
- final copy untuk 3 highlight cards;
- final school contact verification.

Item di atas tidak memblokir Design Token/Layout foundation kecuali font final sebelum typography dianggap selesai.
