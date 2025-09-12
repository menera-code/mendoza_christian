# Use official PHP with Apache
FROM php:8.0-apache

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Enable Apache rewrite module (important for Lavalust routes)
RUN a2enmod rewrite
