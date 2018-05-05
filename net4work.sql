-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 mai 2018 à 16:37
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `net4work`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `idalbum` int(11) NOT NULL,
  `nom` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `idphoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

DROP TABLE IF EXISTS `amis`;
CREATE TABLE IF NOT EXISTS `amis` (
  `iduser` int(11) NOT NULL,
  `idami` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `amis`
--

INSERT INTO `amis` (`iduser`, `idami`) VALUES
(1, 2),
(2, 1),
(1, 6),
(1, 3),
(7, 1),
(3, 1),
(1, 7),
(6, 1),
(3, 7),
(7, 3),
(3, 6),
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentairephoto`
--

DROP TABLE IF EXISTS `commentairephoto`;
CREATE TABLE IF NOT EXISTS `commentairephoto` (
  `iduser` int(11) NOT NULL,
  `idphoto` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `iduser` int(11) NOT NULL,
  `motdepasse` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connection`
--

INSERT INTO `connection` (`iduser`, `motdepasse`, `email`) VALUES
(1, '1234', 'gregoire.desbordesdecepoy@edu.ece.fr'),
(2, '4321', 'marc.rahbani@edu.ece.fr'),
(3, '1234', 'pierre.berland@edu.ece.fr'),
(6, '1234', 'jp.segado@edu.ece.fr'),
(7, '1234', 'raphael.lopes@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `iduser` int(11) NOT NULL,
  `idcontact` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `iduser` int(11) NOT NULL,
  `posterecherché` text NOT NULL,
  `liencv` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `texte` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `iduser` int(11) NOT NULL,
  `entreprise` text NOT NULL,
  `salaire` text NOT NULL,
  `typedecontrat` text NOT NULL,
  `descriptionduposte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`iduser`, `entreprise`, `salaire`, `typedecontrat`, `descriptionduposte`) VALUES
(1, 'net4work', '1750 brut par mois', 'CDD', 'Recoder un site');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `iduser` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `lien` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `iduser` int(11) NOT NULL,
  `idami` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`iduser`, `idami`, `message`, `date`, `heure`) VALUES
(1, 2, 'Coucou !', '2018-05-01', '12:41:12'),
(1, 2, 'Hello !', '2018-05-01', '10:26:03');

-- --------------------------------------------------------

--
-- Structure de la table `message contact`
--

DROP TABLE IF EXISTS `message contact`;
CREATE TABLE IF NOT EXISTS `message contact` (
  `iduser` int(11) NOT NULL,
  `idcontact` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `iduser` int(11) NOT NULL,
  `descriptionnotif` text NOT NULL,
  `provenancenotif` int(11) NOT NULL,
  `heure` time NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `lien` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

DROP TABLE IF EXISTS `texte`;
CREATE TABLE IF NOT EXISTS `texte` (
  `texte` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `poste` text NOT NULL,
  `entreprise` text NOT NULL,
  `grade` text NOT NULL,
  UNIQUE KEY `id user` (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nom`, `prenom`, `poste`, `entreprise`, `grade`) VALUES
(2, 'Rahbani', 'Marc', 'Etudiant', 'ECE', '0'),
(1, 'Desbordes de Cepoy', 'Gregoire', 'Etudiant', 'ECE', '1'),
(3, 'Berland', 'Pierre', 'Etudiant', 'ECE', '1'),
(6, 'Jean-Pierre', 'Segado', 'Enseignant', 'ECE', '0'),
(7, 'Lopes', 'Raphael', 'Etudiant', 'ECE', '0');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `lien` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
