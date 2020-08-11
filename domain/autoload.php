<?php

spl_autoload_register(function ($class_name) {

    $class_maps = [
        'task_dao' => 'dao/task.php',
        'task' => 'entity/task.php',
    ];

    if (isset($class_maps[$class_name])) {
        include __DIR__.'/'.$class_maps[$class_name];
    }
});
