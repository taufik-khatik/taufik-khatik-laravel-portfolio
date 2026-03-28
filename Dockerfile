FROM php:8.2-fpm

# System dependencies
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
    libxml2-dev \
    libpq-dev \
    nodejs npm

# Increase limits
RUN echo "upload_max_filesize=50M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=50M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=512M" >> /usr/local/etc/php/conf.d/uploads.ini

# Configure GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Refresh Install Laravel dependencies
RUN rm -rf vendor composer.lock
RUN composer install --no-dev --optimize-autoloader

# Create public directory
RUN mkdir -p public/build

# Install NPM dependencies & build assets
RUN npm install
RUN npm run build

# Storage link
RUN php artisan storage:link || true

# Cache optimize
RUN php artisan optimize:clear

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

# Run Laravel application
CMD ["sh", "-c", "php artisan migrate --force || true && php artisan serve --host=0.0.0.0 --port=${PORT}"]
