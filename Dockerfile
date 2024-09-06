# Use official PHP image as the base
FROM php:8.1-fpm
 
# Set working directory
WORKDIR /var/www
 
# Install dependencies
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
 
# Copy application code
COPY . /var/www
 
# Install dependencies
RUN composer install --no-dev --optimize-autoloader
 
# Set permissions
RUN chown -R www-data:www-data /var/www
 
# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]