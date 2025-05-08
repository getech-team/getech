# Utilise l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copie les fichiers de ton projet dans le dossier web d'Apache
COPY . /var/www/html/

# Donne les bons droits aux fichiers
RUN chown -R www-data:www-data /var/www/html

# Active les modules Apache nécessaires (si besoin)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Active mod_rewrite (utile pour certaines routes)
RUN a2enmod rewrite

# Expose le port 80
EXPOSE 80
