# up
create table if not exists `task` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime null,
    `update_time` datetime null,
    `delete_time` datetime null,
    `name` varchar(30) null,
    `crontab_rule` varchar(30) null,
    `robot_url` varchar(1000) null,
    `status` varchar(20) not null,
    `message` varchar(200) null,
    primary key (`id`)
) engine = innodb default charset = utf8;

# down
drop table `task`;
