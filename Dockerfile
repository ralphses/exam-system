# Use an official PHP runtime as a parent image
FROM php:8.1-fpm-alpine

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed dependencies
RUN apk update && apk add --no-cache \
    zlib-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    git \
    curl \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy supervisor configuration file
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions for storage and bootstrap/cache directories
RUN chmod -R 775 storage bootstrap/cache

# Expose port 9000
EXPOSE 9000

# Start supervisord
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
