FROM ubuntu:14.04

ADD packages.sh /usr/sbin/docker-packages
RUN docker-packages

ADD install.sh /usr/sbin/docker-install
RUN docker-install

ADD run.sh /usr/sbin/docker-run
CMD docker-run