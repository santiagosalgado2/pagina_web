-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 16:24:58
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
(12, 4, 34),
(13, 4, 35),
(14, 4, 36),
(15, 4, 37),
(16, 17, 37),
(20, 4, 41),
(22, 4, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_verificacion`
--

CREATE TABLE `codigos_verificacion` (
  `ID_codigo` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `tipo` enum('verificacion','recuperar_contrasena','crear_contrasena','cambiar_usuario') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_expiracion` timestamp NOT NULL DEFAULT (current_timestamp() + interval 1 hour),
  `usado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `codigos_verificacion`
--

INSERT INTO `codigos_verificacion` (`ID_codigo`, `ID_usuario`, `codigo`, `tipo`, `fecha_creacion`, `fecha_expiracion`, `usado`) VALUES
(1, 11, '366755', 'verificacion', '2024-08-30 18:15:28', '2024-08-30 19:15:28', 1),
(2, 11, '164652', 'verificacion', '2024-08-30 18:34:00', '2024-08-30 19:34:00', 1),
(3, 11, '935656', 'verificacion', '2024-08-30 18:36:02', '2024-08-30 19:36:02', 0),
(4, 11, '141797', 'verificacion', '2024-08-30 18:36:17', '2024-08-30 19:36:17', 1),
(5, 11, '545367', 'verificacion', '2024-08-30 18:36:44', '2024-08-30 19:36:44', 0),
(6, 12, '372068', 'verificacion', '2024-08-30 22:35:56', '2024-08-30 23:35:56', 1),
(7, 12, '837246', 'verificacion', '2024-08-30 22:38:24', '2024-08-30 23:38:24', 0),
(8, 12, '999469', 'verificacion', '2024-08-30 22:39:04', '2024-08-30 23:39:04', 1),
(9, 13, '724611', 'verificacion', '2024-09-03 01:21:59', '2024-09-03 02:21:59', 1),
(10, 13, '761192', 'verificacion', '2024-09-03 01:22:38', '2024-09-03 02:22:38', 0),
(11, 13, '262961', 'verificacion', '2024-09-03 01:22:58', '2024-09-03 02:22:58', 1),
(12, 13, '147777', 'verificacion', '2024-09-03 02:08:51', '2024-09-03 03:08:51', 1),
(13, 13, '562926', 'recuperar_contrasena', '2024-09-03 02:26:53', '2024-09-03 03:26:53', 1),
(14, 13, '428911', 'recuperar_contrasena', '2024-09-03 02:27:51', '2024-09-03 03:27:51', 1),
(15, 13, '731376', 'recuperar_contrasena', '2024-09-03 02:30:16', '2024-09-03 03:30:16', 1),
(16, 13, '143680', 'recuperar_contrasena', '2024-09-03 02:32:37', '2024-09-03 03:32:37', 1),
(17, 14, '433259', 'verificacion', '2024-09-03 14:47:06', '2024-09-03 15:47:06', 1),
(18, 14, '108313', 'recuperar_contrasena', '2024-09-03 14:47:57', '2024-09-03 15:47:57', 1),
(19, 14, '550808', 'recuperar_contrasena', '2024-09-03 14:52:46', '2024-09-03 15:52:46', 1),
(20, 15, '514633', '', '2024-09-05 01:59:58', '2024-09-05 02:59:58', 0),
(21, 15, '395070', 'verificacion', '2024-09-05 02:02:42', '2024-09-05 03:02:42', 1),
(22, 14, '130694', 'recuperar_contrasena', '2024-09-09 16:47:34', '2024-09-09 17:47:34', 1),
(23, 16, '107508', 'crear_contrasena', '2024-09-11 20:44:43', '2024-09-11 21:44:43', 0),
(24, 14, '266947', 'recuperar_contrasena', '2024-09-15 00:32:40', '2024-09-15 01:32:40', 1),
(25, 17, '148464', 'crear_contrasena', '2024-09-15 00:36:48', '2024-09-15 01:36:48', 0),
(26, 9, '116576', 'recuperar_contrasena', '2024-10-03 14:32:32', '2024-10-03 15:32:32', 1),
(27, 9, '109516', 'recuperar_contrasena', '2024-10-03 14:32:56', '2024-10-03 15:32:56', 0),
(28, 17, '459414', 'recuperar_contrasena', '2024-10-07 12:59:22', '2024-10-07 13:59:22', 1),
(29, 17, '444337', 'recuperar_contrasena', '2024-10-07 12:59:57', '2024-10-07 13:59:57', 0),
(30, 17, '122043', 'verificacion', '2024-10-07 13:00:19', '2024-10-07 14:00:19', 1),
(31, 18, '156706', 'crear_contrasena', '2024-11-05 13:26:44', '2024-11-05 14:26:44', 0),
(32, 14, '478726', 'recuperar_contrasena', '2024-11-06 01:57:47', '2024-11-06 02:57:47', 1),
(33, 19, '128607', 'verificacion', '2024-11-06 02:00:13', '2024-11-06 03:00:13', 1),
(34, 9, '128971', 'cambiar_usuario', '2024-11-20 15:23:16', '2024-11-20 16:23:16', 1),
(35, 9, '813296', 'cambiar_usuario', '2024-11-20 15:24:01', '2024-11-20 16:24:01', 1);

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
(34, 'tele de mi pieza', 2, 7),
(35, 'Aire de mi pieza', 1, 7),
(37, 'ventilador', 3, 7),
(41, 'Aire de mi pieza', 1, 12),
(43, 'tele de mi pieza', 2, 19);

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
(1, '192.168.0.10', 1, 'Aula 101', 0, ''),
(2, '192.168.0.11', 1, 'Aula 102', 0, ''),
(3, '192.168.0.12', 1, 'Laboratorio', 0, ''),
(4, '192.168.0.13', 1, 'Sala de profesores', 0, ''),
(5, '192.168.0.14', 1, 'Biblioteca', 0, ''),
(6, '192.168.1.115', 1, 'Pieza', 9, 'ABCD1234'),
(7, '192.168.1.115', 1, 'Mi pieza', 4, '8lIsgR9'),
(12, '1.1.1.1', 1, 'Prueba', 4, 'Abc123'),
(17, '192.168.1.115', 1, 'casa 3', 9, '8lIsgR9'),
(19, '192.168.1.115', 1, 'fg', 4, '8lIsgR9'),
(20, '192.168.1.115', 1, 'asd', 4, '8lIsgR9J');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exitoso` tinyint(1) NOT NULL,
  `direccion_ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `login_attemps`
--

INSERT INTO `login_attemps` (`ID_login_attemp`, `ID_usuario`, `fecha`, `exitoso`, `direccion_ip`) VALUES
(1, 4, '2024-09-26 00:01:33', 1, '::1'),
(2, 4, '2024-09-26 00:07:57', 1, '::1'),
(5, 4, '2024-09-26 00:13:29', 1, '::1'),
(6, NULL, '2024-09-26 00:13:46', 0, '::1'),
(7, 4, '2024-09-26 00:13:57', 0, '::1'),
(8, NULL, '2024-09-28 17:42:00', 0, '::1'),
(9, 4, '2024-09-28 17:42:53', 1, '::1'),
(10, 4, '2024-09-28 17:47:20', 0, '::1'),
(11, 17, '2024-09-28 17:49:45', 0, '::1'),
(12, 17, '2024-09-28 17:49:54', 0, '::1'),
(13, 4, '2024-09-28 17:50:14', 1, '::1'),
(14, 4, '2024-09-28 17:50:32', 1, '::1'),
(15, 9, '2024-10-03 14:32:10', 0, '::1'),
(16, 9, '2024-10-03 14:32:16', 0, '::1'),
(17, 9, '2024-10-03 14:33:21', 1, '::1'),
(18, 4, '2024-10-07 12:54:17', 1, '::1'),
(19, 17, '2024-10-07 12:58:50', 0, '::1'),
(20, 17, '2024-10-07 12:59:05', 0, '::1'),
(21, 17, '2024-10-07 13:00:19', 1, '::1'),
(22, 4, '2024-10-07 13:00:47', 1, '::1'),
(23, 8, '2024-10-07 13:03:58', 1, '::1'),
(24, 4, '2024-10-07 13:19:37', 1, '::1'),
(25, 4, '2024-10-08 14:22:16', 1, '::1'),
(26, 4, '2024-10-08 14:30:08', 1, '::1'),
(27, 4, '2024-10-14 02:50:53', 1, '::1'),
(28, 9, '2024-10-16 15:02:34', 1, '::1'),
(29, 4, '2024-10-17 13:20:57', 1, '::1'),
(30, 4, '2024-10-17 13:21:26', 0, '::1'),
(31, 4, '2024-10-17 13:21:30', 1, '::1'),
(32, 17, '2024-10-17 13:51:17', 1, '::1'),
(33, 17, '2024-10-17 13:52:00', 1, '::1'),
(34, 4, '2024-10-17 13:53:13', 1, '::1'),
(35, 17, '2024-10-17 13:55:28', 1, '::1'),
(36, 4, '2024-10-19 16:44:41', 1, '::1'),
(37, 4, '2024-10-22 18:41:41', 1, '::1'),
(38, 4, '2024-10-24 14:35:44', 1, '::1'),
(39, 4, '2024-10-24 14:56:48', 1, '::1'),
(40, 4, '2024-10-24 20:10:31', 1, '::1'),
(41, 8, '2024-10-26 16:08:09', 1, '::1'),
(42, 4, '2024-10-26 18:59:13', 1, '::1'),
(43, 4, '2024-10-31 13:12:00', 1, '::1'),
(44, 9, '2024-10-31 13:39:28', 1, '::1'),
(45, NULL, '2024-11-06 01:56:03', 0, '::1'),
(46, NULL, '2024-11-06 01:56:10', 0, '::1'),
(47, 4, '2024-11-06 01:56:13', 0, '::1'),
(48, NULL, '2024-11-06 01:56:28', 0, '::1'),
(49, 4, '2024-11-06 01:56:31', 1, '::1'),
(50, 17, '2024-11-06 01:58:30', 1, '::1'),
(51, 4, '2024-11-06 02:00:48', 1, '::1'),
(52, 4, '2024-11-06 02:03:06', 1, '::1'),
(53, 19, '2024-11-06 02:17:55', 1, '::1'),
(54, 4, '2024-11-06 02:18:08', 1, '::1'),
(55, 17, '2024-11-06 02:18:29', 1, '::1'),
(56, 4, '2024-11-10 20:26:22', 1, '::1'),
(57, 4, '2024-11-10 22:45:00', 1, '::1'),
(58, 4, '2024-11-19 00:24:34', 1, '::1'),
(59, 4, '2024-11-20 15:21:40', 1, '::1'),
(60, 9, '2024-11-20 15:22:36', 1, '::1');

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
(1, 'administrador', '-');

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
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_permiso` int(11) NOT NULL,
  `ID_administrador` int(11) DEFAULT NULL,
  `verificado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre_usuario`, `email`, `hash_contrasena`, `salt`, `fecha_creacion`, `ID_permiso`, `ID_administrador`, `verificado`) VALUES
