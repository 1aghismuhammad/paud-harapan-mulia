# Change Log — Unit Pendidikan Bigger V2

## Objective

Memperbesar card PAUD dan TK di homepage agar lebih dominan pada desktop besar.

## Before

```text
Mobile:  180 × 180px
Desktop: 260 × 260px
Gap:     32px desktop
Title:   44px desktop
```

## After

```text
Mobile:  190 × 190px
Tablet:  250 × 250px
Desktop: 330 × 330px
Gap:     40px desktop
Title:   54px desktop
```

Section desktop vertical padding juga dinaikkan sedikit dari `lg:py-24` menjadi `lg:py-28`
agar card yang lebih besar tetap memiliki breathing room.

## Files Changed

- `resources/views/public/home/index.blade.php`

## Not Changed

- hero
- hero autoplay/fade
- Visi & Misi hover
- feature cards
- Motion V2
- testimonial
- news
- footer
- routes
- database
- dependencies

## Risk

LOW
