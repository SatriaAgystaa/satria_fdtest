# 📚 satria_fdtest

Aplikasi ini merupakan sistem manajemen dan eksplorasi buku berbasis web, dikembangkan sebagai bagian dari tes teknikal Fullstack Developer. Menggunakan Laravel (Blade), PostgreSQL, dan Laravel Breeze, aplikasi ini memiliki fitur lengkap: autentikasi, manajemen buku, rating, komentar, filter, hingga statistik visual interaktif menggunakan Chart.js.

## ✨ Fitur Utama

🔐 **Autentikasi Pengguna**  
- Login, register, logout  
- Verifikasi email (wajib sebelum akses dashboard)  
- Reset kata sandi via email  
- Ganti kata sandi dari profil  
- Proteksi route dengan `auth` & `verified`  

📊 **Dashboard Interaktif**  
- Kartu jumlah buku, pengguna terverifikasi & belum  
- Pie chart statistik user (verifikasi)  
- Bar chart jumlah buku per bulan  

👥 **Manajemen Pengguna**  
- Daftar pengguna dengan pencarian nama/email  
- Filter status verifikasi  
- Tanggal bergabung & pagination responsif  

📚 **Halaman Buku Publik**  
- Daftar buku publik (tanpa login)  
- Filter rating, pencarian judul, pagination  
- Detail buku dengan deskripsi, gambar, komentar, rating  

🛠️ **Buku Saya (CRUD)**  
- Tambah, edit, hapus buku oleh user  
- Upload cover buku  
- Validasi lengkap  

⭐ **Penilaian & Komentar**  
- Rating 1–5 per user per buku  
- Komentar pengguna (dihapus oleh pemilik)  
- Hanya untuk user login & verifikasi  

✅ **Testing**  
- Unit Test: validasi buku, logika auth  
- Integration Test: rating, komentar, filter  

## ⚙️ Teknologi

- **Framework**: Laravel 10.x  
- **Frontend**: Blade (Laravel Breeze)  
- **Database**: PostgreSQL  
- **Auth**: Laravel Breeze, Email Verification  
- **Chart**: Chart.js  
- **Styling**: Tailwind CSS  
- **Email Testing**: Mailtrap.io  
- **Testing**: PHPUnit  

## 🛠 Instalasi

### 1. Clone Repositori & Masuk Direktori
```bash
git clone https://github.com/SatriaAgystaa/satria_fdtest.git
cd satria_fdtest
```

### 2. Install Dependency Backend & Frontend
```bash
composer install
npm install
```

### 3. Salin File Environment & Generate Key
```bash
cp .env.example .env
php artisan key:generate
```
### 
4. Konfigurasi Database (PostgreSQL)
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=satria_fdtest
DB_USERNAME=postgres
DB_PASSWORD=220807
```

### 5. Jalankan Migrasi & Seeder
```bash
php artisan migrate --seed
```

### 6. Link Storage & Jalankan Server Laravel
```bash
php artisan storage:link
php artisan serve
```

### 7. Jalankan Vite (Frontend Dev Server)
```bash
npm run dev
```

### 8. Konfigurasi Mailtrap (Testing Email)
```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=666f108f289160
MAIL_PASSWORD=79d937fb335863
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

🧪 Menjalankan Testing
```bash
php artisan test
```

👨‍💻 **Penulis**
- Nama: Satria Agysta
- Role: Fullstack Developer (Laravel + PostgreSQL)

📄 **Catatan Penggunaan Library Pihak Ketiga**
- Chart.js: Untuk menampilkan grafik statistik di dashboard
- Tailwind CSS: Untuk styling cepat dan responsif
- Laravel Breeze: Untuk implementasi autentikasi default dan verifikasi email
- Mailtrap: Untuk pengujian pengiriman email secara aman selama development

⭐ **Fitur Tambahan**
- Fitur komentar pada detail buku
- Dashboard interaktif
- Validasi form lengkap dan error handling
- Unit dan integrasi testing mencakup core logic