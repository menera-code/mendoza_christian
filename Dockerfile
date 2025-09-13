FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy app files
COPY . /var/www/html/

# Set the document root to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache config to use /public as root
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

# Install PHP dependencies
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
