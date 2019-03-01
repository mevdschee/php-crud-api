FROM ubuntu:18.04

ARG DEBIAN_FRONTEND=noninteractive

# install: php / mysql / postgres / tools
RUN apt-get update && apt-get -y install \
php-cli php-xml \
mysql-server mysql-client php-mysql \
postgresql php-pgsql \
postgresql-10-postgis-2.4 \
git wget

# install locales
RUN apt-get -y install locales
RUN locale-gen en_US.UTF-8
RUN update-locale LANG=en_US.UTF-8

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run
