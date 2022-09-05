-- cat create_mysql.sql | sudo mysql
--
DROP USER 'php-crud-api'@'localhost';
DROP DATABASE `php-crud-api`;
--
CREATE DATABASE `php-crud-api` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'php-crud-api'@'localhost' IDENTIFIED BY 'php-crud-api';
GRANT ALL PRIVILEGES ON `php-crud-api`.* TO 'php-crud-api'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;