# Hero Fade V4.1 — Longer Transition

## Timing Update

Autoplay tetap:

```text
7000ms
```

Fade sekarang diperpanjang:

```text
Fade Out:
900ms -> 1400ms

Fade In:
1100ms -> 1600ms

Overlap Delay:
140ms -> 250ms
```

## Result

Pergantian hero sekarang mempunyai dissolve yang lebih jelas:

```text
old image
1.4s fade-out
      ↘
       overlap 250ms
      ↗
new image
1.6s fade-in
```

Total visual transition terasa sekitar 1.6–1.8 detik.

## Files Changed

- `resources/js/app.js`

## Not Changed

- CSS
- feature cards
- hero dimensions
- hero images
- autoplay interval
- navbar
- testimonial
- routes
- database
- dependencies

## Risk

LOW
