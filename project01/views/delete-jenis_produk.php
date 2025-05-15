<?php
require_once __DIR__ . '/../models/jenisproduk.php';
use models\JenisProduk;

$id = $_GET['id'] ?? null;
if ($id) {
    JenisProduk::delete($id);
}
header("Location: list-jenisproduk.php");
exit;
?>
