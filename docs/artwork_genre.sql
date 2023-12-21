-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 déc. 2023 à 21:30
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
-- Base de données : `oflix_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `artwork_genre`
--

CREATE TABLE `artwork_genre` (
  `artwork_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artwork_genre`
--

INSERT INTO `artwork_genre` (`artwork_id`, `genre_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 9),
(2, 1),
(2, 3),
(2, 7),
(2, 10),
(2, 13),
(2, 15),
(3, 4),
(3, 7),
(3, 13),
(4, 3),
(4, 7),
(4, 10),
(4, 13),
(4, 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artwork_genre`
--
ALTER TABLE `artwork_genre`
  ADD PRIMARY KEY (`artwork_id`,`genre_id`),
  ADD KEY `IDX_12BA5BE2DB8FFA4` (`artwork_id`),
  ADD KEY `IDX_12BA5BE24296D31F` (`genre_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artwork_genre`
--
ALTER TABLE `artwork_genre`
  ADD CONSTRAINT `FK_12BA5BE24296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12BA5BE2DB8FFA4` FOREIGN KEY (`artwork_id`) REFERENCES `artwork` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
