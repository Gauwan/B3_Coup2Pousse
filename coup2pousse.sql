-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Octobre 2016 à 14:34
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `u842697544_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `Adresses` (
  `ID_Adresse` int(11) NOT NULL,
  `Number_Adresse` int(11) DEFAULT NULL,
  `Name_Adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City_Adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CodePostal_Adresse` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aides`
--

CREATE TABLE `Aides` (
  `ID_Aide` int(11) NOT NULL,
  `Category_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Level_Aide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Commentary_Aide` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Reserved_Aide` tinyint(1) NOT NULL,
  `Note_Aide` int(1) DEFAULT NULL,
  `ID_Pousse_User` int(11) NOT NULL,
  `ID_Pousseur_User` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `Users` (
  `ID_User` int(11) NOT NULL,
  `Login_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname_User` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phonenumber_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Skype_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Disponibility_User` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsEtablissement_User` tinyint(1) NOT NULL DEFAULT '0',
  `ID_Adresse` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `Users` (`ID_User`, `Login_User`, `Password_User`, `Fullname_User`, `Phonenumber_User`, `Skype_User`, `Email_User`, `Disponibility_User`, `IsEtablissement_User`, `ID_Adresse`) VALUES
(1, 'Stumat', 'mat260996', 'Mathieu Nicaudie', NULL, NULL, 'mathieunicaudie@gmail.com', NULL, 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `Adresses`
  ADD PRIMARY KEY (`ID_Adresse`);

--
-- Index pour la table `aides`
--
ALTER TABLE `Aides`
  ADD PRIMARY KEY (`ID_Aide`),
  ADD UNIQUE KEY `ID_Responsable` (`ID_Pousse_User`),
  ADD UNIQUE KEY `ID_Pousseur_User` (`ID_Pousseur_User`);

--
-- Index pour la table `users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Login_User` (`Login_User`),
  ADD UNIQUE KEY `ID_Adresse` (`ID_Adresse`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `Users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
