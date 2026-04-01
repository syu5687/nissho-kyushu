FROM php:8.1-apache
RUN a2enmod rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN docker-php-ext-install mbstring
COPY . /var/www/html/
RUN chmod -R 777 /var/www/html/data
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' /etc/apache2/sites-enabled/000-default.conf
EXPOSE 8080
CMD ["apache2-foreground"]
