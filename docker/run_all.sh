#!/bin/bash
FILES=*

for f in $FILES
do
if [[ -d "$f" ]]
then
  dir=$(readlink -f ..)
  docker rm "php-crud-api_$f" > /dev/null 2>&1
  docker run -ti -v $dir:/php-crud-api --name "php-crud-api_$f" "php-crud-api:$f"
fi
done
