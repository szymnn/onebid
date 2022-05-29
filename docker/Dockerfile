FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
  git \
  zip \
  && rm -rf /var/lib/apt/lists/*

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug soap imap calendar pdo_mysql

RUN a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.22

ENV APACHE_DOCUMENT_ROOT /app/public

COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf

RUN service apache2 restart

EXPOSE 80
