-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 18:56:52
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ActualizarEstatus` (IN `pestatus` INT(11), IN `pidfamilia` INT(11))  BEGIN
	#Routine body goes here...

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarAbono` (IN `varid` INT, IN `varfecha` DATE, IN `varabono` INT)  BEGIN
	DECLARE varrestante double;
	DECLARE vartotal double;
	DECLARE varrestante1 double;

	set vartotal=(SELECT total FROM `compras` WHERE id=varid);
	set varrestante1=(SELECT SUM(abono) FROM `abonos` WHERE fk_compra=varid);

	IF varrestante1 IS NULL THEN
		set varrestante1=0;
	END IF;

	set varrestante=vartotal-varrestante1-varabono;

	INSERT INTO `abonos`(`fk_compra`, `fecha`, `abono`, `restante`) VALUES (varid,varfecha,varabono,varrestante);

	IF varrestante <= 0 THEN
		UPDATE `compras` SET `estatus_pago`= 1  WHERE `id` = varid;
	END IF;

	SELECT `restante` as varres FROM `abonos` WHERE `id`= @@identity;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarBanco` (IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vBANCO` TINYINT(1))  BEGIN
	INSERT INTO personas  (razon_Social,rfc,calle,num_Interior ,num_Exterior ,colonia,codPostal ,nombre_Contacto ,telefono ,celular,correo,recibo,banco)
VALUES (prazon_Social, prfc,pcalle,pnum_Interior,pnum_Exterior,pcolonia,pcodPostal,pnombre_Contacto,ptelefono,pcelular,pcorreo,precibo,vbanco);

