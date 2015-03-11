-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Mars 2015 à 23:10
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
  `miniature1` varchar(255) NOT NULL,
  `miniature2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `libelle`, `description`, `adresse`, `cp`, `ville`, `dateDebut`, `dateFin`, `place`, `image`, `miniature1`, `miniature2`) VALUES
(1, 'Le Yoyo Palais de Tokyo - Smartphones et tablettes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-10-10 19:30:00', '2015-10-11 02:00:00', 350, 'img/salles/yoyo-palais-de-tokyo.jpg', 'img/products/blackberry-q10.jpg', 'img/products/samsung-galaxy-tab.jpg'),
(2, 'Le Départ - Photographie et vidéo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '34-36, rue du Départ', 75015, 'Paris', '2015-10-24 20:00:00', '2015-10-24 23:59:00', 270, 'img/salles/le-depart.jpg', 'img/products/nikon-coolpix-s810.jpg', 'img/products/gopro-hero4.jpg'),
(3, 'Espace Monsieur Bleu  - Audio casques, écouteurs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus.', '13, avenue du Président Wilson', 75116, 'Paris', '2015-11-07 19:30:00', '2015-11-07 23:30:00', 450, 'img/salles/Monsieur-Bleu.jpg', 'img/products/sennheiser-PC350.jpg', 'img/products/ecouteur-beats.jpg'),
(4, 'Les Jardins de Bagatelle - Vente GAMING', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Route de Sèvres à Neuilly', 75116, 'Paris', '2015-09-22 19:00:00', '2015-09-22 23:30:00', 550, 'img/salles/jardin-bagatelle.jpg', 'img/products/souris-gaming.jpg', 'img/products/clavier-gaming.jpg'),
(5, 'DELAVILLE - TV/HIFI', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '34 Boulevard Bonne Nouvelle', 75010, 'Paris', '2015-11-22 15:00:00', '2015-11-22 21:00:00', 250, 'img/salles/delaville.jpg', 'img/products/philips-65pus9809.jpg', 'img/products/Sony-Hifi.jpg'),
(6, 'LOFT ROQUETTE - Consoles/Jeux vidéos', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', '42 rue de la Roquette', 75011, 'Paris', '2015-12-16 20:00:00', '2015-12-17 02:00:00', 475, 'img/salles/loft-roquette.jpg', 'img/products/ps4.jpg', 'img/products/ACU-PS4.jpg'),
(7, 'Péniche 16 - Soirée ASUS/MICROSOFT', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', 'Quai Z Front de Seine', 75016, 'Paris', '2016-01-18 14:00:00', '2016-01-18 19:00:00', 180, 'img/salles/peniche16.jpg', 'img/products/asus-rog.jpg', 'img/products/microsoft-surface-pro-2.jpg'),
(8, 'La Tête dans les nuages - Montres connectées', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '5 boulevard des Italiens', 75002, 'Paris', '2015-10-30 20:30:00', '2015-10-31 00:00:00', 320, 'img/salles/tete-dans-les-nuages.jpg', 'img/products/apple-watch.jpg', 'img/products/montre-samsung.jpg'),
(9, 'Vaux Hall - Ecrans', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '50 Avenue Pierre Mendès France', 75013, 'Paris', '2015-10-23 21:00:00', '2015-10-24 01:30:00', 175, 'img/salles/vaux-hall.jpg', 'img/products/4k-curved.jpg', 'img/products/iiyama-lcd.jpg'),
(10, 'Le Seize Neuf - Stockage / Sauvegarde', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié.', '19 rue de Chateaudun', 75009, 'Paris', '2015-11-02 20:00:00', '2015-11-03 02:00:00', 450, 'img/salles/Le-seize-neuf.jpg', 'img/products/lacieDD.jpg', 'img/products/samsung-ssd.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
