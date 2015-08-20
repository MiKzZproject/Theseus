-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Août 2015 à 20:05
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
  `miniature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `modele`, `description`, `prix`, `stock`, `image`, `miniature`) VALUES
(1, 'Iphone 6', 'Apple', 'Iphone 6 32 Go', 'Ecran 4.7'''' Retina HD - Résolution : 1334x750 - 6.9mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID\r\n', '650.00', 142, 'img/products/iphone6.jpg', 'img/products/thumbnails/iphone6-thumbnail.jpg'),
(2, 'Galaxy S5 ', 'Samsung', 'Galaxy S5 64go', 'Ecran capacitif 5.1'''' Super AMOLED Full HD - Processeur Quad Core 2.5 GHz -Batterie Li-ion 2800 mAh - Mémoire : 16Go - Stockage : 64 Go - Réseau : Wifi/USB 3.0/Bluetooth 4.0/4G - Android KitKat 4.4.2 - Certifié IP67 - Appareil photo : 16MP - Vidéo : Ultra HD - 2160p', '350.00', 22, 'img/products/samsungs5.jpg', 'img/products/thumbnails/samsungs5-thumbnail.jpg'),
(3, 'Iphone 6 plus', 'Apple', 'Iphone 6 plus 32 go', 'Ecran 5.5'''' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE, Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels, flash True Tone et stabilisation optique de l’image - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d’identité par empreinte digitale Touch ID', '800.00', 100, 'img/products/iphone6plus.jpg', 'img/products/thumbnails/iphone6plus-thumbnail.jpg'),
(4, 'Iphone 5', 'Apple', 'Iphone 5 64go', 'Apple Iphone 5 64GO Noir - Iphone - Débloque tout opérateurs - Fourni dans la boite avec tous les accessoires - Système d''exploitation (OS) iOSEcran 4'''' RetinaMémoire intern…Voir la présentation', '300.00', 100, 'img/products/iphone5.jpg', 'img/products/thumbnails/iphone5-thumbnail.jpg'),
(5, 'Samsung UE55HU8500 TV', 'Samsung', 'UE55HU8500 TV 140CM', 'Ecran de 138 cm (55") - 100% UHD/4K\nRétro-éclairage LED Edge incurvé, UHD Micro-Dimming Ultimate\nTechnologie 100Hz (CMR 1200Hz), Smart TV, Quad Core+\nQuad Screen,Technologie 3D Active (2 paires de lunettes fournies)', '2500.00', 15, 'img/products/samsumg-4k-curved.jpg', 'img/products/thumbnails/samsumg-4k-curved-thumbnail.jpg'),
(6, 'ASUS Rog2', 'ASUS', 'ROG', '- Ecran 17 pouces - 1920x1080\n- Stockage et mémoire : disque dur 1000 Go + SSD 256 Go, RAM 32 Go\n Intel Core i7 4720HQ 2.6 Ghz\n- Carte Graphique gaming : Nvidia GeForce GTX980M 4 Go\n- 1 port(s) HDMI; - 4 port(s) USB 3.0; 1 port(s) Ethernet; 1 prise(s) jack\n\n', '2000.00', 50, 'img/products/asus-rog.jpg', 'img/products/thumbnails/asus-rog-thumbnail.jpg'),
(7, 'Apple watch', 'Apple', 'Apple watch', 'C’est l’usage que l’on va faire d’un objet qui devrait déterminer le choix des matériaux dont il sera composé. L’Apple Watch a été conçue pour vous suivre dans toutes vos activités quotidiennes, de votre jogging matinal à vos virées nocturnes. C’est pourquoi nous avons choisi l’acier inoxydable 316L, un alliage raffiné et remarquablement résistant à la corrosion. Nous l’avons ensuite forgé à froid pour le rendre jusqu’à 80 % plus dur. Nous avons également réduit les impuretés pour obtenir un effet miroir. Et l’application d’une couche supplémentaire de carbone diamantin (DLC) donne à l’acier inoxydable cette teinte noir sidéral si caractéristique.', '500.00', 100, 'img/products/apple-watch.jpg', 'img/products/thumbnails/apple-watch-thumbnail.jpg'),
(8, 'Galaxy Gear Fit Noir', 'Samsung', 'Galaxy Gear Fit Noir', 'Processeur : 168Mhz - Ecran 1.84'''' capacitif Super AMOLED Incurvé - Résolution : 128x432 - Batterie : Li-ion 210 mAh - Interface : Gear Fit Manager - Connectivité : Bluetooth 4.0/USB - Messagerie/Appels/E-mails - Applications Health - Poids : 127g - Couleur : noir - Bracelets interchangeables', '80.00', 62, 'img/products/montre-samsung.jpg', 'img/products/thumbnails/montre-samsung-thumbnail.jpg'),
(9, 'Sony KD-65S9000B', 'Sony', 'KD-65S9000B 65 pouce (165cm)', 'KKD-65S9000B est un écran tv de 165cm reposant sur une dalle ultra hd 4k (3840 x 2160 pixels) à rétroéclairage led edge local dimming', '1500.00', 14, 'img/products/sony-kd-65s9000b.jpg', 'img/products/thumbnails/sony-kd-65s9000b-thumbnail.jpg'),
(10, 'Canon Pixma Mx395', 'Canon', 'Pixma Mx395', 'Imprimante couleur à technologie Jet d''encre - Fonctions : imprimante, photocopieur, scanner et télécopieur (fax) - Numérisation vers le Cloud - Compatible Windows 8/RT/7/Vista/XP, Mac OS X v10.6.8 ou version supérieure', '60.00', 150, 'img/products/canon-pixma.jpg', 'img/products/thumbnails/canon-pixma-thumbnail.jpg'),
(11, 'Samsung GalaxyTab 4', 'Samsung', 'GalaxyTab 4', '- Android 4.4 Kit Kat, processeur 1.2 GHz quad-core\r\n- 16 Go de mémoire Flash, 1,5 Go de RAM\r\n- Ecran WXGA Display 1280x800\r\n- Mémoire extensible par port microSD et 50 Go de stockage sur Dropbox\r\n- Batterie longue durée 6800 mAh\r\n\r\n', '215.00', 200, 'img/products/galaxyTab4.jpg', 'img/products/thumbnails/galaxyTab4-thumbnail.jpg'),
(12, 'Microsoft Surface Pro 2', 'Microsoft', 'Surface Pro 2', 'Si la Surface Pro 3 est bel et bien une tablette, cette dernière a été pensée pour pouvoir remplacer intégralement un ordinateur ultraportable traditionnel ! Cette dernière est équipée de la dernière version de Windows 8.1 , Professionnel permettant ainsi d''exécuter n''importe quel programme Windows, comme sur un ordinateur.', '850.00', 320, 'img/products/microsoft-surface-pro-2.jpg', 'img/products/thumbnails/microsoft-surface-pro-2-thumbnail.jpg'),
(13, 'Drone T2M DGX-30 Quadrocoptère', 'T2M', 'DGX-30 Quadrocoptère', 'Seul un paramétrage simple est à effectuer avant la première utilisation. Il ne sera pas nécessaire de le renouveler pour les utilisations suivantes. Le DGX30 est livré avec un support de caméra type GoPro® sur coussins d''air. Ce support est amovible. La caméra n''est pas fournie.\n- La radio 2,4GHz fournie est de type 8 voies (4 principales + 4 auxiliaires). Deux des voies auxiliaires sont dédiées aux modes de vol et deux à l''orientation de l''appareil de prise de vue (gimbal non fourni).\n- Performant, facile à utiliser et abordable, le DGX30 est un remarquable outil de prises de vue aérienne pour l''amateur exigeant.\n- Dimensions : 300x300mm (carrosserie)\n- Diamètre des rotors : 210mm\n- Poids : 880g', '410.00', 90, 'img/products/DGX30.jpg', 'img/products/thumbnails/DGX30-thumbnail.jpg'),
(14, 'Lacie DD Home 2To', 'Lacie', 'DD Home 2TO', '- Type: disque multimedia \r\n- Disque dur ultra compact pour transférer et sauvegarder vos données\r\n- Boîtier en aluminium de 5mm, assurant la sécurité de vos données\r\n- Fiable et élégant, le disque offre une excellente capacité de stockage et une vitesse de transfert ultra rapide\r\n- Interface de connexion: 1 x USB 3.0 (compatible avec USB 2.0)\r\n- Vitesse de transfert des données: 5Go/s USB 3.0 (480Mb/s USB 2.0)\r\n- Dimensions: 120 x 190 x 38 mm', '140.00', 170, 'img/products/lacieDD.jpg', 'img/products/thumbnails/lacieDD-thumbnail.jpg'),
(15, 'BlackBerry Q10', 'BlackBerry', 'Q10', '- 720 x 720 résolution de 330 ppp\r\n- Clavier AZERTY et écran tactile\r\n- Jusqu’à 14.8 jours* d’autonomie en veille\r\n- HD 1080p enregistrement vidéo\r\n- Jusqu’à 13,5 heures* d’autonomie en communication (3G)\r\n- BlackBerry® 10 système d’exploitation\r\nQualcomm® Snapdragon™ Processeur S4\r\n', '600.00', 230, 'img/products/blackberry-q10.jpg', 'img/products/thumbnails/blackberry-q10-thumbnail.jpg'),
(16, 'Playstation 4 Silver', 'Sony', 'PS4 Silver', '- Lecteur Blu-Ray 3D avec disque dur de 500 Go / HD avec Wifi\r\n- Modes ou upscaling en HDMI : 480p • 576i • 576p • 720p • 1080i • 1080p\r\n- Affichage des menus en plusieurs langues\r\n- Reconnaissance vocale : vous pouvez utiliser votre voix pour effectuer certaines opérations sur l''écran d''accueil.\r\n- Reconnaissance faciale (caméra optionnelle)\r\n- Paramètres de connexion à PS Vita (Lecture à distance et Fonction Second écran) ', '450.00', 500, 'img/products/ps4-silver.jpg', 'img/products/thumbnails/ps4-silver-thumbnail.jpg'),
(17, 'Casque Audio Beats by Dre Pro', 'Beats by Dre', 'Pro', '- Des aigus précis et des basses profondes\r\n- Écouteurs pivotants\r\n- Un revêtement résistant et un bandeau rembourré pour de longues heures en studio\r\n- DaisyChain™ avec deux ports audio pour partager ce que vous écoutez\r\n- Répondez aux appels et contrôlez votre musique avec le câble RemoteTalk™*\r\n(*Compatible avec les dispositifs iOS. Les fonctionnalités peuvent varier d''un appareil à l''autre.)\r\n', '400.00', 190, 'img/products/beats-by-dr-dre-.jpg', 'img/products/thumbnails/beats-by-dr-dre-thumbnail.jpg'),
(18, 'Casque Corsair Vengeance 2100', 'Corsair', 'Vengeance 2100', '- Jeux\r\n- Stéréo\r\n- Circum-aural (englobe les oreilles)\r\n- Néodyme de 50 mm\r\n- USB\r\n- Compatible PC', '120.00', 100, 'img/products/corsair-vengeance-2100.jpg', 'img/products/thumbnails/corsair-vengeance-2100-thumbnail.jpg'),
(19, 'Philips 65pus9809', 'Philips', '65PUS9809', '- Diagonale 65 pouces\r\n- Définition (pixels) 3840 x 2160 pixels\r\n- Compatibilité HD (1080i/720p) Oui / Oui\r\n- Certification HD Ready Oui', '4400.00', 180, 'img/products/philips-65pus9809.jpg', 'img/products/thumbnails/philips-65pus9809-thumbnail.jpg'),
(20, 'Razer Electra', 'Razer', 'Electra', '- Écouteurs haut-parleurs : aimants de 40 mm au néodyme avec bobine vocale en aluminium plaqué cuivre\r\n- Réponse en fréquence : 25 – 16000 Hz\r\n- Impédance: 32 Ω\r\n- Sensibilité à 1 kHz: 104 dB ± 3 dB\r\n- Puissance max. en entrée: 50 mW\r\n- Longueur du câble: Câble en revêtement caoutchouc 1,3 m\r\n- Connecteur: Prise d''écouteurs 3,5 mm plaquée or\r\n- Diamètre intérieur de l''oreillette: 55 mm / 2,16 pouces\r\n- Poids approximatif: 284 g / 0,63 lbs\r\n- Micro -réponse en fréquence: 100 – 10000 Hz\r\n- Rapport signal/bruit : 58 dB\r\n- Sensibilité à 1 kHz: -44 dB ± -4 dB\r\n- Couleur: Noir\r\n- Garantie du fabricant: 2 ans\r\n\r\n', '60.00', 410, 'img/products/razer-electra.JPG', 'img/products/thumbnails/razer-electra-thumbnail.jpg'),
(21, 'XBOX ONE', 'Microsoft', 'One', '- CPU : x86 AMD 8 coeurs (1,6 GHz d''après les estimations)\r\n- GPU : 1,23 TFLOPS, a priori proche de l''AMD RADEON 7790\r\n- 8 Go de RAM DDR3 à 68,3 Go/s\r\n- Lecteur Blu-ray (vitesse inconnue)\r\n- Disque dur 500 Go\r\n- USB 3.0 (x3)\r\n- Ethernet Gigabit (10 / 100 / 1000 Mbps)\r\n- Wi-fi 802.11n avec wi-fi Direct\r\n- HDMI\r\n- Sortie optique', '300.00', 250, 'img/products/Xbox-One.jpg', 'img/products/thumbnails/Xbox-One-thumbnail.jpg'),
(22, 'Mac Book 2015', 'Apple', 'Mac Book 2015', '-512 Go de stockage flash PCIe intégré1\r\n- Processeur Intel Core M bicœur à 1,2 GHz\r\n- Turbo Boost jusqu’à 2,6 GHz\r\n- 8 Go de mémoire\r\n- Intel HD Graphics 5300\r\n\r\n', '1750.00', 175, 'img/products/macbook-2015.jpg', 'img/products/thumbnails/macbook-2015-thumbnail.jpg'),
(23, 'Lenovo Yoga 3 Pro', 'Lenovo', 'Yoga 3 Pro', '- Processeur Intel® Core™ M-70 \r\n- Jusqu''à Windows 8.1 \r\n- 300 x 228 x 12,8 mm, 1,19 kg \r\n- Conception à 6 charnières inspirées des bracelets de montre \r\n- Écran IPS 13,3" Quad HD+ (3 200 x 1 800) avec dalle tactile multipoint\r\n- autonomie : Jusqu''à 7,2 heures\r\n- Haut-parleurs JBL® avec certification Waves Audio ', '1250.00', 120, 'img/products/Lenovo-Yoga3pro.jpg', 'img/products/thumbnails/Lenovo-Yoga3pro-thumbnail.jpg'),
(24, 'Panasonic Lumix Fz1000', 'Panasonic', 'Lumix Fz1000', '- Ecran	3 pouces\r\n- Connexions HDMI Wifi\r\n- Résolution de l''appareil photo	20.1\r\n- Fonctions Prises de Vues en Rafale, - Priorité à la vitesse d''obturation, Priorité à l''ouverture\r\n- Type de batterie Lithium Ion', '650.00', 200, 'img/products/panasonic-lumix-fz1000.jpg', 'img/products/thumbnails/panasonic-lumix-fz1000-thumbnail.jpg'),
(25, 'Nikon Coolpix s31', 'Nikon', 'coolpix s31', '- Nombre de pixels 10,1 Millions pixels\r\n- Zoom optique 3\r\n- Taille écran 2,7 "\r\n- Poids net 185\r\n', '130.00', 75, 'img/products/nikon-coolpix-s31.jpg', 'img/products/thumbnails/nikon-coolpix-s31-thumbnail.jpg'),
(26, 'Mad Catz Gamesmart M.O.U.S.9', 'Mad Catz', 'Gamestart M.O.U.S.9', 'Interface de l''appareil: Bluetooth\r\nTechnologie de détecteur de mouvement: Laser\r\nConvient pour: jouer\r\n- Couleur: Blanc\r\n- Elément de format: Droitier\r\n- Interface de réception sans fil: USB\r\n- Source d''énergie: Piles\r\n- Type de batterie: AA\r\n- Prise en charge du système d''exploitation Mac: Mac OS X 10.7 Lion, Mac OS X 10.8 Mountain Lion', '65.00', 250, 'img/products/madcatz-m-o-u-s-9.jpg', 'img/products/thumbnails/madcatz-m-o-u-s-9-thumbnail.jpg'),
(27, 'MADCATZ Mad Catz V.5', 'Madcatz', 'Mad Catz V.5', '- Clavier rétro éclairé pour des sessions de jeux nocturnes\r\n- Design moderne, précision & réactivité extrême : l’arme parfaite pour déjouer les tactiques de vos adversaires\r\n- Fonction Anti-Ghosting pour des combinaisons de jeu\r\n- Touches programmables via le logiciel Saitek fourni\r\n- Dimensions nettes 50 x 23 x 3 cm\r\n- Dimensions emballées 52 x 25 x 6.3 cm\r\n  ', '50.00', 80, 'img/products/madcatz-clavier.jpg', 'img/products/thumbnails/madcatz-clavier-thumbnail.jpg'),
(28, 'Logitech G910-Orion Spark', 'Logitech', 'G910 Orion Spark', '- Hauteur: 505 mm (19.9 in)\r\n- Largeur: 243,5 mm (9.6 in) / 210 mm (8.3 in)\r\n- Épaisseur: 35,5 mm (1.4 in)\r\n- Poids: 1,5 kg (3.3 lb)\r\n- Câble de 1,8 m (6 ft)\r\n- Résistance des touches: jusqu''à 70 millions de frappes', '160.00', 200, 'img/products/g910-orion-spark.png', 'img/products/thumbnails/g910-orion-spark-thumbnail.png'),
(29, 'Hp Officejet 6600', 'HP', 'Officejet 6600', '- Cartouches d''impression 4 cartouches (noire, cyan, jaune, magenta)\r\n- Interface Réseau WiFi 802.11b/g/n\r\n- Vitesse d''impression texte noir 14 pages/minute\r\n- Vitesse d''impression texte couleur ', '65.00', 95, 'img/products/hp-officejet6600.jpg', 'img/products/thumbnails/hp-officejet6600-thumbnail.jpg'),
(30, 'Brother MFC-J650DW', 'Brother', 'MFC-J650DW', '- Cartouches d''impression 4 cartouches (noire, cyan, jaune, magenta)\r\n- Interface Réseau WiFi 802.11b/g/n\r\n- Vitesse d''impression texte noir 12 pages/minute\r\n- Vitesse d''impression texte couleur ', '120.00', 100, 'img/products/Brother-MFC-J650DW.jpg', 'img/products/thumbnails/Brother-MFC-J650DW-thumbnail.jpg'),
(31, 'Sony Smartwatch 2', 'Sony', 'Smartwatch 2', '- L''extension de votre portable sur une montre élégante et étanche. Personnalisez votre montre avec ses 300 applications disponibles et ses bracelets colorés.\r\n- Contrôle votre musique, vous permet de lire vos SMS, emails, affiche l''heure, duplique votre smartphone sur une montre, et bien d''autres choses grâce à ses nombreuses applications.', '330.00', 120, 'img/products/SonySmartwatch2.jpg', 'img/products/thumbnails/SonySmartwatch2-thumbnail.jpg'),
(32, 'Asus ZenWatch WI500Q ', 'Asus', 'ZenWatch WI500Q ', '-  Montre à processeur Qualcomm Snapdragon 400 de 1.2 GHz, sous Android Wear. Bluetooth. Commande vocale. Fonctionnalités pour aider l’utilisateur à maintenir un mode de vie sain et à atteindre ses objectifs de fitness personnels.\r\n- Notifications, suggestions, organisation de l’information. Possibilité de couper un appel entrant en couvrant le cadran. Fonction « Find my phone », « Presentation Control ». Possibilité de définir des objectifs d''activité et de les surveiller. Suit et affiche des statistiques liées à la santé: nombre de pas, calories brûlées, fréquence cardiaque, durée des activités, l''intensité d''exercice. Mesure le niveau de relaxation et fournit des conseils. ', '205.00', 200, 'img/products/Asus-ZenWatch-WI500Q .jpg', 'img/products/thumbnails/Asus-ZenWatch-WI500Q-thumbnail.jpg'),
(33, 'WALKERA Quadricoptère QR X800 RTF ', 'Walkera', 'Quadricoptère QR X800 RTF ', '- Type: Drone volant\r\n- Modèle: QR X800 RTF\r\n- Alimentation: Autonome (batterie)\r\n- Portée: 2000 m\r\n- Autonomie: 30 min\r\n- Dimensions: l x h x p 62 x 46 x 62 cm\r\n- Poids net: 3,90 kg', '2800.00', 75, 'img/products/Walkera-drone.jpg', 'img/products/thumbnails/Walkera-drone-thumbnail.jpg'),
(34, 'Drone 3DR Solo ', '3DR\r\n\r\n', 'Solo', '- Type: Drone volant\r\n- Modèle: 3DR Solo\r\n- Alimentation: Autonome (batterie)\r\n- Wi-Fi: Oui\r\n- Caméra: Conçu pour une utilisation avec Go Pro HERO3, 3+ et 4\r\n- Portée: 1000 m\r\n- Autonomie: 25 min\r\n- Hauteur de vol maxi: 125 m\r\n- Dimensions l x h x p 23 x 18.8 x 33 cm\r\n- Poids net: 1,52 kg ', '1280.00', 110, 'img/products/3dr-solo.jpg', 'img/products/thumbnails/3dr-solo-thumbnail.jpg'),
(35, 'WD MyPasseport', 'Western Digital ', 'MyPasseport 1TO', '- Description du produit: Western Digital - My Passport Essential\r\n- Type de produit: Disque dur externe\r\n- Capacité: 1 To\r\n- Système d''exploitation: Windows 2000/XP/Vista, Mac OS\r\n- Connectivité: USB 2.0\r\n- Facteur de forme: 2,5 pouces\r\n- Vitesse de transfert bus série: 480 Mb/s (Maxi)\r\n- Dimensions: 126.15 mm x 79.5 mm x 15 mm\r\n- Poids: 0.18 Kg\r\n- Garantie du fabricant: 3 ans\r\n- Couleur: Noir\r\n\r\n', '55.00', 320, 'img/products/WD-mypasseport.jpg', 'img/products/thumbnails/WD-mypasseport-thumbnail.jpg'),
(36, 'Wii U', 'Nitendo', 'nitendo Wii U 2015', 'Contient 1 console Wii U avec mémoire flash interne de 32 Go + 1 Gamepad + 1 stylet Gamepad + 1 station de recharge Gamepad + 1 support Gamepad + 1 support console + 1 bloc d''alimentation Wii U + 1 bloc d''alimentation Gamepad + 1 câble HDMI 1.5m + 1 capteur Wii + le jeu Nintendo Land', '240.00', 3550, 'img/products/WiiU.png', 'img/products/thumbnails/WiiU-thumbnail.png'),
(37, 'LG-55EC', 'LG', '55EC', 'Le TV 55EC930V par LG propose une expérience inédite en terme de design et de couleur dans un écran incurvé d''exception!\r\nContrairement aux LED (diodes électroluminescentes) traditionnelles, l’OLED utilise une substance organique qui s’illumine en présence d’un courant électrique. Cette nouvelle technologie permet de réduire considérablement l’épaisseur et le poids du téléviseur. La lumière traverse une combinaison de filtres pour reproduire des images spectaculaires en haute définition.', '2900.00', 240, 'img/products/LG55EC.jpg', 'img/products/thumbnails/LG55EC-thumbnail.jpg'),
(38, 'Samsung-UE55JU', 'Samsung', 'UE55JU', 'Samsung UE55JU7500T. Taille de l''écran: 139,7 cm (55"), Type HD: 4K Ultra HD, Résolution de l''écran: 3840 x 2160 pixels. Type de syntonaiseur: Analogique & Numérique, Format du système de signal numérique: DVB-C, DVB-S2, DVB-T2. Puissance évaluée de RMS: 40W, Technologies Dolby: Dolby Digital Plus, DTS Premium Sound 5.1, DTS Studio Sound. Contrôle d''électronique grand publique (CEC): Anynet+. Standards wifi: 802.11ac ', '1980.00', 190, 'img/products/samsung-ue55ju.jpg', 'img/products/thumbnails/samsung-ue55ju-thumbnail.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
