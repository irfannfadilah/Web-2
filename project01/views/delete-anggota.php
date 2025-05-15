<?php
require_once __DIR__ . '/../models/anggota.php';
use models\Anggota;

$id = $_GET['id'] ?? null;
if ($id) {
    Anggota::delete($id);
}
header("Location: list-anggota.php");
exit;
?>
