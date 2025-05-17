<?php
// CORS başlıkları
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Preflight OPTIONS isteği için
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// API yönlendirme
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$endpoint = basename($path);

switch ($endpoint) {
    case 'users':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include_once __DIR__ . '/controllers/read_users.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include_once __DIR__ . '/controllers/create_user.php';
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(["message" => "Desteklenmeyen metod"]);
        }
        break;
    
    default:
        http_response_code(404); // Not Found
        echo json_encode(["message" => "Endpoint bulunamadı"]);
        break;
}
?>
