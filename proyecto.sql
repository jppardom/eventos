-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2026 a las 15:50:48
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(10) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `especialidad` varchar(30) NOT NULL,
  `periodo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `cedula`, `nombres`, `apellido`, `correo`, `especialidad`, `periodo`) VALUES
(1, '1111111111', 'María José', 'Armijos Pineda', 'estudiante1@example.com', 'Desarrollo de Software', 'abril - sep 2026'),
(2, '2222222222', 'Luis Alfredo', 'Jaramillo Cueva', 'estudiante2@example.com', 'Desarrollo de Software', 'abril - sep 2026'),
(3, '3333333333', 'Ana Belén', 'Torres Valarezo', 'estudiante3@example.com', 'Desarrollo de Software', 'abril - sep 2026'),
(4, '4444444444', 'Diego Paúl', 'Medina Loaiza', 'estudiante4@example.com', 'Desarrollo de Software', 'abril - sep 2026'),
(5, '5555555555', 'Diana Carolina', 'Espinoza Córdova', 'estudiante5@example.com', 'Desarrollo de Software', 'abril - sep 2026');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `ubicacion`, `fecha`, `estado`) VALUES
(1, 'Campania de Reciclaje RAEE', 'Patio Central Bloque A', '2026-06-15', 'activo'),
(2, 'Seminario Green IT 2026', 'Auditorio Principal', '2026-07-22', 'activo'),
(3, 'Auditoria de Desincorporacion', 'Laboratorio de Soporte', '2026-08-05', 'activo'),
(4, 'Taller de Borrado Seguro', 'Aula Virtual 3', '2026-09-12', 'activo'),
(5, 'Firma de Convenio RAEE', 'Sala de Consejo', '2026-10-01', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero_peliculas`
--

CREATE TABLE `genero_peliculas` (
  `id_genero` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero_peliculas`
--

INSERT INTO `genero_peliculas` (`id_genero`, `nombres`) VALUES
(1, 'Terror'),
(2, 'Drama'),
(3, 'Suspenso'),
(4, 'Animado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(10) NOT NULL,
  `id_invitado` char(10) NOT NULL,
  `cantidad_personas` int(2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `id_invitado`, `cantidad_personas`, `fecha`) VALUES
(6, 'INV0000001', 3, '2026-06-04 02:46:21'),
(7, 'INV0000002', 3, '2026-06-04 02:46:21'),
(8, 'INV0000003', 3, '2026-06-04 02:46:21'),
(9, 'INV0000004', 3, '2026-06-04 02:46:21'),
(10, 'INV0000005', 3, '2026-06-04 02:46:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` char(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_evento` int(10) NOT NULL,
  `cupo` int(2) NOT NULL,
  `codigo_qr` varchar(250) NOT NULL,
  `qr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `id_estudiante`, `id_evento`, `cupo`, `codigo_qr`, `qr`) VALUES
('fsYMEZkgqd', 4, 4, 3, 'QR_fsYMEZkgqd_TallerdeBorradoSeguro_3_4444444444', 'public/qrs/fsYMEZkgqd.png'),
('INV0000001', 1, 1, 2, 'QR_CAMPANIA_RAEE_01', 'public/qrs/error.png'),
('INV0000002', 2, 2, 1, 'QR_SEMINARIO_GREEN_02', 'public/qrs/error.png'),
('INV0000003', 3, 1, 3, 'QR_CAMPANIA_RAEE_03', 'public/qrs/error.png'),
('INV0000004', 4, 4, 1, 'QR_TALLER_BORRADO_04', 'public/qrs/error.png'),
('INV0000005', 5, 2, 2, 'QR_SEMINARIO_GREEN_05', 'public/qrs/error.png'),
('INV00007', 1, 3, 2, 'Seminario123_2_invitados', 'public/qrs/error.png'),
('YJXM42LtyK', 5, 2, 2, 'QR_YJXM42LtyK_SeminarioGreenIT2026_2_5555555555', 'public/qrs/error.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `lenguaje` varchar(50) NOT NULL,
  `actor` varchar(100) NOT NULL,
  `anio` varchar(10) NOT NULL,
  `doblada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `id_genero`, `lenguaje`, `actor`, `anio`, `doblada`) VALUES
(2, 'fdsfsda', 1, 'Español', 'sdafsad', '2024', 'SI'),
(4, 'pelicula', 2, 'Castellano', 'Luis', '2024', 'SI'),
(5, 'ABC', 1, 'Ingles', 'María', '2020', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `usuario`, `contrasenia`) VALUES
(1, 'Juan Pablo', 'Pardo Montero', 'juan', 'admin'),
(2, 'José', 'Mora Cueva', 'jmora', 'clave123'),
(3, 'Patricia', 'Torres Salinas', 'ptorres', 'clave123'),
(4, 'Andrés', 'Romero Castillo', 'aromero', 'clave123'),
(5, 'Daniela', 'Vega Ortiz', 'dvega', 'clave123'),
(6, 'Miguel', 'Cárdenas León', 'mcardenas', 'clave123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `genero_peliculas`
--
ALTER TABLE `genero_peliculas`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_inivitado` (`id_invitado`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`),
  ADD UNIQUE KEY `codigo_qr` (`codigo_qr`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero_peliculas`
--
ALTER TABLE `genero_peliculas`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`id_invitado`) REFERENCES `invitados` (`id_invitado`);

--
-- Filtros para la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD CONSTRAINT `invitados_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `invitados_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero_peliculas` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
