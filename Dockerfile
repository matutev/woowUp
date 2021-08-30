FROM php:7.4-apache
WORKDIR /var/www/html

RUN  apt-get update \
&& apt-get install -y libzip-dev \
&& docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require --update-no-dev phpunit/phpunit ^9
