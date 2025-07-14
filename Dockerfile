FROM php:8.2-apache

ENV DEBIAN_FRONTEND=noninteractive

# Instala dependências do sistema e wkhtmltopdf
RUN apt-get update && apt-get install -y \
    wkhtmltopdf \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    zip \
    git \
    curl \
    libxrender1 \
    libfontconfig1 \
    xfonts-base \
    xfonts-75dpi \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Habilita o módulo rewrite do Apache
RUN a2enmod rewrite

# Instala o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Aponta o DocumentRoot para /var/www/html/public (Laravel)
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Copia o código da aplicação para dentro do container
COPY . /var/www/html

# Copia o script de ajuste do snappy
COPY scripts/config_snappy.sh /var/www/html/scripts/config_snappy.sh
RUN chmod +x /var/www/html/scripts/config_snappy.sh

# Instala as dependências do Laravel via Composer
RUN composer install --no-interaction --optimize-autoloader

# Publica os arquivos de configuração do Snappy
RUN php artisan vendor:publish --provider="Barryvdh\\Snappy\\ServiceProvider" --force || true

# Ajusta o caminho dos binários do Snappy
RUN /var/www/html/scripts/config_snappy.sh

# Corrige permissões para os diretórios de cache e armazenamento
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache public \
    && chmod -R 775 storage bootstrap/cache public

EXPOSE 80

CMD ["apache2-foreground"]
