FROM php:8.1-apache
ENV PORT=8080
EXPOSE 8080

# Cloud Run用Apache設定
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
 && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-enabled/000-default.conf \  ← これを追加
 && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# .htaccess対応とmod_rewrite
RUN a2enmod rewrite \
 && sed -i "s/AllowOverride None/AllowOverride All/" /etc/apache2/apache2.conf

# /var/www/html にアクセス許可
RUN printf '%s\n' \
  '<Directory /var/www/html>' \
  '    Options Indexes FollowSymLinks' \
  '    AllowOverride All' \
  '    Require all granted' \
  '</Directory>' >> /etc/apache2/apache2.conf

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html