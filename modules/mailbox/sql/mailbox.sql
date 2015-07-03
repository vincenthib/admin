-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juillet 2015 à 15:15
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

CREATE TABLE IF NOT EXISTS `mailbox` (
`id` int(11) NOT NULL,
  `checkbox` tinyint(4) NOT NULL DEFAULT '0',
  `favoris` tinyint(4) NOT NULL DEFAULT '0',
  `destinataire` text NOT NULL,
  `objet` text NOT NULL,
  `piece-jointe` blob,
  `received` datetime DEFAULT CURRENT_TIMESTAMP,
  `expediteur` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mailbox`
--
ALTER TABLE `mailbox`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mailbox`
--
ALTER TABLE `mailbox`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
