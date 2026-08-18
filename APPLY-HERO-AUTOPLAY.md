# APPLY — Hero Autoplay Smooth Crossfade

Extract ZIP ini langsung ke root repository.

Overwrite:

```text
resources/js/app.js
resources/css/app.css
```

Lalu:

```cmd
php artisan optimize:clear
```

Pastikan dua terminal aktif:

```cmd
php artisan serve
```

```cmd
npm run dev
```

Kemudian:

```text
Ctrl + Shift + R
```

## Expected Result

- Hero auto-next setiap 7 detik.
- Fade antar foto sekitar 1 detik.
- Foto memiliki zoom sangat halus 1.025 -> 1.
- Hover/focus hero pause autoplay.
- Panah dan dots tetap bekerja.