(4, 'admin2', 'admin@gmail.com', '$2y$10$CgcuFSF8TKd3ZYQzfjYpVOsl3SxRLkUibE0U21EujF1TG9jIvO9e.', NULL, '2024-10-08 13:48:03', 1, NULL, 1),
(5, 'user1', 'user@gmail.com', '$2y$10$OcAVcgVE23oFVYJwzgBYs.2bLIqO2Kpbh1/BZz3/22Aej1/OgIWfi', NULL, '2024-08-30 17:29:43', 1, NULL, 1),
(8, 'catriel', 'abc@gmail.com', '$2y$10$5H.Zc44WYCZPP3cMZNMBfeC6Y2gOvxTUhQqGqfZm6ieSrUEDcKocu', NULL, '2024-11-20 15:24:45', 2, 4, 1),
(9, 'santiagosalgado3', 'santiagosalgado@alumnos.itr3.edu.ar', '$2y$10$XlIpLb5HHd6kz2cAcoWpSOhdTSuinJWTN.F9iBRoUD3Ytc3i2tiO2', NULL, '2024-11-20 15:23:45', 1, NULL, 1),
(14, 'santiago', 'santiagosalgado2007@gmail.co', '$2y$10$RvAPqk1VfdVdsrEDtAloneM.tSVJL76F6LIftUHr6rExHBFo4NJI6', NULL, '2024-11-06 01:59:28', 1, NULL, 1),
(17, 'santiago3', 'santisalgado33@gmail.com', '$2y$10$TfSHnHF88EAezeFBGWLdGuBTOzDrpaFy/rB.TFAYNR6Eig7BP.pt.', NULL, '2024-10-07 13:00:30', 2, 4, 1),
(19, 'santiagosalgado', 'santiagosalgado2007@gmail.com', '$2y$10$Iwx1U4GhOSG3zBgkbBKC7O2vBYUHCLdk5TGfFKSgbyoNERVP4stHW', NULL, '2024-11-06 02:00:29', 1, NULL, 1);

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
  MODIFY `ID_a_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  MODIFY `ID_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `disp_esp32`
--
ALTER TABLE `disp_esp32`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `ID_funcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_attemps`
--
ALTER TABLE `login_attemps`
  MODIFY `ID_login_attemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `senalesir`
--
ALTER TABLE `senalesir`
  MODIFY `ID_senal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_dispositivos`
--
ALTER TABLE `tipo_dispositivos`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `borrar_codigos_expirados` ON SCHEDULE EVERY 1 HOUR STARTS '2024-08-30 13:42:37' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM codigos_verificacion WHERE fecha_expiracion < CURRENT_TIMESTAMP()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
