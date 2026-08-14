> Project activation: Baca saat domain event, listener, atau side effect yang perlu di-decouple dibuat/diubah.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Event dan Listener

## Tujuan

Event dan Listener digunakan untuk memisahkan kejadian domain dari reaksi terhadap kejadian tersebut.

Lokasi:

```text
app/Events/
app/Listeners/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menamai Event dengan kejadian yang sudah terjadi:
   - `TrainingCompleted`
   - `UserRegistered`
   - `EvaluationApproved`
2. Menamai Listener berdasarkan reaksi:
   - `SendTrainingCertificate`
   - `NotifySupervisor`
3. Membuat Event membawa data minimum yang diperlukan.
4. Membuat Listener fokus pada satu responsibility.
5. Menjadikan Listener queued jika proses lambat.
6. Menggunakan Event untuk decouple side effect dari core business logic.

AI **DILARANG**:

1. Menamai Event dengan command seperti `CompleteTraining`.
2. Memasukkan terlalu banyak logic ke Event class.
3. Membuat satu Listener menangani banyak tanggung jawab.
4. Menggunakan Event untuk menggantikan flow sederhana yang lebih jelas jika dipanggil langsung.
5. Mengandalkan urutan listener kecuali benar-benar dirancang demikian.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menggunakan Event ketika satu kejadian dapat memicu beberapa reaksi independen.
2. Menjaga core transaction tetap jelas.
3. Menentukan apakah listener harus sync atau queued.
4. Menulis test untuk event penting.
5. Memastikan listener idempotent jika dapat dijalankan ulang.

---

## Contoh

```php
class TrainingCompleted
{
    public function __construct(
        public Training $training
    ) {}
}
```

```php
class SendTrainingCertificate
{
    public function handle(TrainingCompleted $event): void
    {
        // kirim sertifikat
    }
}
```

---

## Checklist Review

- [ ] Event menyatakan sesuatu yang sudah terjadi
- [ ] Listener satu responsibility
- [ ] Proses lambat di-queue
- [ ] Listener aman dijalankan ulang jika diperlukan
- [ ] Tidak ada dependency tersembunyi pada urutan listener

