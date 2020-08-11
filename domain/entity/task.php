<?php

class task extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
        'crontab_rule' => '',
        'robot_url' => '',
        'status' => '',
        'message' => '',
    ];

    public static $entity_display_name = '任务';
    public static $entity_description = '任务';

    public static $struct_data_types = [
        'name' => 'string',
        'crontab_rule' => 'string',
        'robot_url' => 'string',
        'status' => 'enum',
        'message' => 'string',
    ];

    public static $struct_display_names = [
        'name' => '任务名',
        'crontab_rule' => '时间规则',
        'robot_url' => '机器人URL',
        'status' => '状态',
        'message' => '要发送的消息',
    ];

    public static $struct_descriptions = [
        'name' => '名称',
        'crontab_rule' => '名称',
        'robot_url' => 'URL',
        'status' => '状态',
        'message' => '描述',
    ];

    const STATUS_VALID = 'VALID';
    const STATUS_INVALID = 'INVALID';

    const STATUS_MAPS = [
        self::STATUS_VALID => '有效',
        self::STATUS_INVALID => '无效',
    ];

    public static $struct_is_required = [
        'name' => true,
        'crontab_rule' => true,
        'robot_url' => true,
        'status' => true,
        'message' => true,
    ];

    public function __construct()
    {/*{{{*/
    }/*}}}*/

    public static function create($name, $crontab_rule, $robot_url, $status, $message)
    {/*{{{*/
        $task = parent::init();

        $task->name = $name;
        $task->crontab_rule = $crontab_rule;
        $task->robot_url = $robot_url;
        $task->status = $status;
        $task->message = $message;

        return $task;
    }/*}}}*/

    public static function struct_formaters($property)
    {/*{{{*/
        $formaters = [
            'name' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 30;
                    },
                    'failed_message' => '不能超过 30 个字',
                ],
            ],
            'crontab_rule' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 30;
                    },
                    'failed_message' => '不能超过 30 个字',
                ],
            ],
            'robot_url' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 1000;
                    },
                    'failed_message' => '不能超过 1000 个字符',
                ],
            ],
            'status' => self::STATUS_MAPS,
            'message' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 200;
                    },
                    'failed_message' => '不能超过 200 个字',
                ],
            ],
        ];

        return $formaters[$property] ?? false;
    }/*}}}*/

    public function get_status_description()
    {/*{{{*/
        return self::STATUS_MAPS[$this->status];
    }/*}}}*/

    public function status_is_valid()
    {/*{{{*/
        return $this->status === self::STATUS_VALID;
    }/*}}}*/

    public function set_status_valid()
    {/*{{{*/
        return $this->status = self::STATUS_VALID;
    }/*}}}*/

    public function status_is_invalid()
    {/*{{{*/
        return $this->status === self::STATUS_INVALID;
    }/*}}}*/

    public function set_status_invalid()
    {/*{{{*/
        return $this->status = self::STATUS_INVALID;
    }/*}}}*/
    /* generated code end */
}