select "BANCO DE ALIMENTOS REGISTRADO" as msg;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarColonia` (IN `pnombre` VARCHAR(60), IN `pmunicipio` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM colonias
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	INSERT INTO colonias (nombre,fk_municipio)
	VALUES (UPPER(pnombre),pmunicipio);
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Colonia Registrada' AS msg;
	else 
	select 'Colonia Existente' AS msg;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarCompra` (IN `varid` INT, IN `varfactura` VARCHAR(20), IN `varfecha` DATE, IN `vartipo` BOOLEAN)  BEGIN
	INSERT INTO `compras`(`fk_vendedor`, `factura`, `fecha`, `tipo_pago`) VALUES (varid,varfactura,varfecha,vartipo);

  SELECT @@identity as var;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarDetalleCompra` (IN `varid` INT, IN `vararticulo` INT, IN `varcantidad` INT, IN `varprecioventa` DOUBLE(10,2), IN `varpreciocompra` DOUBLE(10,2))  BEGIN
	DECLARE vartotal double;

	INSERT INTO `detalle_compra`(`fk_compra`, `fk_articulo`, `cantidad`,`precioventa`, `preciocompra` ,`monto`) VALUES (varid,vararticulo,varcantidad,varprecioventa,varpreciocompra,varcantidad*varpreciocompra);

	SET vartotal=(select sum(monto) FROM detalle_compra WHERE fk_compra = varid);
			
	UPDATE `compras` SET `total`= vartotal  WHERE `id` = varid;

	SELECT total from compras WHERE `id` = varid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarDetalleDonacion` (IN `varid` INT, IN `vararticulo` INT, IN `varcantidad` INT, IN `varcaducidad` DATE, IN `varprecio` DOUBLE(10,2))  BEGIN
	INSERT INTO `detalle_donacion`( `fk_donacion`, `fk_articulo`, `cantidad`,`caducidad`,`precio_venta`) VALUES (varid,vararticulo,varcantidad,varcaducidad,varprecio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarDonacion` (IN `vardonador` INT, IN `varfecha` DATE)  BEGIN
INSERT INTO `donaciones`( `fk_donador`, `fecha`) VALUES (vardonador,varfecha);
SELECT @@identity as var;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarDonador` (IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vdonador` TINYINT(1))  BEGIN
	
INSERT INTO personas  (razon_Social,rfc,calle,num_Interior ,num_Exterior ,colonia,codPostal ,nombre_Contacto ,telefono ,celular,correo,recibo,donador)
VALUES (prazon_Social, prfc,pcalle,pnum_Interior,pnum_Exterior,pcolonia,pcodPostal,pnombre_Contacto,ptelefono,pcelular,pcorreo,precibo,vdonador);

select "DONADOR REGISTRADO" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarEgresos` (IN `vvivienda` DOUBLE, IN `valimentacion` DOUBLE, IN `vluz` DOUBLE, IN `vgas` DOUBLE, IN `vagua` DOUBLE, IN `vatencion` DOUBLE, IN `vtelefono` DOUBLE, IN `vtransporte` DOUBLE, IN `votros` DOUBLE, IN `vcelular` DOUBLE, IN `veducacion` DOUBLE, IN `vtotals` DOUBLE, IN `vtotalm` DOUBLE, IN `vidfam` INT)  BEGIN
	INSERT INTO egresos  (vivienda,alimentacion,luz,gas,agua,
	atencion_medica,telefono,transporte,otros_gastos,celular, educacion,total_semanal,total_mensual,fk_familia)
	VALUES (vvivienda,valimentacion,vluz,vgas,vagua,vatencion,vtelefono,vtransporte,votros,vcelular,veducacion,vtotals,votros,vidfam);
	SELECT "Egresos Registrados" as msg;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarFamilia` (IN `vcalle` VARCHAR(50), IN `vtelefono` VARCHAR(50), IN `vcolonia` VARCHAR(50), IN `vmunicipio` VARCHAR(50), IN `vintegrantes` VARCHAR(50), IN `vnum_Interno` VARCHAR(50), IN `vnum_Externo` VARCHAR(50), IN `vcalle_col1` VARCHAR(50), IN `vcalle_col2` VARCHAR(50))  BEGIN
	-- Agregar datos generales --
	INSERT INTO familias(calle,telefono,colonia,municipio,integrantes,num_Interno,num_Externo,calle_col1,calle_col2)
	VALUES (vcalle,vtelefono,vcolonia,vmunicipio,vintegrantes,vnum_Interno,vnum_Externo,vcalle_col1,vcalle_col2);
	SET @vid = @@IDENTITY;
	
select 'Familia Registrada' AS msg, @vid AS idval;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarIntegrante` (IN `vidfam` INT(11), IN `vtitular` VARCHAR(50), IN `vnombre` VARCHAR(50), IN `vapellido1` VARCHAR(50), IN `vapellido2` VARCHAR(50), IN `vsexo` CHAR(1), IN `vfecha` DATE, IN `ventidad` VARCHAR(50), IN `vcurp` VARCHAR(50), IN `vestado_civil` VARCHAR(50), IN `vocupacion` VARCHAR(50), IN `vparentesco` VARCHAR(50), IN `vnivel_estudios` VARCHAR(50), IN `vgrado` VARCHAR(50), IN `vestado` VARCHAR(50), IN `vtalla` DOUBLE(10,2), IN `vpeso` DOUBLE(10,2), IN `vingresos` DOUBLE(10,2))  BEGIN
	INSERT INTO integrantes (fk_familia,gefe_familia,nombre,apellido1,apellido2,sexo,fecha_nac,entidad,curp,estado_civil,ocupacion,parentesco,nivel_estudios,grado,estado_estudio,talla,peso,ingresos)
	VALUES (vidfam,vtitular,vnombre,vapellido1,vapellido2,vsexo,vfecha,ventidad,vcurp,vestado_civil,vocupacion,vparentesco,vnivel_estudios,vgrado,vestado,vtalla,vpeso,vingresos);
     select 'Integrante Registrado' AS msg;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarProveedor` (IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vproveedor` TINYINT(1))  BEGIN


INSERT INTO personas  (razon_Social,rfc,calle,num_Interior ,num_Exterior ,colonia,codPostal ,nombre_Contacto ,telefono ,celular,correo,recibo,proveedor)
VALUES (prazon_Social, prfc,pcalle,pnum_Interior,pnum_Exterior,pcolonia,pcodPostal,pnombre_Contacto,ptelefono,pcelular,pcorreo,precibo,vproveedor);

select "PROVEEDOR REGISTRADO" as msg;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarVivienda` (IN `vtenencia` VARCHAR(50), IN `vcuartos` INT(11), IN `vnumfamilias` INT(11), IN `vidfam` INT(11))  BEGIN
INSERT INTO vivienda (tenencia,num_Cuartos,num_Familias,fk_familia)
VALUES (vtenencia,vcuartos,vnumfamilias,vidfam);
SELECT "Vivienda Registrada" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarArticulo` (IN `pid` INT(11), IN `pnombre` VARCHAR(60))  BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  articulo SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Actualizado' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarBanco` (IN `pid` INT(11), IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vbanco` TINYINT(1))  BEGIN
	UPDATE personas set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc) ,calle = UPPER(pcalle),num_Interior = UPPER(pnum_Interior),num_Exterior =  UPPER(pnum_Exterior)
