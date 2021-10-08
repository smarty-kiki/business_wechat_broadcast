<?php

command('task:trigger', '任务触发', function ()
{
    $tasks = dao('task')->find_all_valid();

    foreach ($tasks as $task) {
        try {
            if (spider_cron_string_parse($task->crontab_rule) === time()) {

                unit_of_work(function () use ($task) {

                    $res = business_wechat_send_text_to_group_robot($task->robot_url, $task->message, ['@all']);
                    if (! empty($res['errmsg']) && $res['errmsg'] == 'ok') {
                        task_log::create($task, '发送成功');
                    } else {
                        task_log::create($task, '发送失败 '.$res['errmsg']);
                    }
                });
            }
        } catch (throwable $ex) {
            task_log::create($task, '发送失败 时间规则有问题');
        }
    }
});
