FROM php:7.0-apache

RUN docker-php-ext-install mysqli

RUN a2enmod authn_dbd
RUN apt-get update
RUN apt-get install apache2-utils libaprutil1-dbd-mysql -y
