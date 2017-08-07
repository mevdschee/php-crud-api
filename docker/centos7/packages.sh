#!/bin/bash

# update should not be needed
# yum -y upgdate
# install: php / mysql / postgres / sqlite / tools
yum -y install \
php-cli php-xml \
mariadb-server mariadb php-mysql \
postgresql-server postgresql php-pgsql \
sqlite php-sqlite3 \
git wget