-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 19:04:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbregistro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_session`
--

CREATE TABLE `inicio_session` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inicio_session`
--

INSERT INTO `inicio_session` (`id`, `usuario_id`, `nombre_usuario`, `contrasena`) VALUES
(1, 1, 'velazquezrocio70@gmail.com', '43073431'),
(2, 2, 'mjsn98@gmail.com', '41748148'),
(3, 3, 'nicocalderon9818@gmail.com', '41299019'),
(4, 4, 'cherryrooma@gmail.com', '41036243'),
(5, 5, 'amirseade0@gmail.com', '44799752'),
(6, 6, 'leandrocortez@gmai..com', '36045409'),
(7, 7, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(500) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre_proyecto`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(3, 'Sitio \"Gestion de Proyectos\"', NULL, '2023-06-05', '2023-06-16'),
(4, 'Recibo digital', NULL, '2023-06-12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `nombre_tarea` varchar(500) NOT NULL,
  `descripcion_tarea` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `usuario_compartido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre_tarea`, `descripcion_tarea`, `fecha_inicio`, `fecha_fin`, `id_proyecto`, `id_usuario`, `usuario_compartido`) VALUES
(7, 'Desarrollo Front', NULL, NULL, NULL, 3, 1, 1),
(8, 'Desarrollo Back', NULL, NULL, NULL, 3, 2, 2),
(9, 'Diseño de Recibo', NULL, NULL, NULL, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `administrador`) VALUES
(1, 'Rocio Velazquez', 'velazquezrocio70@gmail.com', 0),
(2, 'Mara Santillan', 'mjsn98@gmail.com', 0),
(3, 'Nicolas Calderon', 'nicocalderon9818@gmail.com', 0),
(4, 'Rocio Marcos', 'cherryrooma@gmail.com', 0),
(5, 'Amir Seade', 'amirseade0@gmail.com', 0),
(6, 'Leandro Cortes', 'leandrocortes@gmail.com', 0),
(7, 'admin', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_compartidos`
--

CREATE TABLE `usuarios_compartidos` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_compartidos`
--

INSERT INTO `usuarios_compartidos` (`id`, `id_proyecto`, `id_usuario`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 4, 1),
(4, 4, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inicio_session`
--
ALTER TABLE `inicio_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_compartidos`
--
ALTER TABLE `usuarios_compartidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `usuarios_compartidos_ibfk_1` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inicio_session`
--
ALTER TABLE `inicio_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios_compartidos`
--
ALTER TABLE `usuarios_compartidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inicio_session`
--
ALTER TABLE `inicio_session`
  ADD CONSTRAINT `inicio_session_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`actividad_id`) REFERENCES `tareas` (`id_act`);

--
-- Filtros para la tabla `usuarios_compartidos`
--
ALTER TABLE `usuarios_compartidos`
  ADD CONSTRAINT `usuarios_compartidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
