# Favorite Countries

Favorite Countries app will fetch countries from [restcountries](https://restcountries.eu) and allow a user to mark them as favorite or store comments for favorite countries.

## Technologies

- PHP (Laravel)
- JavaScript (VueJS / Axios)
- Database (MySQL)
- HTML/CSS (Bootstrap / Custom small scss modifications).

## Install

- Download app as zip file or use git to clone repository.
- Navigate to the root path of extracted/cloned folder.
- Run ***composer install*** to install dependencies and ***composer dump-autoload*** to autoload PHP files.
- If running on Linux, web server user (most likely *www-data* if server is *apache*) should have read/write permissions to *storage* folder.
- Rename *.env.example* to *.env* and update file with database *name*, *user*, *password*.
- Run ***php artisan key:generate*** to generate app key and ***php artisan config:cache*** to cache .env file changes.
- Run ***php artisan migrate:refresh --seed*** to install database.
- Open application in browser and login with default user - ***username:*** *admin* ***password:*** *password*.
- You can use built in PHP web server for demo. Just run ***php artisan serve*** and visit provided url in you browser.

## Development

- Assuming previous *Install* process completed run ***npm install*** to install *nodejs* dependencies.
