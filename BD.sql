
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

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `critique` (
  `idUser` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `critique`
  ADD PRIMARY KEY (`idUser`,`idLivre`);
