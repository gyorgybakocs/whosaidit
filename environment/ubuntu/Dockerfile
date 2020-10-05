FROM ubuntu:20.04

FROM ubuntu

ARG DEBIAN_FRONTEND=noninteractive
ARG domain=whosaiditfriends.com

RUN apt-get update \
    && apt-get upgrade -y \
    && apt install -y syslog-ng syslog-ng-core \
    && apt install -y inetutils-traceroute \
    && apt install -y apache2 apache2-utils \
    && apt install -y mariadb-server mariadb-client \
    && apt install -y php7.4 libapache2-mod-php7.4 php7.4-mysql php-common php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline \
    && echo "ServerName whosaiditfriends.com" >> /etc/apache2/apache2.conf \
    && echo "172.22.0.2 whosaiditfriends.com" >> /etc/hosts

RUN apt-get install -y unzip php-xdebug curl php7.4-curl vim less php-xml php-mbstring \
	&& curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/composer \
	&& mkdir -m 777 /.composer \
	&& composer global require "hirak/prestissimo:^0.3" --no-update \
	&& composer global install

RUN apt-get install -y npm

COPY ./apache/$domain.conf /etc/apache2/sites-available/$domain.conf
COPY ./apache/$domain.ssl.conf /etc/apache2/sites-available/$domain.ssl.conf
COPY ./apache/apache2.conf /etc/apache2/apache2.conf
ADD ./syslog/config/syslog-ng.conf /etc/syslog-ng/syslog-ng.conf
