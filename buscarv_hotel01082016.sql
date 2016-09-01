-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2016 a las 13:53:49
-- Versión del servidor: 5.6.30-cll-lve
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `buscarv_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `camas_kingsize` int(2) NOT NULL,
  `camas_matrimoniales` int(2) NOT NULL,
  `camas_individuales` int(2) NOT NULL,
  `no_adultos` int(2) NOT NULL,
  `no_ninios` int(2) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `camas_kingsize`, `camas_matrimoniales`, `camas_individuales`, `no_adultos`, `no_ninios`, `precio`, `status`) VALUES
(1, 'Estandar king', 1, 0, 0, 1, 1, '650.00', 'Disponible'),
(2, 'Estandar doble M', 0, 2, 0, 1, 1, '650.00', 'Disponible'),
(3, 'Estandar doble I', 0, 0, 2, 1, 1, '650.00', 'Disponible'),
(4, 'Suite', 2, 0, 0, 4, 1, '1250.00', 'Disponible'),
(5, 'Junior Suite', 2, 0, 1, 5, 1, '1400.00', 'Disponible'),
(6, 'Ejecutiva', 1, 0, 0, 1, 1, '850.00', 'Disponible'),
(7, 'Ejecutiva doble', 0, 2, 1, 2, 1, '1000.00', 'Disponible'),
(8, 'Suite Familiar', 1, 2, 0, 5, 1, '1400.00', 'Disponible'),
(9, 'Suite individual', 1, 0, 2, 4, 0, '1250.00', 'Disponible'),
(10, 'Suite Matrimonial', 0, 1, 2, 4, 1, '1250.00', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_discount`
--

CREATE TABLE IF NOT EXISTS `tb_discount` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tb_discount`
--

INSERT INTO `tb_discount` (`id`, `name`, `price`) VALUES
(8, 'VERANO AL MAXIMO', 150),
(9, 'NAVIDAD FELIZ', 165),
(10, 'VACACIONES LOCAS', 100),
(11, 'walk-in', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_exceso`
--

