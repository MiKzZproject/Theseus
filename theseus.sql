-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Avril 2015 à 23:50
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
  `niveau` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`, `email`, `niveau`) VALUES
(0, 'test', 'pass', 'test@test.fr', NULL);

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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `image`) VALUES
(1, 'TV', NULL, NULL),
(2, 'Smartphone', NULL, NULL),
(3, 'Appareil photo', NULL, NULL),
(4, 'Drone', NULL, NULL),
(5, 'Ordinateur portable', 'Ordinateur portable, tablette', 'img/products/microsoft-surface-pro-2.jpg'),
(6, 'Montre connectée', 'montre connectée', 'img/products/apple-watch.jpg');

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
-- Contenu de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`idCategorie`, `idProduit`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(1, 5),
(5, 6),
(6, 7),
(6, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `newsletters` tinyint(1) DEFAULT NULL,
  `alerte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `dateNaissance`, `tel`, `email`, `pwd`, `dateInscription`, `newsletters`, `alerte`) VALUES
(7, 'popo', 'papa', '1985-03-21', '51594', 'a@erehotm.com', 'teerest', '2015-03-21 11:54:08', 1, 1);

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
  `description` text,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `theme` varchar(256) NOT NULL,
  `miniature1` varchar(255) NOT NULL,
  `miniature2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `libelle`, `description`, `adresse`, `cp`, `ville`, `dateDebut`, `dateFin`, `place`, `image`, `theme`, `miniature1`, `miniature2`) VALUES
(1, 'Le Yoyo Palais de Tokyo - Smartphones et tablettes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-10-10 19:30:00', '2015-10-11 02:00:00', 350, 'img/salles/yoyo-palais-de-tokyo.jpg', 'Smartphones et tablettes', 'img/products/blackberry-q10.jpg', 'img/products/samsung-galaxy-tab.jpg'),
(2, 'Le Départ - Photographie et vidéo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '34-36, rue du Départ', 75015, 'Paris', '2015-10-24 20:00:00', '2015-10-24 23:59:00', 270, 'img/salles/le-depart.jpg', 'Photographie et vidéo', 'img/products/nikon-coolpix-s810.jpg', 'img/products/gopro-hero4.jpg'),
(3, 'Espace Monsieur Bleu  - Audio casques, écouteurs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-11-07 19:30:00', '2015-11-07 23:30:00', 450, 'img/salles/Monsieur-Bleu.jpg', 'Audio', 'img/products/sennheiser-PC350.jpg', 'img/products/ecouteur-beats.jpg'),
(4, 'Les Jardins de Bagatelle - Vente GAMING', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Route de Sèvres à Neuilly', 75116, 'Paris', '2015-09-22 19:00:00', '2015-09-22 23:30:00', 550, 'img/salles/jardin-bagatelle.jpg', 'Gaming', 'img/products/souris-gaming.jpg', 'img/products/clavier-gaming.jpg'),
(5, 'DELAVILLE - TV/HIFI', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '34 Boulevard Bonne Nouvelle', 75010, 'Paris', '2015-11-22 15:00:00', '2015-11-22 21:00:00', 250, 'img/salles/delaville.jpg', 'TV/HIFI', 'img/products/philips-65pus9809.jpg', 'img/products/Sony-Hifi.jpg'),
(6, 'LOFT ROQUETTE - Consoles/Jeux vidéos', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', '42 rue de la Roquette', 75011, 'Paris', '2015-12-16 20:00:00', '2015-12-17 02:00:00', 475, 'img/salles/loft-roquette.jpg', 'Jeux Vidéos', 'img/products/ps4.jpg', 'img/products/ACU-PS4.jpg'),
(7, 'Péniche 16 - Soirée ASUS/MICROSOFT', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', 'Quai Z Front de Seine', 75016, 'Paris', '2016-01-18 14:00:00', '2016-01-18 19:00:00', 180, 'img/salles/peniche16.jpg', 'Ordinateurs portables', 'img/products/asus-rog.jpg', 'img/products/microsoft-surface-pro-2.jpg'),
(8, 'La Tête dans les nuages - Montres connectées', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '5 boulevard des Italiens', 75002, 'Paris', '2015-10-30 20:30:00', '2015-10-31 00:00:00', 320, 'img/salles/tete-dans-les-nuages.jpg', 'Montres connectées', 'img/products/apple-watch.jpg', 'img/products/montre-samsung.jpg'),
(9, 'Vaux Hall - Ecrans', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '50 Avenue Pierre Mendès France', 75013, 'Paris', '2015-10-23 21:00:00', '2015-10-24 01:30:00', 175, 'img/salles/vaux-hall.jpg', 'Ecrans', 'img/products/4k-curved.jpg', 'img/products/iiyama-lcd.jpg'),
(10, 'Le Seize Neuf - Stockage / Sauvegarde', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '19 rue de Chateaudun', 75009, 'Paris', '2015-11-02 20:00:00', '2015-11-03 02:00:00', 450, 'img/salles/Le-seize-neuf.jpg', 'Stockage', 'img/products/lacieDD.jpg', 'img/products/samsung-ssd.jpg');

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
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `description` text,
  `prix` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `modele`, `description`, `prix`, `stock`, `image`) VALUES
(1, 'Iphone 6', 'Apple', 'Iphone 6 32 Go', 'Ecran 4.7'''' Retina HD - Résolution : 1334x750 - 6.9mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID\r\n', '650.00', 142, 'img/products/iphone6.jpg'),
(2, 'Galaxy S5 ', 'Samsung', 'Galaxy S5 64go', 'Ecran capacitif 5.1'''' Super AMOLED Full HD - Processeur Quad Core 2.5 GHz -Batterie Li-ion 2800 mAh - Mémoire : 16Go - Stockage : 64 Go - Réseau : Wifi/USB 3.0/Bluetooth 4.0/4G - Android KitKat 4.4.2 - Certifié IP67 - Appareil photo : 16MP - Vidéo : Ultra HD - 2160p', '350.00', 22, 'img/products/samsungs5.jpg'),
(3, 'Iphone 6 plus', 'Apple', 'Iphone 6 plus 32 go', 'Ecran 5.5'''' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone et stabilisation optique de l’image - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID', '800.00', 100, 'img/products/iphone6plus.jpg'),
(4, 'Iphone 5', 'Apple', 'Iphone 5 64go', 'Apple Iphone 5 64GO Noir - Iphone - Débloque tout opérateurs - Fourni dans la boite avec tous les accessoires - Système d''exploitation (OS) iOSEcran 4'''' RetinaMémoire intern…Voir la présentation', '300.00', 100, 'img/products/iphone5.jpg'),
(5, 'Samsung UE55HU8500 TV', 'Samsung', 'UE55HU8500 TV 140CM', 'Ecran de 138 cm (55") - 100% UHD/4K\nRétro-éclairage LED Edge incurvé, UHD Micro-Dimming Ultimate\nTechnologie 100Hz (CMR 1200Hz), Smart TV, Quad Core+\nQuad Screen,Technologie 3D Active (2 paires de lunettes fournies)', '2500.00', 15, 'img/products/samsumg-4k-curved.jpg'),
(6, 'Surface Pro 2', 'Microsoft', 'Surface Pro 2 128go', 'Surface Pro 2 128GB Windows 8.1 Pro Intel Core i5 1600 MHz Nombre de coeurs	2 Taille de la mémoire vive	8192 MB Taille du disque dur	128 GB Taille de l''écran	10.', '800.00', 50, 'img/products/microsoft-surface-pro-2.jpg'),
(7, 'Apple watch', 'Apple', 'Apple watch', 'C’est l’usage que l’on va faire d’un objet qui devrait déterminer le choix des matériaux dont il sera composé. L’Apple Watch a été conçue pour vous suivre dans toutes vos activités quotidiennes, de votre jogging matinal à vos virées nocturnes. C’est pourquoi nous avons choisi l’acier inoxydable 316L, un alliage raffiné et remarquablement résistant à la corrosion. Nous l’avons ensuite forgé à froid pour le rendre jusqu’à 80 % plus dur. Nous avons également réduit les impuretés pour obtenir un effet miroir. Et l’application d’une couche supplémentaire de carbone diamantin (DLC) donne à l’acier inoxydable cette teinte noir sidéral si caractéristique.', '500.00', 100, 'img/products/apple-watch.jpg'),
(8, 'Galaxy Gear Fit Noir', 'Samsung', 'Galaxy Gear Fit Noir', 'Processeur : 168Mhz - Ecran 1.84'''' capacitif Super AMOLED Incurvé - Résolution : 128x432 - Batterie : Li-ion 210 mAh - Interface : Gear Fit Manager - Connectivité : Bluetooth 4.0/USB - Messagerie/Appels/E-mails - Applications Health - Poids : 127g - Couleur : noir - Bracelets interchangeables', '80.00', 62, 'img/products/montre-samsung.jpg'),
(9, 'Sony KD-65S9000B', 'Sony', 'KD-65S9000B 65 pouce (165cm)', 'KKD-65S9000B est un écran tv de 165cm reposant sur une dalle ultra hd 4k (3840 x 2160 pixels) à rétroéclairage led edge local dimming', '1500.00', 14, 'img/products/sony-kd-65s9000b.jpg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD CONSTRAINT `categorie_produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `categorie_produit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_3` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `evenement_client`
--
ALTER TABLE `evenement_client`
  ADD CONSTRAINT `evenement_client_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `evenement_client_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `evenement_produit`
--
ALTER TABLE `evenement_produit`
  ADD CONSTRAINT `evenement_produit_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `evenement_produit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
