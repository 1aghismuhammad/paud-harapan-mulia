> Project activation: WAJIB dibaca untuk setiap perubahan kode, review kode, bug fix, feature, refactor, migration, config, dependency, atau perubahan frontend/backend.

> Precedence: aturan ini berlaku untuk kode baru dan perubahan dalam scope task. Jangan refactor kode existing yang tidak terkait hanya agar seluruh project langsung mengikuti aturan ini.

# Aturan Perubahan Kode dan Change Control

## Tujuan

Dokumen ini mengatur perubahan kode agar:

- hanya bagian yang diminta yang berubah;
- perubahan seminimal mungkin;
- gaya penulisan mengikuti kode existing;
- dependency dan dampak perubahan selalu di-cross-check;
- seluruh perubahan tercatat dan dapat ditelusuri;
- perubahan mudah direview, diuji, dan di-rollback.

Prinsip utama:

```text
Pahami → Cross-check → Ubah Minimum → Verifikasi → Catat
```

---

# 1. Aturan Utama untuk AI

AI **HARUS**:

1. Mengubah hanya bagian yang diminta user.
2. Membaca kode existing sebelum menulis atau mengubah kode.
3. Mempertahankan struktur, naming, formatting, architecture, dan behavior yang tidak terkait dengan task.
4. Menggunakan pola implementasi yang sudah dipakai project selama masih sesuai.
5. Melakukan perubahan sekecil mungkin untuk menyelesaikan kebutuhan.
6. Melakukan cross-check dependency sebelum mengubah class, method, field, route, table, relationship, migration, config, atau package.
7. Menjelaskan jika task memang membutuhkan perubahan tambahan di file atau layer lain.
8. Memastikan tidak ada perubahan tersembunyi di luar scope.
9. Mencatat semua file dan bagian yang berubah.
10. Mencatat juga bagian penting yang telah diperiksa tetapi tidak berubah.
11. Menjaga backward compatibility kecuali user meminta breaking change.
12. Mengikuti style kode existing walaupun AI memiliki preferensi style yang berbeda.

AI **DILARANG**:

1. Refactor tambahan tanpa perintah.
2. Rename variable, method, class, route, table, column, atau file tanpa kebutuhan langsung.
3. Format ulang seluruh file hanya karena style AI berbeda.
4. Mengganti architecture existing tanpa instruksi.
5. Menambah package/dependency jika solusi existing sudah cukup.
6. Menghapus kode yang dianggap tidak terpakai tanpa verifikasi.
7. Mengubah behavior existing hanya karena dianggap lebih baik.
8. Melakukan cleanup massal bersamaan dengan bug fix.
9. Mengubah migration lama yang sudah pernah dipakai tanpa alasan dan instruksi jelas.
10. Mengubah database schema tanpa mencatat dampak dan rollback.
11. Mengarang struktur project yang belum diberikan.
12. Menambahkan fitur “sekalian” yang tidak diminta.

---

# 2. Aturan Utama untuk Developer

Developer **HARUS**:

1. Menentukan scope perubahan sebelum mulai coding.
2. Memastikan perubahan sesuai requirement/task.
3. Memisahkan bug fix, feature, refactor, dan cleanup.
4. Mengikuti convention project existing.
5. Melakukan code review terhadap dependency yang terpengaruh.
6. Memastikan database dan migration aman.
7. Menjalankan test yang relevan.
8. Mencatat perubahan pada Change Log.
9. Memastikan rollback memungkinkan untuk perubahan berisiko.
10. Tidak mencampurkan perubahan unrelated dalam satu task/commit jika dapat dipisahkan.

---

# 3. Prinsip Perubahan Minimum

Perubahan harus mengikuti aturan:

```text
Jika 3 baris cukup, jangan mengubah 30 baris.
Jika 1 file cukup, jangan mengubah 5 file.
Jika architecture existing cukup, jangan menambahkan pattern baru.
```

Contoh:

User meminta:

