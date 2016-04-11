[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/mevdschee/php-crud-api.svg)](http://isitmaintained.com/project/mevdschee/php-crud-api "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/mevdschee/php-crud-api.svg)](http://isitmaintained.com/project/mevdschee/php-crud-api "Percentage of issues still open")

# PHP_CRUD_API

Single file PHP script that adds a REST API to a MySQL InnoDB database. Alternatively SQLite 3, PostgreSQL 9 and MS SQL Server 2012 are fully supported.

## Requirements

  - PHP 5.3 or higher with MySQLi, libpq, SQLSRV or sqlite3 enabled
  - PHP on Windows when connecting to SQL Server 2012

## Installation

This is a single file application! Upload "api.php" somewhere and enjoy!

## Limitations

  - Authentication is not included
  - Composite primary or foreign keys are not supported
  - Complex filters (with both "and" & "or") are not supported
  - Complex writes (transactions) are not supported
  - Batch operations for insert, update and delete are not supported

## Features

  - Single PHP file, easy to deploy.
  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Supports POST variables as input
  - Supports a JSON object as input
  - Condensed JSON ouput: first row contains field names
  - Sanitize and validate input using callbacks
  - Permission system for databases, tables, columns and records
  - Multi-tenant database layouts are supported
  - Both JSONP and CORS support for cross-domain requests
  - Combined requests with support for multiple table names
  - Search support on multiple criteria
  - Pagination, sorting and column selection
  - Relation detection and filtering on foreign keys
  - Relation "transforms" for PHP and JavaScript
  - Binary fields supported with base64 encoding
  - Generate API documentation using Swagger tools

## Configuration

Edit the following lines in the bottom of the file "api.php":

```
$api = new PHP_CRUD_API(array(
	'username'=>'xxx',
	'password'=>'xxx',
	'database'=>'xxx',
));
$api->executeCommand();
```

These are all the configuration options and their default values:

```
$api = new PHP_CRUD_API(array(
	'dbengine'=>'MySQL',
	'username'=>'root',
	'password'=>null,
	'database'=>false,
// for connectivity (defaults to localhost):
	'hostname'=>null,
	'port'=>null,
	'socket'=>null,
	'charset'=>'utf8',
// callbacks with their default behavior
	'table_authorizer'=>function($cmd,$db,$tab) { return true; },
	'record_filter'=>function($cmd,$db,$tab) { return false; },
	'column_authorizer'=>function($cmd,$db,$tab,$col) { return true; },
	'tenant_function'=>function($cmd,$db,$tab,$col) { return null; },
	'input_sanitizer'=>function($cmd,$db,$tab,$col,$typ,$val) { return $val; },
	'input_validator'=>function($cmd,$db,$tab,$col,$typ,$val,$ctx) { return true; },
// dependencies (added for unit testing):
	'db'=>null,
	'method'=>$_SERVER['REQUEST_METHOD'],
	'request'=>$_SERVER['PATH_INFO'],
	'get'=>$_GET,
	'post'=>'php://input',
));
$api->executeCommand();
```

NB: The "socket" option is not supported by MS SQL Server. SQLite expects the filename in the "database" field.

## Documentation

After configuring you can directly benefit from generated API documentation. On the URL below you find the generated API specification in [Swagger](http://swagger.io/) 2.0 format.

    http://localhost/api.php

Try the [editor](http://editor.swagger.io/) to quickly view it! Choose "File" > "Paste JSON..." from the menu.

## Usage

You can do all CRUD (Create, Read, Update, Delete) operations and one extra List operation. Here is how:

### List

List all records of a database table.

```
GET http://localhost/api.php/categories
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]]}}
```

### List + Transform

List all records of a database table and transform them to objects.

```
GET http://localhost/api.php/categories?transform=1
```

Output:

```
{"categories":[{"id":"1","name":"Internet"},{"id":"3","name":"Web development"}]}
```

NB: This transform is CPU and memory intensive and can also be executed client-side.

### List + Filter

Search is implemented with the "filter" parameter. You need to specify the column name, a comma, the match type, another commma and the value you want to filter on. These are supported match types:

  - cs: contain string (string contains value)
  - sw: start with (string starts with value)
  - ew: end with (string end with value)
  - eq: equal (string or number matches exactly)
  - ne: not equal (string or number doen not match)
  - lt: lower than (number is lower than value)
  - le: lower or equal (number is lower than or equal to value)
  - ge: greater or equal (number is higher than or equal to value)
  - gt: greater than (number is higher than value)
  - in: in (number is in comma seperated list of values)
  - ni: not in (number is not in comma seperated list of values)
  - is: is null (field contains "NULL" value)
  - no: not null (field does not contain "NULL" value)

```
GET http://localhost/api.php/categories?filter=name,eq,Internet
GET http://localhost/api.php/categories?filter=name,sw,Inter
GET http://localhost/api.php/categories?filter=id,le,1
GET http://localhost/api.php/categories?filter=id,lt,2
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"]]}}
```

### List + Filter + Satisfy

Multiple filters can be applied by using "filter[]" instead of "filter" as a parameter name. Then the parameter "satisfy" is used to indicate whether "all" (default) or "any" filter should be satisfied to lead to a match:

```
GET http://localhost/api.php/categories?filter[]=id,eq,1&filter[]=id,eq,3&satisfy=any
GET http://localhost/api.php/categories?filter[]=id,ge,1&filter[]=id,le,3&satisfy=all
GET http://localhost/api.php/categories?filter[]=id,ge,1&filter[]=id,le,3
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]]}}
```

### List + Column selection

By default all columns are selected. With the "columns" parameter you can select specific columns. Multiple columns should be comma seperated. An asterisk ("*") may be used as a wildcard to indicate "all columns":

```
GET http://localhost/api.php/categories?columns=name
GET http://localhost/api.php/categories?columns=categories.name
```

Output:

```
{"categories":{"columns":["name"],"records":[["Web development"],["Internet"]]}}
```

NB: Columns that are used to include related entities are automatically added and cannot be left out.

### List + Order

With the "order" parameter you can sort. By default the sort is in ascending order, but by specifying "desc" this can be reversed:

```
GET http://localhost/api.php/categories?order=name,desc
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["3","Web development"],["1","Internet"]]}}
```

### List + Order + Pagination

The "page" parameter holds the requested page. The default page size is 20, but can be adjusted (e.g. to 50):

```
GET http://localhost/api.php/categories?order=id&page=1
GET http://localhost/api.php/categories?order=id&page=1,50
```

Output:

```
{"categories":{"columns":["id","name"],"records":[["1","Internet"],["3","Web development"]],"results":2}}
```

NB: Pages that are not ordered cannot be paginated.

### Create

You can easily add a record using the POST method (x-www-form-urlencoded, see rfc1738). The call returns the "last insert id".

```
POST http://localhost/api.php/categories
id=1&name=Internet
```

Output:

```
1
```

Note that the fields that are not specified in the request get the default value as specified in the database.

### Create (with JSON)

Alternatively you can send a JSON object in the body. The call returns the "last insert id".

```
POST http://localhost/api.php/categories
{"id":"1","name":"Internet"}
```

Output:

```
1
```

Note that the fields that are not specified in the request get the default value as specified in the database.

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
id=1&name=Internet+networking
```

Output:

```
1
```

Note that only fields that are specified in the request will be updated.

### Update (with JSON)

Alternatively you can send a JSON object in the body. The call returns the rows affected.

```
PUT http://localhost/api.php/categories/2
{"id":"1","name":"Internet networking"}
```

Output:

```
1
```

Note that only fields that are specified in the request will be updated.

### Delete

The DELETE verb is used to delete a record. The call returns the rows affected.

```
DELETE http://localhost/api.php/categories/2
```

Output:

```
1
```

## Relations

The explanation of this feature is based on the data structure from the ```blog.sql``` database file. This database is a very simple blog data structure with corresponding foreign key relations between the tables. These foreign key constraints are required as the relationship detection is based on them, not on column naming.

You can get the "post" that has "id" equal to "1" with it's corresponding "categories", "tags" and "comments" using:

```
GET http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1
```

Output:

```
{
    "posts": {
        "columns": [
            "id",
            "user_id",
            "category_id",
            "content"
        ],
        "records": [
            [
                "1",
                "1",
                "1",
                "blog started"
            ]
        ]
    },
    "post_tags": {
        "relations": {
            "post_id": "posts.id"
        },
        "columns": [
            "id",
            "post_id",
            "tag_id"
        ],
        "records": [
            [
                "1",
                "1",
                "1"
            ],
            [
                "2",
                "1",
                "2"
            ]
        ]
    },
    "categories": {
        "relations": {
            "id": "posts.category_id"
        },
        "columns": [
            "id",
            "name"
        ],
        "records": [
            [
                "1",
                "anouncement"
            ]
        ]
    },
    "tags": {
        "relations": {
            "id": "post_tags.tag_id"
        },
        "columns": [
            "id",
            "name"
        ],
        "records": [
            [
                "1",
                "funny"
            ],
            [
                "2",
                "important"
            ]
        ]
    },
    "comments": {
        "relations": {
            "post_id": "posts.id"
        },
        "columns": [
            "id",
            "post_id",
            "message"
        ],
        "records": [
            [
                "1",
                "1",
                "great"
            ],
            [
                "2",
                "1",
                "fantastic"
            ]
        ]
    }
}
```

You can call the ```mysql_crud_api_tranform()``` function to structure the data hierarchical like this:

```
{
    "posts": [
        {
            "id": "1",
            "post_tags": [
                {
                    "id": "1",
                    "post_id": "1",
                    "tag_id": "1",
                    "tags": [
                        {
                            "id": "1",
                            "name": "funny"
                        }
                    ]
                },
                {
                    "id": "2",
                    "post_id": "1",
                    "tag_id": "2",
                    "tags": [
                        {
                            "id": "2",
                            "name": "important"
                        }
                    ]
                }
            ],
            "comments": [
                {
                    "id": "1",
                    "post_id": "1",
                    "message": "great"
                },
                {
                    "id": "2",
                    "post_id": "1",
                    "message": "fantastic"
                }
            ],
            "user_id": "1",
            "category_id": "1",
            "categories": [
                {
                    "id": "1",
                    "name": "anouncement"
                }
            ],
            "content": "blog started"
        }
    ]
}
```

This transform function is available for PHP and JavaScript in the files ```mysql_crud_api_tranform.php``` and ```mysql_crud_api_tranform.js```.

## Permissions

By default a single database is exposed with all it's tables and columns in read-write mode. You can change the permissions by specifying
a 'table_authorizer' and/or a 'column_authorizer' function that returns a boolean indicating whether or not the table or column is allowed
for a specific CRUD action.

## Record filter

By defining a 'record_filter' function you can apply a forced filter, for instance to implement roles in a database system.
The rule "you cannot view unpublished blog posts unless you have the admin role" can be implemented with this filter.

```return ($table=='posts' && $_SESSION['role']!='admin')?array('published,no,null'):false;```

## Multi-tenancy

The 'tenant_function' allows you to expose an API for a multi-tenant database schema. In the simplest model all tables have a column
named 'customer_id' and the 'tenant_function' is defined as:

```return $col=='customer_id'?$_SESSION['customer_id']:null```

In this example ```$_SESSION['customer_id']``` is the authenticated customer in your API.

## Sanitizing input

By default all input is accepted and sent to the database. If you want to strip (certain) HTML tags before storing you may specify a
'input_sanitizer' function that returns the adjusted value.

## Validating input

By default all input is accepted. If you want to validate the input, you may specify a 'input_validator' function that returns a boolean
indicating whether or not the value is valid.

## Multi-Database

The code also supports multi-database API's. These have URLs where the first segment in the path is the database and not the table name.
This can be enabled by NOT specifying a database in the configuration. Also the permissions in the configuration should contain a dot
character to seperate the database from the table name. The databases 'mysql', 'information_schema' and 'sys' are automatically blocked.

## Binary data

Binary fields are automatically detected and data in those fields is returned using base64 encoding.

```
GET http://localhost/api.php/categories/2
```

Output:

```
{"id":"2","name":"funny","icon":"ZGF0YQ=="}
```

When sending a record that contains a binary field you will also have to send base64 encoded data.

```
PUT http://localhost/api.php/categories/2
icon=ZGF0YQ
```

In the above example you see how binary data is sent. Both "base64url" and standard "base64" are allowed (see rfc4648).

## Sending NULL

When using the POST method (x-www-form-urlencoded, see rfc1738) a database NULL value can be set using a parameter with the "__is_null" suffix:

```
PUT http://localhost/api.php/categories/2
name=Internet&icon__is_null
```

When sending JSON data, then sending a NULL value for a nullable database field is easier as you can use the JSON "null" value (without quotes).

```
PUT http://localhost/api.php/categories/2
{"name":"Internet","icon":null}
```

## Errors

The following types of 404 'Not found' errors may be reported:

  - entity (could not find entity)
  - object (instance not found on read)
  - input (instance not found on create)
  - subject (instance not found on update)
  - 1pk (primary key not found or composite)

## Tests

There are PHPUnit tests in the file 'tests.php'. You need to configure your test database connection in this file. After that run:

```
$ wget https://phar.phpunit.de/phpunit.phar
$ php phpunit.phar tests/tests.php
PHPUnit 5.1.3 by Sebastian Bergmann and contributors.

.....................................                             37 / 37 (100%)

Time: 433 ms, Memory: 11.00Mb

OK (37 tests, 61 assertions)
$
```

NB: You MUST use an empty database as a desctructive database fixture ('blog_mysql.sql') is loaded.

### SQL server on Windows:

```
C:\php-crud-api>"C:\PHP\php.exe" phpunit.phar tests\tests.php
PHPUnit 5.2.10 by Sebastian Bergmann and contributors.

.....................................                            37 / 37 (100%)

Time: 1.07 seconds, Memory: 6.50Mb

OK (37 tests, 59 assertions)

C:\php-crud-api>
```

NB: You MUST use an empty database as a desctructive database fixture ('blog_sqlserver.sql') is loaded.

### PostgreSQL on Linux

```
$ wget https://phar.phpunit.de/phpunit.phar
$ php phpunit.phar tests/tests.php
PHPUnit 5.1.3 by Sebastian Bergmann and contributors.

.....................................                             37 / 37 (100%)

Time: 856 ms, Memory: 11.25Mb

OK (37 tests, 61 assertions)
$
```

NB: You MUST use an empty database as a desctructive database fixture ('blog_postgresql.sql') is loaded.

### SQLite on Linux

```
$ wget https://phar.phpunit.de/phpunit.phar
$ php phpunit.phar tests/tests.php
PHPUnit 5.1.3 by Sebastian Bergmann and contributors.

.............................................                     45 / 45 (100%)

Time: 1.84 seconds, Memory: 11.25Mb

OK (45 tests, 69 assertions)
$
```

NB: You MUST use an empty database as a desctructive database fixture ('blog_sqlite.sql') is loaded.

## Pretty URL

You may "rewrite" the URL to remove the "api.php" from the URL.

### Apache

Enable mod_rewrite and add the following to your ".htaccess" file:

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ api.php/$1 [L,QSA]
```

The ".htaccess" file needs to go in the same folder as "api.php".

## Debugging

If you have trouble getting the file to work you may want to check the two environment variables used. Uncomment the following line:

```
var_dump($_SERVER['REQUEST_METHOD'],$_SERVER['PATH_INFO']); die();
```

And then visit:

```
http://localhost/api.php/posts
```

This should output:

```
string(3) "GET"
string(6) "/posts"
```

If it does not, something is wrong on your hosting environment.

## License

MIT
