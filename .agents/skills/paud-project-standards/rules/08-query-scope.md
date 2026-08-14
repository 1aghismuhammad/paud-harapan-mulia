> Project activation: Baca saat membuat filter/query Eloquent reusable atau local scope.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Query Scope

## Tujuan

Query Scope digunakan untuk query Eloquent reusable yang terkait dengan satu Model.

Lokasi:

```text
app/Models/
```

atau menggunakan custom builder bila project membutuhkan struktur lebih kompleks.

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan local scope untuk kondisi query yang berulang.
2. Memberi nama scope berdasarkan makna bisnis:
   - `active()`
   - `completed()`
   - `forYear()`
   - `ownedBy()`
3. Membuat scope composable.
4. Menggunakan parameter jika filter memerlukan nilai.
5. Menjaga scope hanya berhubungan dengan query.

AI **DILARANG**:

1. Menaruh update/create/delete dalam query scope.
2. Menaruh side effect di query scope.
3. Membuat scope untuk query yang hanya dipakai sekali dan tidak meningkatkan readability.
4. Menaruh workflow bisnis kompleks dalam scope.
5. Menggunakan nama scope ambigu seperti `filter1()` atau `data()`.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menggunakan scope untuk query berulang pada Model yang sama.
2. Menjaga scope sederhana dan dapat digabung.
3. Menghindari query raw jika query builder/Eloquent sudah cukup.
4. Meninjau index database untuk filter yang sering digunakan.

---

## Contoh

```php
use Illuminate\Database\Eloquent\Builder;

public function scopeActive(Builder $query): Builder
{
    return $query->where('status', 'active');
}

public function scopeForYear(Builder $query, int $year): Builder
{
    return $query->whereYear('start_date', $year);
}
```

Penggunaan:

```php
$trainings = Training::query()
    ->active()
    ->forYear(2026)
    ->get();
```

---

## Checklist Review

- [ ] Scope reusable
- [ ] Nama bermakna
- [ ] Tidak ada side effect
- [ ] Dapat dikombinasikan dengan scope lain
- [ ] Tidak terlalu kompleks

