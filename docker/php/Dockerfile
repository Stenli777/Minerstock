FROM php:8.2.1-fpm-alpine3.17 AS runtime

# Install runtime packages
RUN apk add --no-cache --upgrade \
        freetype \
        icu \
        libintl \
        libjpeg-turbo \
        libpng \
        libzip \
        openssl-dev \
        tzdata \
        libzip-dev \
        vim \
        nano \
        libxslt-dev

ENV PHP_REDIS_VERSION=5.3.0

# Install php modules
RUN apk add --no-cache --virtual .build-deps \
        autoconf \
        curl-dev \
        freetype-dev \
        g++ \
        gcc \
        icu-dev \
        icu-libs \
        libjpeg-turbo-dev \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        make \
        oniguruma-dev \
        zlib-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        calendar \
        curl \
        exif \
        gd \
        intl \
        mbstring \
        opcache \
        pcntl \
        pdo \
        pdo_mysql \
        xml \
        zip \
        xsl \
    && apk del .build-deps
RUN docker-php-ext-enable xsl

# Setup working directory
WORKDIR /var/www

#COPY "php/php-config-custom.ini" "/usr/local/etc/php/conf.d/php-config-custom.ini"
FROM runtime AS composer

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

FROM composer AS dev

ENV XDEBUG_VERSION=2.9.6

RUN apk add --no-cache --virtual .build-deps \
        autoconf \
        gcc \
        g++ \
        make \
    && apk del .build-deps

#COPY --chown=www-data:www-data ./php/storage /var/www/storage

FROM composer AS builder

#COPY --chown=www-data:www-data ./php /var/www

#RUN composer install

FROM runtime AS release

COPY php.ini $PHP_INI_DIR/conf.d/zz-fine-tuning.ini

CMD ["php-fpm"]

COPY --chown=www-data:www-data --from=builder /var/www /var/www
