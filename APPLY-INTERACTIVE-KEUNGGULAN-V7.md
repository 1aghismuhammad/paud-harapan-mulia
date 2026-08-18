# APPLY — Interactive Keunggulan V7

Extract ZIP ke root project.

Overwrite:

```text
resources/views/public/school/paud.blade.php
resources/views/public/school/tk.blade.php
```

Kemudian:

```cmd
php artisan optimize:clear
```

Pastikan:

```cmd
php artisan serve
```

dan:

```cmd
npm run dev
```

Hard refresh:

```text
Ctrl + Shift + R
```

## QA

Desktop:
1. buka `/sekolah/paud` atau `/sekolah/tk`;
2. klik setiap menu Keunggulan;
3. content kanan harus berubah;
4. active menu harus jelas.

Mobile:
1. viewport `390 × 844` atau `479 × 910`;
2. klik menu;
3. isi muncul di bawah menu;
4. klik menu lain -> menu sebelumnya menutup;
5. klik menu aktif -> panel dapat ditutup.
