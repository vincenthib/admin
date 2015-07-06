
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `user_from_id` int(11) NOT NULL,
  `user_to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NOW()
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Index pour la table `users`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

--
--
-- Contenu de la table `users`
--

--- INSERT INTO `users` (`id`, `fb_id`, `firstname`, `lastname`, `email`, `pass`, `status`, `register_date`, `newsletter`) VALUES
--- (2, 102063180139254, 'Draazen', 'Dev', 'draazen.dev@gmail.com', '', 0, '2015-07-03 14:32:02', 0),
--- (3, 0, 'John', 'Doe', 'john.doe@gmail.com', '$2y$10$llvvGl8X0dANXffNJ3Z3qutPySVVZ1AxUh5FBJHFiyfT9MJjXT2TS', 0, '2015-07-03 15:10:21', 1);

