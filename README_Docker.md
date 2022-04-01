# cara menggunakan Docker
**note: perintah berikut dijalankan pada terminal linux/wsl**\
pertama install compose terlebih dahulu\
lalu jalankan perintah berikut
```
cd samset-salma-app
composer install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up
```
untuk merefresh database(create ulang default), jalankan perintah berikut
```
./vendor/bin/sail artisan migrate:refresh --seed
```
untuk menghentikan docker, jalankan perintah berikut
```
./vendor/bin/sail stop
```
