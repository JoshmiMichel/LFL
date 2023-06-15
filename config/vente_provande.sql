-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 juin 2023 à 13:48
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vente_provande`
--

-- --------------------------------------------------------

--
-- Structure de la table `aprov`
--

CREATE TABLE `aprov` (
  `idAp` int(11) NOT NULL,
  `qtAp` float NOT NULL,
  `dateAp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prodAp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `aprov`
--

INSERT INTO `aprov` (`idAp`, `qtAp`, `dateAp`, `prodAp`) VALUES
(1, 96, '2023-06-09 11:47:34', 12),
(2, 54, '2023-06-09 11:47:34', 7);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_com` int(4) NOT NULL,
  `design` varchar(255) NOT NULL,
  `qtAchete` float NOT NULL,
  `pu` int(11) DEFAULT NULL,
  `montant` int(11) NOT NULL,
  `dateAchat` timestamp NOT NULL DEFAULT current_timestamp(),
  `idProP` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_com`, `design`, `qtAchete`, `pu`, `montant`, `dateAchat`, `idProP`) VALUES
(1, '1430', 5, 2400, 12000, '2023-06-05 16:10:35', 12);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `nomP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prixP` int(11) NOT NULL,
  `qte` float NOT NULL,
  `montant` int(11) NOT NULL,
  `dateP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `nomP`, `prixP`, `qte`, `montant`, `dateP`) VALUES
(0, '1430', 2400, 5, 12000, '2023-06-09 11:42:54');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(4) NOT NULL,
  `nom_prod` varchar(255) NOT NULL,
  `qt_prod_detail` float NOT NULL,
  `prix_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `nom_prod`, `qt_prod_detail`, `prix_detail`) VALUES
(1, 'DEMMARAGE', 39.5, 3000),
(2, 'FINITION', 50, 2900),
(3, 'FEEDMAX CROISSANCE', 5, 2700),
(4, 'FEEDMAX FINITION', 20, 3000),
(5, 'BOTSAKO', 84, 2000),
(6, 'SEMOULE', 50, 1900),
(7, 'TOURTAUX', 50, 3000),
(8, '210', 48, 1200),
(9, '1430', 45, 2400),
(10, 'PSA PP 38', 10, 2600),
(11, 'PSA PU', 60, 2400),
(12, 'PSA PRES PCT', 50, 2800),
(13, 'KOBA MANGAHAZO', 34, 1300);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aprov`
--
ALTER TABLE `aprov`
  ADD PRIMARY KEY (`idAp`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aprov`
--
ALTER TABLE `aprov`
  MODIFY `idAp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_com` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
