-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

CREATE DATABASE `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecommerce`;

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_carrito`,`id_usuario`),
  KEY `fk_carrito_usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `carrito_productos` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrito`,`id_producto`),
  KEY `fk_carrito_has_productos_productos1_idx` (`id_producto`),
  KEY `fk_carrito_has_productos_carrito1_idx` (`id_carrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado_envio` varchar(45) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_carrito` int(11) NOT NULL,
  PRIMARY KEY (`id_compras`,`id_carrito`),
  KEY `fk_compras_carrito1_idx` (`id_carrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_direccion` varchar(95) DEFAULT NULL,
  `direccion_2` varchar(95) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE `foto_producto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(259) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`,`id_producto`),
  KEY `fk_foto_producto_productos1_idx` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`,`id_categoria`),
  KEY `fk_productos_categoria1_idx` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(55) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_direccion`),
  KEY `fk_usuario_direccion_idx` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- 2017-11-05 18:26:39