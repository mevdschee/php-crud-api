#!/bin/bash

# initialize cookie store
cp /dev/null cookies.txt

# login and store cookies in 'cookies.txt' AND retrieve the value of the XSRF token
TOKEN=`curl 'http://localhost/api.php/' --data "username=admin&password=admin" --cookie-jar cookies.txt --silent`

# strip the double quotes from the variable (JSON decode)
TOKEN=${TOKEN//\"/}

# set the XSRF token as the 'X-XSRF-Token' header AND send the cookies to the server
curl 'http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1' --header "X-XSRF-Token: $TOKEN" --cookie cookies.txt

# clean up
rm cookies.txt
