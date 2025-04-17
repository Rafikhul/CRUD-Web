# 🗃️ Sistem Manajemen Inventaris Barang – CRUD Web Programming

Aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola data inventaris barang. Proyek ini dibuat sebagai bagian dari **Ujian Praktik Kejuruan PPLG** di SMK Negeri 2 Padang.

## 🚀 Fitur Utama

✅ Tambah, Lihat, Edit, dan Hapus data barang  
✅ CRUD kategori barang  
✅ Filter barang berdasarkan kategori  
✅ Pencarian nama barang  
✅ Validasi input barang dan harga  
✅ Tampilan responsif menggunakan Bootstrap  
✅ Export data barang ke Excel  
✅ Notifikasi setelah operasi CRUD

## 📂 Struktur Folder


## 🧾 Struktur Database

### 1. Tabel `kategori`


CREATE TABLE kategori (
  id_kategori INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(100)
);

CREATE TABLE barang (
  id_barang INT AUTO_INCREMENT PRIMARY KEY,
  nama_barang VARCHAR(100),
  id_kategori INT,
  jumlah_stok INT,
  harga_barang DOUBLE,
  tanggal_masuk DATE,
  FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

⚙️ Teknologi yang Digunakan
PHP 7/8 (Native)

MySQL

HTML5 & CSS3

Bootstrap 5

Export Excel via HTML table

📸 Screenshot Tampilan
(Tambahkan screenshot halaman utama, tambah barang, kategori, dll)

🧑‍💻 Kontributor
Nama: [Nama Kamu]

Sekolah: SMK Negeri 2 Padang

Jurusan: PPLG (Rekayasa Perangkat Lunak)

Tahun Ajaran: 2024/2025

📄 Lisensi
Proyek ini bebas digunakan untuk keperluan pembelajaran dan pengembangan tugas sekolah. Tidak untuk diperjualbelikan.
