#!/bin/bash
echo "================================================"
echo " RockyLinux 9 (PHP 8.0)"
echo "================================================"
echo -n "[1/4] Starting MariaDB 10.5 ..... "
# initialize mysql
mysql_install_db > /dev/null
chown -R mysql:mysql /var/log/mariadb /var/lib/mysql
# run mysql server
nohup /usr/bin/mysqld_safe -u mysql > /root/mysql.log 2>&1 &
# wait for mysql to become available
while ! mysqladmin ping -hlocalhost >/dev/null 2>&1; do
    sleep 1
done
# create database and user on mysql
mysql -u root >/dev/null << 'EOF'
CREATE DATABASE `php-crud-api` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'php-crud-api'@'localhost' IDENTIFIED BY 'php-crud-api';
GRANT ALL PRIVILEGES ON `php-crud-api`.* TO 'php-crud-api'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF
echo "done"

echo -n "[2/4] Starting PostgreSQL 12 .... "
echo "skipped"

echo -n "[3/4] Starting SQLServer 2017 ... "
echo "skipped"

echo -n "[4/4] Cloning PHP-CRUD-API v2 ... "
# install software
if [ -d /php-crud-api ]; then
  echo "skipped"
else
  git clone --quiet https://github.com/mevdschee/php-crud-api.git
  echo "done"
fi

echo "------------------------------------------------"

# run the tests
cd php-crud-api
php test.php
