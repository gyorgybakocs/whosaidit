CI_COMPOSE_PATH := "environment/ci.yml"
DEV_COMPOSE_PATH := "environment/dev.yml"
PROJECT_NAME := "wsifriend"

provision:
	docker-compose -f $(CI_COMPOSE_PATH) build --no-cache
up: dotenv
	docker-compose -f $(DEV_COMPOSE_PATH) up --detach
down:
	docker-compose -f $(DEV_COMPOSE_PATH) down --remove-orphans
setup-apache:
	docker exec -it ubuntu sh -c "a2dissite 000-default.conf; a2ensite whosaiditfriends.com.conf; a2enmod rewrite; /etc/init.d/apache2 start"
laravel:
	docker exec -it ubuntu sh -c "cd environment/laravel; chmod -R 775 setup.sh; ./setup.sh"
setup-mariadb:
	docker exec -it ubuntu sh -c "/etc/init.d/mysql start; cd environment/MariaDB; chmod -R 775 setup_sql.sh; ./setup_sql.sh"
dotenv:
	cp environment/env/.env frontend/.env
migrate:
	docker exec -it ubuntu sh -c "cd /var/www/whosaiditfriends.com; php artisan migrate"
load-mariadb:
	docker exec -it ubuntu sh -c "cd environment/MariaDB; chmod -R 775 load_sql.sh; ./load_sql.sh"

all: provision up setup-apache laravel setup-mariadb migrate load-mariadb
