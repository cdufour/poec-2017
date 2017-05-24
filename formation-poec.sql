-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Mai 2017 à 15:34
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation-poec`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entraineur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `couleurs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `entraineur`, `couleurs`, `logo`) VALUES
(1, 'Juventus', 'Massimiliano Allegri', 'noir, blanc', ''),
(2, 'Strasbourg', 'Jean-Pierre Papin', 'bleu, blanc', ''),
(3, 'PSG', 'Laurent Blanc', 'rouge, bleu', ''),
(4, 'ASNL', 'Correa', 'blanc, rouge', ''),
(5, 'Benfica', 'Rui Costa', 'Vert, rouge', 'img/logo/Benfica.jpg'),
(6, 'Monaco', 'Jardim', 'blanc, rouge', 'img/logo/Monaco.png');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `numero_maillot` int(3) NOT NULL,
  `equipe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `age`, `numero_maillot`, `equipe`) VALUES
(1, 'Bonucci', 'Leonardo', 29, 0, 0),
(3, 'Ronaldo', 'Cristiano', 32, 1, 3),
(4, 'Pogba', 'Paul', 23, 10, 0),
(6, 'Marchisio', 'Claudio', 33, 18, 0),
(10, 'Gameiro', 'KÃ©vin', 28, 11, 0),
(11, 'Griezman', 'Antoine', 26, 7, 0),
(12, 'Dybala', 'Paolo', 23, 21, 2),
(13, 'Cavani', 'Edinson', 32, 9, 2),
(14, 'Falcao', 'Radamel', 34, 9, 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
