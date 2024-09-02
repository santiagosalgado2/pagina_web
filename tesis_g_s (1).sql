-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2024 a las 17:40:36
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
-- Base de datos: `tesis_g_s`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_verificacion`
--

CREATE TABLE `codigos_verificacion` (
  `ID_codigo` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `tipo` enum('verificacion','recuperar_contrasena') NOT NULL,
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
(8, 12, '999469', 'verificacion', '2024-08-30 22:39:04', '2024-08-30 23:39:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `ID_dispositvo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `ID_esp32` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disp_esp32`
--

CREATE TABLE `disp_esp32` (
  `ID_dispositivo` int(11) NOT NULL,
  `direccion_ip` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash_contrasena` varchar(128) NOT NULL,
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
(4, 'admin', 'admin@gmail.com', '$2y$10$CgcuFSF8TKd3ZYQzfjYpVOsl3SxRLkUibE0U21EujF1TG9jIvO9e.', NULL, '2024-08-30 17:29:40', 1, NULL, 1),
(5, 'user1', 'user@gmail.com', '$2y$10$OcAVcgVE23oFVYJwzgBYs.2bLIqO2Kpbh1/BZz3/22Aej1/OgIWfi', NULL, '2024-08-30 17:29:43', 1, NULL, 1),
(7, 'santiagosalgado', 'santiagosalgado2007@gmail.com', '$2y$10$WVoTZnc8jBayoEAifc7y/.GykyvfdN5fmRPNyX1Y46c0bQxkXPYae', NULL, '2024-08-30 17:29:44', 1, NULL, 1),
(8, 'gordo', 'abc@gmail.com', '$2y$10$5H.Zc44WYCZPP3cMZNMBfeC6Y2gOvxTUhQqGqfZm6ieSrUEDcKocu', NULL, '2024-08-30 17:29:46', 2, 4, 1),
(9, 'santiagosalgado2', 'santiagosalgado@alumnos.itr3.edu.ar', '$2y$10$1.LHdqyuw363zhC77F5M0eco.ke9YCRVfyPbOeGWfaATA1wNdxpqK', NULL, '2024-08-30 17:29:48', 1, NULL, 1),
(12, 'santiagosalgado4', 'santisalgado33@gmail.com', '$2y$10$/.pl0v.vin1WZ4NAMBS3pebO8kS.oD/grUdWjseuvq/BnutNVdpCK', NULL, '2024-08-30 22:39:57', 1, NULL, 1);

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
  ADD PRIMARY KEY (`ID_dispositvo`);

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
  MODIFY `ID_a_u` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  MODIFY `ID_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_dispositvo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `disp_esp32`
--
ALTER TABLE `disp_esp32`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `ID_funcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_attemps`
--
ALTER TABLE `login_attemps`
  MODIFY `ID_login_attemp` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
