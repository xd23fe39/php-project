# PHP Project Builder

## Aufruf

```sh
php-project serve
```

## Voraussetzungen

Installation von PHP auf dem Entwicklerarbeitsplatz:

Für Ubuntu:

```sh
sudo apt install php7.0-cli
```

Umgebung für php-project setzen:

```sh
cd php-project/bin
./php-project setenv
```

## GIT Workflow

### Initialisieren

```sh
git init
git add .
git commit -m "first commit"
git remote add origin https://github.com/xd23fe39/php-project.git
git push -u origin master
```