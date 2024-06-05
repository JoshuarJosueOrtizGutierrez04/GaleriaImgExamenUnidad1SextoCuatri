-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-06-2024 a las 00:56:32
-- Versión del servidor: 10.5.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id22240670_galeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_compra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `nombre_usuario`, `plan`, `metodo_pago`, `fecha_compra`) VALUES
(1, 'holaa444', 'VIP', 'PayPal', '2024-06-03 23:17:49'),
(2, 'holaa444', 'Premium', 'PayPal', '2024-06-04 00:05:28'),
(3, 'holaa444', 'VIP', 'PayPal', '2024-06-04 00:12:31'),
(4, 'holaa444', 'Premium', 'PayPal', '2024-06-04 00:22:44'),
(5, 'holaa444', 'VIP', 'Tarjeta de Crédito o Débito', '2024-06-04 00:41:45'),
(6, 'josue30', 'VIP', 'PayPal', '2024-06-04 15:19:32'),
(7, 'hola200kk', 'Premium', 'Tarjeta de Crédito o Débito', '2024-06-05 00:02:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_subida` date NOT NULL,
  `vistas` int(11) DEFAULT 0,
  `subido_por` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `descripcion`, `fecha_subida`, `vistas`, `subido_por`) VALUES
(22, '665e4713aac74_1.jpg', 'guapo', '2024-06-03', 4, 'holaa444'),
(23, '665e47252b921_tigre.jpg', 'gracias', '2024-06-03', 2, 'holaa444'),
(24, '665e47535627c_0.jpg', 'la crack', '2024-06-03', 1, 'holaa444'),
(25, '665e576743534_1.jpg', 'ffff', '2024-06-03', 0, 'holaa444'),
(26, '665e5a2b6e3eb_miami.jpg', 'gggg', '2024-06-04', 0, 'holaa444'),
(27, '665e5e36af969_miami.jpg', 'gggh', '2024-06-04', 2, 'holaa444'),
(28, '665e609aaf4d1_lakers2.jpg', 'ggg', '2024-06-04', 0, 'holaa444'),
(29, '665f30aa49476_tigre.jpg', 'hhh', '2024-06-04', 2, 'josue30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `plan_actual` varchar(50) DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `email`, `contraseña`, `fecha_registro`, `plan_actual`) VALUES
('holaprueba22', 'hola2222@gmail.com', 'josueguapo', '2024-05-29 23:42:04', 'Premium'),
('josue30', 'josue30@gmail.com', '123456', '2024-06-01 22:57:07', 'VIP'),
('josue34', 'josue33@gmail.com', '1234', '2024-06-01 22:53:09', 'NOT NULL'),
('josue3033', 'josue44@gmail.com', '12345 ', '2024-06-02 04:12:43', 'NOT NULL'),
('josue ortiz', 'josueort111@gmail.com', '1234', '2024-05-22 01:45:59', 'NOT NULL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
