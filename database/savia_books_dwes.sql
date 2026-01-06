-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2026 a las 14:36:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `savia_books_dwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo`, `nombre`, `activo`) VALUES
(1, 'Fantasía', 'activo'),
(2, 'Misterio', 'activo'),
(3, 'Novela', 'activo'),
(4, 'Juvenil', 'activo'),
(5, 'Cómic y Manga', 'activo'),
(6, 'Ciencia Ficción', 'activo'),
(7, 'Romántica', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `numPedido` int(11) NOT NULL,
  `lineaPedido` int(11) NOT NULL,
  `codLibro` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`numPedido`, `lineaPedido`, `codLibro`, `cantidad`, `precio`) VALUES
(12, 1, 2, 1, 16.95),
(13, 1, 4, 1, 18.95),
(14, 1, 4, 1, 18.95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `codCategoria` int(12) DEFAULT NULL,
  `activo` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `titulo`, `isbn`, `autor`, `editorial`, `imagen`, `precio`, `descuento`, `codCategoria`, `activo`) VALUES
(1, 'Realidades a medida', '9788410466203', 'Brandon Sanderson', 'Nova', 'images/books/1767299768_realidades_a_medida.jpg', 23.65, 0, 6, 'activo'),
(2, 'One Piece nº 12', ' 9788410492653', ' Eiichiro Oda', ' Planeta comic', 'images/books/one_piece_12.jpg', 16.95, 0, 5, 'activo'),
(3, 'El Hobbit', '9788445000665', 'J.R.R. Tolkien', 'Minotauro', 'images/books/hobbit.jpg', 19.95, 0, 1, 'activo'),
(4, 'Asesinato en el Orient Express', '9788467045413', 'Agatha Christie', 'Espasa', 'images/books/asesinato_orient_express.jpg', 18.95, NULL, 2, 'activo'),
(5, 'El príncipe de la niebla', '9788408163541', 'Carlos Ruiz Zafón', 'Planeta', 'images/books/principe_niebla.jpg', 12.95, NULL, 4, 'activo'),
(6, 'El alquimista', '9786073809603', 'Paulo Coelho', 'Grijalbo', 'images/books/el_alquimista.jpg', 15.50, NULL, 3, 'activo'),
(7, 'El amor del Highlander', '9083218171', 'Mariah Stone', 'Stone Publishing', 'images/books/1767300209_El_amor_del_Highlander.jpg', 12.98, 0, 7, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `codigo` int(11) NOT NULL,
  `fecha` date DEFAULT curdate(),
  `estado` enum('pendiente','pagado','enviado','entregado') DEFAULT 'pendiente',
  `total` decimal(6,2) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `codUsuario` varchar(9) NOT NULL,
  `activo` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`codigo`, `fecha`, `estado`, `total`, `descuento`, `codUsuario`, `activo`) VALUES
(12, '2026-01-01', 'entregado', 16.95, 0, '74390499N', 'activo'),
(13, '2026-01-04', 'entregado', 18.95, 0, '74390499N', 'activo'),
(14, '2026-01-06', 'pagado', 18.95, 0, '12345678A', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rol` enum('visitante','registrado','empleado','admin') DEFAULT 'visitante',
  `activo` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `clave`, `nombre`, `apellido`, `direccion`, `ciudad`, `telefono`, `email`, `rol`, `activo`) VALUES
('12345678A', '$2y$10$kOx.h5Sfs6Jzl4BA7zSGNe.KbGHhawRua8oivlrFD7G.Ezua4RlmS', 'Profesor', 'Severo', 'Elche', 'Elche', '912345678', 'profesor@severo.com', 'admin', 'activo'),
('12345678B', '$2y$10$iWMPvlYIyc77zkTnfp/ic.Sq58Wa0f2Smg89YgCwZMq7sqej5fYT2', 'Laura', 'Sánchez', 'Calle Gran Vía 45', 'Barcelona', '611223344', 'laura.sanchez@registrado.com', 'registrado', 'activo'),
('23456789C', '$2y$10$tGYdOuHPJi99ujdCmNu6LOWGI8YgrvZ.C8pq4bpBbUcYW/K0kBBq6', 'Carlos', 'Martínez', 'Calle Secundaria 23', 'Sevilla', '622334455', 'carlos.martinez@empleado.com', 'empleado', 'activo'),
('45678901D', '$2y$10$VHpW1j.PuazSEm7erKo1oeZZDyG0G8n6RKzRG6C7xUNg7TjRF5zP.', 'Paco', 'Irle', 'ccc', 'ccc', '12345678', 'p@gmail.com', 'registrado', 'activo'),
('74390499N', '$2y$10$xM1q0M8NGwuHfrwyz59rCuLO/9qkDX5hPBUYWouTeIdcE.S4127O.', 'Cristian', 'Marín Pereira', 'Mariano Benlliure', 'Elche', '697284792', 'c@gmail.com', 'admin', 'activo'),
('99988877V', '1234', 'Juan', 'Pérez', 'Calle Falsa 123', 'Madrid', '600123456', 'juan.perez@visitante.com', 'visitante', 'inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`numPedido`,`lineaPedido`),
  ADD KEY `fk_detallepedido_codLibro` (`codLibro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `codCategoria` (`codCategoria`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`numPedido`) REFERENCES `pedidos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detallepedido_codLibro` FOREIGN KEY (`codLibro`) REFERENCES `libros` (`codigo`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`codCategoria`) REFERENCES `categorias` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
