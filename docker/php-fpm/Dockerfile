FROM php:8.2-fpm-alpine

# Устанавливаем системные зависимости
RUN apk update && apk add --no-cache \
    bash \
    curl \
    git \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    redis \
    autoconf \
    g++ \
    make \
    postgresql-dev \
    libmagic \
    file \
    re2c \
    dpkg \
    dpkg-dev

# Устанавливаем расширения PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath zip xml \
    && pecl install redis \
    && docker-php-ext-enable redis

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем пользовательский php.ini
COPY ./docker/php-fpm/php.ini /usr/local/etc/php/conf.d/custom.ini

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Указываем команду для запуска PHP-FPM
CMD ["php-fpm"]
