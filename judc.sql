/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : judc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-17 14:33:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `alumno`
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `IdPersona` int(11) NOT NULL,
  `IdTurno` int(11) NOT NULL,
  `IdCarrera` int(11) NOT NULL,
  `Carnet` varchar(8) CHARACTER SET utf8 NOT NULL,
  `AnioAcademico` int(11) NOT NULL,
  `Actual` bit(1) NOT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `FK_dbo.Alumno_dbo.Carrera_IdCarrera` (`IdCarrera`),
  KEY `FK_dbo.Alumno_dbo.Turno_IdTurno` (`IdTurno`),
  CONSTRAINT `FK_dbo.Alumno_dbo.Carrera_IdCarrera` FOREIGN KEY (`IdCarrera`) REFERENCES `carrera` (`IdTitulo`),
  CONSTRAINT `FK_dbo.Alumno_dbo.Persona_IdPersona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`),
  CONSTRAINT `FK_dbo.Alumno_dbo.Turno_IdTurno` FOREIGN KEY (`IdTurno`) REFERENCES `turno` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES ('1', '1', '1', '32155765', '4', '');
INSERT INTO `alumno` VALUES ('2', '2', '1', '12345678', '4', '');
INSERT INTO `alumno` VALUES ('3', '2', '1', '12345677', '4', '');
INSERT INTO `alumno` VALUES ('4', '3', '4', '06063807', '5', '');
INSERT INTO `alumno` VALUES ('5', '5', '2', '16063316', '3', '');

-- ----------------------------
-- Table structure for `anio`
-- ----------------------------
DROP TABLE IF EXISTS `anio`;
CREATE TABLE `anio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of anio
-- ----------------------------
INSERT INTO `anio` VALUES ('1', '2018', '1');

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', 'Ciencias de la informatica');
INSERT INTO `area` VALUES ('2', 'Humanidades y CCSS');
INSERT INTO `area` VALUES ('3', 'Ciencias Economicas');
INSERT INTO `area` VALUES ('4', 'Ciencias Agricolas');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('administrator', '1', '1502393734');
INSERT INTO `auth_assignment` VALUES ('estudiante', '4', '1502920005');
INSERT INTO `auth_assignment` VALUES ('estudiante', '5', '1504828262');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1502241553', '1502241553');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/about', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/captcha', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/contact', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1502241594', '1502241594');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/assignments', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/block', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/create', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/info', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/switch', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/update', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/admin/update-profile', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/index', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/profile/show', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/request', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/recovery/reset', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/connect', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/register', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/registration/resend', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/auth', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/login', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/security/logout', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/*', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/account', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/confirm', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/delete', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/disconnect', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/networks', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('/user/settings/profile', '2', null, null, null, '1502241593', '1502241593');
INSERT INTO `auth_item` VALUES ('administrator', '1', null, null, null, '1502241539', '1502241689');
INSERT INTO `auth_item` VALUES ('estudiante', '1', null, null, null, '1502914131', '1502914131');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('administrator', '/*');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `carrera`
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `IdTitulo` int(11) NOT NULL,
  `IdDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`IdTitulo`),
  KEY `FK_dbo.Carrera_dbo.Departamento_IdDepartamento` (`IdDepartamento`),
  CONSTRAINT `FK_dbo.Carrera_dbo.Departamento_IdDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`Id`),
  CONSTRAINT `FK_dbo.Carrera_dbo.Titulo_IdTitulo` FOREIGN KEY (`IdTitulo`) REFERENCES `titulo` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES ('1', '1');
INSERT INTO `carrera` VALUES ('2', '1');
INSERT INTO `carrera` VALUES ('3', '1');
INSERT INTO `carrera` VALUES ('4', '1');
INSERT INTO `carrera` VALUES ('5', '1');

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Informe de Investigacion');
INSERT INTO `categoria` VALUES ('2', 'Ensayo');
INSERT INTO `categoria` VALUES ('3', 'Proceso de Enfermeria');
INSERT INTO `categoria` VALUES ('4', 'Proyecto');

-- ----------------------------
-- Table structure for `configuracion`
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of configuracion
-- ----------------------------
INSERT INTO `configuracion` VALUES ('2', '90', 'Nota minima primer lugar');
INSERT INTO `configuracion` VALUES ('3', '80', 'Nota minima segundo lugar');
INSERT INTO `configuracion` VALUES ('4', '70', 'Nota minima tercer lugar');
INSERT INTO `configuracion` VALUES ('5', '12:00', 'Hora de receso de exposiciones');
INSERT INTO `configuracion` VALUES ('6', '01:00', 'Duracion de receso de exposiciones');
INSERT INTO `configuracion` VALUES ('7', '00:20', 'Duracion de exposiciones');
INSERT INTO `configuracion` VALUES ('8', '4', 'Participantes por trabajo');
INSERT INTO `configuracion` VALUES ('9', '2018', 'Año actual de operacion');

-- ----------------------------
-- Table structure for `departamento`
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Acronimo` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('1', 'Ciencias Tecnologia y Salud', 'DCTS');
INSERT INTO `departamento` VALUES ('2', 'Ciencias de la Educacion y Humanidades', 'DCEH');
INSERT INTO `departamento` VALUES ('3', 'Ciencias Economicas y Administrativas', 'DCEA');

