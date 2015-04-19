-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-19 05:17:01
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `with_us`
--

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(256) DEFAULT NULL,
  `event_time` int(11) DEFAULT NULL,
  `event_timestamp` bigint(20) DEFAULT NULL,
  `event_background` varchar(256) DEFAULT NULL,
  `event_desc` text,
  `status` int(11) DEFAULT NULL,
  `limit_num` int(11) DEFAULT NULL,
  `current_signup` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_time`, `event_timestamp`, `event_background`, `event_desc`, `status`, `limit_num`, `current_signup`) VALUES
(1, NULL, NULL, NULL, 'static/img/event-1.png', NULL, 0, NULL, NULL),
(2, NULL, NULL, NULL, 'static/img/event-2.png', NULL, 1, NULL, NULL),
(3, NULL, NULL, NULL, 'static/img/event-3.png', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `event_signup`
--

CREATE TABLE IF NOT EXISTS `event_signup` (
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `signup_time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_pay` tinyint(1) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(256) DEFAULT NULL,
  `page` varchar(256) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `member_apply`
--

CREATE TABLE IF NOT EXISTS `member_apply` (
  `member_apply_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `member_no` int(11) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `contact_mobile` varchar(256) DEFAULT NULL,
  `contact_email` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  PRIMARY KEY (`member_apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(256) DEFAULT NULL,
  `service_icon` varchar(256) DEFAULT NULL,
  `apply_uid` varchar(256) DEFAULT NULL,
  `service_time` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `contact_mobile` varchar(256) DEFAULT NULL,
  `contact_email` varchar(256) DEFAULT NULL,
  `apply_time` int(11) DEFAULT NULL,
  `approve_uid` int(11) DEFAULT NULL,
  `approve_time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_icon`, `apply_uid`, `service_time`, `contact`, `contact_mobile`, `contact_email`, `apply_time`, `approve_uid`, `approve_time`, `status`) VALUES
(1, '会议室服务', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, '活动场地服务', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, '创意咖啡', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '健身房', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '艺术区', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '休息区', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '高速网络', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '社区管理员', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '教育培训', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `service_apply`
--

CREATE TABLE IF NOT EXISTS `service_apply` (
  `service_apply_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_time` varchar(256) DEFAULT NULL,
  `service_no` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `contact_mobile` varchar(256) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `apply_time` int(11) DEFAULT NULL,
  `approve_time` int(11) DEFAULT NULL,
  `approve_uid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `regtime` int(11) DEFAULT NULL,
  `is_smart_member` tinyint(1) DEFAULT NULL,
  `is_withus_member` tinyint(1) DEFAULT NULL,
  `realname` varchar(256) DEFAULT NULL,
  `id_num` varchar(256) DEFAULT NULL,
  `is_idenfied` tinyint(1) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `change_amount` int(11) DEFAULT NULL,
  `before_account` int(11) DEFAULT NULL,
  `change_account` int(11) DEFAULT NULL,
  `change_time` int(11) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `visit_apply`
--

CREATE TABLE IF NOT EXISTS `visit_apply` (
  `visit_apply_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `visit_time` varchar(256) DEFAULT NULL,
  `visit_num` int(11) DEFAULT NULL,
  `industry` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `contact_mobile` varchar(256) DEFAULT NULL,
  `contact_email` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `apply_time` int(11) DEFAULT NULL,
  `finish_time` int(11) DEFAULT NULL,
  `finish_comment` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`visit_apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
