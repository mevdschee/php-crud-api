FROM centos:8

# add this to avoid locale warnings
RUN yum -y install glibc-locale-source glibc-langpack-en
RUN localedef -i en_US -f UTF-8 en_US.UTF-8
# enable the postgresql repo
RUN yum -y install https://download.postgresql.org/pub/repos/yum/reporpms/EL-8-x86_64/pgdg-redhat-repo-latest.noarch.rpm
# enable epel and powertools repos
RUN dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
RUN dnf -y install 'dnf-command(config-manager)' && dnf -y config-manager --set-enabled PowerTools
# disable postgresql appstream repo
RUN dnf -y module disable postgresql

RUN yum -y install \
php-cli php-xml \
mariadb-server mariadb php-mysqlnd php-json \
postgresql12 postgresql12-server php-pgsql postgis30_12 \
sqlite php-sqlite3 \
git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run