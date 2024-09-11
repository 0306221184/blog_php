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

# Copy source code to the container's working directory
COPY . /var/www/html

# Enable Apache mod_rewrite (useful for URL rewriting)
RUN a2enmod rewrite

RUN npm install

# Install any additional PHP extensions (if needed)
RUN docker-php-ext-install mysqli

# Expose port 80 for Apache
EXPOSE 80

# Run the application
CMD ["apache2-foreground"]
