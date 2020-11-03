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

## Code Exam 2
```
Open online php editor(https://repl.it/languages/php_cli) and paste the code below:
```
<?php

/****************** 
* Code Test 2
*****************/

// random generator function
function randomNumbers($lastRange){
  $random_number_array = range(0, 10);
  $from = 0;
  shuffle($random_number_array );
  $randNumber = array_slice($random_number_array ,$from, $lastRange);
  return $randNumber;
}


/* 
* Problem 1
* Pick 2 random numbers and calculate sum
*/
function sumTwoNumbers(){
  $randomNumbers = randomNumbers(2);
  $totalSum = array_sum($randomNumbers);
  return $totalSum;
}
print_r(sumTwoNumbers());



/* 
* Problem 2
* Sort method - access an order parameters (ASC, DESC), and returns a
result sorted based on the parameter
*/

function sortNumber($sortType){
  $sortedNumbers = [];
  $randomNumbers = randomNumbers(10);

  switch ($sortType) {
    case "asc":
      asort($randomNumbers);
      break;

    case "desc":
      rsort($randomNumbers);
      break;
    default:
      asort($randomNumbers);
  }
  if (array($randomNumbers)) {
    foreach($randomNumbers as $x_num) {
      $sortedNumbers[] = $x_num;
    }
  }
  return $sortedNumbers;
}
// pass the value of 'asc' and 'desc'
print_r(sortNumber('asc'));


/* 
* Problem 3
* Average method - returns the average of all the value of the integers
inside the property array
*/

function getAverage(){
  $arrayProps = randomNumbers(10);
  $average = 0;
  if(count($arrayProps)) {
     $average = array_sum($arrayProps)/count($arrayProps);
  }
  return $average;
}
print_r(getAverage());



/* 
* Problem 4
* Create a class that inherits the main class and override the sum
method and inisde the override method calculate the sum of the start and
last indexes of the array
*/

class BaseClass {
  public $range;
  public function __construct($range) {
    $this->range = $range;
  }

}

class Inheritor extends BaseClass {
  public $range;
  public function __construct($range) {
    $this->name = $range;
  }
  public function calculate() {

    $random_number_array = range(0, 10);
    $from = 0;
    shuffle($random_number_array );
    $randNumber = array_slice($random_number_array ,$from, $this->range);

    $toArrays = array($randNumber);
    $calculateFirstAndLastArray = current($randNumber) + end($randNumber);

    print_r($calculateFirstAndLastArray);
  }
}

$inheritClass = new Inheritor(10);
$inheritClass->calculate();





