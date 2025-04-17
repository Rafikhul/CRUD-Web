<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
$barang = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Barang</title></head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<body>
<div class="container mt-5">
    <h3>Edit Barang</h3>
    <form method="POST">
        <input type="text" name="nama" value="<?= $barang['nama_barang'] ?>" required><br>
        <select name="kategori">
            <?php
            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
            while ($k = mysqli_fetch_array($kategori)) {
                $selected = ($k['id_kategori'] == $barang['id_kategori']) ? 'selected' : '';
                echo "<option value='$k[id_kategori]' $selected>$k[nama_kategori]</option>";
            }
            ?>
        </select><br>
        <input type="number" name="stok" value="<?= $barang['jumlah_stok'] ?>" required><br>
        <input type="number" name="harga" value="<?= $barang['harga_barang'] ?>" required><br>
        <input type="date" name="tanggal" value="<?= $barang['tanggal_masuk'] ?>" required><br>
        <button type="submit">Update</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];

        mysqli_query($koneksi, "UPDATE barang SET 
            nama_barang='$nama', 
            id_kategori='$kategori', 
            jumlah_stok='$stok', 
            harga_barang='$harga', 
            tanggal_masuk='$tanggal' 
            WHERE id_barang=$id");
        echo "<p style='color:white;>Data berhasil diupdate!<p>";
    }
    ?>
</div>
</body>
</html>