```text
Ubah title halaman menjadi "Form Evaluasi L34".
```

Maka perubahan hanya pada bagian yang mengontrol title.

Jangan sekaligus:

```text
- merapikan HTML;
- mengganti Bootstrap class;
- rename variable;
- mengubah route;
- memindahkan file;
- refactor Controller;
- mengubah Service.
```

kecuali perubahan tambahan memang diperlukan agar task berfungsi.

---

# 4. Wajib Cross-check Sebelum Mengubah Kode

## Jika Mengubah Controller

Periksa:

```text
Route
↓
Controller
↓
Form Request
↓
Service / Action
↓
Model
↓
View / API Resource
↓
Tests
```

## Jika Mengubah Model

Periksa:

```text
Migration
↓
Model
↓
Fillable / Guarded
↓
Cast
↓
Relationship
↓
Scope
↓
Service
↓
Factory / Seeder
↓
Tests
```

## Jika Mengubah Database

Periksa:

```text
Migration
↓
Schema Existing
↓
Model
↓
Fillable / Cast
↓
Foreign Key
↓
Relationship
↓
Validation
↓
Service / Action
↓
Query
↓
View / API
↓
Factory / Seeder
↓
Tests
```

## Jika Mengubah Route

Periksa:

```text
routes/web.php
routes/api.php
Controller
Blade
redirect()
route()
JavaScript
Middleware
Policy / Permission
Navigation
Tests
```

---

# 5. Aturan Penyesuaian Gaya Kode Existing

AI dan developer harus mengikuti gaya existing, termasuk:

```text
- indentation;
- spacing;
- bracket style;
- naming variable;
- naming method;
- naming class;
- import style;
- constructor style;
- dependency injection style;
- return type style;
- PHPDoc style;
- array syntax;
- query style;
- route style;
- response style;
- folder structure;
- Service pattern;
- Action pattern;
- Form Request pattern;
- exception handling.
```

Kode baru harus terlihat konsisten dengan kode existing.

Contoh:

Jika existing:

```php
public function store(Request $request)
{
    //
}
```

jangan tiba-tiba mengubah menjadi:

```php
public function store(
    Request $request,
): RedirectResponse {
    //
}
```

kecuali ada task khusus untuk standardisasi style.

---

# 6. Jangan Melakukan Refactor Tersembunyi

Bug fix harus fokus pada bug fix.

Tidak diperbolehkan:

```text
Bug fix + rename banyak variable
Bug fix + pindah folder
Bug fix + ubah architecture
Bug fix + format seluruh file
Bug fix + upgrade package
Bug fix + optimasi unrelated
```

Jika refactor diperlukan, pisahkan dan catat sebagai perubahan tersendiri.

---

# 7. Aturan Perubahan Database

Setiap perubahan database wajib memeriksa:

```text
- table existing;
- column existing;
- tipe data;
- nullable;
- default value;
- unique constraint;
- index;
- foreign key;
- cascade/restrict rule;
- existing data;
- model fillable;
- casts;
- relationship;
- validation;
- query;
- factory;
- seeder;
- tests.
```

Untuk project yang migration-nya sudah pernah digunakan di environment lain, default-nya:

```text
JANGAN edit migration lama.
BUAT migration baru.
```

Contoh:

```php
Schema::table('trainings', function (Blueprint $table) {
    $table->string('status')->default('draft');
});
```

Rollback harus tersedia bila memungkinkan:

```php
Schema::table('trainings', function (Blueprint $table) {
    $table->dropColumn('status');
});
```

---

# 8. Aturan Foreign Key

Sebelum menghapus atau mengubah parent record, periksa dependency.

Contoh:

```text
trainings.id
    ↓
monitoring_results.training_id
```

Jangan langsung mengubah menjadi:

```php
$training->delete();
```

tanpa memeriksa:

```text
- cascade delete;
- restrict;
- nullable foreign key;
- soft delete;
- child records;
- business rule;
- audit requirement.
```

