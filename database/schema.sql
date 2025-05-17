-- MySQL veritabanı şeması
-- Form Kayıt Sistemi için veritabanı ve tablo oluşturma

-- Veritabanı oluşturma
CREATE DATABASE IF NOT EXISTS form_system;

-- Veritabanını kullanma
USE form_system;

-- Kullanıcı bilgileri tablosu
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    adres TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Veritabanı için kullanıcı oluşturma (güvenlik için)
-- GRANT ALL PRIVILEGES ON form_system.* TO 'form_user'@'localhost' IDENTIFIED BY 'form_password';
-- FLUSH PRIVILEGES;
