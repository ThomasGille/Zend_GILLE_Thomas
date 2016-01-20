
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `album` (`id`, `idUser`, `artist`, `title`) VALUES
(1, 2, 'The  Military  Wives', 'In  My  Dreams'),
(2, 1, 'Adele', '21'),
(3, 2, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 1, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 1, 'Gotye', 'Making  Mirrors');

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `pass_word` text NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `users` (`idUser`, `user_name`, `pass_word`) VALUES
(1, 'root', 'root');

CREATE TABLE IF NOT EXISTS `Livre` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Livre`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `Livre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `Critique` (
  `IdUser` int(11) NOT NULL,
  `IdLivre` int(11) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `Critique`
  ADD PRIMARY KEY (`IdUser`,`IdLivre`);
