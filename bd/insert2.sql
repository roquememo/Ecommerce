-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2017 a las 01:07:59
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Electrónica'),
(3, 'Libros'),
(4, 'Juguetes'),
(5, 'Entretenimiento'),
(6, 'Otras');

--
-- Volcado de datos para la tabla `foto_producto`
--

INSERT INTO `foto_producto` (`id_foto`, `url`, `id_producto`) VALUES
(2, 'imagenes/productos/iPhoneX1.jpg', 2),
(3, 'imagenes/productos/iPhoneX2.jpg', 2),
(4, 'imagenes/productos/iPhoneX3.jpg', 2),
(5, 'imagenes/productos/JugueteTheBeatles3.jpeg', 5),
(6, 'imagenes/productos/JugueteTheBeatles2.jpeg', 5),
(7, 'imagenes/productos/JugueteTheBeatles1.jpeg', 5),
(8, 'imagenes/productos/LibroGOT1.jpg', 6),
(9, 'imagenes/productos/LibroGOT2.jpg', 6),
(10, 'imagenes/productos/LibroGOT3.jpg', 6),
(11, 'imagenes/productos/LibroHarryPotter1.jpeg', 4),
(12, 'imagenes/productos/LibroHarryPotter2.jpeg', 4),
(13, 'imagenes/productos/LibroHarryPotter3.jpeg', 4),
(14, 'imagenes/productos/macbookair1.png', 1),
(15, 'imagenes/productos/macbookair2.jpg', 1),
(16, 'imagenes/productos/macbookair3.png', 1),
(17, 'imagenes/productos/PeliculaStarWars1.jpeg', 3);

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `cantidad`, `descripcion`, `peso`, `modelo`, `id_categoria`) VALUES
(1, 'MacBook Air 2017', 20000, 5, '128 GB almacenamiento.\nIntel Core i5 dual core de 1.8 GHz \n8 GB de memoria integrada LPDDR3 de 1600 MHz', 2.85, 'Apple', 1),
(2, 'iPhone X', 30000, 10, '256GB almacenamiento.\r\nColor negro.\r\nCámaras de 12 MP con gran angular y teleobjetivo.\r\nGrabación de video 4K.\r\n', 0.3, 'Apple', 1),
(3, 'Películas Star Wars (Episodio I-VI)', 3000, 1, 'Edición limitada.\r\nIdioma: Inglés\r\nSubtítulos: Español', 1, 'Star Wars', 5),
(4, 'Box Set Harry Potter (1-7)', 2000, 8, 'Idioma: Inglés.\r\nContiene los 7 libros de Harry Potter.', 3.5, NULL, 3),
(5, 'LEGO The Beatles', 900, 15, 'Figuras coleccionables. \r\nContiene 4 personajes y submarino amarillo.', 1, 'LEGO', 4),
(6, 'Pop Up Game Of Thrones', 999, 2, 'Edición ilustrada basada en la serie de Juego de Tronos', 1.5, NULL, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
