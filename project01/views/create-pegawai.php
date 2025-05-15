<?php
require_once __DIR__ . '/../models/pegawai.php';
use models\Pegawai;

$isEdit = isset($_GET['id']);
$data = $isEdit ? Pegawai::find($_GET['id']) : ['nip' => '', 'nama' => '', 'jenis_kelamin' => '', 'jabatan' => ''];

if (!$data && $isEdit) {
    header("Location: list-pegawai.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $payload = [
        'id'            => $_GET['id'] ?? null,
        'nip'           => $_POST['nip'],
        'nama'          => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'jabatan'       => $_POST['jabatan']
    ];
    $isEdit ? Pegawai::update($payload) : Pegawai::create($payload);
    header("Location: list-pegawai.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Pegawai</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include_once './partials/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include_once './partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4 mt-4">
                    <h2><?= $isEdit ? 'Edit' : 'Tambah' ?> Pegawai</h2>

                    <form method="POST" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" required value="<?= htmlspecialchars($data['nip']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($data['nama']) ?>" style="width:100%; padding:8px; margin-bottom:15px;">

                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" required style="width:100%; padding:8px; margin-bottom:15px;">
                            <option value="" disabled <?= $data['jenis_kelamin'] == '' ? 'selected' : '' ?>>-- Pilih --</option>
                            <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>

                        <label for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" required value="<?= htmlspecialchars($data['jabatan']) ?>" style="width:100%; padding:8px; margin-bottom:20px;">

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
