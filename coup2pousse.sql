
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 06 Octobre 2016 à 12:45
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
  `Number_Adresse` int(11) DEFAULT NULL,
  `Name_Adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City_Adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CodePostal_Adresse` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID_Adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Aides`
--

CREATE TABLE IF NOT EXISTS `Aides` (
  `ID_Aide` int(11) NOT NULL,
  `Category_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Level_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Commentary_Aide` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Reserved_Aide` tinyint(1) NOT NULL,
  `Note_Aide` int(1) DEFAULT NULL,
  `ID_Pousse_User` int(11) NOT NULL,
  `ID_Pousseur_User` int(11) NOT NULL,
  PRIMARY KEY (`ID_Aide`),
  UNIQUE KEY `ID_Responsable` (`ID_Pousse_User`),
  UNIQUE KEY `ID_Pousseur_User` (`ID_Pousseur_User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Login_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phonenumber_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Skype_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Disponibility_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsEtablissement_User` tinyint(1) NOT NULL,
  `ID_Adresse` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_User`),
  UNIQUE KEY `ID_Adresse` (`ID_Adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
