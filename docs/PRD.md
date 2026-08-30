# PRD — Company Profile PAUD Harapan Mulia

**Version:** 1.3 — Current Product Reality  
**Date:** 30 Agustus 2026  
**Product:** Company Profile PAUD Harapan Mulia  
**Institution:** Single institution

Reconciliation 30 Agustus 2026: status fase, komposisi beranda (Sekolah Kami), dan CMS berita diselaraskan dengan implementasi current. Schema teknis ada di [`ARCHITECTURE.md`](ARCHITECTURE.md).

## 1. Product Summary

Website resmi PAUD (KB & TK) Islam Terpadu Harapan Mulia untuk memperkenalkan sekolah kepada masyarakat dan menyediakan kanal publikasi berita.

Produk **bukan** sistem akademik dan **bukan** SaaS.

## 2. Primary Goals

1. Memberikan identitas digital resmi sekolah.
2. Menyajikan profil, sejarah, visi-misi, fasilitas, dan unit pendidikan secara jelas.
3. Menampilkan dokumentasi aktivitas sekolah secara kontekstual pada halaman terkait.
4. Menyediakan CMS berita yang mudah digunakan (sudah diimplementasikan).
5. Mobile-first, SEO-friendly, dan layak di-host pada cPanel/shared hosting.

## 3. Users

### Public Visitor

Tanpa login. Dapat membaca seluruh informasi publik dan berita yang dipublikasikan.

### Admin

Satu role authenticated pada MVP. Admin dapat login dan mengelola berita.

Tidak ada Super Admin pada MVP.

## 4. Final MVP Navigation

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

## 5. Public Pages

### Beranda

Urutan section:

```text
Topbar
Navigation
Hero Image Carousel
3 Highlight / Keunggulan
Visi & Misi
Profil Sekolah + Video/Gambar
Sekolah Kami
Testimonial
Berita Terbaru
Footer
```

Section Sekolah Kami menampilkan Harapan Mulia sebagai **satu identitas sekolah dan satu lingkungan belajar**, bukan sebagai pilihan PAUD-vs-TK pada section tersebut.

Halaman dan route PAUD/TK tetap ada (`/sekolah/paud`, `/sekolah/tk`) dan tetap dapat diakses dari navigasi.

### Tentang Kami

- Sejarah
- Visi & Misi
- Fasilitas

### Sekolah Kami

- PAUD
- TK

### Berita

- daftar berita;
- detail berita.

Hanya berita dengan `status = published` dan `published_at <= now()` yang tampil di publik.

## 6. Dynamic vs Static Content

### Static / Blade (masih bergantung finalisasi Phase 2)

- profil;
- sejarah;
- visi;
- misi;
- tujuan;
- fasilitas;
- unit PAUD/TK;
- contact info;
- kata perenungan;
- highlight sekolah.

### Dynamic / Database

Sudah diimplementasikan:

- user/admin;
- news posts;
- metadata berita;
- featured image path;
- tags.

## 7. Galeri Decision

**Galeri dihapus dari MVP.**

Tidak dibuat:

- menu Galeri;
- route Galeri;
- tabel album/foto;
- Gallery Controller/Service/Action;
- Gallery CMS;
- Gallery tests.

Foto sekolah tetap boleh digunakan sebagai static visual atau media berita.

## 8. News CMS

WordPress-inspired publishing UX tanpa menyalin WordPress secara penuh. CMS sudah berjalan.

Field produk (nama kolom mengikuti implementasi). Detail schema: [`ARCHITECTURE.md`](ARCHITECTURE.md).

```text
title
slug
excerpt
content
featured_image
status: draft | published
published_at
tags (JSON)
meta_title
meta_description
user_id (author)
timestamps
```

Tidak ada field `preview` pada MVP current.

Fitur yang tersedia:

- list/search/filter;
- create/edit;
- save draft;
- publish/update;
- featured image;
- SEO metadata (meta title / meta description).

## 9. Testimonial Rule

Section testimonial dipertahankan untuk mengikuti referensi UI.

Saat development, placeholder/fiktif boleh digunakan **hanya untuk menguji layout** dan harus diberi penanda jelas sebagai placeholder.

Sebelum production:

```text
testimonial nyata tersedia -> ganti placeholder
testimonial nyata belum tersedia -> nonaktifkan section
```

## 10. Media

Developer-managed static media berada pada `public/images/paud/`.

Media berita yang di-upload admin menggunakan Laravel filesystem/public disk (`storage/app/public/news/`).

Binary image tidak disimpan di database.

## 11. Responsive Requirements

Mobile-first.

Breakpoint Tailwind project:

```text
base < 576px
sm   >= 576px
md   >= 768px
lg   >= 992px
xl   >= 1200px
2xl  >= 1400px
```

Interpretasi responsive:

```text
< 576px      Mobile / 1 kolom sebagai baseline
576-767px    Small / landscape mobile; 1-2 kolom sesuai komponen
768-991px    Tablet; umumnya 2 kolom
992-1199px   Desktop; umumnya 3-4 kolom
1200-1399px  Large desktop
>= 1400px    Extra-large desktop
```

Jumlah kolom tidak dipaksakan secara global. Setiap section tetap mengikuti kebutuhan konten dan proporsi visualnya.

QA representative viewport:

```text
390 × 844
768 × 1024
992 × 900
1200 × 900
1440 × 900
1920 × 1080
```

QA boundary wajib memeriksa perubahan tepat sebelum dan sesudah breakpoint utama:

```text
575 / 576
767 / 768
991 / 992
1199 / 1200
1399 / 1400
```

## 12. SEO Baseline

Wajib pada public UI:

- semantic HTML;
- unique title/description per page;
- canonical-ready layout;
- descriptive heading hierarchy;
- descriptive alt text;
- clean routes;
- responsive/mobile parity.

Phase 4 sudah mengirimkan sitemap, robots, structured data, Open Graph, strategi loading gambar, dan perbaikan accessibility. Residual go-live (domain, SSL, konten final) masuk Phase 5.

## 13. Development Phases

### Phase 0 — Foundation & Documentation

Status: DONE.

### Phase 1 — Design System & Public UI

Status: DONE.

- design tokens;
- public layout;
- topbar/navbar/dropdown/mobile menu;
- footer;
- hero carousel;
- homepage;
- page shells;
- responsive QA.

### Phase 2 — Static Content Finalization

Status: WAITING CLIENT CONFIRMATION.

- content verification;
- page content polish;
- asset finalization;
- final contact/testimonial decisions.

### Phase 3 — Authentication & News CMS

Status: DONE.

- admin auth;
- dashboard;
- news model/migration;
- CMS CRUD;
- rich text editor;
- featured image;
- public news listing/detail;
- tests.

### Phase 4 — SEO / Performance / Accessibility / Hardening

Status: DONE.

### Phase 5 — UAT & Production Deployment

Status: NEXT.

## 14. MVP Acceptance Criteria

- public navigation bekerja pada desktop/mobile;
- seluruh public route utama dapat dibuka;
- layout konsisten dengan approved reference direction;
- responsive tanpa horizontal overflow;
- placeholder production tidak tersisa saat release;
- CMS berita dapat digunakan admin;
- tidak ada Galeri pada MVP;
- build production berhasil;
- test relevan lulus.

## 15. Change Control

Seluruh development wajib mengikuti `AGENTS.md` dan `.agents/skills/paud-project-standards/`.

Perubahan scope yang tumpang tindih dengan dokumen ini wajib dikonfirmasi sebelum implementasi.
