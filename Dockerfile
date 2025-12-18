# Используем PHP 8.3-fpm (как на сервере)
FROM php:8.3-fpm

# Устанавливаем зависимости для PostgreSQL
RUN apt update && apt install -y \
    libpng-dev \
    zip \
    unzip \
    curl \
    git \
    iproute2 \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql gd \
    && apt clean

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы проекта
WORKDIR /var/www
COPY . /var/www

# Устанавливаем зависимости Composer
RUN composer install

# Устанавливаем права на папки
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Настраиваем PHP-FPM для работы на всех интерфейсах
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Запускаем PHP-FPM
CMD ["php-fpm"]
