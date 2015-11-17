-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: fypmusic.cheremwl8tli.ap-northeast-1.rds.amazonaws.com
-- 產生時間： 2015 年 11 月 17 日 08:10
-- 伺服器版本: 5.6.23
-- PHP 版本： 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `musixcloud`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `type`) VALUES
(0, 'suadmin', '1c4839f32d941c24799e9f6be9352f45', 'superadmin'),
(50, 'musicadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'musicadmin'),
(60, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(25736, 'damon', '1c4839f32d941c24799e9f6be9352f45', 'superadmin');

-- --------------------------------------------------------

--
-- 資料表結構 `adminlog`
--

CREATE TABLE IF NOT EXISTS `adminlog` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `adminid` int(9) NOT NULL,
  `logtime` time(6) NOT NULL,
  `logdate` date NOT NULL,
  `logip` varchar(30) DEFAULT NULL,
  `countryName` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid_fk_idx` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=9931336 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `adminlog`
--

INSERT INTO `adminlog` (`id`, `adminid`, `logtime`, `logdate`, `logip`, `countryName`, `latitude`, `longitude`) VALUES
(122986, 0, '18:20:34.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(138550, 0, '20:21:13.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(520487, 0, '08:56:53.000000', '2015-11-12', '202.40.211.116', NULL, NULL, NULL),
(739747, 0, '17:29:43.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(848084, 60, '16:38:41.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(852356, 0, '01:00:56.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(876135, 60, '17:52:12.000000', '2015-11-14', '218.102.34.80', NULL, NULL, NULL),
(923462, 0, '23:08:05.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(1215821, 60, '22:29:47.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(1223468, 0, '13:55:24.000000', '2015-11-12', '202.40.211.116', NULL, NULL, NULL),
(1235962, 0, '01:12:11.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(1420540, 0, '01:10:27.000000', '2015-11-17', '203.210.7.100', '''''', '''''', ''''''),
(1493531, 0, '18:20:37.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(1648865, 0, '23:10:47.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(1693116, 8677, '20:21:00.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(1818543, 60, '17:14:12.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(1825867, 0, '20:13:49.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(1890505, 0, '22:47:12.000000', '2015-11-13', '203.210.6.87', NULL, NULL, NULL),
(1918030, 0, '18:47:56.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(1918335, 60, '22:54:02.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(1979981, 60, '22:51:42.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(1988526, 0, '21:51:04.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(1989513, 0, '11:59:08.000000', '2015-11-12', '202.40.211.116', NULL, NULL, NULL),
(2051392, 0, '18:54:22.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(2058942, 0, '23:14:50.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(2079559, 0, '23:40:40.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(2099610, 60, '22:51:47.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(2158509, 8677, '20:20:58.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(2347466, 0, '23:40:46.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(2713013, 0, '17:40:07.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(2736511, 0, '00:42:43.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(2738037, 0, '19:52:54.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(2923279, 0, '18:33:14.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(2954102, 0, '18:20:37.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(3076477, 60, '16:38:27.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(3180542, 0, '18:20:39.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(3250122, 0, '00:06:24.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(3262024, 0, '01:10:07.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(3264466, 0, '19:24:37.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(3309632, 0, '01:05:52.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(3537293, 0, '21:49:59.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(3790894, 0, '21:38:40.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(3791809, 60, '22:51:43.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(3882349, 0, '23:40:41.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(3945798, 0, '01:12:26.000000', '2015-11-17', '218.103.205.100', 'Hong Kong', '22.283', '114.15'),
(4044800, 0, '00:44:42.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(4068909, 0, '21:49:59.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(4258423, 0, '18:20:29.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(4288482, 0, '01:16:21.000000', '2015-11-17', '218.103.205.100', 'Hong Kong', '22.283', '114.15'),
(4436035, 0, '18:47:39.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(4465726, 0, '23:40:41.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(4592285, 60, '15:19:29.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(4644775, 0, '18:50:07.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(4703369, 0, '01:02:34.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(4733147, 0, '23:14:33.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(5083618, 0, '21:38:41.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(5189209, 0, '18:31:59.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(5214233, 0, '18:20:40.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(5247192, 0, '16:47:56.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(5283203, 0, '17:12:33.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(5299377, 0, '23:08:02.000000', '2015-11-13', '::1', NULL, NULL, NULL),
(5401611, 0, '18:32:51.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(5593567, 0, '16:27:04.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(5649719, 0, '18:18:29.000000', '2015-11-14', '::1', NULL, NULL, NULL),
(5667919, 0, '01:14:07.000000', '2015-11-17', '203.210.7.100', 'null', 'null', 'null'),
(5809936, 0, '19:39:58.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(5832519, 0, '00:44:29.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(5835266, 60, '22:54:03.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(5879906, 0, '00:52:47.000000', '2015-11-17', '218.103.205.100', 'Hong Kong', '22.283', '114.15'),
(5999145, 0, '18:53:35.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(6045227, 0, '18:50:06.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(6177368, 0, '16:11:30.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(6340027, 0, '01:04:21.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(6468201, 0, '00:08:16.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(6517944, 0, '01:06:11.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(6788025, 0, '16:12:05.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(6831055, 0, '00:01:25.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(6922912, 0, '18:51:12.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(6943359, 0, '16:26:24.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(7216186, 60, '22:54:01.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(7391662, 0, '16:10:42.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(7516174, 0, '18:52:59.000000', '2015-11-14', '::1', 'Hong Kong', '22.25', '114.167'),
(7569275, 0, '22:46:50.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(7624817, 0, '22:52:10.000000', '2015-11-16', '::1', 'Hong Kong', '22.283', '114.15'),
(8611755, 0, '16:12:07.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167'),
(9195251, 0, '00:00:48.000000', '2015-11-17', '::1', 'Hong Kong', '22.283', '114.15'),
(9515380, 60, '21:22:20.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(9556579, 0, '21:22:44.000000', '2015-11-14', '::1', 'Hong Kong', '22.283', '114.15'),
(9677554, 0, '23:01:43.000000', '2015-11-16', '219.77.83.2', 'Hong Kong', '22.283', '114.15'),
(9760786, 0, '13:49:39.000000', '2015-11-17', '218.102.34.80', 'null', 'null', 'null'),
(9862976, 60, '19:52:18.000000', '2015-11-16', '::1', 'Hong Kong', '22.25', '114.167');

-- --------------------------------------------------------

--
-- 資料表結構 `adminmsg`
--

CREATE TABLE IF NOT EXISTS `adminmsg` (
  `msgid` int(11) NOT NULL,
  `fromadmin` varchar(45) NOT NULL,
  `toadmin` varchar(45) NOT NULL,
  `msg` varchar(999) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='For Admin Message';

--
-- 資料表的匯出資料 `adminmsg`
--

INSERT INTO `adminmsg` (`msgid`, `fromadmin`, `toadmin`, `msg`, `date`, `time`, `ip`) VALUES
(80, 'suadmin', 'damon', 'Hddh', '2015-11-10', '01:06:05.000000', '219.77.83.110'),
(5819, 'admin', 'suadmin', 'sdvsdv', '2015-11-13', '20:34:03.000000', '::1'),
(6291, 'suadmin', 'admin', 'dsvnjdsn', '0000-00-00', '08:55:19.000000', '::1'),
(6709, 'suadmin', 'admin', 'scsa', '2015-11-05', '09:19:07.000000', '::1'),
(13475, 'admin', 'suadmin', 'dfh', '2015-11-14', '10:12:21.000000', '::1');

-- --------------------------------------------------------

--
-- 資料表結構 `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `songid` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL,
  `lyricist` varchar(50) DEFAULT NULL,
  `singer` varchar(50) DEFAULT NULL,
  `composer` varchar(50) NOT NULL,
  `album` int(50) NOT NULL,
  `track` int(3) NOT NULL,
  `year` year(4) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `copyright` varchar(100) DEFAULT NULL,
  `art_path` varchar(50) DEFAULT NULL,
  `lyrics` varchar(1000) DEFAULT NULL,
  `song_path` varchar(50) NOT NULL,
  `upload_time` datetime NOT NULL,
  `total_play` int(100) NOT NULL,
  `total_download` int(100) NOT NULL,
  `total_share` int(100) NOT NULL,
  `total_like` int(100) NOT NULL,
  PRIMARY KEY (`songid`),
  KEY `title` (`title`),
  KEY `songid` (`songid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `email` varchar(100) NOT NULL,
  `code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `register`
--

INSERT INTO `register` (`email`, `code`) VALUES
('admin@rete-p.com', '0355e4ad70540ecc374be09fad383aec');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `intro` varchar(200) DEFAULT NULL,
  `type` int(2) NOT NULL,
  `expire_date` date NOT NULL,
  `register_date` date NOT NULL,
  `register_ip` varchar(15) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_login_ip` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid_2` (`userid`),
  KEY `userid` (`userid`),
  KEY `userid_3` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `fullname`, `gender`, `email`, `birthday`, `intro`, `type`, `expire_date`, `register_date`, `register_ip`, `last_login_time`, `last_login_ip`, `username`, `password`) VALUES
(0, '', '', 'admin@rete-p.com', '0000-00-00', NULL, 0, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', '', '', 'c11d809c73360c8d153a37a155bec96b'),
(1, 'Wong Chun Wai', 'm', 'cw_w@outlook.com', '2012-07-19', NULL, 0, '2015-10-15', '2015-10-12', '219.243.3.3', '2015-10-22 07:40:00', '219.243.3.3', 'damonwonghv', '1c4839f32d941c24799e9f6be9352f45');

-- --------------------------------------------------------

--
-- 資料表結構 `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `logindate` date NOT NULL,
  `logintime` time NOT NULL,
  `logip` varchar(45) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`logid`),
  KEY `uid_fk_idx` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- 資料表的 Constraints `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
