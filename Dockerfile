FROM php:8.3-fpm

# تثبيت dependencies المطلوبة
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx

# تنظيف
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# تثبيت PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إعداد Nginx
COPY docker/nginx-default.conf /etc/nginx/sites-available/default

# نسخ ملفات المشروع
COPY . /var/www/html
WORKDIR /var/www/html

# إعداد permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# تشغيل الأوامر الأساسية
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# تشغيل الـ migrations (مع --force للتشغيل التلقائي)
RUN php artisan migrate --force

EXPOSE 80
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]