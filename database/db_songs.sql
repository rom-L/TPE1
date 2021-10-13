-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2021 a las 01:22:57
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_songs`
--
CREATE DATABASE IF NOT EXISTS `db_songs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_songs`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `band`
--

CREATE TABLE `band` (
  `id` int(11) NOT NULL,
  `band_name` varchar(100) NOT NULL,
  `band_members` varchar(150) NOT NULL,
  `albums_released` int(11) NOT NULL,
  `debut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `band`
--

INSERT INTO `band` (`id`, `band_name`, `band_members`, `albums_released`, `debut`) VALUES
(1, 'Coldplay', 'Chris Martin, Guy Berryman, Jon Buckland, Will Champion, Phil Harvey', 9, 1996),
(2, 'Arctic Monkeys', 'Alex Turner, Matt Helders, Jamie Cook, Nick O\' Malley', 6, 2003),
(3, 'Oasis', 'Noel Gallagher, Liam Gallagher, Paul McGuigan, Tony McCarroll, Paul Arthurs', 7, 1991),
(4, 'Cage the Elephant', 'Matt Shultz, Brad Shultz, Jared Champion, Lincoln Parish, Daniel Tichenor', 6, 2006);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `song_name` varchar(100) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `song_length` varchar(30) NOT NULL,
  `song_release_date` int(11) NOT NULL,
  `id_band_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `song`
--

INSERT INTO `song` (`id`, `song_name`, `album_name`, `song_length`, `song_release_date`, `id_band_fk`) VALUES
(16, 'Yellow', 'Parachutes', '4:29', 2000, 1),
(17, 'The Scientist', 'A Rush of Blood to the Head', '5:09', 2002, 1),
(18, 'Clocks', 'A Rush of Blood to the Head', '5:07', 2002, 1),
(19, 'Viva la Vida', 'Viva la Vida or Death and All His Friends', '4:01', 2008, 1),
(20, 'Don\'t Look Back in Anger', '(What\'s the Story) Morning Glory?', '4:47', 1995, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$Akflya4wkOaRVkwJhOjGDumONAnbA9RheBSnU3jN8zyYUwDFgInlK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_band_fk` (`id_band_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`id_band_fk`) REFERENCES `band` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
