<?php
require_once __DIR__ . '/../models/Anggota.php';
require_once __DIR__ . '/../models/KartuDiskon.php'; 
require_once __DIR__ . '/../models/Pegawai.php'; 

use models\Anggota;
use models\KartuDiskon;
use models\Pegawai;

$kartuDiskons = KartuDiskon::get();

$pegawais = Pegawai::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = [
        'status_aktif' => $_POST['status_aktif'],
        'pegawai_id' => $_POST['pegawai_id'],
        'kartu_diskon_id' => $_POST['kartu_diskon_id'],
    ];

    Anggota::create($data);
    header("Location: list-anggota.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
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
                    <h1 class="mt-4">Tambah Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <h3 style="margin-bottom: 20px;">Tambah Anggota Baru</h3>

                        <label for="status_aktif">Status Aktif</label>
                        <select id="status_aktif" name="status_aktif" required style="width: 100%; padding: 8px; margin-bottom: 15px;">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>

                        <label for="pegawai_id">Pegawai</label>
                        <select id="pegawai_id" name="pegawai_id" required style="width: 100%; padding: 8px; margin-bottom: 15px;">
                            <option value="" disabled selected>-- Pilih Pegawai --</option>
                            <?php foreach ($pegawais as $pegawai): ?>
                                <option value="<?= $pegawai['id']; ?>">
                                    <?= $pegawai['nama']; ?> (ID: <?= $pegawai['id']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="kartu_diskon_id">Kartu Diskon</label>
                        <select id="kartu_diskon_id" name="kartu_diskon_id" required style="width: 100%; padding: 8px; margin-bottom: 20px;">
                            <option value="" disabled selected>-- Pilih Kartu Diskon --</option>
                            <?php foreach ($kartuDiskons as $kartuDiskon): ?>
                                <option value="<?= $kartuDiskon['id']; ?>">
                                    <?= $kartuDiskon['nama']; ?> (<?= $kartuDiskon['id']; ?>)
                                </option>
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
