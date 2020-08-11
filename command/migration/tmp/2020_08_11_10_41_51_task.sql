# up
create table if not exists `task` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `name` varchar(30) default null,
    `crontab_rule` varchar(30) default null,
    `robot_url` varchar(1000) default null,
    `status` varchar(20) not null,
    `message` varchar(200) default null,
    primary key (`id`)
) engine=innodb default charset=utf8;

# down
drop table `task`;