CREATE TABLE IF NOT EXISTS `tb_exceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `action` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=278 ;

--
-- Volcado de datos para la tabla `tb_history`
--

INSERT INTO `tb_history` (`id`, `user_id`, `action`, `date`) VALUES
(139, 21, 'Login', '2016-08-30 14:55:53'),
(140, 21, 'Logout', '2016-08-30 14:57:59'),
(141, 21, 'Logout', '2016-08-30 15:14:42'),
(142, 21, 'Logout', '2016-08-30 15:15:21'),
(143, 21, 'Logout', '2016-08-30 15:15:36'),
(144, 21, 'Logout', '2016-08-30 15:15:53'),
(145, 21, 'Login', '2016-08-30 15:35:37'),
(146, 21, 'Login', '2016-08-30 15:35:58'),
(147, 21, 'Logout', '2016-08-30 15:37:20'),
(148, 21, 'Logout', '2016-08-30 15:42:28'),
(149, 21, 'Logout', '2016-08-30 15:44:31'),
(150, 21, 'Logout', '2016-08-30 15:51:21'),
(151, 21, 'Logout', '2016-08-30 15:57:36'),
(152, 21, 'Logout', '2016-08-30 16:11:55'),
(153, 21, 'Logout', '2016-08-30 16:34:49'),
(154, 21, 'Logout', '2016-08-30 16:43:33'),
(155, 21, 'Logout', '2016-08-30 16:44:25'),
(156, 21, 'Logout', '2016-08-30 16:45:04'),
(157, 21, 'Logout', '2016-08-30 16:46:18'),
(158, 21, 'Logout', '2016-08-30 16:46:58'),
(159, 21, 'Logout', '2016-08-30 16:47:03'),
(160, 21, 'Logout', '2016-08-30 16:48:24'),
(161, 21, 'Login', '2016-08-30 16:57:55'),
(162, 21, 'Logout', '2016-08-30 16:58:27'),
(163, 21, 'Login', '2016-08-30 16:58:51'),
(164, 21, 'Logout', '2016-08-30 17:05:22'),
(165, 21, 'Logout', '2016-08-30 17:05:48'),
(166, 21, 'Logout', '2016-08-30 17:09:25'),
(167, 21, 'Logout', '2016-08-30 17:23:24'),
(168, 21, 'Login', '2016-08-30 18:13:15'),
(169, 21, 'Login', '2016-08-30 18:14:27'),
(170, 21, 'Login', '2016-08-30 18:17:19'),
(171, 21, 'Login', '2016-08-30 18:18:17'),
(172, 21, 'Login', '2016-08-30 18:19:37'),
(173, 21, 'Login', '2016-08-30 18:23:46'),
(174, 21, 'Logout', '2016-08-30 21:03:40'),
(175, 21, 'Login', '2016-08-31 07:37:08'),
(176, 21, 'Login', '2016-08-31 07:38:08'),
(177, 21, 'Login', '2016-08-31 07:38:34'),
(178, 21, 'Login', '2016-08-31 07:40:35'),
(179, 21, 'Login', '2016-08-31 07:40:56'),
(180, 21, 'Login', '2016-08-31 07:42:11'),
(181, 21, 'Login', '2016-08-31 07:44:47'),
(182, 21, 'Login', '2016-08-31 07:46:25'),
(183, 21, 'Login', '2016-08-31 07:49:20'),
(184, 21, 'Logout', '2016-08-31 11:28:18'),
(185, 21, 'Logout', '2016-08-31 12:54:34'),
(186, 21, 'Login', '2016-08-31 16:10:53'),
(187, 21, 'Login', '2016-08-31 16:11:07'),
(188, 21, 'Login', '2016-08-31 16:11:16'),
(189, 21, 'Login', '2016-08-31 16:11:22'),
(190, 21, 'Login', '2016-08-31 16:33:59'),
(191, 21, 'Login', '2016-08-31 16:35:26'),
(192, 21, 'Login', '2016-08-31 16:36:09'),
(193, 21, 'Login', '2016-08-31 16:38:47'),
(194, 21, 'Login', '2016-08-31 16:40:50'),
(195, 21, 'Login', '2016-08-31 16:42:21'),
(196, 21, 'Login', '2016-08-31 16:44:20'),
(197, 21, 'Login', '2016-08-31 16:45:12'),
(198, 21, 'Login', '2016-08-31 16:45:54'),
(199, 21, 'Login', '2016-08-31 16:48:38'),
(200, 21, 'Login', '2016-08-31 16:50:19'),
(201, 21, 'Login', '2016-08-31 16:51:59'),
(202, 21, 'Login', '2016-08-31 16:52:37'),
(203, 21, 'Login', '2016-08-31 16:52:49'),
(204, 21, 'Login', '2016-08-31 17:17:41'),
(205, 21, 'Login', '2016-08-31 17:18:50'),
(206, 21, 'Login', '2016-08-31 18:03:51'),
(207, 21, 'Logout', '2016-09-01 06:07:14'),
(208, 21, 'Login', '2016-09-01 06:27:07'),
(209, 21, 'Login', '2016-09-01 06:28:50'),
(210, 21, 'Login', '2016-09-01 06:29:35'),
(211, 21, 'Login', '2016-09-01 06:30:20'),
(212, 21, 'Login', '2016-09-01 06:31:08'),
(213, 21, 'Login', '2016-09-01 06:41:59'),
(214, 21, 'Login', '2016-09-01 06:42:48'),
(215, 21, 'Login', '2016-09-01 06:43:50'),
(216, 21, 'Login', '2016-09-01 06:44:35'),
(217, 21, 'Login', '2016-09-01 06:45:44'),
(218, 21, 'Login', '2016-09-01 06:49:40'),
(219, 21, 'Login', '2016-09-01 06:50:18'),
(220, 21, 'Login', '2016-09-01 06:55:38'),
(221, 21, 'Login', '2016-09-01 06:58:23'),
(222, 21, 'Login', '2016-09-01 06:59:38'),
(223, 21, 'Login', '2016-09-01 07:00:06'),
(224, 21, 'Login', '2016-09-01 07:01:32'),
(225, 21, 'Login', '2016-09-01 07:04:53'),
(226, 21, 'Login', '2016-09-01 07:21:30'),
(227, 21, 'Login', '2016-09-01 07:22:20'),
(228, 21, 'Login', '2016-09-01 07:23:22'),
(229, 21, 'Login', '2016-09-01 07:24:04'),
(230, 21, 'Login', '2016-09-01 07:25:16'),
(231, 21, 'Login', '2016-09-01 07:26:00'),
(232, 21, 'Login', '2016-09-01 07:29:59'),
(233, 21, 'Login', '2016-09-01 07:30:45'),
(234, 21, 'Login', '2016-09-01 07:31:13'),
(235, 21, 'Login', '2016-09-01 07:32:09'),
(236, 21, 'Login', '2016-09-01 07:32:32'),
(237, 21, 'Login', '2016-09-01 07:33:25'),
(238, 21, 'Login', '2016-09-01 07:34:27'),
(239, 21, 'Login', '2016-09-01 07:34:58'),
(240, 21, 'Login', '2016-09-01 07:35:59'),
(241, 21, 'Login', '2016-09-01 07:36:27'),
(242, 21, 'Login', '2016-09-01 07:37:27'),
(243, 21, 'Login', '2016-09-01 07:39:07'),
(244, 21, 'Login', '2016-09-01 07:42:50'),
(245, 21, 'Login', '2016-09-01 07:47:05'),
(246, 21, 'Login', '2016-09-01 07:47:37'),
(247, 21, 'Login', '2016-09-01 07:48:26'),
(248, 21, 'Login', '2016-09-01 07:50:27'),
(249, 21, 'Login', '2016-09-01 07:50:47'),
(250, 21, 'Login', '2016-09-01 08:10:25'),
(251, 21, 'Login', '2016-09-01 08:10:44'),
(252, 21, 'Login', '2016-09-01 08:11:18'),
(253, 21, 'Login', '2016-09-01 08:11:45'),
(254, 21, 'Login', '2016-09-01 08:12:24'),
(255, 21, 'Login', '2016-09-01 08:12:52'),
(256, 21, 'Login', '2016-09-01 08:13:30'),
(257, 21, 'Login', '2016-09-01 08:14:05'),
(258, 21, 'Login', '2016-09-01 08:14:44'),
(259, 21, 'Login', '2016-09-01 08:15:13'),
(260, 21, 'Login', '2016-09-01 08:16:13'),
(261, 21, 'Login', '2016-09-01 08:37:34'),
(262, 21, 'Login', '2016-09-01 09:09:04'),
(263, 21, 'Login', '2016-09-01 09:17:26'),
(264, 21, 'Login', '2016-09-01 11:22:02'),
(265, 21, 'Logout', '2016-09-01 11:22:12'),
(266, 26, 'Login', '2016-09-01 11:58:35'),
(267, 26, 'Logout', '2016-09-01 11:59:22'),
(268, 27, 'Login', '2016-09-01 12:02:19'),
(269, 21, 'Login', '2016-09-01 12:26:58'),
(270, 21, 'Login', '2016-09-01 12:28:00'),
(271, 21, 'Login', '2016-09-01 12:28:13'),
(272, 21, 'Login', '2016-09-01 12:28:43'),
(273, 21, 'Login', '2016-09-01 12:29:24'),
(274, 21, 'Login', '2016-09-01 12:29:44'),
(275, 21, 'Login', '2016-09-01 12:30:09'),
(276, 21, 'Login', '2016-09-01 12:30:37'),
(277, 21, 'Login', '2016-09-01 12:31:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_member`
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
  `country` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tb_member`
--

INSERT INTO `tb_member` (`memberID`, `username`, `firstname`, `lastname`, `email`, `password`, `contact_number`, `address`, `zip`, `country`) VALUES
(8, 'zero1808', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(9, 'zero1899', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(10, 'zero1808', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(11, 'jonito', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(12, 'erick2205', 'Erick Alejandro', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(13, 'stardust', 'Marco', 'Granados', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(14, 'gibsuki', 'Jesus', 'Orihuela', 'zero_gibran@hotmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'ninguna', 52176, NULL),
(15, 'zero999', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859982', 'Hacienda 4 cienegas 32', 52176, NULL),
(16, 'maji', 'Erick Alejandro', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7222168129', 'Hacienda 4 cienegas 32', 52176, NULL),
(17, 'chaviza', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32', 52176, NULL),
(18, 'a', 'Carlos Jonathan', 'Cadena Espinosa', 'zero.leo1894@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7225859814', 'Hacienda 4 cienegas 32', 52176, NULL),
(19, 'erick', 'Erick Alejandro', 'Cadena Espinosa', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7222168129', 'Hacienda 4 cienegas 32', 52176, NULL),
(20, 'alejandromeza', 'alejandro', 'Meza', 'aleck_dts@hotmail.com', 'c0ac94fdcd34d5b20d559086b599011a', '7224088362', '22 de mayo 114 b de la veracruz', 51354, NULL),
(21, 'alejandromeza', 'alejandro', 'Meza', 'aleck_dts@hotmail.com', 'c0ac94fdcd34d5b20d559086b599011a', '7224088362', '22 de mayo 114 b de la veracruz', 51354, NULL),
(23, 'hernandez', 'Gerson', 'blas ', '1@1.com', 'e10adc3949ba59abbe56e057f20f883e', '5632222222', 'veracruz', 57210, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_message`
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
-- Estructura de tabla para la tabla `tb_orders`
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
-- Estructura de tabla para la tabla `tb_price`
--

