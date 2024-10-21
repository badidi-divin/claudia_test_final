-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 nov. 2022 à 11:22
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
-- Base de données :  `e_commerce_fimbo`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(14) NOT NULL,
  `nom_complet` varchar(25) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_complet`, `sexe`, `telephone`, `email`, `adresse`, `password`, `date`) VALUES
(1, 'BADIDI KAZIMALI DIVIN', 'M', '0817767357', 'divinbadidi081@gmail.com', 'KINSHASA/LINGWALA/ITAGA/NÂ°19', '81dc9bdb52d04dc20036dbd8313ed055', '2022-11-23 04:17:42');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(14) NOT NULL,
  `code_commande` varchar(15) NOT NULL,
  `pt` int(15) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `code_commande`, `pt`, `client`, `date`) VALUES
(1, 'Com/101', 5040, 'BADIDI KAZIMALI DIVIN', '2022-10-02 04:13:47'),
(2, 'com/102', 200, 'Claude', '2022-11-06 00:20:26'),
(3, 'Com/103', 100, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:19:03'),
(4, 'Com/104', 700, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:25:32'),
(5, 'Com/105', 700, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:25:53'),
(6, 'Com/106', 100, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:26:04'),
(7, 'Com/107', 40, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:27:15'),
(8, 'Com/108', 120, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:27:40'),
(9, 'Com/109', 100, 'BADIDI KAZIMALI DIVIN', '2022-11-23 04:27:49'),
(10, 'Com/110', 40, 'BADIDI KAZIMALI DIVIN', '2022-11-23 06:00:18');

-- --------------------------------------------------------

--
-- Structure de la table `commande_resto`
--

CREATE TABLE `commande_resto` (
  `id` int(14) NOT NULL,
  `code_commande` varchar(15) NOT NULL,
  `pt` int(15) DEFAULT NULL,
  `tables` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande_resto`
--

INSERT INTO `commande_resto` (`id`, `code_commande`, `pt`, `tables`, `date`) VALUES
(1, 'Co/101', 40, 'Bill-Gates', '2022-11-23 06:12:20');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id` int(14) NOT NULL,
  `code_commande` varchar(15) DEFAULT NULL,
  `plat` varchar(25) DEFAULT NULL,
  `qte_com` int(14) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detail_commande`
--

INSERT INTO `detail_commande` (`id`, `code_commande`, `plat`, `qte_com`, `prix`, `date`) VALUES
(1, 'Com/101', 'chawarma', 1, 40, '2022-11-06 00:27:41'),
(2, 'Com/101', 'Fritte de france', 50, 100, '2022-11-06 00:27:41'),
(3, 'Com/103', 'Fritte de france', 1, 100, '2022-11-23 04:19:03'),
(4, 'Com/104', 'Fritte de france', 3, 100, '2022-11-23 04:25:32'),
(5, 'Com/104', 'chawarma', 10, 40, '2022-11-23 04:25:32'),
(6, 'Com/105', 'Fritte de france', 3, 100, '2022-11-23 04:25:53'),
(7, 'Com/105', 'chawarma', 10, 40, '2022-11-23 04:25:53'),
(8, 'Com/106', 'Fritte de france', 1, 100, '2022-11-23 04:26:04'),
(9, 'Com/107', 'chawarma', 1, 40, '2022-11-23 04:27:15'),
(10, 'Com/108', 'chawarma', 3, 40, '2022-11-23 04:27:40'),
(11, 'Com/109', 'Fritte de france', 1, 100, '2022-11-23 04:27:49'),
(12, 'Com/110', 'chawarma', 1, 40, '2022-11-23 06:00:18');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande_resto`
--

CREATE TABLE `detail_commande_resto` (
  `id` int(14) NOT NULL,
  `code_commande` varchar(15) DEFAULT NULL,
  `plat` varchar(25) DEFAULT NULL,
  `qte_com` int(14) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detail_commande_resto`
--

INSERT INTO `detail_commande_resto` (`id`, `code_commande`, `plat`, `qte_com`, `prix`, `date`) VALUES
(1, 'Co/101', 'chawarma', 1, 40, '2022-11-23 06:10:35');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(14) NOT NULL,
  `designation` varchar(25) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `qte_stock` int(14) DEFAULT NULL,
  `prix` int(15) DEFAULT NULL,
  `prix_total` int(14) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `designation`, `description`, `qte_stock`, `prix`, `prix_total`, `image`) VALUES
(3, 'chawarma', 'test', 100, 40, 4000, '632d78c56ee138.72946555.jpg'),
(4, 'Fritte de france', 'test divin', 50, 100, 5000, '632d79df0c70e1.48351848.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(14) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(2, 'fimbo', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(3, 'toto', '81dc9bdb52d04dc20036dbd8313ed055', 'caissier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_commande` (`code_commande`);

--
-- Index pour la table `commande_resto`
--
ALTER TABLE `commande_resto`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_commande_resto`
--
ALTER TABLE `detail_commande_resto`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande_resto`
--
ALTER TABLE `commande_resto`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `detail_commande_resto`
--
ALTER TABLE `detail_commande_resto`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
