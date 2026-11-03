# 💊 SISTEM INFORMASI APOTEK - PROJEK KELOMPOK

Aplikasi Web Manajemen Apotek & Farmasi berbasis **Laravel 12** yang dilengkapi dengan manajemen database (MySQL & SQLite), arsitektur RESTful API, dan terhubung penuh ke **Postman** untuk pengujian menyeluruh.

---

## 👥 Informasi Pengembang & Projek
- **Nama Pengembang / Mahasiswa**: Sayed Muhammad (`sayedmuhammad27`), Muhammad Nabil Al Firdaus (`projectfall26-beep`)
- **Mata Kuliah / Tugas**: Sistem Terintegrasi Projek 2
- **Framework**: Laravel 12.x (PHP 8.2+)
- **Database**: SQLite (Default Zero-Config) / MySQL XAMPP
- **Dokumentasi API**: Postman Collection v2.1

---

## 🎯 Fitur & Entitas Utama (Sesuai Lampiran)

1. **Modul Pelanggan (`pelanggans`)**
   - Id Pelanggan (Kode Unik)
   - Nama Pelanggan
   - Alamat Domisili
   - Nomor HP
   - Tombol Simpan & Manajemen CRUD Lengkap (Tambah, Lihat, Edit, Hapus)

2. **Modul Staf Apotek (`staf_apoteks`)**
   - Id Staff (Kode Unik)
   - Nama Staf / Apoteker
   - Alamat
   - Tanggal Lahir (Date Picker)
   - Tempat Lahir
   - Nomor HP
   - Tombol Simpan & Manajemen CRUD Lengkap

3. **Modul Daftar Obat (`obats`)**
   - Kode Obat (Kode Unik)
   - Nama Obat & Sediaan
   - Stock Obat
   - Tanggal Kadaluarsa / Expired (Date Picker)
   - Tombol Simpan & Manajemen CRUD Lengkap

4. **Integrasi RESTful API & Postman**
   - Koleksi Postman siap pakai: `Apotek_API.postman_collection.json`
   - Terhubung langsung ke URL `http://127.0.0.1:8000` tanpa perlu konfigurasi variabel environment manual.

---

## 🚀 Panduan Menjalankan Project dari GitHub

Untuk dosen atau rekan yang ingin menguji project ini melalui clone repository GitHub:

### 1. Clone Repository
```bash
git clone https://github.com/sayedmuhammad27/apotek-laravel.git
cd apotek-laravel
```

### 2. Install Dependensi (Composer)
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` ke `.env`:
```bash
# Di Windows CMD/PowerShell:
copy .env.example .env

# Di Linux / macOS:
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

### 4. Menyiapkan Database (MySQL XAMPP)
1. Buka **XAMPP Control Panel** dan pastikan service **MySQL** berstatus **Running** (port 3306).
2. Jalankan migrasi dan seeder data awal:
```bash
php artisan migrate:fresh --seed
```
*(Tersedia juga file SQL mentah di `database/apotek_db.sql` jika ingin import manual lewat phpMyAdmin)*.

> **Catatan Dukungan SQLite:**  
> Jika tidak ingin menjalankan MySQL, aplikasi juga mendukung SQLite out-of-the-box:
> ```bash
> type nul > database\database.sqlite
> # Ubah DB_CONNECTION=sqlite di .env lalu jalankan migrate
> php artisan migrate:fresh --seed
> ```

### 5. Jalankan Web Server
```bash
php artisan serve
```
Buka peramban Anda dan kunjungi: **`http://127.0.0.1:8000`**

*(Di Windows, Anda juga cukup mengklik dua kali file `jalankan-aplikasi.bat`)*

---

## 📮 Panduan Pengujian REST API Lewat Postman

1. Buka aplikasi **Postman**.
2. Klik tombol **Import** di pojok kiri atas.
3. Pilih file **`Apotek_API.postman_collection.json`** yang ada di direktori root project.
4. Pastikan server Laravel sedang berjalan (`php artisan serve`).
5. Langsung jalankan setiap request pada koleksi Postman (sudah siap pakai ke `http://127.0.0.1:8000`):
   - **Pelanggan**: `GET /api/pelanggan`, `POST /api/pelanggan`, `GET /api/pelanggan/{id}`, `PUT /api/pelanggan/{id}`, `DELETE /api/pelanggan/{id}`
   - **Staf Apotek**: `GET /api/staff`, `POST /api/staff`, `GET /api/staff/{id}`, `PUT /api/staff/{id}`, `DELETE /api/staff/{id}`
   - **Daftar Obat**: `GET /api/obat`, `POST /api/obat`, `GET /api/obat/{id}`, `PUT /api/obat/{id}`, `DELETE /api/obat/{id}`

