# DESIGN — Company Profile PAUD Harapan Mulia

**Version:** 1.2 — Reference Direction Locked  
**Date:** 14 Agustus 2026

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
Beranda   Tentang Kami▼   Sekolah Kami▼   Berita
```

Tentang Kami:

```text
Sejarah
Visi & Misi
Fasilitas
```

Sekolah Kami:

```text
PAUD
TK
```

### Mobile

Logo + hamburger. Submenu menggunakan accordion.

Tidak ada menu Galeri.

## 5. Hero

- image carousel;
- no heavy text overlay;
- previous/next button;
- pagination dots;
- responsive crop;
- first slide menjadi candidate LCP;
- autoplay lembut, berhenti saat hover/focus, menghormati reduced motion.

## 6. Homepage Composition

```text
Header
Navigation
Hero
Highlight Cards
Visi & Misi
Profil Sekolah
Unit Pendidikan
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

## 8. Unit Pendidikan

Section affiliation reference diadaptasi menjadi:

```text
Unit Pendidikan
[ PAUD ] [ TK ]
```

Card menuju route unit masing-masing.

## 9. Testimonial

Visual dipertahankan seperti reference: green background + white cards.

Pada Phase 1, isi bersifat placeholder dan ditandai `Preview / Placeholder`.

Sebelum production wajib diganti testimonial nyata atau section dinonaktifkan.

## 10. News

Phase 1 menampilkan preview cards static supaya layout dapat direview.

Phase 3 menggantinya dengan data CMS.

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

Mobile-first.

Representative QA:

```text
390 × 844
768 × 1024
1440 × 900
1920 × 1080
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
Hero desktop      ~16:7 / wide
Hero mobile       adaptive / portrait-aware crop
News card         16:9
Unit card         4:3 atau square visual
Profile visual    4:3
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

## 15. Phase 1 Review Gate

User melakukan visual review setelah bundle Phase 1 diterapkan.

Hal yang dapat direvisi tanpa mengubah architecture:

- exact spacing;
- font;
- image selection/crop;
- section height;
- border radius;
- card shadow;
- copy placeholder;
- green/orange shade.
