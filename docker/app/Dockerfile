FROM php:fpm

MAINTAINER fedor108@gmail.com

RUN cd /usr/local/bin && curl -sS https://getcomposer.org/installer | php
RUN cd /usr/local/bin && mv composer.phar composer

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libmcrypt-dev \
    git \
    zip \
    vim \

&& docker-php-ext-install \
    iconv \
    mcrypt \
    pdo \
    pdo_mysql \
    zip

ENV PATH $HOME/.composer/vendor/bin:$PATH

COPY ./app.ini /usr/local/etc/php/conf.d/

