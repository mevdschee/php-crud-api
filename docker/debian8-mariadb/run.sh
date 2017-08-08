#!/bin/bash

# make sure mysql can create socket and lock
mkdir /var/run/mysqld && chmod 777 /var/run/mysqld
# run mysql server
nohup mysqld > /root/mysql.log 2>&1 &
# wait for mysql to become available
while ! mysqladmin ping -hlocalhost >/dev/null 2>&1; do
    sleep 1
done
# create database and user on mysql
mysql -u root >/dev/null << 'EOF'
CREATE DATABASE `php-crud-api` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'php-crud-api'@'localhost' IDENTIFIED BY 'php-crud-api';
GRANT ALL PRIVILEGES ON `php-crud-api`.* TO 'php-crud-api'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

# run postgres server
nohup su - -c "/usr/lib/postgresql/9.4/bin/postgres -D /etc/postgresql/9.4/main" postgres > /root/postgres.log 2>&1 &
# wait for postgres to become available
until su - -c "psql -U postgres -c '\q'" postgres >/dev/null 2>&1; do
   sleep 1;
done
# create database and user on postgres
su - -c "psql -U postgres >/dev/null" postgres << 'EOF'
CREATE USER "php-crud-api" WITH PASSWORD 'php-crud-api';
CREATE DATABASE "php-crud-api";
GRANT ALL PRIVILEGES ON DATABASE "php-crud-api" to "php-crud-api";
\q
EOF

# run the tests
cd /root/php-crud-api
git pull
php phpunit.phar