-- ----------------------------
-- Table structure for `docente`
-- ----------------------------
DROP TABLE IF EXISTS `docente`;
CREATE TABLE `docente` (
  `IdPersona` int(11) NOT NULL,
  `IdTitulo` int(11) NOT NULL,
  `IdArea` int(11) NOT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `FK_dbo.Docente_dbo.Area_IdArea` (`IdArea`),
  KEY `FK_dbo.Docente_dbo.Titulo_IdTitulo` (`IdTitulo`),
  CONSTRAINT `FK_dbo.Docente_dbo.Area_IdArea` FOREIGN KEY (`IdArea`) REFERENCES `area` (`Id`),
  CONSTRAINT `FK_dbo.Docente_dbo.Persona_IdPersona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`),
  CONSTRAINT `FK_dbo.Docente_dbo.Titulo_IdTitulo` FOREIGN KEY (`IdTitulo`) REFERENCES `titulo` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of docente
-- ----------------------------
INSERT INTO `docente` VALUES ('1', '1', '1');
INSERT INTO `docente` VALUES ('4', '6', '1');
INSERT INTO `docente` VALUES ('6', '5', '2');

-- ----------------------------
-- Table structure for `evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `IdTrabajo` int(11) NOT NULL,
  `IdParametro` int(11) NOT NULL,
  `IdJurado` int(11) NOT NULL,
  `Calificacion` decimal(20,10) NOT NULL,
  PRIMARY KEY (`IdTrabajo`,`IdParametro`,`IdJurado`),
  KEY `FK_dbo.Evaluacion_dbo.Jurado_IdJurado` (`IdJurado`),
  KEY `FK_dbo.Evaluacion_dbo.Parametro_IdParametro` (`IdParametro`),
  CONSTRAINT `FK_dbo.Evaluacion_dbo.Jurado_IdJurado` FOREIGN KEY (`IdJurado`) REFERENCES `jurado` (`Id`),
  CONSTRAINT `FK_dbo.Evaluacion_dbo.Parametro_IdParametro` FOREIGN KEY (`IdParametro`) REFERENCES `parametro` (`Id`),
  CONSTRAINT `FK_dbo.Evaluacion_dbo.Trabajo_IdTrabajo` FOREIGN KEY (`IdTrabajo`) REFERENCES `trabajo` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------

-- ----------------------------
-- Table structure for `jurado`
-- ----------------------------
DROP TABLE IF EXISTS `jurado`;
CREATE TABLE `jurado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoParametro` int(11) NOT NULL,
  `IdSala` int(11) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  `IdAnio` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Jurado_dbo.Anio_IdAnio` (`IdAnio`),
  KEY `FK_dbo.Jurado_dbo.Docente_IdDocente` (`IdDocente`),
  KEY `FK_dbo.Jurado_dbo.Sala_IdSala` (`IdSala`),
  KEY `FK_dbo.Jurado_dbo.TipoParametro_IdTipoParametro` (`IdTipoParametro`),
  CONSTRAINT `FK_dbo.Jurado_dbo.Anio_IdAnio` FOREIGN KEY (`IdAnio`) REFERENCES `anio` (`Id`),
  CONSTRAINT `FK_dbo.Jurado_dbo.Docente_IdDocente` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdPersona`),
  CONSTRAINT `FK_dbo.Jurado_dbo.Sala_IdSala` FOREIGN KEY (`IdSala`) REFERENCES `sala` (`Id`) ON DELETE CASCADE,
  CONSTRAINT `FK_dbo.Jurado_dbo.TipoParametro_IdTipoParametro` FOREIGN KEY (`IdTipoParametro`) REFERENCES `tipoparametro` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of jurado
-- ----------------------------
INSERT INTO `jurado` VALUES ('5', '1', '1', '1', '1');
INSERT INTO `jurado` VALUES ('6', '2', '1', '4', '1');
INSERT INTO `jurado` VALUES ('7', '2', '1', '4', '1');
INSERT INTO `jurado` VALUES ('8', '2', '1', '1', '1');
INSERT INTO `jurado` VALUES ('9', '1', '1', '4', '1');
INSERT INTO `jurado` VALUES ('10', '2', '1', '1', '1');
INSERT INTO `jurado` VALUES ('11', '1', '2', '1', '1');
INSERT INTO `jurado` VALUES ('12', '1', '2', '6', '1');
INSERT INTO `jurado` VALUES ('13', '1', '1', '1', '1');
INSERT INTO `jurado` VALUES ('14', '2', '2', '6', '1');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `IdPersona` int(11) NOT NULL,
  `TipoUsuario` int(11) NOT NULL,
  `Hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`IdPersona`),
  CONSTRAINT `FK_dbo.Login_dbo.Persona_IdPersona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of login
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1502214347');
INSERT INTO `migration` VALUES ('m140209_132017_init', '1502214354');
INSERT INTO `migration` VALUES ('m140403_174025_create_account_table', '1502214354');
INSERT INTO `migration` VALUES ('m140504_113157_update_tables', '1502214356');
INSERT INTO `migration` VALUES ('m140504_130429_create_token_table', '1502214357');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1502241345');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1502240994');
INSERT INTO `migration` VALUES ('m140830_171933_fix_ip_field', '1502214357');
INSERT INTO `migration` VALUES ('m140830_172703_change_account_table_name', '1502214357');
INSERT INTO `migration` VALUES ('m141222_110026_update_ip_field', '1502214358');
INSERT INTO `migration` VALUES ('m141222_135246_alter_username_length', '1502214358');
INSERT INTO `migration` VALUES ('m150614_103145_update_social_account_table', '1502214359');
INSERT INTO `migration` VALUES ('m150623_212711_fix_username_notnull', '1502214359');
INSERT INTO `migration` VALUES ('m151218_234654_add_timezone_to_profile', '1502214359');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1502240994');

-- ----------------------------
-- Table structure for `nivelacademico`
-- ----------------------------
DROP TABLE IF EXISTS `nivelacademico`;
CREATE TABLE `nivelacademico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Acronimo` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of nivelacademico
-- ----------------------------
INSERT INTO `nivelacademico` VALUES ('1', 'Licenciatura', 'Lic.');
INSERT INTO `nivelacademico` VALUES ('2', 'Ingenieria', 'Ing.');
INSERT INTO `nivelacademico` VALUES ('3', 'Maestria', 'M Sc.');
INSERT INTO `nivelacademico` VALUES ('4', 'Doctorado', 'Ph D.');

-- ----------------------------
-- Table structure for `origen`
-- ----------------------------
DROP TABLE IF EXISTS `origen`;
CREATE TABLE `origen` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of origen
-- ----------------------------
INSERT INTO `origen` VALUES ('1', 'Trabajo de Curso');
INSERT INTO `origen` VALUES ('2', 'Monografico');
INSERT INTO `origen` VALUES ('3', 'Iniciativa Propia');
INSERT INTO `origen` VALUES ('4', 'Otros');

-- ----------------------------
-- Table structure for `parametro`
-- ----------------------------
DROP TABLE IF EXISTS `parametro`;
CREATE TABLE `parametro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoParametro` int(11) NOT NULL,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Parametro_dbo.TipoParametro_IdTipoParametro` (`IdTipoParametro`),
  CONSTRAINT `FK_dbo.Parametro_dbo.TipoParametro_IdTipoParametro` FOREIGN KEY (`IdTipoParametro`) REFERENCES `tipoparametro` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of parametro
