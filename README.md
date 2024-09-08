# PHP-CRUD-API

Single file PHP script that adds a REST API to a MySQL/MariaDB, PostgreSQL, SQL Server or SQLite database. 

Howto: Upload "`api.php`" to your webserver, configure it to connect to your database, have an instant full-featured REST API.

NB: This is the [TreeQL](https://treeql.org) reference implementation in PHP.

## Requirements

  - PHP 7.2 or higher with PDO drivers enabled for one of these database systems:
    - MySQL 5.7 / MariaDB 10.0 or higher for spatial features in MySQL
    - PostgreSQL 9.5 or higher with PostGIS 2.2 or higher for spatial features
    - SQL Server 2017 or higher (2019 also has Linux support)
    - SQLite 3.16 or higher (spatial features NOT supported)

## Installation

Download the "`api.php`" file from the latest release:

https://github.com/mevdschee/php-crud-api/releases/latest or direct from:  
https://raw.githubusercontent.com/mevdschee/php-crud-api/main/api.php

This is a single file application! Upload "`api.php`" somewhere and enjoy!

For local development you may run PHP's built-in web server:

    php -S localhost:8080

Test the script by opening the following URL:

    http://localhost:8080/api.php/records/posts/1

Don't forget to modify the configuration at the bottom of the file.

Alternatively you can integrate this project into the web framework of your choice, see:

- [Automatic REST API for Laravel](https://tqdev.com/2019-automatic-rest-api-laravel)
- [Automatic REST API for Symfony 4](https://tqdev.com/2019-automatic-rest-api-symfony)
- [Automatic REST API for SlimPHP 4](https://tqdev.com/2019-automatic-api-slimphp-4)

In these integrations [Composer](https://getcomposer.org/) is used to load this project as a dependency.

For people that don't use composer, the file "`api.include.php`" is provided. This file contains everything 
from "`api.php`" except the configuration from "`src/index.php`" and can be used by PHP's "include" function.

## Configuration

Edit the following lines in the bottom of the file "`api.php`":

    $config = new Config([
        'username' => 'xxx',
        'password' => 'xxx',
        'database' => 'xxx',
    ]);

These are all the configuration options and their default value between brackets:

- "driver": `mysql`, `pgsql`, `sqlsrv` or `sqlite` (`mysql`)
- "address": Hostname (or filename) of the database server (`localhost`)
- "port": TCP port of the database server (defaults to driver default)
- "username": Username of the user connecting to the database (no default)
- "password": Password of the user connecting to the database (no default)
- "database": Database the connecting is made to (no default)
- "command": Extra SQL to initialize the database connection (none)
- "tables": Comma separated list of tables to publish (defaults to 'all')
- "mapping": Comma separated list of table/column mappings (no mappping)
- "geometrySrid": SRID assumed when converting from WKT to geometry (`4326`)
- "middlewares": List of middlewares to load (`cors`)
- "controllers": List of controllers to load (`records,geojson,openapi,status`)
- "customControllers": List of user custom controllers to load (no default)
- "openApiBase": OpenAPI info (`{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}`)
- "cacheType": `TempFile`, `Redis`, `Memcache`, `Memcached` or `NoCache` (`TempFile`)
- "cachePath": Path/address of the cache (defaults to system's temp directory)
- "cacheTime": Number of seconds the cache is valid (`10`)
- "jsonOptions": Options used for encoding JSON (`JSON_UNESCAPED_UNICODE`)
- "debug": Show errors in the "X-Exception" headers (`false`)
- "basePath": URI base path of the API (determined using PATH_INFO by default)

All configuration options are also available as environment variables. Write the config option with capitals, a "PHP_CRUD_API_" prefix and underscores for word breakes, so for instance:

- PHP_CRUD_API_DRIVER=mysql
- PHP_CRUD_API_ADDRESS=localhost
- PHP_CRUD_API_PORT=3306
- PHP_CRUD_API_DATABASE=php-crud-api
- PHP_CRUD_API_USERNAME=php-crud-api
- PHP_CRUD_API_PASSWORD=php-crud-api
- PHP_CRUD_API_DEBUG=1

The environment variables take precedence over the PHP configuration.

## Limitations

These limitation and constrains apply:

  - Primary keys should either be auto-increment (from 1 to 2^53) or UUID
  - Composite primary and composite foreign keys are not supported
  - Complex writes (transactions) are not supported
  - Complex queries calling functions (like "concat" or "sum") are not supported
  - Database must support and define foreign key constraints
  - SQLite cannot have bigint typed auto incrementing primary keys
  - SQLite does not support altering table columns (structure)
    
## Features

The following features are supported:

  - Composer install or single PHP file, easy to deploy.
  - Very little code, easy to adapt and maintain
  - Supports POST variables as input (x-www-form-urlencoded)
  - Supports a JSON object as input
  - Supports a JSON array as input (batch insert)
  - Sanitize and validate input using type rules and callbacks
  - Permission system for databases, tables, columns and records
  - Multi-tenant single and multi database layouts are supported
  - Multi-domain CORS support for cross-domain requests
  - Support for reading joined results from multiple tables
  - Search support on multiple criteria
  - Pagination, sorting, top N list and column selection
  - Relation detection with nested results (belongsTo, hasMany and HABTM)
  - Atomic increment support via PATCH (for counters)
  - Binary fields supported with base64 encoding
  - Spatial/GIS fields and filters supported with WKT and GeoJSON
  - Mapping table and column names to support legacy systems
  - Generate API documentation using OpenAPI tools
  - Authentication via API key, JWT token or username/password
  - Database connection parameters may depend on authentication
  - Support for reading database structure in JSON
  - Support for modifying database structure using REST endpoint
  - Security enhancing middleware is included
  - Standard compliant: PSR-4, PSR-7, PSR-12, PSR-15 and PSR-17

## Related projects and ports

Related projects:

  - [PHP-CRUD-API Quick Start](https://github.com/nik2208/php-crud-api-quick-start): A customizable, ready to go, docker compose file featuring PHP-CRUD-API.
  - [PHP-CRUD-API filter generator](https://thipages.github.io/jca-filter/#): A JavaScript library creating PHP-CRUD-API filters from expressions.
  - [JS-CRUD-API](https://github.com/thipages/js-crud-api): A JavaScript client library for the API of PHP-CRUD-API
  - [PHP-API-AUTH](https://github.com/mevdschee/php-api-auth): Single file PHP script that is an authentication provider for PHP-CRUD-API
  - [PHP-CRUD-UI](https://github.com/mevdschee/php-crud-ui): Single file PHP script that adds a UI to a PHP-CRUD-API project.
  - [PHP-CRUD-ADMIN](https://github.com/mevdschee/php-crud-admin): Single file PHP script that adds a database admin interface to a PHP-CRUD-API project.
  - [PHP-SP-API](https://github.com/mevdschee/php-sp-api): Single file PHP script that adds a REST API to a SQL database.
  - [dexie-mysql-sync](https://github.com/scriptPilot/dexie-mysql-sync): Synchronization between local IndexedDB and MySQL Database. 
  - [ra-data-treeql](https://github.com/nkappler/ra-data-treeql): NPM package that provides a [Data Provider](https://marmelab.com/react-admin/DataProviderIntroduction.html) for [React Admin](https://marmelab.com/react-admin/).
  - [scriptPilot/vueuse](https://github.com/scriptPilot/vueuse/): Vue [Composables](https://vuejs.org/guide/reusability/composables.html) in addition to [VueUse.org](https://vueuse.org/) (that support PHP-CRUD-API).
  - [scriptPilot/add-php-backend](https://github.com/scriptPilot/add-php-backend): Add MySQL, phpMyAdmin and PHP-CRUD-API to your dev environment. 
  - [VUE-CRUD-UI](https://github.com/nlware/vue-crud-ui): Single file Vue.js script that adds a UI to a PHP-CRUD-API project.
  
There are also ports of this script in:

- [Go-CRUD-API](https://github.com/dranih/go-crud-api) (work in progress)
- [Java JDBC by Ivan Kolchagov](https://github.com/kolchagov/java-crud-api) (v1)
- [Java Spring Boot + jOOQ](https://github.com/mevdschee/java-crud-api/tree/master/full) (v2: work in progress)

There are also proof-of-concept ports of this script that only support basic REST CRUD functionality in:
[PHP](https://github.com/mevdschee/php-crud-api/blob/master/extras/core.php),
[Java](https://github.com/mevdschee/java-crud-api/blob/master/core/src/main/java/com/tqdev/CrudApiHandler.java),
[Go](https://github.com/mevdschee/go-crud-api/blob/master/api.go),
[C# .net core](https://github.com/mevdschee/core-data-api/blob/master/Program.cs),
[Node.js](https://github.com/mevdschee/js-crud-api/blob/master/app.js) and
[Python](https://github.com/mevdschee/py-crud-api/blob/master/api.py).

## Compilation

You can install all dependencies of this project using the following command:

    php install.php

You can compile all files into a single "`api.php`" file using:

    php build.php

Note that you don't use compilation when you integrate this project into another project or framework (use Composer instead).

### Development

You can access the non-compiled code at the URL:

    http://localhost:8080/src/records/posts/1

The non-compiled code resides in the "`src`" and "`vendor`" directories. The "`vendor`" directory contains the dependencies.

### Updating dependencies

You can update all dependencies of this project using the following command:

    php update.php

This script will install and run [Composer](https://getcomposer.org/) to update the dependencies.

NB: The update script will patch the dependencies in the vendor directory for PHP 7.0 compatibility.

## TreeQL, a pragmatic GraphQL

[TreeQL](https://treeql.org) allows you to create a "tree" of JSON objects based on your SQL database structure (relations) and your query.

It is loosely based on the REST standard and also inspired by json:api.

### CRUD + List

The example posts table has only a a few fields:

    posts  
    =======
    id     
    title  
    content
    created

The CRUD + List operations below act on this table.

#### Create

If you want to create a record the request can be written in URL format as: 

    POST /records/posts

You have to send a body containing:

    {
        "title": "Black is the new red",
        "content": "This is the second post.",
        "created": "2018-03-06T21:34:01Z"
    }

And it will return the value of the primary key of the newly created record:

    2

#### Read

To read a record from this table the request can be written in URL format as:

    GET /records/posts/1

Where "1" is the value of the primary key of the record that you want to read. It will return:

    {
        "id": 1
        "title": "Hello world!",
        "content": "Welcome to the first post.",
        "created": "2018-03-05T20:12:56Z"
    }

On read operations you may apply joins.

#### Update

To update a record in this table the request can be written in URL format as:

    PUT /records/posts/1

Where "1" is the value of the primary key of the record that you want to update. Send as a body:

    {
        "title": "Adjusted title!"
    }

This adjusts the title of the post. And the return value is the number of rows that are set:

    1

#### Delete

If you want to delete a record from this table the request can be written in URL format as:

    DELETE /records/posts/1

And it will return the number of deleted rows:

    1

#### List

To list records from this table the request can be written in URL format as:

    GET /records/posts

It will return:

    {
        "records":[
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            }
        ]
    }

On list operations you may apply filters and joins.

### Filters

Filters provide search functionality, on list calls, using the "filter" parameter. You need to specify the column
name, a comma, the match type, another comma and the value you want to filter on. These are supported match types:

  - "cs": contain string (string contains value)
  - "sw": start with (string starts with value)
  - "ew": end with (string end with value)
  - "eq": equal (string or number matches exactly)
  - "lt": lower than (number is lower than value)
  - "le": lower or equal (number is lower than or equal to value)
  - "ge": greater or equal (number is higher than or equal to value)
  - "gt": greater than (number is higher than value)
  - "bt": between (number is between two comma separated values)
  - "in": in (number or string is in comma separated list of values)
  - "is": is null (field contains "NULL" value)

You can negate all filters by prepending a "n" character, so that "eq" becomes "neq". 
Examples of filter usage are:

    GET /records/categories?filter=name,eq,Internet
    GET /records/categories?filter=name,sw,Inter
    GET /records/categories?filter=id,le,1
    GET /records/categories?filter=id,ngt,1
    GET /records/categories?filter=id,bt,0,1
    GET /records/categories?filter=id,in,0,1

Output:

    {
        "records":[
            {
                "id": 1
                "name": "Internet"
            }
        ]
    }

In the next section we dive deeper into how you can apply multiple filters on a single list call.

### Multiple filters

Filters can be a by applied by repeating the "filter" parameter in the URL. For example the following URL: 

    GET /records/categories?filter=id,gt,1&filter=id,lt,3

will request all categories "where id > 1 and id < 3". If you wanted "where id = 2 or id = 4" you should write:

    GET /records/categories?filter1=id,eq,2&filter2=id,eq,4
    
As you see we added a number to the "filter" parameter to indicate that "OR" instead of "AND" should be applied.
Note that you can also repeat "filter1" and create an "AND" within an "OR". Since you can also go one level deeper
by adding a letter (a-f) you can create almost any reasonably complex condition tree.

NB: You can only filter on the requested table (not on it's included tables) and filters are only applied on list calls.

### Column selection

By default all columns are selected. With the "include" parameter you can select specific columns. 
You may use a dot to separate the table name from the column name. Multiple columns should be comma separated. 
An asterisk ("*") may be used as a wildcard to indicate "all columns". Similar to "include" you may use the "exclude" parameter to remove certain columns:

```
GET /records/categories/1?include=name
GET /records/categories/1?include=categories.name
GET /records/categories/1?exclude=categories.id
```

Output:

```
    {
        "name": "Internet"
    }
```

NB: Columns that are used to include related entities are automatically added and cannot be left out of the output.

### Ordering

With the "order" parameter you can sort. By default the sort is in ascending order, but by specifying "desc" this can be reversed:

```
GET /records/categories?order=name,desc
GET /records/categories?order=id,desc&order=name
```

Output:

```
    {
        "records":[
            {
                "id": 3
                "name": "Web development"
            },
            {
                "id": 1
                "name": "Internet"
            }
        ]
    }
```

NB: You may sort on multiple fields by using multiple "order" parameters. You can not order on "joined" columns.

### Limit size

The "size" parameter limits the number of returned records. This can be used for top N lists together with the "order" parameter (use descending order).

```
GET /records/categories?order=id,desc&size=1
```

Output:

```
    {
        "records":[
            {
                "id": 3
                "name": "Web development"
            }
        ]
    }
```

NB: If you also want to know to the total number of records you may want to use the "page" parameter.

### Pagination

The "page" parameter holds the requested page. The default page size is 20, but can be adjusted (e.g. to 50).

```
GET /records/categories?order=id&page=1
GET /records/categories?order=id&page=1,50
```

Output:

```
    {
        "records":[
            {
                "id": 1
                "name": "Internet"
            },
            {
                "id": 3
                "name": "Web development"
            }
        ],
        "results": 2
    }
```

The element "results" holds to total number of records in the table, which would be returned if no pagination would be used.

NB: Since pages that are not ordered cannot be paginated, pages will be ordered by primary key.

### Joins

Let's say that you have a posts table that has comments (made by users) and the posts can have tags.

    posts    comments  users     post_tags  tags
    =======  ========  =======   =========  ======= 
    id       id        id        id         id
    title    post_id   username  post_id    name
    content  user_id   phone     tag_id
    created  message

When you want to list posts with their comments users and tags you can ask for two "tree" paths:

    posts -> comments  -> users
    posts -> post_tags -> tags

These paths have the same root and this request can be written in URL format as:

    GET /records/posts?join=comments,users&join=tags

Here you are allowed to leave out the intermediate table that binds posts to tags. In this example
you see all three table relation types (hasMany, belongsTo and hasAndBelongsToMany) in effect:

- "post" has many "comments"
- "comment" belongs to "user"
- "post" has and belongs to many "tags"

This may lead to the following JSON data:

    {
        "records":[
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z",
                "comments": [
                    {
                        id: 1,
                        post_id: 1,
                        user_id: {
                            id: 1,
                            username: "mevdschee",
                            phone: null,
                        },
                        message: "Hi!"
                    },
                    {
                        id: 2,
                        post_id: 1,
                        user_id: {
                            id: 1,
                            username: "mevdschee",
                            phone: null,
                        },
                        message: "Hi again!"
                    }
                ],
                "tags": []
            },
            {
                "id": 2,
                "title": "Black is the new red",
                "content": "This is the second post.",
                "created": "2018-03-06T21:34:01Z",
                "comments": [],
                "tags": [
                    {
                        id: 1,
                        message: "Funny"
                    },
                    {
                        id: 2,
                        message: "Informational"
                    }
                ]
            }
        ]
    }

You see that the "belongsTo" relationships are detected and the foreign key value is replaced by the referenced object.
In case of "hasMany" and "hasAndBelongsToMany" the table name is used a new property on the object.

### Batch operations

When you want to create, read, update or delete you may specify multiple primary key values in the URL.
You also need to send an array instead of an object in the request body for create and update. 

To read a record from this table the request can be written in URL format as:

    GET /records/posts/1,2

The result may be:

    [
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            },
            {
                "id": 2,
                "title": "Black is the new red",
                "content": "This is the second post.",
                "created": "2018-03-06T21:34:01Z"
            }
    ]

Similarly when you want to do a batch update the request in URL format is written as:

    PUT /records/posts/1,2

Where "1" and "2" are the values of the primary keys of the records that you want to update. The body should 
contain the same number of objects as there are primary keys in the URL:

    [   
        {
            "title": "Adjusted title for ID 1"
        },
        {
            "title": "Adjusted title for ID 2"
        }        
    ]

This adjusts the titles of the posts. And the return values are the number of rows that are set:

    [1,1]

Which means that there were two update operations and each of them had set one row. Batch operations use database
transactions, so they either all succeed or all fail (successful ones get rolled back). If they fail the body will
contain the list of error documents. In the following response the first operation succeeded and the second operation
of the batch failed due to an integrity violation:

    [   
        {
            "code": 0,
            "message": "Success"
        },
        {
            "code": 1010,
            "message": "Data integrity violation"
        }
    ]

The response status code will always be 424 (failed dependency) in case of any failure of one of the batch operations.

To insert multiple records into this table the request can be written in URL format as:

    POST /records/posts

The body should contain an array of records to be inserted:

    [
            {
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            },
            {
                "title": "Black is the new red",
                "content": "This is the second post.",
                "created": "2018-03-06T21:34:01Z"
            }
    ]

The return value is also an array containing the primary keys of the newly inserted records:

    [1,2] 

Note that batch operation for DELETE follows the same pattern as PUT, but without a body.

### Spatial support

For spatial support there is an extra set of filters that can be applied on geometry columns and that starting with an "s":

  - "sco": spatial contains (geometry contains another)
  - "scr": spatial crosses (geometry crosses another)
  - "sdi": spatial disjoint (geometry is disjoint from another)
  - "seq": spatial equal (geometry is equal to another)
  - "sin": spatial intersects (geometry intersects another)
  - "sov": spatial overlaps (geometry overlaps another)
  - "sto": spatial touches (geometry touches another)
  - "swi": spatial within (geometry is within another)
  - "sic": spatial is closed (geometry is closed and simple)
  - "sis": spatial is simple (geometry is simple)
  - "siv": spatial is valid (geometry is valid)

These filters are based on OGC standards and so is the WKT specification in which the geometry columns are represented.
Note that the SRID that is assumed when converting from WKT to geometry is specified by the config variable `geometrySrid` and defaults to 4326 (WGS 84).

#### GeoJSON

The GeoJSON support is a read-only view on the tables and records in GeoJSON format. These requests are supported:

    method path                  - operation - description
    ----------------------------------------------------------------------------------------
    GET    /geojson/{table}      - list      - lists records as a GeoJSON FeatureCollection
    GET    /geojson/{table}/{id} - read      - reads a record by primary key as a GeoJSON Feature

The "`/geojson`" endpoint uses the "`/records`" endpoint internally and inherits all functionality, such as joins and filters.
It also supports a "geometry" parameter to indicate the name of the geometry column in case the table has more than one.
For map views it supports the "bbox" parameter in which you can specify upper-left and lower-right coordinates (comma separated).
The following Geometry types are supported by the GeoJSON implementation:

  - Point
  - MultiPoint
  - LineString
  - MultiLineString
  - Polygon
  - MultiPolygon

The GeoJSON functionality is enabled by default, but can be disabled using the "controllers" configuration.

## Mapping names for legacy systems

To support creating an API for (a part of) a legacy system (such as Wordpress) you may want to map the table and column 
names as can not improve them without changing the software, while the names may need some improvement for consistency.
The config allows you to rename tables and columns with a comma separated list of mappings that are split with an 
equal sign, like this:

    'mapping' => 'wp_posts=posts,wp_posts.ID=posts.id',

This specific example will expose the "`wp_posts`" table at a "`posts`" end-point (instead of "`wp_posts`") and the 
column "`ID`" within that table as the "`id`" property (in lower case instead of upper case).

NB: Since these two mappings overlap the first (less specific) mapping may be omitted.

## Middleware

You can enable the following middleware using the "middlewares" config parameter:

- "firewall": Limit access to specific IP addresses
- "sslRedirect": Force connection over HTTPS instead of HTTP
- "cors": Support for CORS requests (enabled by default)
- "xsrf": Block XSRF attacks using the 'Double Submit Cookie' method
- "ajaxOnly": Restrict non-AJAX requests to prevent XSRF attacks
- "apiKeyAuth": Support for "API Key Authentication"
- "apiKeyDbAuth": Support for "API Key Database Authentication"
- "dbAuth": Support for "Database Authentication"
- "wpAuth": Support for "Wordpress Authentication"
- "jwtAuth": Support for "JWT Authentication"
- "basicAuth": Support for "Basic Authentication"
- "reconnect": Reconnect to the database with different parameters
- "authorization": Restrict access to certain tables or columns
- "validation": Return input validation errors for custom rules and default type rules
- "ipAddress": Fill a protected field with the IP address on create
- "sanitation": Apply input sanitation on create and update
- "multiTenancy": Restricts tenants access in a multi-tenant scenario
- "pageLimits": Restricts list operations to prevent database scraping
- "joinLimits": Restricts join parameters to prevent database scraping
- "textSearch": Search in all text fields with a simple parameter
- "customization": Provides handlers for request and response customization
- "json": Support read/write of JSON strings as JSON objects/arrays
- "xml": Translates all input and output from JSON to XML

The "middlewares" config parameter is a comma separated list of enabled middlewares.
You can tune the middleware behavior using middleware specific configuration parameters:

- "firewall.reverseProxy": Set to "true" when a reverse proxy is used ("")
- "firewall.allowedIpAddresses": List of IP addresses that are allowed to connect ("")
- "cors.allowedOrigins": The origins allowed in the CORS headers ("*")
- "cors.allowHeaders": The headers allowed in the CORS request ("Content-Type, X-XSRF-TOKEN, X-Authorization")
- "cors.allowMethods": The methods allowed in the CORS request ("OPTIONS, GET, PUT, POST, DELETE, PATCH")
- "cors.allowCredentials": To allow credentials in the CORS request ("true")
- "cors.exposeHeaders": Whitelist headers that browsers are allowed to access ("")
- "cors.maxAge": The time that the CORS grant is valid in seconds ("1728000")
- "xsrf.excludeMethods": The methods that do not require XSRF protection ("OPTIONS,GET")
- "xsrf.cookieName": The name of the XSRF protection cookie ("XSRF-TOKEN")
- "xsrf.headerName": The name of the XSRF protection header ("X-XSRF-TOKEN")
- "ajaxOnly.excludeMethods": The methods that do not require AJAX ("OPTIONS,GET")
- "ajaxOnly.headerName": The name of the required header ("X-Requested-With")
- "ajaxOnly.headerValue": The value of the required header ("XMLHttpRequest")
- "apiKeyAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "apiKeyAuth.header": The name of the API key header ("X-API-Key")
- "apiKeyAuth.keys": List of API keys that are valid ("")
- "apiKeyDbAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "apiKeyDbAuth.header": The name of the API key header ("X-API-Key")
- "apiKeyDbAuth.usersTable": The table that is used to store the users in ("users")
- "apiKeyDbAuth.apiKeyColumn": The users table column that holds the API key ("api_key")
- "dbAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "dbAuth.usersTable": The table that is used to store the users in ("users")
- "dbAuth.loginTable": The table or view that is used to retrieve the users info for login ("users")
- "dbAuth.usernameColumn": The users table column that holds usernames ("username")
- "dbAuth.passwordColumn": The users table column that holds passwords ("password")
- "dbAuth.returnedColumns": The columns returned on successful login, empty means 'all' ("")
- "dbAuth.usernameFormField": The name of the form field that holds the username ("username")
- "dbAuth.passwordFormField": The name of the form field that holds the password ("password")
- "dbAuth.newPasswordFormField": The name of the form field that holds the new password ("newPassword")
- "dbAuth.registerUser": JSON user data (or "1") in case you want the /register endpoint enabled ("")
- "dbAuth.loginAfterRegistration": 1 or zero if registered users should be logged in after registration ("")
- "dbAuth.passwordLength": Minimum length that the password must have ("12")
- "dbAuth.sessionName": The name of the PHP session that is started ("")
- "wpAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "wpAuth.wpDirectory": The folder/path where the Wordpress install can be found (".")
- "wpAuth.usernameFormField": The name of the form field that holds the username ("username")
- "wpAuth.passwordFormField": The name of the form field that holds the password ("password")
- "jwtAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "jwtAuth.header": Name of the header containing the JWT token ("X-Authorization")
- "jwtAuth.leeway": The acceptable number of seconds of clock skew ("5")
- "jwtAuth.ttl": The number of seconds the token is valid ("30")
- "jwtAuth.secrets": The shared secret(s) used to sign the JWT token with ("")
- "jwtAuth.algorithms": The algorithms that are allowed, empty means 'all' ("")
- "jwtAuth.audiences": The audiences that are allowed, empty means 'all' ("")
- "jwtAuth.issuers": The issuers that are allowed, empty means 'all' ("")
- "jwtAuth.sessionName": The name of the PHP session that is started ("")
- "basicAuth.mode": Set to "optional" if you want to allow anonymous access ("required")
- "basicAuth.realm": Text to prompt when showing login ("Username and password required")
- "basicAuth.passwordFile": The file to read for username/password combinations (".htpasswd")
- "basicAuth.sessionName": The name of the PHP session that is started ("")
- "reconnect.driverHandler": Handler to implement retrieval of the database driver ("")
- "reconnect.addressHandler": Handler to implement retrieval of the database address ("")
- "reconnect.portHandler": Handler to implement retrieval of the database port ("")
- "reconnect.databaseHandler": Handler to implement retrieval of the database name ("")
- "reconnect.tablesHandler": Handler to implement retrieval of the table names ("")
- "reconnect.mappingHandler": Handler to implement retrieval of the name mapping ("")
- "reconnect.usernameHandler": Handler to implement retrieval of the database username ("")
- "reconnect.passwordHandler": Handler to implement retrieval of the database password ("")
- "authorization.tableHandler": Handler to implement table authorization rules ("")
- "authorization.columnHandler": Handler to implement column authorization rules ("")
- "authorization.pathHandler": Handler to implement path authorization rules ("")
- "authorization.recordHandler": Handler to implement record authorization filter rules ("")
- "validation.handler": Handler to implement validation rules for input values ("")
- "validation.types": Types to enable type validation for, empty means 'none' ("all")
- "validation.tables": Tables to enable type validation for, empty means 'none' ("all")
- "ipAddress.tables": Tables to search for columns to override with IP address ("")
- "ipAddress.columns": Columns to protect and override with the IP address on create ("")
- "sanitation.handler": Handler to implement sanitation rules for input values ("")
- "sanitation.types": Types to enable type sanitation for, empty means 'none' ("all")
- "sanitation.tables": Tables to enable type sanitation for, empty means 'none' ("all")
- "multiTenancy.handler": Handler to implement simple multi-tenancy rules ("")
- "pageLimits.pages": The maximum page number that a list operation allows ("100")
- "pageLimits.records": The maximum number of records returned by a list operation ("1000")
- "joinLimits.depth": The maximum depth (length) that is allowed in a join path ("3")
- "joinLimits.tables": The maximum number of tables that you are allowed to join ("10")
- "joinLimits.records": The maximum number of records returned for a joined entity ("1000")
- "textSearch.parameter": The name of the parameter used for the search term ("search")
- "customization.beforeHandler": Handler to implement request customization ("")
- "customization.afterHandler": Handler to implement response customization ("")
- "json.controllers": Controllers to process JSON strings for ("records,geojson")
- "json.tables": Tables to process JSON strings for ("all")
- "json.columns": Columns to process JSON strings for ("all")
- "xml.types": JSON types that should be added to the XML type attribute ("null,array")

If you don't specify these parameters in the configuration, then the default values (between brackets) are used.

In the sections below you find more information on the built-in middleware.

### Authentication

Currently there are five types of authentication supported. They all store the authenticated user in the `$_SESSION` super global.
This variable can be used in the authorization handlers to decide wether or not somebody should have read or write access to certain tables, columns or records.
The following overview shows the kinds of authentication middleware that you can enable.

| Name       | Middleware   | Authenticated via      | Users are stored in | Session variable        |
| ---------- | ------------ | ---------------------- | ------------------- | ----------------------- |
| API key    | apiKeyAuth   | 'X-API-Key' header     | configuration       | `$_SESSION['apiKey']`   |
| API key DB | apiKeyDbAuth | 'X-API-Key' header     | database table      | `$_SESSION['apiUser']`  |
| Database   | dbAuth       | '/login' endpoint      | database table      | `$_SESSION['user']`     |
| Basic      | basicAuth    | 'Authorization' header | '.htpasswd' file    | `$_SESSION['username']` |
| JWT        | jwtAuth      | 'Authorization' header | identity provider   | `$_SESSION['claims']`   |

Below you find more information on each of the authentication types.

#### API key authentication

API key authentication works by sending an API key in a request header.
The header name defaults to "X-API-Key" and can be configured using the 'apiKeyAuth.header' configuration parameter.
Valid API keys must be configured using the 'apiKeyAuth.keys' configuration parameter (comma separated list).

    X-API-Key: 02c042aa-c3c2-4d11-9dae-1a6e230ea95e

The authenticated API key will be stored in the `$_SESSION['apiKey']` variable.

Note that the API key authentication does not require or use session cookies.

#### API key database authentication

API key database authentication works by sending an API key in a request header "X-API-Key" (the name is configurable).
Valid API keys are read from the database from the column "api_key" of the "users" table (both names are configurable).

    X-API-Key: 02c042aa-c3c2-4d11-9dae-1a6e230ea95e

The authenticated user (with all it's properties) will be stored in the `$_SESSION['apiUser']` variable.

Note that the API key database authentication does not require or use session cookies.

#### Database authentication

The database authentication middleware defines five new routes:

    method path       - parameters                      - description
    ---------------------------------------------------------------------------------------------------
    GET    /me        -                                 - returns the user that is currently logged in
    POST   /register  - username, password              - adds a user with given username and password
    POST   /login     - username, password              - logs a user in by username and password
    POST   /password  - username, password, newPassword - updates the password of the logged in user
    POST   /logout    -                                 - logs out the currently logged in user

A user can be logged in by sending it's username and password to the login endpoint (in JSON format).
The authenticated user (with all it's properties) will be stored in the `$_SESSION['user']` variable.
The user can be logged out by sending a POST request with an empty body to the logout endpoint.
The passwords are stored as hashes in the password column in the users table. You can register a new user
using the register endpoint, but this functionality must be turned on using the "dbAuth.registerUser"
configuration parameter.

It is IMPORTANT to restrict access to the users table using the 'authorization' middleware, otherwise all 
users can freely add, modify or delete any account! The minimal configuration is shown below:

    'middlewares' => 'dbAuth,authorization',
    'authorization.tableHandler' => function ($operation, $tableName) {
        return $tableName != 'users';
    },

Note that this middleware uses session cookies and stores the logged in state on the server.

**Login using views with joined table**

For login operations, it is possible to use a view as the usersTable. Such view can return a filtered result from the users table, e.g., *where active = true* or it may also return a result multiple tables thru a table join. At a minimum, the view should include the ***username*** and ***password*** and a field named ***id***.

However, views with joined tables are not insertable ([see issue 907](https://github.com/mevdschee/php-crud-api/issues/907) ). As a workaround, use the property ***loginTable*** to set a different reference table for login. The **usersTable** will still be set to the normal, insertable users table. 

#### Wordpress authentication

The Wordpress authentication middleware defines three routes:

    method path       - parameters                      - description
    ---------------------------------------------------------------------------------------------------
    GET    /me        -                                 - returns the user that is currently logged in
    POST   /login     - username, password              - logs a user in by username and password
    POST   /logout    -                                 - logs out the currently logged in user

A user can be logged in by sending it's username and password to the login endpoint (in JSON format).
The user can be logged out by sending a POST request with an empty body to the logout endpoint.
You need to specify the Wordpress installation directory using the "wpAuth.wpDirectory" configuration parameter.
The middleware calls "wp-load.php" this allows you to use Wordpress functions in the authorization middleware, like:

- wp_get_current_user()
- is_user_logged_in()
- is_super_admin()
- user_can(wp_get_current_user(),'edit_posts');

Note that the `$_SESSION` variable is not used by this middleware.

#### Basic authentication

The Basic type supports a file (by default '.htpasswd') that holds the users and their (hashed) passwords separated by a colon (':'). 
When the passwords are entered in plain text they will be automatically hashed.
The authenticated username will be stored in the `$_SESSION['username']` variable.
You need to send an "Authorization" header containing a base64 url encoded version of your colon separated username and password, after the word "Basic".

    Authorization: Basic dXNlcm5hbWUxOnBhc3N3b3JkMQ

This example sends the string "username1:password1".

#### JWT authentication

The JWT type requires another (SSO/Identity) server to sign a token that contains claims. 
Both servers share a secret so that they can either sign or verify that the signature is valid.
Claims are stored in the `$_SESSION['claims']` variable. You need to send an "X-Authorization" 
header containing a base64 url encoded and dot separated token header, body and signature after
the word "Bearer" ([read more about JWT here](https://jwt.io/)). The standard says you need to
use the "Authorization" header, but this is problematic in Apache and PHP.

    X-Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImlhdCI6IjE1MzgyMDc2MDUiLCJleHAiOjE1MzgyMDc2MzV9.Z5px_GT15TRKhJCTHhDt5Z6K6LRDSFnLj8U5ok9l7gw

This example sends the signed claims:

    {
      "sub": "1234567890",
      "name": "John Doe",
      "admin": true,
      "iat": "1538207605",
      "exp": 1538207635
    }

NB: The JWT implementation only supports the RSA and HMAC based algorithms.

##### Configure and test JWT authentication with Auth0

First you need to create an account on [Auth0](https://auth0.com/auth/login).
Once logged in, you have to create an application (its type does not matter). Collect the `Domain`
and `Client ID` and keep them for a later use. Then, create an API: give it a name and fill the
`identifier` field with your API endpoint's URL.

Then you have to configure the `jwtAuth.secrets` configuration in your `api.php` file.
Don't fill it with the `secret` you will find in your Auth0 application settings but with **a
public certificate**. To find it, go to the settings of your application, then in "Extra settings".
You will now find a "Certificates" tab where you will find your Public Key in the Signing
Certificate field.

To test your integration, you can copy the [auth0/vanilla.html](examples/clients/auth0/vanilla.html)
file. Be sure to fill these three variables:

 - `authUrl` with your Auth0 domain
 - `clientId` with your Client ID
 - `audience` with the API URL you created in Auth0

Note that if you don't fill the audience parameter, it will not work because you won't get a valid JWT.
Also note that you should fill `jwtAuth.audiences` (with the value of the `audience`) to ensure the
tokens are validated to be generated for your application.

You can also change the `url` variable, used to test the API with authentication.

[More info](https://auth0.com/docs/api-auth/tutorials/verify-access-token)

##### Configure and test JWT authentication with Firebase

First you need to create a Firebase project on the [Firebase console](https://console.firebase.google.com/).
Add a web application to this project and grab the code snippet for later use.

Then you have to configure the `jwtAuth.secrets` configuration in your `api.php` file. 
This can be done as follows:

a. Log a user in to your Firebase-based app, get an authentication token for that user
b. Go to [https://jwt.io/](https://jwt.io/) and paste the token in the decoding field
c. Read the decoded header information from the token, it will give you the correct `kid`
d. Grab the public key via this [URL](https://www.googleapis.com/robot/v1/metadata/x509/securetoken@system.gserviceaccount.com), which corresponds to your `kid` from previous step
e. Now, just fill `jwtAuth.secrets` with your public key in the `api.php`

Also configure the `jwtAuth.audiences` (fill in the Firebase project ID).

Here is an example of what it should look like in the configuration:

```
...,
'middlewares' => 'cors, jwtAuth, authorization',
        'jwtAuth.secrets' => "ce5ced6e40dcd1eff407048867b1ed1e706686a0:-----BEGIN CERTIFICATE-----\nMIIDHDCCAgSgAwIBAgIIExun9bJSK1wwDQYJKoZIhvcNAQEFBQAwMTEvMC0GA1UE\nAxMmc2VjdXJldG9rZW4uc3lzdGVtLmdzZXJ2aWNlYWNjb3VudC5jb20wHhcNMTkx\nMjIyMjEyMTA3WhcNMjAwMTA4MDkzNjA3WjAxMS8wLQYDVQQDEyZzZWN1cmV0b2tl\nbi5zeXN0ZW0uZ3NlcnZpY2VhY2NvdW50LmNvbTCCASIwDQYJKoZIhvcNAQEBBQAD\nggEPADCCAQoCggEBAKsvVDUwXeYQtySNvyI1/tZAk0sj7Zx4/1+YLUomwlK6vmEd\nyl2IXOYOj3VR7FBA24A9//nnrp+mV8YOYEOdaWX7PQo0PIPFPqdA0r7CqBUWHPfQ\n1WVHVRQY3G0c7upM97UfMes9xOrMqyvecMRk1e5S6eT12Zh2og7yiVs8gP83M1EB\nGqseUaltaadjyT35w5B0Ny0/7NdLYiv2G6Z0S821SxvSo1/wfmilnBBKYYluP0PA\n9NPznWFP6uXnX7gKxyJT9//cYVxTO6+b1TT13Yvrpm1a4EuCOhLrZH6ErHQTccAM\nhAx8mdNtbROsp0dlPKrSfqO82uFz45RXZYmSeP0CAwEAAaM4MDYwDAYDVR0TAQH/\nBAIwADAOBgNVHQ8BAf8EBAMCB4AwFgYDVR0lAQH/BAwwCgYIKwYBBQUHAwIwDQYJ\nKoZIhvcNAQEFBQADggEBACNsJ5m00gdTvD6j6ahURsGrNZ0VJ0YREVQ5U2Jtubr8\nn2fuhMxkB8147ISzfi6wZR+yNwPGjlr8JkAHAC0i+Nam9SqRyfZLqsm+tHdgFT8h\npa+R/FoGrrLzxJNRiv0Trip8hZjgz3PClz6KxBQzqL+rfGV2MbwTXuBoEvLU1mYA\no3/UboJT7cNGjZ8nHXeoKMsec1/H55lUdconbTm5iMU1sTDf+3StGYzTwC+H6yc2\nY3zIq3/cQUCrETkALrqzyCnLjRrLYZu36ITOaKUbtmZhwrP99i2f+H4Ab2i8jeMu\nk61HD29mROYjl95Mko2BxL+76To7+pmn73U9auT+xfA=\n-----END CERTIFICATE-----\n",
        'jwtAuth.audiences' => 'your-project-id',
        'cors.allowedOrigins' => '*',
        'cors.allowHeaders' => 'X-Authorization'
```

Notes:
 - The `kid:key` pair is formatted as a string
 - Do not include spaces before or after the ':'
 - Use double quotation marks (") around the string text
 - The string must contain the linefeeds (\n)
 - `jwtAuth.audiences` should contain your Firebase projectId

To test your integration, you can copy the [firebase/vanilla.html](examples/clients/firebase/vanilla.html)
file and the [firebase/vanilla-success.html](examples/clients/firebase/vanilla-success.html) file,
used as a "success" page and to display the API result.

Replace, in both files, the Firebase configuration (`firebaseConfig` object).

You can also change the `url` variable, used to test the API with authentication.

[More info](https://firebase.google.com/docs/auth/admin/verify-id-tokens#verify_id_tokens_using_a_third-party_jwt_library)

### Authorizing operations

The Authorization model acts on "operations". The most important ones are listed here:

    method path                  - operation - description
    ----------------------------------------------------------------------------------------
    GET    /records/{table}      - list      - lists records
    POST   /records/{table}      - create    - creates records
    GET    /records/{table}/{id} - read      - reads a record by primary key
    PUT    /records/{table}/{id} - update    - updates columns of a record by primary key
    DELETE /records/{table}/{id} - delete    - deletes a record by primary key
    PATCH  /records/{table}/{id} - increment - increments columns of a record by primary key

The "`/openapi`" endpoint will only show what is allowed in your session. It also has a special 
"document" operation to allow you to hide tables and columns from the documentation.
    
For endpoints that start with "`/columns`" there are the operations "reflect" and "remodel". 
These operations can display or change the definition of the database, table or column. 
This functionality is disabled by default and for good reason (be careful!). 
Add the "columns" controller in the configuration to enable this functionality.

### Authorizing tables, columns and records

By default all tables, columns and paths are accessible. If you want to restrict access to some tables you may add the 'authorization' middleware 
and define a 'authorization.tableHandler' function that returns 'false' for these tables.

    'authorization.tableHandler' => function ($operation, $tableName) {
        return $tableName != 'license_keys';
    },

The above example will restrict access to the table 'license_keys' for all operations.

    'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
        return !($tableName == 'users' && $columnName == 'password');
    },

The above example will restrict access to the 'password' field of the 'users' table for all operations.

    'authorization.recordHandler' => function ($operation, $tableName) {
        return ($tableName == 'users') ? 'filter=username,neq,admin' : '';
    },

The above example will disallow access to user records where the username is 'admin'. 
This construct adds a filter to every executed query. 

    'authorization.pathHandler' => function ($path) {
        return $path === 'openapi' ? false : true;
    },

The above example will disabled the `/openapi` route.

NB: You need to handle the creation of invalid records with a validation (or sanitation) handler.

### SQL GRANT authorization

You can alternatively use database permissons (SQL GRANT statements) to define the authorization model. In this case you
should not use the "authorization" middleware, but you do need to use the "reconnect" middleware. The handlers of the
"reconnect" middleware allow you to specify the correct username and password, like this:

    'reconnect.usernameHandler' => function () {
        return 'mevdschee';
    },
    'reconnect.passwordHandler' => function () {
        return 'secret123';
    },

This will make the API connect to the database specifying "mevdschee" as the username and "secret123" as the password.
The OpenAPI specification is less specific on allowed and disallowed operations when you are using database permissions,
as the permissions are not read in the reflection step.

NB: You may want to retrieve the username and password from the session (the "$_SESSION" variable).

### Sanitizing input

By default all input is accepted and sent to the database. If you want to strip (certain) HTML tags before storing you may add 
the 'sanitation' middleware and define a 'sanitation.handler' function that returns the adjusted value.

    'sanitation.handler' => function ($operation, $tableName, $column, $value) {
        return is_string($value) ? strip_tags($value) : $value;
    },

The above example will strip all HTML tags from strings in the input.

### Type sanitation

If you enable the 'sanitation' middleware, then you (automatically) also enable type sanitation. When this is enabled you may:

- send leading and trailing whitespace in a non-character field (it will be ignored).
- send a float to an integer or bigint field (it will be rounded).
- send a base64url encoded string (it will be converted to regular base64 encoding).
- send a time/date/timestamp in any [strtotime accepted format](https://www.php.net/manual/en/datetime.formats.php) (it will be converted).

You may use the config settings "`sanitation.types`" and "`sanitation.tables`"' to define for which types and
in which tables you want to apply type sanitation (defaults to 'all'). Example:

    'sanitation.types' => 'date,timestamp',
    'sanitation.tables' => 'posts,comments',

Here we enable the type sanitation for date and timestamp fields in the posts and comments tables.

### Validating input

By default all input is accepted and sent to the database. If you want to validate the input in a custom way, 
you may add the 'validation' middleware and define a 'validation.handler' function that returns a boolean 
indicating whether or not the value is valid.

    'validation.handler' => function ($operation, $tableName, $column, $value, $context) {
        return ($column['name'] == 'post_id' && !is_numeric($value)) ? 'must be numeric' : true;
    },

When you edit a comment with id 4 using:

    PUT /records/comments/4

And you send as a body:

    {"post_id":"two"}

Then the server will return a '422' HTTP status code and nice error message:

    {
        "code": 1013,
        "message": "Input validation failed for 'comments'",
        "details": {
            "post_id":"must be numeric"
        }
    }

You can parse this output to make form fields show up with a red border and their appropriate error message.

### Type validations

If you enable the 'validation' middleware, then you (automatically) also enable type validation. 
This includes the following error messages:

| error message       | reason                      | applies to types                            |
| ------------------- | --------------------------- | ------------------------------------------- |
| cannot be null      | unexpected null value       | (any non-nullable column)                   |
| illegal whitespace  | leading/trailing whitespace | integer bigint decimal float double boolean |
| invalid integer     | illegal characters          | integer bigint                              |
| string too long     | too many characters         | varchar varbinary                           |
| invalid decimal     | illegal characters          | decimal                                     |
| decimal too large   | too many digits before dot  | decimal                                     |
| decimal too precise | too many digits after dot   | decimal                                     |
| invalid float       | illegal characters          | float double                                |
| invalid boolean     | use 1, 0, true or false     | boolean                                     |
| invalid date        | use yyyy-mm-dd              | date                                        |
| invalid time        | use hh:mm:ss                | time                                        |
| invalid timestamp   | use yyyy-mm-dd hh:mm:ss     | timestamp                                   |
| invalid base64      | illegal characters          | varbinary, blob                             |

You may use the config settings "`validation.types`" and "`validation.tables`"' to define for which types and
in which tables you want to apply type validation (defaults to 'all'). Example:

    'validation.types' => 'date,timestamp',
    'validation.tables' => 'posts,comments',

Here we enable the type validation for date and timestamp fields in the posts and comments tables.

NB: Types that are enabled will be checked for null values when the column is non-nullable.

### Multi-tenancy support

Two forms of multi-tenancy are supported:

 - Single database, where every table has a tenant column (using the "multiTenancy" middleware).
 - Multi database, where every tenant has it's own database (using the "reconnect" middleware).

Below is an explanation of the corresponding middlewares.

#### Multi-tenancy middleware

You may use the "multiTenancy" middleware when you have a single multi-tenant database. 
If your tenants are identified by the "customer_id" column, then you can use the following handler:

    'multiTenancy.handler' => function ($operation, $tableName) {
        return ['customer_id' => 12];
    },

This construct adds a filter requiring "customer_id" to be "12" to every operation (except for "create").
It also sets the column "customer_id" on "create" to "12" and removes the column from any other write operation.

NB: You may want to retrieve the customer id from the session (the "$_SESSION" variable).

#### Reconnect middleware

You may use the "reconnect" middleware when you have a separate database for each tenant.
If the tenant has it's own database named "customer_12", then you can use the following handler:

    'reconnect.databaseHandler' => function () {
        return 'customer_12';
    },

This will make the API reconnect to the database specifying "customer_12" as the database name. If you don't want
to use the same credentials, then you should also implement the "usernameHandler" and "passwordHandler".

NB: You may want to retrieve the database name from the session (the "$_SESSION" variable).

### Prevent database scraping

You may use the "joinLimits" and "pageLimits" middleware to prevent database scraping.
The "joinLimits" middleware limits the table depth, number of tables and number of records returned in a join operation. 
If you want to allow 5 direct direct joins with a maximum of 25 records each, you can specify:

    'joinLimits.depth' => 1,
    'joinLimits.tables' => 5,
    'joinLimits.records' => 25,

The "pageLimits" middleware limits the page number and the number records returned from a list operation. 
If you want to allow no more than 10 pages with a maximum of 25 records each, you can specify:

    'pageLimits.pages' => 10,
    'pageLimits.records' => 25,

NB: The maximum number of records is also applied when there is no page number specified in the request.

### Search all text fields

You may use the "textSearch" middleware to simplify (wildcard) text searches when listing records. 
It allows you to specify a "search" parameter using:

    GET /records/posts?search=Hello

It will return all records from "posts" that contain "Hello" in one of their text (typed) fields:

    {
        "records":[
            {
                "id": 1,
                "title": "Hello world!",
                "content": "Welcome to the first post.",
                "created": "2018-03-05T20:12:56Z"
            }
        ]
    }

The example searches the fields "title" or "content" for the substring "Hello".

### Customization handlers

You may use the "customization" middleware to modify request and response and implement any other functionality.

    'customization.beforeHandler' => function ($operation, $tableName, $request, $environment) {
        $environment->start = microtime(true);
    },
    'customization.afterHandler' => function ($operation, $tableName, $response, $environment) {
        return $response->withHeader('X-Time-Taken', microtime(true) - $environment->start);
    },

The above example will add a header "X-Time-Taken" with the number of seconds the API call has taken.

### JSON encoding options

You can change the way the JSON is encoded by setting the configuration parameter "jsonOptions".

    'jsonOptions' => JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,

The above example will set JSON options to 128+256+64 = 448, as per the list of options below:

    JSON_HEX_TAG (1)
        All < and > are converted to \u003C and \u003E. 
    JSON_HEX_AMP (2)
        All & are converted to \u0026. 
    JSON_HEX_APOS (4)
        All ' are converted to \u0027. 
    JSON_HEX_QUOT (8)
        All " are converted to \u0022. 
    JSON_FORCE_OBJECT (16)
        Outputs an object rather than an array when a non-associative array is used. 
        Especially useful when the recipient of the output is expecting an object and 
        the array is empty. 
    JSON_NUMERIC_CHECK (32)
        Encodes numeric strings as numbers. 
    JSON_UNESCAPED_SLASHES (64)
        Don't escape /. 
    JSON_PRETTY_PRINT (128)
        Use whitespace in returned data to format it. 
    JSON_UNESCAPED_UNICODE (256)
        Encode multibyte Unicode characters literally (default is to escape as \uXXXX). 
    JSON_PARTIAL_OUTPUT_ON_ERROR (512)
        Substitute some unencodable values instead of failing. 
    JSON_PRESERVE_ZERO_FRACTION (1024)
        Ensures that float values are always encoded as a float value. 
    JSON_UNESCAPED_LINE_TERMINATORS (2048)
        The line terminators are kept unescaped when JSON_UNESCAPED_UNICODE is supplied. 
        It uses the same behaviour as it was before PHP 7.1 without this constant. 
        Available as of PHP 7.1.0. 

Source: [PHP's JSON constants documentation](https://www.php.net/manual/en/json.constants.php) 

### JSON middleware

You may use the "json" middleware to read/write JSON strings as JSON objects and arrays.

JSON strings are automatically detected when the "json" middleware is enabled.

You may limit the scanning of by specifying specific table and/or field names: 

    'json.tables' => 'products',
    'json.columns' => 'properties',

This will change the output of:

    GET /records/products/1

Without "json" middleware the output will be:

    {
        "id": 1,
        "name": "Calculator",
        "price": "23.01",
        "properties": "{\"depth\":false,\"model\":\"TRX-120\",\"width\":100,\"height\":null}",
    }

With "json" middleware the output will be:

    {
        "id": 1,
        "name": "Calculator",
        "price": "23.01",
        "properties": {
            "depth": false,
            "model": "TRX-120",
            "width": 100,
            "height": null
        },
    }

This also applies when creating or modifying JSON string fields (also when using batch operations).

Note that JSON string fields cannot be partially updated and that this middleware is disabled by default.
You can enable the "json" middleware using the "middlewares" configuration setting.

### XML middleware

You may use the "xml" middleware to translate input and output from JSON to XML. This request:

    GET /records/posts/1

Outputs (when "pretty printed"):

    {
        "id": 1,
        "user_id": 1,
        "category_id": 1,
        "content": "blog started"
    }

While (note the "format" query parameter):

    GET /records/posts/1?format=xml

Outputs:

    <root>
        <id>1</id>
        <user_id>1</user_id>
        <category_id>1</category_id>
        <content>blog started</content>
    </root>

This functionality is disabled by default and must be enabled using the "middlewares" configuration setting.

### File uploads

File uploads are supported through the [FileReader API](https://caniuse.com/#feat=filereader), check out the [example](https://github.com/mevdschee/php-crud-api/blob/master/examples/clients/upload/vanilla.html).

## OpenAPI specification

On the "/openapi" end-point the OpenAPI 3.0 (formerly called "Swagger") specification is served. 
It is a machine readable instant documentation of your API. To learn more, check out these links:

- [Swagger Editor](https://editor.swagger.io/) can be used to view and debug the generated specification.
- [OpenAPI specification](https://swagger.io/specification/) is a manual for creating an OpenAPI specification.
- [Swagger Petstore](https://petstore.swagger.io/) is an example documentation that is generated using OpenAPI.

## Cache

There are 4 cache engines that can be configured by the "cacheType" config parameter:

- TempFile (default)
- Redis
- Memcache
- Memcached

You can install the dependencies for the last three engines by running:

    sudo apt install php-redis redis
    sudo apt install php-memcache memcached
    sudo apt install php-memcached memcached

The default engine has no dependencies and will use temporary files in the system "temp" path.

You may use the "cachePath" config parameter to specify the file system path for the temporary files or
in case that you use a non-default "cacheType" the hostname (optionally with port) of the cache server.

## Types

These are the supported types with their length, category, JSON type and format:

| type       | length | category  | JSON type | format              |
| ---------- | ------ | --------- | --------- | ------------------- |
| varchar    | 255    | character | string    |                     |
| clob       |        | character | string    |                     |
| boolean    |        | boolean   | boolean   |                     |
| integer    |        | integer   | number    |                     |
| bigint     |        | integer   | number    |                     |
| float      |        | float     | number    |                     |
| double     |        | float     | number    |                     |
| decimal    | 19,4   | decimal   | string    |                     |
| date       |        | date/time | string    | yyyy-mm-dd          | 
| time       |        | date/time | string    | hh:mm:ss            |
| timestamp  |        | date/time | string    | yyyy-mm-dd hh:mm:ss |
| varbinary  | 255    | binary    | string    | base64 encoded      |
| blob       |        | binary    | string    | base64 encoded      |
| geometry   |        | other     | string    | well-known text     |

Note that geometry is a non-jdbc type and thus has limited support.

## Data types in JavaScript

Javascript and Javascript object notation (JSON) are not very well suited for reading database records. Decimal, date/time, binary and geometry types must be represented as strings in JSON (binary is base64 encoded, geometries are in WKT format). Below are two more serious issues described.

### 64 bit integers

JavaScript does not support 64 bit integers. All numbers are stored as 64 bit floating point values. The mantissa of a 64 bit floating point number is only 53 bit and that is why all integer numbers bigger than 53 bit may cause problems in JavaScript.

### Inf and NaN floats

The valid floating point values 'Infinite' (calculated with '1/0') and 'Not a Number' (calculated with '0/0') cannot be expressed in JSON, as they are not supported by the [JSON specification](https://www.json.org). When these values are stored in a database then you cannot read them as this script outputs database records as JSON.

## Errors

The following errors may be reported:

| Error | HTTP response code        | Message
| ----- | ------------------------- | --------------
| 1000  | 404 Not found             | Route not found 
| 1001  | 404 Not found             | Table not found 
| 1002  | 422 Unprocessable entity  | Argument count mismatch 
| 1003  | 404 Not found             | Record not found 
| 1004  | 403 Forbidden             | Origin is forbidden 
| 1005  | 404 Not found             | Column not found 
| 1006  | 409 Conflict              | Table already exists 
| 1007  | 409 Conflict              | Column already exists 
| 1008  | 422 Unprocessable entity  | Cannot read HTTP message 
| 1009  | 409 Conflict              | Duplicate key exception 
| 1010  | 409 Conflict              | Data integrity violation 
| 1011  | 401 Unauthorized          | Authentication required 
| 1012  | 403 Forbidden             | Authentication failed 
| 1013  | 422 Unprocessable entity  | Input validation failed 
| 1014  | 403 Forbidden             | Operation forbidden 
| 1015  | 405 Method not allowed    | Operation not supported 
| 1016  | 403 Forbidden             | Temporary or permanently blocked 
| 1017  | 403 Forbidden             | Bad or missing XSRF token 
| 1018  | 403 Forbidden             | Only AJAX requests allowed 
| 1019  | 403 Forbidden             | Pagination Forbidden 
| 1020  | 409 Conflict              | User already exists
| 1021  | 422 Unprocessable entity  | Password too short
| 1022  | 422 Unprocessable entity  | Username is empty
| 1023  | 404 Not found             | Primary key not found
| 9999  | 500 Internal server error | Unknown error 

The following JSON structure is used:

    {
        "code":1002,
        "message":"Argument count mismatch in '1'"
    }

NB: Any non-error response will have status: 200 OK

## Status

To connect to your monitoring there is a 'ping' endpoint:

    GET /status/ping

And this should return status 200 and as data:

    {
        "db": 42,
        "cache": 9
    }

These can be used to measure the time (in microseconds) to connect and read data from the database and the cache.

## Custom controller

You can add your own custom REST API endpoints by writing your own custom controller class. 
The class must provide a constructor that accepts five parameters. With these parameters you can register
your own endpoint to the existing router. This endpoint may use the database and/or the reflection class
of the database.

Here is an example of a custom controller class:

```
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class MyHelloController {

    private $responder;

    public function __construct(Router $router, Responder $responder, GenericDB $db, ReflectionService $reflection, Cache $cache)
    {
        $router->register('GET', '/hello', array($this, 'getHello'));
        $this->responder = $responder;
    }

    public function getHello(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->success(['message' => "Hello World!"]);
    }
}
```

And then you may register your custom controller class in the config object like this:

```
$config = new Config([
    ...
    'customControllers' => 'MyHelloController',
    ...
]);
```

The `customControllers` config supports a comma separated list of custom controller classes.

## Tests

I am testing mainly on Ubuntu and I have the following test setups:

  - (Docker) Debian 10 with PHP 7.3, MariaDB 10.3, PostgreSQL 11.4 (PostGIS 2.5) and SQLite 3.27
  - (Docker) Debian 11 with PHP 7.4, MariaDB 10.5, PostgreSQL 13.4 (PostGIS 3.1) and SQLite 3.34
  - (Docker) Debian 12 with PHP 8.2, MariaDB 10.11, PostgreSQL 15.3 (PostGIS 3.3) and SQLite 3.40
  - (Docker) RockyLinux 8 with PHP 7.2, MariaDB 10.3 and SQLite 3.26
  - (Docker) RockyLinux 9 with PHP 8.0, MariaDB 10.5 and SQLite 3.34
  - (Docker) Ubuntu 18.04 with PHP 7.2, MySQL 5.7, PostgreSQL 10.4 (PostGIS 2.4) and SQLite 3.22
  - (Docker) Ubuntu 20.04 with PHP 7.4, MySQL 8.0, PostgreSQL 12.15 (PostGIS 3.0) and SQLite 3.31 and SQL Server 2019
  - (Docker) Ubuntu 22.04 with PHP 8.1, MySQL 8.0, PostgreSQL 14.2 (PostGIS 3.2) and SQLite 3.37 
  - (Docker) Ubuntu 24.04 with PHP 8.3, MySQL 8.0, PostgreSQL 16.2 (PostGIS 3.4) and SQLite 3.45

This covers not all environments (yet), so please notify me of failing tests and report your environment. 
I will try to cover most relevant setups in the "docker" folder of the project.

### Running

To run the functional tests locally you may run the following commands:

    php build.php
    php test.php

This runs the functional tests from the "tests" directory. It uses the database dumps (fixtures) and
database configuration (config) from the corresponding subdirectories.

## Pretty URL

You may "rewrite" the URL to remove the "api.php" from the URL.

### Apache config example

Enable mod_rewrite and add the following to your ".htaccess" file:

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ api.php/$1 [L,QSA]
```

The ".htaccess" file needs to go in the same folder as "api.php".

### Nginx config example

Use the following config to serve the API under Nginx and PHP-FPM:

```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;
    server_name server_domain_or_IP;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ [^/]\.php(/|$) {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        try_files $fastcgi_script_name =404;
        set $path_info $fastcgi_path_info;
        fastcgi_param PATH_INFO $path_info;
        fastcgi_index index.php;
        include fastcgi.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### Docker tests

Install docker using the following commands and then logout and login for the changes to take effect:

    sudo apt install docker.io docker-buildx
    sudo usermod -aG docker ${USER}

To run the docker tests run "build_all.sh" and "run_all.sh" from the docker directory. The output should be:

    ================================================
    Debian 10 (PHP 7.3)
    ================================================
    [1/4] Starting MariaDB 10.3 ..... done
    [2/4] Starting PostgreSQL 11.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 921 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 1058 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 752 ms, 13 skipped, 0 failed
    ================================================
    Debian 11 (PHP 7.4)
    ================================================
    [1/4] Starting MariaDB 10.5 ..... done
    [2/4] Starting PostgreSQL 13.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 914 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 997 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 735 ms, 13 skipped, 0 failed
    ================================================
    Debian 12 (PHP 8.2)
    ================================================
    [1/4] Starting MariaDB 10.11 .... done
    [2/4] Starting PostgreSQL 15.3 .. done
    [3/4] Starting SQLServer 2019 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1016 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 1041 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 733 ms, 13 skipped, 0 failed
    ================================================
    RockyLinux 8 (PHP 7.2)
    ================================================
    [1/4] Starting MariaDB 10.3 ..... done
    [2/4] Starting PostgreSQL 11 .... skipped
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 935 ms, 1 skipped, 0 failed
    pgsql: skipped, driver not loaded
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 746 ms, 13 skipped, 0 failed
    ================================================
    RockyLinux 9 (PHP 8.0)
    ================================================
    [1/4] Starting MariaDB 10.5 ..... done
    [2/4] Starting PostgreSQL 12 .... skipped
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 928 ms, 1 skipped, 0 failed
    pgsql: skipped, driver not loaded
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 728 ms, 13 skipped, 0 failed
    ================================================
    Ubuntu 18.04 (PHP 7.2)
    ================================================
    [1/4] Starting MySQL 5.7 ........ done
    [2/4] Starting PostgreSQL 10.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1296 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 1056 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 772 ms, 13 skipped, 0 failed
    ================================================
    Ubuntu 20.04 (PHP 7.4)
    ================================================
    [1/4] Starting MySQL 8.0 ........ done
    [2/4] Starting PostgreSQL 12.2 .. done
    [3/4] Starting SQLServer 2019 ... done
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1375 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 868 ms, 1 skipped, 0 failed
    sqlsrv: 120 tests ran in 5713 ms, 1 skipped, 0 failed
    sqlite: 120 tests ran in 733 ms, 13 skipped, 0 failed
    ================================================
    Ubuntu 22.04 (PHP 8.1)
    ================================================
    [1/4] Starting MySQL 8.0 ........ done
    [2/4] Starting PostgreSQL 14.2 .. done
    [3/4] Starting SQLServer 2019 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1372 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 1064 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 727 ms, 13 skipped, 0 failed
    ================================================
    Ubuntu 24.04 (PHP 8.3)
    ================================================
    [1/4] Starting MySQL 8. ........ done
    [2/4] Starting PostgreSQL 16.2 .. done
    [3/4] Starting SQLServer 2019 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1344 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 856 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 722 ms, 13 skipped, 0 failed

The above test run (including starting up the databases) takes less than 5 minutes on my slow laptop.

    $ ./run.sh
    1) debian10
    2) debian11
    3) debian12
    4) rockylinux8
    5) rockylinux9
    6) ubuntu18
    7) ubuntu20
    8) ubuntu22
    > 6
    ================================================
    Ubuntu 18.04 (PHP 7.2)
    ================================================
    [1/4] Starting MySQL 5.7 ........ done
    [2/4] Starting PostgreSQL 10.4 .. done
    [3/4] Starting SQLServer 2017 ... skipped
    [4/4] Cloning PHP-CRUD-API v2 ... skipped
    ------------------------------------------------
    mysql: 120 tests ran in 1296 ms, 1 skipped, 0 failed
    pgsql: 120 tests ran in 1056 ms, 1 skipped, 0 failed
    sqlsrv: skipped, driver not loaded
    sqlite: 120 tests ran in 772 ms, 13 skipped, 0 failed
    root@b7ab9472e08f:/php-crud-api# 

As you can see the "run.sh" script gives you access to a prompt in the chosen docker environment.
In this environment the local files are mounted. This allows for easy debugging on different environments.
You may type "exit" when you are done.

### Docker image

There is a `Dockerfile` in the repository that is used to build an image at:

[https://hub.docker.com/r/mevdschee/php-crud-api](https://hub.docker.com/r/mevdschee/php-crud-api)

It will be automatically build on every release. The "latest" tag points to the last release.

The docker image accepts the environment variable parameters from the configuration.

### Docker compose

This repository also contains a `docker-compose.yml` file that you can install/build/run using:

    sudo apt install docker-compose
    docker-compose build
    docker-compose up

This will setup a database (MySQL) and a webserver (Apache) and runs the application using the blog example data used in the tests.

Test the script (running in the container) by opening the following URL:

    http://localhost:8080/records/posts/1

### Star History

[![Star History Chart](https://api.star-history.com/svg?repos=mevdschee/php-crud-api&type=Date)](https://star-history.com/#mevdschee/php-crud-api&Date)

Enjoy!
