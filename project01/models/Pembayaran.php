<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pembayaran
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pembayaran';
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO pembayaran (jumlah_bayar, tanggal, pesanan_id) VALUES (:jumlah_bayar, :tanggal, :pesanan_id)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':pesanan_id', $data['pesanan_id']);
        return $stmt->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT * FROM pembayaran WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE pembayaran SET jumlah_bayar=:jumlah_bayar, tanggal=:tanggal, pesanan_id=:pesanan_id WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':pesanan_id', $data['pesanan_id']);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('DELETE FROM pembayaran WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
