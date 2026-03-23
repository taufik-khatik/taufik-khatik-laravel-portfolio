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
    libxml2-dev

# Configure GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install gd pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install
RUN npm run dev

# Run migrations and seeders
RUN php artisan migrate --force
RUN php artisan db:seed --force

# Clear caches and optimize Laravel
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan view:clear || true
RUN php artisan route:clear || true
RUN php artisan optimize:clear || true
RUN php artisan storage:link || true

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT}"]
