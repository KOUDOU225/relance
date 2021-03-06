-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 08 oct. 2018 à 19:16
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `Num_CMD` varchar(14) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `DSN1` varchar(45) NOT NULL,
  `DSN2` varchar(45) DEFAULT NULL,
  `DSN3` varchar(45) DEFAULT NULL,
  `Entreprise_idEntreprise` int(11) NOT NULL,
  `Date_Debut` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_Fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `Num_CMD`, `type`, `Url`, `DSN1`, `DSN2`, `DSN3`, `Entreprise_idEntreprise`, `Date_Debut`, `Date_Fin`) VALUES
(1, '21016076921212', 'Pack Start-Up', 'www.brice-gbalou.org', 'DSN1', 'DBN2', 'DSN3', 1, '2018-10-04 19:05:44', '2020-04-04 19:05:44'),
(2, '84612061631059', 'Pack Asso', 'www.benin.net', '1', '2', '3', 2, '2018-10-04 20:08:59', '2020-01-02 20:08:59'),
(3, '16347930845474', 'Pack Etudiant', 'www.malika.fr', 'MALIKA1', 'MALIKA2', 'MALIKA3', 3, '2018-10-08 16:15:31', '2018-10-08 16:15:31');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `ContactEntreprise` varchar(45) NOT NULL,
  `Email1` varchar(255) DEFAULT NULL,
  `Email2` varchar(255) DEFAULT NULL,
  `Entreprise` varchar(255) NOT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) NOT NULL,
  `Adresse` varchar(45) DEFAULT NULL,
  `Personnelle_idPersonnelle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `ContactEntreprise`, `Email1`, `Email2`, `Entreprise`, `Pays`, `Ville`, `Adresse`, `Personnelle_idPersonnelle`) VALUES
(1, '00045773', 'broco1993@yahoo.fr', 'monemail@gmail.com', 'ECOLE', 'MALI', 'BAMAKO', 'ANGRE', 1),
(2, '02987332', 'a@hgff.fr', 'B@hgff.fr', 'ENT', 'BENIN1', 'COTONOU1', 'QUARTIER', 2),
(3, '22450918', 'entreprise@gmail.com', 'entreprise@gmail.com', 'MALIKA-sarl', 'COTE D\'IVOIRE', 'ABOBO', 'PK 18', 3);

-- --------------------------------------------------------

--
-- Structure de la table `personnelle`
--

CREATE TABLE `personnelle` (
  `idPersonnelle` int(11) NOT NULL,
  `NOM_PRENOM` varchar(255) NOT NULL,
  `ContactPersonnelle` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Ville` varchar(45) NOT NULL,
  `Pays` varchar(45) NOT NULL,
  `Adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnelle`
--

INSERT INTO `personnelle` (`idPersonnelle`, `NOM_PRENOM`, `ContactPersonnelle`, `Email`, `Ville`, `Pays`, `Adresse`) VALUES
(1, 'KOBI WAYOU SERGES PATRICK', '77926457', 'broco1993@gmail.com', 'ABIDJAN', 'MALI', '8EME ARRONDT'),
(2, 'KAN YVES', '12345', 'ky@gmail.fr', 'COTONOU', 'BENIN', 'RUE 1234'),
(3, 'KONAN MALIKA', '093872', 'konan@gmail.com', 'YOPOUGON', 'COTE D\'IVOIRE', 'SIPOEX');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `Personnelle_idPersonnelle` int(11) NOT NULL,
  `Entreprise_idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`Personnelle_idPersonnelle`, `Entreprise_idEntreprise`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `se_connecter`
--

CREATE TABLE `se_connecter` (
  `idLogin` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `se_connecter`
--

INSERT INTO `se_connecter` (`idLogin`, `login`, `Mot_de_passe`) VALUES
(1, 'koudou', 'koudou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Commande_Entreprise1_idx` (`Entreprise_idEntreprise`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD KEY `Personnelle_idPersonnelle` (`Personnelle_idPersonnelle`);

--
-- Index pour la table `personnelle`
--
ALTER TABLE `personnelle`
  ADD PRIMARY KEY (`idPersonnelle`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`Personnelle_idPersonnelle`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Entreprise1_idx` (`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Personnelle_idx` (`Personnelle_idPersonnelle`);

--
-- Index pour la table `se_connecter`
--
ALTER TABLE `se_connecter`
  ADD PRIMARY KEY (`idLogin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnelle`
--
ALTER TABLE `personnelle`
  MODIFY `idPersonnelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `se_connecter`
--
ALTER TABLE `se_connecter`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `Entreprise_ibfk_1` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `personnelle` (`idPersonnelle`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Personnelle` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `personnelle` (`idPersonnelle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
