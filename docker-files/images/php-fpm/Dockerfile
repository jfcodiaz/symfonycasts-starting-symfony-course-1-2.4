FROM php:7.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
# RUN apt-get update && apt-get install -y \
#    mysql-client 
    
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
# RUN docker-php-ext-install mysql mbstring zip exif pcntl

# Add user for laravel application

RUN apt-get update && apt-get install \
    curl \
    zlib1g-dev \
    libzip-dev \
    mariadb-client \
    -y  &&\
    curl -sS https://getcomposer.org/installer | php \
    && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install mysqli zip pdo_mysql

EXPOSE 9000
CMD ["php-fpm"]