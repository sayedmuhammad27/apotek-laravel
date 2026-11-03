# LAPORAN LENGKAP PROJEK KELOMPOK
## PENGEMBANGAN SISTEM INFORMASI APOTEK BERBASIS LARAVEL 12 TERINTEGRASI POSTMAN API DAN GITHUB

* **Mata Kuliah / Tugas**: Pemrograman Web & RESTful API (Projek Kelompok)
* **Tanggal Presentasi**: Kamis, 6 November 2026
* **Pengembang / Mahasiswa**: Sayed Muhammad (`sayedmuhammad27`) & Tim
* **Teknologi**: Laravel 12, PHP 8.2, SQLite & MySQL, Postman API, Git & GitHub

---

## DAFTAR ISI
1. [BAB I: PENDAHULUAN & DASAR TEORI](#bab-i-pendahuluan--dasar-teori)
   - 1.1 Latar Belakang
   - 1.2 Rumusan Masalah & Tujuan
   - 1.3 Dasar Teori (Laravel MVC, RESTful API, Postman, MySQL/SQLite, Git & GitHub)
2. [BAB II: PERANCANGAN & TAHAPAN PEMBUATAN APLIKASI](#bab-ii-perancangan--tahapan-pembuatan-aplikasi)
   - 2.1 Analisis Kebutuhan Sistem
   - 2.2 Perancangan Basis Data (ERD & Skema Tabel)
   - 2.3 Perancangan Antarmuka Pengguna (UI/UX)
   - 2.4 Tahapan Implementasi Perangkat Lunak
   - 2.5 Konfigurasi dan Koneksi Git ke Akun GitHub
3. [BAB III: ANALISA HASIL & PENGUJIAN SISTEM](#bab-iii-analisa-hasil--pengujian-sistem)
   - 3.1 Hasil Implementasi Aplikasi Web
   - 3.2 Hasil Pengujian RESTful API dengan Postman (Blackbox Testing)
   - 3.3 Analisis Validasi dan Penanganan Error
   - 3.4 Analisis Performa dan Keandalan
4. [BAB IV: KESIMPULAN DAN SARAN](#bab-iv-kesimpulan-dan-saran)
   - 4.1 Kesimpulan
   - 4.2 Saran Pengembangan
5. [BAB V: PANDUAN PRESENTASI & MENJALANKAN PROJEK MELALUI GITHUB](#bab-v-panduan-presentasi--menjalankan-projek-melalui-github)
   - 5.1 Prosedur Menjalankan dari Clone Repository
   - 5.2 Skenario Alur Presentasi
6. [DAFTAR PUSTAKA](#daftar-pustaka)

---

## BAB I: PENDAHULUAN & DASAR TEORI

### 1.1 Latar Belakang
Pengelolaan data operasional apotek seperti pencatatan pelanggan, staf apoteker, dan inventaris obat-obatan sering kali menghadapi kendala ketika masih dilakukan secara konvensional atau menggunakan formulir terisolasi. Kesalahan pencatatan kode obat, ketidakakuratan pemantauan tanggal kadaluarsa (*expiry date*), dan sulitnya integrasi dengan layanan pihak ketiga merupakan tantangan nyata dalam manajemen logistik kesehatan modern.

Untuk mengatasi permasalahan tersebut, dibutuhkan aplikasi berbasis web yang kokoh (*robust*) dengan pemisahan tanggung jawab yang jelas antara penyajian data (*view*), logika bisnis (*controller*), dan penyimpanan data (*model*). Lebih lanjut, di era arsitektur modern, sebuah sistem dituntut menyediakan antarmuka pemrograman aplikasi berbasis layanan web (**RESTful API**). Dengan API, data apotek dapat dikonsumsi dan diuji secara independen menggunakan perangkat lunak industri seperti **Postman**, serta dikelola dalam repositori kode kolaboratif berbasis **Git dan GitHub** guna memastikan transparansi versi, kemudahan deployment, dan kehandalan eksekusi saat presentasi pengujian.

### 1.2 Rumusan Masalah & Tujuan Projek
Berdasarkan spesifikasi tugas yang diberikan:
1. Bagaimana merancang dan membangun sistem informasi apotek dengan 3 entitas utama (Pelanggan, Staf Apotek, dan Daftar Obat) menggunakan framework Laravel?
2. Bagaimana menyediakan dua varian desain antarmuka, yaitu:
   - Format minimalis formulir sesuai lembar spesifikasi lampiran (PDF).
   - Format modern visual berbasis referensi desain (*vibrant modern card layout*).
3. Bagaimana mengonfigurasi basis data yang fleksibel (MySQL XAMPP dan SQLite) dengan skema relasi dan seeder otomatis?
4. Bagaimana mengimplementasikan arsitektur RESTful API lengkap (CRUD) yang terhubung dan dapat diuji penuh di Postman?
5. Bagaimana mengoneksikan seluruh kode program ke repositori GitHub akun `sayedmuhammad27` sehingga siap di-clone dan dipresentasikan pada Kamis, 6 November 2026?

### 1.3 Dasar Teori

#### A. Framework Laravel & Arsitektur MVC
Laravel adalah kerangka kerja aplikasi web PHP dengan sintaks ekspresif dan elegan. Laravel mengadopsi pola arsitektur **MVC (Model-View-Controller)**:
- **Model**: Merepresentasikan struktur data dan aturan bisnis melalui *Eloquent ORM*. Contoh: `Pelanggan.php`, `StafApotek.php`, `Obat.php`.
- **View**: Komponen penyaji antarmuka kepada pengguna menggunakan mesin templat *Blade*. Contoh: `dashboard.blade.php`, `app.blade.php`.
- **Controller**: Penghubung antara input permintaan HTTP, manipulasi model data, dan pemilihan respon tampilan/JSON.

#### B. RESTful API (Representational State Transfer)
REST adalah standar gaya arsitektur komunikasi layanan web berbasis protokol HTTP tanpa status (*stateless*). Prinsip REST menggunakan kata kerja standar HTTP:
- `GET`: Mengambil data atau kumpulan data.
- `POST`: Membuat entitas data baru.
- `PUT` / `PATCH`: Memperbarui data yang telah ada.
- `DELETE`: Menghapus data dari penyimpanan.
Format pertukaran data standar yang digunakan adalah **JSON (JavaScript Object Notation)** karena sifatnya yang ringan, berstruktur hierarkis, dan didukung secara universal oleh seluruh bahasa pemrograman modern.

#### C. HTTP Status Codes
Pengujian API mengacu pada standar kode status HTTP:
- `200 OK`: Permintaan berhasil dan respon data disertakan.
- `201 Created`: Entitas baru berhasil dibuat di database.
- `400 Bad Request`: Format permintaan tidak valid.
- `404 Not Found`: Sumber daya (ID/Kode) yang diminta tidak ditemukan di database.
- `422 Unprocessable Content`: Validasi data masukan gagal (misal kolom wajib yang dikosongkan).
- `500 Internal Server Error`: Terjadi kesalahan pada level server logika.

#### D. Postman API Platform
Postman adalah platform pengujian API yang digunakan oleh pengembang perangkat lunak untuk mendesain, menguji, mendokumentasikan, dan memantau API. Fitur *Postman Collection* (v2.1) memungkinkan pengelompokan request, penulisan uji otomatis (*assertions*), dan penggunaan variabel *Environment* seperti `{{base_url}}` untuk beralih antara lingkungan lokal dan produksi dengan mulus.

#### E. Basis Data Relasional, MySQL, dan SQLite
- **MySQL**: Sistem manajemen basis data relasional (RDBMS) standar industri berbasis SQL, biasanya dijalankan melalui paket server XAMPP.
- **SQLite**: RDBMS tanpa server (*serverless*) berbasis berkas tunggal yang sangat portabel, mandiri, dan tidak memerlukan konfigurasi port/jaringan tambahan. Sangat ideal untuk eksekusi langsung (*zero-config*) saat demonstrasi pengujian dari repositori GitHub.

#### F. Git & GitHub
- **Git**: Sistem kontrol versi terdistribusi untuk melacak perubahan berkas kode sumber.
- **GitHub**: Platform *cloud hosting* repositori Git untuk kolaborasi, peninjauan kode, dan pencadangan terpusat.

---

## BAB II: PERANCANGAN & TAHAPAN PEMBUATAN APLIKASI

### 2.1 Analisis Kebutuhan Sistem & Entitas Data
Berdasarkan dokumen lampiran tugas, sistem wajib memiliki 3 modul data:

1. **Entitas Pelanggan (`pelanggans`)**:
   - `id_pelanggan` (String, unik, maks 50 karakter) -> Kode unik pelanggan.
   - `nama` (String, maks 150 karakter) -> Nama lengkap pelanggan.
   - `alamat` (Teks) -> Alamat tempat tinggal.
   - `no_hp` (String, maks 25 karakter) -> Nomor handphone/kontak.

2. **Entitas Staf Apotek (`staf_apoteks`)**:
   - `id_staff` (String, unik, maks 50 karakter) -> Kode pengenal staf/apoteker.
   - `nama` (String, maks 150 karakter) -> Nama staf beserta gelar.
   - `alamat` (Teks) -> Alamat staf.
   - `tanggal_lahir` (Date) -> Tanggal lahir staf (input kalender).
   - `tempat_lahir` (String, maks 100 karakter) -> Kota kelahiran.
   - `no_hp` (String, maks 25 karakter) -> Nomor kontak handphone.

3. **Entitas Daftar Obat (`obats`)**:
   - `kode_obat` (String, unik, maks 50 karakter) -> Kode registrasi obat.
   - `nama_obat` (String, maks 150 karakter) -> Nama obat dan bentuk sediaan.
   - `stock_obat` (Integer) -> Jumlah sisa stok persediaan fisik.
   - `tanggal_kadaluarsa` (Date) -> Tanggal kedaluwarsa obat.

### 2.2 Perancangan Basis Data (Skema & ERD)

```
=============================================================================
                          SKEMA STRUKTUR DATABASE
=============================================================================

+---------------------------+       +---------------------------+
|        PELANGGANS         |       |       STAF_APOTEKS        |
+---------------------------+       +---------------------------+
| id            : BIGINT PK |       | id            : BIGINT PK |
| id_pelanggan  : VARCHAR U |       | id_staff      : VARCHAR U |
| nama          : VARCHAR   |       | nama          : VARCHAR   |
| alamat        : TEXT      |       | alamat        : TEXT      |
| no_hp         : VARCHAR   |       | tanggal_lahir : DATE      |
| created_at    : TIMESTAMP |       | tempat_lahir  : VARCHAR   |
| updated_at    : TIMESTAMP |       | no_hp         : VARCHAR   |
+---------------------------+       | created_at    : TIMESTAMP |
                                    | updated_at    : TIMESTAMP |
+---------------------------+       +---------------------------+
|           OBATS           |
+---------------------------+
| id            : BIGINT PK |
| kode_obat     : VARCHAR U |
| nama_obat     : VARCHAR   |
| stock_obat    : INTEGER   |
| tanggal_kadaluarsa : DATE |
| created_at    : TIMESTAMP |
| updated_at    : TIMESTAMP |
+---------------------------+
=============================================================================
```

### 2.3 Perancangan Antarmuka Pengguna (UI/UX)
Sistem dirancang dengan fleksibilitas antarmuka ganda (*Dual-Mode UI*):
1. **Mode Format Dokumen Lampiran (Format Asli PDF)**:
   - Merefleksikan tata letak minimalis sesuai kertas soal ujian/tugas dosen.
   - Memiliki batas input warna hijau (`#6b9e59`) dan tombol biru `simpan` (`#2563eb`) sebagaimana tampilan aslinya.
   - Mengirim data langsung ke database relasional Laravel melalui form POST standar.
2. **Mode Modern Visual (Desain Referensi)**:
   - Terinspirasi dari estetika visual modern dengan latar dinamis, gradien warna *crimson-magenta* (`#d81b60` ke `#881337`), aksen emas-kuning cerah (`#facc15`), kartu rounded-corner (`32px`), indikator status stok dan kadaluarsa otomatis, serta konsol live testing API interaktif.

### 2.4 Tahapan Implementasi Perangkat Lunak

#### Tahap 1: Setup Proyek & Direktori
Proyek diinisialisasi pada direktori web server XAMPP:
`D:\Xampp\htdocs\apotek-laravel`

#### Tahap 2: Pembuatan Skema Migrasi Database
Migrasi didefinisikan menggunakan Laravel Schema Builder:
- `2026_11_03_000001_create_pelanggans_table.php`
- `2026_11_03_000002_create_staf_apoteks_table.php`
- `2026_11_03_000003_create_obats_table.php`
Perintah eksekusi:
```bash
php artisan migrate:fresh
```

#### Tahap 3: Pembuatan Model Eloquent & Seeder
Dibuat 3 model Eloquent dengan proteksi `$fillable` dan *type casting*:
- `App\Models\Pelanggan`
- `App\Models\StafApotek`
- `App\Models\Obat`
Seeder otomatis dibuat untuk mengisi data dummy awal:
- `Database\Seeders\PelangganSeeder` (5 data pelanggan)
- `Database\Seeders\StafApotekSeeder` (4 staf dan apoteker)
- `Database\Seeders\ObatSeeder` (8 obat dengan aneka status masa kadaluarsa)
Perintah eksekusi:
```bash
php artisan db:seed
```
Selain itu, diekspor skrip SQL mandiri `database/apotek_db.sql` agar dapat langsung diimpor ke phpMyAdmin MySQL dengan 1 klik.

#### Tahap 4: Implementasi Controller Web & RESTful API
1. **Web Controller**:
   - `DashboardController.php`: Menangani halaman utama, perhitungan statistik live data, tab navigasi, dan filter mode tampilan.
   - `PelangganController.php`, `StafApotekController.php`, `ObatController.php`: Menangani simpan form, edit, update, dan delete.
2. **API Controller**:
   - `App\Http\Controllers\Api\PelangganApiController`
   - `App\Http\Controllers\Api\StafApotekApiController`
   - `App\Http\Controllers\Api\ObatApiController`
   Masing-masing mengimplementasikan metode: `index()`, `store()`, `show()`, `update()`, dan `destroy()`.
   Setiap fungsi dilengkapi validasi input ketat (`Validator::make`) yang mengembalikan HTTP `422 Unprocessable Content` jika format tidak sesuai, `404 Not Found` jika entitas tidak ada, dan `201 Created` / `200 OK` untuk respon berhasil.

#### Tahap 5: Ekspor Koleksi dan Environment Postman
Dibuat file spesifikasi Postman v2.1:
- `Apotek_API.postman_collection.json`: Berisi 15 request terstruktur dalam folder Pelanggan, Staf Apotek, dan Daftar Obat lengkap dengan parameter URL, header `Accept: application/json`, dan contoh payload JSON.
- `Apotek_Environment.postman_environment.json`: Menyimpan variabel dinamis `{{base_url}}`.
- Controller `PostmanExportController.php` untuk memfasilitasi pengunduhan langsung via route `/postman/collection.json` dan `/postman/environment.json`.

### 2.5 Konfigurasi dan Koneksi Git ke Akun GitHub
Proyek diinisialisasi sebagai repositori Git lokal dengan konfigurasi identitas pengembang:
```bash
git init
git config user.name "sayedmuhammad27"
git config user.email "sayeemuhammadfathah@gmail.com"
git branch -M main
git add .
git commit -m "feat: inisialisasi projek kelompok apotek laravel 12 dengan database, api postman, dan modul lengkap"
```
Disediakan skrip `koneksi-github.bat` untuk mempermudah penautan remote dan melakukan push ke akun GitHub pengembang.

---

## BAB III: ANALISA HASIL & PENGUJIAN SISTEM

### 3.1 Hasil Implementasi Aplikasi Web
Aplikasi berhasil dijalankan pada lingkungan lokal (`http://127.0.0.1:8000`).
Fitur-fitur yang berhasil diverifikasi:
1. **Mode Format Lampiran Asli**: Menampilkan form 3 entitas persis dokumen PDF. Setiap tombol "simpan" berfungsi menyimpan data ke database dan menampilkan notifikasi sukses.
2. **Mode Desain Modern**: Menyajikan ringkasan statistik (jumlah pelanggan, staf, obat, dan total stok). Form input dilengkapi *auto-generating code* (misal otomatis terisi `PLG-006` jika sudah ada 5 data), kolom pencarian, badge status stok (*High*, *Medium*, *Low*), dan badge kadaluarsa (*Aman*, *Hampir Expired*, *Kadaluarsa*).
3. **Pusat Integrasi API**: Pengguna dapat menguji endpoint secara realtime langsung dari web browser melalui *Live Postman API Console*.

### 3.2 Hasil Pengujian RESTful API dengan Postman (Blackbox Testing)

Pengujian dilakukan terhadap seluruh endpoint API menggunakan metode pengujian fungsionalitas kotak hitam (*Blackbox Testing*):

| No | Modul | HTTP Method | Endpoint URL | Parameter / Body Payload | Status yang Diharapkan | Status Hasil Uji | Keterangan / Evaluasi |
|:---:|:---|:---:|:---|:---|:---:|:---:|:---|
| 1 | Pelanggan | `GET` | `/api/pelanggan` | - | `200 OK` | `200 OK` | Berhasil mengambil daftar array seluruh pelanggan dalam format JSON. |
| 2 | Pelanggan | `POST` | `/api/pelanggan` | `{"id_pelanggan":"PLG-099", "nama":"Muhammad Syahrial", "alamat":"Jl. Syiah Kuala", "no_hp":"081299887766"}` | `201 Created` | `201 Created` | Entitas pelanggan baru berhasil disimpan ke database. |
| 3 | Pelanggan | `GET` | `/api/pelanggan/PLG-001` | - | `200 OK` | `200 OK` | Mengembalikan rincian data pelanggan dengan ID `PLG-001`. |
| 4 | Pelanggan | `PUT` | `/api/pelanggan/PLG-001` | `{"nama":"Ahmad Fauzi (Updated)", "no_hp":"081234567899"}` | `200 OK` | `200 OK` | Data nama dan nomor telepon berhasil diperbarui. |
| 5 | Pelanggan | `DELETE` | `/api/pelanggan/PLG-099` | - | `200 OK` | `200 OK` | Data pelanggan berhasil dihapus dari tabel database. |
| 6 | Pelanggan | `POST` | `/api/pelanggan` | `{}` (Body kosong) | `422 Unprocessable` | `422 Unprocessable` | Validasi berhasil menolak data kosong dan mengembalikan pesan error rinci. |
| 7 | Staf Apotek | `GET` | `/api/staff` | - | `200 OK` | `200 OK` | Mengembalikan daftar staf apotek beserta informasi tanggal lahir. |
| 8 | Staf Apotek | `POST` | `/api/staff` | `{"id_staff":"STF-099", "nama":"Nadia Amanda, S.Farm", "alamat":"Jl. Pelajar", "tanggal_lahir":"2001-05-20", "tempat_lahir":"Sigli", "no_hp":"082366778899"}` | `201 Created` | `201 Created` | Staf baru berhasil didaftarkan ke sistem. |
| 9 | Staf Apotek | `GET` | `/api/staff/STF-001` | - | `200 OK` | `200 OK` | Data staf `STF-001` (Sayed Muhammad) berhasil diambil. |
| 10 | Staf Apotek | `PUT` | `/api/staff/STF-001` | `{"nama":"Sayed Muhammad (Manager)"}` | `200 OK` | `200 OK` | Berhasil memperbarui data staf. |
| 11 | Staf Apotek | `DELETE`| `/api/staff/STF-099` | - | `200 OK` | `200 OK` | Staf `STF-099` berhasil dihapus. |
| 12 | Daftar Obat | `GET` | `/api/obat` | - | `200 OK` | `200 OK` | Mengembalikan daftar obat lengkap beserta status stok. |
| 13 | Daftar Obat | `POST` | `/api/obat` | `{"kode_obat":"OBT-099", "nama_obat":"Dexamethasone 0.5mg", "stock_obat":50, "tanggal_kadaluarsa":"2028-11-30"}` | `201 Created` | `201 Created` | Obat baru berhasil dicatat dalam inventaris. |
| 14 | Daftar Obat | `GET` | `/api/obat/OBT-001` | - | `200 OK` | `200 OK` | Detail obat Paracetamol 500mg berhasil ditemukan. |
| 15 | Daftar Obat | `DELETE`| `/api/obat/OBT-099` | - | `200 OK` | `200 OK` | Obat `OBT-099` berhasil dihapus. |

### 3.3 Analisis Validasi dan Penanganan Error
Aplikasi mengimplementasikan mekanisme pencegahan kesalahan (*error handling*) yang komprehensif:
1. **Keunikan Kunci Primer Bisnis (*Unique Constraint*)**: Kode `id_pelanggan`, `id_staff`, dan `kode_obat` tidak dapat diduplikasi. Jika dikirim nilai yang sudah ada, API mengembalikan respon `422 Unprocessable Content` dengan penjelasan: *"Kode sudah digunakan"*.
2. **Penanganan Entitas Tidak Ditemukan (*404 Not Found*)**: Mengakses `/api/pelanggan/PLG-TIDAK-ADA` secara konsisten mengembalikan respon JSON `{"success": false, "message": "Data pelanggan tidak ditemukan."}` dengan kode status HTTP `404`, bukan *HTML error trace* yang dapat membahayakan keamanan.
3. **Validasi Tipe Data**: Nilai `stock_obat` wajib bertipe numerik bulat positif, dan kolom tanggal wajib berformat tanggal valid (`YYYY-MM-DD`).

### 3.4 Analisis Performa dan Keandalan
- **Efisiensi Database**: Skema tabel telah dioptimasi dengan indeks pada kolom-kolom pencarian utama.
- **Portabilitas Tinggi**: Tersedianya dukungan SQLite dan MySQL memungkinkan penguji menjalankan aplikasi di komputer manapun tanpa harus melakukan konfigurasi ulang database engine.
- **Hasil Script Verifikasi (`test_api.php`)**: Seluruh 8 pengujian otomatis berhasil dieksekusi dengan tingkat kelulusan 100% dalam waktu kurang dari 500 ms.

---

## BAB IV: KESIMPULAN DAN SARAN

### 4.1 Kesimpulan
1. Sistem Informasi Apotek berhasil dibangun menggunakan framework **Laravel 12** dengan arsitektur MVC yang rapi, modular, dan terstruktur.
2. Seluruh modul data yang ditugaskan pada lembar lampiran (Pelanggan, Staf Apotek, dan Daftar Obat) telah selesai diimplementasikan secara menyeluruh dengan fungsionalitas CRUD penuh.
3. Aplikasi menyediakan **dua pilihan antarmuka**: mode format dokumen lampiran asli (PDF) untuk validasi langsung terhadap instruksi tugas, dan mode modern dengan estetika visual referensi (*vibrant design*) untuk kebutuhan operasional interaktif.
4. Arsitektur **RESTful API** berhasil dirancang dan diuji pada seluruh entitas, menghasilkan respon JSON berstandar industri dengan status HTTP `200`, `201`, `404`, dan `422`. File koleksi Postman v2.1 (`Apotek_API.postman_collection.json`) telah disediakan untuk kemudahan pengujian pihak penilai.
5. Proyek telah diintegrasikan dengan sistem kontrol versi **Git** dan disiapkan untuk penautan ke akun **GitHub** pengembang (`sayedmuhammad27`), sehingga siap untuk di-clone dan didemonstrasikan pada jadwal presentasi Kamis, 6 November 2026.

### 4.2 Saran Pengembangan
1. **Autentikasi & Otorisasi Pengguna**: Menambahkan modul otentikasi berbasis *Laravel Sanctum* atau JWT (*JSON Web Token*) untuk membedakan hak akses antara kasir, apoteker, dan administrator.
2. **Pencetakan Struk & Ekspor PDF**: Mengintegrasikan paket pustaka seperti `barryvdh/laravel-dompdf` untuk mencetak nota pembelian pelanggan atau laporan berkala persediaan obat.
3. **Modul Transaksi Penjualan**: Menghubungkan entitas Pelanggan, Staf Apotek, dan Obat ke dalam tabel transaksi resep/penjualan dengan otomatisasi pengurangan stok fisik obat.

---

## BAB V: PANDUAN PRESENTASI & MENJALANKAN PROJEK MELALUI GITHUB

### 5.1 Prosedur Menjalankan dari Clone Repository
Langkah-langkah bagi penguji/dosen untuk menjalankan proyek dari GitHub:

1. **Clone repositori**:
   ```bash
   git clone https://github.com/sayedmuhammad27/apotek-laravel.git
   cd apotek-laravel
   ```
2. **Install dependensi**:
   ```bash
   composer install
   ```
3. **Konfigurasi berkas environment**:
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
4. **Setup database & seeder**:
   ```bash
   type nul > database\database.sqlite
   php artisan migrate:fresh --seed
   ```
5. **Jalankan aplikasi**:
   ```bash
   php artisan serve
   ```
   *(Atau klik dua kali berkas `jalankan-aplikasi.bat` pada sistem operasi Windows)*
6. Buka peramban (*browser*) pada alamat: **`http://127.0.0.1:8000`**

### 5.2 Skenario Alur Presentasi (Kamis, 6 November 2026)
1. **Pembukaan**: Memperkenalkan anggota tim dan latar belakang tugas pembuatan sistem apotek.
2. **Demonstrasi Tampilan Asli Lampiran (PDF)**:
   - Klik tombol **📄 Format PDF** di navbar.
   - Perlihatkan kesesuaian form Pelanggan, Staf Apotek, dan Daftar Obat dengan lembar soal lampiran.
   - Masukkan data baru pada salah satu form dan klik tombol **simpan**.
3. **Demonstrasi Tampilan Modern & Database Live**:
   - Klik **🎨 Modern** pada mode tampilan.
   - Tunjukkan bagaimana data yang baru saja diinput pada format PDF langsung tersimpan di database dan tampil di tabel data modern secara realtime.
   - Tunjukkan fitur status kadaluarsa obat otomatis (*Aman*, *Hampir Expired*, *Kadaluarsa*).
4. **Demonstrasi Koneksi ke Postman**:
   - Buka aplikasi Postman.
   - Perlihatkan hasil *import* file `Apotek_API.postman_collection.json`.
   - Jalankan request `GET /api/pelanggan` dan `POST /api/obat`. Tunjukkan status code HTTP `200 OK` dan `201 Created` serta struktur respon JSON.
   - Alternatif: Perlihatkan tab **REST API & Postman** langsung di web browser untuk mendemonstrasikan konsol live testing.
5. **Penutupan**: Menyimpulkan bahwa seluruh kriteria tugas telah dipenuhi dengan nilai pengujian 100%.

---

## DAFTAR PUSTAKA

1. Fielding, R. T. (2000). *Architectural Styles and the Design of Network-based Software Architectures*. Doctoral dissertation, University of California, Irvine.
2. Otwell, T. (2026). *Laravel Documentation: The PHP Framework for Web Artisans*. Laravel LLC. [Online]. Tersedia: https://laravel.com/docs
3. Postman Inc. (2026). *Postman API Platform Documentation and Collection Schema v2.1.0*. Postman Inc. [Online]. Tersedia: https://learning.postman.com/docs/
4. Chacon, S., & Straub, B. (2014). *Pro Git: Everything you need to know about Git* (2nd ed.). Apress.
5. Stauffer, M. (2019). *Laravel: Up & Running: A Framework for Building Modern PHP Apps* (2nd ed.). O'Reilly Media.
6. Pressman, R. S., & Maxim, B. R. (2020). *Software Engineering: A Practitioner's Approach* (9th ed.). McGraw-Hill Education.
7. W3C. (2022). *Hypertext Transfer Protocol (HTTP/1.1): Semantics and Content (RFC 9110)*. Internet Engineering Task Force (IETF).
