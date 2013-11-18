-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2013 at 12:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ubudget`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `sort`) VALUES
(1, 'Caloocan City', 1),
(2, 'Las Pinas City', 2),
(3, 'Makati City', 3),
(4, 'Malabon City', 4),
(5, 'Mandaluyong City', 5),
(6, 'Manila City', 6),
(7, 'Marikina City', 7),
(8, 'Muntinlupa City', 8),
(9, 'Navotas City', 9),
(10, 'Paranaque City', 10),
(11, 'Pasay City', 11),
(12, 'Pasig City', 12),
(13, 'Pateros', 13),
(14, 'Quezon City', 14),
(15, 'San Juan City', 15),
(16, 'Taguig City', 16),
(17, 'Valenzuela City', 17);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `sort`) VALUES
(1, 'Economic Services', 1),
(2, 'Social Services', 2),
(3, 'General Public Services', 3),
(4, 'Debt Burden', 4),
(5, 'Defense', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sectors_details`
--

CREATE TABLE IF NOT EXISTS `sectors_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sector_id` (`sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sectors_details`
--

INSERT INTO `sectors_details` (`id`, `sector_id`, `name`, `sort`) VALUES
(1, 1, 'Agriculture and Agrarian Reform', 1),
(2, 1, 'Natural Resources and Environment', 2),
(3, 1, 'Trade and Industry', 3),
(4, 1, 'Tourism', 4),
(5, 1, 'Power and Energy', 5),
(6, 1, 'Water Resources Development and Flood Control', 6),
(7, 1, 'Communications, Roads and Other Transport', 7),
(8, 1, 'Other Economic Services', 8),
(9, 1, 'Subsidy to Local Gov''t Units', 9),
(10, 2, 'Education, Culture and Manpower Development', 10),
(11, 2, 'Health', 11),
(12, 2, 'Social Security, Welfare and Employment', 12),
(13, 2, 'Housing and Community Development', 13),
(14, 2, 'Land Distribution', 14),
(15, 2, 'Other Social Services', 15),
(16, 2, 'Subsidy to Local Gov''t Units', 16),
(17, 5, 'Domestic Security', 17),
(18, 3, 'General Administration', 18),
(19, 3, 'Public Order and Safety', 19),
(20, 3, 'Other General Public Services', 20),
(21, 3, 'Subsidy to Local Gov''t Units', 21),
(22, 4, 'Interest Payments', 22);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `salary` int(11) unsigned DEFAULT NULL,
  `location` tinyint(3) unsigned DEFAULT NULL,
  `comment` text,
  `social_services` tinyint(3) unsigned DEFAULT NULL,
  `economic_services` tinyint(3) unsigned DEFAULT NULL,
  `public_services` tinyint(3) unsigned DEFAULT NULL,
  `debt_services` tinyint(3) unsigned DEFAULT NULL,
  `defense` tinyint(3) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
