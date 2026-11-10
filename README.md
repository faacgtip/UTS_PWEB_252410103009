# UTS Pemrograman Web 2026 - Dollie Shop

**Nama:** Ulfatun Ni'mah
**NIM:** 252410103009
**Kelas:** Pemrograman Berbasis Website Kelas F

## Tentang Website
Dollie Shop adalah website pengelolaan toko boneka yang dibuat dengan Laravel
menggunakan arsitektur MVC dan Blade templating. Alur aplikasinya:
login → dashboard → pengelolaan → profile.

## Fitur
- Login dengan username yang diteruskan ke halaman Dashboard dan Profile
- Dashboard berisi ringkasan toko, aktivitas terbaru, dan pintasan
- Halaman Pengelolaan menampilkan data koleksi boneka dari Controller memakai `@foreach`
- Layout utama, Navbar, dan Footer memakai Blade Layout dan Blade Component

## Teknologi
- Laravel (MVC), Blade Templating
- PHP 8.4
- (isi CSS yang kamu pakai, misalnya Tailwind atau Bootstrap)

## Struktur Utama
- `routes/web.php` : routing
- `app/Http/Controllers/PageController.php` : mengatur halaman dan data
- `resources/views/layouts/app.blade.php` : layout utama
- `resources/views/` : login, dashboard, pengelolaan, profile
- `resources/views/components/` : navbar, footer


### Login
<img width="932" height="434" alt="image" src="https://github.com/user-attachments/assets/834bbff0-076f-4dda-8e52-35d51b55e07d" />

### Dashboard
<img width="938" height="435" alt="image" src="https://github.com/user-attachments/assets/f149aacc-25e9-44e9-bf3e-0d7432d569dc" />

### Pengelolaan
<img width="945" height="432" alt="image" src="https://github.com/user-attachments/assets/5a013feb-d00f-41d8-8561-0d97a03b1027" />

### Profile



## Cara Menjalankan
Butuh PHP 8.4 atau lebih baru.

    php artisan key:generate
    php artisan serve

Lalu buka http://127.0.0.1:8000