,colonia = UPPER(pcolonia),codPostal = UPPER(pcodPostal),nombre_Contacto = UPPER(pnombre_Contacto),telefono = UPPER(ptelefono),celular = UPPER(pcelular)
,correo = UPPER(pcorreo),recibo = UPPER(precibo),banco = vbanco WHERE idpersona =  pid;

select "BANCO DE ALIMENTOS ACTUALIZADO" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarColonia` (IN `pid` INT, IN `pnombre` VARCHAR(60), IN `pmunicipio` INT)  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  colonias SET nombre = UPPER(pnombre), fk_municipio = pmunicipio
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Colonia Actualizada' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarDonador` (IN `pid` INT(11), IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vdonador` TINYINT(1))  BEGIN
	UPDATE personas set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc) ,calle = UPPER(pcalle),num_Interior = UPPER(pnum_Interior),num_Exterior =  UPPER(pnum_Exterior)
,colonia = UPPER(pcolonia),codPostal = UPPER(pcodPostal),nombre_Contacto = UPPER(pnombre_Contacto),telefono = UPPER(ptelefono),celular = UPPER(pcelular)
,correo = UPPER(pcorreo),recibo = UPPER(precibo),donador = vdonador WHERE idpersona =  pid;

select "DONADOR ACTUALIZADO" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarEgresos` (IN `vvivienda` DOUBLE, IN `valimentacion` DOUBLE, IN `vluz` DOUBLE, IN `vgas` DOUBLE, IN `vagua` DOUBLE, IN `vatencion` DOUBLE, IN `vtelefono` DOUBLE, IN `vtransporte` DOUBLE, IN `votros` DOUBLE, IN `vcelular` DOUBLE, IN `veducacion` DOUBLE, IN `vtotals` DOUBLE, IN `vtotalm` DOUBLE, IN `vidfam` INT)  BEGIN
	UPDATE egresos SET vivienda=vvivienda,alimentacion=valimentacion,luz=vluz,gas=vgas,agua=vagua,
	atencion_medica=vatencion,telefono=vtelefono,transporte=vtransporte,otros_gastos=votros,celular=vcelular, educacion=veducacion,total_semanal=vtotals,total_mensual=vtotalm WHERE fk_familia = vidfam;
	SELECT "Egresos Actualizados" as msg;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarEstatus` (IN `pestatus` INT(11), IN `pidfamilia` INT(11))  BEGIN
	UPDATE familias set estatus = pestatus where id = pidfamilia;
	SELECT "Familia Registrada" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarFamilia` (IN `vid` INT(11), IN `vcalle` VARCHAR(50), IN `vtelefono` VARCHAR(50), IN `vcolonia` VARCHAR(50), IN `vmunicipio` VARCHAR(50), IN `vintegrantes` VARCHAR(50), IN `vnum_Interno` VARCHAR(50), IN `vnum_Externo` VARCHAR(50), IN `vcalle_col1` VARCHAR(50), IN `vcalle_col2` VARCHAR(50))  BEGIN
	-- Actualizar datos generales --
	UPDATE  familias SET calle = UPPER(vcalle),telefono=UPPER(vtelefono),colonia=UPPER(vcolonia),municipio=UPPER(vmunicipio),integrantes=UPPER(vintegrantes),
num_Interno=UPPER(vnum_Interno),num_Externo=UPPER(vnum_Externo),calle_col1=UPPER(vcalle_col1),calle_col2=UPPER(vcalle_col2)
	WHERE id = vid;
	
select 'Familia Actualizada' AS msg,vid as idval;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarIntegrante` (IN `vid` INT(11), IN `vtitular` VARCHAR(50), IN `vnombre` VARCHAR(50), IN `vapellido1` VARCHAR(50), IN `vapellido2` VARCHAR(50), IN `vsexo` CHAR(1), IN `vfecha` DATE, IN `ventidad` VARCHAR(50), IN `vcurp` VARCHAR(50), IN `vestado_civil` VARCHAR(50), IN `vocupacion` VARCHAR(50), IN `vparentesco` VARCHAR(50), IN `vnivel_estudios` VARCHAR(50), IN `vgrado` VARCHAR(50), IN `vestado` VARCHAR(50), IN `vtalla` DOUBLE(10,2), IN `vpeso` DOUBLE(10,2), IN `vingresos` DOUBLE(10,2))  BEGIN
	UPDATE integrantes SET gefe_familia=UPPER(vtitular),nombre=UPPER(vnombre),apellido1=UPPER(vapellido1),apellido2=UPPER(vapellido2)
,sexo=UPPER(vsexo),fecha_nac=vfecha,entidad=UPPER(ventidad),curp=vcurp,estado_civil=UPPER(vestado_civil),ocupacion=UPPER(vocupacion),
parentesco=UPPER(vparentesco),nivel_estudios=UPPER(vnivel_estudios),grado=UPPER(vgrado),estado_estudio=UPPER(vestado),ingresos=vingresos,talla=vtalla,peso=vpeso WHERE id =vid;
	 
     select 'Integrante Actualizado' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarMunicipio` (IN `pid` INT, IN `pnombre` VARCHAR(60))  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  municipios SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Municipio Actualizado' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarProveedor` (IN `pid` INT(11), IN `prazon_Social` VARCHAR(50), IN `prfc` VARCHAR(13), IN `pcalle` VARCHAR(25), IN `pnum_Interior` INT(11), IN `pnum_Exterior` INT(11), IN `pcolonia` VARCHAR(50), IN `pcodPostal` INT(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` INT(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo` VARCHAR(50), IN `vproveedor` TINYINT(1))  BEGIN

UPDATE personas set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc) ,calle = UPPER(pcalle),num_Interior = UPPER(pnum_Interior),num_Exterior =  UPPER(pnum_Exterior)
,colonia = UPPER(pcolonia),codPostal = UPPER(pcodPostal),nombre_Contacto = UPPER(pnombre_Contacto),telefono = UPPER(ptelefono),celular = UPPER(pcelular)
,correo = UPPER(pcorreo),recibo = UPPER(precibo),proveedor = vproveedor WHERE idpersona =  pid;

