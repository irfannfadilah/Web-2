<?php

namespace models;

use PDO;

class Anggota
{
    protected static $table = 'anggota';

    protected static function connect()
    {
        return new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
    }

    // READ - Get all
    public static function getAll()
    {
        $db = self::connect();
        $stmt = $db->query("
            SELECT a.id, a.status_aktif, a.pegawai_id, a.kartu_diskon_id, 
                p.nama AS nama_pegawai, k.nama AS nama_kartu_diskon
            FROM " . self::$table . " a
            LEFT JOIN pegawai p ON a.pegawai_id = p.id
            LEFT JOIN kartu_diskon k ON a.kartu_diskon_id = k.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ - Find by ID
    public static function find($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM " . self::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // CREATE
    public static function create($data)
    {
        $db = self::connect();
        $stmt = $db->prepare("
            INSERT INTO " . self::$table . " (status_aktif, pegawai_id, kartu_diskon_id)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['status_aktif'],
            $data['pegawai_id'],
            $data['kartu_diskon_id']
        ]);
    }

    // UPDATE
    public static function update($id, $data)
    {
        $db = self::connect();
        $stmt = $db->prepare("
            UPDATE " . self::$table . " 
            SET status_aktif = ?, pegawai_id = ?, kartu_diskon_id = ?
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['status_aktif'],
            $data['pegawai_id'],
            $data['kartu_diskon_id'],
            $id
        ]);
    }

    // DELETE
    public static function delete($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM " . self::$table . " WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllWithPegawai()
{
    $db = self::connect();
    $query = "
        SELECT anggota.id, pegawai.nama 
        FROM anggota 
        JOIN pegawai ON anggota.pegawai_id = pegawai.id
    ";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
