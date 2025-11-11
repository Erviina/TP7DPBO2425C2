<?php
require_once 'Database.php';

class Kategori {
    private $conn;                  // menyimpan koneksi database
    private $table = "kategori";    // nama table yg di gunakan

    // konstruktor koneksi ke database
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // menambahkan data kategori baru
    public function tambah($nama) {
        $sql = "INSERT INTO $this->table (nama_kategori) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    // menampilkan semua data kategori
    public function tampil() {
    $sql = "SELECT * FROM $this->table ORDER BY id_kategori ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}

    // mengubah data kategori
    public function ubah($id, $nama) {
        $sql = "UPDATE $this->table SET nama_kategori=? WHERE id_kategori=?";   // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    // menghapus data kategori
    public function hapus($id) {
        $sql = "DELETE FROM $this->table WHERE id_kategori=?";  // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // mengambil data kategori berdasarkan id
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id_kategori=?";    // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
