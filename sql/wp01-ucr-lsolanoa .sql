-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2021 a las 19:50:45
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wp01-ucr-lsolanoa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont`
--

CREATE TABLE `cont` (
  `id_cont` int(11) NOT NULL COMMENT 'id contact',
  `name_cont` text NOT NULL COMMENT 'user name',
  `email_cont` text NOT NULL COMMENT 'user e-mail',
  `date_cont` date NOT NULL COMMENT 'contact date',
  `desc_cont` text NOT NULL COMMENT 'contact desc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL COMMENT 'id file',
  `id_page` int(11) NOT NULL COMMENT 'id page',
  `file_name` text NOT NULL COMMENT 'file name',
  `type_file` text NOT NULL COMMENT 'file format'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='id post or page relation';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imp`
--

CREATE TABLE `imp` (
  `id_imp` int(11) NOT NULL,
  `icon_imp` text NOT NULL,
  `pos_imp` int(11) NOT NULL,
  `color_imp` text NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE `links` (
  `id_link` int(11) NOT NULL COMMENT 'id link',
  `title_link` text NOT NULL COMMENT 'link''s name',
  `url_link` text NOT NULL COMMENT 'URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nav`
--

CREATE TABLE `nav` (
  `id_nav` int(11) NOT NULL,
  `pos_nav` int(11) NOT NULL,
  `struc_nav` text NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL COMMENT 'Id pages',
  `title_page` tinytext NOT NULL COMMENT 'page titles',
  `desc_page` tinytext NOT NULL COMMENT 'page description',
  `cont_page` text NOT NULL COMMENT 'page content html format',
  `date_page` date NOT NULL COMMENT 'page date',
  `labels_page` text NOT NULL COMMENT 'page labels divided by comma',
  `type_page` int(11) NOT NULL COMMENT 'type of page | 1 = main page 2 = sub page',
  `img_page` text NOT NULL COMMENT 'page banner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='page description';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slide` int(11) NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(11) NOT NULL,
  `date_timeline` date NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cont`
--
ALTER TABLE `cont`
  ADD PRIMARY KEY (`id_cont`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `fkIdx_44` (`id_page`);

--
-- Indices de la tabla `imp`
--
ALTER TABLE `imp`
  ADD PRIMARY KEY (`id_imp`),
  ADD KEY `fkIdx_73` (`id_page`);

--
-- Indices de la tabla `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id_link`);

--
-- Indices de la tabla `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id_nav`),
  ADD KEY `fkIdx_56` (`id_page`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indices de la tabla `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slide`),
  ADD KEY `fkIdx_64` (`id_page`);

--
-- Indices de la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`),
  ADD KEY `fkIdx_80` (`id_page`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cont`
--
ALTER TABLE `cont`
  MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id contact';

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id file';

--
-- AUTO_INCREMENT de la tabla `imp`
--
ALTER TABLE `imp`
  MODIFY `id_imp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `links`
--
ALTER TABLE `links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id link';

--
-- AUTO_INCREMENT de la tabla `nav`
--
ALTER TABLE `nav`
  MODIFY `id_nav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id pages';

--
-- AUTO_INCREMENT de la tabla `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_43` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id_page`);

--
-- Filtros para la tabla `imp`
--
ALTER TABLE `imp`
  ADD CONSTRAINT `FK_72` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id_page`);

--
-- Filtros para la tabla `nav`
--
ALTER TABLE `nav`
  ADD CONSTRAINT `FK_55` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id_page`);

--
-- Filtros para la tabla `slideshow`
--
ALTER TABLE `slideshow`
  ADD CONSTRAINT `FK_63` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id_page`);

--
-- Filtros para la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `FK_79` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id_page`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
