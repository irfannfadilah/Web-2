<?php
require_once __DIR__ . '/../models/jenisproduk.php';
use models\JenisProduk;

if (isset($_GET['id'])) {
    $data = JenisProduk::find($_GET['id']);
    if (!$data) {
        header("Location: list-jenis_produk.php");
        exit;
    }
} else {
    $data = array_fill_keys(['nama', 'deskripsi'], '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id' => $_GET['id'] ?? null,
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
    ];

    if (isset($_GET['id'])) {
        JenisProduk::update($payload);
    } else {
        JenisProduk::create($payload);
    }

    header("Location: list-jenisproduk.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Jenis Produk</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Jenis Produk</h2>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" value="<?= htmlspecialchars($data['deskripsi']) ?>" required style="width:100%; padding:8px; margin-bottom:20px;">

                        <button type="submit" name="submit" style="padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:4px;">
                            Simpan
                        </button>
                        <a href="list-jenis_produk.php" style="margin-left:10px;">Kembali ke Daftar</a>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
