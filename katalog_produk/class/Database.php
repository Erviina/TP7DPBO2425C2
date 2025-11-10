<?php
//impor file konfigurasi yang berisi detail koneksi database
require_once __DIR__ . '/../config/config.php';

class Database {
    private $conn;      // untuk menyimpan koneksi ke database

    // method mengembalikan koneksi database
    public function getConnection() {
        // jika belum ada koneksi, buat koneksi baru
        if ($this->conn == null) {      
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
            //jika gagal terkoneksi, menampilkan pesan eror 
            if ($this->conn->connect_error) {
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}
?>
