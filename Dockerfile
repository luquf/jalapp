# Image de base php + serveur apache 
FROM php:7.2-apache

LABEL Maintainer "Leo Berton"

# Copie du code php vers l'emplacement du serveur web
COPY . /var/www/html

WORKDIR /var/www/html

# Port du conteneur
EXPOSE 3000

# Driver pour MariaDB
RUN docker-php-ext-install pdo_mysql
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"
RUN composer install
RUN (cd crawler && sh ./crawler.sh)

# Lancement du serveur
CMD /usr/sbin/apache2ctl -D FOREGROUND
