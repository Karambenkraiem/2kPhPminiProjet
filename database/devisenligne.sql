-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 déc. 2022 à 21:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devisenligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `refart` varchar(30) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `pu` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`refart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`refart`, `libelle`, `pu`, `qte`, `image`) VALUES
('CL-SP02', 'Clavier pour SmartPhone / Tablette', 150, 20, '63a012f7d4de9'),
('CL23', 'Clavier USB', 20, 50, '63a012bbd8ccf'),
('CS10', 'Pack Casque + Souris Gamind', 120, 15, '63a0c6145cb8f'),
('LSE1000', 'Modem CISCO Linksys E1000', 375, 3, '63a0c099a36bcCisco LS E1000.jpg'),
('SR13', 'Souris Gamer Led', 150, 23, '63a0c0dc47b29souris-gaming-jertech-m200-warwick.jpg'),
('SR20', 'Souris laser HP', 70, 10, 'kkh-logo.png'),
('SSD256', 'Dsique Dur SSD 256Go', 125, 100, 'kkh-logo.png'),
('UCG001', 'Unite Centrale Gaming MSI', 2300, 230, '63a01067b2e2e'),
('UCGCL', 'UnitÃ© centrale Gaming MSI CPU Rayzen 7 + clavier et souris', 4200, 3, '63a0c69b183fc'),
('UCGi7', 'Unite Centrale Gamer avec processeur i7', 2500, 3, '63a0c0f28b8bfgungnir-i7-10700kf-3070-16go-512go-tunisie.jpg'),
('UCi7', 'Unite Centrale avec processeur i7', 3000, 5, '63a0c0fe78381msi-gaming-aegis-ti3-8rd-i7-8e-gen-8-go_2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `cinClt` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mp` varchar(12) NOT NULL,
  `typeCompte` varchar(6) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `tel` int(13) NOT NULL,
  PRIMARY KEY (`cinClt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`cinClt`, `nom`, `prenom`, `email`, `mp`, `typeCompte`, `adresse`, `tel`) VALUES
(5455397, 'MHAMDI', 'Kheireddine', 'kh.mhamdi@gmail.com', 'kh23', 'client', 'Rades', 53722910),
(8790649, 'karam', 'ben kraiem', 'karam.bkrm@gmail.com', '123456', 'admin', 'goulette', 22368999),
(12345678, 'Karam', 'Ben KRAYEM', 'karam@gmail.com', '123456', 'client', 'Rades', 22123456),
(23456789, 'Kheireddine', 'MHAMDI', 'admin@admin.com', '123', 'admin', 'administrateur', 12345678);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `numdevis` int(11) NOT NULL AUTO_INCREMENT,
  `dtdevis` varchar(10) NOT NULL,
  `mtotal` float NOT NULL,
  `cinClt` int(10) NOT NULL,
  `valid` int(1) NOT NULL,
  PRIMARY KEY (`numdevis`),
  KEY `numclient` (`cinClt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignedevis`
--

DROP TABLE IF EXISTS `lignedevis`;
CREATE TABLE IF NOT EXISTS `lignedevis` (
  `numdevis` int(50) NOT NULL,
  `refart` varchar(30) NOT NULL,
  `qteCmd` int(11) NOT NULL,
  `remise` int(3) NOT NULL,
  `ptArt` float NOT NULL,
  PRIMARY KEY (`refart`,`numdevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`cinClt`) REFERENCES `client` (`cinClt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
