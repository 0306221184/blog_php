FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Copy source code to the container's working directory
COPY . /var/www/html

# Enable Apache mod_rewrite (useful for URL rewriting)
RUN a2enmod rewrite

# Install any additional PHP extensions (if needed)
RUN docker-php-ext-install mysqli

# Expose port 80 for Apache
EXPOSE 80
