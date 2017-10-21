#!/bin/bash

# Install NPM

curl -sL https://deb.nodesource.com/setup_8.x | bash -
apt-get update
apt-get install -y nodejs

# Initialize the git submodule
git submodule init
git submodule update
