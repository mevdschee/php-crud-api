#!/bin/bash
FILES=*

for f in $FILES
do
if [[ -d "$f" ]]
then
  docker buildx build "$f" -t "php-crud-api:$f"
fi
done
