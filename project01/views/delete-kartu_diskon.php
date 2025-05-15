<?php
require_once __DIR__ . '/../models/kartudiskon.php';
use models\KartuDiskon;

$id = $_GET['id'] ?? null;
if ($id) {
    KartuDiskon::delete($id);
}
header("Location: list-kartudiskon.php");
exit;
?>
