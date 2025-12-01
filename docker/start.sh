#!/bin/bash

# Iniciar cron
cron

# Iniciar PHP-FPM
php-fpm -D

# Iniciar Nginx en primer plano
nginx -g 'daemon off;'