select "PROVEEDOR ACTUALIZADO" as msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarUnidad` (IN `punidad` VARCHAR(60), IN `pclave` VARCHAR(60), IN `pidunidad` INT(11))  NO SQL
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  unidad_medida SET unidad_medida = UPPER(punidad), clave = UPPER(pclave)
	WHERE idunidad = pidunidad;
	
	select 'Unidad Actualizada' AS msg;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EditarVivienda` (IN `vtenencia` VARCHAR(50), IN `vcuartos` INT(11), IN `vnumfamilias` INT(11), IN `vidfam` INT(11))  BEGIN
	UPDATE vivienda set tenencia=vtenencia,num_Cuartos=vcuartos,num_Familias=vnumfamilias WHERE fk_familia = vidfam;
	select 'Vivienda Actualizada' AS msg;

END$$

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
	
	UPDATE personas SET banco = 0 WHERE idpersona = pid;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarDetalleCompra` (IN `var` INT, IN `varid` INT)  BEGIN
DECLARE vartotal int;
DELETE FROM `detalle_compra` WHERE `id`= var;

SET vartotal=(select sum(monto) FROM detalle_compra WHERE fk_compra = varid);

IF (vartotal IS null) THEN 
	set vartotal=0;
END IF;

UPDATE `compras` SET `total`= vartotal  WHERE `id` = varid;

SELECT total from compras WHERE `id` = varid;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarDetalleDonacion` (IN `var` INT)  BEGIN
	DELETE FROM `detalle_donacion` WHERE `id`= var;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarDonacion` (IN `var` INT)  BEGIN
	DELETE FROM  `donaciones` WHERE `id`= var;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarDonador` (IN `pid` INT(11))  BEGIN
	#Routine body goes here...
	
	UPDATE personas SET donador = 0 WHERE idpersona = pid;

	SELECT  'DONADOR ELIMINADO' AS msg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarFamilia` (IN `vid` INT)  BEGIN
		IF (SELECT count(1)FROM familias
		WHERE id	= vid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Familia No Existente' AS msg;
	else 
	select 'Familia Eliminada' AS msg;
	DELETE FROM familias WHERE id = vid;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EliminarIntegrante` (IN `pid` INT(11))  BEGIN
