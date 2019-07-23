FROM debian:10

ARG DEBIAN_FRONTEND=noninteractive

# install: php / mysql / postgres / tools / mssql deps
RUN apt-get update && apt-get -y install \
php-cli php-xml \
mariadb-server mariadb-client php-mysql \
postgresql php-pgsql \
postgresql-11-postgis-2.5 \
git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run
