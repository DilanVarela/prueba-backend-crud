# CRUD DOC

# Requirements

* PHP 7.3 or newer required

* a Database (With `XAMPP` isn't neccesary) i.e : 
    * MySQL (5.1+) via the MySQLi driver
    * PostgreSQL via the Postgre driver
    * SQLite3 via the SQLite3 driver
    * MSSQL via the SQLSRV driver (version 2005 and above only)

* [XAMPP]('https://www.apachefriends.org/download.html')

# Process

* After install XAMPP (if is necesary) go to `xampp\htdocs` and copy\clone repo here.

* `Start option MySQL` in `XAMPP Control Panel`

* Configure database in env archive (copy `env_example` and rename like `.env`) or `App\Config\Database`.

* In the root of the repo open a terminal and execute `php spark migrate`, with that command run all migrations.

* For run seeders: 
    * `php db:seed CountrySeeder`
    * `php db:seed StateSeeder`
    * `php db:seed CitySeeder`

* Execute serve with `php spark serve`

* Open site in ` http://localhost:8080`