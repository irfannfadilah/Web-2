
<?php
require_once __DIR__ . '/../models/produk.php';
use models\Produk;

if (!isset($_GET['id'])) {
    header("Location: list-produk.php");
    exit;
}

$produk = Produk::find($_GET['id']);

if (!$produk) {
    header("Location: list-produk.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="dashboard.php">praktikum 06</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="list-produk.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table"></i></div>
                            Produk
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-produk.php">Produk</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Detail Data</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr><th>Kode</th><td><?= $produk['kode'] ?></td></tr>
<tr><th>Nama</th><td><?= $produk['nama'] ?></td></tr>
<tr><th>Deskripsi</th><td><?= $produk['deskripsi'] ?></td></tr>
<tr><th>Harga</th><td><?= $produk['harga'] ?></td></tr>
<tr><th>Stok</th><td><?= $produk['stok'] ?></td></tr>
<tr><th>ID Jenis Produk</th><td><?= $produk['jenis_produk_id'] ?></td></tr>
                            </table>
                            <a href="edit-produk.php?id=<?= $produk['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete-produk.php?id=<?= $produk['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
