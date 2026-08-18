# Change Log — PAUD/TK Keunggulan Smooth V8

## Fix

Malformed visible comments:

```text
{-- Desktop / tablet tab layout --}
{-- Mobile accordion layout --}
```

diganti menjadi Blade comments valid:

```blade
{{-- Desktop / tablet tab layout --}}
{{-- Mobile accordion layout --}}
```

Komentar tidak lagi dirender ke halaman.

## Mobile Accordion Animation

### Open

```text
height 0 -> content height
opacity 0 -> 1
translateY -8px -> 0
duration 340ms
```

### Close

```text
content height -> 0
opacity 1 -> 0
translateY 0 -> -8px
duration 280ms
```

Hasilnya panel terasa slide-down / slide-up, bukan muncul/hilang mendadak.

## Desktop Tab Animation

Saat menu kiri diklik:

Outgoing panel:

```text
fade-out + translateY(-6px)
170ms
```

Incoming panel:

```text
fade-in + translateY(8px -> 0)
260ms
```

## Accessibility

Jika:

```text
prefers-reduced-motion: reduce
```

aktif, animation dilewati dan state tetap berubah secara instan.

## Files Changed

- `resources/views/public/school/paud.blade.php`
- `resources/views/public/school/tk.blade.php`

## Not Changed

- global CSS
- global JS
- homepage
- showcase carousel behavior
- hero
- routes
- database
- dependencies

## Risk

LOW
