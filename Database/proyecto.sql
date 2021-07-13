-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2021 a las 19:43:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `producto` tinytext NOT NULL,
  `stock` int(11) NOT NULL,
  `valor_unidad` decimal(16,2) NOT NULL,
  `valor_total` decimal(16,2) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `producto`, `stock`, `valor_unidad`, `valor_total`, `fecha_registro`) VALUES
(2, '1234', 'superricas', 5, '700.00', '3500.00', '0000-00-00 00:00:00'),
(3, '65456', 'dulcesitos', 24, '200.00', '4800.00', '0000-00-00 00:00:00'),
(4, '888888', 'yogurt', 5, '2000.00', '10000.00', '0000-00-00 00:00:00'),
(5, '66666', 'paletas', 87, '400.00', '34800.00', '0000-00-00 00:00:00'),
(6, '25252', 'gomas', 24, '1500.00', '36000.00', '0000-00-00 00:00:00'),
(7, '5555', 'papel', 100, '100.00', '10000.00', '2021-07-13 06:41:44'),
(8, '897879', 'pegante', 5, '1800.00', '9000.00', '2021-07-13 11:42:52'),
(9, '555332', 'cartulina', 6, '200.00', '1200.00', '2021-07-13 11:53:59'),
(10, '555333', 'cartulina', 14, '200.00', '2800.00', '2021-07-13 11:54:38'),
(11, '987555', 'escarcha', 7, '500.00', '3500.00', '2021-07-13 11:56:02'),
(13, '584848', 'papel carton', 30, '500.00', '6000.00', '2021-07-13 12:20:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
