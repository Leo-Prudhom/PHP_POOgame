-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Juin 2018 à 15:10
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `minifightgame`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `strength` int(11) NOT NULL,
  `health` int(11) NOT NULL
) ;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id`, `name`, `strength`, `health`) VALUES
(1, 'Terminator', 7, 861),
(9, 'Largo Winch', 12, 85),
(10, 'Rambo', 44, 1000),
(11, 'Rodriguez Killa-Z', 42, 1000),
(22, 'Charlou', 12, 1000),
(23, 'Bedou', 55, 160),
(24, 'Lydiouze', 88, 100),
(25, 'IGO', 3, 100);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
