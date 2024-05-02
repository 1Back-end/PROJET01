-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 29 avr. 2024 à 09:08
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `location_bien`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID_COMMENTAIRE` int(10) NOT NULL,
  `ID_PRODUIT` int(10) DEFAULT NULL,
  `COMMENTAIRE` varchar(200) DEFAULT NULL,
  `DATE_AJOUT` timestamp NOT NULL DEFAULT current_timestamp(),
  `DATE_MODIFICATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `MOIS_ACTUEL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID_COMMENTAIRE`, `ID_PRODUIT`, `COMMENTAIRE`, `DATE_AJOUT`, `DATE_MODIFICATION`, `MOIS_ACTUEL`) VALUES
(7, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae deleniti laudantium delectus sed expedita culpa porro tempore facere aspernatur consequuntur quia facilis dignissimos nam sit, beatae ass', '2024-04-15 17:09:43', '2024-04-15 17:09:43', ''),
(8, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae deleniti laudantium delectus sed expedita culpa porro tempore facere aspernatur consequuntur quia facilis dignissimos nam sit, beatae ass', '2024-04-15 17:10:20', '2024-04-15 17:10:20', ''),
(9, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium iusto earum fuga ad laborum hic. Amet ad iusto numquam voluptatum molestias! Nobis, neque? Vel voluptatem recusandae veniam animi di', '2024-04-15 21:07:38', '2024-04-15 21:07:38', '');

-- --------------------------------------------------------

--
-- Structure de la table `mot_de_pass_oublie`
--

CREATE TABLE `mot_de_pass_oublie` (
  `ID` int(11) NOT NULL,
  `ID_UTILISATEUR` int(10) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `DATE_ENVOIE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MOIS_ACTUEL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `arrondissement` varchar(255) DEFAULT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type_logement` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `distance` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `proprietaire_id` int(10) DEFAULT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MOIS_ACTUEL` varchar(20) NOT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  `STATUS` enum('Present','Supprimé') DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `region`, `ville`, `departement`, `arrondissement`, `quartier`, `prix`, `photo`, `type_logement`, `description`, `statut`, `code`, `distance`, `destination`, `proprietaire_id`, `date_ajout`, `date_modification`, `MOIS_ACTUEL`, `DELETED_AT`, `STATUS`) VALUES
(1, 'Centre', 'Yaoundé', 'Lekié', 'Lobo (Cameroun)', 'Carriere', 25000, '../uploads/home-1.jpg,../uploads/home-2.jpg,../uploads/home-3.jpg', 'Chambre Moderne', 'Chambre à Yaoundé, située à 200 mètres de la route principale. La chambre est bien carrelée et offre un espace confortable. Elle est idéale pour une personne seule ou un couple. L\'environnement est calme et propice à la détente. Proche des commodités et facilement accessible. Parfait pour ceux qui recherchent un logement pratique et confortable à Yaoundé.', 'Accepté', '5G7F2A9H', '100', '2 Km', 16, '2024-03-26 10:48:26', '2024-04-17 11:04:18', 'Avril', NULL, 'Present'),
(3, 'Centre', 'Damas', 'Lekié', 'Okola', 'Mbankolo', 250000, 'carousel-1.jpg,carousel-2.jpg', 'Chambre Moderne', 'Chambre à Yaoundé, située à 200 mètres de la route principale. La chambre est bien carrelée et offre un espace confortable. Elle est idéale pour une personne seule ou un couple. L\'environnement est calme et propice à la détente. Proche des commodités et facilement accessible. Parfait pour ceux qui recherchent un logement pratique et confortable à Yaoundé\r\n', 'Accepté', 'P4J8K3D6', '500', '500 M', 1, '2024-03-26 12:35:04', '2024-04-17 11:04:11', 'Avril', NULL, 'Present'),
(4, 'Sud', 'Makoua', 'Wouri', 'Sa\'a (Cameroun)', 'Sangmelima', 35000, 'image1.jpg,image2.jpg,image3.jpg', 'Chambre Moderne', 'Charmante chambre climatisée à Sangmélima, offrant un havre de fraîcheur et de tranquillité. Idéale pour se ressourcer, cette chambre confortable est nichée dans un quartier paisible de la ville. À seulement 35 000 FCFA par mois, elle offre un excellent rapport qualité-prix pour un séjour agréable à Sangmélima', 'Accepté', ' M6N8Z4L2', '200', '2 Km', 8, '2024-03-26 15:17:15', '2024-04-17 11:04:25', 'Avril', NULL, 'Present'),
(5, 'Littoral', 'Yambassa', 'Dja-et-Lobo', 'Elig-Mfomo', 'Littoral', 150000, 'IMG-20240412-WA0131.jpg', 'Chambre Moderne', 'Une chambre charmant et fonctionnel situé au cœur de la ville, offrant une pièce lumineuse et bien agencée, une kitchenette équipée, une salle de bain moderne, le tout pour un prix attractif de 150 000 FRCFA. Idéal pour les étudiants, les jeunes professionnels ou comme investissement locatif', 'Accepté', 'D974C2BC', '300', '3 Km', 19, '2024-03-26 18:38:50', '2024-04-19 15:29:47', 'Avril', NULL, 'Present'),
(6, 'Extrême-Nord', 'Mora', 'Logone-et-Chari', 'Blangoua', 'Mora', 17000, 'IMG-20240412-WA0131.jpg', 'Duplex', 'Un appartement de 170 000 milles carrés est un logement spacieux offrant amplement d\'espace pour la vie et le confort. Avec plusieurs chambres et salles de bains, il offre des espaces dédiés pour la vie en famille et la convivialité. Les vastes fenêtres laissent entrer beaucoup de lumière naturelle, illuminant les intérieurs et offrant une vue pittoresque sur les environs. Les commodités modernes et les finitions haut de gamme ajoutent une touche de luxe à cet appartement, offrant un style de vie sophistiqué et pratique. Situé dans un quartier recherché, il offre un accès facile aux commodités locales et aux attractions de la ville, offrant un équilibre parfait entre tranquillité et vie urbaine dynamique.', 'Rejeté', '07DB30A8', '500', '100 M', 19, '2024-03-27 17:56:19', '2024-04-19 15:26:34', 'Avril', NULL, 'Present'),
(7, 'Centre', 'Yaoundé', 'Mfoundi', 'Okola', 'Cité verte', 270000, 'IMG-20240328-WA0015.jpg,IMG-20240328-WA0016.jpg,IMG-20240328-WA0018.jpg,IMG-20240328-WA0019.jpg,IMG-20240328-WA0020.jpg,IMG-20240328-WA0021.jpg,IMG-20240328-WA0024.jpg,IMG-20240328-WA0027.jpg', 'Appartement Moderne', 'Appartement très confortable, situé en bordure de route, offrant un cadre de vie agréable. Ce logement spacieux comprend un vaste salon idéal pour recevoir, trois chambres à coucher offrant intimité et confort, trois salles de bains pour plus de commodité, une grande cuisine équipée pour préparer de délicieux repas en famille, une buanderie pour plus de praticité, un parking pour vos véhicules, ainsi qu\'un gardien disponible 24 heures sur 24 pour assurer la sécurité des lieux. De plus, un forage est disponible pour l\'approvisionnement en eau. Cette propriété offre un excellent rapport qualité-prix avec un prix moyen de 270 000 francs.', 'Rejeté', 'A76C8712', '300', '150 M', 17, '2024-03-28 12:17:05', '2024-04-17 11:04:45', 'Avril', '2024-04-13 17:02:47', 'Supprimé'),
(8, 'Centre', 'Douala', 'Nyong-et-Kellé', 'Atok (Cameroun)', 'Logpom', 80000, 'WhatsApp Image 2024-03-28 à 13.26.46_cf3f2c19.jpg,WhatsApp Image 2024-03-28 à 13.26.46_f721bcd0.jpg,WhatsApp Image 2024-03-28 à 13.26.47_5a2dfb94.jpg,WhatsApp Image 2024-03-28 à 13.26.47_7403b44f.jpg,WhatsApp Image 2024-03-28 à 13.26.47_ed63e1f5.jpg,Whats', 'Studio Moderne', 'Studio moderne situé au rez-de-chaussée à Logpom, au Troisième, offrant un cadre de vie confortable. Ce studio comprend un salon spacieux pour vos moments de détente, une cuisine fonctionnelle équipée pour préparer vos repas, une salle de bains pour votre confort quotidien, et une véranda personnelle pour profiter de l\'extérieur en toute intimité. De plus, vous bénéficiez d\'un parking sécurisé pour garer votre véhicule en toute tranquillité. L\'eau est disponible via un forage, assurant un approvisionnement constant. Les frais d\'entrée sont de 150 F et de 100 F pour la sortie', 'Accepté', '528D7715', '200', '200 M', 11, '2024-03-28 12:33:33', '2024-04-17 11:05:18', 'Avril', '2024-04-11 08:07:22', 'Supprimé'),
(9, 'Extrême-Nord', 'Toubourou', 'Mayo-Banyo', 'Batchenga', 'Cité verte', 250000, 'WhatsApp Image 2024-03-28 à 13.26.46_f721bcd0.jpg,WhatsApp Image 2024-03-28 à 13.26.47_5a2dfb94.jpg,WhatsApp Image 2024-03-28 à 13.26.47_7403b44f.jpg,WhatsApp Image 2024-03-28 à 13.26.47_ed63e1f5.jpg', 'Chambre Moderne', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eveniet asperiores voluptate voluptatem vitae, illo adipisci facere sint quaerat perspiciatis dolore. Facere iusto atque eos harum et tempora. Recusandae, possimus?', 'Accepté', '54356BD8', '200', '300 M', 4, '2024-03-30 13:27:24', '2024-04-17 11:05:26', 'Avril', '2024-04-11 08:08:34', 'Supprimé'),
(12, 'Sud', 'Sangmelima', 'Nyong-et-Kellé', 'Yoko (Cameroun)', 'Mbankolo', 75000, 'image1.jpg,image2.jpg,image3.jpg,image4.jpg', 'Chambre Moderne', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum officia laborum sed! Aliquam nostrum architecto blanditiis in, totam quia officiis rem fugit voluptatibus, perferendis repellat magni numquam. Omnis, consequatur vero?\r\nEos, possimus. Atque laudantium, quod beatae velit, aut accusamus repudiandae molestias soluta pariatur autem suscipit labore iste nam earum ipsa laboriosam. Quibusdam quia rem atque, saepe ratione ipsam magni modi?', 'Accepté', '597A94A7', '200', ' 150 M', 13, '2024-04-15 10:33:09', '2024-04-17 11:05:35', '', NULL, 'Present'),
(13, 'Ouest', 'Makoua', 'Nyong-et-Mfoumou', 'Hina (Cameroun)', 'EKIE', 10000, 'images.jpeg,images.jpeg2.jpeg,images.jpeg3.jpeg,images.jpeg4.jpeg', 'Chambre Moderne', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore cum, exercitationem id dolorum eligendi expedita aliquam deleniti dolor voluptas, saepe ut, cumque obcaecati! Animi consectetur laboriosam culpa harum natus exercitationem!\r\nVoluptatibus eveniet accusamus animi obcaecati corrupti amet modi doloremque laborum, cupiditate adipisci dolor alias dolores aut quia rerum hic illo odio facilis? Eligendi quisquam accusantium quod, doloremque quia ducimus reiciendis.', 'Accepté', 'A85B3A45', '500', '250 M', 8, '2024-04-15 13:33:51', '2024-04-17 11:05:45', '', NULL, 'Present'),
(14, 'Centre', 'Soa', 'Lekié', 'Soa (Cameroun)', 'Cité verte', 28000, 'images.jpeg,images.jpeg1.jpeg,images.jpeg2.jpeg,images.jpeg3.jpeg,images.jpeg4.jpeg,images.jpeg6.jpeg', 'Studio Moderne', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore cum, exercitationem id dolorum eligendi expedita aliquam deleniti dolor voluptas, saepe ut, cumque obcaecati! Animi consectetur laboriosam culpa harum natus exercitationem!\r\nVoluptatibus eveniet accusamus animi obcaecati corrupti amet modi doloremque laborum, cupiditate adipisci dolor alias dolores aut quia rerum hic illo odio facilis? Eligendi quisquam accusantium quod, doloremque quia ducimus reiciendis.', 'Accepté', 'C81D6B14', '150', '170 M', 15, '2024-04-15 13:45:54', '2024-04-17 11:06:32', '', NULL, 'Present'),
(15, 'Sud', 'Sangmelima', 'Haute-Sanaga', 'Abong-Mbang', 'Sangmelima', 195000, 'studio1.jpeg,studio2.jpg,studio3.jpg,studio4.jpg,studio5.jpg,studio6.jpeg', 'Studio Moderne', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore cum, exercitationem id dolorum eligendi expedita aliquam deleniti dolor voluptas, saepe ut, cumque obcaecati! Animi consectetur laboriosam culpa harum natus exercitationem!\r\nVoluptatibus eveniet accusamus animi obcaecati corrupti amet modi doloremque laborum, cupiditate adipisci dolor alias dolores aut quia rerum hic illo odio facilis? Eligendi quisquam accusantium quod, doloremque quia ducimus reiciendis.', 'Accepté', 'AD74D0BB', '250', '100 M', 13, '2024-04-15 13:57:44', '2024-04-17 11:06:21', '', NULL, 'Present'),
(16, 'Extrême-Nord', 'Mora', 'Menchum', 'Batchenga', 'Cité verte', 175000, 'S001.jpg,S002.jpg,S003.jpg,S004.jpg,S005.jpg,S006.jpg', 'Studio Moderne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec nisi euismod, interdum metus nec, consectetur justo. Quisque eu ex non tortor ultricies cursus. Vestibulum scelerisque dui vel velit vehicula, sed placerat ipsum interdum. Quisque nec arcu id sapien tincidunt vehicula. Nunc venenatis risus et lorem luctus vehicula. Integer vel tincidunt purus. Ut faucibus, dui at molestie ultricies, eros nulla tincidunt justo, ut egestas purus eros nec tortor.', 'Accepté', 'D850900A', '150', '10 M', 16, '2024-04-15 14:19:07', '2024-04-17 11:06:15', '', NULL, 'Present'),
(17, 'Ouest ', 'Douala', 'Nyong-et-Kellé', 'Yoko (Cameroun)', 'Mbankolo', 25000, 'A001.jpg,A002.jpg,A003.jpg,A004.jpeg,A005.jpeg,A006.jpg', 'Studio Moderne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec nisi euismod, interdum metus nec, consectetur justo. Quisque eu ex non tortor ultricies cursus. Vestibulum scelerisque dui vel velit vehicula, sed placerat ipsum interdum. Quisque nec arcu id sapien tincidunt vehicula. Nunc venenatis risus et lorem luctus vehicula. Integer vel tincidunt purus. Ut faucibus, dui at molestie ultricies, eros nulla tincidunt justo, ut egestas purus eros nec tortor.', 'Accepté', 'CA9A9875', '150', '100 M', 19, '2024-04-15 14:24:42', '2024-04-19 15:22:03', '', NULL, 'Present'),
(18, 'Centre', 'Yaoundé', 'Mfoundi', 'Elig-Mfomo', 'Cité verte', 25000, 'A001.jpg,A002.jpg,A003.jpg,A004.jpeg', 'Chambre Moderne', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim velit rem eius voluptate culpa blanditiis quis officia vel, commodi doloremque totam repellendus rerum vero, ipsam minus possimus porro quo et.\r\nOdio labore culpa voluptas facilis delectus, dignissimos numquam corrupti vero ut, sint, cupiditate reprehenderit quos enim suscipit incidunt magni dolorem modi dolore? Pariatur commodi dolores illo fuga dolorem in modi?', 'Rejeté', '51CCBB57', '150', '2 Km', 18, '2024-04-15 16:16:23', '2024-04-17 11:06:01', '', NULL, 'Present'),
(19, 'Centre', 'Yaoundé', 'Mfoundi', 'Obala (Cameroun)', 'Carriere', 15000, 'IMG-20240412-WA0123.jpg', 'Chambre Moderne', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis quaerat quod in sequi ipsam repellat vitae, totam expedita, temporibus placeat quo iure assumenda pariatur veritatis deleniti? Accusamus pariatur eum praesentium?\r\nHarum aspernatur quae magni natus sapiente sequi voluptatibus aut quo doloremque nobis earum quidem impedit, minima, perspiciatis blanditiis. Velit ad aut eius deleniti eum nemo quam, adipisci molestiae minima animi.', 'Rejeté', '06C91946', '150', '300 M', 19, '2024-04-15 16:25:33', '2024-04-19 15:31:02', '', NULL, 'Present'),
(20, 'Centre', 'Yaoundé', 'Logone-et-Chari', 'Atok (Cameroun)', 'Cité verte', 20000, 'A001.jpg,A002.jpg,A003.jpg,A004.jpeg,A005.jpeg,A006.jpg,A007.jpg,images.jpeg', 'Appartement Moderne', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat tenetur fugiat animi asperiores reiciendis dicta saepe nihil, cumque facilis impedit iure rerum molestiae incidunt dolorem provident doloribus? Magni, tempora accusantium.\r\nSit, ut voluptates iusto autem repellendus nobis explicabo perferendis quasi tempora? Magnam ab a ad, harum iusto, impedit commodi eveniet aspernatur sed nihil adipisci quasi esse ratione, provident delectus doloremque.\r\nTotam, perferendis. Nisi, tempore fugiat sed eligendi repellendus optio incidunt ea, perferendis maiores porro iste id libero quos temporibus suscipit amet neque. Temporibus hic, quo voluptate at commodi ipsum consectetur!', 'Rejeté', 'DC27138D', '150', '2 kM', 19, '2024-04-15 17:52:33', '2024-04-17 18:21:33', '', NULL, 'Present'),
(21, 'Sud', 'Bangem', 'Djérem', 'Abong-Mbang', 'Bonaberi', 25000, 'boxed-layout.jpg,compact-menu.jpg,dark-sidebar.jpg,horizontal-menu-light.jpg', 'Chambre Moderne', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eaque saepe, soluta vitae, voluptatibus perspiciatis nulla adipisci totam sunt, laboriosam quis accusamus repellendus fuga. Aliquam molestias vitae quo distinctio eligendi!\r\nSit, vel at, adipisci ducimus eius nesciunt sapiente quis corrupti impedit, esse debitis repudiandae! Harum, maiores omnis itaque sed unde corporis obcaecati aperiam officiis alias veritatis esse voluptates voluptatibus natus!\r\nPlaceat unde dolor ut magnam ratione quasi, minima qui, dolore quia fugiat reiciendis sit sapiente sed a. Quibusdam dolor magnam natus, ipsa suscipit aliquam, non ad illo dicta, rem adipisci?', 'En attente', 'C1558938', '150', '400 M', 19, '2024-04-17 18:25:09', '2024-04-26 09:17:42', '', NULL, 'Present'),
(22, 'Centre', 'Yaoundé ', 'Mfoundi', 'Akonolinga', 'Mbankomo', 3000, '271197df-e03d-49ff-927d-b3a964463250.jpeg,1b12d143-dd53-4b76-ad6e-907672ae4d0e.jpeg,IMG_0078.jpeg,IMG_0077.jpeg,IMG_0076.jpeg,IMG_0074.jpeg,IMG_0073.jpeg,IMG_0075.jpeg', 'Appartement Moderne', 'Très cool ', 'Accepté', '3077093A', '200', '2km', 23, '2024-04-22 12:45:29', '2024-04-22 12:46:30', '', NULL, 'Present');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `interesse` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_ajout` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statut` varchar(20) NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `interesse`, `email`, `telephone`, `produit_id`, `proprietaire_id`, `date_reservation`, `date_ajout`, `date_modification`, `statut`) VALUES
(1, 'Chouchou', 'lecrautefrocu-9718@yopmail.com', '+234 366 0198616', 4, 8, '2024-04-18 18:50:45', '2024-04-18 18:50:45', '2024-04-25 08:57:11', 'en cours'),
(2, 'Paul Messanga', 'tigissoinica-5736@yopmail.com', '+7 (835) 826-93-28', 1, 16, '2024-04-19 07:52:45', '2024-04-19 07:52:45', '2024-04-25 08:56:54', 'en cours'),
(3, 'William ', 'lukafrupuffu-6772@yopmail.com', '+33 8635186477', 5, 6, '2024-04-19 09:47:38', '2024-04-19 09:47:38', '2024-04-26 14:38:46', 'annulé'),
(4, 'Alphonse Wilfried', 'faffauyaunneise-9973@yopmail.com', '+49 8064 80700146', 4, 8, '2024-04-19 09:56:07', '2024-04-19 09:56:07', '2024-04-26 17:11:32', 'annulé'),
(5, 'Karim 🦄👨‍💻', 'sarafreitteuco-5474@yopmail.com', '+1 (843) 503-6617', 3, NULL, '2024-04-22 12:48:31', '2024-04-22 12:48:31', '2024-04-26 17:16:23', 'annulé'),
(6, 'ramses ndame', 'wusetriffouku-4927@yopmail.com', '+1 (922) 132-8534', 4, 8, '2024-04-23 09:47:00', '2024-04-23 09:47:00', '2024-04-26 14:43:54', 'en cours'),
(7, 'Francois', 'frapougonoffe-6497@yopmail.com', '+237652145678', 14, 15, '2024-04-25 08:45:58', '2024-04-25 08:45:58', '2024-04-26 14:43:45', 'en cours'),
(8, 'wagoutrohefa', 'wagoutrohefa-3921@yopmail.com', '+237', 15, 13, '2024-04-27 11:12:12', '2024-04-27 11:12:12', '2024-04-27 11:15:20', 'annulé');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(10) NOT NULL,
  `TOKEN` varchar(100) DEFAULT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `PHOTO` varchar(200) DEFAULT NULL,
  `CODE` int(9) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `VILLE` varchar(200) DEFAULT NULL,
  `QUARTIER` varchar(200) DEFAULT NULL,
  `ROLE` varchar(200) DEFAULT NULL,
  `DATE_CREATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `DATE_MODIFICATION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MOIS_ACTUEL` varchar(20) NOT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  `STATUT` enum('Present','Supprimé') DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `TOKEN`, `NOM`, `PRENOM`, `EMAIL`, `TELEPHONE`, `PASSWORD`, `PHOTO`, `CODE`, `STATUS`, `VILLE`, `QUARTIER`, `ROLE`, `DATE_CREATION`, `DATE_MODIFICATION`, `MOIS_ACTUEL`, `DELETED_AT`, `STATUT`) VALUES
(3, 'U54321', 'quabragrettaza', '', 'quabragrettaza-5725@yopmail.com', '+2376785360', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1640717540701.jpg', 0, 'Actif', 'Yaoundé', 'Cité verte', '4', '2024-04-05 15:35:25', '2024-04-16 17:45:42', 'Avril', '2024-04-11 07:34:21', 'Supprimé'),
(4, 'U09876', 'Alain', '', 'dimitrilaram@yahoo.com', '+2376785360', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1663762741850.jpg', 4395, 'Inactif', 'Dubai', 'Cité verte', '2', '2024-04-03 18:55:59', '2024-04-12 20:07:01', 'Avril', '2024-04-12 20:07:01', 'Supprimé'),
(5, 'U56789', 'Ramzy', '', 'Ramzy23@gmail.com', '+2376785360', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1684164156809.jpg', 7587, 'Inactif', 'Yaoundé', 'Damas', '1', '2024-04-06 09:26:05', '2024-04-17 07:52:00', 'Avril', '2024-04-17 07:52:00', 'Supprimé'),
(6, 'U43210', 'Ramatou', '', 'pamchuchuramatou@gmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1684160365362.jpg', 0, 'Actif', 'Yaoundé', 'Mbankolo', '1', '2024-04-04 16:14:36', '2024-04-17 07:54:52', 'Avril', '2024-04-17 07:54:52', 'Supprimé'),
(8, 'U99999', 'Laurent Alphonse', '', 'laurent@gmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1662798531033.jpg', 4721, 'Inactif', 'Yaounde', 'Cite verte', '0', '2024-04-05 15:37:12', '2024-04-17 07:48:05', 'Avril', '2024-04-17 07:48:05', 'Supprimé'),
(11, 'U68258', 'William Assontia', '', 'assontia_william@yahoo.fr', '+237678572542', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', 'team-4.jpg', 0, 'Actif', 'Yaoundé', 'Mbankolo', '2', '2024-04-06 13:04:55', '2024-04-11 07:44:51', 'Avril', '2024-04-11 07:44:51', 'Supprimé'),
(12, 'U78062', 'tauyixeipece', 'tauyixeipece', 'tauyixeipece-4650@yopmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1639861637056.jpg', 170147, 'Inactif', 'Yaoundé', 'carrefour Mek', '2', '2024-04-08 16:59:41', '2024-04-11 07:39:57', '', '2024-04-11 07:39:57', 'Supprimé'),
(13, 'U30512', 'pratoicreppauqui', 'pratoicreppauqui', 'pratoicreppauqui-9780@yopmail.com', '689901278', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1679056939656.jpg', NULL, 'Actif', 'Yaoundé', 'Bastos', '1', '2024-04-08 17:01:27', '2024-04-17 07:58:03', '', '2024-04-17 07:58:03', 'Supprimé'),
(14, 'U96735', 'togafrugrebo', 'togafrugrebo', 'togafrugrebo-2385@yopmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1661538927382.jpg', NULL, 'Actif', 'Dubai', 'Cité verte', '2', '2024-04-08 17:35:32', '2024-04-11 07:29:23', '', '2024-04-11 07:29:23', 'Supprimé'),
(15, 'U98981', 'wennammobroive', 'wennammobroive', 'wennammobroive-5316@yopmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', 'IMG_20230217_175456.jpg', 797180, 'Inactif', 'Yaoundé', 'Carriere', '2', '2024-04-09 06:44:20', '2024-04-11 07:27:08', '', '2024-04-11 07:27:08', 'Supprimé'),
(16, 'U46258', 'backend', 'backend', 'backend@gmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1662798531033.jpg', 450478, 'Inactif', 'Yaoundé', 'Cité verte', '1', '2024-04-10 15:35:37', '2024-04-17 07:59:45', '', '2024-04-17 07:59:45', 'Supprimé'),
(17, 'U79148', 'Mvondo', 'Mvondo', 'mvondofernando7777@gmail.com', '+2376785329', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', '1663762741850.jpg', NULL, 'Actif', 'Yaoundé', 'carrefour Mek', '2', '2024-04-11 17:54:40', '2024-04-12 20:06:51', '', '2024-04-12 20:06:51', 'Supprimé'),
(18, 'U69913', 'Geovane', 'Geovane', 'geo575mbeussi@gmail.com', '+2376785360', 'fbcddbbe2bfcec67fce19d454ec9b05c6ad821a0', 'Capture-d’écran-2021-02-02-à-17.00.31.webp', NULL, 'Actif', 'Yaoundé', 'Mbankolo', '1', '2024-04-15 14:52:59', '2024-04-17 08:02:51', '', '2024-04-17 08:02:51', 'Supprimé'),
(19, 'U09867', 'Laurent ', 'Alphonse', 'laurentalphonsewilfried@gmail.com', '+2376785329', '$2y$10$at/1roBIToENz757ZV3pbOpFcc8GqUihRENekx7t82efDT/14lEf6', '662bf84aefd71.jpg', NULL, 'Actif', 'Paris', 'Cité verte', '4', '2024-04-16 17:43:25', '2024-04-26 18:54:03', '', NULL, 'Present'),
(20, 'U75999', 'Ngassi', 'Ngassi', 'ngassijordane2@gmail.com', '679120234', '$2y$10$DU5C2y8MyA8cB79QcDc8Duj6OsAGF.qOnkFG3D8YRT2uEelqJNSKi', 'IMG_20240415_174526.jpg', NULL, 'Actif', 'Yaoundé ', 'Yaoundé ', '2', '2024-04-19 13:07:14', '2024-04-19 13:09:09', '', NULL, 'Present'),
(21, 'U41738', 'nayullesezo', 'nayullesezo', 'nayullesezo-2321@yopmail.com', '+237692255090', '$2y$10$VBQwmL2SA/fhW7p49aooJekDLd.FezvG8ewaNjbyFBjR2gedyG0Ua', 'call-to-action.jpg', 630593, 'Inactif', 'Makoua', 'Damas', '2', '2024-04-20 18:20:01', '2024-04-20 18:20:01', '', NULL, 'Present'),
(22, 'U54491', 'nocoyasojo', 'nocoyasojo', 'nocoyasojo-2840@yopmail.com', '+237678536884', '$2y$10$JWmNeC6y9e4LHL8vKuOYyecHbHJVH.4tPOwdBAr5HiDwwgAMzwvXi', 'avatar15.jpg', NULL, 'Actif', 'Yaoundé', 'Carriere', '1', '2024-04-20 18:30:38', '2024-04-20 18:32:50', '', NULL, 'Present'),
(23, 'U75654', 'Karim 🦄👨‍💻', 'Karim 🦄👨‍💻', 'njoyaabdelkarim404@gmail.com', '657698373', '$2y$10$VpF8QK6G3ltRn61Ysl16GeSEl.OVirlZZV0C5jARFbu8mMfuIY4De', 'IMG_4078.jpeg', NULL, 'Actif', 'Yaoundé ', 'Damas', '2', '2024-04-22 12:37:37', '2024-04-22 12:38:34', '', NULL, 'Present'),
(24, 'U65163', 'Vanessa', 'Vanessa', 'moullavokaqua-3880@yopmail.com', '678536884', '$2y$10$Y00AK0ZxwfXgoTFfz0gALem9kyvXskbez9xB42Q0BX8Qr/MunJV3C', 'c2.png', NULL, 'Actif', 'Yaoundé', 'Simbock', '1', '2024-04-25 07:27:24', '2024-04-25 07:29:23', '', NULL, 'Present'),
(25, 'U46693', 'Fabiona', 'Fabiona', 'setinnileinnu-7571@yopmail.com', '+237678536884', '$2y$10$mnPZgSpoxstGcQMs23.vLeD3be6O8yDeD96afcfkaK8aUdYsr4x6u', 'face19.jpg', 721997, 'Inactif', 'Sangmelima', 'Cité verte', '2', '2024-04-25 07:48:51', '2024-04-25 07:48:51', '', NULL, 'Present');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID_COMMENTAIRE`),
  ADD KEY `id_chambre` (`ID_PRODUIT`);

--
-- Index pour la table `mot_de_pass_oublie`
--
ALTER TABLE `mot_de_pass_oublie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietaire_id` (`proprietaire_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `reservation_ibfk_1` (`proprietaire_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID_COMMENTAIRE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `mot_de_pass_oublie`
--
ALTER TABLE `mot_de_pass_oublie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `mot_de_pass_oublie`
--
ALTER TABLE `mot_de_pass_oublie`
  ADD CONSTRAINT `mot_de_pass_oublie_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateurs` (`ID`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`proprietaire_id`) REFERENCES `utilisateurs` (`ID`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`proprietaire_id`) REFERENCES `utilisateurs` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
