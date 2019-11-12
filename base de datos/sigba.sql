/*
 Navicat Premium Data Transfer

 Source Server         : transporte
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : sigba

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 11/11/2019 20:55:53
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for entradas
-- ----------------------------
DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas`  (
  `identrada` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) NULL DEFAULT NULL,
  `idpersona` int(11) NULL DEFAULT NULL,
  `idunidad` int(11) NULL DEFAULT NULL,
  `precio_Compra` float(50, 0) NULL DEFAULT NULL,
  `precio_Venta` float(50, 0) NULL DEFAULT NULL,
  `fecha_Caducidad` date NULL DEFAULT NULL,
  `perecedero` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `existencia` int(11) NULL DEFAULT NULL,
  `fecha_Extincion` date NULL DEFAULT NULL,
  PRIMARY KEY (`identrada`) USING BTREE,
  INDEX `idarticulo`(`idarticulo`) USING BTREE,
  INDEX `idpersona`(`idpersona`) USING BTREE,
  INDEX `idunidad`(`idunidad`) USING BTREE,
  CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entradas_ibfk_3` FOREIGN KEY (`idunidad`) REFERENCES `unidad_medida` (`idunidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `razon_Social` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Interior` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `num_Exterior` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `colonia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codPostal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombre_Contacto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `celular` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `recibo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipoPer` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idpersona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for persona_tipo
-- ----------------------------
DROP TABLE IF EXISTS `persona_tipo`;
CREATE TABLE `persona_tipo`  (
  `idpersona` int(11) NULL DEFAULT NULL,
  `idtipo` int(11) NULL DEFAULT NULL,
  INDEX `idtipo`(`idtipo`) USING BTREE,
  INDEX `idpersona`(`idpersona`) USING BTREE,
  CONSTRAINT `persona_tipo_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tipo_persona
-- ----------------------------
DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE `tipo_persona`  (
  `idtipo` int(11) NULL DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  INDEX `idtipo`(`idtipo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for unidad_medida
-- ----------------------------
DROP TABLE IF EXISTS `unidad_medida`;
CREATE TABLE `unidad_medida`  (
  `idunidad` int(11) NOT NULL,
  `Clave_articulo` int(11) NOT NULL,
  `Unidad_medida` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idunidad`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for sp_Actualizar
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Actualizar`;
delimiter ;;
CREATE PROCEDURE `sp_Actualizar`(IN `pid` INT(11),IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` int(11), IN `pnum_Exterior` int(11), IN `pcolonia` varchar(50), IN `pcodPostal` int(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` int(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30),in `precibo` VARCHAR(50))
BEGIN

UPDATE persona set razon_Social = UPPER(prazon_Social), rfc = UPPER(prfc) ,calle = UPPER(pcalle),num_Interior = UPPER(pnum_Interior),num_Exterior =  UPPER(pnum_Exterior),colonia = UPPER(pcolonia),codPostal = UPPER(pcodPostal),nombre_Contacto = UPPER(pnombre_Contacto),telefono = UPPER(ptelefono),celular = UPPER(pcelular),correo = UPPER(pcorreo),recibo =UPPER(precibo) WHERE idpersona =  pid;

select "REGISTRO ACTUALIZADO" as msg;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_AgregarArticulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_AgregarArticulo`;
delimiter ;;
CREATE PROCEDURE `sp_AgregarArticulo`(IN `pnombre` varchar(60))
BEGIN
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
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EditarArticulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EditarArticulo`;
delimiter ;;
CREATE PROCEDURE `sp_EditarArticulo`(IN `pid` INT(11), IN `pnombre` VARCHAR(60))
BEGIN
	#Routine body goes here...
	
	
	
	UPDATE  articulo SET nombre = UPPER(pnombre)
	WHERE id = pid;
	
	#SELECT LAST_INSERT_ID() INTO id_Articulo;
	#SET id_Articulo = 0;
	select 'Articulo Actualizado' AS msg;
	end
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
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'BANCO DE ALIMENTOS ELIMINADO' AS msg;
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
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'DONADOR ELIMINADO' AS msg;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_EliminarPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_EliminarPersona`;
delimiter ;;
CREATE PROCEDURE `sp_EliminarPersona`(IN pid INT(11))
BEGIN
	#Routine body goes here...
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'REGISTRO ELIMINADO' AS msg;
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
	
	DELETE FROM persona WHERE idpersona = pid;

	SELECT  'PROVEEDOR ELIMINADO' AS msg;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_Registro
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Registro`;
delimiter ;;
CREATE PROCEDURE `sp_Registro`(IN `prazon_Social` varchar(50), IN `prfc` varchar(13), IN `pcalle` varchar(25), IN `pnum_Interior` int(11), IN `pnum_Exterior` int(11), IN `pcolonia` varchar(50), IN `pcodPostal` int(11), IN `pnombre_Contacto` VARCHAR(50), IN `ptelefono` int(11), IN `pcelular` VARCHAR(10), IN `pcorreo` VARCHAR(30),in `precibo` VARCHAR(50), IN `tipoPer` INT(11))
BEGIN
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
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_RFC
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RFC`;
delimiter ;;
CREATE PROCEDURE `sp_RFC`(IN prfc VARCHAR(50))
BEGIN
	IF (SELECT count(1)FROM persona
	WHERE rfc	LIKE prfc) = 0 THEN
	select 'NO' as msg;
	else 
	select 'SI' as msg;
	END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
