-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 18, 2021 at 02:58 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `elementos`
--

CREATE TABLE `elementos` (
  `id` int(11) NOT NULL,
  `gustos` text NOT NULL,
  `edad` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `sexo` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elementos`
--

INSERT INTO `elementos` (`id`, `gustos`, `edad`, `altura`, `peso`, `sexo`, `mail`) VALUES
(1, 'Que le guste el gym, los gatos y el manga', 32, 168, 80, 'hombre2', 'MARCO@gmail.com'),
(2, 'Soy gamer, me gustan las chicas que juegan al LOL', 23, 175, 70, 'Mujer', 'MARCO@gmail.com'),
(3, 'Que le guste comer y dormir, soy simple', 45, 167, 55, 'Mujer', 'test1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seguidores`
--

CREATE TABLE `seguidores` (
  `followerMail` text NOT NULL,
  `followedMail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seguidores`
--

INSERT INTO `seguidores` (`followerMail`, `followedMail`) VALUES
('pepe', 'sadas'),
('iozono11@gmail.com', '$mail'),
('iozono11@gmail.com', 'jess@hdo.com'),
('iozono11@gmail.com', 'iozono11@gmail.com'),
('MARCO@gmail.com', 'MARCO@gmail.com'),
('MARCO@gmail.com', 'iozono11@gmail.com'),
('test1@gmail.com', 'mattorchard@gmail.es');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `mail` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `DNI` varchar(10) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `sexualidad` varchar(50) DEFAULT NULL,
  `fechaNac` varchar(50) DEFAULT NULL,
  `gustos` text DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`mail`, `contrasena`, `nombre`, `apellidos`, `DNI`, `sexo`, `telefono`, `sexualidad`, `fechaNac`, `gustos`, `altura`, `peso`) VALUES
('chris@gmail.com', 'contrasena', 'Pepe', 'Adolphus', '49933148X', 'Hombre', '666666666', 'homosexual', '11-11-2000', 'Las acrobacias', 190, 80),
('iozono11@gmail.com', '$2y$10$SbtZGQ.7bST9XdHqORJiwO4JBI1.T/NqCMlSfTBnuZoI2p4MmL43e', 'Martin', 'ozalla', '79245943-H', 'hombre', '111111111', 'hetero', '11-11-1111', 'Jugar al lol y comer mucho vegetal', 170, 60),
('jess@hdo.com', 'contrasena', 'Jessica', 'Ammon', '13551093E', 'n', '666666666', 'sexualidad', '11-11-2000', 'Anime', 167, 56),
('MARCO@gmail.com', '$2y$10$hKHZEUCL7HwAEj4jSq8Scewbp9Rundru1e6I4yayUM/EfzP5NENgS', 'MARCO', 'POLO', '79245943-H', 'hombre', '777777777', 'hetero', '11-11-1111', 'vender seda, ir de expedicion, jugar al lol.', 170, 60),
('mattorchard@gmail.es', 'contrasena', 'Matthew', 'Dawon', '61075806L', 'nb', '666666666', 'homosexual', '11-11-2000', 'Pasear', 180, 100),
('micha@gmail.com', 'contrasena', 'Michael', 'Homar', '38285783Y', 'nb', '666666666', 'bisexual', '11-11-2000', 'Ver peliculas', 155, 55),
('test1@gmail.com', '$2y$10$DFRI0DevEPSrA9W.TlIDt.Nk6hBdTfWnY7TQIoMa90/GZRFgen.IS', 'ntestt', 'atestt', '79245943-H', 'Mujer', '777777777', 'hetero?fsexualidad=hetero', '11-11-1111', 'Ir a raves de fiesta', 176, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
