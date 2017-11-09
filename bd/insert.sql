-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';



INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1,	'Ropa'),
(2,	'Tecnología'),
(3,	'Salud y Belleza'),
(4,	'Deportes'),
(5,	'Libros y Entretenimiento'),
(6,	'Zapatos')
ON DUPLICATE KEY UPDATE `id_categoria` = VALUES(`id_categoria`), `nombre_categoria` = VALUES(`nombre_categoria`);


INSERT INTO `direccion` (`id_direccion`, `nombre_direccion`, `direccion_2`, `ciudad`, `departamento`, `telefono1`, `telefono2`, `observaciones`) VALUES
(1,	'col nueva',	'col nueva 2',	'Tegucigalpa',	'Francisco morazan',	'99999999',	'88888888',	'hola'),
(2,	'holoa',	'hola2',	'tegucigalpa',	'Francisco MorazÃ¡n',	'12121212',	'12121212',	'hjkhkjhkj')
ON DUPLICATE KEY UPDATE `id_direccion` = VALUES(`id_direccion`), `nombre_direccion` = VALUES(`nombre_direccion`), `direccion_2` = VALUES(`direccion_2`), `ciudad` = VALUES(`ciudad`), `departamento` = VALUES(`departamento`), `telefono1` = VALUES(`telefono1`), `telefono2` = VALUES(`telefono2`), `observaciones` = VALUES(`observaciones`);

INSERT INTO `foto_producto` (`id_foto`, `url`, `id_producto`, `principal`) VALUES
(1,	'imagenes/productos/f1.jpg',	1,	1),
(2,	'imagenes/productos/f2.jpg',	1,	2),
(3,	'imagenes/productos/f3.jpg',	1,	3),
(4,	'imagenes/productos/libro3.jpg',	2,	1),
(5,	'imagenes/productos/libro2.jpg',	3,	1),
(6,	'imagenes/productos/libro.jpg',	4,	1),
(7,	'imagenes/productos/refri.jpeg',	5,	1),
(8,	'imagenes/productos/refri1.jpeg',	5,	2),
(9,	'imagenes/productos/tv.jpeg',	6,	1),
(10,	'imagenes/productos/tv1.jpeg',	6,	2),
(11,	'imagenes/productos/tv2.jpeg',	6,	3),
(12,	'imagenes/productos/x1.png',	7,	1),
(13,	'imagenes/productos/x2.png',	7,	2),
(14,	'imagenes/productos/x3.png',	7,	3),
(15,	'imagenes/productos/z1.png',	8,	1),
(16,	'imagenes/productos/z2.png',	8,	2),
(17,	'imagenes/productos/z3.png',	8,	3),
(18,	'imagenes/productos/z4.png',	8,	4),
(19,	'imagenes/productos/p1.jpeg',	9,	1),
(20,	'imagenes/productos/p2.jpeg',	9,	2),
(21,	'imagenes/productos/c1.jpeg',	10,	1),
(22,	'imagenes/productos/c2.jpeg',	10,	2),
(23,	'imagenes/productos/blusa.jpeg',	11,	1),
(24,	'imagenes/productos/blusa2.jpeg',	11,	2),
(25,	'imagenes/productos/camisa.jpeg',	12,	1),
(26,	'imagenes/productos/camisa2.jpeg',	12,	2)
ON DUPLICATE KEY UPDATE `id_foto` = VALUES(`id_foto`), `url` = VALUES(`url`), `id_producto` = VALUES(`id_producto`), `principal` = VALUES(`principal`);

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
(12,	'Blusa de plumeti',	500,	35,	'Blusa de volantes en gasa de plumeti. Modelo con pequeño cuello elevado, botones parcialmente ocultos delante, puños con botón y bajo ligeramente redondeado.',	NULL,	NULL,	1)
ON DUPLICATE KEY UPDATE `id_producto` = VALUES(`id_producto`), `nombre` = VALUES(`nombre`), `precio` = VALUES(`precio`), `cantidad` = VALUES(`cantidad`), `descripcion` = VALUES(`descripcion`), `peso` = VALUES(`peso`), `modelo` = VALUES(`modelo`), `id_categoria` = VALUES(`id_categoria`);

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `fecha_nac`, `id_direccion`) VALUES
(1,	'nuevo',	'perez',	'nuevo@gmail.com',	'hola',	NULL,	1)
ON DUPLICATE KEY UPDATE `id_usuario` = VALUES(`id_usuario`), `nombre` = VALUES(`nombre`), `apellido` = VALUES(`apellido`), `correo` = VALUES(`correo`), `password` = VALUES(`password`), `fecha_nac` = VALUES(`fecha_nac`), `id_direccion` = VALUES(`id_direccion`);

-- 2017-11-09 07:35:52
