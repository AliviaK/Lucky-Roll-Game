-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `gamedb`;

DROP TABLE IF EXISTS `game_user`;
CREATE TABLE `game_user` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `game_user` (`user_id`, `username`, `password`, `wins`, `losses`) VALUES
(11,	'AliceCooper',	'38464bf083d958b53580c63c01e56707fd043588',	1,	1),
(12,	'RingoStarr',	'8aaee0548eb67a2bba6857e9c71cb9a9e73c42b9',	2,	4),
(14,	'NeilYoung',	'22942b7c5cdf7813ba3c1ea82ff3a2b406486271',	3,	4);

-- 2020-05-04 02:03:15
