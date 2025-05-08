# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean

# Activer mod_rewrite pour Apache (si nécessaire)
RUN a2enmod rewrite

# Copier les fichiers de l'application dans le conteneur
COPY ./public /var/www/html/

# Installer Composer pour gérer les dépendances PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances via Composer
WORKDIR /var/www/html
RUN composer install

# Exposer le port 80
EXPOSE 80
