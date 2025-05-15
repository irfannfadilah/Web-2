<?php
require_once __DIR__ . '/../models/pesanan.php';
require_once __DIR__ . '/../models/anggota.php'; 

use models\Pesanan;
use models\Anggota;

$anggotaList = Anggota::getAllWithPegawai();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = [
        'tanggal' => $_POST['tanggal'],
        'diskon' => $_POST['diskon'],
        'status_bayar' => $_POST['status_bayar'] === 'sudah_bayar' ? 1 : 0,
        'anggota_id' => $_POST['anggota_id'],
    ];

    Pesanan::create($data);
    header("Location: list-pesanan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pesanan</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-pesanan.php">Pesanan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <h3 style="margin-bottom: 20px;">Tambah Pesanan Baru</h3>

                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" required style="width: 100%; padding: 8px; margin-bottom: 15px;">

                        <label for="diskon">Diskon</label>
                        <input type="number" id="diskon" name="diskon" required style="width: 100%; padding: 8px; margin-bottom: 15px;">

                        <label for="status_bayar">Status Bayar</label>
                        <select id="status_bayar" name="status_bayar" required style="width: 100%; padding: 8px; margin-bottom: 15px;">
                            <option value="" disabled selected>-- Pilih Status Bayar --</option>
                            <option value="belum_bayar">Belum Bayar</option>
                            <option value="sudah_bayar">Sudah Bayar</option>
                        </select>

                        <label for="anggota_id">Anggota</label>
                       <label for="anggota_id">Anggota</label>
<select id="anggota_id" name="anggota_id" required style="width: 100%; padding: 8px; margin-bottom: 20px;">
    <option value="" disabled selected>-- Pilih Anggota --</option>
    <?php foreach ($anggotaList as $anggota): ?>
        <option value="<?= $anggota['id'] ?>"><?= htmlspecialchars($anggota['nama']) ?></option>
    <?php endforeach; ?>
</select>


                        <button type="submit" name="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            Simpan
                        </button>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
