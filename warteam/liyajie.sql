-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 �?01 �?20 �?03:51
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `liyajie`
--
CREATE DATABASE IF NOT EXISTS `liyajie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `liyajie`;

-- --------------------------------------------------------

--
-- 表的结构 `hao_lolgame_list`
--

CREATE TABLE IF NOT EXISTS `hao_lolgame_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` char(1) DEFAULT NULL,
  `orderno` char(27) DEFAULT NULL,
  `teamname` varchar(30) DEFAULT NULL,
  `warzone` varchar(3) DEFAULT NULL,
  `member1name` varchar(30) DEFAULT NULL,
  `member2name` varchar(30) DEFAULT NULL,
  `member3name` varchar(30) DEFAULT NULL,
  `member4name` varchar(30) DEFAULT NULL,
  `member5name` varchar(30) DEFAULT NULL,
  `member6name` varchar(30) DEFAULT NULL,
  `member7name` varchar(30) DEFAULT NULL,
  `member1cd` varchar(18) DEFAULT NULL,
  `member2cd` varchar(18) DEFAULT NULL,
  `member3cd` varchar(18) DEFAULT NULL,
  `member4cd` varchar(18) DEFAULT NULL,
  `member5cd` varchar(18) DEFAULT NULL,
  `member6cd` varchar(18) DEFAULT NULL,
  `member7cd` varchar(18) DEFAULT NULL,
  `member1id` varchar(18) DEFAULT NULL,
  `member2id` varchar(18) DEFAULT NULL,
  `member3id` varchar(18) DEFAULT NULL,
  `member4id` varchar(18) DEFAULT NULL,
  `member5id` varchar(18) DEFAULT NULL,
  `member6id` varchar(18) DEFAULT NULL,
  `member7id` varchar(18) DEFAULT NULL,
  `member1sex` varchar(6) DEFAULT NULL,
  `member2sex` varchar(6) DEFAULT NULL,
  `member3sex` varchar(6) DEFAULT NULL,
  `member4sex` varchar(6) DEFAULT NULL,
  `member5sex` varchar(6) DEFAULT NULL,
  `member6sex` varchar(6) DEFAULT NULL,
  `member7sex` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `hao_lolgame_list`
--

INSERT INTO `hao_lolgame_list` (`id`, `money`, `orderno`, `teamname`, `warzone`, `member1name`, `member2name`, `member3name`, `member4name`, `member5name`, `member6name`, `member7name`, `member1cd`, `member2cd`, `member3cd`, `member4cd`, `member5cd`, `member6cd`, `member7cd`, `member1id`, `member2id`, `member3id`, `member4id`, `member5id`, `member6id`, `member7id`, `member1sex`, `member2sex`, `member3sex`, `member4sex`, `member5sex`, `member6sex`, `member7sex`) VALUES
(1, 'y', '140116025548343', 'war4', 'za', '123', 's', 'f', 'f', 'f', NULL, NULL, '212', 'f', 'f', 'f', 'f', NULL, NULL, '0', 'f', 'f', 'f', 'f', NULL, NULL, 'male', 'male', 'female', 'female', 'female', NULL, NULL),
(3, 'n', '140116050249437', 'home', 'zab', 'mike', 'angel', 'name', 'name', 'name', NULL, NULL, '111111', '222222', '333333', '333333', '333333', NULL, NULL, '1', '2', '3', '3', '3', NULL, NULL, 'male', 'female', 'male', 'male', 'male', NULL, NULL),
(4, 'n', '140116062050684', 'war45', 'zab', '123', 's', 'f', 'f', 'f', NULL, NULL, '212', 'f', 'f', 'f', 'f', NULL, NULL, '0', 'f', 'f', 'f', 'f', NULL, NULL, 'male', 'male', 'female', 'female', 'female', NULL, NULL),
(5, 'n', '140116062050684', 'war456', 'zab', '123', 's', 'f', 'f', 'f', '2', '3', '212', 'f', 'f', 'f', 'f', '3', '1', '0', 'f', 'f', 'f', 'f', '3', '3', 'male', 'male', 'female', 'female', 'female', 'male', 'female'),
(7, 'n', '140116070953304', 'war4pay', 'za', '123', 's', 'f', 'f', 'f', NULL, NULL, '212', 'f', 'f', 'f', 'f', NULL, NULL, '0', 'f', 'f', 'f', 'f', NULL, NULL, 'male', 'male', 'female', 'female', 'female', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
