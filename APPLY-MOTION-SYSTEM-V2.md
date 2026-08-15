# APPLY — Motion System V2

Extract ZIP ini langsung ke root repository:

```text
paud-harapan-mulia/
├── resources/
└── docs/
```

Overwrite file yang sama.

Kemudian jalankan:

```bash
php artisan optimize:clear
npm run build
php artisan test
```

Saat development:

```bash
php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

Setelah Vite aktif, lakukan hard refresh:

```text
Ctrl + Shift + R
```

## Quick visual verification

1. Homepage load:
   - hero fade-up terlihat;
   - gambar hero bergerak sangat halus `1.03 -> 1`.

2. Hero change:
   - slide crossfade sekitar `900ms`.

3. Scroll homepage:
   - feature cards muncul bertahap;
   - Visi/Misi dan Profil fade-up;
   - Unit Pendidikan fade-up bertahap;
   - news cards muncul stagger.

4. Hover desktop:
   - navbar underline;
   - card naik sekitar `4px`;
   - image zoom sekitar `1.04`;
   - news title berubah hijau;
   - news arrow bergerak sedikit.

5. Mobile:
   - drawer slide dari kiri `300ms`;
   - backdrop fade;
   - submenu smooth.

6. Testimonial:
   - slide sekitar `550ms`;
   - autoplay sekitar `5.5s`;
   - berhenti ketika pointer/focus berada di testimonial;
   - dots dan swipe tetap bekerja.
