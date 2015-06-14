# MySQL-CRUD-API

Simple PHP script that adds a very basic API to a MySQL InnoDB database (or MS SQL Server 2012).

## Requirements

  - PHP 5.3 or higher with MySQLi or SQLSRV enabled
  - PHP on Windows when connecting to SQL Server 2012

## Installation

This is a single file application! Upload "api.php" somewhere and enjoy!

## Limitations

  - Authentication or authorization is not included
  - Validation on API input is not included
  - Complex queries or transactions are not supported

## TODO

  - Add column permission system
  - Add created_at and modified_at support
  - Add user_id and group_id support (multi-tenant)
  - Add created_by and modified_by support
  - PostgreSQL support

## Features

  - Single PHP file, easy to deploy.
  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Supports POST variables as input
  - Supports a JSON object as input
  - Condensed JSON ouput: first row contains field names
  - Permission system for databases and tables
  - JSONP support for cross-domain requests
  - Combined requests with support for multiple table names
  - Search support on multiple criteria
  - Pagination, sorting and column selection
  - Relation detection and filtering on foreign keys
  - Relation "transforms" for PHP and JavaScript
  - Binary fields supported with base64 encoding

## Configuration

Edit the following lines in the bottom of the file "api.php":

```
$api = new MySQL_CRUD_API(array(
	'username'=>'xxx',
	'password'=>'xxx',
	'database'=>'xxx'
));
$api->executeCommand();
```

These are all the configuration options and their default values:

```
$api = new MySQL_CRUD_API(array(
	'username=>'root'
	'password=>null,
	'database=>false,
	'permissions'=>array('*'=>'crudl'),
// for connectivity (defaults to localhost):
	'hostname'=>null,
	'port=>null,
	'socket=>null,
	'charset=>'utf8',
// dependencies (added for unit testing):
	'db'=>null,
	'method'=>$_SERVER['REQUEST_METHOD'],
	'request'=>$_SERVER['PATH_INFO'],
	'get'=>$_GET,
	'post'=>'php://input',
));
$api->executeCommand();
```

For the alternative MsSQL_CRUD_API class the following mapping applies:

 - username = UID
 - password = PWD
 - database = Database
 - hostname = Server
 - port = (Server),port
 - socket = (not supported)
 - charset = CharacterSet

The other variables are not MySQL or MsSQL server specific.

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

By default all columns are selected. With the "columns" parameter you can select specific columns (comma seperated):

```
GET http://localhost/api.php/categories?columns=name
```

Output:

```
{"categories":{"columns":["name"],"records":[["Web development"],["Internet"]]}}
```

NB: Column selection cannot be applied to related tables.

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

The explanation of this feature is based on the datastructure from the ```blog.sql``` database file. This database is a very simple blog datastructure with corresponding foreign key relations between the tables.

You can get the "post" that has "id" equal to "1" with it's corresponding "categories", "tags" and "comments" using:

```
GET http://localhost/api.php/posts,categories,tags,comments?filter=id,eq,1
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

By default a single database is exposed with all it's tables in read-write mode. You can change the permissions by specifying in the
'permissions' configuration parameter. This array contains the permissions that are applied. The star character can be used as a wildcard
for a full table or database name. Permissions with more specific keys override the values of permissions that contain one or more wildcards.
The letters 'crudl' in the permission value are the first letters of the 'create','read','update','delete','list' operations.
Specifying such a letters in the permission value means that the corresponding operation is permitted, while leaving it out,
means that the operation is not permitted.

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

When using the POST method (x-www-form-urlencoded, see rfc1738) a database NULL value can be set using the "__is_null" suffix:

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
PHPUnit 4.7.3 by Sebastian Bergmann and contributors.

...................

Time: 464 ms, Memory: 12.00Mb

OK (19 tests, 39 assertions)
$
```

NB: You MUST use an empty database as a desctructive database fixture ('blog.mysql') is loaded.

For SQL server on Windows:

```
C:\mysql-crud-api-master>php.exe phpunit.phar tests\tests.php
PHPUnit 4.7.3 by Sebastian Bergmann and contributors.

...................

Time: 676 ms, Memory: 7.25Mb

OK (19 tests, 39 assertions)
C:\mysql-crud-api-master>
```

NB: You MUST use an empty database as a desctructive database fixture ('blog.mssql') is loaded.

## License

MIT
