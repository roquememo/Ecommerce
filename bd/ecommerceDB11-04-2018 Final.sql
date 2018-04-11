-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 11:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `correo`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin'),
(2, 'cesar', 'cesar', 'cesar@cesar.com', 'qaz'),
(5, 'tyu', 'tyu', 'tyu@tyu.com', 'yyu'),
(6, 'bgt', 'bgt', 'bgt@gmail.com', 'bgt'),
(7, 'trtr', 'trrtr', 'trrt@gfgf.comdd', 'ghdfghdfhg'),
(8, 'hfhfgh', 'dghdfhf', 'gdhfg@hfh.com', 'gdfthfgh'),
(9, 'trtrtr', 'tytyt', 'fgdgdt@gsgdwerjk.com', 'sgdhr'),
(10, 'rghrht', 'hrhrh', 'hfghjfrhjury@hfhhf.com', 'ghfghfhfh'),
(11, 'qqqqqqqqq', 'qqqqqqqq', 'qqqqqq@gmail.com', 'gfdhfgfgh'),
(12, 'sdfgsdgdfg', 'hhghghhg', 'aaaaaaaaaa@dd.vod', 'gfgf');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `estado`, `id_usuario`) VALUES
(1, 1, 1),
(2, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `carrito_has_productos`
--

CREATE TABLE `carrito_has_productos` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrito_has_productos`
--

INSERT INTO `carrito_has_productos` (`id_carrito`, `id_producto`, `cantidad`) VALUES
(2, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carrito_productos`
--

CREATE TABLE `carrito_productos` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrito_productos`
--

INSERT INTO `carrito_productos` (`id_carrito`, `id_producto`, `cantidad`) VALUES
(1, 4, 2),
(1, 5, 3),
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Ropa'),
(2, 'Tecnología'),
(3, 'Salud y Belleza'),
(4, 'Deportes'),
(5, 'Libros y Entretenimiento'),
(6, 'Zapatos');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado_envio` varchar(45) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_carrito` int(11) NOT NULL,
  `qr` varchar(150) DEFAULT NULL,
  `idMetodos_Pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `nombre_direccion` varchar(95) DEFAULT NULL,
  `direccion_2` varchar(95) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `coordenada` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `nombre_direccion`, `direccion_2`, `ciudad`, `departamento`, `telefono1`, `telefono2`, `observaciones`, `coordenada`) VALUES
