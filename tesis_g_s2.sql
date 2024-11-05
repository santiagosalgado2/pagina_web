-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2024 a las 22:17:56
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
-- Base de datos: `tesis_g_s2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso_usuarios`
--

CREATE TABLE `acceso_usuarios` (
  `ID_a_u` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `ID_dispositivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `acceso_usuarios`
--

INSERT INTO `acceso_usuarios` (`ID_a_u`, `ID_usuario`, `ID_dispositivo`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 5, 4),
(5, 5, 5),
(6, 5, 6),
(7, 7, 7),
(8, 7, 8),
(9, 7, 9),
(10, 8, 2),
(11, 8, 5),
(13, 4, 36),
(14, 4, 37),
(15, 4, 38),
(16, 4, 39),
(17, 4, 40),
(18, 4, 41),
(19, 9, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_verificacion`
--

CREATE TABLE `codigos_verificacion` (
  `ID_codigo` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `tipo` enum('verificacion','recuperar_contrasena','crear_contrasena','cambiar_mail') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_expiracion` timestamp NOT NULL DEFAULT (current_timestamp() + interval 1 hour),
  `usado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `ID_dispositivo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `ID_esp32` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`ID_dispositivo`, `nombre`, `ID_tipo`, `ID_esp32`) VALUES
(1, 'Aire acondicionado Samsung - Aula 101', 1, 1),
(2, 'Televisor LG - Aula 101', 2, 1),
(3, 'Ventilador Philips - Aula 101', 3, 1),
(4, 'Aire acondicionado Daikin - Aula 102', 1, 2),
(5, 'Televisor Sony - Aula 102', 2, 2),
(6, 'Ventilador Rowenta - Aula 102', 3, 2),
(7, 'Aire acondicionado Midea - Laboratorio', 1, 3),
(8, 'Televisor Panasonic - Laboratorio', 2, 3),
(9, 'Ventilador Xion - Laboratorio', 3, 3),
(10, 'Aire acondicionado Electrolux - Sala de Profesores', 1, 4),
(11, 'Televisor Samsung - Sala de Profesores', 2, 4),
(12, 'Ventilador Philips - Sala de Profesores', 3, 4),
(13, 'Aire acondicionado LG - Biblioteca', 1, 5),
(14, 'Televisor Hisense - Biblioteca', 2, 5),
(15, 'Ventilador Atma - Biblioteca', 3, 5),
(36, 'Aire sala info', 1, 13),
(37, 'Tele sala', 2, 13),
(38, 'Ventilador sala', 3, 13),
(39, 'Tele aula 2', 2, 6),
(40, 'Aire sala 23', 1, 12),
(41, 'Tele', 2, 12),
(42, 'asd', 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disp_esp32`
--

CREATE TABLE `disp_esp32` (
  `ID_dispositivo` int(11) NOT NULL,
  `direccion_ip` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `ID_administrador` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `disp_esp32`
--

INSERT INTO `disp_esp32` (`ID_dispositivo`, `direccion_ip`, `estado`, `ubicacion`, `ID_administrador`, `codigo`) VALUES
(1, '10.81.11.67', 1, 'Aula 101', 4, ''),
(2, '192.168.0.11', 1, 'Aula 102', 9, ''),
(3, '192.168.0.12', 1, 'Laboratorio', 9, ''),
(4, '192.168.0.13', 1, 'Sala de profesores', 0, ''),
(5, '192.168.0.14', 1, 'Biblioteca', 0, ''),
(6, '10.81.11.242', 1, 'aula 2', 4, ''),
(7, '10.81.11.242', 1, 'aula 3', 4, ''),
(8, '10.81.11.228', 1, 'Habitación 1', 9, ''),
(11, '192.168.2.200', 1, 'Cocina 4', 9, 'ABCD1234'),
(12, '10.81.11.177', 1, 'Aula informatica', 4, '8lIsgR9J');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `ID_funcion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attemps`
--

CREATE TABLE `login_attemps` (
  `ID_login_attemp` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `exitoso` tinyint(1) NOT NULL,
  `direccion_ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `login_attemps`
--

INSERT INTO `login_attemps` (`ID_login_attemp`, `ID_usuario`, `fecha`, `exitoso`, `direccion_ip`) VALUES
(1, 4, '2024-09-25 20:41:44', 1, '::1'),
(2, 4, '2024-09-25 20:42:49', 1, 'localhost'),
(3, 4, '2024-09-25 20:43:28', 1, '::1'),
(4, 4, '2024-09-30 20:54:32', 1, '::1'),
(5, 4, '2024-09-30 21:15:13', 1, '::1'),
(6, NULL, '2024-10-01 22:48:10', 0, '::1'),
(7, NULL, '2024-10-01 22:48:16', 0, '::1'),
(8, NULL, '2024-10-01 22:48:20', 0, '::1'),
(9, NULL, '2024-10-01 22:49:18', 0, '::1'),
(10, NULL, '2024-10-01 23:04:14', 0, '::1'),
(11, 4, '2024-10-01 23:04:51', 1, '::1'),
(12, 4, '2024-10-02 18:52:13', 1, '::1'),
(13, 4, '2024-10-02 18:56:46', 0, '::1'),
(14, 4, '2024-10-02 18:56:52', 1, '::1'),
(15, 4, '2024-10-02 19:00:31', 1, '::1'),
(16, 4, '2024-10-04 17:24:28', 1, '::1'),
(17, 9, '2024-10-04 17:53:14', 0, '::1'),
(18, 9, '2024-10-04 17:53:19', 1, '::1'),
(19, NULL, '2024-10-07 21:40:21', 0, '::1'),
(20, 4, '2024-10-07 21:40:24', 1, '::1'),
(21, 9, '2024-10-07 21:51:54', 1, '::1'),
(22, 22, '2024-10-07 22:14:33', 0, '::1'),
(23, 22, '2024-10-07 22:15:00', 1, '::1'),
(24, 22, '2024-10-07 22:16:47', 1, '::1'),
(25, 4, '2024-10-08 19:18:39', 1, '::1'),
(26, 4, '2024-10-16 00:34:24', 1, '::1'),
(27, 4, '2024-10-16 00:34:37', 1, '::1'),
(28, 8, '2024-10-18 17:12:45', 1, '::1'),
(29, NULL, '2024-10-18 17:14:10', 0, '::1'),
(30, 4, '2024-10-18 17:14:14', 1, '::1'),
(31, 4, '2024-10-18 18:08:24', 1, '::1'),
(32, 8, '2024-10-18 18:08:35', 1, '::1'),
(33, 4, '2024-10-18 22:59:12', 1, '::1'),
(34, 4, '2024-10-21 21:49:10', 1, '::1'),
(35, 9, '2024-10-21 22:16:24', 1, '::1'),
(36, NULL, '2024-10-23 19:28:15', 0, '::1'),
(37, 4, '2024-10-23 19:28:21', 1, '::1'),
(38, 9, '2024-10-23 19:32:00', 1, '::1'),
(39, 9, '2024-10-23 19:32:48', 1, '::1'),
(40, 9, '2024-10-23 19:34:56', 1, '::1'),
(41, 4, '2024-10-25 17:16:31', 1, '::1'),
(42, 4, '2024-10-25 17:17:30', 1, '::1'),
(43, 9, '2024-10-29 21:26:40', 1, '::1'),
(44, NULL, '2024-10-29 22:01:52', 0, '::1'),
(45, 4, '2024-10-29 22:01:55', 1, '::1'),
(46, 9, '2024-10-29 22:03:59', 1, '::1'),
(47, 23, '2024-10-30 19:54:55', 1, '::1'),
(48, 23, '2024-10-30 19:56:06', 1, '::1'),
(49, 23, '2024-10-30 20:16:52', 1, '::1'),
(50, 23, '2024-10-30 20:24:21', 1, '::1'),
(51, NULL, '2024-11-04 20:51:25', 0, '::1'),
(52, 4, '2024-11-04 20:51:32', 1, '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `ID_permiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`ID_permiso`, `nombre`, `descripcion`) VALUES
(1, 'administrador', '-'),
(2, 'profesor', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senalesir`
--

CREATE TABLE `senalesir` (
  `ID_senal` int(11) NOT NULL,
  `codigo_hexadecimal` varchar(90) NOT NULL,
  `ID_dispositivo` int(11) NOT NULL,
  `ID_funcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dispositivos`
--

CREATE TABLE `tipo_dispositivos` (
  `ID_tipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo_dispositivos`
--

INSERT INTO `tipo_dispositivos` (`ID_tipo`, `nombre`) VALUES
(1, 'Aire acondicionado'),
(2, 'Televisor'),
(3, 'Ventilador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash_contrasena` varchar(128) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_permiso` int(11) NOT NULL,
  `ID_administrador` int(11) DEFAULT NULL,
  `verificado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre_usuario`, `email`, `hash_contrasena`, `salt`, `fecha_creacion`, `ID_permiso`, `ID_administrador`, `verificado`) VALUES
(4, 'admin3', 'admin@gmail.com', '$2y$10$CgcuFSF8TKd3ZYQzfjYpVOsl3SxRLkUibE0U21EujF1TG9jIvO9e.', NULL, '2024-08-30 17:29:40', 1, NULL, 1),
(5, 'user1', 'user@gmail.com', '$2y$10$OcAVcgVE23oFVYJwzgBYs.2bLIqO2Kpbh1/BZz3/22Aej1/OgIWfi', NULL, '2024-08-30 17:29:43', 1, NULL, 1),
(8, 'gordo', 'abc@gmail.com', '$2y$10$5H.Zc44WYCZPP3cMZNMBfeC6Y2gOvxTUhQqGqfZm6ieSrUEDcKocu', NULL, '2024-08-30 17:29:46', 2, 4, 1),
(9, 'santiagosalgado2', 'santiagosalgado@alumnos.itr3.edu.ar3', '$2y$10$qHa8TDB1iczmwP42Rl2SDOyfIiRy2/MSkuPhf9I72ECXOnHC9sZZ6', NULL, '2024-09-16 21:59:52', 1, NULL, 1),
(16, 'santiago5', 'santisalgado33@gmail.co', '$2y$10$ZPZK7jH0exu0r6DYkDzpVuIrmlz8LYfpmUCGFEG/U2q3S9ESUDYPe', NULL, '2024-09-16 21:59:41', 2, 4, 1),
(17, 'gordo3', 'santiagosalgado@alumnos.itr3.edu.ars', '$2y$10$66tqrAOMRA7Emf9/0q59Q.4Hbj2cwK9nrhcC7atZXcJ3j/QFncovW', NULL, '2024-09-16 22:02:36', 2, 4, 1),
(20, 'santiago7', 'santiagosalgado@alumnos.itr3.edu.ar1', '$2y$10$dgtUdgvrH79c5N2Mj0Dl7eX.V5BJJB7Q22wCIKYPs6nB0QMVDYFJq', NULL, '2024-09-23 22:11:48', 2, 4, 1),
(22, 'gord22', 'santiagosalgado@alumnos.itr3.edu.ar4', '$2y$10$2LeGj3q3rmNlxMdffnntl.4XMlA1z5vh.s3MmvYy6AG5MuZrh6IZG', NULL, '2024-10-07 21:58:44', 2, 9, 1),
(23, 'santiago9', 'santiagosalgado@alumnos.itr3.edu.ar', '$2y$10$o/wDt1KxN9FIMsEs7PEF4OPfjQgGucIKg5sacNEdQ/crsh49mB5ni', NULL, '2024-10-30 19:54:10', 1, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso_usuarios`
--
ALTER TABLE `acceso_usuarios`
  ADD PRIMARY KEY (`ID_a_u`);

--
-- Indices de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  ADD PRIMARY KEY (`ID_codigo`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`ID_dispositivo`);

--
-- Indices de la tabla `disp_esp32`
--
ALTER TABLE `disp_esp32`
  ADD PRIMARY KEY (`ID_dispositivo`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`ID_funcion`);

--
-- Indices de la tabla `login_attemps`
--
ALTER TABLE `login_attemps`
  ADD PRIMARY KEY (`ID_login_attemp`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID_permiso`);

--
-- Indices de la tabla `senalesir`
--
ALTER TABLE `senalesir`
  ADD PRIMARY KEY (`ID_senal`);

--
-- Indices de la tabla `tipo_dispositivos`
--
ALTER TABLE `tipo_dispositivos`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso_usuarios`
--
ALTER TABLE `acceso_usuarios`
  MODIFY `ID_a_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  MODIFY `ID_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `disp_esp32`
--
ALTER TABLE `disp_esp32`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `ID_funcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_attemps`
--
ALTER TABLE `login_attemps`
  MODIFY `ID_login_attemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `senalesir`
--
ALTER TABLE `senalesir`
  MODIFY `ID_senal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_dispositivos`
--
ALTER TABLE `tipo_dispositivos`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `borrar_codigos_expirados` ON SCHEDULE EVERY 1 HOUR STARTS '2024-08-30 13:42:37' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM codigos_verificacion WHERE fecha_expiracion < CURRENT_TIMESTAMP()$$

CREATE DEFINER=`root`@`localhost` EVENT `eliminar_codigos_expirados` ON SCHEDULE EVERY 1 HOUR STARTS '2024-09-13 15:04:46' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM codigos_verificacion
  WHERE fecha_expiracion < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
