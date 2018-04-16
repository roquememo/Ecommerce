-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `correo`, `password`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	'admin'),
(2,	'cesar',	'cesar',	'cesar@cesar.com',	'qaz'),
(5,	'tyu',	'tyu',	'tyu@tyu.com',	'yyu'),
(6,	'bgt',	'bgt',	'bgt@gmail.com',	'bgt'),
(7,	'trtr',	'trrtr',	'trrt@gfgf.comdd',	'ghdfghdfhg'),
(8,	'hfhfgh',	'dghdfhf',	'gdhfg@hfh.com',	'gdfthfgh'),
(9,	'trtrtr',	'tytyt',	'fgdgdt@gsgdwerjk.com',	'sgdhr'),
(10,	'rghrht',	'hrhrh',	'hfghjfrhjury@hfhhf.com',	'ghfghfhfh'),
(11,	'qqqqqqqqq',	'qqqqqqqq',	'qqqqqq@gmail.com',	'gfdhfgfgh'),
(12,	'sdfgsdgdfg',	'hhghghhg',	'aaaaaaaaaa@dd.vod',	'gfgf');

INSERT INTO `carrito` (`id_carrito`, `estado`, `id_usuario`) VALUES
(1,	1,	1);


INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1,	'Ropa'),
(2,	'Tecnología'),
(3,	'Salud y Belleza'),
(4,	'Deportes'),
(5,	'Libros y Entretenimiento'),
(6,	'Zapatos');


INSERT INTO `direccion` (`id_direccion`, `nombre_direccion`, `direccion_2`, `ciudad`, `departamento`, `telefono1`, `telefono2`, `observaciones`, `coordenada`) VALUES
(1,	'col nueva',	'col nueva 2',	'Tegucigalpa',	'Francisco morazan',	'99999999',	'88888888',	'hola',	NULL),
(2,	'holoa',	'hola2',	'tegucigalpa',	'Francisco MorazÃ¡n',	'12121212',	'12121212',	'hjkhkjhkj',	NULL);

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
(26,	'imagenes/productos/camisa2.jpeg',	2,	12);


INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `cantidad`, `descripcion`, `peso`, `modelo`, `id_categoria`) VALUES
(1,	'Camara digital FUJIFILM',	6000,	20,	'14 megapíxeles. 18.0 x Zoom óptico. Pantalla LCD de 3.0 pulgadas. Fotos Full HD y captura de películas HD de 1280 x 720p. Sensibilidad ISO ISO6400 a resolución reducida. Seguimiento del enfoque automático. Modo Panorama de movimiento. Tecnología de Detección de Rostros con detección de parpadeo y modo Sonrisa y Disparo.',	0.7,	NULL,	2),
(2,	'The Thought Readers',	300,	10,	'Una nueva serie sobre lectores mentales de un best seller de New York Times y USA',	0.5,	NULL,	5),
(3,	'Absolute Awakening',	200,	40,	'Absolute Awakening es una novela épica de ciencia ficción / fantasía que da rienda suelta a Kýrie Kylkynne, una adolescente de espíritu libre cuya mente gira contra el humor de petardos cambia mientras que frustra las expectativas del Universo Interior de Aalenstar. Una droga obtenida del alma de un mortal ha corrompido los rituales tradicionales para obtener poder mágico.',	0.5,	NULL,	5),
(4,	'Coraline',	1500,	5,	'Cuando Coraline atraviesa una de las puertas de la casa nueva de su familia, se encuentra que hay otra casa extrañamente similar a la suya (aunque la nueva sea, definitivamente, mejor).',	0.5,	NULL,	5),
(5,	'Food Showcase with FlexZone',	25000,	10,	'ofrece lo último en flexibilidad para almacenamiento de alimentos, para que todo se mantenga más fresco. Con solo un toque, el compartimiento puede convertirse fácilmente de nevera a freezer con cuatro configuraciones de temperatura preestablecidas.',	390,	'RF28K9380SR ',	2),
(6,	'55\" QLED 4K Flat Smart TV ',	50000,	15,	'Simplemente incomparable. La tecnología de puntos cuánticos ofrece la perfección del mejor color, mediante el uso de un innovador material de aleación. Una experiencia de visualización de otro planeta que jamás de desvanece.',	85,	'Series Q7F',	2),
(7,	'NIKE ZOOM RIVAL',	1500,	30,	'Tenis de velocidad',	0.6,	's9',	6),
(8,	'NIKE MANOA ',	2000,	24,	'Zapatos casuales',	1,	'MANOA',	6),
(9,	'Chaqueta acolchada',	1500,	25,	'Chaqueta corta y acolchada en lona de algodón. Modelo con capucha forrada de peluche y cordón ajustable, cremallera delante, bolsillos al bies, un bolsillo interior con cierre autoadherente y puños y bajo en punto elástico de canalé. Forro guateado.',	NULL,	NULL,	1),
(10,	'Chaquetón de sarga',	1800,	26,	'Chaquetón de doble botonadura en sarga gruesa. Modelo con bolsillos ribeteados al bies, un bolsillo en el interior, puños con trabilla y botón, y abertura detrás. Forrado.',	NULL,	NULL,	1),
(11,	'Camisa',	300,	40,	'Camisa de tela con cuello, botones delante y en los puños y bajo redondeado.',	NULL,	NULL,	1),
(12,	'Blusa de plumeti',	500,	35,	'Blusa de volantes en gasa de plumeti. Modelo con pequeño cuello elevado, botones parcialmente ocultos delante, puños con botón y bajo ligeramente redondeado.',	NULL,	NULL,	1);


INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `fecha_nac`, `id_direccion`) VALUES
(1,	'nuevo',	'perez',	'nuevo@gmail.com',	'hola',	NULL,	1);

-- 2018-04-16 04:05:20
