#!/bin/bash

# ensure noninteractive is enabled for apt
export DEBIAN_FRONTEND=noninteractive
# update (upgrade should not be needed)
apt-get -y update # && apt-get -y upgrade
# install: php / mysql / postgres / sqlite / tools
apt-get -y install \
php-cli php-xml \
mariadb-server mariadb-client php-mysql \
postgresql php-pgsql \
sqlite php-sqlite3 \
git wget