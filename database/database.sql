-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 23 jan. 2019 à 15:51
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.3.1

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
  `type` enum('HUM','FUM','TEMP') CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `etat` enum('ON','OFF') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id_capteur`, `nom`, `type`, `etat`, `id_piece`) VALUES
('123456543456', 'test', 'TEMP', 'ON', 'c4df37ca-c8fc-4c9e-a4b6-5675a474c6c9'),
('ewrtyjuiklouy', 'test', 'HUM', 'ON', 'cfbc0975-aff8-4ff8-b815-6bcdbfa3d911');

-- --------------------------------------------------------

--
-- Structure de la table `controleurs`
--

CREATE TABLE `controleurs` (
  `id_controleur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('LUM','CH','VOL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL,
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `controleurs`
--

INSERT INTO `controleurs` (`id_controleur`, `nom`, `type`, `etat`, `id_piece`) VALUES
('efrtyujiko8lkujyh', 'test', 'VOL', 0, 'cfbc0975-aff8-4ff8-b815-6bcdbfa3d911');

-- --------------------------------------------------------

--
-- Structure de la table `domiciles`
--

CREATE TABLE `domiciles` (
  `id_domicile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cle_utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domiciles`
--

INSERT INTO `domiciles` (`id_domicile`, `nom`, `cle_utilisateur`) VALUES
('4e1e30c3-f3b7-4b67-8fca-7debe6763d8d', 'Maison1', 'kjehkyehjvhguiytkdjg'),
('a8e739de-c75a-4a88-bbb0-aa462a9923da', 'Maison2', 'asdfghtyjuikjytrfed');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `id_piece` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_domicile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id_piece`, `nom`, `id_domicile`) VALUES
('c1e35a48-c695-480e-89af-048e8c99e983', 'Cave', '4e1e30c3-f3b7-4b67-8fca-7debe6763d8d'),
('c4df37ca-c8fc-4c9e-a4b6-5675a474c6c9', 'Salon', '4e1e30c3-f3b7-4b67-8fca-7debe6763d8d'),
('cfbc0975-aff8-4ff8-b815-6bcdbfa3d911', 'sdb', 'a8e739de-c75a-4a88-bbb0-aa462a9923da');

-- --------------------------------------------------------

--
-- Structure de la table `releve_capteurs`
--

CREATE TABLE `releve_capteurs` (
  `id_releve` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_capteur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` datetime NOT NULL,
  `type` enum('HUM','TEMP','FUM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `releve_capteurs`
--

INSERT INTO `releve_capteurs` (`id_releve`, `id_capteur`, `heure`, `type`, `donnee`) VALUES
('568e4a04-01f1-496e-80e9-ff05d7b848b4', '123456543456', '2019-01-23 14:44:05', 'TEMP', 29),
('ee51b319-86d4-42f7-8645-668ef9a109c5', '123456543456', '2019-01-23 15:44:05', 'TEMP', 23),
('f8656364-678d-4abc-9dc1-356b8bd7be26', 'ewrtyjuiklouy', '2019-01-23 15:44:05', 'HUM', 19);

-- --------------------------------------------------------

--
-- Structure de la table `releve_controleurs`
--

CREATE TABLE `releve_controleurs` (
  `id_releve` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_controleur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` datetime NOT NULL,
  `type` enum('LUM','CH','VOL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `releve_controleurs`
--

INSERT INTO `releve_controleurs` (`id_releve`, `id_controleur`, `heure`, `type`, `donnee`) VALUES
('94aa2a49-8d8d-4236-be7b-40bda274fb06', 'efrtyujiko8lkujyh', '2019-01-23 15:44:05', 'VOL', 0),
('eaad044f-4973-4dcf-9638-5b4c6331c1fc', 'efrtyujiko8lkujyh', '2019-01-23 14:44:05', 'VOL', 0);

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
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`cle`, `nom`, `prenom`, `email`, `mdp`, `adresse`, `ville`, `pays`, `telephone`, `admin`) VALUES
('asdfghtyjuikjytrfed', 'Michel', 'Michel', 'leoantoineberton@yahoo.com', '$2y$10$1HglNhK16qGQM/SrTMp9MOO.2FpHGmCQcIf6aKwhC2B6FL./92qwq', '14 bis rue de james', 'Paris', 'france', '0651458429', 0),
('kjehkyehjvhguiytkdjg', 'Berton', 'Leo', 'leoantoineberton@gmail.com', '$2y$10$LXBaI1aqWTNylGa/g2h6luDYv7NLDjeKhlhrE6whZp/sHUi8lQ1gG', '46 rue des lombards', 'Paris', 'france', '0651458429', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Index pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD PRIMARY KEY (`id_controleur`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Index pour la table `domiciles`
--
ALTER TABLE `domiciles`
  ADD PRIMARY KEY (`id_domicile`),
  ADD KEY `cle` (`cle_utilisateur`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_domicile` (`id_domicile`);

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
  ADD CONSTRAINT `capteurs_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `pieces` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD CONSTRAINT `controleurs_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `pieces` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `domiciles`
--
ALTER TABLE `domiciles`
  ADD CONSTRAINT `domiciles_ibfk_1` FOREIGN KEY (`cle_utilisateur`) REFERENCES `utilisateurs` (`cle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD CONSTRAINT `pieces_ibfk_1` FOREIGN KEY (`id_domicile`) REFERENCES `domiciles` (`id_domicile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `releve_capteurs`
--
ALTER TABLE `releve_capteurs`
  ADD CONSTRAINT `releve_capteurs_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteurs` (`id_capteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `releve_controleurs`
--
ALTER TABLE `releve_controleurs`
  ADD CONSTRAINT `releve_controleurs_ibfk_1` FOREIGN KEY (`id_controleur`) REFERENCES `controleurs` (`id_controleur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
