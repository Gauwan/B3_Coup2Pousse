-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 06 Octobre 2016 à 09:21
-- Version du serveur: 10.0.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u842697544_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Adresses`
--

CREATE TABLE IF NOT EXISTS `Adresses` (
  `ID_Adresse` int(11) NOT NULL,
  `Numero_Adresse` int(11) NOT NULL,
  `Intitule_Adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ville_Adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CodePostal_Adresse` int(5) NOT NULL,
  PRIMARY KEY (`ID_Adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Aides`
--

CREATE TABLE IF NOT EXISTS `Aides` (
  `ID_Aide` int(11) NOT NULL,
  `Categorie_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Niveau_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Commentaire_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Reserve_Aide` tinyint(1) NOT NULL,
  `Note_Aide` int(1) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Etablissement` int(11) NOT NULL,
  PRIMARY KEY (`ID_Aide`),
  UNIQUE KEY `ID_Responsable` (`ID_User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Etablissements`
--

CREATE TABLE IF NOT EXISTS `Etablissements` (
  `ID_Etablissement` int(11) NOT NULL,
  `Login_Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password_Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Nom_Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone_Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email_Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ID_Adresse` int(11) NOT NULL,
  PRIMARY KEY (`ID_Etablissement`),
  UNIQUE KEY `ID_Adresse` (`ID_Adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Login_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Firstname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phonenumber_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Skype_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Disponibilite_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ID_Adresse` int(11) NOT NULL,
  PRIMARY KEY (`ID_User`),
  UNIQUE KEY `ID_Adresse` (`ID_Adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;