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
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `niveau` int(1) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `idCategorie` int(11) unsigned DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
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
  `idClient` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `dateCommande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livrer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE IF NOT EXISTS `commande_produit` (
  `idCommande` int(11) unsigned NOT NULL,
  `idClient` int(11) unsigned NOT NULL,
  `idProduit` int(11) unsigned NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idClient`,`idProduit`),
  KEY `idClient` (`idClient`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenement_client`
--

CREATE TABLE IF NOT EXISTS `evenement_client` (
  `idEvenement` int(11) unsigned NOT NULL,
  `idClient` int(11) unsigned NOT NULL,
  `participer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idEvenement`,`idClient`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `idCategorie` int(11) unsigned NOT NULL,
  `idProduit` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCategorie`,`idProduit`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_3` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `evenement_client`
--
ALTER TABLE `evenement_client`
  ADD CONSTRAINT `evenement_client_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `evenement_client_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `evenement_produit`
--
ALTER TABLE `evenement_produit`
  ADD CONSTRAINT `evenement_produit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `evenement_produit_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD CONSTRAINT `categorie_produit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `categorie_produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`, `email`) VALUES
(0, 'test', 'pass', 'test@test.fr');


--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `image`) VALUES
(NULL, 'TV', NULL),
(NULL, 'Smartphone', NULL),
(NULL, 'Appareil photo', NULL),
(NULL, 'Drone', NULL);

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `idCategorie`, `description`, `prix`, `stock`) VALUES
(1, 'Iphone 6 S 32 Go', 'Apple', 2, 'sdfsdfs', 650, 142),
(2, 'Samsung Galaxy note 2 ', 'Sammsung', 2, 'sdfsfsdf', 350, 22);

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `libelle`, `description`, `adresse`, `cp`, `ville`, `dateDebut`, `dateFin`, `place`, `image`) VALUES
(1, 'Le Yoyo Palais de Tokyo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-10-10 19:30:00', '2015-10-11 02:00:00', 350, 'img/salles/yoyo-palais-de-tokyo.jpg'),
(2, 'Le Départ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '34-36, rue du Départ', 75015, 'Paris', '2015-10-24 20:00:00', '2015-10-24 23:59:00', 270, 'img/salles/le-depart.jpg');
