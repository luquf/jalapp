-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 20 déc. 2018 à 13:21
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jala`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `id_capteur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('HUM','FUM','TEMP','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` enum('ON','OFF','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `controleurs`
--

CREATE TABLE `controleurs` (
  `id_controleur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('LUM','CH','VOL','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL,
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `domiciles`
--

CREATE TABLE `domiciles` (
  `id_domicile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cle_utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_domicile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `releve_capteurs`
--

CREATE TABLE `releve_capteurs` (
  `id_releve` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_capteur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` datetime NOT NULL,
  `type` enum('HUM','TEMP','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `releve_controleurs`
--

CREATE TABLE `releve_controleurs` (
  `id_releve` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_controleur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` datetime NOT NULL,
  `type` enum('LUM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `cle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `capteur_ibfk_1` (`id_piece`);

--
-- Index pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD PRIMARY KEY (`id_controleur`),
  ADD KEY `controleur_ibfk_1` (`id_piece`);

--
-- Index pour la table `domiciles`
--
ALTER TABLE `domiciles`
  ADD PRIMARY KEY (`id_domicile`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `piece_ibfk_1` (`id_domicile`);

--
-- Index pour la table `releve_capteurs`
--
ALTER TABLE `releve_capteurs`
  ADD PRIMARY KEY (`id_releve`),
  ADD KEY `id_capteur` (`id_capteur`);

--
-- Index pour la table `releve_controleurs`
--
ALTER TABLE `releve_controleurs`
  ADD PRIMARY KEY (`id_releve`),
  ADD KEY `id_controleur` (`id_controleur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`cle`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `pieces` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD CONSTRAINT `controleur_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `pieces` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_domicile`) REFERENCES `domiciles` (`id_domicile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `releve_capteurs`
--
ALTER TABLE `releve_capteurs`
  ADD CONSTRAINT `id_capteur` FOREIGN KEY (`id_capteur`) REFERENCES `capteurs` (`id_capteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `releve_controleurs`
--
ALTER TABLE `releve_controleurs`
  ADD CONSTRAINT `id_controleur` FOREIGN KEY (`id_controleur`) REFERENCES `controleurs` (`id_controleur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
