FROM php:7.4-fpm-alpine

ENV APP_HOME /var/www/html

RUN docker-php-ext-install mysqli pdo_mysql

RUN apk add --no-cache composer
RUN apk add --no-cache bash curl git vim nano openssh
RUN apk add mariadb-client

COPY . ${APP_HOME}

RUN chown -R www-data:www-data $APP_HOME \
    && chmod -R 777 ${APP_HOME}/storage

RUN composer install --no-interaction --no-dev --no-scripts

WORKDIR ${APP_HOME}

EXPOSE 9000
CMD ["php-fpm"]