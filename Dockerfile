FROM php:apache

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update; \
    apt-get install -y libpq5 libpq-dev; \
    docker-php-ext-install pdo pdo_pgsql; \
    apt-get autoremove --purge -y libpq-dev; \
    apt-get clean ; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*    

RUN a2enmod rewrite

COPY api.php /var/www/html/api.php
COPY .htaccess /var/www/html/.htaccess
