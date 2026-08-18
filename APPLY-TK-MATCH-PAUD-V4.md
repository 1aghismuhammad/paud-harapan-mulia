# APPLY — TK Match PAUD V4

Extract ZIP ke root repository.

Overwrite hanya:

```text
resources/views/public/school/tk.blade.php
```

Kemudian:

```cmd
php artisan optimize:clear
```

Pastikan:

```cmd
php artisan serve
```

dan:

```cmd
npm run dev
```

Hard refresh:

```text
Ctrl + Shift + R
```

Review:

```text
/sekolah/tk
```

Bandingkan dengan:

```text
/sekolah/paud
```

Expected:
- struktur, spacing, decorative labels, carousel, hover, dan responsive behavior sama;
- content/heading tetap khusus unit masing-masing.
