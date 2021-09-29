-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 sep. 2021 à 09:40
-- Version du serveur :  5.7.19
-- Version de PHP :  7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `secushare`
--

-- --------------------------------------------------------

--
-- Structure de la table `partage`
--

DROP TABLE IF EXISTS `partage`;
CREATE TABLE IF NOT EXISTS `partage` (
  `id_partage` int(5) NOT NULL AUTO_INCREMENT,
  `id_envoyeur` int(5) NOT NULL,
  `id_receveur` int(5) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `cle_aleatoire` varchar(10) NOT NULL,
  `date_envoie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_partage`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partage`
--

INSERT INTO `partage` (`id_partage`, `id_envoyeur`, `id_receveur`, `fichier`, `cle_aleatoire`, `date_envoie`) VALUES
(1, 2, 1, 'test.pdf', '236', '2021-09-29 07:54:05');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `cle_public` varchar(250) DEFAULT NULL,
  `profil` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email`, `mot_de_passe`, `cle_public`, `profil`) VALUES
(1, 'test1', 'test', 'test@test.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123', 'user'),
(2, 'test2', 'test2', 'test2@test.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
