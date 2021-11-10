-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-11-2021 a las 20:20:55
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17860668_esp8266`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESPtable2`
--

CREATE TABLE `ESPtable2` (
  `id` int(5) NOT NULL,
  `PASSWORD` int(5) NOT NULL,
  `TEXT_1` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ESPtable2`
--

INSERT INTO `ESPtable2` (`id`, `PASSWORD`, `TEXT_1`) VALUES
(99999, 12345, 'texto de prueba xd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `logged`) VALUES
(2, 'juanlesmes', '$2y$10$5NfrJYU9umP4N2hpcJ1i..K8/Ud0LKiavE550nHvrscZ0R2qn5x5C', 'logistikon@hotmail.com', 0),
(13, 'casimiro', '$2y$10$VuyJMTkSgdZ.hhY2vPCSmuaoPRJD/fLk6BbBIvApenFaprJQ2q1MW', 'casimiro@hotmail.com', 0),
(14, 'invitado', '$2y$10$WiYHLI9OAJDlpLThWsgfG.LazmObDyh.pZ9879YlKcGWLpY3pCp4K', 'invitado@hotmail.com', 0),
(15, 'guest', '$2y$10$a.Y33SawDeloRakrFmUFoOdPwAuDhuYsoRvxMYile/P8Qfs/0Y5CC', 'guest@hotmail.com', 0),
(16, 'william', '$2y$10$fPsDjwN1Ee2/Lwo48M364eU.SqOXaRvte6QZKqlUCt/ft.Y9JS2wq', 'william@hotmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ESPtable2`
--
ALTER TABLE `ESPtable2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ESPtable2`
--
ALTER TABLE `ESPtable2`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
