# Use official PHP image as the base

FROM php:8.3-fpm
 
# Set working directory

WORKDIR /var/www
 
# Install system dependencies

RUN apt-get update && apt-get install -y \

    build-essential \

    libpng-dev \

    libjpeg-dev \

    libfreetype6-dev \

    libzip-dev \

    zip \

    unzip \

    git \

    curl \

    libonig-dev \

    libxml2-dev \

    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip
 
# Install Composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
 
# Copy application files

COPY . /var/www
 
# Install PHP dependencies

RUN composer install --no-dev --optimize-autoloader
 
# Set permissions for Laravel

RUN chown -R www-data:www-data /var/www \

    && chmod -R 775 /var/www/storage \

    && chmod -R 775 /var/www/bootstrap/cache
 
# Expose port 80

EXPOSE 80
 
# Configure PHP-FPM to listen on port 80

RUN sed -i 's/listen = .*/listen = 0.0.0.0:80/' /usr/local/etc/php-fpm.d/www.conf
 
# Start PHP-FPM

CMD ["php-fpm"]

 