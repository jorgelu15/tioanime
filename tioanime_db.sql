-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 05:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tioanime_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animes`
--

CREATE TABLE `animes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `portada` varchar(200) NOT NULL,
  `miniatura` varchar(200) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `ESTADO` text DEFAULT NULL,
  `TIPO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `titulo`, `portada`, `miniatura`, `sinopsis`, `ESTADO`, `TIPO`) VALUES
(46, 'Made in Abyss', 'https://tioanime.com/uploads/portadas/3397.jpg', 'https://tioanime.com/uploads/thumbs/3411.jpg', 'El Abismo… un abismo abierto que se extiende hasta las profundidades de la tierra, lleno de misteriosas criaturas y reliquias de un tiempo pasado. ¿Cómo se formó? ¿Qué hay en el fondo? Incontables individuos llenos de valor, conocidos como “Excavadores”, han intentado resolver los misterios del Abismo descendiendo sin miedo a la oscuridad. Los mejores y más valientes de los Excavadores, los Silbatos Blancos, son aclamados como leyendas por aquellos que prefieren permanecer en la superfici\r\n\r\n', 'FINALIZADO', 'SERIE'),
(47, 'Ore wo Suki nano wa Omae dake ka yo: Oretachi no Game Set\r\n', 'https://tioanime.com/uploads/portadas/3369.jpg', '', '', 'EN EMISION', 'OVA');

-- --------------------------------------------------------

--
-- Table structure for table `capitulos`
--

CREATE TABLE `capitulos` (
  `id_capitulo` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `miniatura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capitulos`
--

INSERT INTO `capitulos` (`id_capitulo`, `titulo`, `miniatura`) VALUES
(3, 'Fukaki Tamashii no Reimei 1', 'https://tioanime.com/uploads/thumbs/3411.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Accion'),
(2, 'Seinen'),
(3, 'Artes marciales'),
(4, 'Josei'),
(5, 'Shonen'),
(6, 'Aventura');

-- --------------------------------------------------------

--
-- Table structure for table `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_anime` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_anime`, `id_categoria`) VALUES
(75, 46, 1),
(76, 46, 3);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `generos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id_genero`, `generos`) VALUES
(1, 'COMEDIA'),
(2, 'ACCION'),
(3, 'AVENTURA'),
(4, 'ARTES MARCIALES'),
(5, 'CARRERAS'),
(6, 'CIENCIA FICCION'),
(7, 'DEMENCIA');

-- --------------------------------------------------------

--
-- Table structure for table `generos_series`
--

CREATE TABLE `generos_series` (
  `id` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `id_genero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generos_series`
--

INSERT INTO `generos_series` (`id`, `id_serie`, `id_genero`) VALUES
(1, 46, 'COMEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `opciones`
--

CREATE TABLE `opciones` (
  `id_opciones` int(11) NOT NULL,
  `embed` varchar(300) NOT NULL,
  `id_capitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opciones`
--

INSERT INTO `opciones` (`id_opciones`, `embed`, `id_capitulo`) VALUES
(5, 'https://mega.nz/embed/DGY23DqD#ZmR86t92GA64D3jP4zOAy_udhZyKYdGxnSfmEQdpSKc', 3),
(6, 'https://mega.nz/embed/DGY23DqD#ZmR86t92GA64D3jP4zOAy_udhZyKYdGxnSfmEQdpSKc', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`) VALUES
(5, 'El yorWTF', 'elyorwtf@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id_capitulo`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_anime` (`id_anime`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `generos_series`
--
ALTER TABLE `generos_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opciones`),
  ADD KEY `id_capitulo` (`id_capitulo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `generos_series`
--
ALTER TABLE `generos_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_anime`) REFERENCES `animes` (`id`),
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Constraints for table `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`id_capitulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
