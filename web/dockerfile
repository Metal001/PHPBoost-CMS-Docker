FROM php:8.2-apache

# Mise à jour de la liste des paquets et installation des bibliothèques nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zlib1g-dev \
    && docker-php-ext-install mysqli gd \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copier le contenu de phpboost
COPY ./phpboost /var/www/html

# Changement des permissions pour Apache et du répertoire de cache
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && chmod -R 775 /var/www/html/cache

# Expose le port 80 et 443
EXPOSE 80 443