---

## 📋 Daftar Endpoint RESTful API

| Method | Endpoint | Fungsi | Payload Contoh | Respon Sukses |
|---|---|---|---|---|
| `GET` | `/api/pelanggan` | Mendapatkan semua pelanggan | - | `200 OK` |
| `POST` | `/api/pelanggan` | Menambahkan pelanggan baru | `{"id_pelanggan":"PLG-010","nama":"Ali","alamat":"Banda Aceh","no_hp":"0812345"}` | `201 Created` |
| `GET` | `/api/pelanggan/{id}` | Detail pelanggan tertentu | - | `200 OK` |
| `PUT` | `/api/pelanggan/{id}` | Perbarui data pelanggan | `{"nama":"Ali Imran","alamat":"Aceh Besar"}` | `200 OK` |
| `DELETE`| `/api/pelanggan/{id}` | Hapus data pelanggan | - | `200 OK` |
| `GET` | `/api/staff` | Mendapatkan seluruh staf | - | `200 OK` |
| `POST` | `/api/staff` | Menambahkan staf apotek | `{"id_staff":"STF-010","nama":"Sarah","alamat":"Jl. A","tanggal_lahir":"1999-01-01","tempat_lahir":"Banda Aceh","no_hp":"08123"}` | `201 Created` |
| `GET` | `/api/staff/{id}` | Detail staf tertentu | - | `200 OK` |
| `PUT` | `/api/staff/{id}` | Perbarui data staf | `{"nama":"Sarah S.Farm"}` | `200 OK` |
| `DELETE`| `/api/staff/{id}` | Hapus data staf | - | `200 OK` |
| `GET` | `/api/obat` | Mendapatkan seluruh obat | - | `200 OK` |
| `POST` | `/api/obat` | Menambahkan obat baru | `{"kode_obat":"OBT-010","nama_obat":"Paracetamol","stock_obat":100,"tanggal_kadaluarsa":"2028-12-31"}` | `201 Created` |
| `GET` | `/api/obat/{id}` | Detail obat tertentu | - | `200 OK` |
| `PUT` | `/api/obat/{id}` | Perbarui data obat | `{"stock_obat":120}` | `200 OK` |
| `DELETE`| `/api/obat/{id}` | Hapus data obat | - | `200 OK` |

---

## 🗄️ Skema Database

```
+------------------------------------+       +------------------------------------+
|            pelanggans              |       |            staf_apoteks            |
+------------------------------------+       +------------------------------------+
| id (PK, BigInt, AutoIncrement)     |       | id (PK, BigInt, AutoIncrement)     |
| id_pelanggan (VARCHAR 50, UNIQUE)  |       | id_staff (VARCHAR 50, UNIQUE)      |
| nama (VARCHAR 150)                 |       | nama (VARCHAR 150)                 |
| alamat (TEXT)                      |       | alamat (TEXT)                      |
| no_hp (VARCHAR 25)                 |       | tanggal_lahir (DATE)               |
| created_at / updated_at            |       | tempat_lahir (VARCHAR 100)         |
+------------------------------------+       | no_hp (VARCHAR 25)                 |
                                             | created_at / updated_at            |
+------------------------------------+       +------------------------------------+
|               obats                |
+------------------------------------+
| id (PK, BigInt, AutoIncrement)     |
| kode_obat (VARCHAR 50, UNIQUE)     |
| nama_obat (VARCHAR 150)            |
| stock_obat (INT)                   |
| tanggal_kadaluarsa (DATE)          |
| created_at / updated_at            |
+------------------------------------+
```

---

## 🧪 Pengujian Otomatis
Jalankan script verifikasi API terintegrasi:
```bash
php test_api.php
```
Hasil verifikasi menunjukkan seluruh modul (Dashboard, Pelanggan, Staf Apotek, Daftar Obat, Postman Collection) berstatus `200 OK` dan `201 Created` (Tingkat keberhasilan 100%).
