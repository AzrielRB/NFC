# 🍗 Nurul Fried Chicken — Sistem Informasi UMKM

Sistem Informasi berbasis web untuk UMKM **Nurul Fried Chicken (NFC)**, dirancang untuk membantu pengelolaan menu, cabang, dan informasi publik melalui landing page yang informatif dan dashboard admin yang mudah digunakan.

> Proyek ini dikembangkan sebagai bagian dari Tugas Akhir / Skripsi.

---

## 📋 Fitur Utama

### 🌐 Landing Page (Publik)
- **Hero Section** — Branding utama dengan logo NFC
- **Menu Kami** — Menampilkan daftar menu dengan gambar, deskripsi, harga, dan filter berdasarkan kategori
- **Cabang Kami** — Informasi lokasi cabang-cabang NFC
- **Sejarah** — Riwayat perjalanan bisnis NFC sejak 2003
- **Visi & Misi** — Visi dan misi perusahaan
- **Kenapa Nurul Fried Chicken?** — Keunggulan NFC (Selalu Fresh, Bumbu Rahasia, Harga Terjangkau)
- **Responsive Design** — Tampilan optimal di desktop & mobile
- **Smooth Scroll & Scroll-Spy** — Navigasi interaktif dengan highlight otomatis

### 🔐 Dashboard Admin (Login Required)
- **Autentikasi** — Login admin dengan email & password
- **Dashboard** — Statistik total menu, cabang, dan per kategori
- **CRUD Menu** — Tambah, edit, hapus menu dengan validasi lengkap
  - Upload gambar menu (JPG, PNG, WEBP, maks 2MB)
  - Deskripsi menu (opsional)
  - Kategori: Makanan, Paket, Lainnya
  - Pencarian & filter berdasarkan nama dan kategori
  - Pagination
- **CRUD Cabang** — Kelola data cabang/lokasi
- **Aksi Cepat** — Shortcut untuk operasi yang sering digunakan
- **Responsive Sidebar** — Navigasi admin yang mobile-friendly

---

## 🛠️ Teknologi yang Digunakan

| Komponen       | Teknologi                          |
|----------------|-------------------------------------|
| **Backend**    | Laravel 12 (PHP 8.2+)             |
| **Database**   | MySQL                              |
| **Frontend**   | Blade Template Engine              |
| **Styling**    | Vanilla CSS (Custom Design System) |
| **Icon**       | Font Awesome 6.5                   |
| **Font**       | Google Fonts (Inter)               |
| **Alert/Dialog** | SweetAlert2                      |
| **Server**     | Apache / Nginx / PHP Built-in      |

---

## ⚙️ Instalasi & Setup

### Prasyarat
- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm (opsional, jika perlu compile asset)

### Langkah-langkah

**1. Clone repository**
```bash
git clone https://github.com/AzrielRB/NFC.git
cd NFC
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Konfigurasi database**

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nfc_menu_db
DB_USERNAME=root
DB_PASSWORD=
```

**6. Jalankan migrasi & seeder**
```bash
php artisan migrate --seed
```

**7. Buat symbolic link untuk storage**
```bash
php artisan storage:link
```

**8. Jalankan server**
```bash
php artisan serve
```

**9. Akses aplikasi**
- **Landing Page**: [http://localhost:8000](http://localhost:8000)
- **Login Admin**: [http://localhost:8000/login](http://localhost:8000/login)

### Akun Admin Default
| Email              | Password   |
|--------------------|------------|
| `admin@nfc.com`    | `password` |

---

## 📁 Struktur Proyek

```
NFC/
├── app/
│   ├── Http/Controllers/
│   │   ├── MenuController.php        # CRUD Menu
│   │   ├── CabangController.php      # CRUD Cabang
│   │   ├── DashboardController.php   # Dashboard Admin
│   │   ├── AuthController.php        # Autentikasi
│   │   └── LandingController.php     # Landing Page
│   └── Models/
│       ├── Menu.php                  # Model Menu
│       └── Cabang.php                # Model Cabang
├── database/
│   ├── migrations/                   # Skema database
│   └── seeders/                      # Data awal
├── public/
│   ├── css/style.css                 # Stylesheet admin
│   ├── js/script.js                  # JavaScript admin
│   └── images/                       # Logo & aset gambar
├── resources/views/
│   ├── landing.blade.php             # Landing page
│   ├── layouts/app.blade.php         # Layout admin
│   ├── dashboard/index.blade.php     # Dashboard
│   ├── menu/                         # Views CRUD menu
│   ├── cabang/                       # Views CRUD cabang
│   └── auth/login.blade.php          # Halaman login
└── routes/web.php                    # Definisi route
```

---

## 📸 Screenshot

> _Tambahkan screenshot tampilan landing page dan dashboard admin di sini._

---

## 👨‍💻 Pengembang

**Azriel Rakhan Bilal**

---

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan akademik (Skripsi).
