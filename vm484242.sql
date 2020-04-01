-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 avr. 2020 à 08:50
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vm484242`
--

-- --------------------------------------------------------

--
-- Structure de la table `circuit`
--

DROP TABLE IF EXISTS `circuit`;
CREATE TABLE IF NOT EXISTS `circuit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `typeDocument` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `circuit`
--

INSERT INTO `circuit` (`id`, `nom`, `typeDocument`) VALUES
(6, 'Service RH', 'Plan de licenciement');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCircuit` int(11) DEFAULT NULL,
  `positionactuelle` int(11) DEFAULT NULL,
  `proprietaire` varchar(20) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CIRCUIT` (`idCircuit`),
  KEY `FK_PROPRIO` (`proprietaire`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `personne` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UTILISATEUR` (`personne`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`id`, `nom`, `position`, `personne`) VALUES
(19, 'PDG', 3, 'user10'),
(18, 'PDG', 2, 'user10'),
(17, 'DRH', 1, 'user1');

-- --------------------------------------------------------

--
-- Structure de la table `listeetape`
--

DROP TABLE IF EXISTS `listeetape`;
CREATE TABLE IF NOT EXISTS `listeetape` (
  `idCircuit` int(11) DEFAULT NULL,
  `idEtape` int(11) DEFAULT NULL,
  KEY `FK_CIRCUIT` (`idCircuit`),
  KEY `FK_ETAPES` (`idEtape`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listeetape`
--

INSERT INTO `listeetape` (`idCircuit`, `idEtape`) VALUES
(6, 17),
(6, 18);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `mdp`, `role`, `nom`, `prenom`) VALUES
('user4', '$2y$10$iLaww3y3P8eg183DyFIUmO2aIdyn7cfSIDa5WAcULOj51lS/Q9opO', 'user', 'Ho', 'Bob'),
('admin', '$2y$10$NBfElKBouoIpEYv97lwdLuPXeOV2H2xgVyLjCpiNPZ1/qX4oD7swK', 'admin', 'Bon', 'Jean'),
('user1', '$2y$10$W6PJuUBeYUtbZoKTtYw7x..zXerPF8Oc9kPP0ngX503eq/tC10XxC', 'user', 'Neymar', 'Jean'),
('user2', '$2y$10$UbAx4kWRaOgBb/yVCvJWmeBMaqDtlGd09RR1zwqMt7UFo2f9NiFO6', 'user', 'Troijours', 'Adam '),
('user3', '$2y$10$BxETMJWkGXlIZBlBgFQYg.o3eQ070/OQvRPtGoiaWg1csW7Bo8ER2', 'user', 'Ã‰ha', 'Aline'),
('user5', '$2y$10$EeVVgX6udJWDiQnTTczbF.Gmda5M3hoc12J/vs2PpZeHCFh29sc9S', 'user', 'Glace', 'Brice '),
('user6', '$2y$10$G5ZkjOFdOIFI4AvUICQJ9OMgaiYaMiHl1S/3G6mf3fJLtXjsu.92e', 'user', 'Raton', 'Candy'),
('user7', '$2y$10$1sjufO0E/.TOuiMcPdjs2eJbUy8ldziTrwK6SL7OFyu0AfzFF/nqS', 'user', 'Voyance', 'Claire '),
('user8', '$2y$10$IZAziSqRABYOR0oZqlkNJ.SkNZzvby8XA6quTILotzy5qlXV3VmuG', 'user', 'Scylla', 'Eddy '),
('user9', '$2y$10$lFqdkXWwNcHwimnq/kz1QOPnv9r/zX1JY8Q6VAgdYw8ki4jgV2Geq', 'user', 'CoptÃ¨re', 'Ã‰lie'),
('user10', '$2y$10$s81ebWXgUVT9MT.srREnuu0H7s7S0LiIxBxT.wDC0oehonylfz8Di', 'user', 'Danloss', 'Ella');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
