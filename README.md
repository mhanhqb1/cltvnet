composer install
php artisan migrate
php artisan db:seed --class=DefaultDataSeeder
php artisan storage:link
