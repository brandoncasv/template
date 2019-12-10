FROM ubuntu

ARG DEBIAN_FRONTEND=noninteractive

RUN  apt-get update && \
     apt-get -y install \
             software-properties-common

RUN add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get -y install \
            curl \
            apache2 \
            php7.4-fpm \
            php7.4-common \
            php7.4-mysql \
            php7.4-xml \
            php7.4-xmlrpc \
            php7.4-curl \
            php7.4-gd \
            php7.4-imagick \
            php7.4-cli \
            php7.4-dev \
            php7.4-imap \
            php7.4-mbstring \
            php7.4-soap \
            php7.4-zip \
            php7.4-bcmath \
       --no-install-recommends && \
       apt-get clean && \
       rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN a2enmod proxy_fcgi

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    composer clear-cache

WORKDIR /app

EXPOSE 80

CMD ["/usr/sbin/apachectl","-DFOREGROUND"]
