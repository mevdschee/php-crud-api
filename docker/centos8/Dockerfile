FROM centos:8

# centos has reached EOL on December 31st, 2021 use vault:
RUN sed -i 's/mirrorlist/#mirrorlist/g' /etc/yum.repos.d/CentOS-*
RUN sed -i 's|#baseurl=http://mirror.centos.org|baseurl=http://vault.centos.org|g' /etc/yum.repos.d/CentOS-*
RUN yum update -y

# add this to avoid locale warnings
RUN dnf -y install glibc-locale-source glibc-langpack-en
RUN localedef -i en_US -f UTF-8 en_US.UTF-8

# add utils for repos
RUN dnf -y install wget dnf-utils

# enable remi repo for php
RUN dnf -y install http://rpms.remirepo.net/enterprise/remi-release-8.rpm
# enable mariadb repo
RUN wget https://downloads.mariadb.com/MariaDB/mariadb_repo_setup && bash mariadb_repo_setup
# enable the postgresql repo
RUN dnf -y install https://download.postgresql.org/pub/repos/yum/reporpms/EL-8-x86_64/pgdg-redhat-repo-latest.noarch.rpm
# enable epel repo
RUN dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
# enable powertools repos
RUN dnf -y install 'dnf-command(config-manager)' && dnf -y config-manager --set-enabled powertools

# set php to remi 8.1
RUN dnf -y module reset php && dnf -y module enable php:remi-8.1
# disable mariadb and postgresql default (appstream) repo
RUN dnf -y module disable mariadb
RUN dnf -y module disable postgresql

RUN dnf -y install \
    php-cli php-xml php-json php-mbstring \
    MariaDB-server MariaDB-client php-mysqlnd \
    postgresql12 postgresql12-server php-pgsql postgis30_12 \
    sqlite php-sqlite3 \
    git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run