# MySQL-CRUD-API

Simple PHP script that adds a very basic API to a MySQL database

## Requirements

  - PHP 5.3 or higher with MySQLi enabled
  - Apache with mod_rewrite enabled (can also run on Nginx)

## Limitations

  - Public API only: no authentication or authorization
  - No relationship (foreign key) support
  - No column selection: always returns full table
  - Single database

## Features

  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Condensed JSON: first row contains field names
  - Optional white- and blacklist support for tables
  - JSONP support for cross-domain requests
  - Combined requests with wildcard support for table names
  - Pagination and search support

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

```
GET http://localhost/api.php/categories
GET http://localhost/api.php/categories,users
GET http://localhost/api.php/cate*
GET http://localhost/api.php/cate*,user*
```

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]]}}
```

### List + Pagination

```
GET http://localhost/api.php/categories?page=1
GET http://localhost/api.php/categories?page=1,50
```

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]],"results":2}}
```

### List + Filter

Match types supported:

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

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"]]}}
```

### Create

```
POST http://localhost/api.php/categories
{"id":"1","name":"Internet"}
```

```
1
```

### Read

```
GET http://localhost/api.php/categories/1
```

```
{"id":"1","name":"Internet"}
```

### Update

```
PUT http://localhost/api.php/categories/2
{"id":"1","name":"Internet networking"}
```

```
1
```

### Delete

```
DELETE http://localhost/api.php/categories/2
```

```
1
```

## Installation

Put the file "api.php" somewhere and enjoy!

## License

MIT
