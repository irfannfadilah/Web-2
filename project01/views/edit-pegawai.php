<?php
require_once __DIR__ . '/../models/pegawai.php';
use models\Pegawai;

if (isset($_GET['id'])) {
    $data = Pegawai::find($_GET['id']);
    if (!$data) {
        header("Location: list-pegawai.php");
        exit;
    }
} else {
    $data = array_fill_keys(['nip', 'nama', 'jenis_kelamin', 'jabatan'], '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id' => $_GET['id'] ?? null,
        'nip' => $_POST['nip'],
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'jabatan' => $_POST['jabatan'],
    ];

    if (isset($_GET['id'])) {
        Pegawai::update($payload);
    } else {
        Pegawai::create($payload);
    }

    header("Location: list-pegawai.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Pegawai</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Pegawai</h2>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" value="<?= htmlspecialchars($data['nip']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required style="width:100%; padding:8px; margin-bottom:15px;">
                            <option value="" disabled <?= empty($data['jenis_kelamin']) ? 'selected' : '' ?>>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" <?= $data['jenis_kelamin'] === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $data['jenis_kelamin'] === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>

                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>" required style="width:100%; padding:8px; margin-bottom:20px;">

                        <button type="submit" name="submit" style="padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:4px;">
                            Simpan
                        </button>
                        <a href="list-pegawai.php" style="margin-left:10px;">Kembali ke Daftar</a>
                    </form>
                </div>
            </main>
            <?php include_once './partials/footer.php'; ?>
        </div>
    </div>
</body>
</html>
