-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2019 a las 12:57:47
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mychustergames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombreProd` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `puntos` int(10) NOT NULL DEFAULT '0',
  `descript` text COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(10) NOT NULL DEFAULT '0',
  `jugadores` int(10) NOT NULL DEFAULT '0',
  `link` text COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_votaciones` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombreProd`, `puntos`, `descript`, `edad`, `jugadores`, `link`, `empresa`, `num_votaciones`) VALUES
(0, 'carnival zombie', 8, '\r\nLos manuscritos antiguos hablan de un Leviatán, una enorme criatura que yace en el lecho de la laguna en la parte posterior de la cual la ciudad tiene sus cimientos. Todos los manuscritos coinciden en su sueño eterno y todos dicen que la bestia se despertará un día, sacudiendo la ciudad de sus raíces embarradas, rompiendo los pilotes vitrificados sobre los cuales se encuentra la ciudad, y estrellándola contra el mar hirviente donde el monstruo se levantará . ', 12, 4, 'https://www.google.com', 'Zombies SA', 7),
(1, 'TeotiHuacan City Of Gods', 5, '\r\nEn Teotihuacan: Ciudad de los Dioses, cada jugador controla una fuerza de dados de trabajadores, que crecen en fuerza con cada movimiento. En su turno, mueve a un trabajador alrededor de una tabla modular, siempre eligiendo una de las dos áreas del mosaico de ubicación en el que se encuentra: una que le ofrece una acción (y una mejora de trabajador), la otra que le proporciona una bonificación poderosa (pero sin una actualización).', 6, 4, 'https://www.tuenti.com', 'Tuenti SA', 6),
(2, 'root', 0, 'La infame Marquesa de Gato se ha apoderado del gran bosque, con la intención de cosechar sus riquezas. Bajo su gobierno, las muchas criaturas del bosque se han unido. Esta Alianza buscará fortalecer sus recursos y subvertir la regla de los Gatos. En este esfuerzo, la Alianza puede contar con la ayuda de los vagabundos errantes que pueden moverse a través de los caminos más peligrosos del bosque.', 5, 6, 'https://www.amazon.com/', 'Amazon SA', 0),
(3, 'lolita lola', 6, 'loaskjdlsajdls slkasjdlaskdjlask', 3, 5, 'https://www.a.com', 'MyChuster SA', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`nombreProd`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
