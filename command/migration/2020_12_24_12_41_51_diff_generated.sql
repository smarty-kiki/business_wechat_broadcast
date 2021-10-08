# up
create table if not exists `task_log` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime null,
    `update_time` datetime null,
    `delete_time` datetime null,
    `result` varchar(200) null,
    `task_id` bigint(20) unsigned not null,
    `snap_task_robot_url` varchar(1000) null,
    `snap_task_message` varchar(200) null,
    primary key (`id`),
    index`fk_task_idx` (`delete_time`)
) engine = innodb default charset = utf8;

# down
drop table `task_log`;
