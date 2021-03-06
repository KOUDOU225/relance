-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 03 oct. 2018 à 08:48
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeberge`
--

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
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

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

CREATE TABLE `Entreprise` (
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

-- --------------------------------------------------------

--
-- Structure de la table `Personnelle`
--

CREATE TABLE `Personnelle` (
  `idPersonnelle` int(11) NOT NULL,
  `NOM_PRENOM` varchar(255) NOT NULL,
  `ContactPersonnelle` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Ville` varchar(45) NOT NULL,
  `Pays` varchar(45) NOT NULL,
  `Adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Posseder`
--

CREATE TABLE `Posseder` (
  `Personnelle_idPersonnelle` int(11) NOT NULL,
  `Entreprise_idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Se_Connecter`
--

CREATE TABLE `Se_Connecter` (
  `idLogin` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idCommande`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Commande_Entreprise1_idx` (`Entreprise_idEntreprise`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD KEY `Personnelle_idPersonnelle` (`Personnelle_idPersonnelle`);

--
-- Index pour la table `Personnelle`
--
ALTER TABLE `Personnelle`
  ADD PRIMARY KEY (`idPersonnelle`);

--
-- Index pour la table `Posseder`
--
ALTER TABLE `Posseder`
  ADD PRIMARY KEY (`Personnelle_idPersonnelle`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Entreprise1_idx` (`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Personnelle_idx` (`Personnelle_idPersonnelle`);

--
-- Index pour la table `Se_Connecter`
--
ALTER TABLE `Se_Connecter`
  ADD PRIMARY KEY (`idLogin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Personnelle`
--
ALTER TABLE `Personnelle`
  MODIFY `idPersonnelle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Se_Connecter`
--
ALTER TABLE `Se_Connecter`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_Commande_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD CONSTRAINT `Entreprise_ibfk_1` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `Personnelle` (`idPersonnelle`);

--
-- Contraintes pour la table `Posseder`
--
ALTER TABLE `Posseder`
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Personnelle` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `Personnelle` (`idPersonnelle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
