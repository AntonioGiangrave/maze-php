FROM php:7.4-fpm-alpine

RUN apk add --no-cache \
      libzip-dev \
      zip \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer



COPY . /mnt
WORKDIR /mnt

ENTRYPOINT ["/bin/sh"]

EXPOSE 9090
