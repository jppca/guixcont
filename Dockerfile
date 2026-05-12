# =========================================================
# FRONTEND BUILD
# =========================================================
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# =========================================================
# PHP + NGINX
# =========================================================
FROM php:8.3-fpm

# =========================================================
# SYSTEM DEPENDENCIES
# =========================================================
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    nano \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        intl \
        gd

# =========================================================
# COMPOSER
# =========================================================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================================================
# APP
# =========================================================
WORKDIR /var/www/html

COPY . .

# =========================================================
# INSTALL PHP DEPENDENCIES
# =========================================================
RUN composer install --no-dev --optimize-autoloader

# =========================================================
# COPY FRONTEND BUILD
# =========================================================
COPY --from=frontend /app/public/build ./public/build

# =========================================================
# LARAVEL STORAGE
# =========================================================
RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# =========================================================
# PERMISSIONS
# =========================================================
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# =========================================================
# NGINX CONFIG
# =========================================================
COPY docker/nginx.conf /etc/nginx/sites-available/default

# =========================================================
# EXPOSE PORT
# =========================================================
EXPOSE 80

# =========================================================
# START CONTAINER
# =========================================================
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
