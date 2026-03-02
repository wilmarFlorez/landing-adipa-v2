# ── Stage 1: Build frontend assets ─────────────────────────────────────────────
FROM node:24-alpine AS frontend

WORKDIR /app

RUN npm install -g pnpm@10

COPY package.json pnpm-lock.yaml ./
RUN pnpm install --frozen-lockfile

COPY gulpfile.cjs ./
COPY resources/js resources/js
COPY resources/stylus resources/stylus

RUN pnpm build

# ── Stage 2: PHP 8.3 + Apache ──────────────────────────────────────────────────
FROM php:8.3-apache

# System dependencies
RUN apt-get update && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Enable URL rewriting
RUN a2enmod rewrite

# Point Apache document root at Laravel's public/ folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf

# Fly.io expects port 8080
RUN sed -i 's/Listen 80$/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' \
        /etc/apache2/sites-available/000-default.conf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# PHP dependencies (no dev, skip post-install scripts that need .env)
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --optimize-autoloader \
        --no-scripts \
        --no-interaction

# Application source
COPY . .

# Compiled assets from the frontend stage
COPY --from=frontend /app/public/css public/css
COPY --from=frontend /app/public/js  public/js

# Writable directories for www-data
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 755 storage bootstrap/cache

EXPOSE 8080
