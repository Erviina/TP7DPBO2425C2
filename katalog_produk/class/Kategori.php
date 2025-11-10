<?php
require_once 'Database.php';

class Kategori {
    private $conn;
    private $table = "kategori";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // CREATE
    public function tambah($nama) {
        $sql = "INSERT INTO $this->table (nama_kategori) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    // READ
    public function tampil() {
    $sql = "SELECT * FROM $this->table ORDER BY id_kategori ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}

    // UPDATE
    public function ubah($id, $nama) {
        $sql = "UPDATE $this->table SET nama_kategori=? WHERE id_kategori=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    // DELETE
    public function hapus($id) {
        $sql = "DELETE FROM $this->table WHERE id_kategori=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // GET BY ID
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id_kategori=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
