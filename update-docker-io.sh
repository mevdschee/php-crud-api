#!/bin/bash

# Get new tags from remote
git fetch --tags
# Get latest tag name
latestTag=$(git describe --tags `git rev-list --tags --max-count=1`)
# Checkout latest tag
git checkout $latestTag || exit
# Make docker tag
dockerTag=$(echo $latestTag | sed s/v/release-/)
# Build release
docker build . -t mevdschee/php-crud-api:$dockerTag
# Build latest
docker build . -t mevdschee/php-crud-api:latest

# Press enter to publish
echo -n Press enter to publish..; read

# Login to DockerHub
docker login
# Push release
docker push mevdschee/php-crud-api:$dockerTag
# Push latest
docker push mevdschee/php-crud-api:latest

