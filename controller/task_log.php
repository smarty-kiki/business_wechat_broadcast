<?php

if_get('/task_logs', function ()
{/*{{{*/
    return render('task_log/list');
});/*}}}*/

if_get('/task_logs/ajax', function ()
{/*{{{*/
    $task_logs = dao('task_log')->find_all_paginated_by_current_page_and_condition(1, 200, '1 = 1 order by id desc');

    return [
        'code' => 0,
        'msg'  => '',
        'count' => $task_logs['pagination']['count'],
        'data' => array_build($task_logs['list'], function ($id, $task_log) {
            return [
                null,
                [
                    'id' => $task_log->id,
                    'result' => $task_log->result,
                    'task_display' => $task_log->task->display_for_task_logs_task(),
                    'snap_task_robot_url' => $task_log->snap_task_robot_url,
                    'snap_task_message' => $task_log->snap_task_message,
                    'create_time' => $task_log->create_time,
                    'update_time' => $task_log->update_time,
                ]
            ];
        }),
    ];
});/*}}}*/

if_get('/task_logs/add', function ()
{/*{{{*/
    return render('task_log/add', [
        'tasks' => dao('task')->find_all(),
    ]);
});/*}}}*/

if_post('/task_logs/add', function ()
{/*{{{*/
    $result = input('result');


    $task_log = task_log::create(
        input_entity('task', null, 'task_id'),
        $result
    );

    return redirect('/task_logs');
});/*}}}*/

//todo::detail

if_get('/task_logs/update/*', function ($task_log_id)
{/*{{{*/
    $task_log = dao('task_log')->find($task_log_id);
    otherwise($task_log->is_not_null(), 'task_log not found');

    return render('task_log/update', [
        'task_log' => $task_log,
        'tasks' => dao('task')->find_all(),
    ]);
});/*}}}*/

if_post('/task_logs/update/*', function ($task_log_id)
{/*{{{*/
    $result = input('result');

    $task_log = dao('task_log')->find($task_log_id);
    otherwise($task_log->is_not_null(), 'task_log not found');


    $task_log->task = input_entity('task', null, 'task_id');
    $task_log->result = $result;

    return redirect('/task_logs');
});/*}}}*/

if_post('/task_logs/delete/*', function ($task_log_id)
{/*{{{*/
    $task_log = dao('task_log')->find($task_log_id);
    otherwise($task_log->is_not_null(), 'task_log not found');

    $task_log->delete();

    return [
        'code' => 0,
        'msg' => '',
    ];
});/*}}}*/
