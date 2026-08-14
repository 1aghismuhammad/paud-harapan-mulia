> Project activation: Baca saat menyentuh authorization, role/permission, ownership, Policy, Gate, middleware akses, atau kemampuan user.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Penulisan Policy dan Gate

## Tujuan

Policy dan Gate digunakan untuk authorization: menentukan apakah user boleh melakukan tindakan tertentu.

Lokasi Policy:

```text
app/Policies/
```

---

## Aturan untuk AI

AI **HARUS**:

1. Menggunakan Policy untuk authorization berbasis resource/model.
2. Menggunakan Gate untuk rule authorization global atau sederhana.
3. Menamai method berdasarkan kemampuan:
   - `view`
   - `create`
   - `update`
   - `delete`
   - `approve`
   - `export`
4. Menggunakan `$this->authorize()` atau mekanisme authorization Laravel di Controller/route.
5. Memisahkan authentication dari authorization.
6. Menjaga Policy hanya berisi keputusan akses.

AI **DILARANG**:

1. Menulis pengecekan role berulang di banyak Controller.
2. Menaruh business process di Policy.
3. Mengubah database dari Policy.
4. Mengirim email atau menjalankan side effect dari Policy.
5. Menggunakan string role yang tersebar jika project sudah memiliki enum/constant role.

---

## Aturan untuk Developer

Developer **HARUS**:

1. Menggunakan Policy jika resource memiliki aturan akses.
2. Menentukan akses berdasarkan kombinasi yang jelas:
   - role
   - ownership
   - status resource
   - permission
3. Menghindari duplikasi kondisi authorization.
4. Memberi test untuk akses penting.
5. Menggunakan prinsip default deny: akses diberikan hanya jika memenuhi aturan.

---

## Contoh

```php
namespace App\Policies;

use App\Models\Training;
use App\Models\User;

class TrainingPolicy
{
    public function update(User $user, Training $training): bool
    {
        return $user->is_admin
            || $training->created_by === $user->id;
    }

    public function delete(User $user, Training $training): bool
    {
        return $user->is_admin;
    }
}
```

Controller:

```php
public function update(
    UpdateTrainingRequest $request,
    Training $training
) {
    $this->authorize('update', $training);

    // ...
}
```

---

## Checklist Review

- [ ] Authorization tidak tersebar di Controller
- [ ] Policy tidak mengubah data
- [ ] Policy fokus pada keputusan boleh/tidak
- [ ] Rule penting memiliki test
- [ ] Tidak ada duplikasi pengecekan role

