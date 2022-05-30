install:
	@make composer
	@make docker-compose
	@make stop-server
	@make start-server

composer:
	@composer install

docker-compose:
	@#docker-compose up -d
	@docker-compose --env-file .env.dev.local up -d database

start-server:
	@echo "-----------> Lancement du server"
	@symfony serve -d

stop-server:
	@echo "-----------> Arrêt du server"
	@symfony server:stop

debug-router:
	php bin/console debug:router

db-create:
	@echo "-----------> Création de la base"
	@php bin/console doctrine:database:create

db-drop:
	@echo "-----------> Suppression de la base"
	@php bin/console doctrine:database:drop --force