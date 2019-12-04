install:
	composer install
update:
	composer update
clear:
	php artisan cache:clear; php artisan view:clear; php artisan route:clear; php artisan config:clear
clear-cache:
	php artisan cache:clear
clear-conf:
	php artisan config:clear
clear-route:
	php artisan route:clear
clear-view:
	php artisan view:clear
migrate:
	php artisan migrate
key:
	php artisan key:generate
