# cara menggunakan laravel 8
pertama install compose terlebih dahulu\
lalu jalankan perintah berikut
```
cd samset-salma-app
rm composer.json
cp composer-8.json composer.json
composer install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up
```