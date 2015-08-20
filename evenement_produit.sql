-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Août 2015 à 20:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `theseus`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement_produit`
--

CREATE TABLE IF NOT EXISTS `evenement_produit` (
  `idEvenement` int(11) unsigned NOT NULL,
  `idProduit` int(11) unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`idEvenement`,`idProduit`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement_produit`
--

INSERT INTO `evenement_produit` (`idEvenement`, `idProduit`, `stock`) VALUES
(1, 1, 150),
(1, 2, 250),
(1, 3, 120),
(1, 4, 95),
(1, 15, 110),
(2, 24, 80),
(2, 25, 140),
(3, 17, 250),
(3, 20, 320),
(4, 26, 120),
(4, 27, 170),
(5, 5, 400),
(5, 9, 310),
(6, 16, 270),
(6, 21, 190),
(6, 36, 740),
(8, 7, 520),
(8, 8, 750),
(9, 37, 260),
(9, 38, 270),
(10, 14, 610),
(10, 35, 380),
(21, 16, 170),
(21, 21, 500),
(21, 36, 470);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evenement_produit`
--
ALTER TABLE `evenement_produit`
  ADD CONSTRAINT `evenement_produit_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `evenement_produit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
