FROM php:7.4-fpm-alpine


RUN docker-php-ext-install mysqli pdo_mysql

RUN apk add --no-cache composer
RUN apk add --no-cache bash curl git vim nano openssh
RUN apk add mariadb-client

WORKDIR /var/www/html