> Project activation: Baca saat membuat/mengubah fitur penting, memperbaiki bug, menulis test, atau melakukan regression test.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Tests

## Tujuan

Test digunakan untuk memastikan behavior aplikasi tetap benar saat code berubah.

Lokasi:

```text
tests/Feature/
tests/Unit/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Membuat Feature Test untuk alur HTTP dan behavior aplikasi.
2. Membuat Unit Test untuk logic yang benar-benar terisolasi.
3. Menguji happy path dan failure path.
4. Menguji authorization.
5. Menguji validation penting.
6. Menguji business rule penting.
7. Menggunakan factory untuk data test.
8. Menjaga test deterministik.
9. Menamai test berdasarkan behavior yang diuji.
10. Menggunakan `RefreshDatabase` jika test berinteraksi dengan database dan sesuai kebutuhan.

AI **DILARANG**:

1. Menulis test hanya untuk mengejar coverage.
2. Menguji implementation detail tanpa kebutuhan.
3. Membuat test bergantung pada urutan test lain.
4. Menggunakan data production.
5. Membiarkan network/API eksternal nyata dipanggil tanpa mocking/fake.
6. Membuat assertion yang terlalu umum.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menulis test untuk fitur bisnis penting.
2. Menambah regression test ketika bug ditemukan.
3. Menjalankan test sebelum merge.
4. Menjaga test cepat dan independen.
5. Memprioritaskan behavior daripada struktur internal.
6. Memastikan perubahan schema/migration memiliki test yang relevan jika memengaruhi behavior.

---

## Contoh Feature Test

```php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a training with valid data', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/trainings', [
            'name' => 'Laravel Architecture',
            'start_date' => '2026-08-20',
        ]);

    $response->assertRedirect();

    $this->assertDatabaseHas('trainings', [
        'name' => 'Laravel Architecture',
    ]);
});
```

---

## Minimum Test Coverage Secara Behavior

Setiap fitur penting sebaiknya memiliki test untuk:

```text
success
validation failure
unauthorized
forbidden
not found
business rule failure
database side effect
event/job dispatch jika relevan
```

---

## Checklist Review

- [ ] Happy path diuji
- [ ] Failure path diuji
- [ ] Authorization diuji
- [ ] Validation diuji
- [ ] Business rule diuji
- [ ] Test independen
- [ ] Bug fix memiliki regression test

