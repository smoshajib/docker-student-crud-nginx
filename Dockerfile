FROM php:8.1-fpm

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files
WORKDIR /var/www/html
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]



