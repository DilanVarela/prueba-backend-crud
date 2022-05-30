# CRUD DOC

# Requirements

* PHP 7.3 or newer required

* a Database (With `XAMPP` isn't neccesary) i.e : 
    * MySQL (5.1+) via the MySQLi driver
    * PostgreSQL via the Postgre driver
    * SQLite3 via the SQLite3 driver
    * MSSQL via the SQLSRV driver (version 2005 and above only)

* [XAMPP]('https://www.apachefriends.org/download.html')

* [Composer]('https://getcomposer.org/download/')

# Process

* After install XAMPP (if is necesary) go to `xampp\htdocs` and copy\clone repo here.

* Open php.ini file and decomment (delete ; ) or add `extension=php_intl.dll`

* Execute `composer install` and install project dependencies

* `Start option MySQL AND APACHE` in `XAMPP Control Panel`

* Configure database in env archive (copy `env_example` and rename like `.env`) or `App\Config\Database`. You configure database name and tables in `http://localhost/phpmyadmin`

* If you use .env remember delete each # in the line of database config or by default `App\Config\Database` is execute

* In the root of the repo open a terminal and execute `php spark migrate`, with that command run all migrations.

* For run seeders: 
    * `php spark db:seed CountrySeeder`
    * `php spark db:seed StateSeeder`
    * `php spark db:seed CitySeeder`

* Execute serve with `php spark serve`

* Open site in ` http://localhost:8080`