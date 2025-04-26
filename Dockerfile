FROM php:8.2-fpm
RUN docker-php-ext-install bcmath

# Установка необходимых зависимостей
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libmariadb-dev \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Установка расширений PHP для MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /var/www

# Копируем Laravel проект из src/
COPY src/ /var/www
