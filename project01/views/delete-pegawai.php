<?php
require_once __DIR__ . '/../models/pegawai.php';
use models\Pegawai;

$id = $_GET['id'] ?? null;
if ($id) {
    Pegawai::delete($id);
}
header("Location: list-pegawai.php");
exit;
?>
