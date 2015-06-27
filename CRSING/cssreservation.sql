-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2014 a las 19:38:35
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cssreservation`
--
CREATE DATABASE IF NOT EXISTS `cssreservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cssreservation`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `simpleproc`(OUT param1 INT)
BEGIN
SELECT COUNT(*) INTO param1 FROM t;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `NIT` varchar(17) NOT NULL,
  `miembro` tinyint(1) DEFAULT '0',
  `saldo` float DEFAULT '0',
  `fecha_mem` date DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL DEFAULT '0',
  `total` float DEFAULT '0',
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `DUI_UNIQUE` (`DUI`),
  UNIQUE KEY `NIT_UNIQUE` (`NIT`),
  KEY `fk_cliente_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `DUI`, `telefono`, `direccion`, `fecha_nac`, `NIT`, `miembro`, `saldo`, `fecha_mem`, `usuario_idusuario`, `total`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd', '2014-07-01', 'asd', 1, 200, '2014-07-01', 1, 200),
(2, 'mario', 'ponce', '1', '123', 'sad', '2014-07-01', '1', 1, 300, '2014-07-01', 8, 300),
(4, 'Carlos', 'Minero', '454544544', '2259-8989', 'ghfgh', '0000-00-00', '154545454', 0, 35, '2014-07-20', 9, 100),
(5, 'Carlos', 'Minero', '22233456-8', '2345-6578', 'Los Alpes', '0000-00-00', '22222234566-666-6', 0, 70, '2014-07-22', 10, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE IF NOT EXISTS `espacio` (
  `idespacio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `costo` float NOT NULL DEFAULT '0',
  `imagen` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idespacio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `espacio`
--

INSERT INTO `espacio` (`idespacio`, `nombre`, `costo`, `imagen`, `descripcion`) VALUES
(1, 'Soccer Fields', 15, NULL, NULL),
(2, 'Theater', 50, NULL, NULL),
(3, 'Swimming Pool', 15, NULL, NULL),
(4, 'Church', 75, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `fk_factura_cliente1_idx` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha`, `total`, `cliente_idcliente`) VALUES
(10, '2014-07-20 23:31:08', 65, 4),
(14, '2014-07-22 04:14:56', 15, 5),
(15, '2014-07-22 04:15:10', 15, 5);

--
-- Disparadores `factura`
--
DROP TRIGGER IF EXISTS `factura_ADEL`;
DELIMITER //
CREATE TRIGGER `factura_ADEL` AFTER DELETE ON `factura`
 FOR EACH ROW begin
	
		update cliente set cliente.saldo=cliente.total-(select COALESCE(sum(factura.total), 0)  from factura where factura.cliente_idcliente= old.cliente_idcliente) where cliente.idcliente= old.cliente_idcliente ;
	
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `factura_AUPD`;
DELIMITER //
CREATE TRIGGER `factura_AUPD` AFTER UPDATE ON `factura`
 FOR EACH ROW begin
	if new.total<>old.total then 
		update cliente set cliente.saldo=cliente.total-(select COALESCE(sum(factura.total), 0)  from factura where factura.cliente_idcliente= new.cliente_idcliente) where cliente.idcliente= new.cliente_idcliente ;
		
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `espacio_idespacio` int(11) NOT NULL,
  `reservado` tinyint(1) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `fk_horario_espacio1_idx` (`espacio_idespacio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `inicio`, `fin`, `espacio_idespacio`, `reservado`, `fecha`) VALUES
(1, '07:00:00', '08:00:00', 1, 0, '2014-07-05'),
(2, '11:00:00', '12:00:00', 2, 0, '2014-07-05'),
(3, '08:00:00', '09:00:00', 1, 0, '2014-07-08'),
(4, '08:00:00', '09:00:00', 1, 0, '2014-07-08'),
(7, '09:00:00', '10:00:00', 2, 0, '2014-07-08'),
(8, '10:00:00', '11:00:00', 1, 0, '2014-07-08'),
(9, '17:35:00', '17:40:00', 2, 1, '2014-07-20'),
(10, '17:40:00', '18:10:00', 2, 0, '2014-07-20'),
(11, '17:30:00', '18:15:00', 1, 1, '2014-07-20'),
(13, '21:55:00', '22:30:00', 1, 1, '2014-07-21'),
(14, '21:55:00', '22:30:00', 1, 1, '2014-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `factura_idfactura` int(11) NOT NULL,
  `horario_idhorario` int(11) NOT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `fk_reserva_factura1_idx` (`factura_idfactura`),
  KEY `fk_reserva_horario1_idx` (`horario_idhorario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `factura_idfactura`, `horario_idhorario`) VALUES
(13, 10, 11),
(14, 10, 9),
(15, 14, 13),
(16, 15, 14);

--
-- Disparadores `reserva`
--
DROP TRIGGER IF EXISTS `reserva_ADEL`;
DELIMITER //
CREATE TRIGGER `reserva_ADEL` AFTER DELETE ON `reserva`
 FOR EACH ROW begin
	update factura set total=(select COALESCE(sum(espacio.costo), 0) from reserva join horario on (horario.idhorario=reserva.horario_idhorario) join espacio on(espacio.idespacio=horario.espacio_idespacio) where reserva.factura_idfactura= OLD.factura_idfactura) where idfactura= OLD.factura_idfactura;
	update horario set reservado=false where horario.idhorario=old.horario_idhorario;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `reserva_AINS`;
DELIMITER //
CREATE TRIGGER `reserva_AINS` AFTER INSERT ON `reserva`
 FOR EACH ROW begin
	update factura set total=(select COALESCE(sum(espacio.costo), 0)from reserva join horario on (horario.idhorario=reserva.horario_idhorario) join espacio on(espacio.idespacio=horario.espacio_idespacio) where reserva.factura_idfactura=new.factura_idfactura) where idfactura= new.factura_idfactura;
	update horario set reservado=true where horario.idhorario=new.horario_idhorario;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(102) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `contrasena`, `correo`, `tipo`) VALUES
(1, 'asd', 'asd', 'asd', 1),
(3, 'a', 'sha256:1000:Ad2MpXsFxda1DbwmfTY2iYDlZd3q9/F/:PGuFGBm56lsxZcKFsvC3EQhHm7KPn5LM', 'a@a', 1),
(4, 'admin', 'sha256:1000:hJrtQfmHeI+Ss64Jih4cL3rjJCnJKueH:EKcjtJHgjuWDyEkV21v1x5jfhP92sJFM', 'asdm@fd.com', 1),
(8, 'cliente', 'sha256:1000:3sw5y3soSV+nFFVY9LJEg29sw6GZyQbF:AJbrAQ2fRY4xfS6/2AMm9c7Mt6pzWOws', 'cliente@cliente', 2),
(9, 'Charles', 'sha256:1000:3bJkYjbwkQmV2F90Mc4HBzsJR/iJ4AZc:Lnxc7Ch3clKghyuECx/f0pPJfIOIib+q', 'Carlos@hotmail.com', 2),
(10, 'Minero', 'sha256:1000:tga9QapoIy2sd73nsr2WDV1jircMWy5Q:TgpgDVCqy2STV3mQ+c75nWL/h7m5pqFe', 'Minero@hotmail.com', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_espacio1` FOREIGN KEY (`espacio_idespacio`) REFERENCES `espacio` (`idespacio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_horario1` FOREIGN KEY (`horario_idhorario`) REFERENCES `horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
