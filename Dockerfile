FROM php:8.2-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends libicu-dev libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_sqlite sqlite3 gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

COPY . .

RUN mkdir -p writable/cache writable/database writable/logs writable/session writable/uploads public/uploads/avatars \
    && chmod -R 777 writable public/uploads

ENV CI_ENVIRONMENT=production

CMD ["sh", "-c", "php spark migrate --all && php spark db:seed PosSeeder && php spark serve --host 0.0.0.0 --port ${PORT:-8080}"]
