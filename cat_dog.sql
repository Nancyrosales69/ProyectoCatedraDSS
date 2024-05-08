-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2024 a las 03:23:28
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cat_dog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--
CREATE DATABASE cat_dog;

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_local` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_local` (`id_local`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `descripcion`, `fecha`, `hora`, `id_local`, `id_usuario`) VALUES
(1, 'Consulta veterinaria', '2024-05-10', '06:00:00', 1, 2),
(2, 'Vacunación', '2024-05-15', '08:16:00', 2, 3),
(4, 'Dormir a mi perrito wili', '2024-05-06', '08:30:00', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

DROP TABLE IF EXISTS `expediente`;
CREATE TABLE IF NOT EXISTS `expediente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_mascota` int DEFAULT NULL,
  `id_cita` int DEFAULT NULL,
  `id_medicamentos` int DEFAULT NULL,
  `id_vacuna` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_mascota` (`id_mascota`),
  KEY `id_cita` (`id_cita`),
  KEY `id_medicamentos` (`id_medicamentos`),
  KEY `id_vacuna` (`id_vacuna`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `id_usuario`, `id_mascota`, `id_cita`, `id_medicamentos`, `id_vacuna`) VALUES
(1, 2, 1, 1, NULL, 1),
(2, 3, 2, 2, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE IF NOT EXISTS `mascotas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `peso`, `id_usuario`) VALUES
(1, 'Max', '8.50', 2),
(2, 'Luna', '5.30', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre`, `descripcion`, `id_usuario`) VALUES
(1, 'Ibuprofeno', 'Para el dolor leve', 1),
(2, 'Amoxicilina', 'Antibiótico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url_producto` varchar(1000) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_medicamentos` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_medicamentos` (`id_medicamentos`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `url_producto`, `nombre`, `precio`, `id_medicamentos`) VALUES
(1, 'https://walmartsv.vtexassets.com/arquivos/ids/282854/S-Ibuprofeno-Mk-400Mg-50-Tabletas-1-31256.jpg?v=638048040944670000', 'Ibuprofeno 400mg', '10.50', 1),
(2, 'https://walmartsv.vtexassets.com/arquivos/ids/427112/S-Amoxicilina-500Mg-La-Sante-50-Capsulas-1-48986.jpg?v=638460059925870000', 'Amoxicilina 500mg', '15.75', 2),
(4, 'https://lemus.com.sv/product/930417/image', 'Collar Gatuno', '5.10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

DROP TABLE IF EXISTS `recibo`;
CREATE TABLE IF NOT EXISTS `recibo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id`, `id_cliente`, `local`, `tipo`, `precio`) VALUES
(1, 4, '2', 'accesorios', '10.30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

DROP TABLE IF EXISTS `sede`;
CREATE TABLE IF NOT EXISTS `sede` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_cita` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cita` (`id_cita`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `ubicacion`, `telefono`, `id_usuario`, `id_cita`) VALUES
(1, 'Sede Principal', '123456789', 1, 1),
(2, 'Sede Secundaria', '987654321', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_rol` int DEFAULT NULL,
  `id_local` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `fk_id_local` (`id_local`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `correo`, `id_rol`, `id_local`) VALUES
(1, 'Admin', 'admin', 'admin123', 'admin@mail.com', 1, NULL),
(2, 'Juan Pérez', 'juanperez', 'juan123', 'juanperez@usuario.com', 2, NULL),
(3, 'María López', 'marialopez', 'maria123', 'marialopez@medico.com', 3, 2),
(4, 'Guille', 'GUIELD', 'wah123', 'guield@usuario.com', 2, NULL),
(5, 'Nico', 'nico', 'nico123', 'nico@medico.com', 3, 1),
(6, 'Nancy', 'nancy', 'nancy123', 'nancy@medico.com', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

DROP TABLE IF EXISTS `vacunas`;
CREATE TABLE IF NOT EXISTS `vacunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_mascota` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mascota` (`id_mascota`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `nombre`, `id_mascota`) VALUES
(1, 'Vacuna contra la rabia', 1),
(2, 'Vacuna contra el parvovirus', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
