# Change Log — Hero Autoplay Smooth Crossfade

## Objective

Membuat hero carousel berganti otomatis dengan tempo yang tenang dan transisi fade yang lebih halus.

## Behavior

### Autoplay

Hero berpindah otomatis setiap:

```text
7000ms
= 7 detik
```

Urutan:

```text
Slide 1
↓ 7 detik
Slide 2
↓ 7 detik
Slide 3
↓
kembali Slide 1
```

### Crossfade

Durasi fade antar slide:

```text
1000ms
= 1 detik
```

Menggunakan easing:

```text
cubic-bezier(0.22, 1, 0.36, 1)
```

Slide lama fade out sementara slide baru fade in.

### Subtle Image Motion

Image zoom:

```text
1.025 -> 1
```

selama:

```text
6500ms
```

Efek sangat ringan supaya foto tidak terasa diam, tetapi tidak mengganggu.

## Existing Behavior Preserved

- Previous arrow
- Next arrow
- Pagination dots
- Pause on pointer hover
- Pause on keyboard focus
- Restart autoplay setelah manual navigation
- `prefers-reduced-motion`

## Files Changed

- `resources/js/app.js`
- `resources/css/app.css`

## Not Changed

- Hero dimensions
- Hero images
- Layout
- Navbar
- Feature cards
- Routes
- Database
- Dependencies

## Risk

LOW

## Verification

Development:

```cmd
php artisan optimize:clear
npm run dev
php artisan serve
```

Hard refresh:

```text
Ctrl + Shift + R
```

Test:
1. jangan klik hero;
2. tunggu sekitar 7 detik;
3. slide harus berpindah sendiri;
4. perpindahan sekitar 1 detik;
5. arahkan mouse ke hero — autoplay berhenti;
6. keluarkan mouse — autoplay jalan lagi.

Sebelum push:

```cmd
npm run build
php artisan test
git diff --check
```
