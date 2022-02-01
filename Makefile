docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-build:
	docker-compose build

composer-install:
	docker-compose run --rm php-cli composer install

composer-update:
	docker-compose run --rm php-cli composer update

migrate:
	docker-compose run --rm php-cli php bin/console doctrine:migrations:migrate --no-interaction

migrate-rollback:
	docker-compose run --rm php-cli php bin/console doctrine:migrations:migrate prev

migrations-diff:
	docker-compose run --rm php-cli php bin/console doctrine:migrations:diff