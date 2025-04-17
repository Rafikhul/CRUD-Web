<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Barang</title></head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<body style="background-color:#222222;">
<div class="container mt-5">
    <h3 style="color: #169976;">Tambah Barang</h3>
    <form method="POST">
        <input type="text" class="form-control" name="nama" placeholder="Nama Barang" required><br>
        <select name="kategori" class="form-select">
            <?php
            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
            while ($k = mysqli_fetch_array($kategori)) {
                echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
            }
            ?>
        </select><br>
        <input type="number" class="form-control" name="stok" placeholder="Jumlah Stok" required><br>
        <input type="number" class="form-control" name="harga" placeholder="Harga Barang" required><br>
        <input type="date" class="form-control" name="tanggal" required><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-danger" tabindex="1" role="button">Kembali</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $kategori = $_POST['kategori'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];

        // Validasi
        if ($stok < 0 || $harga < 0) {
            echo "<p style='color:white;'>Stok dan harga tidak boleh negatif!<p>";
        } else {
            mysqli_query($koneksi, "INSERT INTO barang (nama_barang, id_kategori, jumlah_stok, harga_barang, tanggal_masuk) 
            VALUES ('$nama', '$kategori', '$stok', '$harga', '$tanggal')");
            echo "<p style='color:white;'>Barang berhasil ditambahkan!<p>";
        }
    }
    ?>
    
</div>
</body>
</html>