Solusi harus mengikuti kebutuhan bisnis, bukan sekadar menghilangkan error SQL.

---

# 9. Aturan Perubahan Business Logic

Sebelum mengubah kondisi atau state, periksa seluruh kemungkinan state.

Contoh:

```text
draft
active
completed
cancelled
```

Jika mengubah behavior `active`, pastikan perubahan tidak merusak state lain.

Business logic harus tetap berada pada layer existing, misalnya:

```text
Controller
↓
Service
↓
Model
```

Jangan memindahkan logic ke Controller hanya karena perubahan terlihat kecil.

---

# 10. Aturan Perubahan Form Request

Jika terjadi:

```text
field baru
field dihapus
field rename
tipe berubah
nullable berubah
rule berubah
```

wajib cross-check:

```text
Blade/Input
Form Request
DTO
Service / Action
Model
Migration
Resource
Tests
```

Jika project menggunakan Form Request, gunakan:

```php
$request->validated()
```

bukan:

```php
$request->all()
```

---

# 11. Aturan Perubahan Model

Jika Model berubah, periksa:

```text
$fillable
$guarded
$casts
$hidden
$with
relationship
scope
accessor
mutator
observer
factory
seeder
```

Jangan menambahkan field ke `$fillable` tanpa memastikan field tersebut memang aman untuk mass assignment.

---

# 12. Aturan Package / Dependency

AI tidak boleh menambahkan package Composer/NPM tanpa kebutuhan.

Jika package baru memang diperlukan, catat:

```text
Package:
vendor/package

Version:
x.x.x

Alasan:
...

Command:
composer require vendor/package
```

Cross-check:

```text
composer.json
composer.lock
package.json
package-lock.json
config
service provider
environment variable
deployment impact
```

---

# 13. Aturan ENV dan Config

Perubahan pada:

```text
.env
config/*
queue
cache
database
mail
filesystem
session
logging
```

harus dicatat.

Jangan memasukkan credential/secret production ke dokumentasi atau jawaban.

Contoh aman:

```env
MAIL_HOST=smtp.example.com
MAIL_PORT=587
```

---

# 14. Aturan Perubahan Blade / Frontend

Jika task hanya terkait tampilan, jangan mengubah backend kecuali benar-benar diperlukan.

Cross-check:

```text
Blade
Layout
Component
CSS
JavaScript
Controller data
Route
```

Pertahankan:

```text
class naming
layout structure
Blade directive style
component pattern
JavaScript pattern
```

sesuai project existing.

---

# 15. Wajib Change Log

Setiap perubahan kode harus menghasilkan Change Log.

Format minimum:

```markdown
## Change Log

### File yang Diubah

1. `app/Services/TrainingService.php`
   - Mengubah ...
   - Alasan ...

2. `app/Http/Requests/UpdateTrainingRequest.php`
   - Menambah ...
   - Alasan ...

### Database
Tidak ada perubahan.

### Migration
Tidak ada migration baru.

### Route
Tidak ada perubahan.

### Config / ENV
Tidak ada perubahan.

### Dependency
Tidak ada dependency baru.

### Tests
- ...

### Dampak
- ...

### Risiko
- ...

### Verifikasi
- ...
```

Jika tidak ada perubahan pada suatu bagian, tetap tulis:

```text
Tidak ada perubahan.
```

Tujuannya agar reviewer tahu bagian tersebut sudah diperiksa.

---

# 16. Format Change Log Lengkap

Untuk perubahan besar gunakan:

