FROM php:7.2-apache


COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
RUN a2enmod authn_dbd
RUN apt-get update -y 
RUN apt-get update -y && apt-get install -y apache2-utils libaprutil1-dbd-mysql libpng-dev libgmp-dev zip unzip libz-dev libzip-dev
RUN docker-php-ext-install mysqli gd
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install zlib zip