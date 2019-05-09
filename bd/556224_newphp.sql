-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: mariadb-004.wc1:3306
-- Tiempo de generación: 01-03-2019 a las 16:41:32
-- Versión del servidor: 10.1.34-MariaDB-1~jessie
-- Versión de PHP: 7.2.7-1+0~20180622080852.23+jessie~1.gbpfd8e2e

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `556224_newphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`Id` mediumint(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `usuario_avatar` varchar(30) NOT NULL,
  `usuario_perfil` varchar(50) NOT NULL,
  `usuario_freg` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `Name`, `nombre_usuario`, `Email`, `Password`, `usuario_avatar`, `usuario_perfil`, `usuario_freg`) VALUES
(1, 'admin', 'ADMIN USER', 'contacto@vanzoft.com', '$2y$10$qPRzg.WIQXZY175epOqZ..h91KBUGRBmVTDCcKZ6sjvsOzF7dvf.y', 'avatar_default.png', '1', '2019-02-28 11:38:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `Id` mediumint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
