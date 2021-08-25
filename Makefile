setup:
	cp -n .env.example .env
	touch database/database.sqlite
	make install
	php artisan key:gen
	php artisan migrate:fresh --seed

start:
	php artisan serve --host 0.0.0.0 --port 8000

install:
	composer install

check: lint test

ci-check: lint test-coverage

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

compose-build:
	docker-compose build

compose-start:
	docker-compose start --abort-on-container-exit

compose-down:
	docker-compose down

compose-clear:
	docker-compose down -v

compose-bash:
	docker-compose run --rm app bash

prod-build:
	docker-compose -f docker-compose.production.yml build app

prod-push:
	docker-compose -f docker-compose.production.yml push app

ci:
	make compose-build
	docker-compose -f docker-compose.yml -p xsolla-summer-school-backend-2021-ci run --rm app make setup
	docker-compose -f docker-compose.yml -p xsolla-summer-school-backend-2021-ci up --abort-on-container-exit

deploy-heroku:
	heroku git:remote -a feycot-xsolla-2021
	git push heroku HEAD:master

deploy-prod:
	make -C ansible deploy
