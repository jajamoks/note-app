# ToDo List/ Note App + with Burndown Chart - Laravel, Vue.js & Vue-chart.js
Allows users to register, log in, and create tasks that are saved against their account. It includes the dynamic burndown chart, that displays the number of tasks that were not yet completed at each minute in the last hour.
## Installation Steps
**Clone the repo**
```
https://github.com/jajamoks/note-app.git note-app && cd note-app
```
**Run composer install**
```
composer install
```
**Run npm install**
npm install
```
**Create .env**
```
cp .env.example .env
```
**Generate APP_KEY**
```
php artisan key:generate
```

**Configure MySQL connection details in .env**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database name}
DB_USERNAME={database user}
DB_PASSWORD={database password}
```
**Run database migrations and seeders**
```
php artisan migrate:reset
php artisan migrate
```
## Running the application
Run the using:
```
php artisan serve
```

## PHPUnit Test
To run the unit test, go to the project root and run unit test feature
```
phpunit
```
