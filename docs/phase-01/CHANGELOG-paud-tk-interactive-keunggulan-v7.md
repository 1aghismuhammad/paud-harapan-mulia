# Change Log — PAUD/TK Interactive Keunggulan V7

## Objective

Menyesuaikan section Keunggulan PAUD dan TK dengan reference:

- menu dapat diklik;
- isi kanan berubah sesuai menu aktif;
- mobile menggunakan accordion;
- ukuran teks diperbesar.

## Desktop / Tablet

Struktur:

```text
┌──────────────────┬──────────────────────────┐
│ Menu 1           │ Content menu aktif       │
│ Menu 2           │                          │
│ Menu 3           │                          │
│ Menu 4           │                          │
│ Menu 5           │                          │
└──────────────────┴──────────────────────────┘
```

Klik menu kiri:
- active state berpindah;
- content kanan berubah;
- active menu mendapat tint hijau tipis;
- active text menjadi brand green + semibold.

Typography:
- menu desktop: `15px`
- menu large desktop: `17px`
- content desktop: `15px`
- content large desktop: `17px`
- heading desktop: sampai `46px`

## Mobile

Struktur berubah menjadi accordion seperti reference.

Klik menu:
- content muncul tepat di bawah item;
- item aktif mendapat background hijau tipis;
- simbol `+` berubah menjadi `−`;
- item lain otomatis ditutup;
- item aktif dapat ditutup dengan klik lagi.

Typography:
- menu mobile: `16px`
- content mobile: `15px`
- heading mobile: `32px`

## Content

Setiap keunggulan sekarang mempunyai deskripsi berbeda.

PAUD:
- Pembiasaan nilai-nilai Islami
- Pembelajaran kreatif dan menyenangkan
- Lingkungan yang aman dan mendukung
- Kolaborasi sekolah dengan orang tua
- Kegiatan yang mendukung kemandirian

TK:
- Pembiasaan doa dan praktik ibadah
- Pengenalan membaca Al-Qur’an
- Pembelajaran kreatif dan menyenangkan
- Program parenting
- Pengembangan kemandirian anak

## Files Changed

- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`

## Not Changed

- global CSS
- global JS
- homepage
- hero
- showcase carousel
- routes
- database
- dependencies

## Risk

LOW