IF (SELECT count(1)FROM integrantes
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Integrante No Existente' AS msg;
	else 
	select 'Integrante Eliminado' AS msg;
	DELETE FROM integrantes WHERE id = pid;
	END IF;
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
	
	UPDATE personas SET proveedor = 0 WHERE idpersona = pid;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_prueba` (IN `vingreso` DOUBLE)  BEGIN
	#Routine body goes here...
 INSERT INTO familias(ingresototal) VALUES(vingreso);
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
	IF (SELECT count(1)FROM personas
	WHERE rfc	LIKE prfc) = 0 THEN
	select 'NO' as msg;
	
	else 
	select 'SI' as msg,idpersona as id
	FROM personas WHERE rfc = prfc;
	
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TerminarCompra` (IN `varid` INT)  BEGIN
	UPDATE `compras` SET`estatus`= 1  WHERE `id` = varid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TerminarDonacion` (IN `varid` INT)  BEGIN
	UPDATE `donaciones` SET `estatus`= 1 WHERE `id` = varid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(11) NOT NULL,
  `fk_compra` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `abono` double(10,2) DEFAULT NULL,
  `restante` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id`, `fk_compra`, `fecha`, `abono`, `restante`) VALUES
(1, 1, '2020-10-13', 24.00, 0.00),
(2, 2, '2020-11-02', 300.00, 19700.00),
(3, 2, '2020-10-21', 300.00, 19400.00),
(4, 2, '2020-10-22', 190000.00, -170600.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`) VALUES
(20, 'WEDER'),
(21, 'PAPEL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id` int(11) NOT NULL,
  `fk_municipio` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`id`, `fk_municipio`, `nombre`) VALUES
