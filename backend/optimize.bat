@echo off
echo Optimizing Laravel application...

echo Clearing caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo Optimizing application...
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo Optimizing autoloader...
composer dump-autoload -o

echo Optimization completed!
pause
