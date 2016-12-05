FROM geshan/php-composer-alpine
WORKDIR /var/www
COPY . /var/www
RUN composer install --prefer-dist
CMD php example.php