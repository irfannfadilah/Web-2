<?php
require_once __DIR__ . '/../models/jenisproduk.php';

use models\JenisProduk;

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $deskripsi = trim($_POST['deskripsi']);

    if ($nama === '') {
        $errors[] = "Nama wajib diisi.";
    }

    if (empty($errors)) {
        JenisProduk::create([
            'nama' => $nama,
            'deskripsi' => $deskripsi
        ]);
        $success = true;
        header("Location: list-jenisproduk.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jenis Produk</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .form-container {
            max-width: 600px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin: auto;
        }
        .form-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            margin-top: 15px;
            font-weight: bold;
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
                <h1 class="mt-4">Tambah Jenis Produk</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="list-jenis_produk.php">Jenis Produk</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>

                <div class="form-container">
                    <?php if ($success): ?>
                        <div class="alert alert-success">Data berhasil disimpan.</div>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $_POST['nama'] ?? '' ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= $_POST['deskripsi'] ?? '' ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="list-jenis_produk.php" class="btn btn-secondary w-100 mt-2">
                            ← Kembali ke Daftar
                        </a>
                    </form>
                </div>

            </div>
        </main>
        <?php include_once './partials/footer.php'; ?>
    </div>
</div>

</body>
</html>

