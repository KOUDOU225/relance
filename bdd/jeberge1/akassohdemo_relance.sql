-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 08:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeberge`
--

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
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

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`idCommande`, `Num_CMD`, `type`, `Url`, `DSN1`, `DSN2`, `DSN3`, `Entreprise_idEntreprise`, `Date_Debut`, `Date_Fin`) VALUES
(1, '37290211193414', 'Pack Perso', 'http://www.kobthom.ci', 'www.totoma.ci', 'www.totoma.ci', 'www.totoma.ci', 1, '2018-10-04 17:47:35', '2019-10-04 17:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `Entreprise`
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

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`idEntreprise`, `ContactEntreprise`, `Email1`, `Email2`, `Entreprise`, `Pays`, `Ville`, `Adresse`, `Personnelle_idPersonnelle`) VALUES
(1, '77889900', 'tomo123@yahoo.fr', 'tomo123@yahoo.fr', 'KOBTHOM', 'CI', 'ABJ', 'Cocody,Riviera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Personnelle`
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

--
-- Dumping data for table `Personnelle`
--

INSERT INTO `Personnelle` (`idPersonnelle`, `NOM_PRENOM`, `ContactPersonnelle`, `Email`, `Ville`, `Pays`, `Adresse`) VALUES
(1, 'KOBI PACTRICK', '77889900', 'bricegbalou2014@gmail.com', 'GAGNOA', 'CI', 'Cocody,Riviera');

-- --------------------------------------------------------

--
-- Table structure for table `Posseder`
--

CREATE TABLE `Posseder` (
  `Personnelle_idPersonnelle` int(11) NOT NULL,
  `Entreprise_idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Posseder`
--

INSERT INTO `Posseder` (`Personnelle_idPersonnelle`, `Entreprise_idEntreprise`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Se_Connecter`
--

CREATE TABLE `Se_Connecter` (
  `idLogin` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idCommande`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Commande_Entreprise1_idx` (`Entreprise_idEntreprise`);

--
-- Indexes for table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD KEY `Personnelle_idPersonnelle` (`Personnelle_idPersonnelle`);

--
-- Indexes for table `Personnelle`
--
ALTER TABLE `Personnelle`
  ADD PRIMARY KEY (`idPersonnelle`);

--
-- Indexes for table `Posseder`
--
ALTER TABLE `Posseder`
  ADD PRIMARY KEY (`Personnelle_idPersonnelle`,`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Entreprise1_idx` (`Entreprise_idEntreprise`),
  ADD KEY `fk_Personnelle_has_Entreprise_Personnelle_idx` (`Personnelle_idPersonnelle`);

--
-- Indexes for table `Se_Connecter`
--
ALTER TABLE `Se_Connecter`
  ADD PRIMARY KEY (`idLogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Personnelle`
--
ALTER TABLE `Personnelle`
  MODIFY `idPersonnelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Se_Connecter`
--
ALTER TABLE `Se_Connecter`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_Commande_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD CONSTRAINT `Entreprise_ibfk_1` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `Personnelle` (`idPersonnelle`);

--
-- Constraints for table `Posseder`
--
ALTER TABLE `Posseder`
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personnelle_has_Entreprise_Personnelle` FOREIGN KEY (`Personnelle_idPersonnelle`) REFERENCES `Personnelle` (`idPersonnelle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
