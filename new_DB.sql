-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-01-2020 a las 01:22:14
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testchk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(300) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `autor` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `mensaje`, `estado`, `autor`, `fecha`) VALUES
(1, 'Nueva actualizacion', 1, 'JKDev', '2019-08-04 05:36:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_key`
--

DROP TABLE IF EXISTS `tcp_key`;
CREATE TABLE IF NOT EXISTS `tcp_key` (
  `id_key` int(255) NOT NULL AUTO_INCREMENT,
  `tcpKey` varchar(13) NOT NULL,
  `creado` datetime NOT NULL,
  `recKey` varchar(2) NOT NULL,
  `admKey` varchar(15) NOT NULL,
  `tipKey` varchar(12) NOT NULL,
  `iplKey` varchar(255) NOT NULL,
  PRIMARY KEY (`id_key`),
  UNIQUE KEY `tcp_key` (`tcpKey`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcp_key`
--

INSERT INTO `tcp_key` (`id_key`, `tcpKey`, `creado`, `recKey`, `admKey`, `tipKey`, `iplKey`) VALUES
(1, 'TCP-sWZ-lQa', '2019-08-09 08:21:01', '1', 'JkDev', 'Premium', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `key_tcp` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` varchar(7) NOT NULL,
  `creditos` varchar(16) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `genBy` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `expireAcc` varchar(20) NOT NULL,
  `myIP` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `key_tcp` (`key_tcp`),
  KEY `email` (`email`),
  KEY `login` (`password`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `key_tcp`, `password`, `level`, `creditos`, `picture`, `genBy`, `descripcion`, `created`, `expireAcc`, `myIP`) VALUES
(5, 'JKDev', 'jkdev@gmail.com', 'TCP-123-456', 'f6de7dae85dded412831f3496510a664', '5', '100', '', '', 'salame', '2018-05-05', '', ''),
(12, 'Cleverson\r\n', 'Wayne6498@jkdev.com', 'TCP-niq-7aP', '7658065a36297fbf007ef735e3c4d84f', '0', '0', '', 'JKDev', '', '2020-01-05', '2020-01-24', ''),
(20, 'Jheniffa\r\n', 'Vanilza8108@jkdev.com', 'TCP-kgR-Nyz', 'e60d1ebec5f3e7d082cb091cceaa04dd', '6', '0', '', 'JKDev', '', '2020-01-06', '2020-01-15', ''),
(32, 'Sueny\r\n', 'Grecia1893@jkdev.com', 'TCP-eb5-6Mg', '7bdae741115873db2155859f5f9f5430', '0', '0', '', 'JKDev', '', '2020-01-22', '', ''),
(33, 'Deyvis\r\n', 'Sevora6233@jkdev.com', 'TCP-4NR-3RH', '6f2aaae362675164f101cfa0fd0f3df8', '0', '100', '', 'JKDev', '', '2020-01-22', '', '::1'),
(34, 'Christine\r\n', 'Elveston5967@jkdev.com', 'TCP-5NF-7if', '33587fce7a8dcb346514701a43d663ab', '0', '100', '', '', '', '2020-01-22', '', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
