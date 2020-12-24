<?php

command('task:trigger', '任务触发', function ()
{
    $tasks = dao('task')->find_all_valid();

    foreach ($tasks as $task) {
        if (spider_cron_string_parse($task->crontab_rule) === time()) {

            unit_of_work(function () {

                business_wechat_send_text_to_group_robot($task->robot_url, $task->message, ['@all']);
                task_log::create($task, '发送成功');
            });
        }
    }
});
