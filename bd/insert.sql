-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';





INSERT INTO `direccion` (`id_direccion`, `nombre_direccion`, `direccion_2`, `ciudad`, `departamento`, `telefono1`, `telefono2`, `observaciones`) VALUES
(1,	'col nueva',	'col nueva 2',	'Tegucigalpa',	'Francisco morazan',	'99999999',	'88888888',	'hola')
ON DUPLICATE KEY UPDATE `id_direccion` = VALUES(`id_direccion`), `nombre_direccion` = VALUES(`nombre_direccion`), `direccion_2` = VALUES(`direccion_2`), `ciudad` = VALUES(`ciudad`), `departamento` = VALUES(`departamento`), `telefono1` = VALUES(`telefono1`), `telefono2` = VALUES(`telefono2`), `observaciones` = VALUES(`observaciones`);



INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `fecha_nac`, `id_direccion`) VALUES
(1,	'nuevo',	'perez',	'nuevo@gmail.com',	'hola',	NULL,	1)
ON DUPLICATE KEY UPDATE `id_usuario` = VALUES(`id_usuario`), `nombre` = VALUES(`nombre`), `apellido` = VALUES(`apellido`), `correo` = VALUES(`correo`), `password` = VALUES(`password`), `fecha_nac` = VALUES(`fecha_nac`), `id_direccion` = VALUES(`id_direccion`);

-- 2017-11-05 18:24:48
