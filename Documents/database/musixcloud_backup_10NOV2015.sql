-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: fypmusic.cheremwl8tli.ap-northeast-1.rds.amazonaws.com
-- 產生時間： 2015 年 11 月 10 日 05:55
-- 伺服器版本: 5.6.23
-- PHP 版本： 5.6.15

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
) ;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `type`) VALUES
(0, 'suadmin', '1c4839f32d941c24799e9f6be9352f45', 'superadmin'),
(50, 'musicadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'musicadmin'),
(60, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(32446, 'damon', 'bc2a7bcbe72c1741ffabb86aa7b82c37', 'superadmin');

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
  PRIMARY KEY (`id`)
) ;

--
-- 資料表的匯出資料 `adminlog`
--

INSERT INTO `adminlog` (`id`, `adminid`, `logtime`, `logdate`, `logip`) VALUES
(8083555, 0, '13:17:17.000000', '2015-11-10', '218.102.34.80');

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
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`msgid`)
) ;

--
-- 資料表的匯出資料 `adminmsg`
--

INSERT INTO `adminmsg` (`msgid`, `fromadmin`, `toadmin`, `msg`, `date`, `time`, `ip`) VALUES
(80, 'suadmin', 'damon', 'Hddh', '2015-11-10', '01:06:05.000000', '219.77.83.110'),
(2904, 'admin', 'suadmin', 'fbdfb', '2015-11-10', '00:32:13.000000', '219.77.83.110'),
(6291, 'suadmin', 'admin', 'dsvnjdsn', '0000-00-00', '08:55:19.000000', '::1'),
(6709, 'suadmin', 'admin', 'scsa', '2015-11-05', '09:19:07.000000', '::1');

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
) ;

-- --------------------------------------------------------

--
-- 資料表結構 `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `userid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(32) NOT NULL,
  `expire_time` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ;

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
) ;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `fullname`, `gender`, `email`, `birthday`, `intro`, `type`, `expire_date`, `register_date`, `register_ip`, `last_login_time`, `last_login_ip`, `username`, `password`) VALUES
(1, 'Wong Chun Wai', 'm', 'cw_w@outlook.com', '2012-07-19', NULL, 0, '2015-10-15', '2015-10-12', '219.243.3.3', '2015-10-22 07:40:00', '219.243.3.3', 'damonwonghv', '1c4839f32d941c24799e9f6be9352f45');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- 資料表的 Constraints `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
