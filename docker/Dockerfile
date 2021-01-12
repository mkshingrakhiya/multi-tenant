FROM php:7.2-fpm
LABEL MAINTAINER="Mayur Shingrakhiya <mk.shingrakhiya@gmail.com>"

WORKDIR /var/www/html

ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="1"
ENV PHP_OPCACHE_MAX_ACCELERATED_FILES="10000"
ENV PHP_OPCACHE_MEMORY_CONSUMPTION="192"
ENV PHP_OPCACHE_MAX_WASTED_PERCENTAGE="10"

COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN apt-get update && \
    apt-get install -y libgmp-dev libpng-dev libzip-dev zip unzip && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install gmp pdo pdo_mysql zip gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer