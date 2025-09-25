# Toll Manufacture Docker Setup

Docker container yang berisi semua komponen yang dibutuhkan untuk menjalankan aplikasi Toll Manufacture:
- PHP 8.2 + Apache
- MySQL Database
- phpMyAdmin
- Laravel Application

## Cara Menjalankan

### 1. Build dan Run Container

```bash
# Build container
docker-compose build

# Run container
docker-compose up -d

# Atau build dan run sekaligus
docker-compose up -d --build
```

### 2. Akses Aplikasi

- **Laravel Application**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8080/phpmyadmin

### 3. Database Access

**Melalui phpMyAdmin:**
- URL: http://localhost:8080/phpmyadmin
- Username: `laravel` atau `root`
- Password: `laravel123` (untuk laravel) atau kosong (untuk root)

**Melalui MySQL Client:**
```bash
mysql -h 127.0.0.1 -P 3306 -u laravel -p tolldb
# Password: laravel123
```

### 4. Development

Untuk development, Anda bisa mount source code:

```yaml
volumes:
  - .:/var/www/html
  - ./storage:/var/www/html/storage
  - ./bootstrap/cache:/var/www/html/bootstrap/cache
```

**Permission issues:**
```bash
# Fix permissions dari dalam container
docker-compose exec toll-manufacture bash
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 777 /var/www/html/storage
chmod -R 777 /var/www/html/bootstrap/cache
```
