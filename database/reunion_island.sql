-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 19 Mai 2016 à 11:34
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1-log
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `reunion_island`
--
CREATE DATABASE IF NOT EXISTS `reunion_island` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reunion_island`;

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--

DROP TABLE IF EXISTS `hiking`;
CREATE TABLE IF NOT EXISTS `hiking` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `difficulty` enum('très facile','facile','moyen','difficile','très difficile') NOT NULL,
  `distance` int(11) NOT NULL COMMENT 'in km',
  `duration` time NOT NULL,
  `height_difference` int(6) NOT NULL COMMENT 'in m',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `hiking` (`name`,`difficulty`, `distance`, `duration`, `height_difference`)
VALUES ('Le sommet du Piton Béthoune par le tour du Bonnet de Prêtre','Très difficile', '5.7km', '4h', '650m'),('De la Mare à Joncs à Cilaos par le Kerveguen et le Gîte de la Caverne Dufour','Difficile', '19km', '8h', '1450m'),('Le Sentier des Sources entre Cilaos et Bras Sec','Facile', '5.9km', '1h15h', '300m'),('Le Dimitile depuis Bras Sec par le Kerveguen','Difficile', '24.5km', '10h', '1550'),('De Bras Sec au Bras de Cilaos par Palmiste Rouge','Moyen', '16.5km', '5h30', '1000m');