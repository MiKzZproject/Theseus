-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Août 2014 à 12:01
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
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `niveau` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `id_client` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `newsletters` tinyint(1) DEFAULT NULL,
  `alerte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_commande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livrer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE IF NOT EXISTS `commande_produit` (
  `id_commande` int(11) unsigned NOT NULL,
  `id_client` int(11) unsigned NOT NULL,
  `id_produit` int(11) unsigned NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_client`,`id_produit`),
  KEY `id_client` (`id_client`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` int(11) DEFAULT NULL,
  `dateHeure` datetime DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `even_client`
--

CREATE TABLE IF NOT EXISTS `even_client` (
  `id_event` int(11) unsigned NOT NULL,
  `id_client` int(11) unsigned NOT NULL,
  `participer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_event`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `even_produit`
--

CREATE TABLE IF NOT EXISTS `even_produit` (
  `id_evenement` int(11) unsigned NOT NULL,
  `id_produit` int(11) unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_produit`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_produit`
--

CREATE TABLE IF NOT EXISTS `fournisseur_produit` (
  `id_fournisseur` int(11) unsigned NOT NULL,
  `id_produit` int(11) unsigned NOT NULL,
  `prix_fournisseur` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_fournisseur`,`id_produit`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_fournisseur` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fournisseur` (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_3` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `even_client`
--
ALTER TABLE `even_client`
  ADD CONSTRAINT `even_client_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `even_client_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `even_produit`
--
ALTER TABLE `even_produit`
  ADD CONSTRAINT `even_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `even_produit_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `fournisseur_produit`
--
ALTER TABLE `fournisseur_produit`
  ADD CONSTRAINT `fournisseur_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fournisseur_produit_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
