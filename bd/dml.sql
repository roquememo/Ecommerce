-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `correo`, `password`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	'asd.123')
ON DUPLICATE KEY UPDATE `id_administrador` = VALUES(`id_administrador`), `nombre` = VALUES(`nombre`), `apellido` = VALUES(`apellido`), `correo` = VALUES(`correo`), `password` = VALUES(`password`);

INSERT INTO `carrito` (`id_carrito`, `estado`, `id_usuario`) VALUES
(1,	1,	1),
(2,	0,	3)
ON DUPLICATE KEY UPDATE `id_carrito` = VALUES(`id_carrito`), `estado` = VALUES(`estado`), `id_usuario` = VALUES(`id_usuario`);

INSERT INTO `carrito_has_productos` (`id_carrito`, `id_producto`, `cantidad`) VALUES
(2,	10,	1),
(2,	11,	1),
(2,	12,	1)
ON DUPLICATE KEY UPDATE `id_carrito` = VALUES(`id_carrito`), `id_producto` = VALUES(`id_producto`), `cantidad` = VALUES(`cantidad`);

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1,	'Ropa'),
(2,	'Tecnología'),
(4,	'Deportes'),
(5,	'Libros y Entretenimiento'),
(6,	'Zapatos')
ON DUPLICATE KEY UPDATE `id_categoria` = VALUES(`id_categoria`), `nombre_categoria` = VALUES(`nombre_categoria`);

INSERT INTO `compras` (`id_compras`, `fecha`, `monto`, `estado_envio`, `fecha_entrega`, `id_carrito`, `qr`, `idMetodos_Pago`) VALUES
(1,	'2018-04-24',	2600,	'PENDIENTE',	'2018-05-04',	2,	'../imagenes/codigos/qr497cd70ede423648ab89481f989587bb.png',	1)
ON DUPLICATE KEY UPDATE `id_compras` = VALUES(`id_compras`), `fecha` = VALUES(`fecha`), `monto` = VALUES(`monto`), `estado_envio` = VALUES(`estado_envio`), `fecha_entrega` = VALUES(`fecha_entrega`), `id_carrito` = VALUES(`id_carrito`), `qr` = VALUES(`qr`), `idMetodos_Pago` = VALUES(`idMetodos_Pago`);

