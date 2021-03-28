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
- If running on Linux web server user (most likely *www-data* if server is *apache*) should have read/write permissions to *storage* folder.
- Rename *.env.example* to *.env* and update file with database name, user and password.
- Run ***php artisan migrate:refresh --seed*** to install database.
- Open application in browser and login with default user - ***username:*** *admin* and ***password:*** *password*.

## Development

- Assuming previous *Install* process completed run ***npm install*** to install *nodejs* dependencies.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
