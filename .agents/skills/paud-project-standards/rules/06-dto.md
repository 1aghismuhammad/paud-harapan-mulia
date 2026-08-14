> Project activation: Baca saat data lintas layer mulai kompleks, butuh type safety, atau DTO dibuat/diubah.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan DTO

## Tujuan

DTO (Data Transfer Object) digunakan untuk membawa data antar layer secara eksplisit dan terstruktur.

Lokasi yang disarankan:

```text
app/DTOs/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan DTO jika struktur data kompleks, dipakai lintas layer, atau butuh type safety.
2. Mendefinisikan property secara eksplisit dan typed.
3. Menjaga DTO bebas dari database query dan side effect.
4. Menggunakan constructor atau factory seperti `fromRequest()`/`fromArray()` jika membantu.
5. Membuat DTO immutable jika perubahan data tidak diperlukan.

AI **DILARANG**:

1. Menaruh business logic berat di DTO.
2. Mengakses Model atau database dari DTO.
3. Menjadikan DTO sebagai pengganti Model.
4. Membuat DTO untuk setiap array kecil tanpa kebutuhan.
5. Menggunakan property dinamis tidak bertipe.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menggunakan DTO ketika signature `array $data` mulai sulit diketahui bentuknya.
2. Menentukan tipe property secara jelas.
3. Memastikan DTO hanya membawa data.
4. Menghindari nested array kompleks yang tidak terdokumentasi.

---

## Contoh

```php
namespace App\DTOs\Training;

readonly class CreateTrainingData
{
    public function __construct(
        public string $name,
        public string $startDate,
        public ?string $description,
    ) {}
}
```

Penggunaan:

```php
$data = new CreateTrainingData(
    name: $request->validated('name'),
    startDate: $request->validated('start_date'),
    description: $request->validated('description'),
);

$service->create($data);
```

---

## Checklist Review

- [ ] Property typed
- [ ] Tidak ada query database
- [ ] Tidak ada side effect
- [ ] Struktur data eksplisit
- [ ] DTO digunakan karena ada kebutuhan nyata

