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
