FROM php:8.3-apache

RUN apt-get update && apt-get install -y libssl1.0-dev

COPY . /var/www/html/

CMD ["apache2-foreground"]
