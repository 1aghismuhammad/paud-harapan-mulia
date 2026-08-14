> Project activation: Baca saat proses lambat/asynchronous, queue, retry, timeout, atau Job dibuat/diubah.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Job dan Queue

## Tujuan

Job/Queue digunakan untuk memindahkan proses lambat atau asynchronous dari request utama.

Lokasi:

```text
app/Jobs/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Job untuk proses seperti:
   - email massal
   - generate report
   - import/export
   - sinkronisasi API
   - image/file processing
   - notifikasi berat
2. Membuat Job kecil dan fokus.
3. Menggunakan `ShouldQueue` untuk proses asynchronous.
4. Menentukan retry/timeout jika relevan.
5. Membuat Job idempotent jika ada kemungkinan retry.
6. Menyimpan identifier yang dibutuhkan, bukan state besar yang tidak perlu.
7. Menangani failure sesuai kebutuhan.

AI **DILARANG**:

1. Menaruh request/response HTTP dalam Job.
2. Mengasumsikan Job hanya dijalankan sekali.
3. Menyimpan object non-serializable.
4. Memasukkan seluruh workflow domain besar dalam satu Job.
5. Menjalankan proses berat sinkron jika sudah jelas lebih cocok di queue.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menjalankan queue worker secara benar di production.
2. Menentukan retry policy untuk integrasi eksternal.
3. Memastikan Job aman terhadap duplicate execution.
4. Memantau failed jobs.
5. Menentukan timeout sesuai karakteristik proses.

---

## Contoh

```php
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateTrainingReport implements ShouldQueue
{
    public int $tries = 3;
    public int $timeout = 120;

    public function __construct(
        public int $trainingId
    ) {}

    public function handle(): void
    {
        // generate report
    }
}
```

Dispatch:

```php
GenerateTrainingReport::dispatch($training->id);
```

---

## Checklist Review

- [ ] Job fokus
- [ ] Idempotent
- [ ] Retry/timeout dipertimbangkan
- [ ] Failed job dapat dipantau
- [ ] Tidak menyimpan state berlebihan

