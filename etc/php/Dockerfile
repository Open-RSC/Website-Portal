FROM php:fpm

RUN apt-get update && \
    apt-get install -y --force-yes --no-install-recommends \
        libmemcached-dev \
        libz-dev \
        libzip-dev \
        zip \
        zlib1g-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        openssh-server \
        git \
        cron \
        nano \
        wget \
        curl \
        sudo \
        zip \
        unzip \
        git \
        gnupg1 \
        gnupg2 \
        gnupg \
        libicu-dev \
        libmcrypt-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install the PHP mcrypt extention (from PECL, mcrypt has been removed from PHP 7.2)
RUN pecl install mcrypt-1.0.5
RUN docker-php-ext-enable mcrypt

RUN apt-get -y install libmagickwand-dev

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP mysqli extention
RUN docker-php-ext-install mysqli

# Install the PHP pdo_pgsql extention
RUN docker-php-ext-install pdo_pgsql

# Enable PHP extension(s)
RUN docker-php-ext-enable pdo_mysql

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

#####################################
# PHP Memcached:
#####################################

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached

#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer
# Source the bash
RUN . ~/.bashrc

#####################################
# PHPUnit:
#####################################

RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

#####################################
# Laravel Schedule Cron Job:
#####################################

RUN echo "* * * * * root php /var/www/artisan schedule:run >> /dev/null 2>&1" >> /etc/cron.d/laravel-schedule
RUN chmod 0644 /etc/cron.d/laravel-schedule

#####################################
# Node.js && Yarn:
#####################################

# Node.js
ENV NODE_ENV=production
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN apt-get install -y build-essential
#RUN npm install --production
RUN curl -L https://raw.githubusercontent.com/tj/n/master/bin/n -o n
RUN bash n lts
RUN npm install -g n

# Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
   echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
   apt-get update && \
   apt-get install -qq -y build-essential yarn
RUN yarn install

#####################################
# Laravel
#####################################

RUN composer global require "laravel/installer"

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

#####################################
# Aliases:
#####################################
# docker-compose exec php-fpm dep --> locally installed Deployer binaries
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/vendor/bin/dep "$@"' > /usr/bin/dep
RUN chmod +x /usr/bin/dep
# docker-compose exec php-fpm art --> php artisan
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan "$@"' > /usr/bin/art
RUN chmod +x /usr/bin/art
# docker-compose exec php-fpm migrate --> php artisan migrate
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan migrate "$@"' > /usr/bin/migrate
RUN chmod +x /usr/bin/migrate
# docker-compose exec php-fpm fresh --> php artisan migrate:fresh --seed
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan migrate:fresh --seed' > /usr/bin/fresh
RUN chmod +x /usr/bin/fresh
# docker-compose exec php-fpm t --> run the tests for the project and generate testdox
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan config:clear\n/var/www/vendor/bin/phpunit -d memory_limit=2G --stop-on-error --stop-on-failure --testdox-text=tests/report.txt "$@"' > /usr/bin/t
RUN chmod +x /usr/bin/t
# docker-compose exec php-fpm d --> run the Laravel Dusk browser tests for the project
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan config:clear\n/bin/bash\n/usr/local/bin/php /var/www/artisan dusk -d memory_limit=2G --stop-on-error --stop-on-failure --testdox-text=tests/report-dusk.txt "$@"' > /usr/bin/d
RUN chmod +x /usr/bin/d

RUN rm -r /var/lib/apt/lists/*

RUN usermod -u 1000 www-data

WORKDIR /var/www

EXPOSE 9000

RUN apt-get install -y libbz2-dev \
    && docker-php-ext-install bz2

RUN git clone https://github.com/Imagick/imagick
RUN cd imagick && phpize && ./configure && make && make install

CMD ["php-fpm"]