# PRD — Company Profile PAUD Harapan Mulia

**Version:** 1.2 — Scope Locked  
**Date:** 14 Agustus 2026  
**Product:** Company Profile PAUD Harapan Mulia  
**Institution:** Single institution

## 1. Product Summary

Website resmi PAUD (KB & TK) Islam Terpadu Harapan Mulia untuk memperkenalkan sekolah kepada masyarakat dan menyediakan kanal publikasi berita.

Produk **bukan** sistem akademik dan **bukan** SaaS.

## 2. Primary Goals

1. Memberikan identitas digital resmi sekolah.
2. Menyajikan profil, sejarah, visi-misi, fasilitas, dan unit pendidikan secara jelas.
3. Menampilkan dokumentasi aktivitas sekolah secara kontekstual pada halaman terkait.
4. Memberikan CMS berita yang mudah digunakan pada Phase 3.
5. Mobile-first, SEO-friendly, dan layak di-host pada cPanel/shared hosting.

## 3. Users

### Public Visitor

Tanpa login. Dapat membaca seluruh informasi publik dan berita.

### Admin

Satu role authenticated pada MVP. Pada Phase 3 dapat login dan mengelola berita.

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
Unit Pendidikan — PAUD / TK
Testimonial
Berita Terbaru
Footer
```

### Tentang Kami

- Sejarah
- Visi & Misi
- Fasilitas

### Sekolah Kami

- PAUD
- TK

### Berita

- daftar berita;
- detail berita pada Phase 3 ketika model berita dibuat.

## 6. Dynamic vs Static Content

### Static / Blade pada MVP

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

Phase 3:

- user/admin;
- news posts;
- metadata berita;
- path featured image.

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

## 8. News CMS — Phase 3

WordPress-inspired publishing UX tanpa menyalin WordPress secara penuh.

Field minimum:

```text
title
slug
excerpt
content
featured_image_path
featured_image_alt
status: draft | published
published_at
seo_title
seo_description
author_id
timestamps
```

Candidate features:

- list/search/filter;
- create/edit;
- save draft;
- preview;
- publish/update;
- featured image;
- SEO metadata.

Rich text editor belum dikunci pada Phase 1.

## 9. Testimonial Rule

Section testimonial dipertahankan untuk mengikuti referensi UI.

Saat development, placeholder/fiktif boleh digunakan **hanya untuk menguji layout** dan harus diberi penanda jelas sebagai placeholder.

Sebelum production:

```text
testimonial nyata tersedia -> ganti placeholder
testimonial nyata belum tersedia -> nonaktifkan section
```

## 10. Media

Developer-managed static media dapat berada pada `public/images/paud/` pada Phase 1.

Media berita yang di-upload admin pada Phase 3 menggunakan Laravel filesystem/public disk.

Binary image tidak disimpan di database.

## 11. Responsive Requirements

Mobile-first.

Baseline Tailwind:

```text
base < 640px
sm   >= 640px
md   >= 768px
lg   >= 1024px
xl   >= 1280px
2xl  >= 1536px
```

QA representative viewport:

```text
390 × 844
768 × 1024
1440 × 900
1920 × 1080
```

## 12. SEO Baseline

Wajib dipersiapkan sejak public UI:

- semantic HTML;
- unique title/description per page;
- canonical-ready layout;
- descriptive heading hierarchy;
- descriptive alt text;
- clean routes;
- responsive/mobile parity.

Phase 4 menambahkan audit sitemap, robots, structured data, Open Graph, performance, dan accessibility.

## 13. Development Phases

### Phase 0 — Foundation & Documentation

Status: DONE.

### Phase 1 — Design System & Public UI

- design tokens;
- public layout;
- topbar/navbar/dropdown/mobile menu;
- footer;
- hero carousel;
- homepage skeleton;
- page shells;
- responsive QA.

### Phase 2 — Static Content Finalization

- content verification;
- page content polish;
- asset finalization;
- final logo/contact/testimonial decisions.

### Phase 3 — Authentication & News CMS

- admin auth;
- dashboard;
- news model/migration;
- CMS CRUD;
- rich text editor;
- featured image;
- public news detail;
- tests.

### Phase 4 — SEO / Performance / Accessibility / Hardening

### Phase 5 — UAT & Production Deployment

## 14. MVP Acceptance Criteria

- public navigation bekerja pada desktop/mobile;
- seluruh public route utama dapat dibuka;
- layout konsisten dengan approved reference direction;
- responsive tanpa horizontal overflow;
- placeholder production tidak tersisa saat release;
- CMS berita dapat digunakan admin pada Phase 3;
- tidak ada Galeri pada MVP;
- build production berhasil;
- test relevan lulus.

## 15. Change Control

Seluruh development wajib mengikuti `AGENTS.md` dan `.agents/skills/paud-project-standards/`.

Perubahan scope yang tumpang tindih dengan dokumen ini wajib dikonfirmasi sebelum implementasi.
