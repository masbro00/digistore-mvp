# 🛒 DigiStore MVP

DigiStore adalah platform web sederhana (Minimum Viable Product) untuk menjual dan mendistribusikan produk digital (Aset Digital, E-Book, Template, dll). Aplikasi ini memungkinkan Admin untuk mengunggah file berukuran besar, dan User untuk mengklaim serta mengunduh file tersebut.

## 🚀 Fitur Utama
- **Public Catalog:** Menampilkan daftar produk digital yang tersedia.
- **Sistem Transaksi:** User dapat mengklaim (membeli) produk untuk dimasukkan ke dalam koleksi pribadinya.
- **Koleksi & Unduhan (My Assets):** Halaman khusus user untuk melihat riwayat kepemilikan dan mengunduh file (ZIP/PDF) dengan aman.
- **Admin Panel:** CRUD Produk dan manajemen *upload* file besar.

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 10
- **Bahasa:** PHP (Minimal versi 8.4.0)
- **Database:** MySQL
- **Styling:** Tailwind CSS

## ⚙️ Persyaratan Sistem (Prerequisites)
Sebelum menjalankan aplikasi ini, pastikan komputer Anda sudah terinstal:
- PHP >= 8.4.0
- Composer
- Node.js & NPM
- MySQL (Bisa menggunakan Herd, Laragon, atau XAMPP)

## 📸 Screenshots

### 1. Halaman Utama (Public Catalog)
<img width="2879" height="1557" alt="Screenshot 2026-03-05 072952" src="https://github.com/user-attachments/assets/bee87600-40ef-4272-9514-1a067c6aa42f" />


### 2. Panel Admin (Upload Produk Besar)
<img width="2879" height="1553" alt="Screenshot 2026-03-05 073029" src="https://github.com/user-attachments/assets/7051dc55-758c-4c0f-bc53-d9672550cc5b" />


### 3. Halaman User (My Assets & Download)
<img width="2877" height="1557" alt="Screenshot 2026-03-05 072930" src="https://github.com/user-attachments/assets/7074f5c3-e478-4434-81b0-716d94407dcd" />

## 📖 Cara Instalasi (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer Anda:

**1. Clone Repository**
```bash
git clone [https://github.com/username-kamu/digistore-mvp.git](https://github.com/username-kamu/digistore-mvp.git)
cd digistore-mvp

```

**2. Install Dependencies**

```bash
composer install
npm install
npm run build

```

**3. Setup Environment**
Duplikat file `.env.example` menjadi `.env`:

```bash
cp .env.example .env

```

Buka file `.env` dan atur koneksi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=root
DB_PASSWORD=

```

**4. Generate Application Key**

```bash
php artisan key:generate

```

**5. Hubungkan Storage (SANGAT PENTING)**
Karena aplikasi ini menyimpan file *upload*, Anda wajib menjalankan perintah ini agar file bisa diakses/diunduh:

```bash
php artisan storage:link

```

**6. Jalankan Migrasi Database**

```bash
php artisan migrate

```

**7. Konfigurasi Upload File Besar (PENTING)**
Agar Admin bisa mengunggah file besar (seperti ZIP), pastikan file `php.ini` pada server PHP Anda sudah diatur minimal seperti ini:

```ini
upload_max_filesize = 2G
post_max_size = 2G
memory_limit = 2G

```

**8. Jalankan Aplikasi**

```bash
php artisan serve

```

Buka `http://127.0.0.1:8000` di browser Anda.

---

*Dibuat oleh*

```
Ganendra-Universitas Amikom Yogyakarta
---