(1, 'col nueva', 'col nueva 2', 'Tegucigalpa', 'Francisco morazan', '99999999', '88888888', 'hola', 'Your ubication is Lat: 14.043224700000001  Lng: -87.18714399999999'),
(2, 'holoa', 'hola2', 'tegucigalpa', 'Francisco MorazÃ¡n', '12121212', '12121212', 'hjkhkjhkj', NULL),
(3, 'rterterter', 'tertert', 'rererer', 'Francisco Morazán', '21548958', '56598747', 'rere', NULL),
(4, 'rtertertergfg', 'tertert', 'casa', 'Comayagua', '12547896', '21589689', 'reregfgf', 'Your ubication is Lat: 14.043224700000001  Lng: -87.18714399999999'),
(5, 'rtertertergfg', 'tertert', 'rererer', 'Comayagua', '12121212', '32323232', 'rere', 'Your ubication is Lat: undefined  Lng: undefined'),
(6, 'rtertertergfg', 'tertert', 'ffr', 'Francisco Morazán', '12121212', '21212121', 'fdfd', 'Your ubication is Lat: 14.043224700000001  Lng: -87.18714399999999'),
(7, 'qaz', 'qaz', 'qaz', 'Comayagua', '23232323', '21212121', 'qaz', 'Your ubication is Lat: undefined  Lng: undefined'),
(8, 'pepe', 'pepe', 'pepe', 'Cortés', '12345678', '12121212', 'pepe', 'Your ubication is Lat: 14.112665199999999  Lng: -87.197108'),
(9, 'terry', 'terry', 'terry', 'Francisco Morazán', '12121212', '21212111', 'terry', 'Your ubication is Lat: 14.043224700000001  Lng: -87.18714399999999'),
(10, 'TEG', '', 'TEG', 'Cortés', '25698785', '', 'jjhj', 'Your ubication is Lat: undefined  Lng: undefined'),
(11, 'lano lano', 'lano', 'teg', 'Comayagua', '89658965', '', '', 'Your ubication is Lat: undefined  Lng: undefined'),
(12, 'DF', 'DF', 'DF', 'Laredo', '85858585', '78547854', 'Nothing', 'Your ubication is Lat: undefined  Lng: undefined'),
(13, 'holanda', 'holanda', 'amsterdan', 'oak', '45454545', '12121212', 'nothing', 'Lat, Long'),
(14, 'qaz', NULL, NULL, 'Pending', NULL, NULL, NULL, 'Pending'),
(15, 'wsx', 'wsx', 'wsx', 'Pending', 'wsx', 'wsx', 'wsx', 'Pending'),
(16, 'pop', 'pop', 'pop', 'Pending', 'opop', 'opop', 'pop', 'Pending'),
(17, 'tyu', 'tyu', 'tyu', 'Pending', 'tyu', 'tyu', 'tyu', 'Pending'),
(18, 'bnm', 'bnm', 'bnm', 'Pending', 'bnm', 'bnm', 'bnm', 'Pending'),
(19, 'lol', 'lol', 'lol', 'Pending', 'lol', 'lol', 'lol', 'Pending'),
(20, 'kik', 'kik', 'kik', 'Pending', 'kik', 'ikik', 'kik', 'Pending'),
(21, 'juj', 'juj', 'juj', 'Pending', 'juj', 'juj', 'juj', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `foto_producto`
--

CREATE TABLE `foto_producto` (
  `id_foto` int(11) NOT NULL,
  `url` varchar(259) DEFAULT NULL,
  `principal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foto_producto`
--

INSERT INTO `foto_producto` (`id_foto`, `url`, `principal`, `id_producto`) VALUES
(1, 'imagenes/productos/f1.jpg', 1, 1),
(2, 'imagenes/productos/f2.jpg', 2, 1),
(3, 'imagenes/productos/f3.jpg', 3, 1),
(4, 'imagenes/productos/libro3.jpg', 1, 2),
(5, 'imagenes/productos/libro2.jpg', 1, 3),
(6, 'imagenes/productos/libro.jpg', 1, 4),
(7, 'imagenes/productos/refri.jpeg', 1, 5),
(8, 'imagenes/productos/refri1.jpeg', 2, 5),
(9, 'imagenes/productos/tv.jpeg', 1, 6),
(10, 'imagenes/productos/tv1.jpeg', 2, 6),
(11, 'imagenes/productos/tv2.jpeg', 3, 6),
(12, 'imagenes/productos/x1.png', 1, 7),
(13, 'imagenes/productos/x2.png', 2, 7),
(14, 'imagenes/productos/x3.png', 3, 7),
(15, 'imagenes/productos/z1.png', 1, 8),
(16, 'imagenes/productos/z2.png', 2, 8),
(17, 'imagenes/productos/z3.png', 3, 8),
(18, 'imagenes/productos/z4.png', 4, 8),
(19, 'imagenes/productos/p1.jpeg', 1, 9),
(20, 'imagenes/productos/p2.jpeg', 2, 9),
(21, 'imagenes/productos/c1.jpeg', 1, 10),
(22, 'imagenes/productos/c2.jpeg', 2, 10),
(23, 'imagenes/productos/blusa.jpeg', 1, 11),
(24, 'imagenes/productos/blusa2.jpeg', 2, 11),
(25, 'imagenes/productos/camisa.jpeg', 1, 12),
(26, 'imagenes/productos/camisa2.jpeg', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `idMetodos_Pago` int(11) NOT NULL,
  `descripcion_pago` varchar(45) DEFAULT NULL,
  `cuenta` varchar(45) DEFAULT NULL,
  `contaseña` varchar(45) DEFAULT NULL,
  `monto_acumulado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `cantidad`, `descripcion`, `peso`, `modelo`, `id_categoria`) VALUES
(1, 'Camara digital FUJIFILM', 6000, 20, '14 megapï¿½xeles. 18.0 x Zoom ï¿½ptico. Pantalla LCD de 3.0 pulgadas. Fotos Full HD y captura de pelï¿½culas HD de 1280 x 720p. Sensibilidad ISO ISO6400 a resoluciï¿½n reducida. Seguimiento del enfoque automï¿½tico. Modo Panorama de movimiento. Tecnologï¿½a de Detecciï¿½n de Rostros con detecciï¿½n de parpadeo y modo Sonrisa y Disparo.', 0.7, 'Bussines', 2),
(2, 'The Thought Readers', 300, 10, 'Una nueva serie sobre lectores mentales de un best seller de New York Times y USA', 0.5, NULL, 5),
(3, 'Absolute Awakening', 200, 40, 'Absolute Awakening es una novela ï¿½pica de ciencia ficciï¿½n / fantasï¿½a que da rienda suelta a Kï¿½rie Kylkynne, una adolescente de espï¿½ritu libre cuya mente gira contra el humor de petardos cambia mientras que frustra las expectativas del Universo Interior de Aalenstar. Una droga obtenida del alma de un mortal ha corrompido los rituales tradicionales para obtener poder mï¿½gico.', 0.5, 'Bussines', 5),
(4, 'Coraline', 1500, 5, 'Cuando Coraline atraviesa una de las puertas de la casa nueva de su familia, se encuentra que hay otra casa extraï¿½amente similar a la suya (aunque la nueva sea, definitivamente, mejor).', 0.5, 'Bussines', 5),
(5, 'Food Showcase with FlexZone', 25000, 10, 'ofrece lo último en flexibilidad para almacenamiento de alimentos, para que todo se mantenga más fresco. Con solo un toque, el compartimiento puede convertirse fácilmente de nevera a freezer con cuatro configuraciones de temperatura preestablecidas.', 390, 'RF28K9380SR ', 2),
(6, '55\" QLED 4K Flat Smart TV ', 50000, 15, 'Simplemente incomparable. La tecnología de puntos cuánticos ofrece la perfección del mejor color, mediante el uso de un innovador material de aleación. Una experiencia de visualización de otro planeta que jamás de desvanece.', 85, 'Series Q7F', 2),
(7, 'NIKE ZOOM RIVAL', 1500, 30, 'Tenis de velocidad', 0.6, 's9', 6),
(8, 'NIKE MANOA ', 2000, 24, 'Zapatos casuales', 1, 'MANOA', 6),
(9, 'Chaqueta acolchada', 1500, 25, 'Chaqueta corta y acolchada en lona de algodón. Modelo con capucha forrada de peluche y cordón ajustable, cremallera delante, bolsillos al bies, un bolsillo interior con cierre autoadherente y puños y bajo en punto elástico de canalé. Forro guateado.', NULL, NULL, 1),
(10, 'Chaquetón de sarga', 1800, 26, 'Chaquetón de doble botonadura en sarga gruesa. Modelo con bolsillos ribeteados al bies, un bolsillo en el interior, puños con trabilla y botón, y abertura detrás. Forrado.', NULL, NULL, 1),
(11, 'Camisa', 300, 40, 'Camisa de tela con cuello, botones delante y en los puños y bajo redondeado.', NULL, NULL, 1),
(12, 'Blusa de plumeti', 500, 35, 'Blusa de volantes en gasa de plumeti. Modelo con pequeï¿½o cuello elevado, botones parcialmente ocultos delante, puï¿½os con botï¿½n y bajo ligeramente redondeado.', 0, 'fgfg', 1),
(17, 'hfghfgh', 6546546, 456476, 'iopjol', 64654765, 'kggkj', 2),
(19, 'ppppppppppppp', 88888888888, 888888888, 'pppppppppppppp', 8888888888888, 'pppppppppppp', 6),
(20, 'mmmmmmmmmm', 44444444444, 2147483647, 'mmmmmmmmmmm', 44444444444, 'mmmmmmmmmmmmmm', 1),
(22, 'lllllllllllll', 111111111111111, 1111111111, 'llllllllllllllllllll', 1.1111111111111112e16, 'lllllllllllllllllllll', 2),
(23, 'ooooooooooooo', 0, 0, 'ooooooooooooo', 0, 'oooooooooooooo', 3),
(24, 'vvvvvvvvvvvv', 5555555555555, 2147483647, 'vvvvvvvvvvv', 55555555555555, 'vvvvvvvvvvvvvvv', 3),
(25, 'mmmmmmmmmmmm', 77777777777777, 2147483647, 'mmmmmmmmmmmmmmmmm', 7.777777777777778e16, 'mmmmmmmmmmmmmm', 4),
(26, 'bbbbbbbbbbbbb', 8888888888888, 2147483647, 'bbbbbbbbbbbb', 888888888888888, 'bbbbbbbbbbbbbbbb', 5),
(27, 'hhhhhhhhhhhhh', 4444444444444, 2147483647, 'hhhhhhhhhhhhhhhhh', 44444444444444, 'hhhhhhhhhhhhhhhhhhh', 5),
(28, 'yyyyyyyyyyyyyy', 4444444444444, 2147483647, 'yyyyyyyyyyyyyyy', 444444444444444, 'yyyyyyyyyyyyy', 6),
(29, 'nnnnnnnnnn', 4444444444, 45, 'nnnnnnnnnnn', 4555555555555, 'bfdf', 6),
(30, 'gsdfdfb', 4524532, 453452, 'gdcv', 656, 'gdfdcg', 6),
(31, 'wefvegr', 6516551, 8879, 'jnjk,jkl', 6, 'khmghj', 6),
(32, 'gdgf', 69155165, 651165651, 'jnjnn,n,', 654665, 'kghngfh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `idTickets` int(11) NOT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_apertura` date DEFAULT NULL,
  `fecha_resolucion` date DEFAULT NULL,
  `gestion_realizada` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`idTickets`, `asunto`, `estado`, `descripcion`, `fecha_apertura`, `fecha_resolucion`, `gestion_realizada`, `id_usuario`) VALUES
(1, 'MALA ATENCION', 'PENDIENTE', 'NADIE ATIENDE, ESTO NO SIRVE', '2018-04-11', NULL, 'ddfd', 3),
(2, 'MALOS PRECIOS', 'PENDIENTE', 'ESOS PRECIOS SON DEMASIADOS ALTOS', '2018-04-05', NULL, 'ghgh', 5),
(3, 'PAGINA DEJA DE FUNCIONAR', 'RESUELTO', 'LA PAGINA DEJA DE FUNCIONAR', '2018-04-02', NULL, 'gfgfg', 1),
(4, 'IMAGENES NO SE VEN', 'RESUELTO', 'LAS IMAGENES NO SE MIRAN CLARAS', '2018-04-02', '2018-04-10', 'PROBLEMA RESUELTO', 6);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(55) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_direccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `fecha_nac`, `id_direccion`) VALUES
(1, 'nuevo', 'perez', 'nuevo@gmail.com', 'hola', NULL, 1),
(2, 'felipe', 'felipe', 'felipe08@outlook.es', 'qwerty', '1994-03-18', 4),
(3, 'Nolan', 'Nolan', 'Nolan@gmail.com', 'Nolan', '1999-10-19', 4),
(4, 'Tato', 'tato', 'tato@gmail.com', 'tato', '1999-11-18', 6),
(5, 'qaz', 'qaz', 'qaz@gmail.com', 'qaz', '1992-01-18', 7),
(6, 'pepe', 'pepe', 'pepe@gmail.com', 'pepe', '1992-03-02', 8),
(7, 'terry', 'terry', 'terry@gmail.com', 'terry', '1994-03-19', 9),
(8, 'DARWIN', 'ALVAREZ', 'darwin.cabrera6@gmail.com', 'darwin', '1996-02-02', 10),
(9, 'lalo', 'lalo', 'lalo@gmail.com', 'lalo', '1995-02-18', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`,`id_usuario`),
  ADD KEY `fk_carrito_usuario1_idx` (`id_usuario`);

--
-- Indexes for table `carrito_has_productos`
--
ALTER TABLE `carrito_has_productos`
  ADD PRIMARY KEY (`id_carrito`,`id_producto`),
  ADD KEY `fk_carrito_has_productos_productos1_idx` (`id_producto`),
  ADD KEY `fk_carrito_has_productos_carrito1_idx` (`id_carrito`);

--
-- Indexes for table `carrito_productos`
--
ALTER TABLE `carrito_productos`
  ADD PRIMARY KEY (`id_carrito`,`id_producto`),
  ADD KEY `fk_carrito_has_productos_productos1_idx` (`id_producto`),
  ADD KEY `fk_carrito_has_productos_carrito1_idx` (`id_carrito`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`,`id_carrito`,`idMetodos_Pago`),
  ADD KEY `fk_compras_carrito1_idx` (`id_carrito`),
  ADD KEY `fk_compras_Metodos_Pago1_idx` (`idMetodos_Pago`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indexes for table `foto_producto`
--
ALTER TABLE `foto_producto`
  ADD PRIMARY KEY (`id_foto`,`id_producto`),
  ADD KEY `fk_foto_producto_productos1_idx` (`id_producto`);

--
-- Indexes for table `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`idMetodos_Pago`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`,`id_categoria`),
  ADD KEY `fk_productos_categoria1_idx` (`id_categoria`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idTickets`,`id_usuario`),
  ADD KEY `fk_TIckets_usuario1_idx` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_direccion`),
  ADD KEY `fk_usuario_direccion1_idx` (`id_direccion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `foto_producto`
--
ALTER TABLE `foto_producto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carrito_has_productos`
--
ALTER TABLE `carrito_has_productos`
  ADD CONSTRAINT `fk_carrito_has_productos_carrito1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrito_has_productos_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carrito_productos`
--
ALTER TABLE `carrito_productos`
  ADD CONSTRAINT `carrito_productos_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`),
  ADD CONSTRAINT `carrito_productos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_Metodos_Pago1` FOREIGN KEY (`idMetodos_Pago`) REFERENCES `metodos_pago` (`idMetodos_Pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compras_carrito1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foto_producto`
--
ALTER TABLE `foto_producto`
  ADD CONSTRAINT `fk_foto_producto_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_TIckets_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_direccion1` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