(21, 4, 'VILLAS FLORES'),
(23, 6, 'AGUAJES'),
(24, 5, 'VILLAS DE ORO'),
(26, 9, 'LOS GIRASOLES'),
(27, 12, 'VIRREYES'),
(28, 9, 'FLORES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fk_vendedor` int(11) NOT NULL,
  `factura` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 0,
  `estatus_pago` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fk_vendedor`, `factura`, `fecha`, `total`, `tipo_pago`, `estatus`, `estatus_pago`) VALUES
(1, 15, '12', '2020-10-22', 24, '1', 1, 1),
(2, 15, '12312', '2020-10-21', 20000, '0', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `fk_compra` int(11) DEFAULT NULL,
  `fk_articulo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioventa` double(10,2) DEFAULT NULL,
  `preciocompra` double(10,2) DEFAULT NULL,
  `monto` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `fk_compra`, `fk_articulo`, `cantidad`, `precioventa`, `preciocompra`, `monto`) VALUES
(1, 1, 20, 12, 1.00, 1.00, 12.00),
(2, 1, 21, 1, 2.00, 12.00, 12.00),
(3, 2, 21, 10000, 12.00, 2.00, 20000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_donacion`
--

CREATE TABLE `detalle_donacion` (
  `id` int(11) NOT NULL,
  `fk_donacion` int(11) DEFAULT NULL,
  `fk_articulo` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `caducidad` date DEFAULT NULL,
  `precio_venta` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_donacion`
--

INSERT INTO `detalle_donacion` (`id`, `fk_donacion`, `fk_articulo`, `cantidad`, `caducidad`, `precio_venta`) VALUES
(2, 15, 20, 12, '2020-10-01', 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `fk_donador` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estatus` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`id`, `fk_donador`, `fecha`, `estatus`) VALUES
(1, 15, '2020-10-08', 1),
(15, 15, '2020-10-13', 1),
(16, 15, '2020-10-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `fk_familia` int(11) DEFAULT NULL,
  `vivienda` double(10,2) DEFAULT NULL,
  `alimentacion` double(10,2) DEFAULT NULL,
  `luz` double(10,2) DEFAULT NULL,
  `agua` double(10,2) DEFAULT NULL,
  `telefono` double(10,2) DEFAULT NULL,
  `transporte` double(10,2) DEFAULT NULL,
  `atencion_medica` double(10,2) DEFAULT NULL,
  `otros_gastos` double(10,2) DEFAULT NULL,
  `celular` double(10,2) DEFAULT NULL,
  `educacion` double(10,2) DEFAULT NULL,
  `total_semanal` double(10,2) DEFAULT NULL,
  `total_mensual` double(10,2) DEFAULT NULL,
  `gas` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `fk_familia`, `vivienda`, `alimentacion`, `luz`, `agua`, `telefono`, `transporte`, `atencion_medica`, `otros_gastos`, `celular`, `educacion`, `total_semanal`, `total_mensual`, `gas`) VALUES
(52, 114, 1000.00, 2000.00, 150.00, 200.00, 0.00, 500.00, 300.00, 200.00, 200.00, 3000.00, 7850.00, 200.00, 300.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `fk_puesto` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `curp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT '',
  `colonia` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `integrantes` varchar(50) DEFAULT '',
  `ingresototal` double(10,2) DEFAULT NULL,
  `num_Interno` varchar(50) DEFAULT NULL,
  `num_Externo` varchar(50) DEFAULT NULL,
  `calle_col1` varchar(50) DEFAULT NULL,
  `calle_col2` varchar(50) DEFAULT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `calle`, `telefono`, `colonia`, `municipio`, `integrantes`, `ingresototal`, `num_Interno`, `num_Externo`, `calle_col1`, `calle_col2`, `estatus`) VALUES
(114, 'BENITO JUAREZ', '3125202521', 26, 9, '3', NULL, '0', '110', 'LÁZARO CÁRDENAS', 'AMAPOLAS', 1),
(115, 'd', '3125202521', 24, 5, '1', NULL, '3', '3', 'Lázaro Cárdenas', 'Amapolas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(11) NOT NULL,
  `grado` int(11) DEFAULT NULL,
  `fk_nivel_estudios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `grado`, `fk_nivel_estudios`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 4, 2),
(8, 5, 2),
(9, 6, 2),
(10, 1, 3),
(11, 2, 3),
(12, 3, 3),
(13, 1, 4),
(14, 2, 4),
(15, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `fk_familia` int(11) DEFAULT NULL,
  `padre` double(10,2) DEFAULT NULL,
  `madre` double(10,2) DEFAULT NULL,
  `hijos` double(10,2) DEFAULT NULL,
  `becas` double(10,2) DEFAULT NULL,
  `pension` double(10,2) DEFAULT NULL,
  `otros` double(10,2) DEFAULT NULL,
  `adultos_Mayores` double(10,2) DEFAULT NULL,
  `total_Semanal` double(10,2) DEFAULT NULL,
  `total_Mensual` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` int(11) NOT NULL,
  `fk_familia` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `gefe_familia` varchar(50) DEFAULT '',
  `sexo` char(1) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `entidad` varchar(50) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `estado_estudio` varchar(50) DEFAULT '',
  `grado` int(11) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT '',
  `nivel_estudios` int(11) DEFAULT NULL,
  `ingresos` double(10,2) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `peso` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `fk_familia`, `nombre`, `apellido1`, `apellido2`, `gefe_familia`, `sexo`, `fecha_nac`, `curp`, `entidad`, `parentesco`, `ocupacion`, `estado_estudio`, `grado`, `estado_civil`, `nivel_estudios`, `ingresos`, `talla`, `peso`) VALUES
(60, 114, 'Abel', 'Romero', 'ruiz', 'NO', 'M', '2020-10-12', 'BADD110313HCMLNS09', 'Colima', 'Conyuge', 'Ama de casa', 'TRUNCO', 4, 'separado', 2, 123123.00, 12, 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`) VALUES
(4, 'COLIMA'),
(5, 'VILLA DE ALVAREZ'),
(6, 'COMALA'),
(7, 'MINATITLÁN'),
(8, 'CUAUHTÉMOC'),
(9, 'ARMERÍA'),
(10, 'TECOMÁN'),
(11, 'IXTLAHUACÁN'),
(12, 'COQUIMATLÁN'),
(13, 'MANZANILLO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_estudios`
--

CREATE TABLE `nivel_estudios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_estudios`
--

INSERT INTO `nivel_estudios` (`id`, `nombre`) VALUES
(1, 'Kinder'),
(2, 'Primaria'),
(3, 'Secundaria'),
(4, 'Bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
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
  `proveedor` tinyint(1) NOT NULL,
  `donador` tinyint(1) NOT NULL,
  `banco` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `razon_Social`, `rfc`, `calle`, `num_Interior`, `num_Exterior`, `colonia`, `codPostal`, `nombre_Contacto`, `telefono`, `celular`, `correo`, `recibo`, `proveedor`, `donador`, `banco`) VALUES
(14, 'AV PABLO SILVA GARCIA BANCOFFF', 'VEBJ880326', 'AV PABLO SILVA', '12', '12', 'DSSD', '28985', 'DSDS', '2147483647', '3121985243', 'ABEL@HOTMAIL.COM', '', 0, 0, 0),
(15, 'SUCESORES DE EMILIO GRUV', 'VEBJ890324', 'MADERO', '303', '100', 'CENTRO', '28000', 'ABEL  ROMERO RUIZ', '2147483647', '3121564857', 'ECHAVEZ@GMAIL.COM', 'SI', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(6, 'KG', 'KILOS'),
(7, 'LT', 'LITROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `fk_empleado` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `id` int(11) NOT NULL,
  `fk_familia` int(11) DEFAULT NULL,
  `tenencia` varchar(50) DEFAULT '',
  `num_Cuartos` int(11) DEFAULT NULL,
  `num_Familias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`id`, `fk_familia`, `tenencia`, `num_Cuartos`, `num_Familias`) VALUES
(62, 114, 'Pagándose', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compra` (`fk_compra`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio` (`fk_municipio`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendedor` (`fk_vendedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compra` (`fk_compra`),
  ADD KEY `fk_articulo` (`fk_articulo`);

--
-- Indices de la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donacion` (`fk_donacion`),
  ADD KEY `fk_articulo` (`fk_articulo`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donador` (`fk_donador`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_familia` (`fk_familia`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_puesto` (`fk_puesto`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`identrada`) USING BTREE,
  ADD KEY `idarticulo` (`idarticulo`) USING BTREE,
  ADD KEY `idpersona` (`idpersona`) USING BTREE,
  ADD KEY `idunidad` (`idunidad`) USING BTREE;

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colonia` (`colonia`),
  ADD KEY `municipio` (`municipio`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nivel_estudios` (`fk_nivel_estudios`),
  ADD KEY `grado` (`grado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingresos_ibfk_1` (`fk_familia`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_familia` (`fk_familia`),
  ADD KEY `nivel_estudios` (`nivel_estudios`),
  ADD KEY `integrantes_ibfk_2` (`grado`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_estudios`
--
ALTER TABLE `nivel_estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idpersona`) USING BTREE;

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`idunidad`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado` (`fk_empleado`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_familia` (`fk_familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `identrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nivel_estudios`
--
ALTER TABLE `nivel_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `idunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `abonos_ibfk_1` FOREIGN KEY (`fk_compra`) REFERENCES `compras` (`id`);

--
-- Filtros para la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD CONSTRAINT `colonias_ibfk_1` FOREIGN KEY (`fk_municipio`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`fk_vendedor`) REFERENCES `personas` (`idpersona`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`fk_compra`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`fk_articulo`) REFERENCES `articulo` (`id`);

--
-- Filtros para la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD CONSTRAINT `detalle_donacion_ibfk_1` FOREIGN KEY (`fk_donacion`) REFERENCES `donaciones` (`id`),
  ADD CONSTRAINT `detalle_donacion_ibfk_2` FOREIGN KEY (`fk_articulo`) REFERENCES `articulo` (`id`);

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`fk_donador`) REFERENCES `personas` (`idpersona`);

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `egresos_ibfk_1` FOREIGN KEY (`fk_familia`) REFERENCES `familias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`fk_puesto`) REFERENCES `puestos` (`id`);

--
-- Filtros para la tabla `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_ibfk_1` FOREIGN KEY (`colonia`) REFERENCES `colonias` (`id`),
  ADD CONSTRAINT `familias_ibfk_2` FOREIGN KEY (`municipio`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`fk_nivel_estudios`) REFERENCES `nivel_estudios` (`id`);

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`fk_familia`) REFERENCES `familias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`fk_familia`) REFERENCES `familias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `integrantes_ibfk_2` FOREIGN KEY (`grado`) REFERENCES `grado` (`id`),
  ADD CONSTRAINT `integrantes_ibfk_3` FOREIGN KEY (`nivel_estudios`) REFERENCES `nivel_estudios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `vivienda_ibfk_1` FOREIGN KEY (`fk_familia`) REFERENCES `familias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
