- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 05 Octobre 2016 à 19:32
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
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Login_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Firstname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday_User` date NOT NULL,
  `Signup_User` date NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;