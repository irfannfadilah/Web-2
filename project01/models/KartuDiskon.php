<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class KartuDiskon
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM kartu_diskon';
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO kartu_diskon (nama, deskripsi, persen_diskon) VALUES (:nama, :deskripsi, :persen_diskon)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':persen_diskon', $data['persen_diskon']);
        return $stmt->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT * FROM kartu_diskon WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE kartu_diskon SET nama=:nama, deskripsi=:deskripsi, persen_diskon=:persen_diskon WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':persen_diskon', $data['persen_diskon']);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('DELETE FROM kartu_diskon WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
