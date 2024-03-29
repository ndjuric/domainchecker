FROM php:apache

RUN apt-get update \
  && apt-get install -y --no-install-recommends libpq-dev whois \
  && docker-php-ext-install pdo_pgsql pdo_mysql \
  && a2enmod rewrite \
  && service apache2 restart

ADD ./config/apache2.conf /etc/apache2/sites-available/000-default.conf
