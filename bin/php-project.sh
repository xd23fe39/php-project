#!/bin/bash
#
# PHP Project Builder

# Setze aktuelles Verzeichnis auf BASEDIR
DIR=$(pwd)
BASEDIR=$(cd `dirname $0`; cd ..; pwd)

OPER=$1
PHPCMD=$(which php)
CURDIR=$(pwd)
UNAME=$(uname -a)
ROOTDIR="_ROOT"

function _usage {
    echo
    echo Usage: php-project [command] [argument]
    echo
    echo    command: serve 
    echo
}

function _setenv() {
    echo
    echo "export BASEDIR=$BASEDIR"
    echo "export PATH=$PATH:$BASEDIR/bin"
    echo "alias php-project=\"$BASEDIR/bin/php-project.sh\"" 
    echo
}

function _serve() {
    php -S 0.0.0.0:8080 -t $BASEDIR/www
}

function _test() {
    echo "Base Dir: $BASEDIR";echo
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
    --serve|serve|-s)
      oper "serve"
      ;;
    --help|help|-h)
      oper "usage"
      ;;
    --test|test|-t) 
      oper "test"
      ;;
    --setenv|setenv) 
      oper "setenv"
      ;;
    *)
      oper "usage"
      ;;
esac    
