-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 02 月 12 日 02:18
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `csp`
--

-- --------------------------------------------------------

--
-- 表的结构 `oj_users`
--

CREATE TABLE IF NOT EXISTS `oj_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nick_name` varchar(100) NOT NULL DEFAULT '',
  `identity_number` varchar(32) NOT NULL,
  `real_name` varchar(60) NOT NULL DEFAULT '',
  `organization_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `group_id` int(11) NOT NULL,
  `submitted` int(11) NOT NULL DEFAULT '0',
  `submitted_number` int(11) NOT NULL DEFAULT '0',
  `accepted` int(11) NOT NULL DEFAULT '0',
  `accepted_number` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `oj_users`
--

INSERT INTO `oj_users` (`id`, `username`, `password`, `nick_name`, `identity_number`, `real_name`, `organization_id`, `email`, `group_id`, `submitted`, `submitted_number`, `accepted`, `accepted_number`, `created`, `modified`) VALUES
(1, 'admin', '941c9e74efb031d0aba19fc2cdfc539da188bee1', 'administrator', '', 'casper', 4, 'shpchen@sina.com', 1, 0, 0, 0, 0, '2010-02-08 12:41:24', '2010-08-27 00:55:33'),
(2, 'casper', '941c9e74efb031d0aba19fc2cdfc539da188bee1', 'casper', '', '', 0, 'casper_china@hotmail.com', 3, 0, 0, 0, 0, '2010-05-05 06:35:36', '2010-05-05 06:35:36'),
(3, 'foxhu', '28b41e3fc59fad1cd03afa5d1bfd3d9671489050', '韩国谦', '', '', 13, '920764993@qq.com', 4, 0, 0, 0, 0, '2010-08-07 11:36:44', '2010-09-16 19:03:44'),
(4, 'hu', '39b5469212012ac47d277e3fae3173ec2e4d3e84', 'li', '', '', 0, 'humaoli@163.com', 4, 0, 0, 0, 0, '2010-08-07 11:37:38', '2010-08-07 11:37:38'),
(5, 'Mountain', '7f135151489d7cb9e251f4d491f379f7eae911ca', 'Mountain', '', '', 0, 'i_believe_you123@yahoo.cn', 4, 0, 0, 0, 0, '2010-08-07 14:35:45', '2010-08-07 14:35:45'),
(6, 'ljz1989', 'dc3463e841039da7aca02351f29a7207ffddadbe', 'ljz1989', '2008051662', '廖家赵', 12, 'liaojiazhao@yahoo.com.cn', 1, 0, 0, 0, 0, '2010-08-26 23:54:57', '2010-09-30 20:31:52'),
(7, 'mwkfeng', '390739774be1f8c059aeb08ed0c77c9af46149ba', 'mwkfeng', '2007052312', '陈俊杰', 19, 'mwkfeng@gmail.com', 1, 0, 0, 0, 0, '2010-08-26 23:58:05', '2010-09-06 16:37:23'),
(8, 'test', 'dc3463e841039da7aca02351f29a7207ffddadbe', 'test', '', '', 1, '13798995045@139.com', 4, 0, 0, 0, 0, '2010-08-27 00:56:58', '2010-08-27 00:56:58'),
(9, 'rayjancy', '2ffcebaa95c2d059ccbebfcee289f5334d2dbb59', 'ray', '2008051584', '岑江斌', 20, '245878781@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:03:42', '2010-09-16 08:03:42'),
(10, 'lahm', '0a184b035c9ede3070a71325422d05380c8f3d0e', '陈铨', '2008051650', '陈铨', 12, 'chenquan3232@163.com', 4, 0, 0, 0, 0, '2010-09-16 08:04:05', '2010-09-16 08:04:05'),
(11, '2008052506', '13b1aad680b0b48858adaf016d5cc6c9d4813379', '郭培', '2008052506', '郭培', 14, '516233464@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:04:08', '2010-09-16 08:04:08'),
(12, '罗海铭', '1972cc245c56f8fcc1912711249004100d0bd3bd', '我不勤奋', '2008051586', '罗海铭', 20, '519335436@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:04:28', '2010-09-16 09:47:11'),
(13, 'liyang', '4bec196ea4f2800575a771dffe433058f6faf2d8', 'yang', '2008051585', '李阳', 20, 'kapo0342@yahoo.com.cn', 4, 0, 0, 0, 0, '2010-09-16 08:04:28', '2010-12-23 08:20:36'),
(14, 'zhujiasheng', 'b3208b3af69297ddf965bf0ffe30837022f88707', '声仔', '2008051656', '祝嘉声', 12, '809214263@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:04:37', '2010-09-16 08:04:37'),
(15, 'Tinsy', '4b9b30d8c5aea10bdb7b88fca7cd0d004d9d1adb', 'Tinsy', '2008052460', '吴铁印', 20, '376409964@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:04:47', '2010-12-23 08:20:47'),
(16, 'rdfe222', '06a6275a520d7cb8ffe33c2c299a95330aaee748', '李', '2008051666', '李振旺', 12, '489635196@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:05:01', '2010-09-16 08:05:01'),
(17, 'santahang', '2363d639f9011fc7c5285800397c3a98ecef80e0', '奥科查', '2008051667', '钟宇航', 12, 'jacksonwithyou@yahoo.cn', 4, 0, 0, 0, 0, '2010-09-16 08:05:02', '2010-09-16 08:05:02'),
(18, 'chenyifan', 'cfbac160e2ec316f66bded5a941cd60a1bc6007c', 'xiaofan', '2008052864', '陈一帆', 12, '594249891@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:05:18', '2010-09-16 08:05:18'),
(19, 'seven', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', '小七', '2008052496', '孟思繁', 12, '32641495@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:05:48', '2010-09-16 08:05:48'),
(20, '2008052867', '0267cfbf6dc43b4067636df1f3abd8502d74b9cd', '梦勋', '2008052867', '陈梦勋', 12, 'happy-cmx@163.com', 4, 0, 0, 0, 0, '2010-09-16 08:06:46', '2010-09-16 08:06:46'),
(21, 'asd302830', '3e90c7c6a19449ec77a2d240cf903784cbf4227e', 'nick312', '2008051370', '陈安兴', 20, '451157443@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:07:13', '2010-09-16 08:07:13'),
(22, '真理', '3e0d04f614b8568ca84f35c8e88c8b56c55212d5', '上帝', '2008051640', '高阳', 12, '1033397599@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:07:46', '2010-09-16 08:07:46'),
(23, '2008052503', '9d02ca27ac88722ce361bbc4e7875254637c8a8e', '刘辉', '2008052503', '刘辉', 12, 'benzero2010@hotmail.com', 4, 0, 0, 0, 0, '2010-09-16 08:08:50', '2010-09-16 08:08:50'),
(24, 'wuhao', '1934b97169caa45b0e5adde92c1b4bad6bc7c829', '小浩', '2007052401', '吴浩', 11, 'wuhaogzr@vip.qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:08:51', '2011-01-02 15:56:48'),
(25, 'AC_Crush', '3365ea17e05af8e0945e73b1519fc82b6a40639b', 'AC_Crush', '2008052501', '李飞', 12, '854153483@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:09:05', '2010-09-16 08:09:05'),
(26, '梁海瑞', '66e8abcd2d305e4df3b272a63e4504d9297eab97', '小海', '2008051645', '梁海瑞', 12, '1025369416@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:20:34', '2010-12-29 16:08:17'),
(27, '吴豪波', '88a979ac1261ba8934daa19cf1c2c0db01b5cf51', '波仔', '2008051664', '吴豪波', 12, '928896617@qq.com', 4, 0, 0, 0, 0, '2010-09-16 08:21:13', '2010-09-16 08:21:13'),
(28, 'lhm15', 'dd1677534156c080f4bbfa9fbc3015997a8c5a17', '我不勤奋', '2008051586', '罗海铭', 20, 'rolfm@163.com', 4, 0, 0, 0, 0, '2010-09-18 21:53:05', '2010-09-18 21:53:05'),
(29, 'lion', '1bdc34978960a4fd199b56b1560fcc0570b3908f', 'lion', '2008051658', '林晓端', 12, 'xiaoduan@qq.com', 4, 0, 0, 0, 0, '2010-09-29 23:35:15', '2010-09-29 23:35:15'),
(30, 'mengsifan', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', '小七', '2008052496', '孟思繁', 12, '714206320@qq.com', 4, 0, 0, 0, 0, '2010-09-30 08:08:35', '2010-09-30 08:08:35'),
(31, '2008052505', '301bab851c804a6e9e5a5b4e650179a091d00d29', '商修', '2008052505', '商修', 12, '657202492@qq.com', 4, 0, 0, 0, 0, '2010-09-30 08:09:46', '2010-09-30 08:09:46'),
(32, 'jnu405', '488690380519d15570e50e11a3a9fe5172f2ead9', 'jnu405', '', '', 1, '991011715@qq.com', 4, 0, 0, 0, 0, '2010-10-02 14:17:05', '2010-10-02 14:17:05'),
(33, 'jnu123', '7c14902093e3375bb64bc78604cf7ef782cb3faa', 'jnu123', '', '', 1, '523087924@qq.com', 4, 0, 0, 0, 0, '2010-10-06 15:25:48', '2010-10-06 16:40:53'),
(34, 'Cololabis saira', '39b5469212012ac47d277e3fae3173ec2e4d3e84', 'Cololabis saira', '', '', 12, '947083374@qq.com', 4, 0, 0, 0, 0, '2010-10-09 14:43:20', '2010-10-09 14:43:59'),
(35, '库比浪', 'a9eb7ab81ad9e46c6c072ce59b3413ffff56053d', 'QQ', '2008052861', '汪茜', 12, 'wq_yeah@sina.com', 4, 0, 0, 0, 0, '2010-10-28 08:03:09', '2010-11-11 08:54:09'),
(36, 'boo', '0f993e210d5fde043209b76886fdce901c8d9856', '秒杀菜鸟', '2008051652', '黄晓波', 12, '237024302@qq.com', 4, 0, 0, 0, 0, '2010-10-28 14:47:19', '2010-10-28 14:47:19'),
(37, 'fresher', 'e9e4ac9fe68374e833347ab2ff21a148c36d94c2', 'water', '2010052812', '', 22, '363234737@qq.com', 4, 0, 0, 0, 0, '2010-11-16 10:00:53', '2010-11-16 10:00:53'),
(38, 'lhr', '66e8abcd2d305e4df3b272a63e4504d9297eab97', '小海', '2008051645', '梁海瑞', 12, 'lhr2050@163.com', 4, 0, 0, 0, 0, '2010-12-29 16:10:04', '2010-12-29 16:10:04'),
(39, 'yujammyy', '52fbe127b6d4aaac0c1c1420df692bee2fc9689b', 'yuyu', '2007052328', '林嘉宇', 19, '895176142@qq.com', 4, 0, 0, 0, 0, '2011-01-08 22:21:37', '2011-01-09 18:38:39');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `identitynumber` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`, `nickname`, `identitynumber`) VALUES
(1, 'c', 'asper', '0000-00-00', 'administrator', ''),
(2, '无', '名', '0000-00-00', 'casper', ''),
(3, '无', '名', '0000-00-00', '韩国谦', ''),
(4, '无', '名', '0000-00-00', 'li', ''),
(5, '无', '名', '0000-00-00', 'Mountain', ''),
(6, '廖', '家赵', '0000-00-00', 'ljz1989', '2008051662'),
(7, '陈', '俊杰', '0000-00-00', 'mwkfeng', '2007052312'),
(8, '无', '名', '0000-00-00', 'test', ''),
(9, '岑', '江斌', '0000-00-00', 'ray', '2008051584'),
(10, '陈', '铨', '0000-00-00', '陈铨', '2008051650'),
(11, '郭', '培', '0000-00-00', '郭培', '2008052506'),
(12, '罗', '海铭', '0000-00-00', '我不勤奋', '2008051586'),
(13, '李', '阳', '0000-00-00', 'yang', '2008051585'),
(14, '祝', '嘉声', '0000-00-00', '声仔', '2008051656'),
(15, '吴', '铁印', '0000-00-00', 'Tinsy', '2008052460'),
(16, '李', '振旺', '0000-00-00', '李', '2008051666'),
(17, '钟', '宇航', '0000-00-00', '奥科查', '2008051667'),
(18, '陈', '一帆', '0000-00-00', 'xiaofan', '2008052864'),
(19, '孟', '思繁', '0000-00-00', '小七', '2008052496'),
(20, '陈', '梦勋', '0000-00-00', '梦勋', '2008052867'),
(21, '陈', '安兴', '0000-00-00', 'nick312', '2008051370'),
(22, '高', '阳', '0000-00-00', '上帝', '2008051640'),
(23, '刘', '辉', '0000-00-00', '刘辉', '2008052503'),
(24, '吴', '浩', '0000-00-00', '小浩', '2007052401'),
(25, '李', '飞', '0000-00-00', 'AC_Crush', '2008052501'),
(26, '梁', '海瑞', '0000-00-00', '小海', '2008051645'),
(27, '吴', '豪波', '0000-00-00', '波仔', '2008051664'),
(28, '罗', '海铭', '0000-00-00', '我不勤奋', '2008051586'),
(29, '林', '晓端', '0000-00-00', 'lion', '2008051658'),
(30, '孟', '思繁', '0000-00-00', '小七', '2008052496'),
(31, '商', '修', '0000-00-00', '商修', '2008052505'),
(32, '无', '名', '0000-00-00', 'jnu405', ''),
(33, '无', '名', '0000-00-00', 'jnu123', ''),
(34, '无', '名', '0000-00-00', 'Cololabis saira', ''),
(35, '汪', '茜', '0000-00-00', 'QQ', '2008052861'),
(36, '黄', '晓波', '0000-00-00', '秒杀菜鸟', '2008051652'),
(37, '无', '名', '0000-00-00', 'water', '2010052812'),
(38, '梁', '海瑞', '0000-00-00', '小海', '2008051645'),
(39, '林', '嘉宇', '0000-00-00', 'yuyu', '2007052328');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 1),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 1),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 4, 2),
(4, 'nickname', 'Nick Name', 'VARCHAR', 50, 1, 1, '', '', 'Incorrect Nick Name (length between 1 and 20 characters).', '', '', '', '', 2, 3),
(5, 'identitynumber', 'Student/Identity number', 'VARCHAR', 40, 0, 0, '', '', '', '', '', '', '', 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', 'c83f15a3a261e87c83645d411e5c4219', 'shpchen@sina.com', '467a4c5cb7ab60850a56d6287c4f2d33', 1265604084, 1297448282, 1, 1),
(2, 'casper', '941c9e74efb031d0aba19fc2cdfc539da188bee1', 'casper_china@hotmail.com', '941c9e74efb031d0aba19fc2cdfc539da188bee1', 1273012536, 1273012536, 0, 1),
(3, 'foxhu', '28b41e3fc59fad1cd03afa5d1bfd3d9671489050', '920764993@qq.com', '28b41e3fc59fad1cd03afa5d1bfd3d9671489050', 1281152204, 1284635024, 0, 1),
(4, 'hu', '39b5469212012ac47d277e3fae3173ec2e4d3e84', 'humaoli@163.com', '39b5469212012ac47d277e3fae3173ec2e4d3e84', 1281152258, 1281152258, 0, 1),
(5, 'Mountain', '7f135151489d7cb9e251f4d491f379f7eae911ca', 'i_believe_you123@yahoo.cn', '7f135151489d7cb9e251f4d491f379f7eae911ca', 1281162945, 1281162945, 0, 1),
(6, 'ljz1989', 'dc3463e841039da7aca02351f29a7207ffddadbe', 'liaojiazhao@yahoo.com.cn', 'dc3463e841039da7aca02351f29a7207ffddadbe', 1282838097, 1285849912, 0, 1),
(7, 'mwkfeng', '390739774be1f8c059aeb08ed0c77c9af46149ba', 'mwkfeng@gmail.com', '390739774be1f8c059aeb08ed0c77c9af46149ba', 1282838285, 1283762243, 0, 1),
(8, 'test', 'dc3463e841039da7aca02351f29a7207ffddadbe', '13798995045@139.com', 'dc3463e841039da7aca02351f29a7207ffddadbe', 1282841818, 1282841818, 0, 1),
(9, 'rayjancy', '2ffcebaa95c2d059ccbebfcee289f5334d2dbb59', '245878781@qq.com', '2ffcebaa95c2d059ccbebfcee289f5334d2dbb59', 1284595422, 1284595422, 0, 1),
(10, 'lahm', '0a184b035c9ede3070a71325422d05380c8f3d0e', 'chenquan3232@163.com', '0a184b035c9ede3070a71325422d05380c8f3d0e', 1284595445, 1284595445, 0, 1),
(11, '2008052506', '13b1aad680b0b48858adaf016d5cc6c9d4813379', '516233464@qq.com', '13b1aad680b0b48858adaf016d5cc6c9d4813379', 1284595448, 1284595448, 0, 1),
(12, '罗海铭', '1972cc245c56f8fcc1912711249004100d0bd3bd', '519335436@qq.com', '1972cc245c56f8fcc1912711249004100d0bd3bd', 1284595468, 1284601631, 0, 1),
(13, 'liyang', '4bec196ea4f2800575a771dffe433058f6faf2d8', 'kapo0342@yahoo.com.cn', '4bec196ea4f2800575a771dffe433058f6faf2d8', 1284595468, 1293063636, 0, 1),
(14, 'zhujiasheng', 'b3208b3af69297ddf965bf0ffe30837022f88707', '809214263@qq.com', 'b3208b3af69297ddf965bf0ffe30837022f88707', 1284595477, 1284595477, 0, 1),
(15, 'Tinsy', '4b9b30d8c5aea10bdb7b88fca7cd0d004d9d1adb', '376409964@qq.com', '4b9b30d8c5aea10bdb7b88fca7cd0d004d9d1adb', 1284595487, 1293063647, 0, 1),
(16, 'rdfe222', '06a6275a520d7cb8ffe33c2c299a95330aaee748', '489635196@qq.com', '06a6275a520d7cb8ffe33c2c299a95330aaee748', 1284595501, 1284595501, 0, 1),
(17, 'santahang', '2363d639f9011fc7c5285800397c3a98ecef80e0', 'jacksonwithyou@yahoo.cn', '2363d639f9011fc7c5285800397c3a98ecef80e0', 1284595502, 1284595502, 0, 1),
(18, 'chenyifan', 'cfbac160e2ec316f66bded5a941cd60a1bc6007c', '594249891@qq.com', 'cfbac160e2ec316f66bded5a941cd60a1bc6007c', 1284595518, 1284595518, 0, 1),
(19, 'seven', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', '32641495@qq.com', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', 1284595548, 1284595548, 0, 1),
(20, '2008052867', '0267cfbf6dc43b4067636df1f3abd8502d74b9cd', 'happy-cmx@163.com', '0267cfbf6dc43b4067636df1f3abd8502d74b9cd', 1284595606, 1284595606, 0, 1),
(21, 'asd302830', '3e90c7c6a19449ec77a2d240cf903784cbf4227e', '451157443@qq.com', '3e90c7c6a19449ec77a2d240cf903784cbf4227e', 1284595633, 1284595633, 0, 1),
(22, '真理', '3e0d04f614b8568ca84f35c8e88c8b56c55212d5', '1033397599@qq.com', '3e0d04f614b8568ca84f35c8e88c8b56c55212d5', 1284595666, 1284595666, 0, 1),
(23, '2008052503', '9d02ca27ac88722ce361bbc4e7875254637c8a8e', 'benzero2010@hotmail.com', '9d02ca27ac88722ce361bbc4e7875254637c8a8e', 1284595730, 1284595730, 0, 1),
(24, 'wuhao', '1934b97169caa45b0e5adde92c1b4bad6bc7c829', 'wuhaogzr@vip.qq.com', '1934b97169caa45b0e5adde92c1b4bad6bc7c829', 1284595731, 1293955008, 0, 1),
(25, 'AC_Crush', '3365ea17e05af8e0945e73b1519fc82b6a40639b', '854153483@qq.com', '3365ea17e05af8e0945e73b1519fc82b6a40639b', 1284595745, 1284595745, 0, 1),
(26, '梁海瑞', '66e8abcd2d305e4df3b272a63e4504d9297eab97', '1025369416@qq.com', '66e8abcd2d305e4df3b272a63e4504d9297eab97', 1284596434, 1293610097, 0, 1),
(27, '吴豪波', '88a979ac1261ba8934daa19cf1c2c0db01b5cf51', '928896617@qq.com', '88a979ac1261ba8934daa19cf1c2c0db01b5cf51', 1284596473, 1284596473, 0, 1),
(28, 'lhm15', 'dd1677534156c080f4bbfa9fbc3015997a8c5a17', 'rolfm@163.com', 'dd1677534156c080f4bbfa9fbc3015997a8c5a17', 1284817985, 1284817985, 0, 1),
(29, 'lion', '1bdc34978960a4fd199b56b1560fcc0570b3908f', 'xiaoduan@qq.com', '1bdc34978960a4fd199b56b1560fcc0570b3908f', 1285774515, 1285774515, 0, 1),
(30, 'mengsifan', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', '714206320@qq.com', 'e55db55d7cfcd10a06ab6fa1b9b81214db96c9fa', 1285805315, 1285805315, 0, 1),
(31, '2008052505', '301bab851c804a6e9e5a5b4e650179a091d00d29', '657202492@qq.com', '301bab851c804a6e9e5a5b4e650179a091d00d29', 1285805386, 1285805386, 0, 1),
(32, 'jnu405', '488690380519d15570e50e11a3a9fe5172f2ead9', '991011715@qq.com', '488690380519d15570e50e11a3a9fe5172f2ead9', 1286000225, 1286000225, 0, 1),
(33, 'jnu123', '7c14902093e3375bb64bc78604cf7ef782cb3faa', '523087924@qq.com', '7c14902093e3375bb64bc78604cf7ef782cb3faa', 1286349948, 1286354453, 0, 1),
(34, 'Cololabis saira', '39b5469212012ac47d277e3fae3173ec2e4d3e84', '947083374@qq.com', '39b5469212012ac47d277e3fae3173ec2e4d3e84', 1286606600, 1286606639, 0, 1),
(35, '库比浪', 'a9eb7ab81ad9e46c6c072ce59b3413ffff56053d', 'wq_yeah@sina.com', 'a9eb7ab81ad9e46c6c072ce59b3413ffff56053d', 1288224189, 1289436849, 0, 1),
(36, 'boo', '0f993e210d5fde043209b76886fdce901c8d9856', '237024302@qq.com', '0f993e210d5fde043209b76886fdce901c8d9856', 1288248439, 1288248439, 0, 1),
(37, 'fresher', 'e9e4ac9fe68374e833347ab2ff21a148c36d94c2', '363234737@qq.com', 'e9e4ac9fe68374e833347ab2ff21a148c36d94c2', 1289872853, 1289872853, 0, 1),
(38, 'lhr', '66e8abcd2d305e4df3b272a63e4504d9297eab97', 'lhr2050@163.com', '66e8abcd2d305e4df3b272a63e4504d9297eab97', 1293610204, 1293610204, 0, 1),
(39, 'yujammyy', '52fbe127b6d4aaac0c1c1420df692bee2fc9689b', '895176142@qq.com', '52fbe127b6d4aaac0c1c1420df692bee2fc9689b', 1294496497, 1294569519, 0, 1);
