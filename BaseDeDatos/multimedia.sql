-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2021 a las 04:22:44
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multimedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivo`
--

CREATE TABLE `t_archivo` (
  `idArchivo` int(11) NOT NULL,
  `idCarpeta` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `rutaImgVideo` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_carpeta`
--

CREATE TABLE `t_carpeta` (
  `idCarpeta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_carpeta`
--

INSERT INTO `t_carpeta` (`idCarpeta`, `idUsuario`, `nombre`, `fecha`) VALUES
(80, 1, 'Shingeki', '2021-01-26 00:13:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`idUsuario`, `nombre`, `contraseña`, `fecha`) VALUES
(1, 'Alex', 'ce5d1a70b3905354625096ecf6effe6e', '2021-01-03 13:08:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_archivo`
--
ALTER TABLE `t_archivo`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `fkIdCarpeta_idx` (`idCarpeta`);

--
-- Indices de la tabla `t_carpeta`
--
ALTER TABLE `t_carpeta`
  ADD PRIMARY KEY (`idCarpeta`),
  ADD KEY `fkIdUsuario_idx` (`idUsuario`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_archivo`
--
ALTER TABLE `t_archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2042;

--
-- AUTO_INCREMENT de la tabla `t_carpeta`
--
ALTER TABLE `t_carpeta`
  MODIFY `idCarpeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_archivo`
--
ALTER TABLE `t_archivo`
  ADD CONSTRAINT `fkIdCarpeta` FOREIGN KEY (`idCarpeta`) REFERENCES `t_carpeta` (`idCarpeta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_carpeta`
--
ALTER TABLE `t_carpeta`
  ADD CONSTRAINT `fkIdUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `t_usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
