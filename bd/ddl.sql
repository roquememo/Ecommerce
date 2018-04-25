

/*Importante crear base de datos ecommerce antes de ejecutar script */;

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_direccion` varchar(95) DEFAULT NULL,
  `direccion_2` varchar(95) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `coordenada` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `Metodos_Pago`;
CREATE TABLE `Metodos_Pago` (
  `idMetodos_Pago` int(11) NOT NULL,
  `descripcion_pago` varchar(45) DEFAULT NULL,
  `cuenta` varchar(45) DEFAULT NULL,
  `contaseña` varchar(45) DEFAULT NULL,
  `monto_acumulado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMetodos_Pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`,`id_categoria`),
  KEY `fk_productos_categoria1_idx` (`id_categoria`),
  CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(55) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_direccion`),
  KEY `fk_usuario_direccion1_idx` (`id_direccion`),
  CONSTRAINT `fk_usuario_direccion1` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_carrito`,`id_usuario`),
  KEY `fk_carrito_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_carrito_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `carrito_has_productos`;
CREATE TABLE `carrito_has_productos` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrito`,`id_producto`),
  KEY `fk_carrito_has_productos_productos1_idx` (`id_producto`),
  KEY `fk_carrito_has_productos_carrito1_idx` (`id_carrito`),
  CONSTRAINT `fk_carrito_has_productos_carrito1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrito_has_productos_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado_envio` varchar(45) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_carrito` int(11) NOT NULL,
  `qr` varchar(150) DEFAULT NULL,
  `idMetodos_Pago` int(11) NOT NULL,
  PRIMARY KEY (`id_compras`,`id_carrito`,`idMetodos_Pago`),
  KEY `fk_compras_carrito1_idx` (`id_carrito`),
  KEY `fk_compras_Metodos_Pago1_idx` (`idMetodos_Pago`),
  CONSTRAINT `fk_compras_Metodos_Pago1` FOREIGN KEY (`idMetodos_Pago`) REFERENCES `Metodos_Pago` (`idMetodos_Pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_carrito1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `foto_producto`;
CREATE TABLE `foto_producto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(259) DEFAULT NULL,
  `principal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`,`id_producto`),
  KEY `fk_foto_producto_productos1_idx` (`id_producto`),
  CONSTRAINT `fk_foto_producto_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `TIckets`;
CREATE TABLE `TIckets` (
  `idTickets` int(11) NOT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_apertura` date DEFAULT NULL,
  `fecha_resolucion` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idTickets`,`id_usuario`),
  KEY `fk_TIckets_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_TIckets_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2018-04-16 04:05:00
