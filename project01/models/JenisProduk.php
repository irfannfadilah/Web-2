<?php
namespace models;

class JenisProduk {
    protected static $table = 'jenis_produk';

    public static function get() {
        $db = new \PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        return $db->query("SELECT * FROM `" . self::$table . "`")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = new \PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("SELECT * FROM `" . self::$table . "` WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = new \PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("
            INSERT INTO `" . self::$table . "` (nama, deskripsi)
            VALUES (?, ?)
        ");
        return $stmt->execute([$data['nama'], $data['deskripsi']]);
    }

    public static function update($data) {
        $db = new \PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("
            UPDATE `" . self::$table . "`
            SET nama = ?, deskripsi = ?
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $data['id']
        ]);
    }

    public static function delete($id) {
        $db = new \PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("DELETE FROM `" . self::$table . "` WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
