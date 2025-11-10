<?php
require_once __DIR__ . '/../config/config.php';

class Database {
    private $conn;

    public function getConnection() {
        if ($this->conn == null) {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->conn->connect_error) {
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}
?>
