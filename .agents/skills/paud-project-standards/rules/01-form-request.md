> Project activation: Baca saat membuat atau mengubah endpoint yang menerima input, validasi, Form Request, atau data request yang diteruskan ke layer lain.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Form Request

## Tujuan

Form Request digunakan untuk memisahkan validasi dan otorisasi request dari Controller.

Lokasi standar:

```text
app/Http/Requests/
```

Contoh nama:

```text
StoreTrainingRequest.php
UpdateTrainingRequest.php
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Form Request jika endpoint menerima input yang perlu divalidasi.
2. Membuat Form Request terpisah untuk kebutuhan `store` dan `update` jika aturannya berbeda.
3. Menaruh aturan validasi di method `rules()`.
4. Menaruh pesan validasi khusus di `messages()` hanya jika diperlukan.
5. Menggunakan `$request->validated()` untuk mengirim data valid ke Service atau Action.
6. Menggunakan tipe rule array jika rule mulai kompleks.
7. Menggunakan enum, `Rule::in()`, `Rule::exists()`, atau `Rule::unique()` jika lebih tepat daripada string rule panjang.
8. Memastikan rule `unique` saat update mengecualikan record aktif bila diperlukan.
9. Menjaga Form Request hanya untuk validasi dan authorization request.
10. Menggunakan `authorize()` hanya untuk rule akses sederhana yang memang terkait request.

AI **DILARANG**:

1. Menulis blok validasi panjang langsung di Controller.
2. Mengirim `$request->all()` ke Service.
3. Menaruh business logic di Form Request.
4. Menjalankan query kompleks yang tidak berkaitan dengan validasi.
5. Mengubah atau menyimpan data ke database dari Form Request.
6. Menaruh proses side effect seperti kirim email, dispatch job, atau update model.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Membuat satu Form Request berdasarkan satu konteks input.
2. Memastikan semua input user tervalidasi sebelum masuk ke business logic.
3. Menggunakan nama class yang menggambarkan operasi:
   - `StoreUserRequest`
   - `UpdateUserRequest`
   - `ImportTrainingRequest`
4. Meninjau validasi berdasarkan:
   - required / nullable
   - tipe data
   - panjang data
   - referential integrity
   - uniqueness
   - format file
   - batas ukuran file
5. Menghindari duplikasi rule dengan mengekstrak reusable rule jika rule mulai berulang.

---

## Contoh

```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],
        ];
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

    return redirect()
        ->route('trainings.show', $training);
}
```

---

## Checklist Review

- [ ] Validasi tidak berada di Controller
- [ ] Menggunakan `$request->validated()`
- [ ] Tidak ada business logic
- [ ] Tidak ada operasi database
- [ ] Rule store/update sesuai kebutuhan
- [ ] Nama class menjelaskan tujuan request

