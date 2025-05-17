<?php
class User {
    // Veritabanı bağlantısı ve tablo adı
    private $conn;
    private $table_name = "users";

    // Nesne özellikleri
    public $id;
    public $ad;
    public $soyad;
    public $email;
    public $adres;
    public $created_at;
    public $updated_at;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Kullanıcı oluşturma
    function create() {
        // Sorgu
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    ad = :ad,
                    soyad = :soyad,
                    email = :email,
                    adres = :adres";

        // Sorguyu hazırla
        $stmt = $this->conn->prepare($query);

        // Değerleri temizle
        $this->ad = htmlspecialchars(strip_tags($this->ad));
        $this->soyad = htmlspecialchars(strip_tags($this->soyad));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->adres = htmlspecialchars(strip_tags($this->adres));

        // Değerleri bağla
        $stmt->bindParam(":ad", $this->ad);
        $stmt->bindParam(":soyad", $this->soyad);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":adres", $this->adres);

        // Sorguyu çalıştır
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Tüm kullanıcıları okuma
    function read() {
        // Sorgu
        $query = "SELECT
                    id, ad, soyad, email, adres, created_at, updated_at
                FROM
                    " . $this->table_name . "
                ORDER BY
                    created_at DESC";

        // Sorguyu hazırla
        $stmt = $this->conn->prepare($query);

        // Sorguyu çalıştır
        $stmt->execute();

        return $stmt;
    }
}
?>
