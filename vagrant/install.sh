#!/bin/bash
HERE=$(dirname $0)
DEST_DIR=$HERE/base/centos/
REPO_URL=http://www.gitlab.local/vagrant/centos.git

TAG=$1

echo "destination: $DEST_DIR"

if [ ! -d "$DEST_DIR" ]; then
  echo "installation"
   mkdir -p $DEST_DIR && git clone $REPO_URL $DEST_DIR
fi
cd $DEST_DIR
git pull
[ -z "$TAG" ] && TAG=master
git checkout $TAG





