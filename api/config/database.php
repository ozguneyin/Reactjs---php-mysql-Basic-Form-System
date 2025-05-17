<?php
class Database {
    // Veritabanı bağlantı parametreleri
    private $host = "localhost";
    private $db_name = "form_system";
    private $username = "root";
    private $password = "";
    public $conn;

    // Veritabanı bağlantısını oluşturma
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Bağlantı hatası: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
