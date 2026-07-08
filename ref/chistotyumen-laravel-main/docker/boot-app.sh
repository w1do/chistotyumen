#!/bin/sh
set -eu
cd /var/www/html

# migrate first: CACHE_STORE=database needs `cache` table before optimize:clear
php artisan migrate --force
php artisan optimize:clear
php artisan seo:generate-sitemap
php artisan optimize
