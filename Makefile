include .env

start:
	docker-compose up -d

start-prod:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d

stop:
	@docker-compose down -v

restart:
	@docker-compose down -v
	docker-compose up -d

restart-prod:
	@docker-compose down -v
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d

ps:
	docker-compose ps

logs:
	@docker-compose logs -f

# Creates a database that the user specifies the name of
# Call via "make create db=board"
create:
	docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} -e "create database ${db};"

# Imports the specified database
# Call via "make import db=board"
import:
	docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db} < etc/board.sql

# Creates a database export of the specified database and saves to the output directory specified in the .env file. Good for utilizing as a crontab.
# Call via "make backup db=board"
backup:
	mkdir -p $(MYSQL_DUMPS_DIR)
	chmod -R 777 $(MYSQL_DUMPS_DIR)
	docker exec mariadb mysqldump -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db} --single-transaction --quick --lock-tables=false | zip > $(MYSQL_DUMPS_DIR)/`date "+%Y%m%d-%H%M-%Z"`-${db}.zip

# Unzips a database backup zip file in the output directory specified in the .env file and then imports it into the specified database as a database restoration from backup method
# Call via "make restore name=20191017-0226-EDT-cabbage.zip db=cabbage"
restore:
	unzip -p $(MYSQL_DUMPS_DIR)/${name} | docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db}

# Deletes database backup zip files odler than the number of days specified. Good for utilizing as a crontab.
# Call via "clear-backups days=90"
clear-backups:
	find $(MYSQL_DUMPS_DIR)/*.zip -mtime +${days} -exec rm -f {} \;

update-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && composer install && composer update && composer dump-autoload && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix && npm install -g npm"

clear-all-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan view:clear && php artisan route:clear && php artisan config:cache"

migrate-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan migrate --seed"

make-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan make:controller MyController"

list-route:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan route:list"

clear-views:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan view:clear"

clear-route:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan route:clear"

migrate:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan migrate"

migrate-refresh:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan migrate:refresh"

clear-config:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan config:cache"

publish-pagination:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan vendor:publish --tag=laravel-pagination"

version:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan --version"

npm-install:
	docker exec -i php bash -c "cd /var/www/html/portal && npm install"

npm-run-dev:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run dev"

npm-run-prod:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run prod"

npm-run-watch:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run watch"

# Usage: make generate-model name=phpbb_topics
generate-model:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan krlove:generate:model ${name} --table-name ${name}"