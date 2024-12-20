FROM php:8.1-fpm

RUN docker-php-ext-install pdo_mysql mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage

ENV APP_ENV=production
ENV APP_KEY=base64:YOUR_APP_KEY
ENV DB_HOST=mysql
ENV DB_PORT=3306
ENV DB_DATABASE=your_database_name
ENV DB_USERNAME=your_database_user
ENV DB_PASSWORD=your_database_password

CMD ["php-fpm"]