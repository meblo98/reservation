-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 09 mars 2024 à 20:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_bilet` int(11) NOT NULL,
  `numero_billet` int(50) DEFAULT NULL,
  `prix` int(20) DEFAULT NULL,
  `classe` varchar(20) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_vol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id_bilet`, `numero_billet`, `prix`, `classe`, `id_client`, `id_vol`) VALUES
(2, 984407, 1000000, 'moyenne', NULL, 1),
(4, 984405, 500000, 'première classe', NULL, 2),
(5, 1234567, 20000, 'premiere classe', NULL, 1),
(6, 459298, 2000000, 'vip', NULL, 1),
(9, 655644, 300000, 'moyenne', NULL, 2),
(10, 460928, 8000000, 'vip prestige', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `adresse_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `prenom`, `nom`, `adresse_email`) VALUES
(1, 'MEBLO', 'BARHAM', 'meblo@gmail.com'),
(2, 'EL BACHIR', 'LO', 'bachir@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `id_vol` int(11) NOT NULL,
  `compagnie_aerienne` varchar(50) DEFAULT NULL,
  `numero_vol` int(50) NOT NULL,
  `heure_depart` datetime DEFAULT NULL,
  `heure_arrive` datetime DEFAULT NULL,
  `lieu_depart` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`id_vol`, `compagnie_aerienne`, `numero_vol`, `heure_depart`, `heure_arrive`, `lieu_depart`, `destination`) VALUES
(1, 'aire senegal', 2024050530, '2024-03-06 11:47:24', '2024-03-06 18:47:24', 'dakar', 'miami'),
(2, 'aire france', 2024010398, '2024-03-13 10:47:24', '2024-03-13 20:47:24', 'dakar', 'Hawaï');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_bilet`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_vol` (`id_vol`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`id_vol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_bilet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `id_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`id_vol`) REFERENCES `vol` (`id_vol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
