# Scripts

Automation for maintaining this project. You do not need any of it to use
php-crud-api, these scripts are for publishing a new version.

The scripts that you do need as a user or a contributor stay in the root of the
repository, because they are part of the documented workflow: "build.php" to
compile the single file distribution, "test.php" to run the tests and
"update.php" to update the dependencies. The scripts that run the tests in
docker are in the "docker" directory.

Run these from the root of the repository:

    ./scripts/release.sh

They change to the root themselves, so running them from this directory works
just as well.

## Requirements

Both scripts use the [GitHub CLI](https://cli.github.com/), which has to be
logged in once with "gh auth login". Publishing the docker image also needs
docker and an account on [Docker Hub](https://hub.docker.com/) that may push to
"mevdschee/php-crud-api".

## release.sh

Publishes a new version. It takes the part of the version to increase:

    ./scripts/release.sh          # v2.16.2 becomes v2.16.3
    ./scripts/release.sh build    # v2.16.2 becomes v2.16.3
    ./scripts/release.sh minor    # v2.16.2 becomes v2.17.0
    ./scripts/release.sh major    # v2.16.2 becomes v3.0.0

It reads the latest tag from the remote, calculates the new tag from it, updates
the dependencies with "update.php", compiles "api.php" and "api.include.php"
with "build.php", commits and pushes whatever that changed, and creates the
github release with both compiled files attached. The tag is created by the
release.

The script stops before it does anything when you are not on "main" or when you
have uncommitted changes, so that the files it attaches to the release are the
files that are committed. It also stops when a step fails, rather than
publishing a release built from a failed build.

Run the tests before you release, the script does not run them for you because
that needs all four database servers:

    php test.php

## publish-docker.sh

Publishes the latest release as a docker image, so run it after "release.sh".

    ./scripts/publish-docker.sh

It checks out the latest tag, builds "mevdschee/php-crud-api" tagged both
"release-2.16.3" and "latest", switches back to the branch you were on, and asks
for confirmation before it logs in to Docker Hub and pushes.
