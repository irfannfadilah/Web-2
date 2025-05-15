<?php

namespace models;

use PDO;

class Pesanan
{
    protected static $table = 'pesanan';

    public static function get()
    {
        $db = new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $query = "
        SELECT pesanan.*, pegawai.nama AS nama_pegawai
        FROM pesanan
        JOIN anggota ON pesanan.anggota_id = anggota.id
        JOIN pegawai ON anggota.pegawai_id = pegawai.id
        ORDER BY pesanan.tanggal DESC
    ";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function create($data)
    {
        $db = new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            $data['status_bayar'],
            $data['anggota_id']
        ]);
    }

    public static function find($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data)
    {
        $db = new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("UPDATE pesanan SET tanggal = ?, diskon = ?, status_bayar = ?, anggota_id = ? WHERE id = ?");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            $data['status_bayar'],
            $data['anggota_id'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=db_koperasi', 'root', '');
        $stmt = $db->prepare("DELETE FROM pesanan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
