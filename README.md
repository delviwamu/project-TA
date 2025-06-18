# Sistem Informasi Manajemen Berkas Perkara

REVISI DOSEN (18/06/2025)

:: Bagian advokasi

Manajemen Klien
- ubah status langsung dari table data

:: Bagian staf, kepala LBA, pengacara

- Hapus menu "manajemen klien" dan langsung saja munculkan "Data Klien / Data Kasus
- Buat ringkasan statistic 


# 📘 Git Dasar - Panduan Singkat

Dokumentasi ini berisi kumpulan perintah Git yang sering digunakan untuk mengelola repository versi kontrol.

## Perintah Git awal

Langakah" setup:

Pastikan sudah download project
```
git clone <alamat_url_repository>
```

Seperti ni
```
git clone https://github.com/delviwamu/project-TA.git
```

Jika project sudah didownload sebelumnya, tinggal Tarik perubahan terbaru
```
git pull
```

Karena ini project Laravel sehingga harus ada composer terinstall.

Pastikan sudah ada composer din laptop dengan cara, buka terminal dan ketik:
```
composer
```

Jika ada tampilan composer maka bertanda program composer sudah terinstall

Kemudian buka project di visual studio code, lalu buka terminal dan pastikan di terminal sudah mengarah ke dalam project tersebut.

Lakukan composer update
```
composer update
```

Tunggu hingga proses update atau install selesai

Buat file `.env`, copy dari file `.env.example`

Setelah itu masukan nama database, username.
Contoh: 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=si_manajemen_berkas_perkara
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian generate key, dengan cara jalankan perintah
```
php artisan key:generate
```

Setelah itu jalankan server, dengan cara:
```
php artisan serve
```

jalankan migrasi dan seed database

```
php artisan migrate:fresh --seed
```


---

## 🔧 Inisialisasi Repository

```bash
git init
```

💾 Menambahkan File ke Staging Area

```bash
git add <nama_file>
```

contoh:
```bash
git add index.html
```

Menambahkan semua file
```bash
git add .
```

📝 Commit Perubahan

```bash
git commit -m "Pesan commit"
```

🔗 Menambahkan Remote Repository
```bash
git remote add origin <url_repository>
```
contoh
```bash
git remote add origin https://github.com/username/project.git
```

🔍 Melihat Remote Repository
```bash
git remote -v
```

🔄 Menghapus Remote Repository
```bash
git remote remove origin
```
atau versi singkat

```bash
git remote rm origin
```

📤 Push ke Remote Repository

Mengirim perubahan ke branch main di remote origin.
```bash
git push -u origin main
```

📥 Pull dari Remote Repository

Mengambil dan menggabungkan perubahan dari remote repository ke branch lokal.
```bash
git pull origin main
```

📄 Melihat Status File
```bash
git status
```

📜 Melihat Riwayat Commit
```bash
git log
```

🧹 Menghapus File yang Sudah Tidak Digunakan

```bash
git rm <nama_file>
```

```bash
```