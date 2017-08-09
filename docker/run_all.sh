#!/bin/bash
FILES=*

for f in $FILES
do
if [[ -d "$f" ]]
then
  docker run -ti --name "php-crud-api_$f" "php-crud-api:$f"
fi
done
