git clone https://github.com/leobravoe/laravel-dsw2-2024-2.git

cd laravel-dsw2-2024-2

composer update

php artisan key:generate

Configurar o arquivo .env com o nome da base de dados "restaurantedb"

php artisan reset-database
