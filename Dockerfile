# Usa una imagen base de PHP 8.1 con Apache
FROM php:8.1-apache

# Instala las dependencias necesarias para MySQL, oniguruma y las extensiones de PHP
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    libonig-dev && \
    docker-php-ext-install intl mysqli pdo pdo_mysql mbstring && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita el módulo mod_rewrite para que funcione .htaccess
RUN a2enmod rewrite

# Copia el contenido de tu proyecto al contenedor
COPY . /var/www/html

# Configura los permisos para evitar problemas con CodeIgniter
RUN chown -R www-data:www-data /var/www/html/writable /var/www/html/cache /var/www/html/logs
RUN chmod -R 775 /var/www/html/writable /var/www/html/cache /var/www/html/logs

# Configura Apache para que apunte a la carpeta 'public'
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Reinicia Apache para aplicar cambios de configuración
RUN service apache2 restart

# Expone el puerto 80 para el servidor web
EXPOSE 80
