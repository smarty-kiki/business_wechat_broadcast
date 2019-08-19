#!/bin/bash

ROOT_DIR="$(cd "$(dirname $0)" && pwd)"/../..

sh $ROOT_DIR/project/tool/dep_build.sh link

sudo docker run --rm -ti -p 80:80 -p 8080:8080 -p 3306:3306 --name layui_mvc_frame \
    -v $ROOT_DIR/../frame:/var/www/frame \
    -v $ROOT_DIR/:/var/www/layui_mvc_frame \
    -v $ROOT_DIR/project/config/development/nginx/layui_mvc_frame.conf:/etc/nginx/sites-enabled/default \
    -v $ROOT_DIR/project/config/development/supervisor/queue_worker.conf:/etc/supervisor/conf.d/queue_worker.conf \
    -e 'TIMEZONE=Asia/Shanghai' \
    -e 'AFTER_START_SHELL=/var/www/layui_mvc_frame/project/tool/after_dev_env_start.sh' \
kikiyao/debian_php_dev_env start
