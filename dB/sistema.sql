-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: codeigniter-db:3306
-- Tiempo de generación: 14-05-2021 a las 15:43:14
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `especialidad` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `usuario_id`, `nombre`, `apellido`, `area`, `especialidad`, `cedula`, `status`) VALUES
(6, 7, 'Usuario', 'Prueba', 'Genetica', 'Especialidad de Prueba', '15852111154', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `range` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `password`, `status`, `range`) VALUES
(1, 'baubyte', 'admin@admin.com', '123456789', 1, 2),
(7, 'usuario', 'usuario@mail.com', '1EkWgob4', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
