@echo off
call composer install
call npm install
call php artisan key:generate
call php artisan migrate --seed
call php artisan serve
PAUSE