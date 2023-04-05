-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2021 a las 17:30:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pac3_daw`
--
CREATE DATABASE IF NOT EXISTS `pac_dwes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pac_dwes`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'PANTALÓN'),
(2, 'CAMISA'),
(3, 'JERSEY'),
(4, 'CHAQUETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `cost`, `price`, `category_id`) VALUES
(1, 'Loop 501 Talla S', '100.00', '125.00', 1),
(2, 'Loop 501 Talla M', '100.00', '125.00', 1),
(3, 'Loop Talla S', '25.00', '30.00', 2),
(4, 'Loop Talla M', '25.00', '30.00', 2),
(5, 'Jersey Rojo Talla S', '100.00', '110.00', 3),
(6, 'Jersey Rojo Talla S', '100.00', '150.00', 3),
(7, 'Jersey Verde Talla S', '100.00', '150.00', 3),
(8, 'Jersey Verde Talla M', '100.00', '150.00', 3),
(9, 'Jersey Rojo Talla M', '100.00', '150.00', 3),
(10, 'Trousers Blue Talla S', '200.00', '225.00', 1),
(11, 'Trousers Blue Talla M', '200.00', '225.00', 1),
(12, 'Trousers Red Talla S', '200.00', '225.00', 1),
(13, 'Trousers Red Talla M', '200.00', '225.00', 1),
(14, 'Trousers Red Talla L', '200.00', '225.00', 1),
(15, 'Trousers Red Talla XL', '200.00', '225.00', 1),
(16, 'Trousers Green Talla S', '200.00', '225.00', 1),
(17, 'Trousers Green Talla M', '200.00', '225.00', 1),
(18, 'Trousers Green Talla L', '200.00', '225.00', 1),
(19, 'Trousers Green Talla XL', '200.00', '225.00', 1),
(20, 'Jacket Green Talla S', '200.00', '225.00', 1),
(21, 'Jacket Green Talla M', '200.00', '225.00', 1),
(22, 'Jacket Green Talla L', '200.00', '225.00', 1),
(23, 'Jacket Green Talla XL', '200.00', '225.00', 1),
(24, 'Jacket Red Talla S', '200.00', '225.00', 1),
(25, 'Jacket Red Talla M', '200.00', '225.00', 1),
(26, 'Jacket Red Talla L', '200.00', '225.00', 1),
(27, 'Jacket Red Talla XL', '200.00', '225.00', 1),
(28, 'Camisa Purple Talla S', '50.00', '75.00', 2),
(29, 'Camisa Purple Talla M', '50.00', '75.00', 2),
(30, 'Camisa Purple Talla L', '50.00', '75.00', 2),
(31, 'Camisa Purple Talla XL', '50.00', '75.00', 2),
(32, 'Camisa Ivory Talla S', '50.00', '75.00', 2),
(33, 'Camisa Ivory Talla M', '50.00', '75.00', 2),
(34, 'Camisa Ivory Talla L', '50.00', '75.00', 2),
(35, 'Camisa Ivory Talla XL', '50.00', '75.00', 2),
(36, 'Camisa Iris Talla S', '50.00', '75.00', 2),
(37, 'Camisa Iris Talla M', '50.00', '75.00', 2),
(38, 'Camisa Iris Talla L', '50.00', '75.00', 2),
(39, 'Camisa Iris Talla XL', '50.00', '75.00', 2),
(40, 'Camisa Indigo Talla S', '50.00', '75.00', 2),
(41, 'Camisa Indigo Talla M', '50.00', '75.00', 2),
(42, 'Camisa Indigo Talla L', '50.00', '75.00', 2),
(43, 'Camisa Indigo Talla XL', '50.00', '75.00', 2),
(44, 'Jacket Beige S', '200.00', '250.00', 4),
(45, 'Jacket Beige M', '200.00', '250.00', 4),
(46, 'Jacket Beige L', '200.00', '250.00', 4),
(47, 'Jacket Beige XL', '200.00', '250.00', 4),
(48, 'Jacket Coral S', '200.00', '250.00', 4),
(49, 'Jacket Coral M', '200.00', '250.00', 4),
(50, 'Jacket Coral L', '200.00', '250.00', 4),
(51, 'Jacket Coral XL', '200.00', '250.00', 4),
(52, 'Jacket Cyan S', '200.00', '250.00', 4),
(53, 'Jacket Cyan M', '200.00', '250.00', 4),
(54, 'Jacket Cyan L', '200.00', '250.00', 4),
(55, 'Jacket Cyan XL', '200.00', '250.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `enabled` int not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `full_name`, `enabled`) VALUES
(1, 'Herman@suite.com', 'Herman Finn', 0),
(2, 'Adam@smith.com', 'Adam Smith', 1),
(3, 'jack@blue.com', 'Jack Blue', 0),
(4, 'William@Foo.com', 'William Defoe', 0),
(5, 'Burt@Feynolds.com', 'Burt Feynolds', 0),
(6, 'Martin@outlook.es', 'Martin King', 0),
(7, 'John@microsoft.com', 'John Atbukle', 0),
(8, 'Catherine@redhat.com', 'Catherine Duck', 1),
(9, 'Edmundo@linux.com', 'Edmundo Valdés', 0),
(10,'Terry@linux.com', 'Terry Hatchet', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setup`
--

CREATE TABLE `setup` (
  `host` varchar(50) NOT NULL,
  `management` int(11) NOT NULL,
  `superadmin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `setup`
--

INSERT INTO `setup` (`host`, `management`, `superadmin_id`) VALUES
('localhost', 1, 3);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PRODUCT_CATEGORY_CATEGORY` (`category_id`);

--
-- Indices de la tabla `setup`
--
ALTER TABLE `setup`
  ADD KEY `SuperAdmin` (`superadmin_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY_CATEGORY` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `setup`
--
ALTER TABLE `setup`
  ADD CONSTRAINT `setup_ibfk_1` FOREIGN KEY (`superadmin_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