```markdown
# Change Log

## Ringkasan
Tujuan perubahan.

## Scope
- Modul:
- Fitur:
- Endpoint:
- Database:

## File Ditambah
- `...`

## File Diubah
- `...`

## File Dihapus
- Tidak ada.

## Database

### Table Diubah
- `...`

### Column Ditambah
- `...`

### Column Diubah
- Tidak ada.

### Column Dihapus
- Tidak ada.

### Index / Foreign Key
- Tidak ada.

## Migration
- `...`

## Model
- ...

## Form Request
- ...

## Service / Action
- ...

## Controller
- ...

## Route
- ...

## View / Frontend
- ...

## API / Resource
- ...

## Config / ENV
- ...

## Dependency
- ...

## Tests
- ...

## Risiko
- LOW / MEDIUM / HIGH
- Penjelasan ...

## Backward Compatibility
- Aman / Tidak aman.
- Penjelasan ...

## Rollback
- ...

## Catatan
- ...
```

---

# 17. Kategori Perubahan

Gunakan tag agar perubahan mudah ditelusuri:

```text
[DATABASE]
[MIGRATION]
[MODEL]
[REQUEST]
[CONTROLLER]
[SERVICE]
[ACTION]
[POLICY]
[ROUTE]
[VIEW]
[API]
[RESOURCE]
[EVENT]
[LISTENER]
[JOB]
[OBSERVER]
[CACHE]
[CONFIG]
[ENV]
[DEPENDENCY]
[TEST]
[BUGFIX]
[REFACTOR]
[SECURITY]
[PERFORMANCE]
```

Contoh:

```text
[BUGFIX][SERVICE][DATABASE]
Memperbaiki proses penghapusan training yang masih memiliki monitoring_results.
```

---

# 18. Tingkat Risiko

## LOW

```text
- typo;
- label;
- title halaman;
- styling minor.
```

## MEDIUM

```text
- validation;
- Service logic;
- query;
- authorization;
- route.
```

## HIGH

```text
- migration;
- schema database;
- foreign key;
- authentication;
- permission;
- bulk update/delete;
- dependency upgrade;
- payment.
```

Gunakan:

```text
Risk Level: LOW | MEDIUM | HIGH
```

---

# 19. Cross-check Setelah Perubahan

Setelah perubahan, periksa:

```text
1. Syntax valid.
2. Import namespace benar.
3. Tidak ada variable undefined.
4. Tidak ada method yang hilang.
5. Route masih valid.
6. Validation sesuai.
7. Relationship benar.
8. Database schema sesuai.
9. Tidak muncul N+1 baru.
10. Tidak ada breaking change tidak sengaja.
11. Test terkait tetap lulus.
12. Perubahan tetap di dalam scope.
13. Tidak ada package baru tanpa catatan.
14. Tidak ada secret/credential masuk source code.
```

---

# 20. Command Verifikasi Laravel

Gunakan hanya jika relevan:

```bash
php artisan route:list
```

```bash
php artisan migrate:status
```

```bash
php artisan test
```

```bash
php artisan optimize:clear
```

```bash
php artisan config:clear
```

```bash
php artisan cache:clear
```

---

# 21. Format Jawaban AI Setelah Update Kode

Setelah memberikan perubahan, AI harus menyertakan:

```markdown
## Perubahan yang Dilakukan

### 1. `path/to/file.php`
- Mengubah ...
- Alasan ...
- Tidak mengubah logic lain.

## Database
Tidak ada perubahan.

## Migration
Tidak ada migration baru.

## Route
Tidak ada perubahan.

## Config / ENV
Tidak ada perubahan.

## Dependency
Tidak ada package baru.

## Tests
- ...

## Dampak
- ...

## Yang Tidak Diubah
- ...
- ...

## Risiko
Risk Level: LOW

## Verifikasi
- Syntax diperiksa.
- Dependency terkait diperiksa.
- Scope perubahan tetap terbatas.
```

---

# 22. Jika Konteks File Tidak Lengkap

Jika AI hanya menerima sebagian kode:

1. Jangan mengasumsikan isi file lain.
2. Jangan mengarang route, table, relationship, atau architecture.
3. Sebutkan dependency yang harus di-cross-check.
4. Gunakan style dari kode yang tersedia.
5. Batasi perubahan pada konteks yang dapat diverifikasi.
6. Jika perubahan lintas file memang diperlukan, jelaskan file mana yang berkaitan.

