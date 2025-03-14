-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2025 a las 16:02:06
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
(2, 4, 2),
(4, 5, 4),
(5, 5, 5),
(6, 5, 6),
(7, 7, 7),
(8, 7, 8),
(9, 7, 9),
(10, 8, 2),
(11, 8, 5),
(14, 4, 36),
(35, 28, 13),
(36, 28, 14),
(38, 8, 13),
(39, 8, 14),
(40, 8, 15),
(41, 28, 2),
(43, 4, 45),
(44, 4, 46),
(45, 4, 47),
(46, 17, 47),
(47, 4, 48),
(50, 4, 51),
(51, 4, 52);

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
(2, 'Televisor LG - Aula 101', 2, 1),
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
(45, 'ventilador', 3, 1),
(46, 'tele de mi pieza', 2, 7),
(47, 'venti', 3, 7),
(48, 'Aire de mi pieza', 1, 7),
(51, 'Tele', 2, 6),
(52, 'ventilador', 3, 6);

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
  `codigo` varchar(8) NOT NULL,
  `ultima_conexion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `disp_esp32`
--

INSERT INTO `disp_esp32` (`ID_dispositivo`, `direccion_ip`, `estado`, `ubicacion`, `ID_administrador`, `codigo`, `ultima_conexion`) VALUES
(1, '192.168.0.10', 0, 'Aula 101', 4, '', '2025-03-14 11:07:29'),
(2, '192.168.0.11', 0, 'Aula 102', 0, '', '2025-03-13 11:25:29'),
(3, '192.168.0.12', 0, 'Laboratorio', 0, '', '2025-03-13 11:25:29'),
(4, '192.168.0.13', 0, 'Sala de profesores', 0, '', '2025-03-13 11:25:29'),
(6, '192.168.1.115', 0, 'Pieza', 4, 'ABCD1234', '2025-03-13 11:25:29'),
(7, '192.168.1.115', 0, 'Mi pieza', 4, '8lIsgR9J', '2025-03-13 11:25:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `ID_funcion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`ID_funcion`, `nombre`) VALUES
(1, 'power'),
(2, 'input'),
(3, 'control'),
(4, 'menu'),
(5, 'netflix'),
(6, 'back'),
(7, 'chanelup'),
(8, 'chaneldown'),
(9, 'home'),
(10, 'volup'),
(11, 'voldown'),
(12, 'arrowup'),
(13, 'arrowleft'),
(14, 'arrowright'),
(15, 'arrowdown'),
(16, 'ok'),
(17, 'options'),
(18, 'mute'),
(19, 'num1'),
(20, 'num2'),
(21, 'num3'),
(22, 'num4'),
(23, 'num5'),
(24, 'num6'),
(25, 'num7'),
(26, 'num8'),
(27, 'num9'),
(28, 'num0'),
(29, 'time'),
(30, 'speed'),
(31, 'tempup'),
(32, 'tempdown'),
(33, 'swing'),
(34, 'sleep'),
(35, 'timeron'),
(36, 'timeroff'),
(37, 'leddisplay'),
(38, 'turbo'),
(39, 'direction');

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
(60, 9, '2024-11-20 15:22:36', 1, '::1'),
(61, 4, '2024-11-20 23:43:21', 1, '::1'),
(62, 9, '2024-11-20 23:51:11', 1, '::1'),
(63, 4, '2024-11-20 23:53:47', 0, '::1'),
(64, NULL, '2024-11-20 23:53:50', 0, '::1'),
(65, 9, '2024-11-20 23:55:22', 1, '::1'),
(66, 4, '2024-11-21 00:02:36', 1, '::1'),
(67, 9, '2024-11-21 00:10:00', 0, '::1'),
(68, 9, '2024-11-21 00:10:09', 1, '::1'),
(69, 4, '2024-11-21 00:22:29', 1, '::1'),
(70, 4, '2024-11-21 12:40:26', 1, '::1'),
(71, 17, '2024-11-21 22:29:16', 1, '::1'),
(72, 4, '2024-11-23 19:05:33', 1, '::1'),
(73, 4, '2024-11-23 19:13:13', 1, '::1'),
(74, 21, '2024-11-23 19:13:38', 1, '::1'),
(75, 21, '2024-11-23 19:32:40', 0, '::1'),
(76, 21, '2024-11-23 19:32:47', 1, '::1'),
(77, 4, '2024-11-23 19:40:38', 1, '::1'),
(78, 4, '2024-11-23 19:46:57', 1, '::1'),
(79, 4, '2024-11-23 19:48:13', 1, '::1'),
(80, 27, '2024-11-23 19:49:35', 1, '::1'),
(81, 4, '2024-11-23 19:51:13', 1, '::1'),
(82, 28, '2024-11-23 19:52:10', 1, '::1'),
(83, 4, '2024-11-23 19:53:15', 1, '::1'),
(84, 28, '2024-11-24 18:59:08', 1, '::1'),
(85, 4, '2024-11-24 18:59:27', 1, '::1'),
(86, 4, '2024-11-25 14:00:40', 1, '::1'),
(87, 4, '2024-11-26 01:39:20', 1, '::1'),
(88, 4, '2024-11-26 01:49:21', 1, '::1'),
(89, 4, '2025-01-09 17:25:29', 1, '::1'),
(90, 4, '2025-01-09 18:34:32', 1, '::1'),
(91, 4, '2025-01-24 19:27:01', 1, '::1');

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
(2, 'usuario', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos`
--

CREATE TABLE `protocolos` (
  `ID_protocolo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `protocolos`
--

INSERT INTO `protocolos` (`ID_protocolo`, `nombre`) VALUES
(1, 'GLOBALCACHE'),
(2, 'PRONTO'),
(3, 'RAW'),
(4, 'SHERWOOD'),
(5, 'SONY_38K'),
(6, 'AIRTON'),
(7, 'AIRWELL'),
(8, 'AIWA_RC_T501'),
(9, 'AMCOR'),
(10, 'ARGO'),
(11, 'ARRIS'),
(12, 'BOSCH144'),
(13, 'BOSE'),
(14, 'CARRIER_AC'),
(15, 'CARRIER_AC128'),
(16, 'CARRIER_AC40'),
(17, 'CARRIER_AC64'),
(18, 'CARRIER_AC84'),
(19, 'CLIMABUTLER'),
(20, 'COOLIX'),
(21, 'COOLIX48'),
(22, 'CORONA_AC'),
(23, 'DAIKIN'),
(24, 'DAIKIN128'),
(25, 'DAIKIN152'),
(26, 'DAIKIN160'),
(27, 'DAIKIN176'),
(28, 'DAIKIN2'),
(29, 'DAIKIN200'),
(30, 'DAIKIN216'),
(31, 'DAIKIN312'),
(32, 'DAIKIN64'),
(33, 'DELONGHI_AC'),
(34, 'DENON'),
(35, 'DISH'),
(36, 'DOSHISHA'),
(37, 'ECOCLIM'),
(38, 'ELECTRA_AC'),
(39, 'ELITESCREENS'),
(40, 'EPSON'),
(41, 'FUJITSU_AC'),
(42, 'GICABLE'),
(43, 'GOODWEATHER'),
(44, 'GORENJE'),
(45, 'GREE'),
(46, 'HAIER_AC'),
(47, 'HAIER_AC160'),
(48, 'HAIER_AC176'),
(49, 'HAIER_AC_YRW02'),
(50, 'HITACHI_AC'),
(51, 'HITACHI_AC1'),
(52, 'HITACHI_AC2'),
(53, 'HITACHI_AC264'),
(54, 'HITACHI_AC296'),
(55, 'HITACHI_AC3'),
(56, 'HITACHI_AC344'),
(57, 'HITACHI_AC424'),
(58, 'INAX'),
(59, 'JVC'),
(60, 'KELON'),
(61, 'KELON168'),
(62, 'KELVINATOR'),
(63, 'LASERTAG'),
(64, 'LEGOPF'),
(65, 'LG'),
(66, 'LG2'),
(67, 'LUTRON'),
(68, 'MAGIQUEST'),
(69, 'METZ'),
(70, 'MIDEA'),
(71, 'MIDEA24'),
(72, 'MILESTAG2'),
(73, 'MIRAGE'),
(74, 'MITSUBISHI'),
(75, 'MITSUBISHI112'),
(76, 'MITSUBISHI136'),
(77, 'MITSUBISHI2'),
(78, 'MITSUBISHI_AC'),
(79, 'MITSUBISHI_HEAVY_152'),
(80, 'MITSUBISHI_HEAVY_88'),
(81, 'MULTIBRACKETS'),
(82, 'MWM'),
(83, 'NEC'),
(84, 'NEC_LIKE'),
(85, 'NEOCLIMA'),
(86, 'NIKAI'),
(87, 'PANASONIC'),
(88, 'PANASONIC_AC'),
(89, 'PANASONIC_AC32'),
(90, 'PIONEER'),
(91, 'RC5'),
(92, 'RC5X'),
(93, 'RC6'),
(94, 'RCMM'),
(95, 'RHOSS'),
(96, 'SAMSUNG'),
(97, 'SAMSUNG36'),
(98, 'SAMSUNG_AC'),
(99, 'SANYO'),
(100, 'SANYO_AC'),
(101, 'SANYO_AC152'),
(102, 'SANYO_AC88'),
(103, 'SANYO_LC7461'),
(104, 'SHARP'),
(105, 'SHARP_AC'),
(106, 'SONY'),
(107, 'SYMPHONY'),
(108, 'TCL112AC'),
(109, 'TCL96AC'),
(110, 'TECHNIBEL_AC'),
(111, 'TECO'),
(112, 'TEKNOPOINT'),
(113, 'TOSHIBA_AC'),
(114, 'TOTO'),
(115, 'TRANSCOLD'),
(116, 'TROTEC'),
(117, 'TROTEC_3550'),
(118, 'TRUMA'),
(119, 'VESTEL_AC'),
(120, 'VOLTAS'),
(121, 'WHIRLPOOL_AC'),
(122, 'WHYNTER'),
(123, 'WOWWEE'),
(124, 'XMP'),
(125, 'YORK'),
(126, 'ZEPEAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senalesir`
--

CREATE TABLE `senalesir` (
  `codigo_hexadecimal` longtext NOT NULL,
  `ID_dispositivo` int(11) NOT NULL,
  `ID_funcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `senalesir`
--

INSERT INTO `senalesir` (`codigo_hexadecimal`, `ID_dispositivo`, `ID_funcion`) VALUES
('550,600,550,600,550,1700,550,1700,600,550,650,1600,550,600,550,600,550,550,550,600,550,1700,550,1750,600,500,600,1650,600,600,500,600,550,600,500,1750,550,1700,600,1650,600,1700,550,600,550,550,550,600,550,1700,550,600,550,550,650,500,600,550,550,1700,550,1750,500,1750,550', 51, 1),
('500,2050,500,1950,550,2000,500,2000,500,2000,500,2000,550,1950,550,1950,550,950,550,2000,450,1050,500,1000,500,1000,500,1000,500,1000,500,1000,500,1000,500,1000,550,950,550,950,550,1950,550,950,550,2000,500,2000,500', 52, 1);

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
(4, 'admin2', 'admin@gmail.com', '$2y$10$CgcuFSF8TKd3ZYQzfjYpVOsl3SxRLkUibE0U21EujF1TG9jIvO9e.', NULL, '2024-10-08 13:48:03', 1, NULL, 1),
(5, 'user1', 'user@gmail.com', '$2y$10$OcAVcgVE23oFVYJwzgBYs.2bLIqO2Kpbh1/BZz3/22Aej1/OgIWfi', NULL, '2024-08-30 17:29:43', 1, NULL, 1),
(8, 'catriel', 'abc@gmail.com', '$2y$10$5H.Zc44WYCZPP3cMZNMBfeC6Y2gOvxTUhQqGqfZm6ieSrUEDcKocu', NULL, '2024-11-20 15:24:45', 2, 4, 1),
(9, 'santiagosalgado3', 'santiagosalgado@alumnos.itr3.edu.a', '$2y$10$XlIpLb5HHd6kz2cAcoWpSOhdTSuinJWTN.F9iBRoUD3Ytc3i2tiO2', NULL, '2024-11-20 15:23:45', 1, NULL, 1),
(17, 'santiago3', 'santisalgado33@gmail.com', '$2y$10$TfSHnHF88EAezeFBGWLdGuBTOzDrpaFy/rB.TFAYNR6Eig7BP.pt.', NULL, '2024-10-07 13:00:30', 2, 4, 1),
(21, 'profesor3', 'santiagosalgado2007@gmail.co', '$2y$10$8h6uoxrzFbV6wyKgsaXuzu/.5n96zB1Qs.iOW4W83DGVCozN0Cy6G', NULL, '2024-11-21 00:17:19', 2, 9, 1),
(28, 'usuarioprueba', 'santiagosalgado@alumnos.itr3.edu.ar', '$2y$10$jA1wcs8vyAP6pjA3rFKaK.kg9nSUbQOFEN6aBUVNe2sHkIbjRU9k2', NULL, '2024-11-23 19:51:27', 2, 4, 1);

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
-- Indices de la tabla `protocolos`
--
ALTER TABLE `protocolos`
  ADD PRIMARY KEY (`ID_protocolo`);

--
-- Indices de la tabla `senalesir`
--
ALTER TABLE `senalesir`
  ADD PRIMARY KEY (`ID_dispositivo`,`ID_funcion`);

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
  MODIFY `ID_a_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  MODIFY `ID_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `disp_esp32`
--
ALTER TABLE `disp_esp32`
  MODIFY `ID_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `ID_funcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `login_attemps`
--
ALTER TABLE `login_attemps`
  MODIFY `ID_login_attemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `protocolos`
--
ALTER TABLE `protocolos`
  MODIFY `ID_protocolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `tipo_dispositivos`
--
ALTER TABLE `tipo_dispositivos`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `borrar_codigos_expirados` ON SCHEDULE EVERY 1 HOUR STARTS '2024-08-30 13:42:37' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM codigos_verificacion WHERE fecha_expiracion < CURRENT_TIMESTAMP()$$

CREATE DEFINER=`root`@`localhost` EVENT `actualizar_estado_disp` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-03-13 08:25:29' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE disp_esp32 
  SET estado = 0 
  WHERE ultima_conexion < NOW() - INTERVAL 1 MINUTE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
