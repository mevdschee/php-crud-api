#!/bin/bash
FILES=*
i=0
options=()
for f in $FILES; do
    if [[ -d "$f" ]]; then
        ((i++))
        options[$i]=$f
    fi
done
PS3="> "
select f in "${options[@]}"; do
    if (( REPLY > 0 && REPLY <= ${#options[@]} )); then
        break
    else
        exit
    fi
done
dir=$(readlink -f ..)
docker rm "php-crud-api_$f" > /dev/null 2>&1
docker run -ti -v $dir:/php-crud-api --name "php-crud-api_$f" "php-crud-api:$f" /bin/bash -c '/usr/sbin/docker-run && cd php-crud-api && /bin/bash'
