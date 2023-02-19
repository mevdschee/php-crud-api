#!/bin/bash

# Get new tags from remote
git fetch --tags
# Get latest tag name
latestTag=$(git describe --tags `git rev-list --tags --max-count=1`)
# Parse v1.2.3 into array
latestTag=${latestTag//./ }
latestTag=${latestTag/v/}
version=($latestTag)
# Calculate new version
case $1 in 
  major)
    version[0]=$((version[0]+1))
    version[1]=0
    version[2]=0
    ;;
  minor) 
    version[1]=$((version[1]+1))
    version[2]=0
    ;;
  *) # build
    version[2]=$((version[2]+1))
    ;; 
esac
# Constuct new tag
newTag=v${version[0]}.${version[1]}.${version[2]}
# Build all files
php install.php
php build.php
# Build all files
gh release create $newTag api.php api.include.php
