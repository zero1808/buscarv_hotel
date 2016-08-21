-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2016 a las 21:32:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `kingsfields_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
`category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `camas_kingsize` int(2) NOT NULL,
  `camas_matrimoniales` int(2) NOT NULL,
  `camas_individuales` int(2) NOT NULL,
  `no_adultos` int(2) NOT NULL,
  `no_ninios` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `camas_kingsize`, `camas_matrimoniales`, `camas_individuales`, `no_adultos`, `no_ninios`) VALUES
(1, 'Without window and without garage room', 0, 0, 0, 0, 0),
(2, 'Window side room without garage', 0, 0, 0, 0, 0),
(3, 'Vip room without Garage', 0, 0, 0, 0, 0),
(4, 'Vip room with garage', 0, 0, 0, 0, 0),
(5, 'Familiar', 0, 0, 0, 0, 0),
(6, 'HABITACION DOBLE', 0, 2, 0, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_discount`
--

CREATE TABLE IF NOT EXISTS `tb_discount` (
`id` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_discount`
--

INSERT INTO `tb_discount` (`id`, `name`, `price`) VALUES
(1, 'December Promo', 10),
(2, 'Valentines ', 15),
(3, '10%', 10),
(4, 'PAQUETE VERANO', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
`id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `action` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_history`
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
(29, 11, 'Login', '2014-02-27 14:52:12'),
(30, 11, 'Login', '2016-08-13 14:05:50'),
(31, 11, 'Login', '2016-08-13 14:07:16'),
(32, 11, 'Login', '2016-08-13 14:31:14'),
(33, 11, 'Login', '2016-08-14 14:58:02'),
(34, 11, 'Login', '2016-08-15 23:01:58'),
(35, 11, 'Login', '2016-08-16 15:12:07'),
(36, 11, 'Logout', '2016-08-16 15:14:05'),
(37, 11, 'Login', '2016-08-16 15:14:07'),
(38, 11, 'Logout', '2016-08-16 15:24:51'),
(39, 11, 'Login', '2016-08-16 15:26:37'),
(40, 11, 'Logout', '2016-08-16 15:32:56'),
(41, 11, 'Login', '2016-08-16 15:33:01'),
(42, 11, 'Login', '2016-08-16 15:33:32'),
(43, 19, 'Login', '2016-08-17 00:02:39'),
(44, 19, 'Login', '2016-08-17 00:03:11'),
(45, 19, 'Logout', '2016-08-17 00:03:17'),
(46, 11, 'Login', '2016-08-17 00:03:19'),
(47, 3, 'Logout', '2016-08-17 00:40:00'),
(48, 11, 'Login', '2016-08-17 00:40:03'),
(49, 11, 'Login', '2016-08-17 00:53:14'),
(50, 11, 'Logout', '2016-08-17 01:00:43'),
(51, 11, 'Login', '2016-08-17 01:00:45'),
(52, 11, 'Logout', '2016-08-17 01:01:41'),
(53, 11, 'Login', '2016-08-17 01:01:45'),
(54, 11, 'Logout', '2016-08-17 01:03:08'),
(55, 11, 'Login', '2016-08-17 01:03:11'),
(56, 11, 'Logout', '2016-08-17 01:03:32'),
(57, 19, 'Login', '2016-08-17 01:03:36'),
(58, 11, 'Login', '2016-08-17 19:09:59'),
(59, 11, 'Login', '2016-08-19 14:01:34'),
(60, 11, 'Logout', '2016-08-19 14:02:26'),
(61, 11, 'Login', '2016-08-20 20:57:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
`memberID` int(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact_number` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `zip` int(40) NOT NULL,
  `country` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_member`
--

INSERT INTO `tb_member` (`memberID`, `username`, `firstname`, `lastname`, `email`, `password`, `contact_number`, `address`, `zip`, `country`) VALUES
(1, 'zero1808', 'JONATHAN', 'CADENA', 'zero.leo1894@gmail.com', '619433a276dc6275ce2dd6a7041139f9', '7225859981', 'Hacienda 4 cienegas 32, Infonavit San Fr', 52176, ''),
(2, 'zero1894', 'CARLOS ', 'ESPINOSA', 'zero_leo1808@hotmail.com', '619433a276dc6275ce2dd6a7041139f9', '7222168129', 'Hacienda 4 cienegas 32, Infonavit San Fr', 52176, ''),
(3, 'zero9999', 'CESAR', 'CADENA', 'zero.leo1894@gmail.com', 'bf1188de768a5d0b461e7e1ee23578fe', '7222168129', 'Hacienda 4 cienegas 32, Infonavit San Fr', 52176, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
`id` int(15) NOT NULL,
  `memberID` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_orders`
--

CREATE TABLE IF NOT EXISTS `tb_orders` (
`id` int(15) NOT NULL,
  `memberID` int(15) NOT NULL,
  `productID` int(15) NOT NULL,
  `reserveID` int(15) NOT NULL,
  `excess_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_price`
--

CREATE TABLE IF NOT EXISTS `tb_price` (
`excess_id` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `prices` varchar(40) NOT NULL,
  `time` int(15) NOT NULL,
  `category_id` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_price`
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
-- Estructura de tabla para la tabla `tb_products`
--

CREATE TABLE IF NOT EXISTS `tb_products` (
`productID` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_products`
--

INSERT INTO `tb_products` (`productID`, `name`, `price`) VALUES
(1, 'Extra Foam', 100),
(3, 'Utensils', 20),
(4, 'Chippy', 20),
(5, 'Pepsi 8 oz', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reserve`
--

CREATE TABLE IF NOT EXISTS `tb_reserve` (
`reserveID` int(15) NOT NULL,
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
  `Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_reserve`
--

INSERT INTO `tb_reserve` (`reserveID`, `memberID`, `roomID`, `days_no`, `total`, `totalamount`, `partial`, `balance`, `excess_id`, `arrival`, `departure`, `status`, `request`, `transaction_code`, `modeofpayment`, `discount`, `Incharge`, `Date`) VALUES
(1, '', 88, '3.0', '3300.00', '', '330.00', '2970.00', '', '25/08/2016', '28/08/2016', 'cancel', '', 'cancel', '', 0, '', NULL),
(2, '2', 126, '3.0', '2970.00', '2673', '297.00', 'paid', '', '25/08/2016', '28/08/2016', 'checkout', 'NOTHING', 'rguud5o30zjm', 'Unpaid', 0, '11', '08/15/16'),
(3, '3', 99, '8.0', '8800.00', '', '880.00', '7920.00', '', '18/08/2016', '26/08/2016', 'reserved', '', 'vjsr6s0m8583', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rooms`
--

CREATE TABLE IF NOT EXISTS `tb_rooms` (
`roomID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(15) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_rooms`
--

INSERT INTO `tb_rooms` (`roomID`, `name`, `description`, `category_id`, `price`, `location`, `status`) VALUES
(100, '5', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(99, '3', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Reserved'),
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
(88, '2', 'Fully Aircondition', 1, 1100, 'upload/12795469_177260069321187_10704151786404326_n.jpg', 'Available'),
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
(126, '2', 'with aircon', 4, 990, 'upload/1.JPG', 'Available'),
(127, '999', 'HABITACION SENCILLA CON 1 CAMA', 1, 350, 'upload/volkswagen-up06.jpg', 'Available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `contact`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jonathan', 'Cadena', '09351585465'),
(19, 'monaliza', '827ccb0eea8a706c4c34a16891f84e7b', 'mona liza', 'falle', '9462561038'),
(17, 'awts', '5f4dcc3b5aa765d61d8327deb882cf99', 'hunter', 'michael', '3313134343'),
(16, 'SMC', '381f153a0e6e6dc7d3bf5dbef251b370', 'SMC', 'SMC', '921213131433');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_category`
--
ALTER TABLE `tb_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `tb_discount`
--
ALTER TABLE `tb_discount`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_history`
--
ALTER TABLE `tb_history`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_member`
--
ALTER TABLE `tb_member`
 ADD PRIMARY KEY (`memberID`);

--
-- Indices de la tabla `tb_message`
--
ALTER TABLE `tb_message`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_orders`
--
ALTER TABLE `tb_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_price`
--
ALTER TABLE `tb_price`
 ADD PRIMARY KEY (`excess_id`);

--
-- Indices de la tabla `tb_products`
--
ALTER TABLE `tb_products`
 ADD PRIMARY KEY (`productID`);

--
-- Indices de la tabla `tb_reserve`
--
ALTER TABLE `tb_reserve`
 ADD PRIMARY KEY (`reserveID`);

--
-- Indices de la tabla `tb_rooms`
--
ALTER TABLE `tb_rooms`
 ADD PRIMARY KEY (`roomID`);

--
-- Indices de la tabla `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_category`
--
ALTER TABLE `tb_category`
MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tb_discount`
--
ALTER TABLE `tb_discount`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_history`
--
ALTER TABLE `tb_history`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `tb_member`
--
ALTER TABLE `tb_member`
MODIFY `memberID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_message`
--
ALTER TABLE `tb_message`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_orders`
--
ALTER TABLE `tb_orders`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_price`
--
ALTER TABLE `tb_price`
MODIFY `excess_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tb_products`
--
ALTER TABLE `tb_products`
MODIFY `productID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_reserve`
--
ALTER TABLE `tb_reserve`
MODIFY `reserveID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_rooms`
--
ALTER TABLE `tb_rooms`
MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT de la tabla `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
