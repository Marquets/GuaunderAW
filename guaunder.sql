-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2017 a las 14:17:28
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `nick_ad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave_ad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `ID` int(11) NOT NULL,
  `intereses_us` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matches_guau`
--

CREATE TABLE `matches_guau` (
  `us_like` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `us_target` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `super_like` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID_MS` int(11) NOT NULL,
  `Destinatario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Remitente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Cuerpo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `ID` int(11) NOT NULL,
  `referencia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `nick_us` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_us` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave_us` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade tu ubicación',
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `ult_conexion` date NOT NULL,
  `foto_perfil` varchar(90) COLLATE utf8_spanish_ci NOT NULL DEFAULT '"img/foto_defecto.jpg"',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Añade una descripción para que la gente te conozca más'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `nick_us`, `nombre_us`, `fecha_nacimiento`, `clave_us`, `ubicacion`, `email`, `fecha_creacion`, `ult_conexion`, `foto_perfil`, `descripcion`) VALUES
(11, 'victoria', 'daniel', '2017-05-26', '$2y$10$33oIlGZer8eSM0ScXt4NIO.ocMiP2rqEaJuxN6ofdpm2TjrxkxUP.', '', 'sdjf', '2017-05-26', '2017-05-26', '', ''),
(12, 'hola', 'dfas', '2017-05-26', '$2y$10$tzLUD8NK2xk0qmqNitY5tOMPcFbC5ZRA/73Qog8bulBl2wN1BOHJi', '', '123', '2017-05-26', '2017-05-26', '', '');

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
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
