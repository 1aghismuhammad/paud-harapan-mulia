# Phase 1A — UI Reference Implementation Contract

**Status:** APPROVED (historical)  
**Approved direction:** 14 Agustus 2026

This is the **historical Phase 1A contract**, approved 14 August 2026. It is **not** the current product or UX source of truth.

Superseded for current work:

- Homepage Unit Pendidikan PAUD/TK cards → current Sekolah Kami showcase
- Temporary dataset logo → official logo
- Phase 1 exclusion of auth/CMS → later delivered in Phase 3

Current implementation and current PRD/DESIGN take precedence when they conflict with the historical bullets below.

See:

- [`docs/history/PROJECT-DECISION-LOG.md`](../history/PROJECT-DECISION-LOG.md)
- [`docs/phase-01/CHANGELOG-official-logo-branding.md`](CHANGELOG-official-logo-branding.md)

## Final Decisions

- UI dibuat lumayan mirip reference dalam layout/hierarchy.
- Branding menggunakan hijau/orange/yellow.
- Bahasa navigation di-Indonesiakan.
- Tentang Kami: Sejarah, Visi & Misi, Fasilitas.
- Sekolah Kami: PAUD, TK.
- Galeri dihapus dari MVP.
- Hero berupa image carousel.
- Testimonial dipertahankan; placeholder hanya development.
- Unit Pendidikan berisi PAUD dan TK dan masing-masing memiliki route sendiri.
- temporary brand visual menggunakan aset dataset sampai logo final tersedia.

## Implementation Scope Phase 1

```text
1B Design Tokens
1C Global Layout
1D Header/Navbar/Mobile Menu
1E Footer
1F Hero Carousel
1G Homepage Skeleton + page shells
1H Responsive & Route QA
```

## Excluded

- database change;
- migration;
- authentication;
- CMS;
- rich text editor;
- News model;
- Galeri;
- backend Service/Action/Repository;
- deployment.

## Change Conflict Rule

Jika implementasi menemukan keputusan yang bertentangan antara PRD, Architecture, Design, source existing, dan instruksi terbaru user, AI agent harus berhenti pada bagian tersebut dan meminta konfirmasi sebelum mengubah scope.
