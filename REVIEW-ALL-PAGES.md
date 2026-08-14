# Review Checklist — All Public Pages

Setelah copy ZIP ke root project:

```powershell
php artisan optimize:clear
npm run build
php artisan test
```

Lalu jalankan:

```powershell
php artisan serve
npm run dev
```

## Desktop 1920×1080

### Sejarah
- green page banner lebar
- breadcrumb box menempel di bawah banner
- gambar centered, tidak full width
- text area ±1120px

### Visi & Misi
- tidak ada card besar
- plain editorial text
- spacing mirip reference

### Fasilitas
- heading centered
- 3 image cards per row
- media area lebih sempit daripada green page banner

### PAUD/TK
- wide image hero
- profile 2 images + text
- 3 showcase rows
- advantages panel
- news 3 cards

### Berita
- centered headline
- whitespace besar
- 3 cards
- metadata strip overlap

### Footer
- 3 column
- dark copyright bar

## Mobile 390×844

Pastikan:
- tidak horizontal overflow
- 3 media cards menjadi tetap terbaca / responsive
- unit profile menjadi 1 kolom
- page banner breadcrumb tidak keluar layar
- news cards stack
- footer stack
