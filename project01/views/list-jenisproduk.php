<?php
require_once __DIR__ . '/../models/jenisproduk.php';

use models\Jenisproduk;

$jenisproduks = Jenisproduk::get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Jenisproduk List</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Jenisproduk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jenisproduk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            List Jenisproduk
                        </div>
                        <div class="card-body">
                            <div class="mb-3 text-end">
                                <a href="../views/create-jenis_produk.php" class="btn btn-success">
                                    <i class="fas fa-plus"></i>Add Jenisproduk
                                </a>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenisproduks as $index => $item): ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $item['nama'] ?></td>
                                            <td><?= $item['deskripsi'] ?></td>
                                            <td>
                                                <a href="detail-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i>Detail</a>
                                                <a href="edit-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                                <a href="delete-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>
