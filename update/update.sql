2.8;
UPDATE `%DB_PREFIX%role_node` set `name` = '代金券列表' where id = '435';
UPDATE `%DB_PREFIX%role_node` set `name` = '添加代金券' where id = '437';
UPDATE `%DB_PREFIX%role_node` set `name` = '添加提交代金券' where id = '438';
UPDATE `%DB_PREFIX%role_node` set `name` = '编辑代金券' where id = '439';
UPDATE `%DB_PREFIX%role_node` set `name` = '编辑提交代金券' where id = '440';
UPDATE `%DB_PREFIX%role_node` set `name` = '代金券发送日志' where id = '441';
UPDATE `%DB_PREFIX%conf` set `value` = '2.8' where name = 'DB_VERSION';