Contoh:

```text
Perlu cross-check:
- app/Models/Training.php
- app/Services/TrainingService.php
- migration tabel trainings
- migration tabel monitoring_results
```

---

# 23. Larangan "Sekalian"

AI dilarang melakukan perubahan dengan alasan:

```text
"Sekalian saya rapikan."
"Sekalian saya refactor."
"Sekalian saya rename."
"Sekalian saya upgrade."
"Sekalian saya optimasi."
```

tanpa instruksi user.

Perubahan tambahan hanya boleh dilakukan jika merupakan dependency langsung dari task dan harus dicatat.

---

# 24. Konsistensi Architecture Existing

Jika project existing:

```text
Controller
↓
Service
↓
Model
```

ikuti pola tersebut.

Jika project existing:

```text
Controller
↓
Action
↓
Repository
```

ikuti pola tersebut.

Jangan menambahkan pattern baru secara sepihak.

Perubahan architecture hanya dilakukan jika:

```text
1. user meminta;
2. sedang ada task refactor architecture;
3. dampak seluruh modul sudah dianalisis;
4. migration path sudah jelas.
```

---

# 25. Checklist AI Sebelum Memberikan Kode

- [ ] Instruksi user sudah dipahami.
- [ ] Scope perubahan sudah ditentukan.
- [ ] Hanya bagian yang diminta yang diubah.
- [ ] Style existing sudah diperiksa.
- [ ] Naming tidak diubah tanpa alasan.
- [ ] Formatting unrelated tidak disentuh.
- [ ] Dependency sudah di-cross-check.
- [ ] Dampak database sudah diperiksa.
- [ ] Migration sudah diperiksa jika relevan.
- [ ] Foreign key sudah diperiksa jika relevan.
- [ ] Relationship sudah diperiksa jika relevan.
- [ ] Validation sudah diperiksa jika relevan.
- [ ] Route sudah diperiksa jika relevan.
- [ ] Config/ENV sudah diperiksa jika relevan.
- [ ] Test sudah diperiksa jika relevan.
- [ ] Tidak ada package baru tanpa alasan.
- [ ] Semua perubahan sudah dicatat.
- [ ] Bagian penting yang tidak berubah sudah dicatat.
- [ ] Tidak ada hidden refactor.

---

# 26. Checklist Developer Saat Code Review

- [ ] Perubahan sesuai task.
- [ ] Tidak ada perubahan di luar scope.
- [ ] Tidak ada hidden refactor.
- [ ] Naming konsisten.
- [ ] Formatting konsisten.
- [ ] Architecture konsisten.
- [ ] Business logic berada di layer yang benar.
- [ ] Validation benar.
- [ ] Authorization benar.
- [ ] Query aman.
- [ ] Tidak muncul N+1.
- [ ] Transaction digunakan jika diperlukan.
- [ ] Foreign key aman.
- [ ] Migration reversible.
- [ ] Backward compatibility diperiksa.
- [ ] Tests tersedia/diperbarui.
- [ ] Change Log lengkap.
- [ ] Tidak ada secret/credential.
- [ ] Tidak ada dependency yang tidak diperlukan.

---

# 27. Prinsip Akhir

Setiap perubahan harus:

```text
Minimal
Predictable
Consistent
Traceable
Reversible
Testable
```

Urutan kerja:

```text
1. Baca kode existing.
2. Pahami instruksi.
3. Tentukan scope.
4. Cross-check dependency.
5. Ubah bagian minimum.
6. Ikuti style existing.
7. Verifikasi.
8. Jalankan test relevan.
9. Catat semua perubahan.
10. Pastikan tidak ada perubahan tersembunyi.
```

Aturan paling penting:

> **Jangan mengubah apa yang tidak diminta. Jangan berasumsi. Ikuti kode existing. Cross-check sebelum mengubah. Catat setiap perubahan.**

