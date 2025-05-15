<?php
require_once __DIR__ . '/../models/pembayaran.php';
use models\Pembayaran;

$id = $_GET['id'] ?? null;
if ($id) {
    Pembayaran::delete($id);
}
header("Location: list-pembayaran.php");
exit;
?>
