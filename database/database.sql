-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 25 oct. 2018 à 08:55
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

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
  `type` enum('LUM','CH','VOL','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL,
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `domiciles`
--

CREATE TABLE `domiciles` (
  `id_domicile` varchar(100) NOT NULL,
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
  `telephone` varchar(10)COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Index pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD PRIMARY KEY (`id_controleur`);


--
-- Index pour la table `domiciles`
--
ALTER TABLE `domiciles`
  ADD PRIMARY KEY (`id_domicile`);


--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id_piece`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`cle`);



-- 
-- Donnees test pour la table `utilisateurs`
-- 

INSERT INTO `utilisateurs` 
  VALUES('dcb96fe3-1023-49f9-a886-2f292bb91441', 'Berton', 'Leo', 'leoantoineberton@gmail.com', '', '14 bis rue Louis Leroux', 'Carrieres sur seine', 'France', '0651458429', 1);

--
-- Donnees de test pour la table `doniciles`
--

INSERT INTO `domiciles` 
  VALUES('7b6bb39c-cf71-4593-adba-ca03aebca46a', 'Domicile 1', 'dcb96fe3-1023-49f9-a886-2f292bb91441');

--
-- Donnees de test pour la table `pieces`
--

INSERT INTO `pieces` 
  VALUES('b0c744e8-b561-46fc-bc13-171cfa581102', 'Domicile 1', '7b6bb39c-cf71-4593-adba-ca03aebca46a');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
