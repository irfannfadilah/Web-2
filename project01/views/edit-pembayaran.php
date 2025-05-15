<?php
require_once __DIR__ . '/../models/pembayaran.php';
require_once __DIR__ . '/../models/pesanan.php';

use models\Pembayaran;
use models\Pesanan;

$pesanans = Pesanan::get(); 

if (isset($_GET['id'])) {
    $data = Pembayaran::find($_GET['id']);
    if (!$data) {
        header("Location: list-pembayaran.php");
        exit;
    }
} else {
    $data = array_fill_keys(['jumlah_bayar', 'tanggal', 'pesanan_id'], '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id' => $_GET['id'] ?? null,
        'jumlah_bayar' => $_POST['jumlah_bayar'],
        'tanggal' => $_POST['tanggal'],
        'pesanan_id' => $_POST['pesanan_id'],
    ];

    if (isset($_GET['id'])) {
        Pembayaran::update($payload);
    } else {
        Pembayaran::create($payload);
    }

    header("Location: list-pembayaran.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Pembayaran</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Pembayaran</h2>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="jumlah_bayar">Jumlah Bayar</label>
                        <input type="number" step="0.01" name="jumlah_bayar" id="jumlah_bayar" value="<?= htmlspecialchars($data['jumlah_bayar']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="pesanan_id">Pesanan</label>
                        <select name="pesanan_id" id="pesanan_id" required style="width:100%; padding:8px; margin-bottom:20px;">
                            <option value="" disabled <?= empty($data['pesanan_id']) ? 'selected' : '' ?>>-- Pilih Pesanan --</option>
                            <?php foreach ($pesanans as $pesanan): ?>
                                <option value="<?= $pesanan['id'] ?>" <?= $pesanan['id'] == $data['pesanan_id'] ? 'selected' : '' ?>>
                                    #<?= $pesanan['id'] ?> - <?= $pesanan['tanggal'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" name="submit" style="padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:4px;">
                            Simpan
                        </button>
                        <a href="list-pembayaran.php" style="margin-left:10px;">Kembali ke Daftar</a>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
