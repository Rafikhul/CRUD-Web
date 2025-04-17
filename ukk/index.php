<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#222222;">
<div class="container mt-4">
    <h2 style="color: #169976;">Data Inventaris Barang</h2>
    <a href="tambah.php" class="btn btn-outline-primary">Tambah Barang</a>
    <a href="kategori.php" class="btn btn-outline-success">Tambah Kategori</a>
    <a href="export.php" class="btn btn-outline-danger">Export Excel</a>

    <form method="GET" class="row mt-3 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control form" placeholder="Cari Nama Barang...">
        </div>
        <div class="col-md-5">
            <select name="filter_kategori" class="form-control">
                <option value="">-- Filter Kategori --</option>
                <?php
                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                while ($k = mysqli_fetch_array($kategori)) {
                    echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">Cari</button>
        </div>
    </form>

    <table class="table table-dark table-bordered border-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $where = "";
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
            $where .= "AND nama_barang LIKE '%$search%'";
        }
        if (!empty($_GET['filter_kategori'])) {
            $filter = $_GET['filter_kategori'];
            $where .= " AND barang.id_kategori = $filter";
        }

        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        
        $total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang"));
        $total_page = ceil($total_data / $limit);
        
        $query = "SELECT barang.*, kategori.nama_kategori FROM barang 
                    JOIN kategori ON barang.id_kategori = kategori.id_kategori 
                    WHERE 1=1 $where LIMIT $start, $limit";

        $data = mysqli_query($koneksi, $query);
        while ($d = mysqli_fetch_array($data)) {
            echo "<tr>
                <td>$no</td>
                <td>$d[nama_barang]</td>
                <td>$d[nama_kategori]</td>
                <td>$d[jumlah_stok]</td>
                <td>$d[harga_barang]</td>
                <td>$d[tanggal_masuk]</td>
                <td>
                    <a href='edit.php?id=$d[id_barang]' class='btn btn-sm btn-warning'>Edit</a>
                    <a href='hapus.php?id=$d[id_barang]' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
    <nav>
  <ul class="pagination">
    <?php for ($i = 1; $i <= $total_page; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>
</div>
</body>
</html>
