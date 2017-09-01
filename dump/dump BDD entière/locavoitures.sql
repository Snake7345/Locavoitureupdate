-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 27 Août 2017 à 14:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `locavoitures`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Employees_activ`(IN `idUtilisateur` VARCHAR(255))
update utilisateurs 
set actif = 1 
where utilisateur = idUtilisateur and actif = 0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Employees_desactiv`(IN `idUtilisateur` VARCHAR(255))
update utilisateurs 
set actif = 0 
where utilisateur = idUtilisateur and actif = 1$$

CREATE PROCEDURE `Voitures_louee`(IN `ID` INT(255))
BEGIN
  UPDATE voitures SET louee = 1 WHERE `voitureID` = ID AND louee = 0;
END$$

CREATE PROCEDURE `Voitures_nlouee`(IN `ID` INT(255))
BEGIN
  UPDATE voitures SET louee = 0 WHERE `voitureID` = ID AND louee = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `idclients` int(11) NOT NULL AUTO_INCREMENT,
  `nomclient` varchar(45) DEFAULT NULL,
  `prenomclient` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `cp` varchar(45) DEFAULT NULL,
  `localite` varchar(45) DEFAULT NULL,
  `niss` varchar(45) DEFAULT NULL,
  `datnais` date DEFAULT NULL,
  `numpermis` varchar(45) DEFAULT NULL,
  `actif` int(1) DEFAULT NULL,
  PRIMARY KEY (`idclients`),
  UNIQUE KEY `idclients_UNIQUE` (`idclients`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idclients`, `nomclient`, `prenomclient`, `adresse`, `cp`, `localite`, `niss`, `datnais`, `numpermis`, `actif`) VALUES
(1, 'Dupont', 'Charles', 'rue de la Station 20', '6042', 'Lodelinsart', '640125-203-25', '1964-01-25', '123456', NULL),
(2, 'Van Dervelde', 'Stephane', 'avenue du Pinson 12', '6001', 'Marcinelle', '700518-301-65', '1970-05-18', '321654', NULL),
(3, 'Ghislain', 'Jeanne', 'rue N. Monnom 27l ', '6120', 'Nalinnes', '760314-201-32', '1976-03-14', '789456', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reserv` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_voiture` int(11) DEFAULT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_reserv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='		' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id_reserv`, `id_voiture`, `DateDebut`, `DateFin`, `id_client`) VALUES
(1, 1001, '2017-05-10', '2017-05-15', 1),
(2, 1003, '2017-05-11', '2017-05-21', 2),
(3, 1002, '2017-05-16', '2017-05-26', 1),
(4, 1000, '2017-05-17', '2017-05-18', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `actif` int(1) DEFAULT NULL,
  PRIMARY KEY (`utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur`, `code`, `nom`, `prenom`, `admin`, `actif`) VALUES
('admin', '123', 'Administrateur', 'EgoMoi', 1, 1),
('axel', '123', 'Axel', 'Bauduin', 1, 1),
('fabian', '123', 'Gillain', 'Fabian', 0, 0),
('marco', '123456', 'Gillain', 'Marc', 0, 1),
('mela', '123456', 'Leruth', 'Mélanie', 1, 0),
('Toto123', '123', 'Toto', 'Dujardin', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE IF NOT EXISTS `voitures` (
  `voitureID` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `plaque` varchar(8) DEFAULT NULL,
  `louee` int(1) DEFAULT NULL,
  `actif` int(1) DEFAULT NULL,
  PRIMARY KEY (`voitureID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voitures`
--

INSERT INTO `voitures` (`voitureID`, `marque`, `modele`, `couleur`, `plaque`, `louee`, `actif`) VALUES
(1000, '', 'Micra', 'noir', '1-ADF102', 1, 1),
(1001, 'NISSAN', 'Qashqai', 'blanc', '1-ZER001', 1, 1),
(1002, 'TOYOTA', 'Prius', 'Gris', '1-FAR524', 0, 1),
(1003, 'PEUGEOT', '2008', 'Rouge', '1-RTG123', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
