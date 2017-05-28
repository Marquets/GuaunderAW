-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2017 a las 17:03:38
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `guaunder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`ID` int(11) NOT NULL,
  `nick_ad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave_ad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE IF NOT EXISTS `intereses` (
  `ID` int(11) NOT NULL,
  `intereses_us` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Pasear'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matches_guau`
--

CREATE TABLE IF NOT EXISTS `matches_guau` (
  `us_like` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `us_target` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matches_guau`
--

INSERT INTO `matches_guau` (`us_like`, `us_target`) VALUES
('samgar01', 'victoria'),
('samgar01', 'hola'),
('victoria', 'samgar01'),
('prueba', 'samgar01'),
('samgar01', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`ID_MS` int(11) NOT NULL,
  `Destinatario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Remitente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Cuerpo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID_MS`, `Destinatario`, `Remitente`, `Cuerpo`, `fecha`) VALUES
(3, 'victoria', 'samgar01', 'Hola Victoria!!', '2017-05-28 00:00:00'),
(4, 'victoria', 'samgar01', 'Recibiste mi mensaje?\r\n\r\nGracias', '2017-05-28 00:00:00'),
(5, 'samgar01', 'victoria', 'Hola Samuel!', '2017-05-28 01:40:00'),
(6, 'samgar01', 'victoria', 'Qué tal?', '2017-05-28 01:41:00'),
(9, 'victoria', 'samgar01', 'Qué tal el finde??', '2017-05-28 01:41:34'),
(10, 'samgar01', 'prueba', 'Soy prueba', '2017-05-28 02:04:00'),
(11, 'samgar01', 'prueba', 'Y soy fantástico', '2017-05-28 02:04:10'),
(13, 'samgar01', 'victoria', 'Adoro los chicles', '2017-05-28 02:04:50'),
(16, 'victoria', 'samgar01', 'Lo mismo digo jajajaja', '2017-05-28 15:35:02'),
(20, 'prueba', 'samgar01', 'Yo sí que soy fantástico', '2017-05-28 16:04:19'),
(21, 'prueba', 'samgar01', 'Ey que pasa', '2017-05-28 16:17:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `ID` int(11) NOT NULL,
  `referencia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`ID` int(11) NOT NULL,
  `nick_us` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_us` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave_us` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade tu ubicación',
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `ult_conexion` datetime NOT NULL,
  `foto_perfil` varchar(90) COLLATE utf8_spanish_ci NOT NULL DEFAULT '"img/foto_defecto.jpg"',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade una descripción para que la gente te conozca más'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `nick_us`, `nombre_us`, `fecha_nacimiento`, `clave_us`, `ubicacion`, `email`, `fecha_creacion`, `ult_conexion`, `foto_perfil`, `descripcion`) VALUES
(11, 'victoria', 'daniel', '2017-05-26', '$2y$10$33oIlGZer8eSM0ScXt4NIO.ocMiP2rqEaJuxN6ofdpm2TjrxkxUP.', '', 'sdjf', '2017-05-26 00:00:00', '2017-05-26 00:00:00', '', ''),
(12, 'hola', 'dfas', '2017-05-26', '$2y$10$tzLUD8NK2xk0qmqNitY5tOMPcFbC5ZRA/73Qog8bulBl2wN1BOHJi', '', '123', '2017-05-26 00:00:00', '2017-05-26 00:00:00', '', ''),
(13, 'samgar01', 'Samuel', '1996-12-25', '$2y$10$fqtBgvg3Q106F2KO7dLkT.GCGlu.afaT02bW/D5YpnRRPIORYLVd6', '', 'samugarcia9696@gmail.com', '2017-05-28 00:00:00', '2017-05-28 00:00:00', '', ''),
(14, 'prueba', 'Prueba', '1990-05-10', '$2y$10$J5lAuWCojRm63bhz.ErHv.bb0AzxbIXCd4rg2yXQncoDlMBkTNe/W', '', 'prueba@gmail.com', '2017-05-28 02:01:55', '2017-05-28 02:01:55', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
 ADD PRIMARY KEY (`ID`,`intereses_us`);

--
-- Indices de la tabla `matches_guau`
--
ALTER TABLE `matches_guau`
 ADD KEY `like` (`us_like`), ADD KEY `target` (`us_target`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`ID_MS`), ADD KEY `Destinatario` (`Destinatario`), ADD KEY `Remitente` (`Remitente`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
 ADD PRIMARY KEY (`ID`,`referencia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `nick_us` (`nick_us`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
ADD CONSTRAINT `like` FOREIGN KEY (`us_like`) REFERENCES `usuario` (`nick_us`),
ADD CONSTRAINT `target` FOREIGN KEY (`us_target`) REFERENCES `usuario` (`nick_us`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`Destinatario`) REFERENCES `usuario` (`nick_us`),
ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`Remitente`) REFERENCES `usuario` (`nick_us`);

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
