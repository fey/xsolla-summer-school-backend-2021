start:
	php artisan serve --host 0.0.0.0 --port 8000

install:
	composer install

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover coverage/logs/clover.xml

lint:
	composer exec phpcs

lint-fix:
	composer exec phpcbf

generate-ide-helper:
	php artisan ide-helper:generate
	php artisan ide-helper:models -n
	php artisan ide-helper:meta
