#!/bin/sh
set -e

mkdir -p storage/framework/views storage/framework/cache/data storage/framework/sessions storage/logs

echo "Running database migrations..."
php artisan migrate --force

echo "Starting web server..."
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
