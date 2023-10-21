FROM rockylinux:8

RUN dnf -y install \
    php-cli php-xml php-json php-mbstring \
    mariadb-server mariadb php-mysqlnd \
    sqlite php-sqlite3 \
    git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run