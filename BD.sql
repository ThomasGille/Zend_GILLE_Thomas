DROP DATABASE IF EXISTS zf2tutorial;
CREATE DATABASE zf2tutorial;

GRANT ALL PRIVILEGES ON zf2tutorial.* To 'zendUser'@'%' IDENTIFIED BY 'lolilol';
USE zf2tutorial;
-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 22 Janvier 2016 à 22:17
-- Version du serveur :  5.6.27-0ubuntu1
-- Version de PHP :  5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zf2tutorial`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id`, `idUser`, `artist`, `title`) VALUES
(1, 2, 'The  Military  Wives', 'In  My  Dreams'),
(2, 1, 'Adele', '21'),
(3, 2, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 1, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 1, 'Gotye', 'Making  Mirrors'),
(6, 0, 'eg', 'feg');

-- --------------------------------------------------------

--
-- Structure de la table `critique`
--
CREATE TABLE IF NOT EXISTS `critique` (
  `idUser` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `auteur` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `title`, `auteur`) VALUES
(4, 'Jambon', 'Eddie Barraco');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `pass_word` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `user_name`, `pass_word`) VALUES
(1, 'root', 'root');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `critique`
--
ALTER TABLE `critique`
  ADD PRIMARY KEY (`idUser`,`idLivre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;