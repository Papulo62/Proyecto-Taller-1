-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2025 a las 22:16:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `activo`) VALUES
(1, 'Running', 1),
(2, 'skate', 1),
(3, 'Retro', 1),
(4, 'Futbol', 1),
(5, 'Basketball', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `consulta` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `nombre`, `apellido`, `email`, `consulta`, `created_at`) VALUES
(1, 'Antonio', 'Coronel', 'antoniocoronel368@gmail.com', 'holaaaaa', '2025-06-01 00:00:56'),
(2, 'Antonio', 'Coronel', 'antoniocoronel368@gmail.com', 'nose como se usa la pagina', '2025-06-19 21:59:10'),
(3, 'Antonio', 'Coronel', 'antoniocoronel368@gmail.com', 'se puede comprar con tarjeta de credito?', '2025-06-26 19:00:57'),
(4, 'BRUNNA', 'RADAELLI', 'antoniocoronel3698@gmail.com', 'Hola como me registro en la pagina', '2025-06-26 20:03:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `producto_talle_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtototal` float NOT NULL,
  `precio_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `producto_talle_id`, `pedido_id`, `cantidad`, `subtototal`, `precio_unitario`) VALUES
(17, 45, 14, 1, 150000, 150000),
(18, 52, 14, 1, 30000, 30000),
(19, 31, 15, 2, 12000, 6000),
(20, 52, 16, 1, 30000, 30000),
(21, 31, 16, 2, 12000, 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `activo`) VALUES
(1, 'Puma', 0),
(2, 'Adidas', 0),
(3, 'Topper', 1),
(4, 'Ringo', 1),
(5, 'NIKE', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` enum('Efectivo','Mecado pago','Tarjeta de credito','Tarjeta de debito') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `direccion` varchar(150) NOT NULL,
  `dni` int(11) NOT NULL,
  `localidad` varchar(150) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `altura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `usuario_id`, `total`, `metodo_pago`, `created_at`, `direccion`, `dni`, `localidad`, `codigo_postal`, `altura`) VALUES
(14, 8, 180000, 'Efectivo', '2025-06-26 19:44:18', 'Sarmiento ', 44198175, 'Santa Rosa', 3421, 127),
(15, 8, 12000, 'Tarjeta de credito', '2025-06-26 19:44:53', 'Sarmiento 127', 44198175, 'Santa Rosa', 3421, 127),
(16, 10, 42000, 'Efectivo', '2025-06-26 19:47:30', 'Sarmiento', 44198176, 'Santa Rosa', 3421, 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Niños') DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `categoria_id`, `created_at`, `updated_at`, `genero`, `marca_id`, `activo`) VALUES
(25, 'zapatilla adidas', 'zapatilla de runnng', '1749232692_5dd2d4b56251d48dc7b6.png', 6000, 2, '2025-06-05 14:01:02', NULL, 'Masculino', 4, 1),
(26, 'zapatilla de runnig 12', 'zapatilla de running', '1749132992_5af33fde51206522e10c.png', 40000, 1, '2025-06-05 14:01:49', NULL, 'Masculino', 4, 1),
(27, 'zapatilla de running boston 11', 'zapatilla de running', '1749132952_ad06a215b1d770bad42b.png', 150000, 1, '2025-06-05 14:02:44', NULL, 'Masculino', 4, 0),
(28, 'adidas 11', 'zapatilla de running', '1749232719_4f4b14cf635be63023e1.png', 4000, 1, '2025-06-05 14:15:22', NULL, 'Masculino', 4, 0),
(29, 'zapatilla de vestir 20', 'zapatilla de vestir', '1749132952_ad06a215b1d770bad42b.png', 40000, 1, '2025-06-05 14:15:52', NULL, 'Masculino', 4, 0),
(30, 'adidas', 'zapatilla adidas', '1749132992_5af33fde51206522e10c.png', 400000, 1, '2025-06-05 14:16:32', NULL, 'Masculino', 4, 0),
(31, 'zapatilla deportiva', 'zapatilla', '1749133451_768d75dce38d7b6d5aca.png', 400000, 1, '2025-06-05 14:24:11', NULL, 'Masculino', 4, 0),
(32, 'zapatilla de running', 'zapatilla de running 10', '1749133504_c29e2d9c81e283ab4c60.png', 150000, 1, '2025-06-05 14:25:04', NULL, 'Masculino', 4, 0),
(33, 'huiuhuiuh', 'ygyuguy', '1750909896_381bdb94a701bd60d3fc.jpg', 3300, 2, '2025-06-06 18:10:17', NULL, 'Masculino', 3, 0),
(34, 'Zapatilla adidas Duramo 11', 'Zapatilla de running', '1749496979_07426d2202669ee2a9db.png', 150000, 1, '2025-06-09 19:22:59', NULL, 'Femenino', 4, 0),
(35, 'Zapatilla adidas Duramo 11', 'Zapatilla de running', '1749497092_1270ea6aeaab695838ac.png', 150000, 2, '2025-06-09 19:24:52', NULL, 'Femenino', 4, 1),
(36, 'zapatilla de running 50', 'zapatilla para uso deportivo', '1749739911_f91a97fd9ca380c28a26.png', 4000000, 1, '2025-06-12 14:51:52', NULL, 'Masculino', 4, 0),
(37, 'zapatilla para uso ocasional', 'zapatilla barata', '1750289645_37c81847c39b26e86c41.png', 400000, 3, '2025-06-18 23:34:05', NULL, 'Masculino', 4, 0),
(38, 'botines', 'botin', '1750375460_119d9fd53e10d12b02aa.png', 30000, 4, '2025-06-19 23:24:20', NULL, 'Masculino', 4, 1),
(39, 'zapatilla de uso comun', 'zapatilla', '1750375920_5f4ce8691ff064cc40f4.jpg', 4000, 3, '2025-06-19 23:32:00', NULL, 'Masculino', 4, 0),
(40, 'zapatilla de uso comun', 'zapatilla', '1750376288_2d27f253d2e84d65aec5.jpg', 4000, 3, '2025-06-19 23:38:08', NULL, 'Masculino', 4, 0),
(41, 'zapatilla de uso comun', 'zapatilla', '1750376294_5df3633bd8741a041fc6.jpg', 4000, 3, '2025-06-19 23:38:15', NULL, 'Masculino', 4, 0),
(42, 'zapatilla de uso comun', 'zapatilla', '1750376299_0b71eede4b2fc4328222.jpg', 4000, 3, '2025-06-19 23:38:19', NULL, 'Masculino', 4, 0),
(43, 'zapatilla de uso domestico', 'zapatilla', '1750376339_399bad250d99479c7ed8.jpg', 4000, 4, '2025-06-19 23:39:00', NULL, 'Masculino', 4, 0),
(44, 'zapatilla de uso domestico', 'zapatilla', '1750376404_38bb97e26cd06ba8564b.jpg', 4000, 4, '2025-06-19 23:40:04', NULL, 'Masculino', 4, 0),
(45, 'zapatilla de uso domestico', 'zapatilla', '1750376404_38bb97e26cd06ba8564b.jpg', 4000, 4, '2025-06-19 23:40:04', NULL, 'Masculino', 4, 0),
(46, 'zapatilla de uso domestico', 'zapatilla', '1750376649_d5af71e99e80e45570dc.jpg', 4000, 4, '2025-06-19 23:44:09', NULL, 'Masculino', 4, 0),
(47, 'zapatilla de futbol', 'futbol', '1750934552_9ae572f9cddc5de2297b.jpg', 400000, 4, '2025-06-26 10:42:32', NULL, 'Niños', 4, 0),
(48, 'Zapatilla casual', 'zapatilla', '1750967422_b04f8bee59b087bbccf7.png', 80000, 4, '2025-06-26 19:50:22', NULL, 'Femenino', 4, 1),
(49, 'Zapatilla para niño', 'zapatilla', '1750967485_b6f173aa5d173c3dcbfe.png', 40000, 2, '2025-06-26 19:51:25', NULL, 'Niños', 3, 1),
(50, 'zapatilla para niños barata', 'zapatilla', '1750967552_6ab054c1a935db866f45.png', 40000, 2, '2025-06-26 19:52:32', NULL, 'Niños', 4, 1),
(51, 'zapatilla para mujer', 'zapatilla para dama', '1750967626_56c4a97e3d1129a2fa85.png', 40000, 1, '2025-06-26 19:53:46', NULL, 'Femenino', 3, 1),
(52, 'Zapatilla deportiva para mujer', 'zapatilla para mujer', '1750967669_6c15206d9a479b78416c.png', 30000, 1, '2025-06-26 19:54:29', NULL, 'Femenino', 4, 1),
(53, 'zapatilla de mujer deportiva barata', 'zapatilla barata', '1750967842_b50b7cb841dfb543433e.png', 400000, 1, '2025-06-26 19:57:22', NULL, 'Femenino', 4, 1),
(54, 'zapatilla adidas galaxy mujer', 'zapatilla de running mujer', '1750967904_483085a9d2ea0f60f357.png', 4000000, 1, '2025-06-26 19:58:24', NULL, 'Femenino', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_talle`
--

CREATE TABLE `producto_talle` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `talle` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_talle`
--

INSERT INTO `producto_talle` (`id`, `producto_id`, `talle`, `stock`, `activo`) VALUES
(31, 25, 40, 9, 1),
(32, 25, 45, 0, 1),
(33, 26, 23, 1, 1),
(34, 27, 40, 3, 0),
(35, 27, 33, 1, 0),
(36, 28, 20, 2, 0),
(37, 29, 40, 0, 0),
(38, 30, 30, 6, 1),
(39, 30, 40, 4, 1),
(40, 31, 40, 20, 1),
(41, 32, 40, 4, 0),
(42, 32, 33, 6, 0),
(43, 33, 40, 434, 0),
(44, 35, 30, 1, 1),
(45, 35, 39, 1, 1),
(46, 35, 40, 5, 1),
(47, 36, 30, 45, 1),
(50, 37, 43, 10, 0),
(51, 38, 23, 1, 1),
(52, 38, 40, 1, 1),
(53, 47, 40, 1, 0),
(54, 48, 39, 10, 1),
(55, 48, 40, 30, 1),
(56, 48, 45, 20, 1),
(57, 49, 35, 20, 1),
(58, 50, 34, 20, 1),
(59, 50, 36, 20, 1),
(60, 51, 37, 20, 1),
(61, 51, 40, 5, 1),
(62, 52, 40, 5, 1),
(63, 53, 40, 20, 1),
(64, 54, 39, 12, 1),
(65, 54, 40, 27, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `contraseña`, `direccion`, `rol_id`, `activo`, `created_at`, `updated_at`) VALUES
(3, 'Antonio', 'Coronel', 'antoniocoronel368@gmail.com', '$2y$10$qonNaU8o4b4/rzDAbNV2SOGW7v1O1.W4o7pqXIUQqT81QBGLfzyJq', 'Sarmiento 1230', 2, 1, '2025-05-24 15:10:47', NULL),
(8, ' pablo', 'perez', 'brunoperez700@gmail.com', '$2y$10$jPRA8dGZx0N18vEEIRpQSu.6y2dUZFiACuVjzheQjS64o/3B4szye', 'jr vidal 16176', 1, 1, '2025-05-29 23:48:58', NULL),
(10, 'Gonzalo', 'perez', 'antoniocoronel367@gmail.com', '$2y$10$B.wRp0gnfpFnhX.u.mkM9eBRCice3I4sEMF0irNslrbXLRwnaaigy', 'Rio 456', 1, 1, '2025-06-26 11:55:13', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_pedido_producto_talle` (`producto_talle_id`),
  ADD KEY `fk_detalle_pedido_pedido` (`pedido_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`),
  ADD KEY `fk_producto_marca` (`marca_id`);

--
-- Indices de la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_talle_producto` (`producto_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario_email` (`email`),
  ADD UNIQUE KEY `uq_usuario_password` (`contraseña`),
  ADD KEY `fk_usuario_rol` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fk_detalle_pedido_producto_talle` FOREIGN KEY (`producto_talle_id`) REFERENCES `producto_talle` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_producto_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  ADD CONSTRAINT `fk_producto_talle_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
