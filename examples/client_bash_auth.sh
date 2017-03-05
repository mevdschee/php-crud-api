#!/bin/bash

# login and store cookies in 'cookies.txt'
curl 'http://localhost/api.php/' --data "username=admin&password=admin" --cookie-jar cookies.txt --silent >/dev/null

# retrieve the value of the 'XSRF-TOKEN' cookie
TOKEN=`cat cookies.txt|grep XSRF-TOKEN|cut -f 7`

# set the 'XSRF-TOKEN' as the 'X-XSRF-Token' header AND send the cookies to the server
curl 'http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1' --header "X-XSRF-Token: $TOKEN" --cookie cookies.txt

# clean up
rm cookies.txt
