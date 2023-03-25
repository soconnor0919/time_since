FROM php:8-apache
RUN apt-get update && apt-get upgrade -y

# COPY WEB SRC
COPY ./src/ /var/www/html/

# PHP CONFIGURATION
COPY ./config/php.ini /usr/local/etc/php/php.ini

# APACHE CONFIGURATION
COPY ./config/web.conf /etc/apache2/sites-available/web.conf
RUN a2dissite 000-default.conf
RUN a2ensite web.conf
RUN a2enmod rewrite

# FILE PERMISSIONS
RUN find /var/www/html/ -type d -exec chmod 755 {} \;
RUN find /var/www/html/ -type f -exec chmod 644 {} \;
