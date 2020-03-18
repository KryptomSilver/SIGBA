-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2020 a las 16:21:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigba`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Actualizar` (IN `pid` INT(11), IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50))  BEGIN

UPDATE persona set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc) ,calle = UPPER(pcalle),num_Interior = UPPER(pnum_Interior),num_Exterior =  UPPER(pnum_Exterior),colonia = UPPER(pcolonia),codPostal = UPPER(pcodPostal),nombre_Contacto = UPPER(pnombre_Contacto),telefono = UPPER(ptelefono),celular = UPPER(pcelular),correo = UPPER(pcorreo),recibo =UPPER(precibo) WHERE idpersona =  pid;

select "REGISTRO ACTUALIZADO" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarArticulo` (IN `pnombre` VARCHAR(60))  BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM articulo
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	INSERT INTO articulo (nombre)
	VALUES (UPPER(pnombre));
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Registrado' AS msg;
	else 
	select 'Articulo Existente' AS msg;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarColonia` (IN `pnombre` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM colonias
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	INSERT INTO colonias (nombre)
	VALUES (UPPER(pnombre));
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Colonia Registrada' AS msg;
	else 
	select 'Colonia Existente' AS msg;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarMunicipio` (IN `pnombre` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM municipios
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	INSERT INTO municipios (nombre)
	VALUES (UPPER(pnombre));
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Municipio Registrado' AS msg;
	else 
	select 'Municipio Existente' AS msg;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarUnidad` (IN `punidad` VARCHAR(60), IN `pclave` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM unidad_medida
	WHERE unidad_medida	LIKE punidad) = 0 THEN
	
	INSERT INTO unidad_medida (unidad_medida,clave)
	VALUES (UPPER(punidad),UPPER(pclave));
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0
	select 'Unidad Registrada' AS msg;
	else 
	select 'Unidad Existente' AS msg;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarArticulo` (IN `pid` INT(11), IN `pnombre` VARCHAR(60))  BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  articulo SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Actualizado' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarColonia` (IN `pid` INT, IN `pnombre` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  colonias SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Colonia Actualizada' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarMunicipio` (IN `pid` INT, IN `pnombre` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  municipios SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Municipio Actualizado' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarUnidad` (IN `punidad` VARCHAR(60), IN `pclave` VARCHAR(60), IN `pidunidad` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  unidad_medida SET unidad_medida = UPPER(punidad), clave = UPPER(pclave)
	WHERE idunidad = pidunidad;
	
	select 'Unidad Actualizada' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarArticulo` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM articulo
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo No Existente' AS msg;
	else 
	select 'Articulo Eliminado' AS msg;
	DELETE FROM articulo WHERE id = pid;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarBanco` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'BANCO DE ALIMENTOS ELIMINADO' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarColonia` (IN `pid` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM colonias
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Colonia No Existente' AS msg;
	else 
	select 'Colonia Eliminada' AS msg;
	DELETE FROM colonias WHERE id = pid;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarDonador` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'DONADOR ELIMINADO' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarMunicipio` (IN `pid` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM municipios
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Municipio No Existente' AS msg;
	else 
	select 'Municipio Eliminado' AS msg;
	DELETE FROM municipios WHERE id = pid;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarPersona` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'REGISTRO ELIMINADO' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarProveedor` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'PROVEEDOR ELIMINADO' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarUnidad` (IN `pid` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM unidad_medida
	WHERE idunidad	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Unidad No Existente' AS msg;
	else 
	select 'Unidad Eliminada' AS msg;
	DELETE FROM unidad_medida WHERE idunidad = pid;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Registro` (IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `tipoPer` INT(11))  BEGIN
	DECLARE XID_PER INT;

IF (SELECT COUNT(1) FROM persona WHERE rfc = prfc) = 0 THEN #NO EXISTE LA PERSONA REGISTRADA
IF tipoPer = 2 THEN #DONADOR
INSERT INTO persona (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo,recibo)
VALUES(UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo),UPPER(precibo));

SET XID_PER = LAST_INSERT_ID();
ELSE
#ES COLABORADOR, PROVEEDOR O PROYECTO
INSERT INTO persona (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo)
VALUES(UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo));
SET XID_PER = LAST_INSERT_ID();
END IF;

#SE LE ASIGNA EL TIPO A LA PERSONA
INSERT INTO persona_tipo(idpersona,idtipo)
VALUES(XID_PER,tipoPer);

SELECT CASE WHEN tipoPer = 1 THEN 'PROVEEDOR REGISTRADO'  ELSE 
CASE WHEN tipoPer = 2 THEN 'DONADOR REGISTRADO' ELSE
CASE WHEN tipoPer = 3 THEN 'BANCO DE ALIMENTOS REGISTRADO' ELSE 'PROYECTO REGISTRADO' END 
END END AS msg; 

ELSE #YA EXISTE LA PERSONA
SELECT idpersona INTO XID_PER #OBTENGO EL ID DE LA PERSONA
FROM persona
WHERE rfc = prfc;

IF (SELECT COUNT(1) FROM persona_tipo WHERE idpersona = XID_PER AND idtipo = tipoPer) = 0 THEN
#SE LE ASIGNA EL TIPO A LA PERSONA
INSERT INTO persona_tipo(idpersona,idtipo)
VALUES(XID_PER,tipoPer);

ELSE
SELECT CASE WHEN tipoPer = 1 THEN 'PROVEEDOR EXISTENTE' ELSE 
CASE WHEN tipoPer = 2 THEN 'DONADOR EXISTENTE' ELSE
CASE WHEN tipoPer = 3 THEN 'BANCO DE ALIMENTOS EXISTENTE' ELSE 'PROYECTO EXISTENTE' END 
END END AS msg;
end if;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RFC` (IN `prfc` VARCHAR(50))  BEGIN
	IF (SELECT count(1)FROM persona
	WHERE rfc	LIKE prfc) = 0 THEN
	select 'NO' as msg;
	else 
	select 'SI' as msg;
	END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `identrada` int(11) NOT NULL,
  `idarticulo` int(11) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `idunidad` int(11) DEFAULT NULL,
  `precio_Compra` float(50,0) DEFAULT NULL,
  `precio_Venta` float(50,0) DEFAULT NULL,
  `fecha_Caducidad` date DEFAULT NULL,
  `perecedero` varchar(50) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `fecha_Extincion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `razon_Social` varchar(50) DEFAULT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `num_Interior` varchar(50) DEFAULT NULL,
  `num_Exterior` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `codPostal` varchar(50) DEFAULT NULL,
  `nombre_Contacto` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `recibo` varchar(255) DEFAULT NULL,
  `tipoPer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_tipo`
--

CREATE TABLE `persona_tipo` (
  `idpersona` int(11) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `idtipo` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `idunidad` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `unidad_medida` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`idunidad`, `clave`, `unidad_medida`) VALUES
(3, 'SDFSD', 'DF'),
(4, 'SDFFGFRG', 'DSF'),
(5, 'GGGGG', 'GHJGHJ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`identrada`) USING BTREE,
  ADD KEY `idarticulo` (`idarticulo`) USING BTREE,
  ADD KEY `idpersona` (`idpersona`) USING BTREE,
  ADD KEY `idunidad` (`idunidad`) USING BTREE;

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`) USING BTREE;

--
-- Indices de la tabla `persona_tipo`
--
ALTER TABLE `persona_tipo`
  ADD KEY `idtipo` (`idtipo`) USING BTREE,
  ADD KEY `idpersona` (`idpersona`) USING BTREE;

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD KEY `idtipo` (`idtipo`) USING BTREE;

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`idunidad`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `identrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `idunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona_tipo`
--
ALTER TABLE `persona_tipo`
  ADD CONSTRAINT `persona_tipo_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
