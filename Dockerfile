# Stage 1: Composer Dependencies
FROM composer:2 as composer_stage
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: PHP + Laravel
FROM php:8.2-fpm

# System Dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev

# PHP Extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip

WORKDIR /var/www/html

# Copy Laravel App
COPY . .

# Copy Vendor
COPY --from=composer_stage /app/vendor ./vendor

# Permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
