<?php
require_once __DIR__ . '/../models/kartudiskon.php';

use models\KartuDiskon;

$data = [
    'nama' => '',
    'deskripsi' => '',
    'persen_diskon' => ''
];

if (isset($_GET['id'])) {
    $diskon = KartuDiskon::find($_GET['id']);
    if ($diskon) {
        $data = $diskon;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $postData = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'persen_diskon' => $_POST['persen_diskon']
    ];

    if (isset($_GET['id'])) {
        KartuDiskon::update($_GET['id'], $postData);
    } else {
        KartuDiskon::create($postData);
    }

    header("Location: list-kartudiskon.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kartu Diskon</title>
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
                    <h1 class="mt-4"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kartu Diskon</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-kartudiskon.php">Kartu Diskon</a></li>
                        <li class="breadcrumb-item active"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?></li>
                    </ol>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <h3 style="margin-bottom: 20px;"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kartu Diskon</h3>

                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required style="width: 100%; padding: 8px; margin-bottom: 15px;">

                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" value="<?= htmlspecialchars($data['deskripsi']) ?>" required style="width: 100%; padding: 8px; margin-bottom: 15px;">

                        <label for="persen_diskon">Persen Diskon (%)</label>
                        <input type="number" name="persen_diskon" id="persen_diskon" value="<?= htmlspecialchars($data['persen_diskon']) ?>" min="0" max="100" required style="width: 100%; padding: 8px; margin-bottom: 20px;">

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
