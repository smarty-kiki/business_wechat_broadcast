#!/bin/bash

ROOT_DIR="$(cd "$(dirname $0)" && pwd)"/../../..

ln -fs $ROOT_DIR/project/config/production/nginx/business_wechat_broadcast.conf /etc/nginx/sites-enabled/business_wechat_broadcast
/usr/sbin/service nginx reload

/bin/bash $ROOT_DIR/project/tool/dep_build.sh link
/usr/bin/php $ROOT_DIR/public/cli.php migrate:install
/usr/bin/php $ROOT_DIR/public/cli.php migrate

ln -fs $ROOT_DIR/project/config/production/supervisor/business_wechat_broadcast_queue_worker.conf /etc/supervisor/conf.d/business_wechat_broadcast_queue_worker.conf
/usr/bin/supervisorctl update
/usr/bin/supervisorctl restart business_wechat_broadcast_queue_worker:*

chmod 777 /var/www/business_wechat_broadcast/view/blade
rm -rf /var/www/business_wechat_broadcast/view/blade/*.php
