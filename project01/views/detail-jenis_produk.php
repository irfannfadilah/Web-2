<?php
require_once __DIR__ . '/../models/jenisproduk.php';

use models\JenisProduk;

if (!isset($_GET['id'])) {
    header("Location: list-jenis_produk.php");
    exit();
}

$jenis_produk = JenisProduk::find($_GET['id']);
if (!$jenis_produk) {
    echo "<h3>Data tidak ditemukan</h3>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jenis Produk</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn {
            min-width: 120px;
        }
    </style>
</head>
<body class="sb-nav-fixed">

<?php include_once './partials/navbar.php'; ?>

<div id="layoutSidenav">
    <?php include_once './partials/sidebar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Detail Jenis Produk</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="list-jenis_produk.php">Jenis Produk</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-box me-2"></i> Detail Jenis Produk
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?= htmlspecialchars($jenis_produk['nama']) ?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?= htmlspecialchars($jenis_produk['deskripsi']) ?></td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="edit-jenis_produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete-jenis_produk.php?id=<?= $jenis_produk['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <?php include_once './partials/footer.php'; ?>
    </div>
</div>

</body>
</html>
