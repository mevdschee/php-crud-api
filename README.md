# MySQL-read-API

Simple PHP script that adds a very basic API to a MySQL database

## Requirements

  - PHP 5.3 or higher with MySQLi enabled
  - Apache with mod_rewrite enabled (can also run on Nginx)

## Limitations

  - Public API only: no authentication or authorization
  - Read-only: no write or delete supported
  - Single database

## Features

  - Very little code, easy to adapt and maintain
  - Streaming data, low memory footprint
  - Condensed JSON: first row contains field names
  - Optional white- and blacklist support for tables
  - JSONP support for cross-domain requests
  - Combined requests with wildcard support for table names

## Configuration

```
$config = array(
    "hostname"=>"localhost",
    "username"=>"root",
    "password"=>"root",
    "database"=>"cravetivity",
    "whitelist"=>false,
    "blacklist"=>array("users"),
);
```

## Example output

URL: http://localhost/api/cate*

```
{"categories":[["id","name"],["1","Internet"],["3","Web development"]]}
```

## Installation

Put the files in a folder and edit config.php.dist and rename it to config.php. Let Apache serve the folder and configure the .htaccess RewriteBase to match the exposed part of the path.
