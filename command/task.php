<?php

command('task:trigger', '任务触发', function ()
{
    $tasks = dao('task')->find_all_valid();

    foreach ($tasks as $task) {
        if (spider_cron_string_parse($task->crontab_rule) === time()) {
            business_wechat_send_text_to_group_robot($task->robot_url, $task->message, ['@all']);
        }
    }
});
