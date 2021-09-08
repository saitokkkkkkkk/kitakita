FROM php:7.3-apache

RUN apt-get update -y
RUN apt-get install -y zip unzip vim

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Install Node
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Install npm
RUN npm install npm@latest -g

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change DOCUMENT_ROOT
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Enable rewrite_mod.
RUN a2enmod rewrite