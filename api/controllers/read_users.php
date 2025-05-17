<?php
// Gerekli başlıkları ayarla
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Veritabanı bağlantısı ve kullanıcı modeli
include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../models/user.php';

// Veritabanı bağlantısı oluştur
$database = new Database();
$db = $database->getConnection();

// Kullanıcı nesnesi oluştur
$user = new User($db);

// Kullanıcıları al
$stmt = $user->read();
$num = $stmt->rowCount();

// Kullanıcı varsa
if($num > 0) {
    // Kullanıcı dizisi
    $users_arr = array();
    $users_arr["records"] = array();

    // Verileri al
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Satırdan veri çıkar
        extract($row);

        $user_item = array(
            "id" => $id,
            "ad" => $ad,
            "soyad" => $soyad,
            "email" => $email,
            "adres" => $adres,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        );

        array_push($users_arr["records"], $user_item);
    }

    // 200 OK
    http_response_code(200);

    // JSON formatında göster
    echo json_encode($users_arr);
} else {
    // 404 Bulunamadı
    http_response_code(404);

    // Kullanıcıya bildir
    echo json_encode(array("message" => "Hiç kullanıcı bulunamadı."));
}
?>
