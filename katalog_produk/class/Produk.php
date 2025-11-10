<?php
require_once 'Database.php';

class Produk {
    private $conn;
    private $table = "produk";      // nama tabel produk

    // konstruktor
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // menambah produk baru
    public function tambah($nama, $harga, $id_kategori, $id_supplier) {
        $sql = "INSERT INTO $this->table (nama_produk, harga, id_kategori, id_supplier) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdii", $nama, $harga, $id_kategori, $id_supplier);
        return $stmt->execute();
    }

    // menampilkan produk dengan kategori dan supplier juga
    public function tampil() {
    $sql = "SELECT p.*, k.nama_kategori, s.nama_supplier 
            FROM $this->table p
            JOIN kategori k ON p.id_kategori = k.id_kategori
            JOIN supplier s ON p.id_supplier = s.id_supplier
            ORDER BY p.id_produk ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}


    // mengubah data produk
    public function ubah($id, $nama, $harga, $id_kategori, $id_supplier) {
        $sql = "UPDATE $this->table 
                SET nama_produk=?, harga=?, id_kategori=?, id_supplier=?    
                WHERE id_produk=?";         // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdiii", $nama, $harga, $id_kategori, $id_supplier, $id);
        return $stmt->execute();
    }

    // menghapus produk
    public function hapus($id) {
        $sql = "DELETE FROM $this->table WHERE id_produk=?";    // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // menggambil data produk berdasarkan id
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id_produk=?";  // berdasarkan id
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
