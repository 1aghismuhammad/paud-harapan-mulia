> Project activation: Baca saat membuat atau mengubah response API/JSON, API Resource, atau kontrak response.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan API Resource

## Tujuan

API Resource digunakan untuk menentukan representasi JSON yang keluar dari API.

Lokasi:

```text
app/Http/Resources/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Resource untuk response Model pada API publik/internal yang terstruktur.
2. Menghindari mengembalikan Model Eloquent mentah jika kontrak API perlu dikontrol.
3. Menentukan field response secara eksplisit.
4. Menggunakan `whenLoaded()` untuk relationship agar tidak memicu query tak terduga.
5. Menjaga konsistensi nama field.
6. Menggunakan Resource Collection untuk collection jika diperlukan.
7. Menyembunyikan field sensitif.

AI **DILARANG**:

1. Mengembalikan password, token, secret, atau field internal sensitif.
2. Menjalankan business logic di Resource.
3. Menjalankan query database kompleks di Resource.
4. Memformat response web/Blade melalui API Resource.
5. Mengandalkan serialization Model mentah untuk kontrak API penting.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menetapkan kontrak response API yang stabil.
2. Mempertimbangkan backward compatibility sebelum mengubah field.
3. Menggunakan eager loading di query, bukan mengandalkan Resource untuk menarik relation.
4. Memberi test untuk struktur response penting.
5. Menentukan format tanggal secara konsisten.

---

## Contoh

```php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'participants' => ParticipantResource::collection(
                $this->whenLoaded('participants')
            ),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}
```

---

## Checklist Review

- [ ] Tidak expose field sensitif
- [ ] Field API eksplisit
- [ ] Relation menggunakan `whenLoaded`
- [ ] Tidak ada business logic
- [ ] Format API konsisten

