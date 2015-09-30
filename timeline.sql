CREATE TABLE `tree` (
    `tree_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增长id',
    `user_id`  INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
    `content` TEXT NOT NULL COMMENT '内容',
    `category` ENUM('picture','movie','location','voice') NOT NULL DEFAULT 'picture' COMMENT '分类(picture:图片,movie:视频,location:定位,voice:语音)',
    `title` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '标题',
    `added_time` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
    `updated_time` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
    PRIMARY KEY (`tree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='时间树表';