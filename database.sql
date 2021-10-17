-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 17, 2021 at 11:58 AM
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
('iozono11@gmail.com', 'iozono11@gmail.com');

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
  `altura` float DEFAULT NULL,
  `peso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`mail`, `contrasena`, `nombre`, `apellidos`, `DNI`, `sexo`, `telefono`, `sexualidad`, `fechaNac`, `gustos`, `altura`, `peso`) VALUES
('chris@gmail.com', 'contrasena', 'pene', 'Adolphus', '49933148X', '666666666', 'n', 'sexualidad', '11-11-2000', 'pelota', 1.75, 80),
('iozono11@gmail.com', '$2y$10$SbtZGQ.7bST9XdHqORJiwO4JBI1.T/NqCMlSfTBnuZoI2p4MmL43e', 'iniogjaj', 'ozalla', '79245943-H', 'hombre', '123456789', 'hetero', '11-11-1111', 'Jugar al lol', NULL, NULL),
('jess@hdo.com', 'contrasena', 'Jessica', 'Ammon', '13551093E', 'n', '666666666', 'sexualidad', '11-11-2000', 'pelota', 1.75, 56),
('mattorchard@gmail.es', 'contrasena', 'Matthew', 'Dawon', '61075806L', 'nb', '666666666', 'sexualidad', '11-11-2000', 'pelota', 1.75, 120),
('micha@gmail.com', 'contrasena', 'Michael', 'Homar', '38285783Y', 'nb', '666666666', 'sexualidad', '11-11-2000', 'pelota', 1.75, 135);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
