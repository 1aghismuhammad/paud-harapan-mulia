# Change Log — PAUD Showcase Carousel V3

## Objective

Menyesuaikan baris Fasilitas, Aktivitas, dan Pembiasaan dengan behavior reference:

- decorative stacked label;
- 3 cards visible pada desktop;
- circular previous/next arrows;
- active card menggunakan dark overlay;
- title + category pada active card;
- gallery bergeser smooth ketika arrow diklik.

## Functionality

### Desktop
- 3 cards visible.

### Tablet
- 2 cards visible.

### Mobile
- 1 card visible.
- touch swipe supported.

### Navigation
- previous/next arrow;
- cyclic active item;
- transition `500ms ease-out`.

### Active Card
Active card:
- dark gradient overlay;
- item title;
- category label italic.

Inactive cards:
- clean image;
- subtle shadow;
- light image zoom on hover.

## Data

Setiap showcase memiliki 5 item agar arrow navigation benar-benar berfungsi.

Copy masih berada pada status visual/development dan dapat diganti ketika data final sekolah tersedia.

## Files Changed

- `resources/views/public/school/paud.blade.php`

## Important

Tidak mengubah:

- `resources/js/app.js`
- `resources/css/app.css`

Dengan demikian patch ini tidak menimpa:
- Hero Carousel V5;
- Motion V2;
- feature-card fix;
- homepage hover;
- global responsive styles.

## Route / Database / Dependency

Tidak ada perubahan.

## Risk

LOW
