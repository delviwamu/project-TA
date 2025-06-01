# Sistem Informasi Manajemen Berkas Perkara

# 📘 Git Dasar - Panduan Singkat

Dokumentasi ini berisi kumpulan perintah Git yang sering digunakan untuk mengelola repository versi kontrol.

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