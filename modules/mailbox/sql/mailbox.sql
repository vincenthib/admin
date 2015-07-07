-- Client :  localhost:3306
-- Généré le :  Lun 06 Juillet 2015 à 17:26
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

CREATE TABLE `mailbox` (
`id` int(11) NOT NULL,
`checkbox` tinyint(4) NOT NULL DEFAULT '0',
`favoris` tinyint(4) NOT NULL DEFAULT '0',
`destinataire` text NOT NULL,
`objet` text NOT NULL,
`attachment` varchar(255) DEFAULT NULL,
`date` datetime NOT NULL,
`expediteur` text NOT NULL,
`message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mailbox`
--

INSERT INTO `mailbox` (`id`, `checkbox`, `favoris`, `destinataire`, `objet`, `attachment`, `date`, `expediteur`, `message`) VALUES
(1, 0, 0, 'tom@example.com', 'Test objet', NULL, '2015-07-03 15:47:29', 'linda@example.com', 'Test message'),
(2, 0, 0, 'destiny@example.com', 'Test destiny', '', '2015-07-03 16:28:10', '', 'Message destiny'),
(3, 0, 0, 'third@test.com', 'third object', '', '2015-07-03 17:03:58', '', 'third message'),
(4, 0, 0, 'fourth@example.com', 'fourth', '', '2015-07-03 17:05:20', '', 'fourth message'),
(5, 0, 0, 'fifth@example.com', 'fifth', 'attachments/570218.jpg', '2015-07-03 17:18:07', '', 'fifth test'),
(6, 0, 0, 'fifth@example.com', 'fifth', '570218.jpg', '2015-07-03 17:19:09', '', 'fifth test'),
(7, 0, 0, 'web@trois.fr', 'test mail', NULL, '0000-00-00 00:00:00', 'webforce3@gmail.com', 'Ceci est un test mail!!!');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
