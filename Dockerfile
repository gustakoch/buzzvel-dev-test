FROM php:8.0-apache

WORKDIR /var/www/html

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone

RUN apt-get update -y && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libldap2-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    graphviz

RUN apt-get clean

RUN apt-get install -y libpq-dev libcurl4-openssl-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_mysql gd

RUN apt-get update && \
    apt-get install -y libmagickwand-dev --no-install-recommends && \
    rm -rf /var/lib/apt/lists/*

RUN pecl install imagick && \
    docker-php-ext-enable imagick

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN apt-get -y update && apt-get install -y
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN    echo "xdebug.mode=debug" >>  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.client_host=host.docker.internal" >>  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.start_with_request=yes" >>  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.remote_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.default_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN a2enmod rewrite

EXPOSE 80
