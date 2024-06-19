FROM php:8.2-fpm

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    librabbitmq-dev \
    && pecl install amqp \
    && docker-php-ext-enable amqp \
    && apt-get clean \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /app

# Changing the UID and GID of an existing www-data user.
ARG PUID=1000
ARG PGID=1000

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

COPY --chown=www-data:www-data . .

# Changing directory owner.
RUN chown -R www-data:www-data /app

# Switch to user www-data
USER www-data