CREATE TABLE IF NOT EXISTS `tb_price` (
  `excess_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `prices` varchar(40) NOT NULL,
  `time` int(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  PRIMARY KEY (`excess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_products`
--

CREATE TABLE IF NOT EXISTS `tb_products` (
  `productID` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reserve`
--

CREATE TABLE IF NOT EXISTS `tb_reserve` (
  `reserveID` int(15) NOT NULL AUTO_INCREMENT,
  `memberID` varchar(50) NOT NULL,
  `roomID` int(30) DEFAULT NULL,
  `days_no` varchar(40) DEFAULT '',
  `total` varchar(40) DEFAULT '',
  `totalamount` varchar(40) DEFAULT '',
  `partial` varchar(40) DEFAULT '',
  `balance` varchar(40) DEFAULT '',
  `excess_id` varchar(44) DEFAULT '',
  `arrival` varchar(40) DEFAULT '',
  `departure` varchar(40) DEFAULT '',
  `status` varchar(40) DEFAULT '',
  `request` varchar(40) DEFAULT '',
  `transaction_code` varchar(40) DEFAULT '',
  `modeofpayment` varchar(40) DEFAULT '',
  `discount` int(15) DEFAULT '0',
  `Incharge` varchar(50) DEFAULT '',
  `Date` varchar(50) DEFAULT '',
  `pextras` int(2) DEFAULT '0',
  PRIMARY KEY (`reserveID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tb_reserve`
--

INSERT INTO `tb_reserve` (`reserveID`, `memberID`, `roomID`, `days_no`, `total`, `totalamount`, `partial`, `balance`, `excess_id`, `arrival`, `departure`, `status`, `request`, `transaction_code`, `modeofpayment`, `discount`, `Incharge`, `Date`, `pextras`) VALUES
(10, '19', 132, '1.0', '900.00', '', '0.00', 'paid', '', '31/08/2016', '02/09/2016', 'checkout', 'nada', 'bhjovteff2gt', 'Unpaid', 0, '21', '08/31/16', 1),
(11, '20', 134, '1.0', '1150.00', '', '0.00', 'paid', '', '02/09/2016', '03/09/2016', 'checkout', 'habitaciÃ³n para silla de ruedas', 'tdwe838jk2kf', 'Unpaid', 0, '21', '08/31/16', 2),
(12, '21', 134, '1.0', '1150.00', '1150', '0.00', 'paid', '', '02/09/2016', '03/09/2016', 'checkout', 'habitaciÃ³n para silla de ruedas', 'rbyif07bz3cc', 'Unpaid', 0, '21', '08/31/16', 2),
(13, '22', 132, '3.0', '2850.00', '2850', '0.00', 'paid', '', '03/09/2016', '06/09/2016', 'checkout', '', 'wud84a7gpppg', 'Unpaid', 0, '21', '08/31/16', 2),
(14, '23', 167, '1.0', '650.00', '', '0.00', '600.00', '', '01/09/2016', '02/09/2016', 'checkin', '', 'yhfcvnbd05be', 'Unpaid', 50, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rooms`
--

CREATE TABLE IF NOT EXISTS `tb_rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=189 ;

--
-- Volcado de datos para la tabla `tb_rooms`
--

INSERT INTO `tb_rooms` (`roomID`, `name`, `description`, `category_id`, `location`, `status`) VALUES
(132, '301', 'Colonial', 1, 'upload/a1.jpg', 'Disponible'),
(133, '302', 'Rustico', 8, 'upload/suite familiar.jpg', 'Disponible'),
(134, '303', 'Rustico', 1, 'upload/suite familiar.jpg', 'Disponible'),
(135, '304', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(136, '305', 'Rustico', 2, 'upload/estandar doble .jpg', 'Disponible'),
(137, '306', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(138, '401', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(139, '402', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(140, '403', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(141, '404', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(142, '405', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(143, '406', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(144, '501', 'Rustico', 9, 'upload/suite familiar.jpg', 'Disponible'),
(145, '502', 'Rustico', 10, 'upload/estandar doble .jpg', 'Disponible'),
(146, '503', 'Rustico', 3, 'upload/suite familiar.jpg', 'Disponible'),
(147, '504', 'Rustico', 2, 'upload/suite junior.jpg', 'Disponible'),
(148, '505', 'Rustico', 1, 'upload/estandar doble .jpg', 'Disponible'),
(149, '506', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(150, '601', 'Rustico', 8, 'upload/suite familiar.jpg', 'Disponible'),
(151, '602', 'Rustico', 9, 'upload/suite familiar.jpg', 'Disponible'),
(152, '603', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(153, '604', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(154, '605', 'Rustico', 2, 'upload/suite familiar.jpg', 'Disponible'),
(155, '606', 'Rustico', 9, 'upload/suite junior.jpg', 'Disponible'),
(156, '701', 'Rustico', 9, 'upload/suite junior.jpg', 'Disponible'),
(157, '702', 'Rustico', 5, 'upload/suite junior.jpg', 'Disponible'),
(158, '703', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(159, '704', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(160, '705', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(161, '706', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(162, '801', 'Rustico', 8, 'upload/suite junior.jpg', 'Disponible'),
(163, '802', 'Rustico', 8, 'upload/suite junior.jpg', 'Disponible'),
(164, '803', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(165, '804', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(166, '805', 'Rustico', 3, 'upload/suite familiar.jpg', 'Disponible'),
(167, '806', 'Rustico', 1, 'upload/estandar king.jpg', 'Reserved'),
(168, '901', 'Rustico', 10, 'upload/suite familiar.jpg', 'Disponible'),
(169, '902', 'Rustico', 8, 'upload/suite junior.jpg', 'Disponible'),
(170, '903', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(171, '904', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(172, '905', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(173, '906', 'Rustico', 1, 'upload/estandar king.jpg', 'Disponible'),
(174, '1001', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(175, '1002', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(176, '1003', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(177, '1004', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(178, '1005', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(179, '1006', 'Moderna', 6, 'upload/ejecutiva king.jpg', 'Disponible'),
(180, '1007', 'Moderna', 6, 'upload/ejecutiva king.jpg', 'Disponible'),
(181, '1101', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(183, '1102', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(184, '1103', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(185, '1104', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(186, '1105', 'Moderna', 7, 'upload/ejecutiva doble.jpg', 'Disponible'),
(187, '1106', 'Moderna', 6, 'upload/ejecutiva king.jpg', 'Disponible'),
(188, '1107', 'Moderna', 6, 'upload/ejecutiva king.jpg', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `contact`) VALUES
(21, 'admin', 'df56627d1d9ee3b1110f35fa0721239f', 'Alejandro', 'Meza', '7224034932'),
(25, 'camba', '46e17f771da6ef78ab1614131bf4cbb1', 'Camba', 'Arriola', '0'),
(26, 'Nelly', 'e24749f49e22bcca248a039880226ba3', 'Nelly', 'Peres', '5530296142'),
(27, 'Guille', '2617fb524142a5cb45cfd6f0423f760f', 'Guillermina', 'laguna', '5530933939');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
