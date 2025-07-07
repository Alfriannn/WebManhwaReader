<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📚 ManhwaReader - Laravel Web Manhwa Reader

Selamat datang di **ManhwaReader**!  
Aplikasi web untuk membaca manhwa (komik Korea) berbasis Laravel, lengkap dengan fitur admin CRUD, upload PDF/gambar, multi-genre, dan sistem user login.

---

## ✨ Fitur Utama

- **Landing page** daftar manhwa (hanya untuk user login)
- **Detail manhwa** & daftar chapter
- **Baca chapter** (gambar per halaman & PDF)
- **Filter & multi-genre** per manhwa
- **Search manhwa** (judul/author)
- **Admin panel**: CRUD Manhwa, Genre, Chapter, Page
- **Upload cover, PDF, dan gambar halaman**
- **Role admin & user**
- **Autentikasi (login/register)**
- **Responsive & modern UI (TailwindCSS)**

---

## 🚀 Setup & Instalasi

### 1. **Clone Project**
```sh
git clone https://github.com/Alfriannn/WebManhwaReader.git
cd WebManhwaReader
```

### 2. **Install Dependency**
```sh
composer install
npm install
```

### 3. **Copy & Edit .env**
```sh
cp .env.example .env
```
Edit `.env` sesuai database lokal kamu:
```
DB_DATABASE=baca_buku_manwha
DB_USERNAME=root
DB_PASSWORD=130407
```

### 4. **Generate Key**
```sh
php artisan key:generate
```

### 5. **Migrasi & Seeder**
```sh
php artisan migrate
php artisan db:seed
```
Seeder akan otomatis menjadikan user dengan email **adminweb@gmail.com** sebagai admin.

### 6. **Buat Storage Link**
```sh
php artisan storage:link
```

### 7. **Build Asset Frontend**
```sh
npm run dev
```
Biarkan terminal ini berjalan selama development.

### 8. **Jalankan Server**
```sh
php artisan serve
```
Akses di browser: [http://localhost:8000](http://localhost:8000)

---

## 👤 Akun Admin

| Email                | Password   |
|----------------------|------------|
| adminweb@gmail.com   | admin123   |

> **Login sebagai admin untuk mengakses panel admin di `/admin`**

---

## 🛠️ Struktur Fitur

- **User (Landing Page)**
  - Hanya bisa diakses setelah login/register
  - Daftar manhwa, search, filter genre
  - Detail manhwa, baca chapter (gambar/PDF)
- **Admin**
  - CRUD Manhwa, Genre, Chapter, Page
  - Upload cover, PDF, gambar halaman
  - Statistik konten

---

## 📝 Cara Menambah Data

### **1. Login Admin**
- Masuk ke `/login` dengan akun admin di atas.

### **2. Kelola Data**
- **Manhwa:** Tambah/edit/hapus, upload cover, pilih multi-genre.
- **Genre:** Tambah/edit/hapus genre.
- **Chapter:** Tambah/edit/hapus, upload PDF (max 200MB), input nomor & judul.
- **Page:** Tambah/edit/hapus gambar halaman per chapter.

---

## 🔒 Proteksi Akses

- **Landing page & fitur user** hanya bisa diakses jika sudah login.
- **Panel admin** hanya bisa diakses user dengan role admin.

---

## 💡 Tips Penggunaan

- Untuk upload PDF besar, pastikan `php.ini` sudah di-set:
  ```
  upload_max_filesize = 200M
  post_max_size = 200M
  max_execution_time = 300
  ```
- Jalankan `npm run dev` agar style Tailwind aktif.
- Untuk deploy/hosting, gunakan `npm run build` dan sesuaikan `.env` produksi.

---

## 📂 Struktur Folder Penting

- `app/Http/Controllers/Admin/` : Controller admin panel
- `app/Http/Controllers/` : Controller user
- `resources/views/` : Blade view (user & admin)
- `storage/app/public/` : File upload (cover, pdf, page)

---

## 🤝 Kontribusi

Pull request & issue sangat diterima!

---

## 📄 Lisensi

MIT License

---

