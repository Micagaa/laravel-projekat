@echo off
call composer install
call npm install
call php artisan key:generate
call php artisan migrate:fresh --seed
call php artisan serve
PAUSE