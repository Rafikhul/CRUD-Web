<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang=$id");
header("Location: index.php");
?>
