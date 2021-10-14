-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (

  `mail` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos`varchar(50) NOT NULL,
  `DNI` varchar(10),
  `sexo` varchar(50),
  `sexualidad` varchar(50),
  `edad` int,
  `gustos` varchar(50),
  `altura` float,
  `peso` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`mail`,`contrasena`, `nombre`, `apellidos`, `DNI`, `sexo`, `sexualidad`, `edad`, `gustos`, `altura`, `peso` ) VALUES
('micha@gmail.com', 'contrasena','Michael', 'Homar', '38285783Y', 'nb', 'sexualidad', 75, 'pelota', 1.75, 135),
('chris@gmail.com', 'contrasena','Christopher', 'Adolphus', '49933148X', 'n', 'sexualidad', 55, 'pelota', 1.75, 80),
('jess@hdo.com', 'contrasena','Jessica', 'Ammon', '13551093E', 'n', 'sexualidad', 26, 'pelota', 1.75, 56),
('mattorchard@gmail.es', 'contrasena','Matthew', 'Dawon', '61075806L', 'nb', 'sexualidad', 43, 'pelota', 1.75, 120);



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
