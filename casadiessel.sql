-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2017 a las 19:47:27
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casadiessel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `foto_id_uindex` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

DROP TABLE IF EXISTS `maquinaria`;
CREATE TABLE IF NOT EXISTS `maquinaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `maquinaria_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`id`, `nombre`) VALUES
(1, 'Tracktores'),
(2, 'Botes'),
(3, 'Plantas Electricas'),
(4, 'Camiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  `caracteristicas` varchar(100) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `producto_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `codigo`, `descripcion`, `marca`, `idTipo`, `caracteristicas`, `referencia`) VALUES
(1, 'producto', '12312', '123123', '2121', 3, '5515', '5151'),
(3, 'prueba1234', 'codigo', 'asdlfjsdofl', '12345', 1, '12345', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_has_maquinaria`
--

DROP TABLE IF EXISTS `producto_has_maquinaria`;
CREATE TABLE IF NOT EXISTS `producto_has_maquinaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) DEFAULT NULL,
  `idMaquinaria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `producto_has_maquinaria_id_uindex` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rol_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `codigo`) VALUES
(1, 'Administrador total'),
(2, 'Administrador Ejecutivo'),
(3, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'tipo1'),
(2, 'tipo2'),
(3, 'tipo3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_id_uindex` (`id`),
  KEY `usuario_rol_id_fk` (`idRol`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `cedula`, `clave`, `idRol`) VALUES
(1, 'luis', 24995059, '12345', 1),
(2, 'juan123', 12345678, '12345', 2),
(7, 'polaco', 12345678, '12345', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
