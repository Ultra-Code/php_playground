FROM php:8.3.1-fpm-alpine

RUN apk add --no-cache composer=2.6.6-r0

# To enable building pdo_pgsq
RUN apk add --no-cache libpq-dev=16.1-r0 && docker-php-ext-install pdo pdo_pgsql

RUN apk add --no-cache php83-pecl-xdebug=3.3.1-r0

WORKDIR /var/www
