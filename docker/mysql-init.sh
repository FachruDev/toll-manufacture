#!/bin/bash

# Inisialisasi MySQL dan import database tolldb.sql
echo "Starting MySQL initialization..."

# MySQL service sudah berjalan, tidak perlu start lagi
echo "MySQL service should already be running..."

# Wait for MySQL to be ready
until mysql -u root -e "SELECT 1" >/dev/null 2>&1; do
    echo "Waiting for MySQL to start..."
    sleep 2
done

echo "MySQL is ready!"

# Create database tolldb
mysql -u root -e "CREATE DATABASE IF NOT EXISTS tolldb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Create MySQL user for the application
mysql -u root -e "CREATE USER IF NOT EXISTS 'laravel'@'localhost' IDENTIFIED BY 'laravel123';"
mysql -u root -e "GRANT ALL PRIVILEGES ON tolldb.* TO 'laravel'@'localhost';"
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'laravel'@'localhost' WITH GRANT OPTION;"
mysql -u root -e "FLUSH PRIVILEGES;"

# Import database jika file tolldb.sql ada
if [ -f "/var/www/html/tolldb.sql" ]; then
    echo "Importing tolldb.sql..."
    mysql -u root tolldb < /var/www/html/tolldb.sql
    echo "Database imported successfully!"
else
    echo "tolldb.sql file not found, skipping import..."
fi

# Create phpMyAdmin database tables
if [ -f "/var/www/phpmyadmin/sql/create_tables.sql" ]; then
    mysql -u root < /var/www/phpmyadmin/sql/create_tables.sql
fi

echo "MySQL initialization completed!"
