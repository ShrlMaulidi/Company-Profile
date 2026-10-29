#!/usr/bin/env bash
# Deploy ulang di server: jalankan dari folder proyek dengan ./deploy.sh
set -e

php artisan down
# Website tetap dinyalakan lagi walaupun salah satu langkah gagal
trap 'php artisan up' EXIT

git pull origin main
composer install --no-dev --optimize-autoloader --no-interaction
npm ci
npm run build
php artisan migrate --force
php artisan optimize
