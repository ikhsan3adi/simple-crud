# Mission 2: Simple (CRUD) Website with Codeigniter 4

<img alt="preview" src="https://github.com/user-attachments/assets/01761102-39e7-4945-8fc4-47b6f4fd88f6" />

---

- Nama: Ikhsan Satriadi
- NIM: 241511080
- Prodi: D3 - Teknik Informatika
- Kelas: 2C

## Mata Kuliah Proyek 3: Pengembangan Perangkat Lunak Berbasis Web

Projek ini adalah tugas dari mata kuliah Proyek 3: Pengembangan Perangkat Lunak Berbasis Web. Tujuan dari proyek ini adalah untuk mengembangkan sebuah website sederhana yang memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data.

---

### Teknologi yang Digunakan

- Framework: CodeIgniter 4
- Bahasa Pemrograman: PHP
- Database: MySQL
- Frontend: HTML, CSS, Bootstrap 5

---

### Cara Menjalankan

1. Clone repository ini ke dalam direktori server lokal Anda.

   ```bash
   git clone https://github.com/ikhsan3adi/simple-crud.git
   cd simple-crud
    ```

2. Jalankan perintah composer untuk menginstal dependensi yang diperlukan.

   ```bash
   composer install
   ```

3. Buat database baru di MySQL bernama `mahasiswa`.
4. Jalankan perintah migrasi untuk membuat tabel yang diperlukan.

   ```bash
   php spark migrate --all
   ```

5. (Opsional) Jalankan seeder untuk mengisi tabel dengan data awal.

   ```bash
   php spark db:seed BiodataMahasiswaSeeder
   ```

6. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database sesuai dengan pengaturan lokal Anda.
7. Jalankan server pengembangan CodeIgniter.

   ```bash
   php spark serve
   ```

8. Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi berjalan.
