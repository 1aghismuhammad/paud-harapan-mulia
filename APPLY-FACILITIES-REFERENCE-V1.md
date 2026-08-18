# Apply Facilities Reference V1

Copy/overwrite isi ZIP ini ke root repository PAUD Harapan Mulia.

## Files
- `resources/views/public/about/facilities.blade.php`
- `docs/phase-01/CHANGELOG-facilities-reference-layout.md`

## Verification
```bash
php artisan optimize:clear
npm run build
php artisan test
```

Lakukan visual QA minimal pada:
- 390 × 844
- 768 × 1024
- 1440 × 900
- 1920 × 1080

Fokus QA:
- green title/breadcrumb band
- carousel 1/2/3 cards sesuai breakpoint
- arrow looping desktop/tablet
- swipe mobile
- hover/focus overlay
- no horizontal overflow
