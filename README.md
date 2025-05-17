***************** ENGLISH ******************

# Form Registration System User Guide

This document contains the installation and usage instructions for the form registration system developed using PHP, MySQL, and React JS.

## System Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Node.js 14 or higher (for compiling the React application)
- Web server (Apache, Nginx, etc.)

## Installation Steps

### 1. Database Setup

1. Log in to your MySQL database
2. Run the `database/schema.sql` file to create the database and table
3. Create database username and password if necessary

### 2. PHP API Setup

1. Copy the `api` folder to the root directory of your web server
2. Open the `api/config/database.php` file and update your database connection information:
   ```php
   private $host = "localhost"; // Your database server
   private $db_name = "form_system"; // Your database name
   private $username = "root"; // Your database username
   private $password = ""; // Your database password
   ```
3. Make sure your web server supports `.htaccess` files

### 3. React Frontend Setup

1. Navigate to the `frontend` folder
2. Run the `npm install` command to install dependencies
3. Open the `src/App.js` file and update the API_URL variable according to your API URL:
   ```javascript
   const API_URL = 'http://your-server.com/form_system/api';
   ```
4. Run the `npm run build` command to compile the application
5. Upload the generated `build` folder to your web server

## System Usage

1. Go to the frontend application URL in your web browser
2. Fill in the form fields (First Name, Last Name, Email, Address)
3. Click the "Save" button
4. When the registration is successful, the user list on the right will be automatically updated

## File Structure

- `/api` - PHP backend files
  - `/config` - Database configuration
  - `/controllers` - API endpoint controllers
  - `/models` - Database models
- `/database` - Database schema files
- `/frontend` - React frontend application
  - `/src` - Source code
  - `/public` - Static files

## Notes

- The system automatically sets CORS headers
- All API requests receive and return data in JSON format
- Appropriate HTTP status codes and messages are returned in error situations

***************** TÜRKÇE ******************


# Form Kayıt Sistemi Kullanım Kılavuzu

Bu belge, PHP, MySQL ve React JS kullanılarak geliştirilen form kayıt sisteminin kurulum ve kullanım adımlarını içermektedir.

## Sistem Gereksinimleri

- PHP 7.4 veya üzeri
- MySQL 5.7 veya üzeri
- Node.js 14 veya üzeri (React uygulamasını derlemek için)
- Web sunucusu (Apache, Nginx vb.)

## Kurulum Adımları

### 1. Veritabanı Kurulumu

1. MySQL veritabanınızda oturum açın
2. `database/schema.sql` dosyasını çalıştırarak veritabanını ve tabloyu oluşturun
3. Gerekirse veritabanı kullanıcı adı ve şifresini oluşturun

### 2. PHP API Kurulumu

1. `api` klasörünü web sunucunuzun kök dizinine kopyalayın
2. `api/config/database.php` dosyasını açın ve veritabanı bağlantı bilgilerinizi güncelleyin:
   ```php
   private $host = "localhost"; // Veritabanı sunucunuz
   private $db_name = "form_system"; // Veritabanı adınız
   private $username = "root"; // Veritabanı kullanıcı adınız
   private $password = ""; // Veritabanı şifreniz
   ```
3. Web sunucunuzun `.htaccess` dosyalarını desteklediğinden emin olun

### 3. React Frontend Kurulumu

1. `frontend` klasörüne gidin
2. `npm install` komutunu çalıştırarak bağımlılıkları yükleyin
3. `src/App.js` dosyasını açın ve API_URL değişkenini kendi API URL'nize göre güncelleyin:
   ```javascript
   const API_URL = 'http://sizin-sunucunuz.com/form_system/api';
   ```
4. `npm run build` komutunu çalıştırarak uygulamayı derleyin
5. Oluşturulan `build` klasörünü web sunucunuza yükleyin

## Sistem Kullanımı

1. Web tarayıcınızda frontend uygulamasının URL'sine gidin
2. Form alanlarını doldurun (Ad, Soyad, Email, Adres)
3. "Kaydet" düğmesine tıklayın
4. Kayıt başarılı olduğunda, sağ taraftaki kullanıcı listesi otomatik olarak güncellenecektir

## Dosya Yapısı

- `/api` - PHP backend dosyaları
  - `/config` - Veritabanı yapılandırması
  - `/controllers` - API endpoint kontrolcüleri
  - `/models` - Veritabanı modelleri
- `/database` - Veritabanı şema dosyaları
- `/frontend` - React frontend uygulaması
  - `/src` - Kaynak kodlar
  - `/public` - Statik dosyalar

## Notlar

- Sistem CORS başlıklarını otomatik olarak ayarlar
- Tüm API istekleri JSON formatında veri alır ve döndürür
- Hata durumlarında uygun HTTP durum kodları ve mesajlar döndürülür

