-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Août 2015 à 15:59
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `image`) VALUES
(1, 'TV', NULL, NULL),
(2, 'Smartphone', NULL, NULL),
(3, 'Appareil photo', NULL, NULL),
(4, 'Drone', NULL, NULL),
(5, 'Ordinateur portable', 'Ordinateur portable', 'img/products/microsoft-surface-pro-2.jpg'),
(6, 'Montre connectée', 'montre connectée', 'img/products/apple-watch.jpg'),
(7, 'Tablette', NULL, NULL),
(8, 'Imprimante', NULL, NULL),
(9, 'Sauvegarde', NULL, NULL),
(10, 'Jeux videos', NULL, NULL),
(11, 'Audio', NULL, NULL),
(12, 'Accessoires', NULL, NULL);

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
(1, 9),
(8, 10),
(7, 11),
(7, 12),
(4, 13),
(9, 14),
(2, 15),
(10, 16),
(11, 17),
(11, 18),
(1, 19),
(11, 20),
(10, 21),
(5, 22),
(5, 23),
(3, 24),
(3, 25),
(12, 26),
(12, 27),
(12, 28),
(8, 29),
(8, 30),
(6, 31),
(6, 32),
(4, 33),
(4, 34),
(9, 35);

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
  `lieu` varchar(256) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `libelle`, `lieu`, `description`, `adresse`, `cp`, `ville`, `dateDebut`, `dateFin`, `place`, `image`, `theme`, `miniature1`) VALUES
