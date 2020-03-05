FROM php:7.4-apache

RUN apt-get update && \
        DEBIAN_FRONTEND=noninteractive \
        apt-get install --no-install-recommends -y \
        tcpdump \
        && \
        docker-php-ext-install pdo_mysql

COPY insecure-php.ini "$PHP_INI_DIR/php.ini"
COPY --chown=www-data:www-data app /var/www/html/
