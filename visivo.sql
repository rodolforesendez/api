-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2016 a las 07:42:41
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `visivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategorias` int(255) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `categoria`) VALUES
(1, 'Autos'),
(2, 'Bienes Raices'),
(3, 'Bolsa de Empleo'),
(4, 'Comidas'),
(5, 'Compra - Venta'),
(6, 'Fiestas'),
(7, 'Salud'),
(8, 'Servicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `idimagenes` int(255) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(255) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`idimagenes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idpublicaciones` int(255) NOT NULL AUTO_INCREMENT,
  `idusuario` int(255) NOT NULL,
  `idcategoria` int(255) NOT NULL,
  `idsubcategoria` int(255) NOT NULL,
  `hora` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `likes` int(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`idpublicaciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpublicaciones`, `idusuario`, `idcategoria`, `idsubcategoria`, `hora`, `titulo`, `descripcion`, `likes`, `imagen`) VALUES
(1, 1, 1, 1, '1452234467749', 'prueba', 'descripcion', 10, 'img/sample_images/posts/business/1.jpg'),
(2, 1, 1, 1, '1452234467749', 'titulonumero 2', 'descripcion numero 2', 5, 'img/sample_images/posts/business/2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `idsubcategorias` int(255) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(255) NOT NULL,
  `subcategoria` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idsubcategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`idsubcategorias`, `idcategoria`, `subcategoria`, `imagen`) VALUES
(1, 1, 'Automoviles', 'img/sample_images/categories/fashion.jpg'),
(2, 1, 'Camionetas', 'img/sample_images/categories/business.jpg'),
(3, 2, 'Compra', ''),
(4, 2, 'Renta', ''),
(5, 2, 'Venta', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(255) NOT NULL AUTO_INCREMENT,
  `correo` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `correo`, `contrasena`, `nombre`, `celular`, `imagen`) VALUES
(1, 'rodolfo.resendez@f403.mx', 'rodolfo', 'Rodolfo Resendez', '', 'img/sample_images/people/2.jpg'),
(2, 'elpopin_ws@hotmail.com', 'rodolfo', 'RODOLFO RESENDEZ', '8677290005', 'img/sample_images/people/1.jpg'),
(3, 'rodolfo@homero.com', '88888homero', 'rodolfo', '8888888888', ''),
(4, 'rodolfo8888888888@1.com', '88888homero', 'rodolfo', '8888888888', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
