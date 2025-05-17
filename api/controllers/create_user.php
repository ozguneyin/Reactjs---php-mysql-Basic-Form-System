<?php
// Gerekli başlıkları ayarla
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Veritabanı bağlantısı ve kullanıcı modeli
include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../models/user.php';

// Veritabanı bağlantısı oluştur
$database = new Database();
$db = $database->getConnection();

// Kullanıcı nesnesi oluştur
$user = new User($db);

// POST verilerini al
$data = json_decode(file_get_contents("php://input"));

// Veri kontrolü
if(
    !empty($data->ad) &&
    !empty($data->soyad) &&
    !empty($data->email) &&
    !empty($data->adres)
){
    // Kullanıcı özelliklerini ayarla
    $user->ad = htmlspecialchars(strip_tags($data->ad));
    $user->soyad = htmlspecialchars(strip_tags($data->soyad));
    $user->email = htmlspecialchars(strip_tags($data->email));
    $user->adres = htmlspecialchars(strip_tags($data->adres));
    
    // Kullanıcıyı oluştur
    if($user->create()){
        // 201 oluşturuldu kodu
        http_response_code(201);
        
        // Kullanıcıya bildir
        echo json_encode(array("message" => "Kullanıcı başarıyla oluşturuldu."));
    }
    // Oluşturulamazsa
    else{
        // 503 servis kullanılamıyor
        http_response_code(503);
        
        // Kullanıcıya bildir
        echo json_encode(array("message" => "Kullanıcı oluşturulamadı."));
    }
}
// Veriler eksikse
else{
    // 400 hatalı istek
    http_response_code(400);
    
    // Kullanıcıya bildir
    echo json_encode(array("message" => "Kullanıcı oluşturulamadı. Veriler eksik."));
}
?>
