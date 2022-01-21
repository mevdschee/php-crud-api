#!/bin/bash
git checkout main
git pull
#tag=$(git describe --tags | cut -d\- -f1 | sed s/v/release-/)
docker login
docker build . -t mevdschee/php-crud-api:latest
#docker build . -t mevdschee/php-crud-api:$tag
#docker push mevdschee/php-crud-api:$tag
docker push mevdschee/php-crud-api:latest
