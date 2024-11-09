# use PHP 8.2
FROM php:8.2-fpm

#COPY composer.lock composer.json /var/www/toDoApp/

WORKDIR /var/www/toDoApp

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libgd-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-external-gd
RUN docker-php-ext-install gd

# Install MongoDB extension
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
#RUN groupadd -g 1000 www
#RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/toDoApp

RUN composer clear-cache
RUN composer install

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/toDoApp

RUN chmod -R 775 /var/www/toDoApp/storage /var/www/toDoApp/bootstrap

# Install Node.js and npm (add the NodeSource repository)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs=20.10.0-1nodesource1

RUN php artisan migrate
RUN php artisan db:seed

RUN npm install
RUN npm run dev

# Change current user to www
#USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
