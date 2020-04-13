FROM centos:8

RUN yum -y install glibc-locale-source glibc-langpack-en
RUN localedef -i en_US -f UTF-8 en_US.UTF-8

RUN yum -y install \
php-cli php-xml \
mariadb-server mariadb php-mysqlnd php-json \
#postgresql-server postgresql php-pgsql \
sqlite php-sqlite3 \
git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run