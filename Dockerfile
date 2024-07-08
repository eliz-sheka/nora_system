FROM php:8.2-fpm

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt update \
    && apt install -y --no-install-recommends \
        default-mysql-client \
        git \
        libmagickwand-dev \
        libpng-dev \
        libssl-dev \
        libxml2-dev \
        libzip-dev \
        nodejs \
        unzip \
        vim \
        zip \
        zlib1g-dev \
    && docker-php-ext-install bcmath exif gd pdo_mysql pcntl soap sockets zip > /dev/null \
    && pecl install imagick xdebug \
    && docker-php-ext-enable imagick xdebug \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/nora
