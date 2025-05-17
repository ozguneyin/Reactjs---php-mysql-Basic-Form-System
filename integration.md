# Frontend ve Backend Entegrasyonu için Yapılandırma

Bu dosya, React frontend ve PHP backend arasındaki entegrasyonu yapılandırmak için gerekli adımları içerir.

## API URL Yapılandırması

React uygulamasında API URL'sini doğru şekilde yapılandırmak için:

1. Geliştirme ortamında: `http://localhost/form_system/api`
2. Üretim ortamında: Sunucu adresinize göre ayarlayın

## CORS Yapılandırması

PHP API'de CORS başlıkları zaten ayarlanmıştır. API'nin `index.php` dosyasında şu başlıklar bulunmaktadır:

```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
```

## Veritabanı Bağlantısı

Veritabanı bağlantı bilgilerini `api/config/database.php` dosyasında güncelleyin:

```php
private $host = "localhost";
private $db_name = "form_system";
private $username = "root"; // Veritabanı kullanıcı adınız
private $password = ""; // Veritabanı şifreniz
```

## Kurulum Adımları

1. MySQL veritabanını oluşturun ve `database/schema.sql` dosyasını çalıştırın
2. PHP API dosyalarını web sunucunuza yükleyin
3. React uygulamasını derleyin ve web sunucunuza yükleyin
4. API URL'sini React uygulamasında doğru şekilde yapılandırın
