FROM php:8.3-apache
WORKDIR /var/www/html
COPY . .
RUN if [ -f composer.json ]; then \
      curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
      composer install --no-dev --optimize-autoloader --no-interaction; \
    fi
EXPOSE 80
