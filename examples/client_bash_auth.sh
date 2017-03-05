#!/bin/bash
curl 'http://localhost/api.php/' --data "username=admin&password=admin" --cookie-jar cookies.txt --silent >/dev/null
TOKEN=`cat cookies.txt|grep XSRF-TOKEN|cut -f 7`
curl 'http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1' --header "X-XSRF-Token: $TOKEN" --cookie cookies.txt
rm cookies.txt
