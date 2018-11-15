# Image de base php + serveur apache 
FROM php:7.2-apache

LABEL Maintainer "Leo Berton"

# Copie du code php vers l'emplacement du serveur web
COPY . /var/www/html

WORKDIR /var/www/html

# Port du conteneur
EXPOSE 3000

# Installation des dépendances
RUN php composer.phar install

# Driver pour MariaDB
RUN docker-php-ext-install pdo_mysql

# Lancement du serveur
CMD /usr/sbin/apache2ctl -D FOREGROUND