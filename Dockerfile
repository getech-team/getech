# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les dépendances nécessaires pour PHP et Apache
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean

# Activer mod_rewrite pour Apache (si nécessaire)
RUN a2enmod rewrite

# Copier tous les fichiers du projet dans le répertoire de travail du conteneur
COPY . /var/www/html/

# Installer Composer pour gérer les dépendances PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances PHP via Composer
WORKDIR /var/www/html
RUN composer install

# Copier le fichier .env dans le répertoire du conteneur
COPY .env /var/www/html/.env

# Exposer le port 80 pour Apache
EXPOSE 80
