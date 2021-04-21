FROM php7.4-fpm-alpine

RUN apk add mysql mysql-client

# Install Composer
RUN curl -sSL http://getcomposer.org/installer | php \
&& mv composer.phar /usr/local/bin/composer \
&& chmod +x /usr/local/bin/composer

WORKDIR /var/www/html