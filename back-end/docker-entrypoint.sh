
echo "copy .env file:"
file="./.env"
if [ -f "$file" ]
then
	echo "$file found."
	cp $file ./.env.example
	echo ".env created"
fi

echo "Composer install"
composer install

echo "Run Migration"
php artisan migrate

echo "Run Server"
php-fpm