-- ----------------------------
INSERT INTO `parametro` VALUES ('1', '2', 'Calidad de las diapositivas');
INSERT INTO `parametro` VALUES ('2', '1', 'Resumen');
INSERT INTO `parametro` VALUES ('3', '1', 'Desarrollo');
INSERT INTO `parametro` VALUES ('4', '1', 'Conclusion');
INSERT INTO `parametro` VALUES ('5', '2', 'Tiempo de exposicion');

-- ----------------------------
-- Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sexo` varchar(18) CHARACTER SET utf8 NOT NULL,
  `Nombre2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Nombre1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Apellido2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Apellido1` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Masculino', 'Noel', 'Erick', 'Martinez', 'Lanzas');
INSERT INTO `persona` VALUES ('2', 'Femenino', '', 'Laura', '', 'Rayo');
INSERT INTO `persona` VALUES ('3', 'Femenino', '', 'Wilmer', '', 'Palacios');
INSERT INTO `persona` VALUES ('4', 'Masculino', '', 'Norman', '', 'Arauz');
INSERT INTO `persona` VALUES ('5', 'Masculino', '', 'Everth', '', 'Salazar');
INSERT INTO `persona` VALUES ('6', 'Femenino', '', 'Yadira', '', 'Lanzas');

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `puntaje`
-- ----------------------------
DROP TABLE IF EXISTS `puntaje`;
CREATE TABLE `puntaje` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` decimal(20,10) NOT NULL,
  `IdParametro` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdAnio` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Puntaje_dbo.Anio_IdAnio` (`IdAnio`),
  KEY `FK_dbo.Puntaje_dbo.Categoria_IdCategoria` (`IdCategoria`),
  KEY `FK_dbo.Puntaje_dbo.Parametro_IdParametro` (`IdParametro`),
  CONSTRAINT `FK_dbo.Puntaje_dbo.Anio_IdAnio` FOREIGN KEY (`IdAnio`) REFERENCES `anio` (`Id`),
  CONSTRAINT `FK_dbo.Puntaje_dbo.Categoria_IdCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`Id`),
  CONSTRAINT `FK_dbo.Puntaje_dbo.Parametro_IdParametro` FOREIGN KEY (`IdParametro`) REFERENCES `parametro` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of puntaje
-- ----------------------------
INSERT INTO `puntaje` VALUES ('1', '5.0000000000', '1', '1', '1');
INSERT INTO `puntaje` VALUES ('3', '5.0000000000', '2', '2', '1');
INSERT INTO `puntaje` VALUES ('4', '7.0000000000', '3', '2', '1');
INSERT INTO `puntaje` VALUES ('5', '3.0000000000', '5', '2', '1');

-- ----------------------------
-- Table structure for `sala`
-- ----------------------------
DROP TABLE IF EXISTS `sala`;
CREATE TABLE `sala` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdJefeSala` int(11) NOT NULL,
  `InicioExposicion` datetime DEFAULT NULL,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Codigo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `IdAnio` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Sala_dbo.Anio_IdAnio` (`IdAnio`),
  KEY `FK_dbo.Sala_dbo.Docente_IdJefeSala` (`IdJefeSala`),
  CONSTRAINT `FK_dbo.Sala_dbo.Anio_IdAnio` FOREIGN KEY (`IdAnio`) REFERENCES `anio` (`Id`),
  CONSTRAINT `FK_dbo.Sala_dbo.Docente_IdJefeSala` FOREIGN KEY (`IdJefeSala`) REFERENCES `docente` (`IdPersona`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of sala
-- ----------------------------
INSERT INTO `sala` VALUES ('1', '1', null, 'Computacion', 'COMP', '1');
INSERT INTO `sala` VALUES ('2', '4', null, 'Turismo', 'TUR', '1');
INSERT INTO `sala` VALUES ('3', '4', '2018-06-29 00:00:00', 'Trabajo Social', 'TRABS', '1');

-- ----------------------------
-- Table structure for `social_account`
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of social_account
-- ----------------------------

-- ----------------------------
-- Table structure for `tipoparametro`
-- ----------------------------
DROP TABLE IF EXISTS `tipoparametro`;
CREATE TABLE `tipoparametro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tipoparametro
-- ----------------------------
INSERT INTO `tipoparametro` VALUES ('1', 'Escrito');
INSERT INTO `tipoparametro` VALUES ('2', 'Expuesto');

