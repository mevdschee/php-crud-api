#!/bin/bash

# install software
cd /root; git clone https://github.com/mevdschee/php-crud-api.git
# download phpunit 4.8 for PHP < 5.6
cd php-crud-api; wget https://phar.phpunit.de/phpunit-4.8.phar -O phpunit.phar
# copy dist config to config
cp tests/Config.php.dist tests/Config.php
# replace variables
sed -i 's/{{mysql_hostname}}/localhost/g' tests/Config.php
sed -i 's/{{mysql_username}}/php-crud-api/g' tests/Config.php
sed -i 's/{{mysql_password}}/php-crud-api/g' tests/Config.php
sed -i 's/{{mysql_database}}/php-crud-api/g' tests/Config.php
sed -i 's/{{pgsql_hostname}}/localhost/g' tests/Config.php
sed -i 's/{{pgsql_username}}/php-crud-api/g' tests/Config.php
sed -i 's/{{pgsql_password}}/php-crud-api/g' tests/Config.php
sed -i 's/{{pgsql_database}}/php-crud-api/g' tests/Config.php
sed -i 's/{{sqlite_hostname}}//g' tests/Config.php
sed -i 's/{{sqlite_username}}//g' tests/Config.php
sed -i 's/{{sqlite_password}}//g' tests/Config.php
sed -i 's/{{sqlite_database}}/tests\/sqlite.db/g' tests/Config.php
# move comments
sed -i 's/\/\* Uncomment/\/\/ Uncomment/g' tests/Config.php
sed -i "s/'SQLServer'/\/\* 'SQLServer'/g" tests/Config.php