(1, 'Smartphones et tablettes', 'Le Yoyo Palais de Tokyo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-10-10 19:30:00', '2015-10-11 02:00:00', 350, 'img/salles/yoyo-palais-de-tokyo.jpg', 'Smartphones et tablettes', 'img/products/blackberry-q10.jpg'),
(2, 'Photographie et vidéo', 'Le Départ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '34-36, rue du Départ', 75015, 'Paris', '2015-10-24 20:00:00', '2015-10-24 23:59:00', 270, 'img/salles/le-depart.jpg', 'Photographie et vidéo', 'img/products/nikon-coolpix-s810.jpg'),
(3, 'Audio casques, écouteurs', 'Espace Monsieur Bleu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-11-07 19:30:00', '2015-11-07 23:30:00', 450, 'img/salles/Monsieur-Bleu.jpg', 'Audio', 'img/products/sennheiser-PC350.jpg'),
(4, 'Vente GAMING', 'Les Jardins de Bagatelle', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Route de Sèvres à Neuilly', 75116, 'Paris', '2015-09-22 19:00:00', '2015-09-22 23:30:00', 550, 'img/salles/jardin-bagatelle.jpg', 'Gaming', 'img/products/souris-gaming.jpg'),
(5, 'TV/HIFI', 'DELAVILLE', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '34 Boulevard Bonne Nouvelle', 75010, 'Paris', '2015-11-22 15:00:00', '2015-11-22 21:00:00', 250, 'img/salles/delaville.jpg', 'TV/HIFI', 'img/products/philips-65pus9809.jpg'),
(6, 'Consoles/Jeux vidéos', 'LOFT ROQUETTE', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', '42 rue de la Roquette', 75011, 'Paris', '2015-12-16 20:00:00', '2015-12-17 02:00:00', 475, 'img/salles/loft-roquette.jpg', 'Jeux Vidéos', 'img/products/ps4.jpg'),
(7, 'Soirée ASUS/MICROSOFT', 'Péniche 16', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', 'Quai Z Front de Seine', 75016, 'Paris', '2016-01-18 14:00:00', '2016-01-18 19:00:00', 180, 'img/salles/peniche16.jpg', 'Ordinateurs portables', 'img/products/asus-rog.jpg'),
(8, 'Montres connectées', 'La Tête dans les nuages', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '5 boulevard des Italiens', 75002, 'Paris', '2015-10-30 20:30:00', '2015-10-31 00:00:00', 320, 'img/salles/tete-dans-les-nuages.jpg', 'Montres connectées', 'img/products/apple-watch.jpg'),
(9, 'Ecrans', 'Vaux Hall', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '50 Avenue Pierre Mendès France', 75013, 'Paris', '2015-10-23 21:00:00', '2015-10-24 01:30:00', 175, 'img/salles/vaux-hall.jpg', 'Ecrans', 'img/products/samsumg-4k-curved.jpg'),
(10, 'Stockage / Sauvegarde', 'Le Seize Neuf', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '19 rue de Chateaudun', 75009, 'Paris', '2015-11-02 20:00:00', '2015-11-03 02:00:00', 450, 'img/salles/Le-seize-neuf.jpg', 'Stockage', 'img/products/lacieDD.jpg'),
(21, 'Vente Consoles de Jeux', 'Péniche 16', 'lalalaLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', 'rgsregsQuai Z Front de Seine', 75016, 'Paris', '2015-05-03 00:00:00', '2015-06-15 00:00:00', 145, 'img/salles/peniche16.jpg', 'lalalaJeux Vidéos', 'img/products/ps4-silver.jpg');

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
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`) VALUES
(1, 'blabla@gmail.com'),
(7, 'hdkfhlkjhklg@gmail');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `modele`, `description`, `prix`, `stock`, `image`) VALUES
(1, 'Iphone 6', 'Apple', 'Iphone 6 32 Go', 'Ecran 4.7'''' Retina HD - Résolution : 1334x750 - 6.9mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID\r\n', '650.00', 142, 'img/products/iphone6.jpg'),
(2, 'Galaxy S5 ', 'Samsung', 'Galaxy S5 64go', 'Ecran capacitif 5.1'''' Super AMOLED Full HD - Processeur Quad Core 2.5 GHz -Batterie Li-ion 2800 mAh - Mémoire : 16Go - Stockage : 64 Go - Réseau : Wifi/USB 3.0/Bluetooth 4.0/4G - Android KitKat 4.4.2 - Certifié IP67 - Appareil photo : 16MP - Vidéo : Ultra HD - 2160p', '350.00', 22, 'img/products/samsungs5.jpg'),
(3, 'Iphone 6 plus', 'Apple', 'Iphone 6 plus 32 go', 'Ecran 5.5'''' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone et stabilisation optique de l’image - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID', '800.00', 100, 'img/products/iphone6plus.jpg'),
(4, 'Iphone 5', 'Apple', 'Iphone 5 64go', 'Apple Iphone 5 64GO Noir - Iphone - Débloque tout opérateurs - Fourni dans la boite avec tous les accessoires - Système d''exploitation (OS) iOSEcran 4'''' RetinaMémoire intern…Voir la présentation', '300.00', 100, 'img/products/iphone5.jpg'),
(5, 'Samsung UE55HU8500 TV', 'Samsung', 'UE55HU8500 TV 140CM', 'Ecran de 138 cm (55") - 100% UHD/4K\nRétro-éclairage LED Edge incurvé, UHD Micro-Dimming Ultimate\nTechnologie 100Hz (CMR 1200Hz), Smart TV, Quad Core+\nQuad Screen,Technologie 3D Active (2 paires de lunettes fournies)', '2500.00', 15, 'img/products/samsumg-4k-curved.jpg'),
(6, 'ASUS Rog2', 'ASUS', 'ROG', '- Ecran 17 pouces - 1920x1080\n- Stockage et mémoire : disque dur 1000 Go + SSD 256 Go, RAM 32 Go\n Intel Core i7 4720HQ 2.6 Ghz\n- Carte Graphique gaming : Nvidia GeForce GTX980M 4 Go\n- 1 port(s) HDMI; - 4 port(s) USB 3.0; 1 port(s) Ethernet; 1 prise(s) jack\n\n', '2000.00', 50, 'img/products/asus-rog.jpg'),
(7, 'Apple watch', 'Apple', 'Apple watch', 'C’est l’usage que l’on va faire d’un objet qui devrait déterminer le choix des matériaux dont il sera composé. L’Apple Watch a été conçue pour vous suivre dans toutes vos activités quotidiennes, de votre jogging matinal à vos virées nocturnes. C’est pourquoi nous avons choisi l’acier inoxydable 316L, un alliage raffiné et remarquablement résistant à la corrosion. Nous l’avons ensuite forgé à froid pour le rendre jusqu’à 80 % plus dur. Nous avons également réduit les impuretés pour obtenir un effet miroir. Et l’application d’une couche supplémentaire de carbone diamantin (DLC) donne à l’acier inoxydable cette teinte noir sidéral si caractéristique.', '500.00', 100, 'img/products/apple-watch.jpg'),
(8, 'Galaxy Gear Fit Noir', 'Samsung', 'Galaxy Gear Fit Noir', 'Processeur : 168Mhz - Ecran 1.84'''' capacitif Super AMOLED Incurvé - Résolution : 128x432 - Batterie : Li-ion 210 mAh - Interface : Gear Fit Manager - Connectivité : Bluetooth 4.0/USB - Messagerie/Appels/E-mails - Applications Health - Poids : 127g - Couleur : noir - Bracelets interchangeables', '80.00', 62, 'img/products/montre-samsung.jpg'),
(9, 'Sony KD-65S9000B', 'Sony', 'KD-65S9000B 65 pouce (165cm)', 'KKD-65S9000B est un écran tv de 165cm reposant sur une dalle ultra hd 4k (3840 x 2160 pixels) à rétroéclairage led edge local dimming', '1500.00', 14, 'img/products/sony-kd-65s9000b.jpg'),
(10, 'Canon Pixma Mx395', 'Canon', 'Pixma Mx395', 'Imprimante couleur à technologie Jet d''encre - Fonctions : imprimante, photocopieur, scanner et télécopieur (fax) - Numérisation vers le Cloud - Compatible Windows 8/RT/7/Vista/XP, Mac OS X v10.6.8 ou version supérieure', '60.00', 150, 'img/products/canon-pixma.jpg'),
(11, 'Samsung GalaxyTab 4', 'Samsung', 'GalaxyTab 4', '- Android 4.4 Kit Kat, processeur 1.2 GHz quad-core\r\n- 16 Go de mémoire Flash, 1,5 Go de RAM\r\n- Ecran WXGA Display 1280x800\r\n- Mémoire extensible par port microSD et 50 Go de stockage sur Dropbox\r\n- Batterie longue durée 6800 mAh\r\n\r\n', '215.00', 200, 'img/products/galaxyTab4.jpg'),
(12, 'Microsoft Surface Pro 2', 'Microsoft', 'Surface Pro 2', 'Si la Surface Pro 3 est bel et bien une tablette, cette dernière a été pensée pour pouvoir remplacer intégralement un ordinateur ultraportable traditionnel ! Cette dernière est équipée de la dernière version de Windows 8.1 , Professionnel permettant ainsi d''exécuter n''importe quel programme Windows, comme sur un ordinateur.', '850.00', 320, 'img/products/microsoft-surface-pro-2.jpg'),
(13, 'Drone T2M DGX-30 Quadrocoptère', 'T2M', 'DGX-30 Quadrocoptère', 'Seul un paramétrage simple est à effectuer avant la première utilisation. Il ne sera pas nécessaire de le renouveler pour les utilisations suivantes. Le DGX30 est livré avec un support de caméra type GoPro® sur coussins d''air. Ce support est amovible. La caméra n''est pas fournie.\n- La radio 2,4GHz fournie est de type 8 voies (4 principales + 4 auxiliaires). Deux des voies auxiliaires sont dédiées aux modes de vol et deux à l''orientation de l''appareil de prise de vue (gimbal non fourni).\n- Performant, facile à utiliser et abordable, le DGX30 est un remarquable outil de prises de vue aérienne pour l''amateur exigeant.\n- Dimensions : 300x300mm (carrosserie)\n- Diamètre des rotors : 210mm\n- Poids : 880g', '410.00', 90, 'img/products/DGX30.jpg'),
(14, 'Lacie DD Home 2To', 'Lacie', 'DD Home 2TO', '- Type: disque multimedia \r\n- Disque dur ultra compact pour transférer et sauvegarder vos données\r\n- Boîtier en aluminium de 5mm, assurant la sécurité de vos données\r\n- Fiable et élégant, le disque offre une excellente capacité de stockage et une vitesse de transfert ultra rapide\r\n- Interface de connexion: 1 x USB 3.0 (compatible avec USB 2.0)\r\n- Vitesse de transfert des données: 5Go/s USB 3.0 (480Mb/s USB 2.0)\r\n- Dimensions: 120 x 190 x 38 mm', '140.00', 170, 'img/products/lacieDD.jpg'),
(15, 'BlackBerry Q10', 'BlackBerry', 'Q10', '- 720 x 720 résolution de 330 ppp\r\n- Clavier AZERTY et écran tactile\r\n- Jusqu’à 14.8 jours* d’autonomie en veille\r\n- HD 1080p enregistrement vidéo\r\n- Jusqu’à 13,5 heures* d’autonomie en communication (3G)\r\n- BlackBerry® 10 système d’exploitation\r\nQualcomm® Snapdragon™ Processeur S4\r\n', '600.00', 230, 'img/products/blackberry-q10.jpg'),
(16, 'Playstation 4 Silver', 'Sony', 'PS4 Silver', '- Lecteur Blu-Ray 3D avec disque dur de 500 Go / HD avec Wifi\r\n- Modes ou upscaling en HDMI : 480p • 576i • 576p • 720p • 1080i • 1080p\r\n- Affichage des menus en plusieurs langues\r\n- Reconnaissance vocale : vous pouvez utiliser votre voix pour effectuer certaines opérations sur l''écran d''accueil.\r\n- Reconnaissance faciale (caméra optionnelle)\r\n- Paramètres de connexion à PS Vita (Lecture à distance et Fonction Second écran) ', '450.00', 500, 'img/products/ps4-silver.jpg'),
(17, 'Casque Audio Beats by Dre Pro', 'Beats by Dre', 'Pro', '- Des aigus précis et des basses profondes\r\n- Écouteurs pivotants\r\n- Un revêtement résistant et un bandeau rembourré pour de longues heures en studio\r\n- DaisyChain™ avec deux ports audio pour partager ce que vous écoutez\r\n- Répondez aux appels et contrôlez votre musique avec le câble RemoteTalk™*\r\n(*Compatible avec les dispositifs iOS. Les fonctionnalités peuvent varier d''un appareil à l''autre.)\r\n', '400.00', 190, 'img/products/beats-by-dr-dre-.jpg'),
(18, 'Casque Corsair Vengeance 2100', 'Corsair', 'Vengeance 2100', '- Jeux\r\n- Stéréo\r\n- Circum-aural (englobe les oreilles)\r\n- Néodyme de 50 mm\r\n- USB\r\n- Compatible PC', '120.00', 100, 'img/products/corsair-vengeance-2100.jpg'),
(19, 'Philips 65pus9809', 'Philips', '65PUS9809', '- Diagonale 65 pouces\r\n- Définition (pixels) 3840 x 2160 pixels\r\n- Compatibilité HD (1080i/720p) Oui / Oui\r\n- Certification HD Ready Oui', '4400.00', 180, 'img/products/philips-65pus9809.jpg'),
(20, 'Razer Electra', 'Razer', 'Electra', '- Écouteurs haut-parleurs : aimants de 40 mm au néodyme avec bobine vocale en aluminium plaqué cuivre\r\n- Réponse en fréquence : 25 – 16000 Hz\r\n- Impédance: 32 Ω\r\n- Sensibilité à 1 kHz: 104 dB ± 3 dB\r\n- Puissance max. en entrée: 50 mW\r\n- Longueur du câble: Câble en revêtement caoutchouc 1,3 m\r\n- Connecteur: Prise d''écouteurs 3,5 mm plaquée or\r\n- Diamètre intérieur de l''oreillette: 55 mm / 2,16 pouces\r\n- Poids approximatif: 284 g / 0,63 lbs\r\n- Micro -réponse en fréquence: 100 – 10000 Hz\r\n- Rapport signal/bruit : 58 dB\r\n- Sensibilité à 1 kHz: -44 dB ± -4 dB\r\n- Couleur: Noir\r\n- Garantie du fabricant: 2 ans\r\n\r\n', '60.00', 410, 'img/products/razer-electra.JPG'),
(21, 'XBOX ONE', 'Microsoft', 'One', '- CPU : x86 AMD 8 coeurs (1,6 GHz d''après les estimations)\r\n- GPU : 1,23 TFLOPS, a priori proche de l''AMD RADEON 7790\r\n- 8 Go de RAM DDR3 à 68,3 Go/s\r\n- Lecteur Blu-ray (vitesse inconnue)\r\n- Disque dur 500 Go\r\n- USB 3.0 (x3)\r\n- Ethernet Gigabit (10 / 100 / 1000 Mbps)\r\n- Wi-fi 802.11n avec wi-fi Direct\r\n- HDMI\r\n- Sortie optique', '300.00', 250, 'img/products/Xbox-One.png'),
(22, 'Mac Book 2015', 'Apple', 'Mac Book 2015', '-512 Go de stockage flash PCIe intégré1\r\n- Processeur Intel Core M bicœur à 1,2 GHz\r\n- Turbo Boost jusqu’à 2,6 GHz\r\n- 8 Go de mémoire\r\n- Intel HD Graphics 5300\r\n\r\n', '1750.00', 175, 'img/products/macbook-2015.jpg'),
(23, 'Lenovo Yoga 3 Pro', 'Lenovo', 'Yoga 3 Pro', '- Processeur Intel® Core™ M-70 \r\n- Jusqu''à Windows 8.1 \r\n- 300 x 228 x 12,8 mm, 1,19 kg \r\n- Conception à 6 charnières inspirées des bracelets de montre \r\n- Écran IPS 13,3" Quad HD+ (3 200 x 1 800) avec dalle tactile multipoint\r\n- autonomie : Jusqu''à 7,2 heures\r\n- Haut-parleurs JBL® avec certification Waves Audio ', '1250.00', 120, 'img/products/Lenovo-Yoga3pro.jpg'),
(24, 'Panasonic Lumix Fz1000', 'Panasonic', 'Lumix Fz1000', '- Ecran	3 pouces\r\n- Connexions HDMI Wifi\r\n- Résolution de l''appareil photo	20.1\r\n- Fonctions Prises de Vues en Rafale, - Priorité à la vitesse d''obturation, Priorité à l''ouverture\r\n- Type de batterie Lithium Ion', '650.00', 200, 'img/products/panasonic-lumix-fz1000.jpg'),
(25, 'Nikon Coolpix s31', 'Nikon', 'coolpix s31', '- Nombre de pixels 10,1 Millions pixels\r\n- Zoom optique 3\r\n- Taille écran 2,7 "\r\n- Poids net 185\r\n', '130.00', 75, 'img/products/nikon-coolpix-s31.jpg'),
(26, 'Mad Catz Gamesmart M.O.U.S.9', 'Mad Catz', 'Gamestart M.O.U.S.9', 'Interface de l''appareil: Bluetooth\r\nTechnologie de détecteur de mouvement: Laser\r\nConvient pour: jouer\r\n- Couleur: Blanc\r\n- Elément de format: Droitier\r\n- Interface de réception sans fil: USB\r\n- Source d''énergie: Piles\r\n- Type de batterie: AA\r\n- Prise en charge du système d''exploitation Mac: Mac OS X 10.7 Lion, Mac OS X 10.8 Mountain Lion', '65.00', 250, 'img/products/madcatz-m-o-u-s-9.jpg'),
(27, 'MADCATZ Mad Catz V.5', 'Madcatz', 'Mad Catz V.5', '- Clavier rétro éclairé pour des sessions de jeux nocturnes\r\n- Design moderne, précision & réactivité extrême : l’arme parfaite pour déjouer les tactiques de vos adversaires\r\n- Fonction Anti-Ghosting pour des combinaisons de jeu\r\n- Touches programmables via le logiciel Saitek fourni\r\n- Dimensions nettes 50 x 23 x 3 cm\r\n- Dimensions emballées 52 x 25 x 6.3 cm\r\n  ', '50.00', 80, 'img/products/madcatz-clavier.jpg'),
(28, 'Logitech G910-Orion Spark', 'Logitech', 'G910 Orion Spark', '- Hauteur: 505 mm (19.9 in)\r\n- Largeur: 243,5 mm (9.6 in) / 210 mm (8.3 in)\r\n- Épaisseur: 35,5 mm (1.4 in)\r\n- Poids: 1,5 kg (3.3 lb)\r\n- Câble de 1,8 m (6 ft)\r\n- Résistance des touches: jusqu''à 70 millions de frappes', '160.00', 200, 'img/products/g910-orion-spark.png'),
(29, 'Hp Officejet 6600', 'HP', 'Officejet 6600', '- Cartouches d''impression 4 cartouches (noire, cyan, jaune, magenta)\r\n- Interface Réseau WiFi 802.11b/g/n\r\n- Vitesse d''impression texte noir 14 pages/minute\r\n- Vitesse d''impression texte couleur ', '65.00', 95, 'img/products/hp-officejet6600.jpg'),
(30, 'Brother MFC-J650DW', 'Brother', 'MFC-J650DW', '- Cartouches d''impression 4 cartouches (noire, cyan, jaune, magenta)\r\n- Interface Réseau WiFi 802.11b/g/n\r\n- Vitesse d''impression texte noir 12 pages/minute\r\n- Vitesse d''impression texte couleur ', '120.00', 100, 'img/products/Brother-MFC-J650DW.jpg'),
(31, 'Sony Smartwatch 2', 'Sony', 'Smartwatch 2', '- L''extension de votre portable sur une montre élégante et étanche. Personnalisez votre montre avec ses 300 applications disponibles et ses bracelets colorés.\r\n- Contrôle votre musique, vous permet de lire vos SMS, emails, affiche l''heure, duplique votre smartphone sur une montre, et bien d''autres choses grâce à ses nombreuses applications.', '330.00', 120, 'img/products/SonySmartwatch2.jpg'),
(32, 'Asus ZenWatch WI500Q ', 'Asus', 'ZenWatch WI500Q ', '-  Montre à processeur Qualcomm Snapdragon 400 de 1.2 GHz, sous Android Wear. Bluetooth. Commande vocale. Fonctionnalités pour aider l’utilisateur à maintenir un mode de vie sain et à atteindre ses objectifs de fitness personnels.\r\n- Notifications, suggestions, organisation de l’information. Possibilité de couper un appel entrant en couvrant le cadran. Fonction « Find my phone », « Presentation Control ». Possibilité de définir des objectifs d''activité et de les surveiller. Suit et affiche des statistiques liées à la santé: nombre de pas, calories brûlées, fréquence cardiaque, durée des activités, l''intensité d''exercice. Mesure le niveau de relaxation et fournit des conseils. ', '205.00', 200, 'img/products/Asus-ZenWatch-WI500Q .jpg'),
(33, 'WALKERA Quadricoptère QR X800 RTF ', 'Walkera', 'Quadricoptère QR X800 RTF ', '- Type: Drone volant\r\n- Modèle: QR X800 RTF\r\n- Alimentation: Autonome (batterie)\r\n- Portée: 2000 m\r\n- Autonomie: 30 min\r\n- Dimensions: l x h x p 62 x 46 x 62 cm\r\n- Poids net: 3,90 kg', '2800.00', 75, 'img/products/Walkera-drone.jpg'),
(34, 'Drone 3DR Solo ', '3DR\r\n\r\n', 'Solo', '- Type: Drone volant\r\n- Modèle: 3DR Solo\r\n- Alimentation: Autonome (batterie)\r\n- Wi-Fi: Oui\r\n- Caméra: Conçu pour une utilisation avec Go Pro HERO3, 3+ et 4\r\n- Portée: 1000 m\r\n- Autonomie: 25 min\r\n- Hauteur de vol maxi: 125 m\r\n- Dimensions l x h x p 23 x 18.8 x 33 cm\r\n- Poids net: 1,52 kg ', '1280.00', 110, 'img/products/3dr-solo.jpg'),
(35, 'WD MyPasseport', 'Western Digital ', 'MyPasseport 1TO', '- Description du produit: Western Digital - My Passport Essential\r\n- Type de produit: Disque dur externe\r\n- Capacité: 1 To\r\n- Système d''exploitation: Windows 2000/XP/Vista, Mac OS\r\n- Connectivité: USB 2.0\r\n- Facteur de forme: 2,5 pouces\r\n- Vitesse de transfert bus série: 480 Mb/s (Maxi)\r\n- Dimensions: 126.15 mm x 79.5 mm x 15 mm\r\n- Poids: 0.18 Kg\r\n- Garantie du fabricant: 3 ans\r\n- Couleur: Noir\r\n\r\n', '55.00', 320, 'img/products/WD-mypasseport.jpg');

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
