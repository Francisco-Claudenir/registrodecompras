FROM php:7.4-fpm

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    cron

RUN docker-php-ext-install pgsql pdo pdo_pgsql

ADD . /var/www

RUN chown -R www-data:www-data /var/www

RUN apt-get update && \
     apt-get install -y \
         libzip-dev \
         && docker-php-ext-install zip

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install pgsql pdo pdo_pgsql

RUN docker-php-ext-install gd

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http
