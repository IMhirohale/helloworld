CREATE TABLE `hello_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` char(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` char(15) NOT NULL DEFAULT '' COMMENT '手机号',
  `salt` int(11) NOT NULL DEFAULT '0' COMMENT '盐密',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='用户信息表';
