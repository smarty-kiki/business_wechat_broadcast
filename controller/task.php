<?php

if_get('/tasks', function ()
{/*{{{*/
    return render('task/list');
});/*}}}*/

if_get('/tasks/ajax', function ()
{/*{{{*/
    list(
        $inputs['name'], $inputs['crontab_rule'], $inputs['robot_url'], $inputs['status'], $inputs['message']
    ) = input_list(
        'name', 'crontab_rule', 'robot_url', 'status', 'message'
    );
    $inputs = array_filter($inputs, 'not_null');

    $tasks = dao('task')->find_all_by_column($inputs);

    return [
        'code' => 0,
        'msg'  => '',
        'count' => count($tasks),
        'data' => array_build($tasks, function ($id, $task) {
            return [
                null,
                [
                    'id' => $task->id,
                    'name' => $task->name,
                    'crontab_rule' => $task->crontab_rule,
                    'robot_url' => $task->robot_url,
                    'status' => $task->get_status_description(),
                    'message' => $task->message,
                    'create_time' => $task->create_time,
                    'update_time' => $task->update_time,
                ]
            ];
        }),
    ];
});/*}}}*/

if_get('/tasks/add', function ()
{/*{{{*/
    return render('task/add', [
    ]);
});/*}}}*/

if_post('/tasks/add', function ()
{/*{{{*/
    $name = input('name');
    $crontab_rule = input('crontab_rule');
    $robot_url = input('robot_url');
    $status = input('status');
    $message = input('message');


    $task = task::create(
        $name,
        $crontab_rule,
        $robot_url,
        $status,
        $message
    );

    return redirect('/tasks');
});/*}}}*/

//todo::detail

if_get('/tasks/update/*', function ($task_id)
{/*{{{*/
    $task = dao('task')->find($task_id);
    otherwise($task->is_not_null(), 'task not found');

    return render('task/update', [
        'task' => $task,
    ]);
});/*}}}*/

if_post('/tasks/update/*', function ($task_id)
{/*{{{*/
    $name = input('name');
    $crontab_rule = input('crontab_rule');
    $robot_url = input('robot_url');
    $status = input('status');
    $message = input('message');

    $task = dao('task')->find($task_id);
    otherwise($task->is_not_null(), 'task not found');


    $task->name = $name;
    $task->crontab_rule = $crontab_rule;
    $task->robot_url = $robot_url;
    $task->status = $status;
    $task->message = $message;

    return redirect('/tasks');
});/*}}}*/

if_post('/tasks/delete/*', function ($task_id)
{/*{{{*/
    $task = dao('task')->find($task_id);
    otherwise($task->is_not_null(), 'task not found');

    $task->delete();

    return [
        'code' => 0,
        'msg' => '',
    ];
});/*}}}*/
