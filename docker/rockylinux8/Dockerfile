FROM rockylinux:8

RUN dnf -y install 'dnf-command(config-manager)'
RUN dnf config-manager --set-enabled powertools
RUN dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
RUN dnf -qy module disable postgresql
RUN dnf install -y https://download.postgresql.org/pub/repos/yum/reporpms/EL-8-x86_64/pgdg-redhat-repo-latest.noarch.rpm

RUN dnf -y install \
    php-cli php-xml php-json php-mbstring \
    mariadb-server mariadb php-mysqlnd \
    postgresql14-server postgresql14 php-pgsql \
    sqlite php-sqlite3 postgis32_14 \
    git wget

# install run script
ADD run.sh /usr/sbin/docker-run
CMD docker-run