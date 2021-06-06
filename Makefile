start:
	php artisan serve --host 0.0.0.0 --port 8000

install:
	composer install

generate-ide-helper:
	php artisan ide-helper:generate
	php artisan ide-helper:models -n
	php artisan ide-helper:meta
