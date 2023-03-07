FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install pgsql pdo pdo_pgsql
