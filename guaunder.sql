-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2017 a las 13:34:09
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guaunder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `ID` int(11) NOT NULL,
  `intereses_us` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Pasear'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matches_guau`
--

CREATE TABLE `matches_guau` (
  `us_like` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `us_target` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matches_guau`
--

INSERT INTO `matches_guau` (`us_like`, `us_target`) VALUES
('prueba', 'samgar01'),
('samgar01', 'rober'),
('rober', 'samgar01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID_MS` int(11) NOT NULL,
  `Destinatario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Remitente` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cuerpo` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID_MS`, `Destinatario`, `Remitente`, `Cuerpo`, `fecha`) VALUES
(10, 'samgar01', 'prueba', 'Soy prueba', '2017-05-28 02:04:00'),
(11, 'samgar01', 'prueba', 'Y soy fantástico', '2017-05-28 02:04:10'),
(20, 'prueba', 'samgar01', 'Yo sí que soy fantástico', '2017-05-28 16:04:19'),
(21, 'prueba', 'samgar01', 'Ey que pasa', '2017-05-28 16:17:24'),
(25, 'rober', 'samgar01', 'Hey rober, tienes perro ya?', '2017-05-29 16:54:13'),
(26, 'samgar01', 'rober', 'SÍÍÍÍÍÍ, tengo un mastín!!!', '2017-05-29 17:02:35'),
(27, 'samgar01', 'rober', 'Es muy bonitooooooo', '2017-05-29 17:11:36'),
(28, 'rober', 'samgar01', 'Que ñoño eres', '2017-05-31 13:28:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `ID` int(11) NOT NULL,
  `referencia` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `nick_us` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_us` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave_us` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade tu ubicación',
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `ult_conexion` datetime NOT NULL,
  `foto_perfil` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '"img/foto_defecto.jpg"',
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade una descripción para que la gente te conozca más'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `nick_us`, `nombre_us`, `fecha_nacimiento`, `clave_us`, `ubicacion`, `email`, `fecha_creacion`, `ult_conexion`, `foto_perfil`, `descripcion`) VALUES
(1, 'admin', '', '', '$2a$09$fMhDegELfCJyIJ1CinM4gOB2Z.1IQxU8LImg0h4UojYtuD78kJBK2', '', 'guaunderinfo@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(13, 'samgar01', 'Samuel', '1996-12-25', '$2y$10$fqtBgvg3Q106F2KO7dLkT.GCGlu.afaT02bW/D5YpnRRPIORYLVd6', 'Sitges', 'samugarcia9696@gmail.com', '2017-05-28 00:00:00', '2017-05-29 16:54:23', '\"img/DSC00130.JPG\"', 'Soy divino'),
(14, 'prueba', 'Prueba', '1990-05-10', '$2y$10$J5lAuWCojRm63bhz.ErHv.bb0AzxbIXCd4rg2yXQncoDlMBkTNe/W', 'Vigo', 'prueba@gmail.com', '2017-05-28 02:01:55', '2017-05-28 02:01:55', '\"img/foto_defecto.jpg\"', 'holahola'),
(15, 'rober', 'Roberto', '1997-10-12', '$2y$10$r22TGZk7EyAN2CD1EUAlbuKlwGU.0KnvudubMGQ.eMna/8BaOrLo2', 'Matalascañas, Murcia', 'rober14@gmail.com', '2017-05-28 21:48:32', '2017-05-29 17:49:46', '\"img/foto_defecto.jpg\"', 'aloha'),
(17, 'alvaro', 'Alvaro', '1995-02-10', '$2y$10$5QT7eo/Hhl4cZdHUrUe0Cu4a62CbYmLj5MrF0nzkmxWgd5AlV3uMW', 'Las Rosas', 'alvaro@gmail.com', '2017-05-28 22:01:36', '2017-05-28 22:01:36', '\"img/foto_defecto.jpg\"', ''),
(18, 'ayoub', 'Ayoub', '1995-01-12', '$2y$10$qGDkP6LvI5X.KfdhKMsj4.NWKhn5l4CpZl/B.umfjVchNb1RiB.aC', 'Añade tu ubicación', 'ayoub@ucm.es', '2017-05-29 10:53:07', '2017-05-29 11:15:19', '\"img/foto_defecto.jpg\"', 'Añade una descripción para que la gente te conozca más'),
(20, 'samuprueba', 'Samuprueba', '2001-03-30', '$2y$10$ad4z.DSE2QrR9W1ViGVCqOrhJRUVD7LiDuAm6A3mNXdnEVNCcjLn6', 'Añade tu ubicación', 'samugarcia@yahoo.es', '2017-05-31 07:30:20', '2017-05-31 07:32:13', '\"img/foto_defecto.jpg\"', 'Añade una descripción para que la gente te conozca más');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`ID`,`intereses_us`);

--
-- Indices de la tabla `matches_guau`
--
ALTER TABLE `matches_guau`
  ADD KEY `like` (`us_like`),
  ADD KEY `target` (`us_target`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID_MS`),
  ADD KEY `Destinatario` (`Destinatario`),
  ADD KEY `Remitente` (`Remitente`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`ID`,`referencia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nick_us` (`nick_us`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `intereses_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `matches_guau`
--
ALTER TABLE `matches_guau`
  ADD CONSTRAINT `like` FOREIGN KEY (`us_like`) REFERENCES `usuario` (`nick_us`) ON DELETE CASCADE,
  ADD CONSTRAINT `target` FOREIGN KEY (`us_target`) REFERENCES `usuario` (`nick_us`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`Destinatario`) REFERENCES `usuario` (`nick_us`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`Remitente`) REFERENCES `usuario` (`nick_us`) ON DELETE CASCADE;

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