-- ----------------------------
-- Table structure for `titulo`
-- ----------------------------
DROP TABLE IF EXISTS `titulo`;
CREATE TABLE `titulo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdNivelAcademico` int(11) NOT NULL,
  `Definicion` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Titulo_dbo.NivelAcademico_IdNivelAcademico` (`IdNivelAcademico`),
  CONSTRAINT `FK_dbo.Titulo_dbo.NivelAcademico_IdNivelAcademico` FOREIGN KEY (`IdNivelAcademico`) REFERENCES `nivelacademico` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of titulo
-- ----------------------------
INSERT INTO `titulo` VALUES ('1', '2', 'en Sistemas de Informacion');
INSERT INTO `titulo` VALUES ('2', '1', '');
INSERT INTO `titulo` VALUES ('3', '2', '');
INSERT INTO `titulo` VALUES ('4', '3', '');
INSERT INTO `titulo` VALUES ('5', '4', '');
INSERT INTO `titulo` VALUES ('6', '3', 'Gerencia Empresarial');

-- ----------------------------
-- Table structure for `token`
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of token
-- ----------------------------

-- ----------------------------
-- Table structure for `trabajo`
-- ----------------------------
DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE `trabajo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTutor` int(11) NOT NULL,
  `Titulo` varchar(18) CHARACTER SET utf8 NOT NULL,
  `IdSala` int(11) NOT NULL,
  `PrimerVez` bit(1) NOT NULL,
  `IdOrigen` int(11) NOT NULL,
  `Observaciones` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `FechaExposicion` datetime DEFAULT NULL,
  `DocumentoEntregado` bit(1) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdAsesor` int(11) DEFAULT NULL,
  `IdArea` int(11) NOT NULL,
  `IdAnio` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_dbo.Trabajo_dbo.Area_IdArea` (`IdArea`),
  KEY `FK_dbo.Trabajo_dbo.Categoria_IdCategoria` (`IdCategoria`),
  KEY `FK_dbo.Trabajo_dbo.Docente_IdAsesor` (`IdAsesor`),
  KEY `FK_dbo.Trabajo_dbo.Docente_IdTutor` (`IdTutor`),
  KEY `FK_dbo.Trabajo_dbo.Origen_IdOrigen` (`IdOrigen`),
  KEY `FK_dbo.Trabajo_dbo.Sala_IdSala` (`IdSala`),
  KEY `FK_dbo.Trabajo_dbo.Anio_IdAnio` (`IdAnio`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Anio_IdAnio` FOREIGN KEY (`IdAnio`) REFERENCES `anio` (`Id`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Area_IdArea` FOREIGN KEY (`IdArea`) REFERENCES `area` (`Id`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Categoria_IdCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`Id`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Docente_IdAsesor` FOREIGN KEY (`IdAsesor`) REFERENCES `docente` (`IdPersona`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Docente_IdTutor` FOREIGN KEY (`IdTutor`) REFERENCES `docente` (`IdPersona`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Origen_IdOrigen` FOREIGN KEY (`IdOrigen`) REFERENCES `origen` (`Id`),
  CONSTRAINT `FK_dbo.Trabajo_dbo.Sala_IdSala` FOREIGN KEY (`IdSala`) REFERENCES `sala` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of trabajo
-- ----------------------------
INSERT INTO `trabajo` VALUES ('8', '4', 'dv,mndflb ', '1', '', '1', '', '2018-06-08 12:25:00', '', '1', '1', '1', '1');
INSERT INTO `trabajo` VALUES ('9', '4', 'dv,mndflb ', '1', '', '1', '', '2018-06-08 12:25:00', '', '1', '1', '1', '1');
INSERT INTO `trabajo` VALUES ('32', '1', 'afdsjk', '1', '', '3', '', null, '', '2', '1', '2', '1');
INSERT INTO `trabajo` VALUES ('33', '1', 'afdsjk', '1', '', '3', '', null, '', '2', '1', '2', '1');
INSERT INTO `trabajo` VALUES ('34', '1', 'ERICK', '1', '', '1', 'Ninguna', '2018-06-06 10:50:00', '', '2', null, '1', '1');
INSERT INTO `trabajo` VALUES ('35', '4', 'ALZNZS', '1', '', '2', '', '2018-06-08 13:55:00', '', '2', '4', '1', '1');
INSERT INTO `trabajo` VALUES ('37', '4', 'TETSTEAF', '2', '', '2', '', '2018-05-31 06:30:00', '', '4', null, '2', '1');
INSERT INTO `trabajo` VALUES ('38', '1', ';LKDFVKLK', '1', '', '3', 'lkrfo', '2018-05-29 01:05:00', '', '2', '4', '2', '1');

-- ----------------------------
-- Table structure for `trabajoalumno`
-- ----------------------------
DROP TABLE IF EXISTS `trabajoalumno`;
CREATE TABLE `trabajoalumno` (
  `IdTrabajo` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  PRIMARY KEY (`IdTrabajo`,`IdPersona`),
  KEY `FK_dbo.TrabajoAlumno_dbo.Alumno_Id` (`IdPersona`),
  CONSTRAINT `FK_dbo.TrabajoAlumno_dbo.Alumno_Id` FOREIGN KEY (`IdPersona`) REFERENCES `alumno` (`IdPersona`) ON DELETE CASCADE,
  CONSTRAINT `FK_dbo.TrabajoAlumno_dbo.Trabajo_IdPersona` FOREIGN KEY (`IdTrabajo`) REFERENCES `trabajo` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of trabajoalumno
-- ----------------------------
INSERT INTO `trabajoalumno` VALUES ('33', '2');
INSERT INTO `trabajoalumno` VALUES ('34', '2');
INSERT INTO `trabajoalumno` VALUES ('34', '3');
INSERT INTO `trabajoalumno` VALUES ('34', '5');
INSERT INTO `trabajoalumno` VALUES ('35', '3');
INSERT INTO `trabajoalumno` VALUES ('37', '3');
INSERT INTO `trabajoalumno` VALUES ('38', '5');

-- ----------------------------
-- Table structure for `turno`
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Definicion` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of turno
-- ----------------------------
INSERT INTO `turno` VALUES ('1', 'Matutino');
INSERT INTO `turno` VALUES ('2', 'Vespertino');
INSERT INTO `turno` VALUES ('3', 'Nocturno');
INSERT INTO `turno` VALUES ('4', 'Diurno');
INSERT INTO `turno` VALUES ('5', 'Sabatino');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '10',
  `password_reset_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin@sistema.com', '$2y$10$3nA/940k.8RmZGLwNfC2rON0HYezkN56KBhE8mtwI4pJZxRWPW00K', 'XfgoBGpBjSIYCya9QxAq1ZpU76y_ncah', '1523649840', null, null, '::1', '1523649741', '1523649741', '0', '10', null);

-- ----------------------------
-- View structure for `anioactual`
-- ----------------------------
DROP VIEW IF EXISTS `anioactual`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anioactual` AS select `listaanioactual`.`IdAnio` AS `IdAnio` from `listaanioactual` where (`listaanioactual`.`EstadoAnio` < 4) ;

-- ----------------------------
-- View structure for `listaalumnos`
-- ----------------------------
DROP VIEW IF EXISTS `listaalumnos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listaalumnos` AS select `alumno`.`IdPersona` AS `IdPersona`,`alumno`.`Carnet` AS `Carnet`,`listapersonas`.`NombreCompleto` AS `NombreCompleto`,`listapersonas`.`Sexo` AS `Sexo`,`listatitulos`.`Carrera` AS `Carrera`,`alumno`.`Actual` AS `Actual` from ((`alumno` join `listapersonas`) join `listatitulos`) where ((`alumno`.`IdPersona` = `listapersonas`.`Id`) and (`alumno`.`IdCarrera` = `listatitulos`.`Id`)) ;

-- ----------------------------
-- View structure for `listaanioactual`
-- ----------------------------
DROP VIEW IF EXISTS `listaanioactual`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listaanioactual` AS select `anio`.`Id` AS `IdAnio`,`anio`.`Valor` AS `ValorAnio`,`anio`.`Estado` AS `EstadoAnio` from (`anio` join `configuracion`) where (`anio`.`Valor` = `configuracion`.`Valor`) ;

-- ----------------------------
-- View structure for `listadocentes`
-- ----------------------------
DROP VIEW IF EXISTS `listadocentes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listadocentes` AS select `docente`.`IdPersona` AS `IdPersona`,`listapersonas`.`NombreCompleto` AS `NombreCompleto`,`listatitulos`.`Carrera` AS `Carrera`,`listatitulos`.`Acronimo` AS `Acronimo` from ((`docente` join `listapersonas`) join `listatitulos`) where ((`docente`.`IdPersona` = `listapersonas`.`Id`) and (`docente`.`IdTitulo` = `listatitulos`.`Id`)) ;

-- ----------------------------
-- View structure for `listapersonas`
-- ----------------------------
DROP VIEW IF EXISTS `listapersonas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listapersonas` AS select concat(`persona`.`Nombre1`,' ',`persona`.`Nombre2`,' ',`persona`.`Apellido1`,' ',`persona`.`Apellido2`) AS `NombreCompleto`,`persona`.`Nombre2` AS `Nombre2`,`persona`.`Nombre1` AS `Nombre1`,`persona`.`Apellido2` AS `Apellido2`,`persona`.`Apellido1` AS `Apellido1`,`persona`.`Sexo` AS `Sexo`,`persona`.`Id` AS `Id` from `persona` ;

-- ----------------------------
-- View structure for `listatitulos`
-- ----------------------------
DROP VIEW IF EXISTS `listatitulos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listatitulos` AS select concat(`nivelacademico`.`Acronimo`,' ',`titulo`.`Definicion`) AS `Carrera`,`titulo`.`Definicion` AS `Definicion`,`titulo`.`Id` AS `Id`,`nivelacademico`.`Acronimo` AS `Acronimo` from (`titulo` join `nivelacademico`) where (`titulo`.`IdNivelAcademico` = `nivelacademico`.`Id`) ;

-- ----------------------------
-- View structure for `trabajoxsala`
-- ----------------------------
DROP VIEW IF EXISTS `trabajoxsala`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trabajoxsala` AS select `trabajo`.`Id` AS `IdTrabajo`,`trabajo`.`Titulo` AS `Titulo`,`parametro`.`Id` AS `IdParametro`,`jurado`.`Id` AS `IdJurado`,`categoria`.`Id` AS `IdCategoria`,`trabajo`.`IdSala` AS `IdSala` from (((`trabajo` join `jurado` on((`trabajo`.`IdSala` = `jurado`.`IdSala`))) join `parametro` on((`jurado`.`IdTipoParametro` = `parametro`.`IdTipoParametro`))) join `categoria` on((`trabajo`.`IdCategoria` = `categoria`.`Id`))) ;
