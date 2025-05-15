<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Produk
{
    public static function get()
    {
    $db = Connection::make();
    $stmt = $db->query("
        SELECT produk.*, jenis_produk.nama AS jenis_produk_nama
        FROM produk
        LEFT JOIN jenis_produk ON produk.jenis_produk_id = jenis_produk.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO produk (kode, nama, deskripsi, harga, stok, jenis_produk_id) VALUES (:kode, :nama, :deskripsi, :harga, :stok, :jenis_produk_id)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        $stmt->bindParam(':jenis_produk_id', $data['jenis_produk_id']);
        return $stmt->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT * FROM produk WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE produk SET kode=:kode, nama=:nama, deskripsi=:deskripsi, harga=:harga, stok=:stok, jenis_produk_id=:jenis_produk_id WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        $stmt->bindParam(':jenis_produk_id', $data['jenis_produk_id']);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('DELETE FROM produk WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
