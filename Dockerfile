FROM php:8.1.0-apache

RUN apt-get update
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql