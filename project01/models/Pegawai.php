<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pegawai
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pegawai';
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO pegawai (nip, nama, jenis_kelamin, jabatan) VALUES (:nip, :nama, :jenis_kelamin, :jabatan)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nip', $data['nip']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
        $stmt->bindParam(':jabatan', $data['jabatan']);
        return $stmt->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT * FROM pegawai WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE pegawai SET nip=:nip, nama=:nama, jenis_kelamin=:jenis_kelamin, jabatan=:jabatan WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nip', $data['nip']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
        $stmt->bindParam(':jabatan', $data['jabatan']);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('DELETE FROM pegawai WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
