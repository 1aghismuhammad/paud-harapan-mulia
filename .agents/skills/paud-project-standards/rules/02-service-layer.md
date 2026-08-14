> Project activation: Baca saat membuat atau mengubah business logic, orchestration, transaction, atau Service.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Service Layer

## Tujuan

Service Layer digunakan untuk menyimpan business logic dan orchestration proses aplikasi.

Lokasi standar:

```text
app/Services/
```

Contoh:

```text
TrainingService.php
MonitoringService.php
UserService.php
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menaruh business logic di Service, bukan Controller.
2. Menggunakan dependency injection melalui constructor.
3. Menggunakan transaction jika satu operasi harus mengubah beberapa data secara atomik.
4. Membuat method yang menggambarkan proses bisnis:
   - `createTraining()`
   - `completeEvaluation()`
   - `assignParticipants()`
5. Mengembalikan hasil yang jelas seperti Model, DTO, Collection, atau `void`.
6. Memisahkan use-case yang terlalu besar ke Action jika satu Service mulai terlalu gemuk.
7. Memanggil Repository hanya jika project memang menggunakan Repository Pattern.
8. Menggunakan Event atau Job untuk side effect yang layak dipisahkan.
9. Menjaga Service independen dari HTTP layer.

AI **DILARANG**:

1. Mengakses `Request` langsung dari Service.
2. Mengembalikan `redirect()`, `view()`, atau `response()->json()` dari Service.
3. Menaruh HTML atau format response di Service.
4. Menjadikan Service hanya wrapper tanpa manfaat:
   ```php
   public function find($id)
   {
       return User::find($id);
   }
   ```
   kecuali memang bagian dari abstraksi yang konsisten.
5. Membuat satu Service raksasa untuk seluruh domain aplikasi.
6. Menangkap semua exception tanpa alasan lalu mengabaikannya.
7. Membuat static service jika dependency injection bisa digunakan.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Memakai Service ketika proses memiliki business rule atau melibatkan beberapa operasi.
2. Menjaga setiap Service fokus pada satu domain.
3. Memecah method jika terlalu panjang atau memiliki banyak cabang.
4. Menggunakan `DB::transaction()` jika perubahan data harus konsisten.
5. Membuat test untuk business logic penting.
6. Tidak membuat Service hanya karena semua Controller harus "terlihat kosong".

---

## Contoh

```php
namespace App\Services;

use App\Models\Training;
use Illuminate\Support\Facades\DB;

class TrainingService
{
    public function create(array $data): Training
    {
        return DB::transaction(function () use ($data) {
            $participants = $data['participants'] ?? [];

            unset($data['participants']);

            $training = Training::create($data);

            if ($participants) {
                $training->participants()->sync($participants);
            }

            return $training;
        });
    }
}
```

Controller:

```php
public function store(
    StoreTrainingRequest $request,
    TrainingService $service
) {
    $training = $service->create($request->validated());

    return redirect()->route('trainings.show', $training);
}
```

---

## Checklist Review

- [ ] Business logic tidak berada di Controller
- [ ] Service tidak bergantung pada HTTP Request
- [ ] Tidak mengembalikan View/Redirect/JSON
- [ ] Dependency menggunakan injection
- [ ] Transaction digunakan jika diperlukan
- [ ] Service tidak terlalu besar

