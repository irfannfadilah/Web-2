
<?php
require_once __DIR__ . '/../models/detail_pesanan.php';
use models\Detailpesanan;

if (!isset($_GET['id'])) {
    header("Location: list-detail_pesanan.php");
    exit;
}

$detail_pesanan = Detailpesanan::find($_GET['id']);

if (!$detail_pesanan) {
    header("Location: list-detail_pesanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Detail Detail_pesanan</title>
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
                        <a class="nav-link" href="list-detail_pesanan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table"></i></div>
                            Detail_pesanan
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Detail_pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-detail_pesanan.php">Detail_pesanan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Detail Data</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr><th>ID Pesanan</th><td><?= $detail_pesanan['pesanan_id'] ?></td></tr>
<tr><th>ID Produk</th><td><?= $detail_pesanan['produk_id'] ?></td></tr>
<tr><th>Jumlah</th><td><?= $detail_pesanan['jumlah'] ?></td></tr>
                            </table>
                            <a href="edit-detail_pesanan.php?id=<?= $detail_pesanan['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete-detail_pesanan.php?id=<?= $detail_pesanan['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
