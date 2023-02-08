-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 fév. 2023 à 12:40
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `real-estate`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `superficie` int(11) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `montant` decimal(10,0) DEFAULT NULL,
  `dateAnnonce` date DEFAULT NULL,
  `typeAnnonce` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `image`, `description`, `superficie`, `adresse`, `montant`, `dateAnnonce`, `typeAnnonce`) VALUES
(1, 'Sunny Villa', 'images/pexels-binyamin-mellish-186077.jpg', 'A beautiful villa with a spacious garden', 120, 'Los Angeles, CA', '500000', '2022-12-01', 'vente'),
(2, 'Cozy Cottage', 'images/pexels-asad-photo-maldives-2549018.jpg', 'A charming cottage with a fireplace', 90, 'San Francisco, CA', '350000', '2022-11-15', 'vente'),
(3, 'Luxury Apartment', 'images/pexels-mike-b-463996.jpg', 'A luxurious apartment with a city view', 60, 'New York, NY', '1500', '2022-10-01', 'location'),
(4, 'Modern Duplex', 'images/pexels-thanhhoa-tran-1488327.jpg', 'A modern duplex with a rooftop terrace', 100, 'London, UK', '420000', '2022-09-15', 'vente'),
(5, 'Rustic Chalet', 'images/pexels-asad-photo-maldives-1449729.jpg', 'A rustic chalet with a ski-in, ski-out location', 80, 'Zurich, Switzerland', '300000', '2022-08-01', 'vente'),
(6, 'Elegant Mansion', 'images/pexels-binyamin-mellish-1396122.jpg', 'An elegant mansion with a grand staircase', 150, 'Paris, France', '1000000', '2022-07-15', 'vente'),
(7, 'Stylish Studio', 'images/pexels-joão-gustavo-rezende-68389.jpg', 'A stylish studio with a balcony', 30, 'Berlin, Germany', '800', '2022-06-01', 'location'),
(8, 'Contemporary House', 'images/pexels-pixabay-259588.jpg', 'A contemporary house with a garden', 110, 'Tokyo, Japan', '600000', '2022-05-15', 'vente'),
(9, 'Mediterranean Villa', 'images/pexels-vecislavas-popa-1571460.jpg', 'A Mediterranean villa with a pool', 140, 'Santorini, Greece', '700000', '2022-04-11', 'vente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
