# Change Log — Dropdown Hover Bridge V10

## Objective

Membuat dropdown desktop lebih mudah digunakan dan tidak cepat hilang saat pointer bergerak dari menu utama menuju dropdown.

## Root Cause

CSS existing menempatkan dropdown pada:

```text
top: calc(100% + 14px)
```

Artinya terdapat gap sekitar 14px antara trigger dan panel dropdown.

Jika pointer bergerak lambat melewati gap tersebut, `group-hover` terputus sehingga dropdown langsung menghilang.

## Fix

### Dropdown Position

Panel dinaikkan menjadi:

```text
top: calc(100% + 3px)
```

Jarak visual menjadi jauh lebih kecil.

### Hover Bridge

Ditambahkan transparent hover area tepat di bawah trigger:

```text
height: 20px
```

Karena bridge masih menjadi child dari `.group`, pointer tetap dianggap sedang hover pada group ketika bergerak menuju panel.

### Dropdown Size

Sebelum:

```text
width: 278px
padding horizontal: 20px
padding vertical: 12px
```

Sekarang:

```text
width: 300px
padding horizontal: 24px
padding vertical: 16px
```

### Menu Item Hit Area

Item dropdown dibuat sedikit lebih tinggi:

```text
padding vertical: 17px
```

Sehingga target klik lebih nyaman.

## Files Changed

- `resources/views/components/site/navbar.blade.php`

## Not Changed

- `resources/css/app.css`
- `resources/js/app.js`
- mobile drawer
- routes
- homepage
- PAUD/TK pages
- hero/testimonial
- database
- dependencies

## Risk

LOW
