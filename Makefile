include .env

start:
	docker-compose up -d

start-prod:
	docker-compose -f docker-compose.yml -f docker-compose-prod.yml up -d

stop:
	@docker-compose down -v

restart:
	@docker-compose down -v
	docker-compose up -d

restart-prod:
	@docker-compose down -v
	docker-compose -f docker-compose.yml -f docker-compose-prod.yml up -d

ps:
	docker-compose ps

logs:
	@docker-compose logs -f

# Creates a database that the user specifies the name of
# Creates a database that the user specifies the name of
# Call via "make create-mariadb db=cabbage"
create-mariadb:
	@[ "${db}" ] || ( echo ">> db is not set"; exit 1 )
	docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} -e "create database ${db};"

# Imports the specified database
# Call via "make import db=board"
import:
	@[ "${db}" ] || ( echo ">> db is not set"; exit 1 )
	docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db} < etc/board.sql

# Creates a database export of the specified database and saves to the output directory specified in the .env file.  Good for utilizing as a crontab.
# Call via "make backup-mariadb db=cabbage"
backup-mariadb:
	@[ "${db}" ] || ( echo ">> db is not set"; exit 1 )
	mkdir -p $(MYSQL_DUMPS_DIR)
	chmod -R 777 $(MYSQL_DUMPS_DIR)
	docker exec mariadb mysqldump -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db} --single-transaction --quick --lock-tables=false | zip > $(MYSQL_DUMPS_DIR)/`date "+%Y%m%d-%H%M-%Z"`-${db}.zip

# Unzips a database backup zip file in the output directory specified in the .env file and then imports it into the specified database as a database restoration from backup method
# Call via "make restore-mariadb name=20191017-0226-EDT-cabbage.zip db=cabbage"
restore-mariadb:
	@[ "${db}" ] || ( echo ">> db is not set"; exit 1 )
	@[ "${name}" ] || ( echo ">> name is not set"; exit 1 )
	unzip -p $(MYSQL_DUMPS_DIR)/${name} | docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} ${db}

# Deletes database backup zip files odler than the number of days specified. Good for utilizing as a crontab.
# Call via "clear-backups days=90"
clear-backups:
	@[ "${days}" ] || ( echo ">> days is not set"; exit 1 )
	find $(MYSQL_DUMPS_DIR)/*.zip -mtime +${days} -exec rm -f {} \;

# Truncates database log tables that account for backup size bloat on heavy bot worlds
# Call via "truncate db=uranium"
truncate:
	@[ "${db}" ] || ( echo ">> db is not set"; exit 1 )
	docker exec -i mariadb mysql -u${MARIADB_ROOT_USER} -p${MARIADB_ROOT_PASSWORD} -e "USE ${db}; TRUNCATE generic_logs; TRUNCATE droplogs; TRUNCATE chat_logs; TRUNCATE logins; TRUNCATE trade_logs;"

# Installs any missing pieces for Laravel and updates everything needed to operate
update-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && composer install && composer update && composer dump-autoload && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"
	docker exec -i php bash -c "mkdir /opt/gpg"; docker cp /opt/gpg/openrsc-gpg-public-key-2023-02-16.key php:/opt/gpg/openrsc-gpg-public-key-2023-02-16.key; docker cp /opt/gpg/openrsc-gpg-private-key-2023-02-16.key php:/opt/gpg/openrsc-gpg-private-key-2023-02-16.key; docker exec -i php bash -c "mkdir /var/www/.gnupg; chown -R www-data:www-data /var/www/.gnupg"; 

# Alias of update-laravel	
upgrade-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && composer install && composer update && composer dump-autoload && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"
	docker exec -i php bash -c "mkdir /opt/gpg"; docker cp /opt/gpg/openrsc-gpg-public-key-2023-02-16.key php:/opt/gpg/openrsc-gpg-public-key-2023-02-16.key; docker cp /opt/gpg/openrsc-gpg-private-key-2023-02-16.key php:/opt/gpg/openrsc-gpg-private-key-2023-02-16.key; docker exec -i php bash -c "mkdir /var/www/.gnupg; chown -R www-data:www-data /var/www/.gnupg"; 

# Clears the cache and routes used by Laravel
clear-all-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan view:clear && php artisan route:clear && php artisan config:cache && php artisan livewire:discover"

# Runs default database insert migrations
migrate-laravel:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan migrate --seed"

controller:
	@[ "${name}" ] || ( echo ">> name is not set"; exit 1 )
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan make:controller ${name}"

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

publish-pagination:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan vendor:publish --tag=laravel-pagination"

version:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan --version"

npm-install:
	docker exec -i php bash -c "cd /var/www/html/portal && npm install"

npm-run-dev:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run development"

npm-run-prod:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run production"

npm-run-watch:
	docker exec -i php bash -c "cd /var/www/html/portal && npm run watch"

npm-audit-fix:
	docker exec -it php bash -c "cd /var/www/html/portal && npm update && npm install & npm audit fix --force"

livewire-discover:
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan livewire:discover"

livewire:
	@[ "${name}" ] || ( echo ">> name is not set"; exit 1 )
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan livewire:make ${name}"

# Usage: make generate-model name=phpbb_topics
generate-model:
	@[ "${name}" ] || ( echo ">> name is not set"; exit 1 )
	docker exec -i php bash -c "cd /var/www/html/portal && php artisan krlove:generate:model ${name} --table-name ${name}"

# Generates passport keys
generate-passport:
	docker exec -it php bash -c "cd /var/www/html/portal && php artisan passport:keys --force"

# Creates a new tagged image in Docker Hub for the named container
# Usage: make docker-push name=openrsc/php
docker-push:
	@[ "${name}" ] || ( echo ">> name is not set"; exit 1 )
	docker tag php ${name}
	docker push ${name}