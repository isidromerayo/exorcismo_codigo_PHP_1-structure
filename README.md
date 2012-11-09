exorcismo_codigo_PHP_1-structure
================================

Primer ejercicio del Taller de "Exorcismo código PHP"

Para lanzar los test y generar la cobertura de código con PHP es necesario tener instalada la extesión XDebug (http://xdebug.org/).


$ phpunit -c phpunit-logging.xml

Autotest
--------

You can autotest on save file, but you need ruby and some gems.

$ gem install guard guard-phpunit $ gem install --version '~> 0.8.8' rb-inotify

Send notify to OS, I test on GNU/Linux Ubuntu 12.04 (gnome shell) and 12.10 (LXDE and XFCE).

The project page: https://github.com/Maher4Ever/guard-phpunit. Guard::PHPUnit automatically runs your tests. There is a problem, you need install phpunit in your system but a PR solve this problem https://github.com/Maher4Ever/guard-phpunit/pull/7.

$ guard


