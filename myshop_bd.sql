-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 16:34:52
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Bill Gates', 'bill.gates@microsoft.com', '+123456789', 'New York, USa', '2023-12-08 18:57:51'),
(2, 'Elon Musk', 'elon.musk@spacex.com', '+111222333', 'Florida, USA', '2023-12-08 18:57:51'),
(3, 'Will Smith', 'will.smith@gmail.com', '+111333555', 'California, USA', '2023-12-08 18:57:51'),
(4, 'Bob Marley', 'bob@gmail.com', '+111555999', 'Texas, USA', '2023-12-08 18:57:51'),
(5, 'Lionel Messi', 'Messi@gmail.com', '+32447788993', 'Manchester, England', '2023-12-08 18:57:51'),
(6, 'Boris Johnson', 'boris.johnson@gmail.com', '+4499778855', 'London, England', '2023-12-08 18:57:51'),
(8, 'fidel', 'croquitos@hmail.com', '11225566', 'royal can', '2023-12-08 23:58:04'),
(18, 'fidelllll', 'croquitosssss@hmail.com', '11225566', '555555', '2023-12-09 13:37:29'),
(19, 'Ariel ', 'am@hotmail.com', '6567', 'El-Prats, Barcelona', '2023-12-09 14:01:23'),
(20, 'Fidel', 'Fidel@gmail.com', '55666666', 'Malaga, espaÃ±a', '2023-12-11 11:10:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
