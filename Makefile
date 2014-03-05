ENV = "dev"

usage:
	@echo "make install - to install on dev";
	@echo "make sync - to synchronize developpers current code";
	@echo "make deploy-configure - to configure app before deployment";
	@echo "make deploy-install - to install on production";
	@echo "make deploy-update - to update on production";
	@echo "make test-all - install test env & launch phpunit and behat validations";

configure:
	@if test ! -f app/config/parameters.yml; then echo "app/config/parameters.yml is missing"; exit 1; fi
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --prefer-dist
	app/console assets:install web
	app/console assetic:dump --env=prod

install:
	app/console doctrine:database:create --env=$(ENV)
	app/console doctrine:schema:create --env=$(ENV)
	app/console doctrine:fixture:load --no-interaction --env=$(ENV)

update:
	app/console cache:clear --env=$(ENV)


## Production

deploy-configure: ENV = "prod"
deploy-configure: configure

deploy-install: ENV = "prod"
deploy-install: install

deploy-update: ENV = "prod"
deploy-update: update

## Test

test-install: ENV = "test"
test-install: install

test-all: test-install test-phpunit test-behat test-clean

test-clean:
	app/console doctrine:database:drop --env=test --force

test-behat:
	bin/behat

test-phpunit:
	bin/phpunit -c app/


## Development task

ai:
	app/console assets:install web

cs:
	phpcs --extensions=php -n --standard=PSR2 --report=full src

cs-fixer:
	php-cs-fixer fix src

cc:
	rm -rf app/cache/*

refresh:
	app/console doctrine:fixture:load --no-interaction
	app/console cache:clear --env=prod

refresh-orm:
	app/console doctrine:fixtures:load --no-interaction
