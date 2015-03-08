# MySQL-CRUD-API

Simple PHP script that adds a very basic API to a MySQL database.

## Requirements

  - PHP 5.3 or higher with MySQLi enabled
  - Apache, Lighttpd or Nginx

## Limitations

  - Authentication or authorization is not included
  - Validation on API input is not included
  - Only a single database is supported

## TODO

  - Add column blacklisting
  - Add created_at and modified_at support
  - Add basic authentication support
  - Add user_id and group_id support (multi-tenant)
  - Add created_by and modified_by support

## Features

  - Single PHP file, easy to deploy.
  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Condensed JSON: first row contains field names
  - Blacklist support for tables (and columns, todo)
  - JSONP support for cross-domain requests
  - Combined requests with support for multiple table names
  - Pagination, sorting and search support
  - Relation detection and filtering on foreign keys
  - Relation "transforms" for PHP and JavaScript

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
	'database:'',
	'whitelist=>false,
	'blacklist=>false,
// for connectivity (defaults to localhost):
	'hostname'=>null,
	'port=>null,
	'socket=>null,
// dependencies (added for unit testing):
	'mysqli'=>null,
	'method'=>$_SERVER['REQUEST_METHOD'],
	'request'=>$_SERVER['PATH_INFO'],
	'get'=>$_GET,
	'post'=>'php://input',
));
$api->executeCommand();
```

## Usage

You can do all CRUD (Create, Read, Update, Delete) operations and extra List operation. Here is how:

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

List all records of a database table and transform them to objects. NB: This transform is CPU and memory intensive and can also be executed client-side.

```
GET http://localhost/api.php/categories?transform=1
```

Output:

```
{"categories":[{"id":"1","name":"Internet"},{"id":"3","name":"Web development"}]}
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

Search is implemented with the "filter" parameter. You need to specify the column name, a colon and the value you want to filter on. The filter match type is "exact" by default, but can easily be adjusted. These are supported:

  - start (string starts with value)
  - end (string end with value)
  - contain (string contains value)
  - exact (string or number matches exactly)
  - lower (number is lower than value)
  - upto (number is lower than or equal to value)
  - from (number is higher than or equal to value)
  - higher (number is higher than value)
  - in (number is in comma seperated list of values)

```
GET http://localhost/api.php/categories?filter=name:Internet
GET http://localhost/api.php/categories?filter=name:Inter&match=start
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

## Relations

The explanation of this feature is based on the datastructure from the ```blog.sql``` database file. This database is a very simple blog datastructure with corresponding foreign key relations between the tables.

You can get the "post" that has "id" equal to "1" with it's corresponding "categories", "tags" and "comments" using:

```
GET http://localhost/api.php/posts,categories,tags,comments?filter=id:1
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
