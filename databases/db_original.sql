-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2024 a las 20:34:58
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
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `direccion`, `telefono`, `email`, `fecha_registro`) VALUES
(1, 'Juan Perez', 'Calle 123', '3001234567', 'juanperez@gmail.com', '2024-10-12'),
(2, 'Ana Gomez', 'Avenida 456', '3019876543', 'anagomez@hotmail.com', '2024-10-12'),
(3, 'Carlos Martinez', 'Carrera 9', '3009876543', 'carlosmartinez@yahoo.com', '2024-10-12'),
(4, 'Lucia Fernández', 'Calle 10', '3123456789', 'lucia.fernandez@gmail.com', '2024-10-12'),
(5, 'Pedro Ramírez', 'Avenida 25', '3151234567', 'pedro.ramirez@hotmail.com', '2024-10-12'),
(6, 'Maria Lopez', 'Calle 18', '3109871234', 'maria.lopez@gmail.com', '2024-10-12'),
(7, 'Luis Torres', 'Calle 33', '3206543210', 'luis.torres@yahoo.com', '2024-10-12'),
(8, 'Sandra Muñoz', 'Carrera 15', '3117654321', 'sandra.munoz@hotmail.com', '2024-10-12'),
(9, 'Fernando Gutierrez', 'Avenida 3', '3187651234', 'fernando.gutierrez@gmail.com', '2024-10-12'),
(10, 'Claudia Rojas', 'Calle 12', '3218765432', 'claudia.rojas@yahoo.com', '2024-10-12'),
(11, 'Miguel Soto', 'Carrera 50', '3145678901', 'miguel.soto@hotmail.com', '2024-10-12'),
(12, 'Patricia Salazar', 'Avenida 7', '3165439876', 'patricia.salazar@gmail.com', '2024-10-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `detalle_id` int(11) NOT NULL,
  `factura_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`detalle_id`, `factura_id`, `producto_id`, `cantidad`, `precio_unitario`, `subtotal`) VALUES
(1, 1, 1, 1, 1200.00, 1200.00),
(2, 1, 2, 2, 25.00, 50.00),
(3, 2, 3, 1, 60.00, 60.00),
(4, 3, 4, 1, 200.00, 200.00),
(5, 3, 5, 2, 20.00, 40.00),
(6, 4, 6, 3, 500.00, 1500.00),
(7, 5, 7, 1, 90.00, 90.00),
(8, 6, 8, 1, 700.00, 700.00),
(9, 7, 9, 5, 90.00, 450.00),
(10, 8, 10, 3, 350.00, 1050.00),
(11, 9, 11, 4, 150.00, 600.00),
(12, 10, 12, 2, 250.00, 500.00),
(13, 11, 13, 2, 200.00, 400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `factura_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_factura` date DEFAULT curdate(),
  `total` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`factura_id`, `cliente_id`, `fecha_factura`, `total`) VALUES
(1, 1, '2024-10-12', 1250.00),
(2, 2, '2024-10-12', 60.00),
(3, 3, '2024-10-12', 240.00),
(4, 4, '2024-10-12', 1500.00),
(5, 5, '2024-10-12', 90.00),
(6, 6, '2024-10-12', 700.00),
(7, 7, '2024-10-12', 450.00),
(8, 8, '2024-10-12', 1050.00),
(9, 9, '2024-10-12', 600.00),
(10, 10, '2024-10-12', 500.00),
(11, 1, '2024-10-12', 400.00),
(12, 2, '2024-10-12', 350.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `precio`, `stock`) VALUES
(1, 'Laptop', 'Laptop de 15 pulgadas', 1200.00, 10),
(2, 'Mouse', 'Mouse inalámbrico', 25.00, 50),
(3, 'Teclado', 'Teclado mecánico', 60.00, 30),
(4, 'Monitor', 'Monitor 24 pulgadas', 200.00, 15),
(5, 'Impresora', 'Impresora multifuncional', 150.00, 8),
(6, 'Disco Duro', 'Disco duro SSD 500GB', 90.00, 25),
(7, 'Silla Gamer', 'Silla ergonómica para oficina', 350.00, 5),
(8, 'Memoria RAM', 'Memoria RAM 16GB DDR4', 80.00, 40),
(9, 'Tarjeta Grafica', 'Tarjeta gráfica RTX 3060', 600.00, 12),
(10, 'Smartphone', 'Smartphone Android', 700.00, 20),
(11, 'Tablet', 'Tablet de 10 pulgadas', 300.00, 10),
(12, 'Auriculares', 'Auriculares Bluetooth', 50.00, 60),
(13, 'Cámara Web', 'Cámara web HD 1080p', 70.00, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `factura_id` (`factura_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`factura_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`factura_id`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
