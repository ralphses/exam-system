# Set the base image
FROM php:8.1-fpm-alpine

# Install required packages
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
    && docker-php-ext-enable \
        opcache \
        gd

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Set permissions for storage directory
RUN chmod -R 775 storage

# Install Composer and dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --no-progress --prefer-dist

# Set environment variables
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Configure Apache
RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80
