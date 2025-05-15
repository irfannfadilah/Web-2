<?php
require_once __DIR__ . '/../models/produk.php';
require_once __DIR__ . '/../models/jenisproduk.php';

use models\Produk;
use models\JenisProduk;

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list-produk.php");
    exit;
}

$data = Produk::find($id);
if (!$data) {
    header("Location: list-produk.php");
    exit;
}

$jenisProduks = JenisProduk::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id' => $id,
        'kode' => $_POST['kode'],
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok'],
        'jenis_produk_id' => $_POST['jenis_produk_id'],
    ];
    Produk::update($payload);
    header("Location: list-produk.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2>Edit Produk</h2>
                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="kode">Kode</label>
                        <input type="text" id="kode" name="kode" required value="<?= htmlspecialchars($data['kode']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($data['nama']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" id="deskripsi" name="deskripsi" value="<?= htmlspecialchars($data['deskripsi']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga" required value="<?= htmlspecialchars($data['harga']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="stok">Stok</label>
                        <input type="number" id="stok" name="stok" required value="<?= htmlspecialchars($data['stok']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="jenis_produk_id">Jenis Produk</label>
                        <select id="jenis_produk_id" name="jenis_produk_id" required style="width:100%; padding:8px; margin-bottom:20px;">
                            <option value="" disabled>-- Pilih Jenis Produk --</option>
                            <?php foreach ($jenisProduks as $jenis): ?>
                                <option value="<?= $jenis['id'] ?>" <?= $data['jenis_produk_id'] == $jenis['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($jenis['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" name="submit" style="padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:4px;">
                            Simpan
                        </button>
                        <a href="list-produk.php" style="margin-left:10px;">Kembali ke Daftar</a>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
