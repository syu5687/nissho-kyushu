FROM php:8.1-apache
ENV PORT=8080
EXPOSE 8080

# Cloud Run用Apache設定
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
 && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-enabled/000-default.conf \
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

# ファイル配置
COPY . /var/www/html

# 画像ダウンロード（ビルド時にimagesフォルダへ保存）
RUN mkdir -p /var/www/html/images \
 && BASE_D="https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR" \
 && BASE_C="https://storage.googleapis.com/studio-cms-assets/projects/V5a7YYeBOR" \
 && wget -q "${BASE_D}/s-1465x258_1007db99-2b96-4d1b-8472-5f6623972276.svg"                              -O /var/www/html/images/logo.svg \
 && wget -q "${BASE_D}/s-2400x1396_v-frms_webp_5034dde9-9369-43b0-984f-cb3e4fe2d4d1.webp"               -O /var/www/html/images/hero-bg.webp \
 && wget -q "${BASE_D}/s-2400x1346_v-frms_webp_ad3de673-d261-4f4f-b84e-163729fe412f_regular.webp"        -O /var/www/html/images/wwd-1.webp \
 && wget -q "${BASE_D}/s-2400x1600_v-frms_webp_bba089a2-99c4-4d56-82b5-e1f7d4d19d5a_regular.webp"        -O /var/www/html/images/careers-bg.webp \
 && wget -q "${BASE_D}/s-2400x1601_v-frms_webp_71d7df83-1c9c-4bb5-b669-4961a63a828b_regular.webp"        -O /var/www/html/images/service-processing.webp \
 && wget -q "${BASE_D}/s-2000x1333_v-frms_webp_7426cce6-4028-47b0-b6e7-1c1076c22510.webp"               -O /var/www/html/images/service-facility.webp \
 && wget -q "${BASE_D}/s-2400x1600_v-frms_webp_f8955ed2-f57e-4ffc-bc1a-c49b07cb2084.webp"               -O /var/www/html/images/company-hero.webp \
 && wget -q "${BASE_D}/s-2000x1333_v-frms_webp_b74bbffa-6560-49ae-a3fa-fc1c803f7f1b.webp"               -O /var/www/html/images/company-mission.webp \
 && wget -q "${BASE_C}/s-2000x1333_v-frms_webp_05c06e4d-a1bf-465c-b370-3fe2e1d0748c_middle.webp"         -O /var/www/html/images/news-1.webp \
 && wget -q "${BASE_C}/s-1502x1020_v-fms_webp_68e25568-8424-47bc-8e8e-028c2a370c47_middle.webp"          -O /var/www/html/images/news-2.webp \
 && echo "Images: $(ls /var/www/html/images/ | wc -l) files downloaded"

# パーミッション
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html \
 && chmod 666 /var/www/html/data/news.json
