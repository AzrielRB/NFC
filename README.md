# 🍗 Proyek Skripsi: Sistem Informasi UMKM Nurul Fried Chicken (NFC)

Halo! Selamat datang di repositori proyek Tugas Akhir / Skripsi saya. Di sini saya mengembangkan sebuah **Sistem Informasi Manajemen Menu & Cabang** berbasis web untuk UMKM **Nurul Fried Chicken (NFC)**. 

Aplikasi ini dibuat untuk membantu NFC mempromosikan produk dan lokasi cabang mereka ke masyarakat luas lewat halaman landing page yang menarik, sekaligus memudahkan pemilik UMKM mengelola data menu dan cabang melalui dashboard admin.

---

## 🚀 Mengapa Menggunakan Arsitektur Ini? (Tech Stack & Hosting)

Aplikasi ini sengaja dirancang menggunakan pendekatan **Serverless & Cloud-based** agar sistem bisa dideploy secara gratis, memiliki performa cepat, dan database aman tanpa memerlukan server fisik yang mahal.

* **Framework Utama**: Laravel 12 (PHP 8.3+) dengan Blade Template Engine
* **Tampilan (Styling)**: Vanilla CSS dengan Custom Design System (tanpa framework CSS agar loading lebih ringan)
* **Hosting Aplikasi**: **Vercel** (Serverless hosting untuk PHP dan static assets)
* **Database Online**: **Supabase** (PostgreSQL database cloud yang tangguh)
* **Penyimpanan Media**: **Cloudinary** (Untuk menyimpan file gambar menu secara permanen, karena filesystem Vercel bersifat read-only)
* **Library Pendukung**: SweetAlert2 (untuk notifikasi pop-up cantik) dan Font Awesome 6.5 (untuk ikon)

---

## 📋 Fitur yang Tersedia

### 🌐 Landing Page Utama (Terbuka untuk Publik)
* **Branding NFC** yang khas dengan dominasi warna merah-kuning hangat.
* **Katalog Menu Interaktif**: Menampilkan daftar makanan, paket, dan minuman lengkap dengan foto, harga, dan filter kategori.
* **Peta Lokasi Cabang**: Menampilkan daftar cabang NFC untuk memudahkan pelanggan datang ke gerai terdekat.
* **Profil Bisnis**: Berisi info sejarah singkat NFC sejak tahun 2003 serta visi misi usaha.
* **Responsif**: Tampilan tetap rapi saat diakses dari HP (mobile) maupun layar laptop (desktop).

### 🔐 Panel Admin (Perlu Login)
* **Statistik Cepat**: Dashboard ringkas untuk memantau total menu dan cabang yang aktif.
* **Kelola Menu (CRUD)**: Tambah, edit, dan hapus menu masakan. Gambar otomatis diunggah ke cloud (Cloudinary) dan data disimpan di database online.
* **Kelola Cabang (CRUD)**: Tambah, edit, dan hapus lokasi cabang baru.
* **Sistem Pencarian & Filter**: Memudahkan admin mencari menu tertentu di tabel manajemen.

---

## 💻 Cara Menjalankan di Komputer Lokal (Offline / Development)

Jika ingin mencoba atau mengedit aplikasi ini langsung di komputer Anda sendiri, pastikan Anda sudah menginstal **PHP (>= 8.2)**, **Composer**, **Node.js**, dan **MySQL/MariaDB**.

### Langkah-langkah Setup:

1. **Clone repository ini**
   ```bash
   git clone https://github.com/AzrielRB/NFC.git
   cd NFC
   ```

2. **Install semua dependensi program**
   ```bash
   composer install
   npm install
   ```

3. **Salin file environment**
   ```bash
   cp .env.example .env
   ```
   *Buka file `.env` di text editor Anda, lalu sesuaikan nama database, username, dan password MySQL lokal Anda.*

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Buat database baru & jalankan seeder**
   *Buat database kosong bernama `nfc_menu_db` di MySQL Anda, lalu jalankan:*
   ```bash
   php artisan migrate --seed
   ```

6. **Hubungkan folder penyimpanan**
   ```bash
   php artisan storage:link
   ```

7. **Nyalakan server lokal**
   *Buka dua terminal terpisah dan jalankan:*
   * Terminal 1: `php artisan serve` (untuk server backend)
   * Terminal 2: `npm run dev` (untuk compiling asset frontend)

8. **Akses di browser**
   * Halaman Publik: [http://localhost:8000](http://localhost:8000)
   * Halaman Login Admin: [http://localhost:8000/login](http://localhost:8000/login) (Gunakan email `admin@nfc.com` dan password `password` untuk login pertama kali).

---

## ☁️ Panduan Deployment ke Cloud (Vercel + Supabase + Cloudinary)

Bagi Anda yang ingin meng-online-kan aplikasi ini agar bisa diakses oleh dosen penguji atau publik secara luas:

1. **Siapkan Database**: Daftarkan akun di **Supabase**, buat project baru, lalu salin **Connection String (URI PostgreSQL)** dari menu settings database.
2. **Siapkan Cloud Storage**: Daftarkan akun di **Cloudinary**, masuk ke dashboard utama, lalu catat **Cloud Name**, **API Key**, dan **API Secret (Root)** Anda.
3. **Hubungkan dengan Vercel**: 
   * Import repositori GitHub Anda ke Vercel.
   * Di pengaturan Vercel, ubah *Output Directory* menjadi `public` dan gunakan build command `npm run build`.
   * Masukkan semua konfigurasi variabel penting di Vercel **Environment Variables**:
     * `APP_KEY` = (Gunakan key dari `.env` lokal Anda)
     * `DB_CONNECTION` = `pgsql`
     * `DB_URL` = (URI PostgreSQL Supabase Anda)
     * `DB_SSLMODE` = `require`
     * `CLOUDINARY_CLOUD_NAME` = (Cloud Name Anda)
     * `CLOUDINARY_API_KEY` = (API Key Anda)
     * `CLOUDINARY_API_SECRET` = (API Secret Anda)
4. **Deploy**: Klik tombol deploy dan tunggu proses build selesai.
5. **Setup Awal Database Online**: Setelah online, Anda bisa memicu migrasi dan data awal (seeder) database Supabase Anda dengan mengakses URL routing sementara `/run-setup` di domain Vercel Anda sekali saja, lalu hapus route tersebut untuk keamanan.

---

## 📁 Gambaran Struktur Folder Utama

* `app/Http/Controllers/` — File logika kontroler (CRUD menu, cabang, dashboard, login, dan landing page).
* `app/Models/` — Representasi tabel database (Model Menu & Cabang).
* `database/migrations/` & `database/seeders/` — Skema tabel dan data awal untuk database.
* `resources/views/` — File tampilan web (Landing page & Admin panel dengan Blade engine).
* `public/css/style.css` — Seluruh kode styling kustom admin panel.
* `routes/web.php` — Jalur navigasi URL aplikasi.
* `vercel.json` — Konfigurasi serverless routing khusus untuk Vercel.

---

**Dikembangkan oleh:**  
🎓 **Azriel Rakhan Bilal** (Untuk kebutuhan akademik / Skripsi).
