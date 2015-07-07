-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Juillet 2015 à 11:40
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
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `expediteur` text NOT NULL,
  `message` text NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mailbox`
--

INSERT INTO `mailbox` (`id`, `checkbox`, `favoris`, `destinataire`, `objet`, `attachment`, `date`, `expediteur`, `message`, `draft`, `trash`, `sent`) VALUES
(1, 0, 0, 'tom@example.com', 'Test objet', NULL, '2015-07-03 15:47:29', 'linda@example.com', 'Test message', 0, 0, 0),
(2, 0, 0, 'destiny@example.com', 'Test destiny', '', '2015-07-03 16:28:10', '', 'Message destiny', 0, 0, 0),
(3, 0, 0, 'third@test.com', 'third object', '', '2015-07-03 17:03:58', '', 'third message', 0, 0, 0),
(4, 0, 0, 'fourth@example.com', 'fourth', '', '2015-07-03 17:05:20', '', 'fourth message', 0, 0, 0),
(5, 0, 0, 'fifth@example.com', 'fifth', 'attachments/570218.jpg', '2015-07-03 17:18:07', '', 'fifth test', 0, 0, 0),
(6, 0, 0, 'fifth@example.com', 'fifth', '570218.jpg', '2015-07-03 17:19:09', '', 'fifth test', 0, 0, 0),
(7, 0, 0, 'draft@example.com', 'draft try', '', '2015-07-06 12:52:18', '', 'draft try', 0, 0, 0),
(8, 0, 0, 'test@test.com', 'Test', '', '2015-07-06 13:03:51', '', 'test', 0, 0, 0),
(9, 0, 0, 'test@test.com', 'test 3', '', '2015-07-06 13:11:02', '', 'teqst 3', 1, 0, 0),
(10, 0, 0, 'test@test.com', 'aaaaah', '', '2015-07-06 15:14:01', '', 'yyyyuuuuu', 0, 0, 0),
(11, 0, 0, 'sixth@test.com', 'sixth', '', '2015-07-06 15:24:26', '', 'sixth', 0, 0, 0),
(12, 0, 0, 'sixth@test.com', 'sixth', '', '2015-07-06 15:25:03', '', 'seventh', 0, 0, 0),
(13, 0, 0, 'test@test.com', 'aaaaah', '', '2015-07-06 15:31:48', '', 'esyhrshqwshyrqshs', 0, 0, 0),
(14, 0, 0, 'test@test.com', 'oiuytrezjhgfd', '', '2015-07-06 15:33:36', '', 'kjhgdsaq', 0, 0, 0),
(15, 0, 0, 'test@test.com', 'kiresdloiyhtgf', '', '2015-07-06 15:36:04', '', 'fvsgkjboqib,ngionboi', 0, 0, 0),
(16, 0, 0, 'deedee@test.com', 'deedee test', '', '2015-07-06 15:58:34', '', 'deedee', 0, 0, 0),
(17, 0, 0, 'deedee@test.com', 'deedee test', '', '2015-07-06 15:58:56', '', 'deee', 0, 0, 0),
(18, 0, 0, 'deedee@test.com', 'deedee test', '', '2015-07-06 15:59:17', '', 'deee', 0, 0, 0),
(19, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:00:00', '', 'dexter', 0, 0, 0),
(20, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:00:51', '', 'dexter', 0, 0, 0),
(21, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:30:50', '', 'descdshdejnrsj', 0, 0, 0),
(22, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:31:41', '', 'descdshdejnrsj', 0, 0, 0),
(23, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:32:06', '', 'descdshdejnrsj', 0, 0, 0),
(24, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:32:19', '', 'descdshdejnrsj', 0, 0, 0),
(25, 0, 0, 'dexter@test.com', 'dexter', '', '2015-07-06 16:33:03', '', 'descdshdejnrsj', 0, 0, 0),
(26, 0, 0, 'destiny@example.com', 'dshdj', '', '2015-07-06 16:34:02', '', 'kkjuttjjhf', 0, 0, 0),
(27, 0, 0, 'destiny@example.com', 'qgedjhsj', '', '2015-07-06 16:38:49', '', 'srjrki(eik(', 0, 0, 0),
(28, 0, 0, 'fifth@example.com', 'sxhjuxsjsrtju', '', '2015-07-06 16:44:57', '', 'jsusxrtkjisrkitsi', 0, 0, 0),
(29, 0, 0, 'pqop@pgnr.com', 'ppvnidnv', '', '2015-07-06 16:50:04', '', 'psvQnkvoiq', 0, 0, 0),
(30, 0, 0, 'pop@pop.pop', 'pop', '', '2015-07-06 16:54:54', '', 'popopopop', 0, 0, 0),
(31, 0, 0, 'pop@pop.pop', 'pop', '', '2015-07-06 17:00:03', '', 'qedhyqehujrju', 1, 0, 0),
(32, 0, 0, 'less@less.com', 'less', '', '2015-07-06 17:00:40', '', 'less', 1, 0, 0),
(33, 0, 0, 'more@more.more', 'more', '', '2015-07-06 17:01:31', '', 'moaêgkbo,hnerai', 0, 0, 0),
(34, 0, 0, 'check@check.com', 'check', '', '2015-07-06 17:02:09', '', 'cgeckcnfoakenge', 1, 0, 0),
(35, 0, 0, 'aaaaaaahhzhhdhdfoff@fksn.fr', 'ksfoqigneoi', '', '2015-07-06 17:03:47', '', 'aaahho^fnoqegue', 1, 0, 0),
(36, 0, 0, 'piedad@folk.com', 'foaneignid', '', '2015-07-06 17:08:31', '', 'piedad', 1, 0, 0),
(37, 0, 0, 'piedad@folk.com', 'dzfkqengfokqedn', '', '2015-07-06 17:09:41', '', 'dqknpnegfoie', 0, 0, 0),
(38, 0, 0, 'lpo@pklpo.com', 'cdlco,', '', '2015-07-06 17:17:37', '', 'pulpo', 0, 0, 0),
(39, 0, 0, 'lpo@pklpo.com', 'dtjtjt', '', '2015-07-06 17:21:56', '', 'tjtejtej', 0, 0, 0),
(40, 0, 0, 'gr@grr.fr', 'grr', '', '2015-07-06 17:23:14', '', 'poze,fgnkie', 1, 0, 0),
(41, 0, 0, 'less@less.com', 'ul', '', '2015-07-06 17:25:31', '', 'ryyhr', 0, 0, 0),
(42, 0, 0, 'ssssss@fknfk.fr', 'qsf,eofi,', '', '2015-07-06 17:29:53', '', 'qshbdnujiszfi', 0, 0, 0),
(43, 0, 0, 'test@test.com', 'test draft 1', '', '2015-07-07 10:03:53', '', 'test draft 1', 0, 0, 0),
(44, 0, 0, 'test@test.com', 'test draft 1', '', '2015-07-07 10:04:00', '', 'test draft 1', 0, 0, 0),
(45, 0, 0, 'test@test.com', 'test draft 2 ', '', '2015-07-07 10:14:33', '', 'test draft 2&nbsp;', 1, 0, 0),
(46, 0, 0, 'test@test.com', 'test draft 3', '', '2015-07-07 10:22:31', '', 'test draft 3', 0, 1, 0);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
