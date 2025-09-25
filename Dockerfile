# Multi-service container dengan PHP 8.2, Apache, MariaDB, dan phpMyAdmin
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    unzip \
    zip \
    git \
    supervisor \
    cron \
    default-mysql-server \
    default-mysql-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mysqli \
        gd \
        zip \
        bcmath \
        exif \
        pcntl \
        mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set Composer environment
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_NO_INTERACTION=1

# Enable Apache modules
RUN a2enmod rewrite ssl

# Install Node.js dan NPM untuk Vite
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Download dan install phpMyAdmin secara manual
WORKDIR /tmp
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip \
    && unzip phpMyAdmin-5.2.1-all-languages.zip \
    && mv phpMyAdmin-5.2.1-all-languages /var/www/phpmyadmin \
    && rm phpMyAdmin-5.2.1-all-languages.zip \
    && chown -R www-data:www-data /var/www/phpmyadmin \
    && chmod -R 755 /var/www/phpmyadmin

# Set working directory ke aplikasi Laravel
WORKDIR /var/www/html

# Copy aplikasi Laravel
COPY . /var/www/html/

# Remove Laravel Pail dari composer.json (dev dependency yang bermasalah)
RUN sed -i '/"laravel\/pail"/d' /var/www/html/composer.json

# Create required directories
RUN mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/storage/framework/cache \
    && mkdir -p /var/www/html/storage/framework/sessions \
    && mkdir -p /var/www/html/storage/framework/views \
    && mkdir -p /var/www/html/bootstrap/cache

# Set permissions first
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/bootstrap/cache

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies dan build
RUN npm install && npm run build

# Fix Apache permissions
RUN chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /var/www/phpmyadmin

# Expose ports
EXPOSE 80 3306

# Copy configuration files
COPY docker/apache-config.conf /etc/apache2/sites-available/000-default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/mysql-init.sh /docker-entrypoint-initdb.d/
COPY docker/entrypoint.sh /entrypoint.sh
COPY docker/phpmyadmin-config.inc.php /var/www/phpmyadmin/config.inc.php

# Make scripts executable
RUN chmod +x /entrypoint.sh /docker-entrypoint-initdb.d/mysql-init.sh

# Start services dengan supervisor
CMD ["/entrypoint.sh"]
