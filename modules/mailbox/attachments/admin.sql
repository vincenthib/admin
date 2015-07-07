-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juillet 2015 à 17:22
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
  `attachment` varchar(255) DEFAULT NULL,
  `received` datetime NOT NULL,
  `expediteur` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mailbox`
--

INSERT INTO `mailbox` (`id`, `checkbox`, `favoris`, `destinataire`, `objet`, `attachment`, `received`, `expediteur`, `message`) VALUES
(1, 0, 0, 'tom@example.com', 'Test objet', NULL, '2015-07-03 15:47:29', 'linda@example.com', 'Test message'),
(2, 0, 0, 'destiny@example.com', 'Test destiny', '', '2015-07-03 16:28:10', '', 'Message destiny'),
(3, 0, 0, 'third@test.com', 'third object', '', '2015-07-03 17:03:58', '', 'third message'),
(4, 0, 0, 'fourth@example.com', 'fourth', '', '2015-07-03 17:05:20', '', 'fourth message'),
(5, 0, 0, 'fifth@example.com', 'fifth', 'attachments/570218.jpg', '2015-07-03 17:18:07', '', 'fifth test'),
(6, 0, 0, 'fifth@example.com', 'fifth', '570218.jpg', '2015-07-03 17:19:09', '', 'fifth test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fb_id` bigint(20) DEFAULT '0',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` char(60) NOT NULL,
  `status` int(1) DEFAULT '0',
  `register_date` datetime NOT NULL,
  `newsletter` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `firstname`, `lastname`, `email`, `pass`, `status`, `register_date`, `newsletter`) VALUES
(1, 0, 'Snow', 'John', 'john.snow@winterfell.com', 'azerty', 0, '2015-06-26 11:13:32', 0),
(2, 0, 'Nieve', 'Juan', 'juan.nieve@invierno.com', 'frio123', 0, '2015-06-26 12:05:56', 1),
(3, 0, 'Salt', 'Linda', 'linda.salt@example.com', '$2y$10$wZgbkeeBcL18LwG98M5XgO7VYYrV1w7kMCgR/xE4T83Z6rcb6ADRe', 0, '2015-06-26 12:42:15', 0),
(4, 0, 'Smith', 'Dana', 'dana.smith@example.com', '$2y$10$PFutkevLt/xf0rQcLGBndeUAENt0nnbSon.akXFivEZdUP9s/GGNO', 0, '2015-06-26 12:45:18', 1),
(5, 0, 'Brown', 'Lucy', 'lucy.brown@example.com', '$2y$10$wCV6k6MJrrxVkO/sYKYmy.jK7bW/JBNYTUDP0ODzvdxv.C0sKTBqi', 0, '2015-06-26 14:48:15', 0),
(6, 0, 'Panini', 'Mario', 'mario.panini@example.com', '$2y$10$Fj6jhuqUYiNVtmrY99gTU.8mQY7JpSXv2jT9IBU6espJwNtAtfvl6', 0, '2015-06-26 15:36:13', 0),
(7, 10155778168000331, 'Aly', 'Rodríguez', 'aly.heart@ymail.com', '', 0, '2015-06-29 13:15:56', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mailbox`
--
ALTER TABLE `mailbox`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mailbox`
--
ALTER TABLE `mailbox`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
