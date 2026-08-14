> Project activation: Baca saat query/data access kompleks atau reusable dan ada pertimbangan menggunakan Repository Pattern.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Repository

## Tujuan

Repository digunakan untuk mengabstraksi akses data ketika query/data source cukup kompleks atau perlu dipisahkan dari business logic.

Lokasi yang disarankan:

```text
app/Repositories/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Repository hanya jika ada alasan arsitektural yang jelas.
2. Menaruh query kompleks atau akses data reusable di Repository.
3. Memisahkan interface dan implementation jika project memang membutuhkan abstraction.
4. Menggunakan dependency injection.
5. Menjaga Repository fokus pada akses data, bukan business logic.

AI **DILARANG**:

1. Membuat Repository hanya untuk membungkus semua method Eloquent satu per satu.
2. Menaruh authorization di Repository.
3. Menaruh response HTTP di Repository.
4. Menaruh workflow bisnis di Repository.
5. Membuat interface tanpa kebutuhan hanya demi "clean architecture".

---

## Aturan untuk Developer

Repository layak dipakai jika salah satu kondisi berikut terpenuhi:

1. Query kompleks dipakai di banyak tempat.
2. Data source dapat berubah.
3. Ada kebutuhan mocking repository dalam arsitektur project.
4. Domain perlu dipisahkan kuat dari ORM.
5. Ada kombinasi beberapa data source.

Repository sebaiknya **tidak digunakan** jika project CRUD sederhana dan Eloquent sudah cukup.

---

## Contoh

```php
interface TrainingRepositoryInterface
{
    public function findActiveByYear(int $year);
}
```

```php
class TrainingRepository implements TrainingRepositoryInterface
{
    public function findActiveByYear(int $year)
    {
        return Training::query()
            ->where('status', 'active')
            ->whereYear('start_date', $year)
            ->with('participants')
            ->get();
    }
}
```

---

## Checklist Review

- [ ] Ada alasan nyata menggunakan Repository
- [ ] Repository berisi akses data
- [ ] Business logic tetap di Service/Action
- [ ] Tidak sekadar wrapper Eloquent
- [ ] Dependency injection digunakan

