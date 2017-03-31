-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2014 at 01:26 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auctions`
--

CREATE TABLE IF NOT EXISTS `tbl_auctions` (
  `id` int(10) NOT NULL auto_increment,
  `bid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `pdetails` tinytext NOT NULL,
  `paddress` tinytext NOT NULL,
  `res_price` int(10) NOT NULL,
  `auction_date` varchar(40) NOT NULL,
  `auc_time` varchar(20) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_image_thumb` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `bdate` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_auctions`
--

INSERT INTO `tbl_auctions` (`id`, `bid`, `cid`, `cat_id`, `pdetails`, `paddress`, `res_price`, `auction_date`, `auc_time`, `p_image`, `p_image_thumb`, `status`, `uid`, `bdate`) VALUES
(16, 1, 1, 1, 'MH-12 GP- 5404\r\nPrice- 32000\r\nModel- 2011.\r\nKm done- 18000\r\nOwner- 1.\r\nMileage- 50.\r\nColor- black.\r\nCondition very good\r\nDocuments clear.', 'My address is Shihgad Road Pul Deshpande Park Back Side. Pune.9', 24000, '25-12-2014', '02:00pm', '507e54aaf3d7bdd283346265d13f9b1c.jpg', '9935c09b78d44459eaada3ba42a1c833.jpg', 'open', 1, '2014-12-21 18:34:58'),
(17, 8, 6, 1, 'Vespa GTS 300 Super', 'Vespa''s basic scooter design has barely changed for the better part of seven decades, but beneath the GTS 300 Super''s familiar exterior lurks a gutsy 278-cc single that can propel it to 80 mph. Although it sports an elegant Italian silhouette, torquey thr', 124000, '25-12-2014', '05:00pm', '707ef7127a3ab64c32735afad3b7cbfb.jpg', '34b535a88c8d5220d43bd9791ca4d724.jpg', 'open', 1, '2014-12-21 18:38:11'),
(18, 3, 9, 1, 'Smooth Operator Honda PCX', 'If 50 ccs are too wimpy and 150 ccs too much, Honda''s 125-cc PCX is the solution. Big, 14-inch wheels reduce the twitchy handling inherent in scooters, and linked rear-to-front brakes make quick stops an easy task.', 90000, '15-12-2014', '02:00pm', '31feaf58b496d02eb407f7d9af78ce8f.jpg', '5deebb46b8f4c3e9930f036fe80b96f5.jpg', 'open', 1, '2014-12-21 18:39:47'),
(19, 10, 11, 1, 'Mahindra Scorpio', 'Mahindra and Mahindra has presented the brand new Scorpio to the Khatron Ke Khiladi winner Rajniesh Duggall. Earlier in October, Mahindra & Mahindra had revealed the accessory range of Scorpio.', 590000, '25-12-2014', '02:00pm', '9f4b8c8f50239d2a71681326c4411d0b.jpg', 'e336e9c4d424f7ba6dfaeddfb3ac1221.jpg', 'open', 1, '2014-12-21 18:46:25'),
(21, 2, 1, 1, 'Mi Redmi 1S - 1.6GHz Quad-Core Qualcomm', 'The Mi Redmi 1S is a high performing mobile phone which is fitted with a 1.6GHz Quad-Core Qualcomm Snapdragon 400 processor with Cortex-A7 core. Experience amazing performances every time you unlock your phone and enjoy Dual SIM capabilities as well.', 4300, '25-12-2014', '02:00pm', '101a13c530e30cff0677eb1d7fd4d21a.jpg', '6c0826bb777cca7a7688f8f7c1881c54.jpg', 'open', 1, '2014-12-21 18:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

CREATE TABLE IF NOT EXISTS `tbl_banks` (
  `id` int(10) NOT NULL auto_increment,
  `bname` varchar(255) NOT NULL,
  `address` tinytext NOT NULL,
  `pn_no` varchar(100) NOT NULL,
  `city` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`id`, `bname`, `address`, `pn_no`, `city`) VALUES
(1, 'HDFC Bank', 'Plot no. 89,\r\naakashwani chowk', '0257-5588258', 1),
(2, 'ICICI Bank', 'Shahu Maharaj Complex,\r\nNear Nagar Road', '0257-2255458', 1),
(3, 'Axis Bank of India', '290, shani peth,\r\nNear post office,', '2582-58752585', 9),
(5, 'Axis Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '0257-2255458', 1),
(6, 'State Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '0257-2255458', 1),
(7, 'Corporation Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '0257-5588258', 1),
(8, 'Axis Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '022-65232562', 6),
(9, 'Corporation Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '022-65232562', 10),
(10, 'HDFC Bank', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '2584-254521', 11),
(11, 'State Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '2584-254521', 7),
(12, 'Corporation Bank of India', 'Plot no 120/A, \r\nNavi peth,\r\nSanath Nagar', '0257-5588258', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(10) NOT NULL auto_increment,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `cname`) VALUES
(1, 'Car & Bikes'),
(2, 'Mobile & Tablets'),
(3, 'Electronics'),
(4, 'Vehicles'),
(5, 'Home & Furnitures'),
(6, 'Services'),
(7, 'Fashion & Beauty'),
(8, 'Pets & Animals'),
(9, 'Jobs'),
(10, 'Real Estate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE IF NOT EXISTS `tbl_cities` (
  `id` int(10) NOT NULL auto_increment,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city`, `state`) VALUES
(1, 'Jalgaon', 'Maharashtra'),
(9, 'Bhusawal', 'Maharashtra'),
(6, 'Nandurbar', 'Maharashtra'),
(11, 'Raver', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `is_admin` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `pwd`, `bdate`, `is_admin`) VALUES
(1, 'auctionadmin', 'auction123', '2011-07-23 14:06:27', 'admin');
