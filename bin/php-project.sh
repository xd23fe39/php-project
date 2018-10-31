#!/bin/bash
#
# PHP Project Builder

OPER=$1
PHPCMD=$(which php)
CURDIR=$(pwd)
UNAME=$(uname -a)
ROOTDIR="_ROOT"

function _usage {
    echo
    echo Usage: 
    echo
}

function _setenv() {
    if [ -d "$CURDIR/bin" ];then
        export BASEDIR=$CURDIR
        export PATH=$PATH:$CURDIR/bin
        alias php-project="php-project.sh"
        return 0
    else
        echo; echo "Current directory is not a BASEDIR!"; echo
        exit 400
    fi
}

function _test() {
    if [ ! -x "$PHPCMD" ]; then
        echo; echo "PHP (CLI) is not available or not installed!"; echo 
        exit 500;
    fi;
    return 0
}

function _init() {
    if [ -d "$CURDIR/../../$ROOTDIR" ]; then
        echo; echo "Project folder found: $CURDIR/"; echo
        cp -R $BASEDIR/template/_default/* .
        cp $BASEDIR/etc/application.config.php/* ./etc
    else
        echo; echo "Current directory is not a project folder!"; echo
    fi
    if [ ! -f "./.php-project" ]; then
        echo "#!$(which bash)" > .php-project
        echo "# Created on: $UNAME" >> .php-project
        echo "PROJECTBASE=$CURDIR" >> .php-project
    fi
    return 0
}

function oper() {
    _${1} $2 $3 $4
}

case $1 in
    --help|help|-h)
      oper "usage"
      ;;
    --test|test|-t) 
      oper "test"
      ;;
    *)
      oper "usage"
      ;;
esac    
