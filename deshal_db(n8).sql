-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 08:04 AM
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
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `inBDT` float NOT NULL,
  `modified` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customerrating`
--

CREATE TABLE IF NOT EXISTS `customerrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customerreview`
--

CREATE TABLE IF NOT EXISTS `customerreview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review` varchar(500) CHARACTER SET utf8 NOT NULL,
  `userId` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `internationalproduct`
--

CREATE TABLE IF NOT EXISTS `internationalproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `offeronproduct`
--

CREATE TABLE IF NOT EXISTS `offeronproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `offer` varchar(500) CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(500) CHARACTER SET utf8 NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mainImageUrl` varchar(50) CHARACTER SET utf8 NOT NULL,
  `discription` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Active , 1=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `rate`, `amount`, `code`, `created`, `mainImageUrl`, `discription`, `status`) VALUES
(27, 'Product1', 12313, 0, 100, '1q1q', '2013-06-23 09:17:54', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(28, 'Product 2', 1500, 0, 100, '123', '2013-06-23 23:37:31', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(29, 'Blazer', 1200, 0, 50, 'P12E3', '2013-06-24 04:32:59', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(30, 'Product 007', 100, 0, 10, '101010', '2013-06-28 17:19:55', 'Therman52013_06_28_22_23_32.jpg', '', 0),
(31, 'Rasha', 200, 0, 2, '2020', '2013-06-28 20:06:03', 'Blazer2013_06_24_10_32_59.jpg', '', 1),
(32, 'Therman', 2000, 0, 10, '12012', '2013-06-28 20:17:59', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(33, 'Therman2', 2000, 0, 10, '1201', '2013-06-28 20:21:50', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(34, 'Therman3', 2000, 0, 10, '120', '2013-06-28 20:22:12', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(35, 'Therman4', 2000, 0, 10, '12', '2013-06-28 20:23:04', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(36, 'Therman5', 2000, 0, 10, '129912', '2013-06-28 20:23:32', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(37, 'Therman6', 2000, 0, 10, '12991', '2013-06-28 20:24:01', 'Blazer2013_06_24_10_32_59.jpg', '', 0),
(38, 'Pas', 100, 0, 40, '33333', '2013-06-28 20:56:42', 'pas2013_06_28_22_56_41.jpg', '', 0),
(39, 'test product', 1500, 0, 100, 't12', '2013-06-29 13:06:40', 'test_product2013_06_29_19_06_40.jpg', '', 1),
(40, 'Product 5', 1500, 0, 100, '1234PP', '2013-07-01 21:13:21', 'no_image.jpg', '', 0),
(41, 'test4209', 1100, 0, 1000, '1234PPQW', '2013-07-01 23:27:24', 'no_image.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productartist`
--

CREATE TABLE IF NOT EXISTS `productartist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `productartist`
--

INSERT INTO `productartist` (`id`, `name`, `description`) VALUES
(1, 'Shaikat', '');

-- --------------------------------------------------------

--
-- Table structure for table `productavaiableartist`
--

CREATE TABLE IF NOT EXISTS `productavaiableartist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productArtistid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `productavaiableartist`
--

INSERT INTO `productavaiableartist` (`id`, `productId`, `productArtistid`) VALUES
(1, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productavaiableiningredient`
--

CREATE TABLE IF NOT EXISTS `productavaiableiningredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productInGredientId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `productavaiableiningredient`
--

INSERT INTO `productavaiableiningredient` (`id`, `productId`, `productInGredientId`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 1),
(6, 4, 2),
(7, 5, 1),
(8, 5, 2),
(9, 6, 1),
(10, 6, 2),
(11, 6, 5),
(12, 7, 6),
(13, 8, 6),
(14, 9, 1),
(15, 9, 2),
(16, 10, 1),
(17, 10, 2),
(18, 11, 1),
(19, 11, 2),
(20, 12, 1),
(21, 12, 2),
(22, 13, 1),
(23, 13, 2),
(24, 14, 7),
(25, 15, 1),
(26, 15, 2),
(27, 16, 6),
(28, 17, 6),
(29, 18, 6),
(30, 19, 6),
(31, 20, 6),
(32, 21, 6),
(33, 22, 6),
(34, 23, 6),
(35, 24, 6),
(36, 25, 6),
(37, 26, 6),
(40, 28, 1),
(41, 28, 2),
(42, 28, 5),
(43, 29, 6),
(44, 30, 8),
(45, 31, 9),
(46, 32, 8),
(47, 33, 6),
(48, 34, 6),
(49, 35, 10),
(50, 36, 6),
(52, 38, 6),
(53, 39, 6),
(54, 40, 1),
(55, 40, 2),
(56, 40, 5),
(65, 27, 1),
(66, 27, 2),
(67, 27, 5),
(79, 37, 6),
(113, 0, 11),
(117, 0, 1),
(118, 0, 2),
(119, 0, 5),
(120, 41, 1),
(121, 41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productavaiablepart`
--

CREATE TABLE IF NOT EXISTS `productavaiablepart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productPartId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `productavaiablepart`
--

INSERT INTO `productavaiablepart` (`id`, `productId`, `productPartId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 11),
(5, 2, 12),
(6, 3, 13),
(7, 3, 14),
(8, 4, 15),
(9, 4, 16),
(10, 5, 15),
(11, 5, 16),
(12, 6, 15),
(13, 6, 17),
(14, 7, 18),
(15, 8, 18),
(16, 9, 15),
(17, 9, 16),
(18, 10, 15),
(19, 10, 16),
(20, 11, 15),
(21, 11, 16),
(22, 12, 15),
(23, 12, 16),
(24, 13, 15),
(25, 13, 16),
(26, 14, 19),
(27, 15, 15),
(28, 15, 16),
(29, 16, 18),
(30, 17, 15),
(31, 17, 16),
(32, 18, 15),
(33, 18, 16),
(34, 19, 18),
(35, 20, 18),
(36, 21, 18),
(37, 22, 18),
(38, 23, 18),
(39, 24, 18),
(40, 25, 18),
(41, 26, 18),
(45, 28, 22),
(46, 28, 23),
(47, 28, 24),
(48, 29, 18),
(49, 30, 25),
(50, 31, 26),
(51, 32, 27),
(52, 33, 18),
(53, 34, 18),
(54, 35, 28),
(55, 36, 18),
(57, 38, 29),
(58, 39, 18),
(59, 40, 15),
(60, 40, 16),
(70, 27, 15),
(71, 27, 16),
(72, 27, 30),
(88, 37, 15),
(89, 37, 16),
(90, 37, 30),
(123, 0, 18),
(127, 0, 15),
(128, 0, 16),
(129, 0, 30),
(130, 41, 22),
(131, 41, 23),
(132, 41, 24);

-- --------------------------------------------------------

--
-- Table structure for table `productavaiablesize`
--

CREATE TABLE IF NOT EXISTS `productavaiablesize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productSizeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `productavaiablesize`
--

INSERT INTO `productavaiablesize` (`id`, `productId`, `productSizeId`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 4, 1),
(9, 4, 2),
(10, 4, 3),
(11, 5, 1),
(12, 5, 2),
(13, 5, 3),
(14, 5, 8),
(15, 6, 1),
(16, 6, 2),
(17, 6, 3),
(18, 6, 8),
(19, 7, 9),
(20, 8, 9),
(21, 9, 1),
(22, 9, 2),
(23, 9, 3),
(24, 10, 1),
(25, 10, 2),
(26, 10, 3),
(27, 11, 1),
(28, 11, 2),
(29, 11, 3),
(30, 12, 1),
(31, 12, 2),
(32, 12, 3),
(33, 12, 8),
(34, 13, 1),
(35, 13, 2),
(36, 13, 3),
(37, 13, 8),
(38, 14, 10),
(39, 15, 1),
(40, 15, 2),
(41, 15, 3),
(42, 16, 9),
(43, 17, 9),
(44, 18, 9),
(45, 19, 9),
(46, 20, 9),
(47, 21, 9),
(48, 22, 9),
(49, 23, 9),
(50, 24, 9),
(51, 25, 9),
(52, 26, 9),
(56, 28, 1),
(57, 28, 2),
(58, 28, 3),
(59, 28, 8),
(60, 29, 11),
(61, 30, 12),
(62, 30, 13),
(63, 31, 14),
(64, 31, 15),
(65, 32, 16),
(66, 32, 17),
(67, 32, 18),
(68, 33, 9),
(69, 34, 16),
(70, 34, 19),
(71, 35, 12),
(72, 35, 20),
(73, 36, 14),
(74, 36, 15),
(77, 38, 14),
(78, 39, 9),
(79, 40, 1),
(80, 40, 2),
(81, 40, 3),
(82, 40, 8),
(93, 27, 1),
(94, 27, 2),
(95, 27, 3),
(96, 27, 8),
(113, 37, 14),
(114, 37, 1),
(164, 0, 9),
(169, 0, 1),
(170, 0, 2),
(171, 0, 3),
(172, 0, 8),
(173, 41, 1),
(174, 41, 2),
(175, 41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productavailablecolor`
--

CREATE TABLE IF NOT EXISTS `productavailablecolor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productColorId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `productavailablecolor`
--

INSERT INTO `productavailablecolor` (`id`, `productId`, `productColorId`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 1),
(6, 4, 2),
(7, 5, 1),
(8, 5, 2),
(9, 6, 1),
(10, 6, 2),
(11, 7, 5),
(12, 8, 5),
(13, 9, 1),
(14, 9, 2),
(15, 10, 1),
(16, 10, 2),
(17, 11, 1),
(18, 11, 2),
(19, 12, 1),
(20, 12, 2),
(21, 13, 1),
(22, 13, 2),
(23, 14, 6),
(24, 15, 1),
(25, 15, 2),
(26, 16, 5),
(27, 17, 5),
(28, 18, 5),
(29, 19, 5),
(30, 20, 5),
(31, 21, 5),
(32, 22, 5),
(33, 23, 5),
(34, 24, 5),
(35, 25, 5),
(36, 26, 5),
(39, 28, 1),
(40, 28, 2),
(41, 29, 1),
(42, 30, 7),
(43, 31, 8),
(44, 32, 7),
(45, 33, 5),
(46, 34, 5),
(47, 35, 9),
(48, 36, 5),
(50, 38, 10),
(51, 39, 5),
(52, 40, 1),
(53, 40, 2),
(60, 27, 1),
(61, 27, 2),
(74, 37, 1),
(75, 37, 2),
(76, 37, 12),
(104, 0, 5),
(107, 0, 1),
(108, 0, 2),
(109, 41, 13);

-- --------------------------------------------------------

--
-- Table structure for table `productavailablemodel`
--

CREATE TABLE IF NOT EXISTS `productavailablemodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productModelId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productavaliabletag`
--

CREATE TABLE IF NOT EXISTS `productavaliabletag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productTagId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `productavaliabletag`
--

INSERT INTO `productavaliabletag` (`id`, `productId`, `productTagId`) VALUES
(9, 0, 4),
(11, 0, 2),
(12, 41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productcart`
--

CREATE TABLE IF NOT EXISTS `productcart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE IF NOT EXISTS `productcolor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`id`, `name`, `description`) VALUES
(1, 'red', ''),
(2, 'green', ''),
(5, '', ''),
(6, 'jhgh', ''),
(7, 'a', ''),
(8, 'q', ''),
(9, 'f', ''),
(10, 'hb', ''),
(11, 'b;ue', ''),
(12, 'blue', ''),
(13, 'colo', '');

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `caption` varchar(500) CHARACTER SET utf8 NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productincart`
--

CREATE TABLE IF NOT EXISTS `productincart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productCartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productincatagory`
--

CREATE TABLE IF NOT EXISTS `productincatagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `productincatagory`
--

INSERT INTO `productincatagory` (`id`, `productId`, `categoryId`) VALUES
(2, 30, 20),
(4, 29, 26),
(6, 31, 28),
(7, 28, 26),
(8, 30, 26),
(9, 31, 26),
(10, 33, 26),
(11, 35, 26),
(17, 38, 27),
(19, 41, 27),
(20, 41, 26),
(21, 41, 29),
(22, 41, 28);

-- --------------------------------------------------------

--
-- Table structure for table `productindiscount`
--

CREATE TABLE IF NOT EXISTS `productindiscount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `catagoryid` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_time` varchar(500) CHARACTER SET utf8 NOT NULL,
  `end_time` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productingredient`
--

CREATE TABLE IF NOT EXISTS `productingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `productingredient`
--

INSERT INTO `productingredient` (`id`, `name`, `description`) VALUES
(1, '100% cotton', ''),
(2, 'Block print', ''),
(5, 'Silk Screen', ''),
(6, '100% Silk', ''),
(7, 'grhg', ''),
(8, 'a', ''),
(9, 'q', ''),
(10, 'j', ''),
(11, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productmodel`
--

CREATE TABLE IF NOT EXISTS `productmodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productpart`
--

CREATE TABLE IF NOT EXISTS `productpart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `productpart`
--

INSERT INTO `productpart` (`id`, `name`, `description`) VALUES
(15, 'some1 ', ''),
(16, ' some2', ''),
(17, ' some3', ''),
(18, '', ''),
(19, 'sd', ''),
(20, 'part1', ''),
(21, 'part2', ''),
(22, 'bal1', ''),
(23, 'bal2', ''),
(24, 'bal', ''),
(25, 'a', ''),
(26, 'kk', ''),
(27, 'wewe', ''),
(28, 'fffs', ''),
(29, 'yg', ''),
(30, 'some3', '');

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE IF NOT EXISTS `productsize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`id`, `name`, `description`) VALUES
(1, '34', ''),
(2, '35', ''),
(3, '36', ''),
(8, '46', ''),
(9, '', ''),
(10, 'gfhf', ''),
(11, 'L', ''),
(12, '10', ''),
(13, '12', ''),
(14, '20', ''),
(15, '21', ''),
(16, '30', ''),
(17, '31', ''),
(18, '32', ''),
(19, ' 32', ''),
(20, ' 30', '');

-- --------------------------------------------------------

--
-- Table structure for table `producttag`
--

CREATE TABLE IF NOT EXISTS `producttag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `producttag`
--

INSERT INTO `producttag` (`id`, `name`, `description`) VALUES
(1, 'নীল পাহাড়', ''),
(2, 'নীল', ''),
(3, 'নীল পাহাড় 2', ''),
(4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `relatedproduct`
--

CREATE TABLE IF NOT EXISTS `relatedproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `relatedProductId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviewrating`
--

CREATE TABLE IF NOT EXISTS `reviewrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review` varchar(4000) CHARACTER SET utf8 NOT NULL,
  `rate` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_Name` (`user_Name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `reviewrating`
--

INSERT INTO `reviewrating` (`id`, `review`, `rate`, `user_Id`, `productId`, `created`, `user_Name`, `email`) VALUES
(15, 'something....', 4, 0, 36, '2013-07-07 21:16:08', 'shafi', 'shafi.shaikat@gmail.com'),
(16, 'something', 0, 0, 33, '2013-09-05 12:14:09', 'shaikat', 'shafi.shaikat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latest_product_row` int(11) NOT NULL,
  `grid_row` int(11) NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flicker_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aboutus_content` text COLLATE utf8_unicode_ci,
  `policy_content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `logo_dir`, `tag_line`, `title`, `latest_product_row`, `grid_row`, `banner`, `contact_information`, `fb_link`, `twitter_link`, `flicker_link`, `created`, `aboutus_content`, `policy_content`) VALUES
(1, 'logo.png', 'Dynamic Tag Line', 'DESHAL | ART and FASHION', 6, 6, '', 'Level 7, Block A\r\nBasundhara City Shopping Mall\r\nPanthapath, Dhaka, Bangladesh\r\n<br/>\r\nTelephone:\r\n+88028053172', 'http://www.facebook.com/deshal', 'http://www.twitter.com/deshal', 'http://www.flickr.com/deshal', '2013-09-17 23:20:16', '<p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal means Native. Started five years back Deshal now is a stylish, matured and contemporary brand providing clothes and fashion accessories to the youth of Bangladesh. Deshal conveys the native arts and crafts of Bangladesh through their designs. They use hand embroidery with creative metal, beads and glass beads materials on colourful local handlooms products. Their designs are inspired from local folk tales to various art patterns that are scattered all around us.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal started with only Fotua, a trendy yet famous type of shirt Bengali men wears. Now they make salwar kameez, sarees, skirts, tops, shawls, fotua, bapari shirt, sandals, bags, metal ornaments, household items (curtains, baskets, pillow covers etc) and kids wear. The 99-sqft small one room outlet has now emerged into a total 10000sqft area located in Banani, Shahbagh, Baily Road, Bashundhara City Shopping Mall and Chittagong.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Bangladesh has been famous since ancient time for the outstanding weaving and creative materials such as Jamdani and Muslin. The pride however belongs to the handloom producers of the country. Conversely, in course of time due to various political, financial decisions and mass industrialization, the hand made products of Bangladesh is far from the glorious days. Like many other fashion houses Deshal too, patronizes local products and local craftsmanship. Deshal wants to uphold the native Bangladeshi materials, arts and crafts to the world, to popularize it in the global market. Thus the poor yet creative craftsman of Bangladesh will be able to produce the beautiful handmade products, which has been difficult lately due to the immense competition with machine made products. The love for native arts and crafts inspired Deshal to explore the world, for various other native arts and crafts, beside Bangladesh. As Deshal is expanding in a faster pace soon they will be able to incorporate the global arts and crafts in their product line.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal has earned immediate popularity for the affordable price and quality. The products are moderately priced hence the products are within the reach of mass people. The reason they cater to middle income people is they want the native art and heritage to reach to the mass people through their dresses.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Special occasions such as International Mother Language day, Independence Day, Victory Day and Bengali New year inspire them in customized dresses, that emphasizes the events through colours and significant messages.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal is a name of a dream created by three young artists of Bangladesh.</span></p>', '<p><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">What information do we collect?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We collect information from you when you register on our site or subscribe to our newsletter.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address, phone number or credit card information. You may, however, visit our site anonymously.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">What do we use your information for?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Any of the information we collect from you may be used in one of the following ways:&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To personalize your experience</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(your information helps us to better respond to your individual needs)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To improve our website</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(we continually strive to improve our website offerings based on the information and feedback we receive from you)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To improve customer service</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(your information helps us to more effectively respond to your customer service requests and support needs)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To process transactions</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"></p><blockquote style="padding: 0px 0px 0px 25px; margin: 0px 0px 15px; font-style: oblique; font-size: 13px; line-height: 25px; border-left-width: 5px; border-left-style: solid; border-left-color: rgb(73, 73, 73); color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested.</blockquote><p><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To send periodic emails</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"></p><blockquote style="padding: 0px 0px 0px 25px; margin: 0px 0px 15px; font-style: oblique; font-size: 13px; line-height: 25px; border-left-width: 5px; border-left-style: solid; border-left-color: rgb(73, 73, 73); color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">The email address you provide for order processing, may be used to send you information and updates pertaining to your order, in addition to receiving occasional company news, updates, related product or service information, etc.</blockquote><p><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">How do we protect your information?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, submit, or access your personal information.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to?keep the information confidential.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">After a transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Do we use cookies?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Yes (Cookies are small files that a site or its service provider transfers to your computers hard drive through your Web browser (if you allow) that enables the sites or service providers systems to recognize your browser and capture and remember certain information</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We use cookies to help us remember and process the items in your shopping cart and understand and save your preferences for future visits.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Do we disclose any information to outside parties?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Online Privacy Policy Only</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">This online privacy policy applies only to information collected through our website and not to information collected offline.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Terms and Conditions</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Please also visit our Terms and Conditions section establishing the use, disclaimers, and limitations of liability governing the use of our website at&nbsp;</span><a _mce_href="http://www.deshal.com.bd" href="http://www.deshal.com.bd/" style="padding: 0px; margin: 0px; text-decoration: none; outline: none; transition: color 0.2s linear; -webkit-transition: color 0.2s linear; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">http://www.deshal.com.bd</a><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Your Consent</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">By using our site, you consent to our&nbsp;</span><a _mce_href="http://www.freeprivacypolicy.com/" _mce_style="text-decoration: none; color: #3c3c3c;" href="http://www.freeprivacypolicy.com/" target="_blank" style="padding: 0px; margin: 0px; text-decoration: none; outline: none; transition: color 0.2s linear; -webkit-transition: color 0.2s linear; color: rgb(60, 60, 60); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">web site privacy policy</a><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Changes to our Privacy Policy</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">If we decide to change our privacy policy, we will post those changes on this page.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Contacting Us</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">If there are any questions regarding this privacy policy you may contact us using the information below.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">http://www.deshal.com.bd</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Plot-30, Road-6, Rupnagar R/A, Pallabi</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Dhaka, Dhaka 1216</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Bangladesh</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">info@deshal.net</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">+88028053172</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `useraddressid` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `useraddressid`, `usertypeid`, `status`) VALUES
(1, 'deshal', '618f8ac922684fb2081b05649ba7b908', '', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `discription` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
