# Airport Reviews API

Kindly follow the below given instructions in order to setup this code. Moreover the requirements 
are also mentioned below together with API endpoint documentations


## System Requirements

- PHP version 5.5.9 or higher
- MySQL
- Apache or Nginx Server
 
## Configuration

Open a file named .env and update the configuration following conguration 

```
DB_CONNECTION=mysql
DB_HOST=<HOST>
DB_PORT=3306
DB_DATABASE=<DATABASENAME>
DB_USERNAME=<DATABASE USERNAME>
DB_PASSWORD=<DATABASE PASSWORD>
```
Example 

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=airport-reviews2
DB_USERNAME=root
DB_PASSWORD=password
```

## Installation

Open terminal or command prompt and execute the following command by changing your path to directory of this api

```
php composer.phar install
```
Create a database with same name as the one mentioned in .env file DB_DATABASE=<DATABASENAME> and execute following command
in terminal/command prompt

```
php artisan migrate
```
It will show the migrations that have executed successfully

## Loading Data

Use the following command for loading data from CSV file
```
php artisan load:csv
```
By default the above command with check in current folder and filename "airport.csv" but using following option is can be
overriden

```
php artisan load:csv --filename=/path/to/file/file.csv
```


## Endpoints

- **[<code>GET</code> All Airport Statistics](https://github.com/RazaChohan/airport-reviews-api/blob/development/api-documentation/AllStatsEndpoint.md)**
- **[<code>GET</code> Airport Statistics](https://github.com/RazaChohan/airport-reviews-api/blob/development/api-documentation/AirportStats.md)**
- **[<code>GET</code> Airport Reviews](https://github.com/RazaChohan/airport-reviews-api/blob/development/api-documentation/AirportReviews.md)**







