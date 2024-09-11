# Use the official PHP image with Apache
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install Node.js and npm
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    && curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

# Install MySQL server and PHP MySQL extension
RUN apt-get update && apt-get install -y \
    mysql-server \
    && docker-php-ext-install mysqli \
    && apt-get clean

# Copy source code and SQL initialization file to the container's working directory
COPY . /var/www/html
COPY init.sql /docker-entrypoint-initdb.d/init.sql

# Enable Apache mod_rewrite (useful for URL rewriting)
RUN a2enmod rewrite

# Install npm dependencies
RUN npm install

# Expose port 80 for Apache
EXPOSE 80

# Start both Apache and MySQL
CMD ["sh", "-c", "service mysql start && apache2-foreground"]
