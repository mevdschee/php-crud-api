FROM ubuntu:16.04

ARG DEBIAN_FRONTEND=noninteractive

# install: php / mysql / postgres / tools / mssql deps
RUN apt-get update && apt-get -y install \
php-cli php-xml \
mariadb-server mariadb-client php-mysql \
postgresql php-pgsql \
postgresql-9.5-postgis-2.2 \
git wget \
curl apt-transport-https debconf-utils sudo

# adding custom MS repository
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN curl https://packages.microsoft.com/config/ubuntu/16.04/mssql-server-2017.list > /etc/apt/sources.list.d/mssql-server-2017.list

# install SQL Server and tools
RUN apt-get update && apt-get -y install mssql-server
RUN ACCEPT_EULA=Y MSSQL_PID=Express MSSQL_SA_PASSWORD=sapwd123! /opt/mssql/bin/mssql-conf setup || true
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql mssql-tools

# install pdo_sqlsrv
RUN apt-get -y install php-pear build-essential unixodbc-dev php-dev
RUN pecl install pdo_sqlsrv-5.3.0
RUN echo extension=pdo_sqlsrv.so > /etc/php/7.0/mods-available/pdo_sqlsrv.ini
RUN phpenmod pdo_sqlsrv

# install locales
RUN apt-get -y install locales
RUN locale-gen en_US.UTF-8
RUN update-locale LANG=en_US.UTF-8

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run
