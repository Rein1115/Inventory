# Dockerfile for Laravel MVC deployment on Render
 
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
 
# Copy nginx configuration (optional if using nginx)
# COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
 
# Expose port 80 for Render
EXPOSE 80
 
# Start PHP-FPM server
CMD ["php-fpm"]