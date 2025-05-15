<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class DetailPesanan
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM detailpesanan';
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO detailpesanan (pesanan_id, produk_id, jumlah) VALUES (:pesanan_id, :produk_id, :jumlah)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pesanan_id', $data['pesanan_id']);
        $stmt->bindParam(':produk_id', $data['produk_id']);
        $stmt->bindParam(':jumlah', $data['jumlah']);
        return $stmt->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT * FROM detailpesanan WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE detailpesanan SET pesanan_id=:pesanan_id, produk_id=:produk_id, jumlah=:jumlah WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':pesanan_id', $data['pesanan_id']);
        $stmt->bindParam(':produk_id', $data['produk_id']);
        $stmt->bindParam(':jumlah', $data['jumlah']);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('DELETE FROM detailpesanan WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
