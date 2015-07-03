-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- GÃ©nÃ©rÃ© le :  Ven 03 Juillet 2015 Ã  16:04
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donnÃ©es :  `admin`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `firstname`, `lastname`, `email`, `pass`, `status`, `register_date`, `newsletter`) VALUES
(2, 102063180139254, 'Draazen', 'Dev', 'draazen.dev@gmail.com', '', 0, '2015-07-03 14:32:02', 0),
(3, 0, 'John', 'Doe', 'john.doe@gmail.com', '$2y$10$llvvGl8X0dANXffNJ3Z3qutPySVVZ1AxUh5FBJHFiyfT9MJjXT2TS', 0, '2015-07-03 15:10:21', 1);

--
-- Index pour les tables exportÃ©es
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportÃ©es
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;