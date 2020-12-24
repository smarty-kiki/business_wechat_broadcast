<?php

class task_log extends entity
{
    /* generated code start */
    public $structs = [
        'task_id' => 0,
        'snap_task_robot_url' => '',
        'snap_task_message' => '',
        'result' => '',
    ];

    public static $entity_display_name = '任务执行日志';
    public static $entity_description = '任务执行日志';

    public static $struct_data_types = [
        'task_id' => 'number',
        'snap_task_robot_url' => 'string',
        'snap_task_message' => 'string',
        'result' => 'string',
    ];

    public static $struct_display_names = [
        'task_id' => '任务ID',
        'snap_task_robot_url' => '任务机器人URL',
        'snap_task_message' => '任务要发送的消息',
        'result' => '名称',
    ];

    public static $struct_descriptions = [
        'task_id' => '任务ID',
        'snap_task_robot_url' => '冗余自任务,URL',
        'snap_task_message' => '冗余自任务,描述',
        'result' => '名称',
    ];

    public static $struct_is_required = [
        'task_id' => true,
        'snap_task_robot_url' => true,
        'snap_task_message' => true,
        'result' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->belongs_to('task');
    }/*}}}*/

    public static function create(task $task, $result)
    {/*{{{*/
        $task_log = parent::init();

        $task_log->task = $task;
        $task_log->result = $result;

        return $task_log;
    }/*}}}*/

    public static function struct_formaters($property)
    {/*{{{*/
        $formaters = [
            'result' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 30;
                    },
                    'failed_message' => '不能超过 30 个字',
                ],
            ],
        ];

        return $formaters[$property] ?? false;
    }/*}}}*/

    public function belongs_to_task(task $task)
    {/*{{{*/
        return $this->task_id == $task->id;
    }/*}}}*/

    protected function prepare_set_task($task)
    {/*{{{*/
        otherwise($task instanceof task, 'task 类型必须为 task');

        $this->snap_task_robot_url = $task->robot_url;
        $this->snap_task_message = $task->message;

        return $task;
    }/*}}}*/

    public function display_for_task_task_logs()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
