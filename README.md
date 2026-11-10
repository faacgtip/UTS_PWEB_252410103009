# 🧸 Dollie Shop - UTS Pemrograman Web 2026

**Nama:** Ulfatun Ni'mah
**NIM:** 252410103009
**Kelas:** Pemrograman Berbasis Website Kelas F

## 📌 Tentang Website
Dollie Shop adalah website pengelolaan toko boneka yang dibuat menggunakan
**Laravel** dengan arsitektur **MVC** dan **Blade templating**. Aplikasi ini
mensimulasikan alur request-response: pengguna login dengan username, lalu
username tersebut diteruskan ke halaman Dashboard dan Profile, sedangkan data
koleksi boneka ditampilkan secara dinamis di halaman Pengelolaan.

Aplikasi dibuat dengan Laravel murni, tanpa starter kit, tanpa template jadi,
dan tanpa database.

## ✨ Fitur
- **Login**: form username sebagai simulasi login.
- **Dashboard**: ringkasan toko (total boneka, pesanan baru, pelanggan setia,
  pendapatan), aktivitas terbaru, dan pintasan menu.
- **Pengelolaan**: daftar koleksi boneka yang datanya dikirim dari Controller
  dan ditampilkan dengan `@foreach`.
- **Profile**: menampilkan data pengguna, termasuk username dari proses login.
- **Navbar dan Footer** dibuat sebagai Blade Component dan dipakai di semua halaman.

## 🔄 Alur Data
1. Pengguna mengisi username di halaman Login.
2. Username dikirim sebagai request parameter ke Controller.
3. Controller meneruskan username ke view Dashboard dan Profile.
4. Data koleksi boneka disimpan sebagai array di Controller, lalu dikirim ke
   view Pengelolaan dan ditampilkan dengan perulangan `@foreach`.

## 🛠️ Teknologi
- Laravel (MVC)
- Blade Templating (`@extends`, `@section`, `@yield`, `@include`, x-component)
- PHP 8.4
- (isi CSS yang kamu pakai: Tailwind / Bootstrap / CSS biasa)

## 📁 Struktur Utama
| File | Fungsi |
|------|--------|
| `routes/web.php` | Mendefinisikan route aplikasi |
| `app/Http/Controllers/PageController.php` | Mengatur halaman dan data yang dikirim ke view |
| `resources/views/layouts/app.blade.php` | Layout utama |
| `resources/views/login.blade.php` | Halaman Login |
| `resources/views/dashboard.blade.php` | Halaman Dashboard |
| `resources/views/pengelolaan.blade.php` | Halaman Pengelolaan |
| `resources/views/profile.blade.php` | Halaman Profile |
| `resources/views/components/navbar.blade.php` | Komponen Navbar |
| `resources/views/components/footer.blade.php` | Komponen Footer |

### Login
<img width="930" height="435" alt="image" src="https://github.com/user-attachments/assets/0547f98c-eca3-4a27-8bd0-288c9f340de4" />


### Dashboard
<img width="942" height="436" alt="image" src="https://github.com/user-attachments/assets/db2091fd-8d78-43e1-b893-5f7dadb6440b" />


### Pengelolaan
<img width="943" height="434" alt="image" src="https://github.com/user-attachments/assets/7f2a9112-7e39-4763-9f76-ea7c88402a37" />


### Profile
<img width="940" height="435" alt="image" src="https://github.com/user-attachments/assets/bfa81848-a14e-48db-a9f7-f425c8c1be24" />


## 🎥 Video Demo
(tempel link YouTube setelah video diupload)

## 🚀 Cara Menjalankan
Pastikan PHP 8.4 atau lebih baru dan Composer sudah terinstal.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Di Windows CMD, ganti `cp` dengan `copy`. Lalu buka http://127.0.0.1:8000 di browser.
