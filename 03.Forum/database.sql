-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Време на генериране:
-- Версия на сървъра: 5.5.32
-- Версия на PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `telerik`
--
CREATE DATABASE IF NOT EXISTS `telerik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `telerik`;

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `posted_by` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`id`, `title`, `message`, `posted_by`, `date`) VALUES
(6, 'TestTest 1', 'testtest', 'user', '05.10.13'),
(7, 'q', 'q', 'user', '05.10.13'),
(8, 'q', 'q', 'user', '05.10.13'),
(9, '123', '123', 'user', '05.10.13'),
(10, '123123', '123123123123', 'user', '05.10.13'),
(11, 'asdasdasd', 'asdasdasdasd', 'user', '05.10.13'),
(12, '123123123', '123123123', 'user', '05.10.13');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user', 'qwerty'),
(2, 'nikoniko', 'qwerty'),
(3, 'asdfasd', 'asdasd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;