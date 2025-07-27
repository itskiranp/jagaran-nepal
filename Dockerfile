# Use the official PHP 8.2 Apache image
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev libpng-dev libjpeg-dev libonig-dev libxml2-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip mbstring bcmath tokenizer xml gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all project files into the container
COPY . /var/www/html

# Fix permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ensure .env file exists (won't overwrite if already there)
RUN cp .env.example .env || true

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies (no dev dependencies, skip scripts)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Set the Apache DocumentRoot to Laravel's /public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expose port 80 to the web
EXPOSE 80

# Start Apache when the container starts
CMD ["apache2-foreground"]
