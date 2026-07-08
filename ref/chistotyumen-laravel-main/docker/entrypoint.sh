#!/bin/sh
set -eu
cd /var/www/html

su www -s /bin/sh /usr/local/bin/boot-app.sh

exec supervisord -n -c /etc/supervisor/supervisord.conf
