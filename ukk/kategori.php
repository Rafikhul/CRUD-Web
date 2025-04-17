<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Manajemen Kategori</title></head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<body style="background-color:#222222;">
<div class="container mt-5">
    <h3 style="color: #169976; text-align: center;">Daftar Kategori Barang</h3>

    <!-- Tambah Kategori -->
    <form method="POST">
        <input type="text" class="form-control mb-3 mt-5" name="nama_kategori" placeholder="Nama Kategori" required>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <a href="index.php" class="btn btn-danger" tabindex="1" role="button">Kembali</a>

    </form>

    <?php
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama_kategori'];
        mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    }

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori=$id");
    }

    // Tampilkan semua kategori
    $data = mysqli_query($koneksi, "SELECT * FROM kategori");
    echo "<ul>";
    while ($row = mysqli_fetch_array($data)) {
        echo "<li class='fs-3 mt-2' style='color:white;'>$row[nama_kategori] 
        <a href='?hapus=$row[id_kategori]' style='color:white; onclick='return confirm(\"Yakin?\")'>[hapus]</a>
        </li>";
    }
    echo "</ul>";
    ?>
</div>

</body>
</html>
