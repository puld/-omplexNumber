FROM php:7.4-cli

RUN docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-install pcntl

RUN apt-get update && apt-get upgrade -y && apt-get install -y zip unzip wget

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
#RUN wget https://phar.phpunit.de/phpunit-9.5.8.phar \
#    && chmod +x phpunit-latest.phar \
#    && ./phpunit-latest.phar --version

COPY . /usr/src/app
WORKDIR /usr/src/app