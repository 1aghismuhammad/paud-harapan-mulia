# Hero Fade V5 — Visible Fade-Through

## Goal

Membuat transisi hero jelas terlihat, bahkan ketika dua foto memiliki tone/komposisi yang mirip.

## Technique

Tidak lagi hanya mengandalkan class CSS crossfade.

V5 memakai tiga lapisan visual sekaligus:

### 1. Outgoing image

```text
opacity 1 -> 0
1200ms
```

### 2. White fade-through layer

```text
opacity 0
-> 0.38
-> 0
1750ms
```

Overlay hanya muncul sebentar di tengah pergantian.

### 3. Incoming image

Mulai 280ms setelah transition dimulai:

```text
opacity 0 -> 1
1500ms
```

### 4. Incoming subtle zoom

```text
scale 1.025 -> 1
6200ms
```

## Reduced Motion

Reduced-motion tetap mendapat opacity dissolve tanpa spatial zoom:

- fade-out 700ms;
- fade-in 900ms;
- overlay max 0.20.

Jadi fade masih terlihat tetapi lebih ringan.

## Files Changed

- `resources/js/app.js`
- `resources/views/components/site/hero.blade.php`

## Intentionally Not Changed

- `resources/css/app.css`
- feature cards
- feature hover
- homepage layout
- hero dimensions
- routes
- database
- dependencies

## Risk

LOW-MEDIUM
