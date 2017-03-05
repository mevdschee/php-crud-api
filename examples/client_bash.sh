#!/bin/bash
curl 'http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1'
