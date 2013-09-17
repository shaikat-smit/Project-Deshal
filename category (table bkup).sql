-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 08:41 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deshal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `discription` varchar(500) CHARACTER SET utf8 NOT NULL,
  `rootCategoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `discription`, `rootCategoryId`) VALUES
(1, 'Store', 'nai', 0),
(2, 'Men', 'naaai', 1),
(3, 'Women', 'naai', 1),
(4, 'Kids', 'naai', 1),
(5, 'Fotua', '', 2),
(6, 'Shirt', '', 2),
(7, 'Panjabi', '', 2),
(8, 'Lungi', '', 2),
(9, 'Genji', '', 2),
(10, 'Jama', '', 3),
(11, 'Kapor', '', 3),
(12, 'Shari', '', 3),
(13, 'Orna', '', 3),
(35, 'Festival', '', 0),
(36, 'Eid', '', 35);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
