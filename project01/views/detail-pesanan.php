
<?php
require_once __DIR__ . '/../models/pesanan.php';
use models\Pesanan;

if (!isset($_GET['id'])) {
    header("Location: list-pesanan.php");
    exit;
}

$pesanan = Pesanan::find($_GET['id']);

if (!$pesanan) {
    header("Location: list-pesanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Detail Pesanan</title>
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
                        <a class="nav-link" href="list-pesanan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table"></i></div>
                            Pesanan
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-pesanan.php">Pesanan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Detail Data</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr><th>Tanggal</th><td><?= $pesanan['tanggal'] ?></td></tr>
<tr><th>Diskon</th><td><?= $pesanan['diskon'] ?></td></tr>
<tr><th>Status Bayar</th><td><?= $pesanan['status_bayar'] ?></td></tr>
<tr><th>ID Anggota</th><td><?= $pesanan['anggota_id'] ?></td></tr>
                            </table>
                            <a href="edit-pesanan.php?id=<?= $pesanan['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete-pesanan.php?id=<?= $pesanan['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
