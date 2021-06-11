-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 22 Février 2015 à 14:49
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `reservrestau`
--
CREATE DATABASE IF NOT EXISTS `reservrestau` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservrestau`;

-- --------------------------------------------------------

--
-- Structure de la table `abonnee`
--

CREATE TABLE IF NOT EXISTS `abonnee` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `pass` text NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `abonnee`
--

INSERT INTO `abonnee` (`numero`, `pass`) VALUES
(3, '3'),
(20, '20');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `psudo` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`psudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`psudo`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `coutheur` float NOT NULL,
  `nbplace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`coutheur`, `nbplace`) VALUES
(10, 20);

-- --------------------------------------------------------

--
-- Structure de la table `evennement`
--

CREATE TABLE IF NOT EXISTS `evennement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `datedeb` date NOT NULL,
  `datefin` date NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `evennement`
--

INSERT INTO `evennement` (`id`, `titre`, `contenu`, `datedeb`, `datefin`, `photo`) VALUES
(1, 'Meat with Onions and Tomatos', 'Lacus ac orci tortor vel vel odio vitae tincidunt eu. Vel id senectus nec gravida nunc praesent lacus adipiscing donec morbi vitae commodo et id suscipit vel donec. Vivamus amet et faucibus laoreet ac rutrum ut libero nulla purus. Sem nec consectetuer leo mi. Id augue ac nunc bibendum vestibulum orci posuere ac ut praesent. Sagittis dolor et nunc diam rutrum ultricies. Vehicula tincidunt fusce pellentesque tortor mauris sed phasellus erat. Velit lobortis in sed maecenas ac hac felis nec dictum.', '2015-01-01', '2015-01-15', 'food01-2-2.jpg'),
(2, 'Shrimps with Tomatos and Avocados', 'Et augue praesent ipsum lacus vitae. At phasellus id varius. Curabitur fusce eu pellentesque in nibh nunc blandit nisl porta ante donec. Consectetuer fusce gravida lacus felis pharetra ante aenean. Cursus aliquam vivamus ligula id. Nisi auctor vivamus ut eleifend. Sit phasellus et eu ut. Posuere donec amet amet dignissim feugiat. Tincidunt metus curae. Vitae mauris egestas nunc nec ut pellentesque. Aenean vestibulum phasellus nec massa.', '2015-01-02', '2015-01-12', 'food02-2.jpg'),
(3, 'rtfgyhj', 'zeryuh', '2016-02-02', '2017-04-03', 'metal-gear-rising-revenge-50ad08e38b4dc.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `galerie`
--

INSERT INTO `galerie` (`id`, `photo`) VALUES
(1, '12small.jpg'),
(2, 'shutterstock_22818964.jpg'),
(4, 'c-davidniblack-music.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `titre`, `contenu`, `description`, `prix`, `photo`) VALUES
(1, 'Meat with Onions and Tomatos', 'Lacus ac orci tortor vel vel odio vitae tincidunt eu. Vel id senectus nec gravida nunc praesent lacus adipiscing donec morbi vitae commodo et id suscipit vel donec. Vivamus amet et faucibus laoreet ac rutrum ut libero nulla purus. Sem nec consectetuer leo mi. Id augue ac nunc bibendum vestibulum orci posuere ac ut praesent. Sagittis dolor et nunc diam rutrum ultricies. Vehicula tincidunt fusce pellentesque tortor mauris sed phasellus erat. Velit lobortis in sed maecenas ac hac felis nec dictum.', 'Ultricies integer eget ac.', 16.95, 'food01-2.jpg'),
(2, 'Shrimps with Tomatos and Avocados', 'Et augue praesent ipsum lacus vitae. At phasellus id varius. Curabitur fusce eu pellentesque in nibh nunc blandit nisl porta ante donec. Consectetuer fusce gravida lacus felis pharetra ante aenean. Cursus aliquam vivamus ligula id. Nisi auctor vivamus ut eleifend. Sit phasellus et eu ut. Posuere donec amet amet dignissim feugiat. Tincidunt metus curae.  Vitae mauris egestas nunc nec ut pellentesque. Aenean vestibulum phasellus nec massa.', 'Leo non mollis sapien dolor eget.', 17.95, 'food02.jpg'),
(5, 'Oysters with Onions and Tomatos', 'Eget proin justo consectetuer et sit fusce velit lobortis dui. Ipsum aliquet tortor volutpat ultricies tortor. Accumsan quisque consequat ut pellentesque at. Tellus quis lacus amet id rutrum. Sed libero suspendisse id venenatis quisque consectetuer odio aliquam. Ullamcorper mi sed felis nulla quis porta. Lacus morbi ut mauris donec volutpat metus. Placerat neque cursus suspendisse vestibulum ut et. Ante sed amet urna aenean. Convallis fames non orci non urna.', 'fvjv', 21.95, 'food06.jpg'),
(6, 'Salad with Olives and Tomatos', 'Ante consectetuer adipiscing id nec orci nisi. Vestibulum quis vulputate orci mollis. Felis pharetra volutpat ipsum mollis posuere aliquam interdum. Suspendisse arcu sed sed varius arcu sit ipsum. Ac iaculis sed dapibus consequat ultricies ut. Posuere amet dolor tortor sit dolor. Nonummy egestas dui suspendisse etiam convallis id erat at vestibulum. Nibh leo quisque in a neque per arcu ante. Enim molestie nec urna purus quisque ante. Suscipit vitae nec convallis sed orci urna quis ut.', 'fgcjgchcf', 16.95, 'food04.jpg'),
(7, 'Salad with Tomatos', 'Phasellus et eget augue mauris sed tempor semper nec. Neque sem quisque lobortis consectetuer lacus erat eget nec in libero pellentesque nam pretium rutrum tellus. Cras et turpis quam eu blandit auctor luctus curabitur viverra in. Tincidunt ante volutpat sed. Sagittis litora lacus imperdiet cursus sagittis ac nec lacus eros. Non aliquet sit ut augue ipsum ut rutrum nam. Purus justo montes sed faucibus aliquam et odio habitasse nam blandit ut. Nulla in metus sit tortor etiam enim ligula suscipit.', 'kgfkuf', 12.95, 'food08.jpg'),
(8, 'Vanila Ice-Cream and Pancakes', 'Scelerisque ut nisl nisi sit praesent rutrum. Ante hendrerit sodales pellentesque. Pretium augue tempus non erat rhoncus purus ipsum nisi varius. Quam vitae nisi purus leo vestibulum posuere. Dapibus nunc quis nullam sem litora placerat. Aenean cum nunc ipsum sed tincidunt. Ligula ac egestas sociis proin quam malesuada ac metus egestas congue. Ipsum purus lorem consequat eget ultrices. Faucibus nunc non felis ante posuere donec. Proin phasellus ac sed praesent nunc mi aliquam mi.', 'hgcfk', 13.95, 'food01d.jpg'),
(9, 'Cheesecake and Berries', 'Curabitur volutpat iaculis interdum. Morbi mollis volutpat. Pretium pulvinar mollis fermentum vitae sed sociosqu rhoncus nisl et neque. Nisl ante elit a ante quis aliquam neque mi enim ac aliquet. Ultricies consectetuer ut quis. Mollis sed nisl quam cras magna. Mollis semper urna et. Nisi libero posuere fusce dis eu fusce ac. Nulla quisque justo in. Phasellus nunc sed lacus ligula phasellus hac. Turpis hendrerit laoreet volutpat nec.', 'gfckhgc', 21.95, 'food04d.jpg'),
(10, 'azert', 'azerf', 'azedfr', 102, 'metal-gear-rising-revenge-50ad08e38b4dc.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numabonnee` int(11) NOT NULL,
  `datearr` datetime NOT NULL,
  `nbrheur` int(11) NOT NULL,
  `nbrplace` int(11) NOT NULL,
  `menu` text NOT NULL,
  `facture` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `numabonnee`, `datearr`, `nbrheur`, `nbrplace`, `menu`, `facture`) VALUES
(1, 3, '2016-01-02 01:00:00', 2, 2, 'Cheesecake and Berries,21.95 : 2', 0),
(2, 3, '2016-01-02 01:00:00', 2, 2, 'Cheesecake and Berries,21.95 : 2', 0),
(3, 3, '2015-01-03 01:00:00', 2, 2, 'Shrimps with Tomatos and Avocados,17.95 : 8;Cheesecake and Berries,21.95 : 5', 0),
(4, 3, '2018-03-02 16:05:00', 3, 5, 'Oysters with Onions and Tomatos,21.95 : 20;Salad with Tomatos,12.95 : 5', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
