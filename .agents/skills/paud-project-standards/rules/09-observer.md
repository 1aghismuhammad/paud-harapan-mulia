> Project activation: Baca saat logic terkait lifecycle Model atau Observer dibuat/diubah.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Observer

## Tujuan

Observer digunakan untuk menangani event lifecycle Model secara terpusat.

Contoh event:

```text
creating
created
updating
updated
deleting
deleted
restored
```

Lokasi:

```text
app/Observers/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Observer jika logic benar-benar terkait lifecycle Model.
2. Menjaga handler observer singkat.
3. Memindahkan proses berat ke Job/Event jika diperlukan.
4. Mencegah recursive update yang dapat memicu observer kembali.
5. Memastikan side effect observer memang selalu harus terjadi untuk lifecycle tersebut.

AI **DILARANG**:

1. Menaruh business workflow besar di Observer.
2. Menyembunyikan proses penting yang seharusnya eksplisit di Service.
3. Melakukan query berulang yang menyebabkan N+1.
4. Memanggil `save()` pada model yang sama tanpa pengamanan sehingga loop.
5. Menaruh proses lambat langsung di observer jika bisa di-queue.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Memakai Observer untuk behavior lifecycle yang konsisten.
2. Mendokumentasikan side effect penting yang terjadi otomatis.
3. Menguji behavior penting agar proses tersembunyi tidak menjadi sumber bug.
4. Mempertimbangkan Event jika proses perlu lebih eksplisit.

---

## Contoh

```php
namespace App\Observers;

use App\Models\Training;

class TrainingObserver
{
    public function created(Training $training): void
    {
        // proses ringan yang memang selalu terjadi
    }
}
```

---

## Checklist Review

- [ ] Logic memang terkait lifecycle Model
- [ ] Tidak ada recursion tidak terkontrol
- [ ] Proses berat dipindah ke Job
- [ ] Side effect penting terdokumentasi
- [ ] Observer tidak menjadi Service tersembunyi

