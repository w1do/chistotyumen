# Laravel + Octane (Swoole) + Vite — multi-stage production image
# Runtime: PHP 8.4 CLI Alpine, Swoole, OPCache, Supervisor (Octane on :8000)

########## STAGE: PHP + PECL build deps ##########
FROM php:8.4-cli-alpine AS php-base

ENV APP_ENV=production \
    APP_DEBUG=false \
    COMPOSER_ALLOW_SUPERUSER=1

RUN apk add --no-cache \
        git \
        bash \
        unzip \
        icu-dev \
        libzip-dev \
        oniguruma-dev \
        zlib-dev \
        sqlite-dev \
        brotli-libs \
        openssl \
        curl \
        supervisor \
        nodejs \
        npm \
    && docker-php-ext-install intl pcntl bcmath zip pdo_mysql pdo_sqlite

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
        brotli-dev \
        openssl-dev \
        pkgconf \
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && apk del .build-deps

RUN docker-php-ext-enable opcache

RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.enable_cli=1"; \
    echo "opcache.memory_consumption=256"; \
    echo "opcache.interned_strings_buffer=16"; \
    echo "opcache.max_accelerated_files=20000"; \
    echo "opcache.validate_timestamps=0"; \
} > /usr/local/etc/php/conf.d/opcache.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

########## STAGE: Composer + npm + Vite ##########
FROM php-base AS build

COPY package.json package-lock.json ./
RUN npm ci

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY . .

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && npm run build \
    && rm -rf node_modules \
    && rm -rf /root/.npm

########## STAGE: runtime (no Node) ##########
FROM php:8.4-cli-alpine AS runtime

ENV APP_ENV=production \
    APP_DEBUG=false

RUN apk add --no-cache \
        bash \
        curl \
        icu-dev \
        libzip-dev \
        oniguruma-dev \
        zlib-dev \
        sqlite-dev \
        brotli-libs \
        openssl \
        supervisor \
    && docker-php-ext-install intl pcntl bcmath zip pdo_mysql pdo_sqlite

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
        brotli-dev \
        openssl-dev \
        pkgconf \
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && apk del .build-deps

RUN docker-php-ext-enable opcache

RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.enable_cli=1"; \
    echo "opcache.memory_consumption=256"; \
    echo "opcache.interned_strings_buffer=16"; \
    echo "opcache.max_accelerated_files=20000"; \
    echo "opcache.validate_timestamps=0"; \
} > /usr/local/etc/php/conf.d/opcache.ini

WORKDIR /var/www/html

COPY --from=build /var/www/html /var/www/html

COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/supervisor/conf.d/ /etc/supervisor/conf.d/

COPY docker/boot-app.sh /usr/local/bin/boot-app.sh
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/boot-app.sh /usr/local/bin/docker-entrypoint.sh

RUN rm -rf tests .github \
    && addgroup -g 1000 www \
    && adduser -u 1000 -G www -g www -s /bin/sh -D www \
    && touch database/database.sqlite \
    && chown -R www:www /var/www/html

EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=5s --retries=3 CMD \
    curl -fsS http://127.0.0.1:8000/up >/dev/null || exit 1

CMD ["/usr/local/bin/docker-entrypoint.sh"]
