-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 mai 2024 à 14:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `prix` int(20) DEFAULT NULL,
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
  `status` varchar(255) DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `TOKEN`, `NOM`, `PRENOM`, `EMAIL`, `TELEPHONE`, `PASSWORD`, `PHOTO`, `CODE`, `STATUS`, `VILLE`, `QUARTIER`, `ROLE`, `DATE_CREATION`, `DATE_MODIFICATION`, `MOIS_ACTUEL`, `DELETED_AT`, `STATUT`) VALUES
(19, 'U09867', 'IMMO INVESTMENT SCI', 'IMMO INVESTMENT SCI', 'investmentimmo425@gmail.com', '678 53 68 84', '$2y$10$5ywWPnbmszqnT/i.lJUXbu3OJa7GTl91r.EwrChHkVfSw/wQw0ZIy', '6659c62cbd5f4.png', NULL, 'Actif', 'Dubai', 'Limbé', '4', '2024-04-16 17:43:25', '2024-05-31 12:44:28', '', NULL, 'Present');

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
  MODIFY `ID_COMMENTAIRE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `mot_de_pass_oublie`
--
ALTER TABLE `mot_de_pass_oublie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
