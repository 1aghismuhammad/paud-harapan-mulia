> Project activation: Baca saat menambah/mengubah cache, TTL, cache key, invalidation, atau optimasi berbasis cache.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Cache

## Tujuan

Cache digunakan untuk mengurangi query atau proses berulang yang mahal.

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan cache hanya untuk data yang memang memberi manfaat performance.
2. Memberi cache key yang jelas dan namespaced.
3. Menentukan TTL yang sesuai.
4. Menentukan strategi invalidation sebelum menambahkan cache.
5. Menggunakan `Cache::remember()` untuk pola read-through sederhana.
6. Menghindari caching data sensitif tanpa pertimbangan keamanan.
7. Mengukur masalah performance sebelum menambah cache besar.

AI **DILARANG**:

1. Menganggap cache sebagai source of truth.
2. Menambahkan cache ke semua query.
3. Membuat cache tanpa strategi invalidation.
4. Menyimpan data user-specific dengan key yang dapat bertabrakan.
5. Menyimpan object besar tanpa kebutuhan.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menjawab tiga pertanyaan sebelum caching:
   - Apa yang dicache?
   - Kapan cache invalid?
   - Berapa lama TTL?
2. Menggunakan prefix/key yang konsisten.
3. Menghapus cache saat source data berubah jika diperlukan.
4. Memantau hit/miss untuk cache penting.
5. Memastikan aplikasi tetap benar saat cache kosong.

---

## Contoh

```php
$categories = Cache::remember(
    'training:categories:v1',
    now()->addHour(),
    fn () => TrainingCategory::query()
        ->orderBy('name')
        ->get()
);
```

Invalidation:

```php
Cache::forget('training:categories:v1');
```

---

## Checklist Review

- [ ] Ada alasan performance yang jelas
- [ ] TTL ditentukan
- [ ] Invalidation ditentukan
- [ ] Key unik dan konsisten
- [ ] Aplikasi tetap benar tanpa cache