INSERT INTO `direccion` (`id_direccion`, `nombre_direccion`, `direccion_2`, `ciudad`, `departamento`, `telefono1`, `telefono2`, `observaciones`, `coordenada`) VALUES
(1,	'Res centro america',	'col nueva 2',	'Tegucigalpa',	'Valle',	'99999999',	'88888888',	'hola',	NULL),
(2,	'holoa',	'hola2',	'tegucigalpa',	'Francisco MorazÃ¡n',	'12121212',	'12121212',	'hjkhkjhkj',	NULL),
(3,	'sdsdsdsd',	'dsdsdsd',	'tegucigalpa',	'Gracias a Dios',	'44553344',	'',	'',	'Your ubication is Lat: undefined  Lng: undefined'),
(4,	'lomas',	'pedregal',	'tegucigalpa',	'Francisco Morazán',	'33445544',	'22334454',	'',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736'),
(5,	'sitio',	'',	'Copan',	'Yoro',	'55664433',	'',	'',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736'),
(6,	'sitio',	'',	'copan',	'Intibucá',	'34455333',	'',	'',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736'),
(7,	'pedregal',	'',	'tegucigalpa',	'Francisco Morazán',	'44553344',	'22334455',	'dsds',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736'),
(8,	'dsddf',	'fdfdf',	'tegucigalpa',	'El Paraíso',	'33445533',	'',	'dsd',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736'),
(9,	'lomas',	'pedregal',	'tegucigalpa',	'La paz',	'22334433',	'66775544',	'dsdsd',	'Your ubication is Lat: 14.089643555012223  Lng: -87.24192652811736')
ON DUPLICATE KEY UPDATE `id_direccion` = VALUES(`id_direccion`), `nombre_direccion` = VALUES(`nombre_direccion`), `direccion_2` = VALUES(`direccion_2`), `ciudad` = VALUES(`ciudad`), `departamento` = VALUES(`departamento`), `telefono1` = VALUES(`telefono1`), `telefono2` = VALUES(`telefono2`), `observaciones` = VALUES(`observaciones`), `coordenada` = VALUES(`coordenada`);

INSERT INTO `foto_producto` (`id_foto`, `url`, `principal`, `id_producto`) VALUES
(1,	'imagenes/productos/f1.jpg',	1,	1),
(2,	'imagenes/productos/f2.jpg',	2,	1),
(3,	'imagenes/productos/f3.jpg',	3,	1),
(4,	'imagenes/productos/libro3.jpg',	1,	2),
(5,	'imagenes/productos/libro2.jpg',	1,	3),
(6,	'imagenes/productos/libro.jpg',	1,	4),
(7,	'imagenes/productos/refri.jpeg',	1,	5),
(8,	'imagenes/productos/refri1.jpeg',	2,	5),
(9,	'imagenes/productos/tv.jpeg',	1,	6),
(10,	'imagenes/productos/tv1.jpeg',	2,	6),
(11,	'imagenes/productos/tv2.jpeg',	3,	6),
(12,	'imagenes/productos/x1.png',	1,	7),
(13,	'imagenes/productos/x2.png',	2,	7),
(14,	'imagenes/productos/x3.png',	3,	7),
(15,	'imagenes/productos/z1.png',	1,	8),
(16,	'imagenes/productos/z2.png',	2,	8),
(17,	'imagenes/productos/z3.png',	3,	8),
(18,	'imagenes/productos/z4.png',	4,	8),
(19,	'imagenes/productos/p1.jpeg',	1,	9),
(20,	'imagenes/productos/p2.jpeg',	2,	9),
(21,	'imagenes/productos/c1.jpeg',	1,	10),
(22,	'imagenes/productos/c2.jpeg',	2,	10),
(23,	'imagenes/productos/blusa.jpeg',	1,	11),
(24,	'imagenes/productos/blusa2.jpeg',	2,	11),
(25,	'imagenes/productos/camisa.jpeg',	1,	12),
(26,	'imagenes/productos/camisa2.jpeg',	2,	12)
ON DUPLICATE KEY UPDATE `id_foto` = VALUES(`id_foto`), `url` = VALUES(`url`), `principal` = VALUES(`principal`), `id_producto` = VALUES(`id_producto`);

INSERT INTO `Metodos_Pago` (`idMetodos_Pago`, `descripcion_pago`, `cuenta`, `contaseña`, `monto_acumulado`) VALUES
(1,	'Paypal',	'industria@hotmail.com',	'pass',	'0')
ON DUPLICATE KEY UPDATE `idMetodos_Pago` = VALUES(`idMetodos_Pago`), `descripcion_pago` = VALUES(`descripcion_pago`), `cuenta` = VALUES(`cuenta`), `contaseña` = VALUES(`contaseña`), `monto_acumulado` = VALUES(`monto_acumulado`);

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `cantidad`, `descripcion`, `peso`, `modelo`, `id_categoria`) VALUES
(1,	'Camara digital FUJIFILM',	6000,	20,	'14 megapíxeles. 18.0 x Zoom óptico. Pantalla LCD de 3.0 pulgadas. Fotos Full HD y captura de películas HD de 1280 x 720p. Sensibilidad ISO ISO6400 a resolución reducida. Seguimiento del enfoque automático. Modo Panorama de movimiento. Tecnología de Detección de Rostros con detección de parpadeo y modo Sonrisa y Disparo.',	0.7,	NULL,	2),
(2,	'The Thought Readers',	300,	10,	'Una nueva serie sobre lectores mentales de un best seller de New York Times y USA',	0.5,	NULL,	5),
(3,	'Absolute Awakening',	200,	40,	'Absolute Awakening es una novela épica de ciencia ficción / fantasía que da rienda suelta a Kýrie Kylkynne, una adolescente de espíritu libre cuya mente gira contra el humor de petardos cambia mientras que frustra las expectativas del Universo Interior de Aalenstar. Una droga obtenida del alma de un mortal ha corrompido los rituales tradicionales para obtener poder mágico.',	0.5,	NULL,	5),
(4,	'Coraline',	1500,	5,	'Cuando Coraline atraviesa una de las puertas de la casa nueva de su familia, se encuentra que hay otra casa extrañamente similar a la suya (aunque la nueva sea, definitivamente, mejor).',	0.5,	NULL,	5),
(5,	'Food Showcase with FlexZone',	25000,	10,	'ofrece lo último en flexibilidad para almacenamiento de alimentos, para que todo se mantenga más fresco. Con solo un toque, el compartimiento puede convertirse fácilmente de nevera a freezer con cuatro configuraciones de temperatura preestablecidas.',	390,	'RF28K9380SR ',	2),
(6,	'55\" QLED 4K Flat Smart TV ',	50000,	15,	'Simplemente incomparable. La tecnología de puntos cuánticos ofrece la perfección del mejor color, mediante el uso de un innovador material de aleación. Una experiencia de visualización de otro planeta que jamás de desvanece.',	85,	'Series Q7F',	2),
(7,	'NIKE ZOOM RIVAL',	1500,	30,	'Tenis de velocidad',	0.6,	's9',	4),
(8,	'NIKE MANOA ',	2000,	24,	'Zapatos casuales',	1,	'MANOA',	6),
(9,	'Chaqueta acolchada',	1500,	25,	'Chaqueta corta y acolchada en lona de algodón. Modelo con capucha forrada de peluche y cordón ajustable, cremallera delante, bolsillos al bies, un bolsillo interior con cierre autoadherente y puños y bajo en punto elástico de canalé. Forro guateado.',	NULL,	NULL,	1),
(10,	'Chaquetón de sarga',	1800,	26,	'Chaquetón de doble botonadura en sarga gruesa. Modelo con bolsillos ribeteados al bies, un bolsillo en el interior, puños con trabilla y botón, y abertura detrás. Forrado.',	NULL,	NULL,	1),
(11,	'Camisa',	300,	40,	'Camisa de tela con cuello, botones delante y en los puños y bajo redondeado.',	NULL,	NULL,	1),
(12,	'Blusa de plumeti',	500,	35,	'Blusa de volantes en gasa de plumeti. Modelo con pequeño cuello elevado, botones parcialmente ocultos delante, puños con botón y bajo ligeramente redondeado.',	NULL,	NULL,	1)
ON DUPLICATE KEY UPDATE `id_producto` = VALUES(`id_producto`), `nombre` = VALUES(`nombre`), `precio` = VALUES(`precio`), `cantidad` = VALUES(`cantidad`), `descripcion` = VALUES(`descripcion`), `peso` = VALUES(`peso`), `modelo` = VALUES(`modelo`), `id_categoria` = VALUES(`id_categoria`);


INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `fecha_nac`, `id_direccion`) VALUES
(1,	'industria',	'id',	'nuevo@gmail.com',	'hola',	NULL,	1),
(2,	'sas',	'ds',	'sammy_lopez91@hotmail.com',	'4d186321c1a7f0f354b297e8914ab240',	'1991-01-02',	3),
(3,	'Pedro ',	'Perez',	'is@hotmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1995-04-10',	4),
(4,	'nuevo',	'nose',	'nuevo91@gmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1996-05-18',	5),
(5,	'sistemas',	'industria',	'industria@hotmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1992-04-09',	6),
(6,	'rerer',	'dsdsds',	'user@gmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1994-07-10',	7),
(7,	'usuario',	'lopez',	'usuario@gmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1995-05-10',	8),
(8,	'sistemas',	'industria',	'sistemas@hotmail.com',	'102ddaf691e1615d5dacd4c86299bfa4',	'1996-02-20',	9)
ON DUPLICATE KEY UPDATE `id_usuario` = VALUES(`id_usuario`), `nombre` = VALUES(`nombre`), `apellido` = VALUES(`apellido`), `correo` = VALUES(`correo`), `password` = VALUES(`password`), `fecha_nac` = VALUES(`fecha_nac`), `id_direccion` = VALUES(`id_direccion`);

-- 2018-04-24 07:24:52
