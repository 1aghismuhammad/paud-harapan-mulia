# APPLY — PAUD Page Reference Match V2

Extract ZIP langsung ke root repository.

Hanya overwrite:

```text
resources/views/public/school/paud.blade.php
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
/sekolah/paud
```

Representative viewport:

- 390 × 844
- 768 × 1024
- 1440 × 900
- 1920 × 1080

Sebelum push:

```cmd
npm run build
php artisan test
git diff --check
```
