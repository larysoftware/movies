FROM php:8.2-apache

ARG VHOST_CONF_PATH

RUN a2enmod ssl
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql
RUN echo "Copying virtual host config"
COPY ${VHOST_CONF_PATH} /etc/apache2/sites-enabled/.
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
install-php-extensions gd xdebug
RUN mkdir -p /var/www/application
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/application/

