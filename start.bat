@echo off
call composer install
call npm install
call npm run build
call php artisan key:generate
call php artisan storage:link
call php artisan migrate:fresh --seed
call php artisan serve
PAUSE