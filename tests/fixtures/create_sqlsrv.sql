CREATE DATABASE [php-crud-api]
GO
CREATE LOGIN [php-crud-api] WITH PASSWORD=N'php-crud-api', DEFAULT_DATABASE=[php-crud-api], CHECK_EXPIRATION=OFF, CHECK_POLICY=OFF
GO
USE [php-crud-api]
GO
CREATE USER [php-crud-api] FOR LOGIN [php-crud-api] WITH DEFAULT_SCHEMA=[dbo]
exec sp_addrolemember 'db_owner', 'php-crud-api';
GO