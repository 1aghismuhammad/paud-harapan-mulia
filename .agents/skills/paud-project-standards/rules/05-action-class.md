> Project activation: Baca saat sebuah use-case spesifik dipisahkan ke Action atau saat memutuskan batas Action vs Service.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Action Class

## Tujuan

Action Class digunakan untuk satu use-case spesifik yang memiliki tujuan tunggal.

Lokasi yang disarankan:

```text
app/Actions/
```

Contoh:

```text
app/Actions/Training/CreateTraining.php
app/Actions/Training/DeleteTraining.php
app/Actions/Training/CompleteTraining.php
```

---

## Aturan untuk AI

AI **HARUS**:

1. Membuat Action jika sebuah use-case cukup spesifik dan tidak cocok menjadi Service besar.
2. Menamai class dengan kata kerja:
   - `CreateTraining`
   - `ApproveEvaluation`
   - `DeleteParticipant`
3. Menggunakan satu public entry method secara konsisten:
   - `execute()`
   - `handle()`
4. Menggunakan dependency injection.
5. Menggunakan transaction jika action mengubah beberapa tabel.
6. Menjaga Action tetap independen dari View/Redirect/HTTP response.

AI **DILARANG**:

1. Membuat Action yang menangani banyak use-case tidak terkait.
2. Mengakses global request dari dalam Action.
3. Mengembalikan response HTTP.
4. Menjadikan semua operasi CRUD sederhana sebagai Action tanpa alasan.
5. Duplikasi logic antara Action dan Service.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menggunakan Action untuk use-case yang jelas dan dapat diberi nama.
2. Menentukan batas antara Service dan Action secara konsisten dalam project.
3. Menguji Action yang memiliki business rule penting.
4. Memecah Action jika sudah melakukan terlalu banyak hal.

---

## Contoh

```php
namespace App\Actions\Training;

use App\Models\Training;
use Illuminate\Support\Facades\DB;

class DeleteTraining
{
    public function execute(Training $training): void
    {
        DB::transaction(function () use ($training) {
            $training->participants()->detach();
            $training->monitoringResults()->delete();
            $training->delete();
        });
    }
}
```

---

## Checklist Review

- [ ] Satu Action = satu use-case
- [ ] Nama berupa kata kerja
- [ ] Tidak ada HTTP response
- [ ] Tidak duplikasi dengan Service
- [ ] Transaction digunakan bila perlu

