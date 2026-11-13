FROM php:8.3-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && printf '%s\n' '<Directory /var/www/html>' '    AllowOverride All' '</Directory>' \
        > /etc/apache2/conf-available/app-htaccess.conf \
    && a2enconf app-htaccess

WORKDIR /var/www/html

COPY . .

EXPOSE 80
