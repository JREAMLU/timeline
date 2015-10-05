CREATE TABLE `tree` (
    `tree_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `user_id`  INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
    `content` TEXT NOT NULL COMMENT '内容',
    `category` ENUM('picture','movie','location','voice') NOT NULL DEFAULT 'picture' COMMENT '分类(picture:图片,movie:视频,location:定位,voice:语音)',
    `title` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '标题',
    `added_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`tree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='时间树表';

CREATE TABLE `user` (
    `user_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `nickname`  VARCHAR(32) NOT NULL DEFAULT '' COMMENT '昵称',
    `realname` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
    `email` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '邮箱',
    `moblie` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '手机',
    `gender` ENUM('male', 'female', 'secret') NOT NULL DEFAULT 'male' COMMENT '性别 male:男 female:女 secret:保密',
    `added_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户基础信息表';

CREATE TABLE `user_setting` (
    `user_setting_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `user_id` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
    `intro` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '真实姓名',
    `is_public` TINYINT(4) NOT NULL DEFAULT 1 COMMENT '公开状态 1:公开 2:保密 3:公开但需要密码',
    `added_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`user_setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户设置表';

CREATE TABLE `user_login_account` (
    `user_login_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `user_id` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
    `username` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '用户名',
    `email` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '用户名',
    `mobile` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '用户名',
    `user_login_type_id` TINYINT(4) NOT NULL DEFAULT 1 COMMENT '登录账号类型id',
    `thrid_open_id` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '第三方平台唯一id',
    `added_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登陆账号表';

CREATE TABLE `user_login_account_type` (
    `user_login_type_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `type_name` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '账号登录类型名称',
    `added_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`user_login_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登陆账号类型表';