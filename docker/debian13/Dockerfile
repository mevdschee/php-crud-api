FROM debian:13

ARG DEBIAN_FRONTEND=noninteractive

# install: php / mariadb / postgres / sqlite / tools / mssql deps
RUN apt-get update && apt-get -y install \
    php-cli php-xml php-mbstring \
    mariadb-server mariadb-client php-mysql \
    postgresql php-pgsql \
    postgresql-17-postgis-3 \
    sqlite3 php-sqlite3 \
    git wget \
    curl gnupg ca-certificates

# adding custom MS repository (SQL Server 2025 ships via the Ubuntu 24.04 packages)
RUN mkdir -p /etc/apt/keyrings
RUN wget -qO /etc/apt/keyrings/microsoft.asc https://packages.microsoft.com/keys/microsoft.asc
RUN echo "deb [arch=amd64,arm64,armhf signed-by=/etc/apt/keyrings/microsoft.asc] https://packages.microsoft.com/ubuntu/24.04/mssql-server-2025 noble main" > /etc/apt/sources.list.d/mssql-server-2025.list
RUN echo "deb [arch=amd64,arm64,armhf signed-by=/etc/apt/keyrings/microsoft.asc] https://packages.microsoft.com/ubuntu/24.04/prod noble main" > /etc/apt/sources.list.d/msprod.list

# install SQL Server and tools
RUN apt-get update && apt-get -y install mssql-server
RUN ACCEPT_EULA=Y MSSQL_PID=Express MSSQL_SA_PASSWORD=sapwd123! /opt/mssql/bin/mssql-conf setup || true
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18 unixodbc-dev

# install pdo_sqlsrv
RUN apt-get -y install php-pear build-essential php-dev
RUN pecl channel-update pecl.php.net
RUN pecl install pdo_sqlsrv-5.12.0
RUN echo extension=pdo_sqlsrv.so > /etc/php/8.4/mods-available/pdo_sqlsrv.ini
RUN phpenmod pdo_sqlsrv

# install locales
RUN apt-get -y install locales
RUN sed -i 's/^# *en_US.UTF-8/en_US.UTF-8/' /etc/locale.gen && locale-gen
RUN update-locale LANG=en_US.UTF-8

# install run script
ADD run.sh /usr/sbin/docker-run
CMD ["docker-run"]
