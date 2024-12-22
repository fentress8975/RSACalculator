FROM php:8.3-fpm-alpine

RUN apk add --no-cache curl git build-base zlib-dev oniguruma-dev autoconf bash gmp-dev
RUN apk add --update linux-headers
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli;
RUN docker-php-ext-install gmp && docker-php-ext-enable gmp;


ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; \
    then \
      pecl install xdebug && docker-php-ext-enable xdebug; \
    fi;


WORKDIR /var/www/html