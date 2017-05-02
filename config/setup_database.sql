-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `allavarv`
--
CREATE DATABASE IF NOT EXISTS `allavarv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `allavarv`;

-- --------------------------------------------------------

--
-- Tabellstruktur `laps`
--

CREATE TABLE IF NOT EXISTS `laps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `milen` tinyint(1) DEFAULT NULL,
  `femman` tinyint(1) DEFAULT NULL,
  `elljusspåret` tinyint(1) DEFAULT NULL,
  `två_och_halvan` tinyint(1) DEFAULT NULL,
  `tolvhundra` tinyint(1) DEFAULT NULL,
  `femhundra` tinyint(1) DEFAULT NULL,
  `löptid` time DEFAULT NULL,
  `starttid` time DEFAULT NULL COMMENT 'Uträknad starttid',
  `målgång` datetime DEFAULT NULL,
  `poäng` decimal(10,2) DEFAULT NULL COMMENT 'Uträknad poäng',
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `laps`
--
ALTER TABLE `laps`
  ADD CONSTRAINT `laps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
