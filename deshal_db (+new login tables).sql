-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2013 at 10:28 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
(36, 'Eid', '', 35),
(37, 'something', '', 36),
(38, 'new', '', 0);

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
-- Table structure for table `tbl_address`
--

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `user_id` int(11) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`user_id`, `address_type`, `address`) VALUES
(2, 'short_address', 'bakar pola');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delevery_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `color`, `created`) VALUES
(10, 'violet', '2013-09-27 14:21:05'),
(11, 'orabge', '2013-09-27 14:21:05'),
(12, '', '2013-09-27 14:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `product_id`, `image_dir`, `created`) VALUES
(1, 13, '13_2013_09_23_16_16_19.jpg', '2013-09-23 14:16:19'),
(2, 13, '13_2013_09_23_16_16_19.jpg', '2013-09-24 08:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `int_available` int(11) NOT NULL DEFAULT '0',
  `online_sell_available` int(11) NOT NULL,
  `stock_available` int(11) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0',
  `archived_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avg_review` int(11) NOT NULL,
  `review_count` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `code`, `title`, `description`, `int_available`, `online_sell_available`, `stock_available`, `archive`, `archived_desc`, `price`, `main_image`, `avg_review`, `review_count`, `created`) VALUES
(1, '1234', 'Test 1', 'janina', 0, 0, 100, 0, 'ok nothing', '1200', 'no_image.jpg', 0, 0, '2013-09-23 02:55:14'),
(2, '12345', 'test 2', 'janina', 0, 0, 200, 0, '', '2000', 'test_2_2013_09_23_07_07_19.jpg', 0, 0, '2013-09-23 05:07:20'),
(3, '111', 'test 5a', 'janina', 0, 0, 200, 0, '', '1300', 'test_5a_2013_09_23_08_33_52.jpg', 0, 0, '2013-09-23 06:33:52'),
(4, '0186', 'test 5b', 'janina', 0, 0, 200, 0, '', '123', 'test_5b_2013_09_23_08_37_32.jpg', 0, 0, '2013-09-23 06:37:32'),
(5, '0948', 'Bangla', 'janina', 0, 0, 200, 0, '', '10000', 'Bangla_2013_09_23_08_43_18.jpg', 0, 0, '2013-09-23 06:43:18'),
(6, '999', 'Bangla', 'janina', 0, 0, 200, 0, '', '1500', 'Bangla_2013_09_23_08_45_26.jpg', 0, 0, '2013-09-23 06:45:27'),
(7, '9998', 'test', 'janina', 0, 0, 300, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 06:47:39'),
(8, '123123', 'test', 'janina', 0, 0, 200, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 06:52:58'),
(9, '1231233', 'test', 'janina', 0, 0, 200, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 06:54:27'),
(10, '111222', 'test', 'janina', 0, 0, 200, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 07:09:25'),
(11, '9876', 'test done hope', 'jani na ami kicu', 0, 0, 200, 0, 'jani na ami kicu', '1300', 'test_done_hope_2013_09_23_09_31_09.jpg', 0, 0, '2013-09-23 12:35:21'),
(12, '90990', 'test done hope', 'jani', 0, 0, 200, 0, '', '1300', 'test_done_hope_2013_09_23_09_36_16.jpg', 0, 0, '2013-09-23 07:36:16'),
(13, '333', 'Hope', 'janina', 0, 0, 200, 0, 'ok janina', '1300', 'Hope_2013_09_23_16_16_17.jpg', 0, 0, '2013-09-23 14:16:19'),
(14, '000999', 'test 5a', '', 0, 0, 0, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 14:32:23'),
(15, '000999a', 'test 5a', '', 0, 0, 0, 0, '', '1300', 'no_image.jpg', 0, 0, '2013-09-23 14:39:04'),
(16, '123asd', 'JANINA', 'TEST', 1, 0, 100, 1, '', '1000', 'JANINA_2013_09_27_16_15_30.jpg', 0, 0, '2013-09-27 14:15:32'),
(17, '123asd1', 'qwe', 'wse', 1, 0, 123, 1, '', '321', 'no_image.jpg', 0, 0, '2013-09-27 14:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productincatagory`
--

CREATE TABLE IF NOT EXISTS `tbl_productincatagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_productincatagory`
--

INSERT INTO `tbl_productincatagory` (`id`, `product_id`, `categoryId`) VALUES
(1, 12, 1),
(2, 12, 2),
(3, 12, 5),
(4, 12, 6),
(5, 12, 7),
(6, 12, 8),
(7, 12, 9),
(8, 12, 3),
(9, 12, 10),
(10, 12, 11),
(11, 12, 12),
(12, 12, 13),
(13, 12, 4),
(14, 13, 35),
(15, 13, 36),
(16, 13, 37),
(17, 16, 35),
(18, 16, 36),
(19, 16, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_product_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_color_product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_info`
--

CREATE TABLE IF NOT EXISTS `tbl_product_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `field_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_product_info`
--

INSERT INTO `tbl_product_info` (`id`, `product_id`, `field_name`, `field_value`, `created`) VALUES
(1, 10, 'parts', '3 pics', '2013-09-23 07:09:25'),
(2, 10, 'artist', 'janina ami', '2013-09-23 07:09:25'),
(3, 11, 'artist', 'shaikat', '2013-09-23 07:31:09'),
(4, 11, 'parts', 'jani', '2013-09-23 07:31:09'),
(5, 12, 'artist', 'shaikat', '2013-09-23 07:36:16'),
(6, 12, 'parts', 'orna,salwar,kamiz', '2013-09-23 07:36:16'),
(7, 13, 'Artist', 'Mahmood', '2013-09-23 14:16:19'),
(8, 13, 'something', 'janina', '2013-09-23 14:16:19'),
(9, 16, 'Fabric', 'janina', '2013-09-27 14:15:32'),
(10, 17, '', '', '2013-09-27 14:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE IF NOT EXISTS `tbl_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `gridimg_width` int(11) NOT NULL,
  `gridimg_height` int(11) NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `tbl_site_settings` (`id`, `logo_dir`, `tag_line`, `title`, `latest_product_row`, `grid_row`, `gridimg_width`, `gridimg_height`, `banner`, `contact_information`, `contact_email`, `fb_link`, `twitter_link`, `flicker_link`, `created`, `aboutus_content`, `policy_content`) VALUES
(1, 'logo.png', 'Dynamic Tag Line', 'DESHAL | ART and FASHION', 6, 6, 220, 220, '', 'Level 7, Block A\r\nBasundhara City Shopping Mall\r\nPanthapath, Dhaka, Bangladesh\r\n<br/>\r\nTelephone:\r\n+88028053172', 'info@deshal.com.bd', 'http://www.facebook.com/deshal', 'http://www.twitter.com/deshal', 'http://www.flickr.com/deshal', '2013-09-23 14:59:37', '<p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal means Native. Started five years back Deshal now is a stylish, matured and contemporary brand providing clothes and fashion accessories to the youth of Bangladesh. Deshal conveys the native arts and crafts of Bangladesh through their designs. They use hand embroidery with creative metal, beads and glass beads materials on colourful local handlooms products. Their designs are inspired from local folk tales to various art patterns that are scattered all around us.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal started with only Fotua, a trendy yet famous type of shirt Bengali men wears. Now they make salwar kameez, sarees, skirts, tops, shawls, fotua, bapari shirt, sandals, bags, metal ornaments, household items (curtains, baskets, pillow covers etc) and kids wear. The 99-sqft small one room outlet has now emerged into a total 10000sqft area located in Banani, Shahbagh, Baily Road, Bashundhara City Shopping Mall and Chittagong.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Bangladesh has been famous since ancient time for the outstanding weaving and creative materials such as Jamdani and Muslin. The pride however belongs to the handloom producers of the country. Conversely, in course of time due to various political, financial decisions and mass industrialization, the hand made products of Bangladesh is far from the glorious days. Like many other fashion houses Deshal too, patronizes local products and local craftsmanship. Deshal wants to uphold the native Bangladeshi materials, arts and crafts to the world, to popularize it in the global market. Thus the poor yet creative craftsman of Bangladesh will be able to produce the beautiful handmade products, which has been difficult lately due to the immense competition with machine made products. The love for native arts and crafts inspired Deshal to explore the world, for various other native arts and crafts, beside Bangladesh. As Deshal is expanding in a faster pace soon they will be able to incorporate the global arts and crafts in their product line.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal has earned immediate popularity for the affordable price and quality. The products are moderately priced hence the products are within the reach of mass people. The reason they cater to middle income people is they want the native art and heritage to reach to the mass people through their dresses.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Special occasions such as International Mother Language day, Independence Day, Victory Day and Bengali New year inspire them in customized dresses, that emphasizes the events through colours and significant messages.<o:p style="padding: 0px; margin: 0px;"></o:p></span></p><p class="MsoNormal" style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span lang="EN-US" style="padding: 0px; margin: 0px;">Deshal is a name of a dream created by three young artists of Bangladesh.</span></p>', '<p><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">What information do we collect?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We collect information from you when you register on our site or subscribe to our newsletter.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address, phone number or credit card information. You may, however, visit our site anonymously.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">What do we use your information for?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Any of the information we collect from you may be used in one of the following ways:&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To personalize your experience</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(your information helps us to better respond to your individual needs)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To improve our website</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(we continually strive to improve our website offerings based on the information and feedback we receive from you)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To improve customer service</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">(your information helps us to more effectively respond to your customer service requests and support needs)</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To process transactions</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"></p><blockquote style="padding: 0px 0px 0px 25px; margin: 0px 0px 15px; font-style: oblique; font-size: 13px; line-height: 25px; border-left-width: 5px; border-left-style: solid; border-left-color: rgb(73, 73, 73); color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested.</blockquote><p><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">To send periodic emails</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"></p><blockquote style="padding: 0px 0px 0px 25px; margin: 0px 0px 15px; font-style: oblique; font-size: 13px; line-height: 25px; border-left-width: 5px; border-left-style: solid; border-left-color: rgb(73, 73, 73); color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">The email address you provide for order processing, may be used to send you information and updates pertaining to your order, in addition to receiving occasional company news, updates, related product or service information, etc.</blockquote><p><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">How do we protect your information?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, submit, or access your personal information.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to?keep the information confidential.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">After a transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Do we use cookies?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Yes (Cookies are small files that a site or its service provider transfers to your computers hard drive through your Web browser (if you allow) that enables the sites or service providers systems to recognize your browser and capture and remember certain information</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We use cookies to help us remember and process the items in your shopping cart and understand and save your preferences for future visits.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Do we disclose any information to outside parties?</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Online Privacy Policy Only</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">This online privacy policy applies only to information collected through our website and not to information collected offline.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Terms and Conditions</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Please also visit our Terms and Conditions section establishing the use, disclaimers, and limitations of liability governing the use of our website at&nbsp;</span><a _mce_href="http://www.deshal.com.bd" href="http://www.deshal.com.bd/" style="padding: 0px; margin: 0px; text-decoration: none; outline: none; transition: color 0.2s linear; -webkit-transition: color 0.2s linear; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">http://www.deshal.com.bd</a><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Your Consent</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">By using our site, you consent to our&nbsp;</span><a _mce_href="http://www.freeprivacypolicy.com/" _mce_style="text-decoration: none; color: #3c3c3c;" href="http://www.freeprivacypolicy.com/" target="_blank" style="padding: 0px; margin: 0px; text-decoration: none; outline: none; transition: color 0.2s linear; -webkit-transition: color 0.2s linear; color: rgb(60, 60, 60); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">web site privacy policy</a><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">.</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Changes to our Privacy Policy</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">If we decide to change our privacy policy, we will post those changes on this page.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="padding: 0px; margin: 0px; font-weight: 900; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);">Contacting Us</span><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">If there are any questions regarding this privacy policy you may contact us using the information below.&nbsp;</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">http://www.deshal.com.bd</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Plot-30, Road-6, Rupnagar R/A, Pallabi</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Dhaka, Dhaka 1216</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">Bangladesh</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">info@deshal.net</span><br style="padding: 0px; margin: 0px; color: rgb(78, 78, 78); font-size: 13px; line-height: 25px; font-family: Merriweather, Georgia, serif; background-color: rgb(255, 255, 255);"><span style="color: rgb(78, 78, 78); font-family: Merriweather, Georgia, serif; font-size: 13px; line-height: 25px; background-color: rgb(255, 255, 255);">+88028053172</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE IF NOT EXISTS `tbl_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `standared` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `size`, `weight`, `length`, `width`, `hight`, `standared`, `created`) VALUES
(12, '34', '101', '201', '301', '403', 0, '2013-09-27 14:21:05'),
(13, '34', '101', '201', '301', '401', 0, '2013-09-27 14:21:05'),
(14, '', '', '', '', '', 0, '2013-09-27 14:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size_color_product`
--

CREATE TABLE IF NOT EXISTS `tbl_size_color_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_size_color_product`
--

INSERT INTO `tbl_size_color_product` (`id`, `product_id`, `size_id`, `color_id`, `quantity`, `created`) VALUES
(17, 17, 12, 10, 10, '2013-09-27 14:21:05'),
(18, 17, 13, 11, 20, '2013-09-27 14:21:05'),
(19, 17, 14, 12, 0, '2013-09-27 14:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_image_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_image_one_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_image_two_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_image_three_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_review` int(11) NOT NULL,
  `product_view` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `username`, `total_review`, `product_view`, `product_buy`, `contact`, `password`, `created`, `first_name`, `last_name`) VALUES
(2, 'vagabond0022@gmail.com', 'oleole', 0, 0, 0, '1861876', '81dc9bdb52d04dc20036dbd8313ed055', '2013-10-01 06:53:40', 'Mahmud', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
