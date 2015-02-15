# MySQL-CRUD-API

Simple PHP script that adds a very basic API to a MySQL database.

## Requirements

  - PHP 5.3 or higher with MySQLi enabled
  - Apache Lighttpd or Nginx

## Limitations

  - Authentication or authorization is not included
  - Single database

## Features

  - Single PHP file, easy to deploy.
  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Condensed JSON: first row contains field names
  - Blacklist support for tables (and columns, todo)
  - JSONP support for cross-domain requests
  - Combined requests with support for multiple table names
  - Relationship detection and filtering on foreign keys
  - Pagination, sorting and search support

## Configuration

Edit the following lines in the bottom of the file "api.php":

```
$api = new MySQL_CRUD_API(
	"localhost",                        // hostname
	"user",                             // username
	"pass",                             // password
	"db",                               // database
	false,                              // whitelist
	array("users"=>"crudl")             // blacklist
);
$api->executeCommand();
```

## Usage

You can do all CRUD (Create, Read, Update, Delete) operations and extra List operation. Here is how:

### List

List all records of a database table.

```
GET http://localhost/api.php/categories
GET http://localhost/api.php/categories,users
GET http://localhost/api.php/cate*
GET http://localhost/api.php/cate*,user*
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]]}}
```

### List + Pagination

The "page" parameter holds the requested page. The default page size is 20, but can be adjusted (e.g. to 50):

```
GET http://localhost/api.php/categories?page=1
GET http://localhost/api.php/categories?page=1,50
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]],"results":2}}
```

### List + Filter

Search is implemented with the "filter" parameter. You need to specify the column name, a colon and the value you want to filter on. The filter match type is "start" by default, but can easily be adjusted. These are supported:

  - start (string starts with value)
  - end (string end with value)
  - any (string contains value)
  - exact (string or number matches exactly)
  - lower (number is lower than value)
  - upto (number is lower than or equal to value)
  - from (number is higher than or equal to value)
  - higher (number is higher than value)
  - in (number is in comma seperated list of values)

```
GET http://localhost/api.php/categories?filter=name:Inter
GET http://localhost/api.php/categories?filter=name:Internet&match=exact
GET http://localhost/api.php/categories?filter=id:1&match=upto
GET http://localhost/api.php/categories?filter=id:2&match=lower
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"]]}}
```

### List + Order

With the "order" parameter you can sort. By default the sort is in ascending order, but by specifying "desc" this can be reversed:

```
GET http://localhost/api.php/categories?order=name,desc
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["3","Web development"],["1","Internet"]]}}
```

### Create

You can easily add a record using the POST method. The call returns the "last insert id".

```
POST http://localhost/api.php/categories
{"id":"1","name":"Internet"}
```

Output:

```
1
```

### Read

If you want to read a single object you can use:

```
GET http://localhost/api.php/categories/1
```

Output:

```
{"id":"1","name":"Internet"}
```

### Update

Editing a record is done with the PUT method. The call returns the rows affected.

```
PUT http://localhost/api.php/categories/2
{"id":"1","name":"Internet networking"}
```

Output:

```
1
```

### Delete

The DELETE verb is used to delete a record. The call returns the rows affected.

```
DELETE http://localhost/api.php/categories/2
```

Output:

```
1
```

## Installation

Put the file "api.php" somewhere and enjoy!

## Tests

Yes, written for PHPUnit. Run:

```
wget https://phar.phpunit.de/phpunit.phar
php phpunit.phar test.php
```

No complete coverage yet.

## License

MIT
