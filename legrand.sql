-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 26 sep. 2017 à 14:11
-- Version du serveur :  10.0.30-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `legrand`
--

-- --------------------------------------------------------

--
-- Structure de la table `apres_peser`
--

CREATE TABLE `apres_peser` (
  `id` int(11) NOT NULL,
  `poids_brut_rebut` varchar(255) NOT NULL,
  `peser` int(11) NOT NULL,
  `date_peser` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `apres_peser`
--

INSERT INTO `apres_peser` (`id`, `poids_brut_rebut`, `peser`, `date_peser`) VALUES
(1, '2-15', 15, '2017-09-26 16:04:47');

-- --------------------------------------------------------

--
-- Structure de la table `info_donnees`
--

CREATE TABLE `info_donnees` (
  `id` int(11) NOT NULL,
  `identification_rebut` varchar(255) NOT NULL,
  `tare_caissette` varchar(255) NOT NULL,
  `poids_brut_rebut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_donnees`
--

INSERT INTO `info_donnees` (`id`, `identification_rebut`, `tare_caissette`, `poids_brut_rebut`) VALUES
(1, 'gfdg', 'dfgf', '2-15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apres_peser`
--
ALTER TABLE `apres_peser`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_donnees`
--
ALTER TABLE `info_donnees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apres_peser`
--
ALTER TABLE `apres_peser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `info_donnees`
--
ALTER TABLE `info_donnees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
