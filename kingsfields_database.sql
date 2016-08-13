-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2014 at 02:47 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kingsfields_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Without window and without garage room'),
(2, 'Window side room without garage'),
(3, 'Vip room without Garage'),
(4, 'Vip room with garage');

-- --------------------------------------------------------

--
-- Table structure for table `tb_discount`
--

CREATE TABLE IF NOT EXISTS `tb_discount` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_discount`
--

INSERT INTO `tb_discount` (`id`, `name`, `price`) VALUES
(1, 'December Promo', 10),
(2, 'Valentines ', 15),
(3, '10%', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `action` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id`, `user_id`, `action`, `date`) VALUES
(19, 11, 'Login', '2014-02-26 07:47:51'),
(20, 11, 'Login', '2014-02-26 08:50:58'),
(21, 11, 'Login', '2014-02-26 08:53:42'),
(22, 11, 'Login', '2014-02-26 08:53:58'),
(23, 11, 'Login', '2014-02-26 08:54:17'),
(24, 11, 'Login', '2014-02-26 09:24:59'),
(25, 11, 'Login', '2014-02-26 09:32:01'),
(26, 11, 'Login', '2014-02-26 09:44:09'),
(27, 11, 'Login', '2014-02-26 10:05:01'),
(28, 11, 'Logout', '2014-02-26 10:10:50'),
(29, 11, 'Login', '2014-02-27 14:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `memberID` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact_number` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `zip` int(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `memberID` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE IF NOT EXISTS `tb_orders` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `memberID` int(15) NOT NULL,
  `productID` int(15) NOT NULL,
  `reserveID` int(15) NOT NULL,
  `excess_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_price`
--

CREATE TABLE IF NOT EXISTS `tb_price` (
  `excess_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `prices` varchar(40) NOT NULL,
  `time` int(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  PRIMARY KEY (`excess_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_price`
--

INSERT INTO `tb_price` (`excess_id`, `name`, `prices`, `time`, `category_id`) VALUES
(2, '3 hours', '350', 3, 4),
(3, '12 hours', '650', 12, 4),
(4, '24 hours', '1100', 24, 4),
(6, '3 hours', '320', 3, 3),
(7, '12 hours', '650', 12, 3),
(8, '24 hours', '1100', 24, 3),
(10, '3 hours', '250', 3, 2),
(11, '12 hours', '600', 12, 2),
(12, '24 hours', '950', 24, 2),
(14, '3 hours', '220', 3, 1),
(15, '12 hours', '550', 12, 1),
(16, '24 hours', '900', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE IF NOT EXISTS `tb_products` (
  `productID` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`productID`, `name`, `price`) VALUES
(1, 'Extra Foam', 100),
(3, 'Utensils', 20),
(4, 'Chippy', 20),
(5, 'Pepsi 8 oz', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reserve`
--

CREATE TABLE IF NOT EXISTS `tb_reserve` (
  `reserveID` int(15) NOT NULL AUTO_INCREMENT,
  `memberID` varchar(50) NOT NULL,
  `roomID` int(30) NOT NULL,
  `days_no` varchar(40) NOT NULL,
  `total` varchar(40) NOT NULL,
  `totalamount` varchar(40) NOT NULL,
  `partial` varchar(40) NOT NULL,
  `balance` varchar(40) NOT NULL,
  `excess_id` varchar(44) NOT NULL,
  `arrival` varchar(40) NOT NULL,
  `departure` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `request` varchar(40) NOT NULL,
  `transaction_code` varchar(40) NOT NULL,
  `modeofpayment` varchar(40) NOT NULL,
  `discount` int(15) NOT NULL,
  `Incharge` varchar(50) NOT NULL,
  `Date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`reserveID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE IF NOT EXISTS `tb_rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(15) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`roomID`, `name`, `description`, `category_id`, `price`, `location`, `status`) VALUES
(100, '5', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(99, '3', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(96, '12', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(98, '1', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(97, '13', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(95, '11', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(94, '10', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(93, '9', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(92, '8', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(91, '7', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(90, '6', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(89, '4', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(88, '2', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(101, '16', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Reserved'),
(102, '18', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(103, '19', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(104, '20', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(105, '22', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(106, '23', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(107, '24', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(108, '26', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(109, '27', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(110, '28', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(111, '30', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(112, '31', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(113, '32', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(114, '33', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(115, '35', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(116, '36', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(117, '37', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(118, '39', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(119, '40', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(120, '17', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(121, '21', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(122, '25', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(123, '29', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(124, '34', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(125, '38', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(126, '2', 'with aircon', 4, 990, 'upload/1.JPG', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `contact`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ken', 'taballeja', '09351585465'),
(19, 'monaliza', '827ccb0eea8a706c4c34a16891f84e7b', 'mona liza', 'falle', '9462561038'),
(17, 'awts', '5f4dcc3b5aa765d61d8327deb882cf99', 'hunter', 'michael', '3313134343'),
(16, 'SMC', '381f153a0e6e6dc7d3bf5dbef251b370', 'SMC', 'SMC', '921213131433');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
