<?php
require_once __DIR__ . '/../models/KartuDiskon.php';
use models\KartuDiskon;

if (isset($_GET['id'])) {
    $data = KartuDiskon::find($_GET['id']);
    if (!$data) {
        header("Location: list-kartudiskon.php");
        exit;
    }
} else {
    $data = array_fill_keys(['nama', 'deskripsi', 'persen_diskon'], '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id' => $_GET['id'] ?? null,
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'persen_diskon' => $_POST['persen_diskon'],
    ];

    if (isset($_GET['id'])) {
        KartuDiskon::update($payload);
    } else {
        KartuDiskon::create($payload);
    }

    header("Location: list-kartudiskon.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kartu Diskon</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kartu Diskon</h2>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" value="<?= htmlspecialchars($data['deskripsi']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="persen_diskon">Persen Diskon (%)</label>
                        <input type="number" name="persen_diskon" id="persen_diskon" step="0.01" value="<?= htmlspecialchars($data['persen_diskon']) ?>" required style="width:100%; padding:8px; margin-bottom:20px;">

                        <button type="submit" name="submit" style="padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:4px;">
                            Simpan
                        </button>
                        <a href="list-kartudiskon.php" style="margin-left:10px;">Kembali ke Daftar</a>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
