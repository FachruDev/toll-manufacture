#!/bin/bash

echo "=== Toll Manufacture Docker Container Starting ==="

# Set timezone
ln -snf /usr/share/zoneinfo/Asia/Jakarta /etc/localtime
echo "Asia/Jakarta" > /etc/timezone

# Create necessary directories
mkdir -p /var/log/supervisor
mkdir -p /var/run/mysqld
mkdir -p /var/lib/mysql-files

# Fix MariaDB directory permissions
chown -R mysql:mysql /var/lib/mysql
chown -R mysql:mysql /var/run/mysqld
chmod 755 /var/run/mysqld

# Initialize MySQL/MariaDB if needed
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "Initializing MariaDB database..."
    mariadb-install-db --user=mysql --datadir=/var/lib/mysql --skip-test-db
fi

# Start MySQL temporarily to run initialization
echo "Starting MariaDB for initialization..."
mariadbd-safe --user=mysql &
MYSQL_PID=$!

# Wait for MariaDB to be ready
echo "Waiting for MariaDB to be ready..."
until mariadb-admin ping >/dev/null 2>&1; do
    echo -n "."
    sleep 1
done
echo "MariaDB is ready!"

# Run MySQL initialization script
if [ -f "/docker-entrypoint-initdb.d/mysql-init.sh" ]; then
    echo "Running MariaDB initialization script..."
    bash /docker-entrypoint-initdb.d/mysql-init.sh
fi

# Stop MariaDB temporarily
echo "Stopping temporary MariaDB instance..."
mariadb-admin shutdown
wait $MYSQL_PID

# Copy Docker environment file
if [ -f "/var/www/html/.env.docker" ]; then
    echo "Using Docker environment configuration..."
    cp /var/www/html/.env.docker /var/www/html/.env
fi

# Setup Laravel
cd /var/www/html

echo "Setting up Laravel application..."

# Generate application key if not exists
php artisan key:generate --force

# Clear and cache configurations (skip errors)
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force || true

# Cache configurations for better performance (skip if error)
php artisan config:cache || echo "Skipping config cache due to errors"
php artisan route:cache || echo "Skipping route cache due to errors"
php artisan view:cache || echo "Skipping view cache due to errors"

# Set proper permissions
chown -R www-data:www-data /var/www/html
chown -R www-data:www-data /var/www/phpmyadmin
chmod -R 755 /var/www/html
chmod -R 777 /var/www/html/storage
chmod -R 777 /var/www/html/bootstrap/cache

echo "=== Starting all services with Supervisor ==="

# Start supervisor which will manage all services
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
