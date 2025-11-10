<?php
require_once 'Database.php';

class Supplier {
    private $conn;
    private $table = "supplier";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // CREATE
    public function tambah($nama, $kontak) {
        $sql = "INSERT INTO $this->table (nama_supplier, kontak) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nama, $kontak);
        return $stmt->execute();
    }

    // READ
    public function tampil() {
        $sql = "SELECT * FROM $this->table ORDER BY id_supplier ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }


    // UPDATE
    public function ubah($id, $nama, $kontak) {
        $sql = "UPDATE $this->table SET nama_supplier=?, kontak=? WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nama, $kontak, $id);
        return $stmt->execute();
    }

    // DELETE
    public function hapus($id) {
        $sql = "DELETE FROM $this->table WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // GET BY ID
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
