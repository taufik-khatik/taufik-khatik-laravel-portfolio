# Use official PHP 8.3 with Apache
FROM php:8.3-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# Install PHP extensions
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    && docker-php-ext-install gd intl pdo pdo_mysql pdo_pgsql zip mbstring fileinfo

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www/html

WORKDIR /var/www/html

# Install PHP dependencies (composer install)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Fix Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
