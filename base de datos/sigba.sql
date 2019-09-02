/*
 Navicat Premium Data Transfer

 Source Server         : Tec_Colima
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : sigba

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 02/09/2019 10:05:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articulo
-- ----------------------------
DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `unidad_Medida` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for banco_alimentos
-- ----------------------------
DROP TABLE IF EXISTS `banco_alimentos`;
CREATE TABLE `banco_alimentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` decimal(10, 0) NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for colaboradores
-- ----------------------------
DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE `colaboradores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` decimal(10, 0) NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for donadores
-- ----------------------------
DROP TABLE IF EXISTS `donadores`;
CREATE TABLE `donadores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` decimal(10, 0) NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `recibo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` decimal(10, 0) NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for proyectos
-- ----------------------------
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` decimal(10, 0) NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `recibo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Procedure structure for sp_AgregarArticulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarArticulo`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarArticulo`(IN `pnombre` varchar(60),IN `pu_Medida` varchar(20))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM articulo
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	INSERT INTO articulo (nombre, unidad_Medida)
	VALUES (UPPER(pnombre),UPPER(pu_Medida));
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Registrado' AS msg;
	else 
	select 'Articulo Existente' AS msg;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarBanco
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarBanco`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarBanco`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM banco_alimentos
	WHERE RFC	LIKE prfc) = 0 THEN
	
	INSERT INTO banco_alimentos (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo)
	VALUES (UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo));
	select 'Banco Registrado' AS msg;
	else 
	select 'Banco Existente' AS msg;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarColaborador
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarColaborador`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarColaborador`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM colaboradores
	WHERE RFC	LIKE bRFC) = 0 THEN
	
	INSERT INTO colaboradores (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo)
	VALUES (prazon_Social, prfc, pcalle, pnum_Interior, pnum_Exterior, pcolonia, pcodPostal, pnombre_Contacto, ptelefono, pcelular, pcorreo);
	
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarDonador
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarDonador`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarDonador`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30),in	`precibo` VARCHAR(50))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM donadores
	WHERE RFC	LIKE prfc) = 0 THEN
	
	INSERT INTO donadores (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo,recibo)
	VALUES (UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo),UPPER(precibo));
	select 'Donador Registrado' AS msg;
	else 
	select 'Donador Existente' AS msg;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarProveedor`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarProveedor`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM proveedores
	WHERE RFC	LIKE prfc) = 0 THEN
	
	INSERT INTO proveedores (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo)
	VALUES (UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo));
	select 'Proveedor Registrado' AS msg;
	else 
	select 'Proveedor Existente' AS msg;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarProyecto
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarProyecto`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarProyecto`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30),in	`precibo` VARCHAR(50))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM proyectos
	WHERE RFC	LIKE prfc) = 0 THEN
	
	INSERT INTO proyectos (razon_Social, rfc, calle, num_Interior, num_Exterior, colonia, codPostal, nombre_Contacto, telefono, celular, correo,recibo)
	VALUES (UPPER(prazon_Social),UPPER(prfc) , UPPER(pcalle), UPPER(pnum_Interior), UPPER(pnum_Exterior), UPPER(pcolonia), UPPER(pcodPostal), UPPER(pnombre_Contacto), UPPER(ptelefono), UPPER(pcelular), UPPER(pcorreo),UPPER(precibo));
	select 'Proyecto Registrado' AS msg;
	else 
	select 'Proyecto Existente' AS msg;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarArticulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarArticulo`;
delimiter ;;
CREATE PROCEDURE `sp_EditarArticulo`(IN `pid` INT(11),IN `pnombre` varchar(60),IN `pu_Medida` varchar(20))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM articulo
	WHERE nombre	LIKE pnombre) = 0 THEN
	
	UPDATE  articulo SET nombre = UPPER(pnombre), unidad_Medida = UPPER(pu_Medida)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Actualizado' AS msg;
	else 
	select 'Articulo Existente' AS msg;
	end if;
	end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarBanco
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarBanco`;
delimiter ;;
CREATE PROCEDURE `sp_EditarBanco`(in `pid` INT(11),IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30))
BEGIN
	#Routine body goes here...
	
	
	
	update  banco_alimentos set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc), calle = UPPER(pcalle), num_Interior = UPPER(pnum_Interior), num_Exterior = UPPER(pnum_Exterior), colonia = UPPER(pcolonia), codPostal = UPPER(pcodPostal), nombre_Contacto = UPPER(pnombre_Contacto), telefono = UPPER(ptelefono), celular = UPPER(pcelular), correo = UPPER(pcorreo)
	where id =  pid;
	
	select 'Banco Actualizado' AS msg;
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarDonador
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarDonador`;
delimiter ;;
CREATE PROCEDURE `sp_EditarDonador`(in `pid` INT(11),IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo`  VARCHAR(50))
BEGIN
	#Routine body goes here...
	
	
	
	update  donadores set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc), calle = UPPER(pcalle), num_Interior = UPPER(pnum_Interior), num_Exterior = UPPER(pnum_Exterior), colonia = UPPER(pcolonia), codPostal = UPPER(pcodPostal), nombre_Contacto = UPPER(pnombre_Contacto), telefono = UPPER(ptelefono), celular = UPPER(pcelular), correo = UPPER(pcorreo) ,recibo = UPPER(precibo)
	where id =  pid;
	
	select 'Donador Actualizado' AS msg;
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarProveedor`;
delimiter ;;
CREATE PROCEDURE `sp_EditarProveedor`(in `pid` INT(11),IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30))
BEGIN
	#Routine body goes here...
	
	
	
	update  proveedores set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc), calle = UPPER(pcalle), num_Interior = UPPER(pnum_Interior), num_Exterior = UPPER(pnum_Exterior), colonia = UPPER(pcolonia), codPostal = UPPER(pcodPostal), nombre_Contacto = UPPER(pnombre_Contacto), telefono = UPPER(ptelefono), celular = UPPER(pcelular), correo = UPPER(pcorreo)
	where id =  pid;
	
	select 'Proveedor Actualizado' AS msg;
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarProyecto
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarProyecto`;
delimiter ;;
CREATE PROCEDURE `sp_EditarProyecto`(in `pid` INT(11),IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` varchar(5), IN `pnum_Exterior` varchar(5), IN `pcolonia` varchar(50), IN `pcodPostal` decimal(10), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` VARCHAR(10), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30), IN `precibo`  VARCHAR(50))
BEGIN
	#Routine body goes here...
	
	
	
	update  proyectos set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc), calle = UPPER(pcalle), num_Interior = UPPER(pnum_Interior), num_Exterior = UPPER(pnum_Exterior), colonia = UPPER(pcolonia), codPostal = UPPER(pcodPostal), nombre_Contacto = UPPER(pnombre_Contacto), telefono = UPPER(ptelefono), celular = UPPER(pcelular), correo = UPPER(pcorreo) ,recibo = UPPER(precibo)
	where id =  pid;
	
	select 'Proyecto Actualizado' AS msg;
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarArticulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarArticulo`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarArticulo`(IN pid INT(11))
BEGIN
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
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarBanco
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarBanco`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarBanco`(IN pid INT(11))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM banco_alimentos
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Banco No Existente' AS msg;
	else 
	select 'Banco Eliminado' AS msg;
	DELETE FROM banco_alimentos WHERE id = pid;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarDonador
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarDonador`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarDonador`(IN pid INT(11))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM donadores
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Donador No Existente' AS msg;
	else 
	select 'Donador Eliminado' AS msg;
	DELETE FROM donadores WHERE id = pid;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarProveedor`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarProveedor`(IN pid INT(11))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM proveedores
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Proveedor No Existente' AS msg;
	else 
	select 'Proveedor Eliminado' AS msg;
	DELETE FROM proveedores WHERE id = pid;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarProyecto
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarProyecto`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarProyecto`(IN pid INT(11))
BEGIN
	#Routine body goes here...
	
	IF (SELECT count(1)FROM proyectos
	WHERE id	= pid) = 0 THEN
	
	
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Proyecto No Existente' AS msg;
	else 
	select 'Proyecto Eliminado' AS msg;
	DELETE FROM proyectos WHERE id = pid;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_RFCProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RFCProveedor`;
delimiter ;;
CREATE PROCEDURE `sp_RFCProveedor`(IN prfc VARCHAR(50))
BEGIN
	IF (SELECT count(1)FROM proveedores
	WHERE RFC	LIKE prfc) = 0 THEN
	select prfc AS msg;
	select 'No existe' as msg;
	else 
	select * from proveedores where RFC like prfc;
	select 'Proveedore existente' as msg;
	END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
