> Project activation: Baca saat menangani error domain/business rule, custom exception, atau mapping error ke HTTP layer.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Custom Exception

## Tujuan

Custom Exception digunakan untuk merepresentasikan error domain atau kondisi bisnis secara eksplisit.

Lokasi yang disarankan:

```text
app/Exceptions/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Membuat Custom Exception jika error memiliki arti domain yang jelas.
2. Memberi nama deskriptif:
   - `TrainingAlreadyCompletedException`
   - `ParticipantLimitExceededException`
3. Melempar exception pada layer tempat kondisi bisnis ditemukan.
4. Menangani mapping ke response di exception handler atau HTTP layer.
5. Menjaga pesan aman untuk ditampilkan ke user jika memang akan diekspos.

AI **DILARANG**:

1. Menggunakan `Exception` generik untuk semua kasus domain.
2. Menangkap exception lalu mengabaikannya.
3. Menggunakan exception untuk flow normal.
4. Membocorkan SQL, stack trace, token, credential, atau data sensitif ke user.
5. Mengembalikan response HTTP langsung dari domain exception jika arsitektur project memisahkan layer.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Memisahkan error teknis dan error bisnis.
2. Logging error teknis dengan context yang cukup.
3. Tidak mengekspos stack trace di production.
4. Memetakan exception domain ke status/response yang konsisten.
5. Menulis test untuk kondisi bisnis kritis yang memicu exception.

---

## Contoh

```php
namespace App\Exceptions;

use RuntimeException;

class TrainingAlreadyCompletedException extends RuntimeException
{
}
```

Service:

```php
if ($training->isCompleted()) {
    throw new TrainingAlreadyCompletedException(
        'Training sudah selesai.'
    );
}
```

---

## Checklist Review

- [ ] Nama exception spesifik
- [ ] Tidak dipakai untuk flow normal
- [ ] Tidak ada data sensitif bocor
- [ ] Error teknis tetap tercatat
- [ ] Mapping response konsisten

