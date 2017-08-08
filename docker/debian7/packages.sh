#!/bin/bash

# ensure noninteractive is enabled for apt
export DEBIAN_FRONTEND=noninteractive
# update (upgrade should not be needed)
apt-get -y update # && apt-get -y upgrade
# install: php / mysql / postgres / sqlite / tools
apt-get -y install \
php5-cli \
mysql-server mysql-client php5-mysql \
postgresql php5-pgsql \
sqlite php5-sqlite \
git wget