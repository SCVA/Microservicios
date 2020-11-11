-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2013 a las 16:22:53
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_php_poo`
--
DROP DATABASE IF EXISTS `sistema_php_poo`;
CREATE DATABASE `sistema_php_poo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_php_poo`;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` varchar(20) NOT NULL,
  `descrip_usu` varchar(25) NOT NULL,
  `clave_usu` varchar(256) NOT NULL,
  `activo` enum('S','N') NOT NULL DEFAULT 'N',
  `modulo01` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo02` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo03` enum('L','E','X') NOT NULL DEFAULT 'X',
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_usu` varchar(20) NOT NULL,
  `n1` float NOT NULL DEFAULT 0,
  `n2` float NOT NULL DEFAULT 0,
  `n3` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usu`),
  FOREIGN KEY (`id_usu`) REFERENCES `usuario`(`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `descrip_usu`, `clave_usu`, `activo`, `modulo01`, `modulo02`, `modulo03`) VALUES
('20202495000', 'Estudiante', 'e10adc3949ba59abbe56e057f20f883e', 'S', 'L', 'E', 'E'),
('20202495100', 'Administrador', 'e10adc3949ba59abbe56e057f20f883e', 'S', 'E', 'X', 'X');

INSERT INTO `estudiante` (`id_usu`, `n1`, `n2`, `n3`) VALUES
('20202495000', 5, 4, 5);

--
-- Restricciones para tablas volcadas
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
