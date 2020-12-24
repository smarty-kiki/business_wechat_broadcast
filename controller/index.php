<?php

if_get('/', function ()
{
    return render('index/index', [
        'tree_infos' => [
            [
                'name' => '表单式管理',
                'key'  => 'module',
                'icon_class' => 'layui-icon-component',
                'children' => [
                    [ 'name' => '任务执行日志管理', 'key' => 'task_log', 'href' => '/task_logs', ],
                    [ 'name' => '任务管理', 'key' => 'task', 'href' => '/tasks', ],
                ],
            ]
        ],
    ]);
});

if_get('/dashboard', function ()
{
    return render('index/dashboard', [
        'valid_count' => dao('task')->count_valid(),
        'total_count' => dao('task')->count(),
        'total_log_count' => dao('task_log')->count(),
    ]);
});
