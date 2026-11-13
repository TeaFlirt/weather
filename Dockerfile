FROM php:8.4-fpm-alpine

# Установка расширений
RUN apk add --no-cache \
    postgresql-dev \
    nginx \
    nodejs \
    npm \
    && docker-php-ext-install pdo_pgsql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD ["php-fpm"]