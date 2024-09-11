# Use the official PHP 8.1 Apache image
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install Node.js, npm, and MySQL
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    lsb-release \
    && curl -fsSL https://dev.mysql.com/get/mysql-apt-config_0.8.22-1_all.deb -o mysql-apt-config.deb \
    && DEBIAN_FRONTEND=noninteractive dpkg -i mysql-apt-config.deb \
    && apt-get update && apt-get install -y mysql-server \
    && curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

# Copy source code to the container's working directory
COPY . /var/www/html

# Enable Apache mod_rewrite (useful for URL rewriting)
RUN a2enmod rewrite

# Install PHP extensions (mysqli for MySQL support)
RUN docker-php-ext-install mysqli

# Install npm dependencies
RUN npm install

# Expose port 80 for Apache
EXPOSE 80

# Set MySQL environment variables
ENV MYSQL_ROOT_PASSWORD=844466Tinrootpassword@
ENV MYSQL_DATABASE=spiderum_clone_db
ENV MYSQL_USER=tinwana
ENV MYSQL_PASSWORD=844466tin

# Copy local SQL dump into the container for data migration (if needed)
COPY ./src/data/spiderum_clone_sql_generation.sql /docker-entrypoint-initdb.d/

# Start both Apache and MySQL services using a bash script
CMD service mysql start && apache2-foreground
