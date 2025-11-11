<?php
require_once 'Database.php';

class Supplier {
    private $conn;
    private $table = "supplier";       //nama table supplier

    //konstruktor
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // menambahkan supplier baru
    public function tambah($nama, $kontak) {
        $sql = "INSERT INTO $this->table (nama_supplier, kontak) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nama, $kontak);
        return $stmt->execute();
    }

    // menampilkan data supplier
    public function tampil() {
        $sql = "SELECT * FROM $this->table ORDER BY id_supplier ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }


    // mengubah data supplier
    public function ubah($id, $nama, $kontak) {
        $sql = "UPDATE $this->table SET nama_supplier=?, kontak=? WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nama, $kontak, $id);
        return $stmt->execute();
    }

    // menghapus data supplier
    public function hapus($id) {
        $sql = "DELETE FROM $this->table WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // menggambil data supplier berdasakan id
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id_supplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
