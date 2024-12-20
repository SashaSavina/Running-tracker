FROM php:8.1-fpm

# Установка необходимых расширений PHP
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js и npm (если нужно)
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs npm

# Копирование проекта
WORKDIR /var/www/html
COPY . .

# Установка зависимостей
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Настройка прав
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80