FROM php:apache

RUN docker-php-ext-install pdo pdo_mysql
    
RUN a2enmod rewrite

COPY api.php /var/www/html/api.php
COPY .htaccess /var/www/html/.htaccess
