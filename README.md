# Website-Portal
Website portal that links to the various games running the Open RSC framework

# Setup
## Prerequisites
You will need:
- PHP 8.x
- Composer 2+ (use latest version)
- phpBB3 (optional due to a known workaround)

## Instructions
- Set up PHP for development.
   - Download and install [PHP 8](https://windows.php.net/download#php-8.0). On Windows, you simply extract the ZIP file to your install directory (usually `C:\Program Files`, but check `PATH`). Once this is done, run `php -v` in a terminal and you should see version 8.x.
   - In your PHP folder, rename `php.ini-development` to `php.ini`. This is the `php.ini` file that the CLI and Composer will be using.
   - Add the following extensions to your `php.ini` file (this seems to be necessary for the latest version of Composer to work):
      - `extension=php_openssl.dll`
      - `extension=php_fileinfo.dll`
   - Uncomment the `extension_dir = "ext"` line in your `php.ini` file.
   - Uncomment the `extension=pdo_mysql` line in your `php.ini` file.
- In your local MySQL/MariaDB server, create an empty database named `laravel`. This allows `php artisan` commands to work later on. If there is a more correct way of getting the `laravel` database, update this readme.
- In a terminal, `cd` into the `portal` directory.
- Run `cp .env.example .env`. This creates your `.env` file for the `portal` app.
- In your `portal/.env` file, change the `DB_HOST` to `127.0.0.1` and then run `php artisan config:clear` in a terminal.
- Run `composer install`.
- Run `php artisan key:generate`.
- Run `php artisan migrate`.
- Run `php artisan db:seed`.
- Finally, run `php artisan serve`. The site should now be accessible at http://127.0.0.1:8000.

## Compiling SASS
To see changes to `.scss` files on your local site, you need to compile SASS. To do this:
- In a terminal, `cd` into the `portal` directory.
- Run `npm ci`. This only needs to be done once.
- Run `npm run dev`. This runs Laravel Mix, which compiles front-end files.

## Troubleshooting

### Error `SQLSTATE[42S02]: Base table or view not found: 1146 Table 'board.phpbb_posts' doesn't exist` seen when loading local site
You'll need to install phpBB3 towards your local MySQL/MariaDB server, which will create the necessary tables. If that isn't feasible, a workaround is to comment out the `$news_feed` code in `HomeController.php`.

### Errors regarding cabbage, uranium, or other databases
They probably do not exist in your local MySQL server. Either create empty databases for each or comment out the code in `HomeController.php` that fetches the online player count (and set the `_online` variables returned to the view to an empty string `''`).

### Error `Could not open input file: artisan` when running `php artisan` commands
Make sure you are `cd`'d into the `portal` directory, then try again.