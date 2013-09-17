-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 08:44 AM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `rate`, `amount`, `code`, `created`, `mainImageUrl`, `discription`) VALUES
(27, 'Product1', 123, 0, 100, '1376', '2013-06-23 09:17:54', 'Blazer2013_06_24_10_32_59.jpg', ''),
(28, 'Product 2', 1500, 0, 100, '123', '2013-06-23 23:37:31', 'Blazer2013_06_24_10_32_59.jpg', ''),
(29, 'Blazer', 1200, 0, 50, 'P12E3', '2013-06-24 04:32:59', 'Blazer2013_06_24_10_32_59.jpg', ''),
(30, 'Product 007', 100, 0, 10, '101010', '2013-06-28 17:19:55', 'Therman52013_06_28_22_23_32.jpg', ''),
(31, 'Rasha', 200, 0, 2, '2020', '2013-06-28 20:06:03', 'Blazer2013_06_24_10_32_59.jpg', ''),
(32, 'Therman', 2000, 0, 10, '12012', '2013-06-28 20:17:59', 'Blazer2013_06_24_10_32_59.jpg', ''),
(33, 'Therman2', 2000, 0, 10, '1201', '2013-06-28 20:21:50', 'Blazer2013_06_24_10_32_59.jpg', ''),
(34, 'Therman3', 2000, 0, 10, '120', '2013-06-28 20:22:12', 'Blazer2013_06_24_10_32_59.jpg', ''),
(35, 'Therman4', 2000, 0, 10, '12', '2013-06-28 20:23:04', 'Blazer2013_06_24_10_32_59.jpg', ''),
(36, 'Therman5', 2000, 0, 10, '129912', '2013-06-28 20:23:32', 'Blazer2013_06_24_10_32_59.jpg', ''),
(37, 'Therman6', 2000, 0, 10, '12991', '2013-06-28 20:24:01', 'Blazer2013_06_24_10_32_59.jpg', ''),
(38, 'Pas', 100, 0, 40, '33333', '2013-06-28 20:56:42', 'pas2013_06_28_22_56_41.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `productartist`
--

CREATE TABLE IF NOT EXISTS `productartist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productavaiableartist`
--

CREATE TABLE IF NOT EXISTS `productavaiableartist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productArtistid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productavaiableiningredient`
--

CREATE TABLE IF NOT EXISTS `productavaiableiningredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productInGredientId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

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
(38, 27, 1),
(39, 27, 2),
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
(51, 37, 6),
(52, 38, 6);

-- --------------------------------------------------------

--
-- Table structure for table `productavaiablepart`
--

CREATE TABLE IF NOT EXISTS `productavaiablepart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productPartId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

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
(42, 27, 20),
(43, 27, 21),
(44, 27, 21),
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
(56, 37, 18),
(57, 38, 29);

-- --------------------------------------------------------

--
-- Table structure for table `productavaiablesize`
--

CREATE TABLE IF NOT EXISTS `productavaiablesize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productSizeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

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
(53, 27, 1),
(54, 27, 2),
(55, 27, 3),
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
(75, 37, 14),
(76, 37, 1),
(77, 38, 14);

-- --------------------------------------------------------

--
-- Table structure for table `productavailablecolor`
--

CREATE TABLE IF NOT EXISTS `productavailablecolor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productColorId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

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
(37, 27, 1),
(38, 27, 2),
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
(49, 37, 5),
(50, 38, 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(10, 'hb', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `productingredient`
--

INSERT INTO `productingredient` (`id`, `name`, `description`) VALUES
(1, '100% cotton', ''),
(2, 'Block print', ''),
(5, 'Silk Screen', ''),
(6, '', ''),
(7, 'grhg', ''),
(8, 'a', ''),
(9, 'q', ''),
(10, 'j', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

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
(29, 'yg', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `logo_dir`, `tag_line`, `title`, `latest_product_row`, `grid_row`, `banner`, `contact_information`, `fb_link`, `twitter_link`, `flicker_link`, `created`) VALUES
(1, '', '', 'test', 0, 0, '', '', '', '', '', '2013-09-14 20:37:02');

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
