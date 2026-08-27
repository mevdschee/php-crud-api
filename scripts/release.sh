#!/bin/bash
set -e

# Publish a new release: bump the version, rebuild the single file
# distribution and attach it to a github release.

# Run from the root of the repository, whatever the current directory is
cd "$(dirname "$0")/.."

step=${1:-build}
case $step in
  major|minor|build) ;;
  *)
    echo "usage: $0 [major|minor|build]"
    exit 1
    ;;
esac

# Releases are cut from main, from a clean tree, so that the files that are
# attached to the release are the files that are committed
branch=$(git rev-parse --abbrev-ref HEAD)
if [ "$branch" != "main" ]; then
  echo "on branch '$branch', a release is made from 'main'"
  exit 1
fi
if [ -n "$(git status --porcelain --untracked-files=no)" ]; then
  echo "there are uncommitted changes"
  exit 1
fi

# Get new tags from remote
git fetch --tags
# Get latest tag name
latestTag=$(git describe --tags `git rev-list --tags --max-count=1`)
# Parse v1.2.3 into array
latestTag=${latestTag//./ }
latestTag=${latestTag/v/}
version=($latestTag)
# Calculate new version
case $step in
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
php update.php
php build.php
# Commit the rebuilt files, there is nothing to commit when they did not change
if [ -n "$(git status --porcelain --untracked-files=no)" ]; then
  git commit -am "update dependencies"
fi
git push
# Publish the release
gh release create $newTag api.php api.include.php
