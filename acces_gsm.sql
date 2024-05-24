-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 16 avr. 2024 à 12:25
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `acces_gsm`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `id` int NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `empreinte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `port1` int NOT NULL,
  `nom1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `port2` int DEFAULT NULL,
  `nom2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port3` int DEFAULT NULL,
  `nom3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port4` int DEFAULT NULL,
  `nom4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port5` int DEFAULT NULL,
  `nom5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`id`, `designation`, `empreinte`, `telephone`, `port1`, `nom1`, `port2`, `nom2`, `port3`, `nom3`, `port4`, `nom4`, `port5`, `nom5`) VALUES
(1, 'Salle principale 3', 'AADDFF88888', '0781326083', 2, 'Porte principale', 5, 'Porte arrière', 0, NULL, 0, NULL, 0, NULL),
(3, 'Piscine plein air', 'AAF1569FE123', '0781326083', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gestion`
--

CREATE TABLE `gestion` (
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gestion`
--

INSERT INTO `gestion` (`email`, `password`) VALUES
('admin-gsm@ciel.eh', '$2y$13$JpFouQqFnkI9qh98xMai4.th3FiBPmtJhVajhMN1E3T9knQ1QPRKu');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `usager_id` int DEFAULT NULL,
  `acces_id` int DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `heure` int NOT NULL,
  `duree` decimal(11,0) NOT NULL,
  `cycle` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `usager_id`, `acces_id`, `date_debut`, `date_fin`, `heure`, `duree`, `cycle`) VALUES
(32, 2, 3, '2023-08-30', '2023-09-01', 17, '3', 1),
(47, 12, 3, '2023-08-31', '2023-09-06', 0, '6', 7),
(48, 18, 3, '2023-09-01', '2023-09-01', 18, '6', 1),
(49, 18, 3, '2023-09-01', '2023-10-01', 12, '12', 1),
(50, 5, 1, '2023-08-30', '2023-08-30', 12, '1', 7),
(51, 5, 3, '2023-09-01', '2023-09-06', 12, '3', 7),
(52, 18, 3, '2023-09-04', '2023-09-15', 9, '3', 1),
(53, 2, 1, '2024-04-16', '2024-04-16', 9, '3', 1),
(54, 15, 1, '2024-04-17', '2024-04-17', 17, '2', 1),
(55, 12, 1, '2024-04-17', '2024-04-17', 16, '1', 1),
(56, 16, 1, '2024-04-18', '2024-04-18', 14, '3', 1),
(57, 5, 1, '2024-04-17', '2024-04-17', 10, '1', 1),
(58, 2, 3, '2024-04-19', '2024-04-19', 18, '1', 1),
(59, 6, 3, '2024-04-19', '2024-04-19', 9, '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autorise` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id`, `nom`, `prenom`, `telephone`, `email`, `autorise`) VALUES
(2, 'PONS', 'Sylvain', '0672063120', 'sylvainpons@free.fr', 1),
(5, 'De Monaco', 'Albert', '0606060606', 'albert.monaco@tel.mnc', 1),
(6, 'Prince', 'Jules', '0677777777', 'jules.prince@free.fr', 1),
(12, 'Martin', 'Vincent ', '0707070707', 'j.m@dd.fr', 1),
(15, 'Dupont', 'Ximun', '0601010101', 'd.x@free.fr', 1),
(16, 'Grandt', 'Lucie', '0701020304', 'gl@free.fr', 1),
(17, 'Seize', 'Louis', '0601010101', 'ls@free.fr', 1),
(18, 'Filipe', 'Louis', '0702020202', 'lp@free.fr', 1),
(23, 'Pons', 'Alexandre', '0788063007', 'alexandre-pons@laposte.net', 0),
(26, 'Horloge', 'Test', '0781326083', 'horloge@net.com', 0),
(27, 'Pons', 'Clara', '0631501844', 'clara.ponsgato@gmail.com', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
