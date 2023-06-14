FROM rockylinux:9

RUN dnf -y install 'dnf-command(config-manager)'
RUN dnf config-manager --set-enabled crb
RUN dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-9.noarch.rpm
RUN dnf -qy module disable postgresql
RUN dnf install -y https://download.postgresql.org/pub/repos/yum/reporpms/EL-9-x86_64/pgdg-redhat-repo-latest.noarch.rpm

RUN dnf -y install \
    php-cli php-xml php-json php-mbstring \
    mariadb-server mariadb php-mysqlnd \
    postgresql15-server postgresql15 php-pgsql \
    sqlite php-sqlite3 postgis33_15 \
    git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run