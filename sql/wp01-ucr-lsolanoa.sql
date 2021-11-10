-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 18:01:42
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

--
-- Volcado de datos para la tabla `imp`
--

INSERT INTO `imp` (`id_imp`, `icon_imp`, `pos_imp`, `color_imp`, `id_page`) VALUES
(4, 'fa-file', 1, '#fdae53', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE `links` (
  `id_link` int(11) NOT NULL COMMENT 'id link',
  `title_link` text NOT NULL COMMENT 'link''s name',
  `url_link` text NOT NULL COMMENT 'URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id_link`, `title_link`, `url_link`) VALUES
(3, 'Universidad de Costa Rica', 'www.ucr.ac.cr');

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

--
-- Volcado de datos para la tabla `nav`
--

INSERT INTO `nav` (`id_nav`, `pos_nav`, `struc_nav`, `id_page`) VALUES
(1, 0, 'NULL', 7);

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

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id_page`, `title_page`, `desc_page`, `cont_page`, `date_page`, `labels_page`, `type_page`, `img_page`) VALUES
(7, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit aliquam nibh et tincidunt. Aenean sodales porta convallis. Cras sit amet odio sed turpis ullamcorper vestibulum. Vivamus tincidunt ipsum lorem, eu vehicula felis mattis non. Aenean imperdiet nisi sit amet diam varius, eu posuere elit vehicula. Duis varius ante in urna eleifend, non pretium odio pulvinar. Praesent odio sem, venenatis sit amet sem in, tincidunt facilisis odio.&lt;/p&gt;&lt;h2 style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Pellentesque blandit aliquam nibh et tincidunt.&lt;/h2&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Mauris fringilla, orci nec auctor ultricies, felis eros blandit orci, ac rutrum urna nisi ut lacus. Nam faucibus odio in varius tristique. Sed laoreet libero purus, a pretium ipsum vulputate non. Donec lectus ligula, sollicitudin nec aliquam vitae, viverra in odio. Praesent ac elit a eros blandit eleifend. Quisque et elementum est. Donec porttitor vel orci quis tincidunt. Sed posuere, orci vel vestibulum elementum, elit nunc tempor urna, et ultrices augue magna vel nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut luctus in turpis a efficitur. Nunc a lectus faucibus, dignissim leo sit amet, semper arcu.&lt;/p&gt;&lt;blockquote style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot; class=&quot;blockquote&quot;&gt;Sed vulputate elit sit amet pharetra vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet lacus at dui sodales, et auctor felis feugiat. Vivamus id velit tincidunt, euismod tortor ut, elementum eros. Phasellus finibus ac enim sit amet facilisis.&lt;/blockquote&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Cras iaculis lobortis ligula, sed tempus lorem feugiat a. Praesent sed ullamcorper nunc. Nullam tincidunt lacus et nunc convallis, eu ultrices nibh placerat. Mauris elementum urna eget tellus posuere tincidunt. Suspendisse a elit dictum enim fringilla commodo in id massa. Praesent sem massa, pretium at mauris vitae, porta auctor enim. Aliquam fermentum ultricies dictum. Phasellus tortor ex, tincidunt vitae mauris ac, rutrum porttitor sem. Sed vulputate elit sit amet pharetra vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet lacus at dui sodales, et auctor felis feugiat. Vivamus id velit tincidunt, euismod tortor ut, elementum eros. Phasellus finibus ac enim sit amet facilisis.&lt;br&gt;&lt;/p&gt;', '2021-11-10', 'test;', 2, 'none_banner.jpg'),
(8, 'Fusce ac sagittis dui.', 'Aenean aliquet lorem nibh, a pellentesque nulla scelerisque et.', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Aenean aliquet lorem nibh, a pellentesque nulla scelerisque et. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam sollicitudin consectetur leo id commodo. Nulla facilisi. Aenean quis augue in risus mattis dapibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec nec porta velit. Proin odio nunc, tempus sed purus vel, tincidunt faucibus neque. Quisque consequat dui quis sem ultrices vulputate. Nunc sed finibus enim, id laoreet ipsum. Proin tempor et ipsum quis bibendum. Maecenas ante turpis, porta nec consequat vel, auctor at sapien. Donec at lorem sagittis, vehicula quam in, congue lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec lobortis diam posuere tortor faucibus commodo. Curabitur sed interdum sapien.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; &quot;&gt;&lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/LXb3EKWsInQ?start=22&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/iframe&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;h3 style=&quot;text-align: center; &quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Cras iaculis lobortis ligula, sed tempus lorem feugiat a. Praesent sed ullamcorper nunc. Nullam tincidunt lacus et nunc convallis, eu ultrices nibh placerat.&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;', '2021-11-10', 'test;', 1, 'none_banner.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slide` int(11) NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slideshow`
--

INSERT INTO `slideshow` (`id_slide`, `id_page`) VALUES
(7, 7);

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
-- Volcado de datos para la tabla `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `date_timeline`, `id_page`) VALUES
(1, '2021-10-10', 7);

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
  MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id contact', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id file';

--
-- AUTO_INCREMENT de la tabla `imp`
--
ALTER TABLE `imp`
  MODIFY `id_imp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `links`
--
ALTER TABLE `links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id link', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nav`
--
ALTER TABLE `nav`
  MODIFY `id_nav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id pages', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
