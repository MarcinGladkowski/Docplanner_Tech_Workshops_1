FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    git

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN mkdir -p /usr/src/app

COPY composer.json /usr/src/app

WORKDIR /usr/src/app

RUN composer install --no-interaction

CMD ["make"]
