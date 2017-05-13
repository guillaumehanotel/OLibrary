-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Avril 2017 à 13:53
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_olibrary`
--
CREATE DATABASE IF NOT EXISTS `bdd_olibrary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdd_olibrary`;

-- --------------------------------------------------------


DROP TABLE IF EXISTS `emprunte`;
DROP TABLE IF EXISTS `utilisateur`;
DROP TABLE IF EXISTS `exemplaire`;
DROP TABLE IF EXISTS `collection`;
DROP TABLE IF EXISTS `editeur`;
DROP TABLE IF EXISTS `fournisseur`;
DROP TABLE IF EXISTS `notice`;
DROP TABLE IF EXISTS `auteur`;






--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `user_num` int(11) NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `user_prenom` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `user_mail` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `user_mdp` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_num`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;



--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `auteur_id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_nom` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `auteur_prenom` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`auteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



--
-- Structure de la table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(10) NOT NULL AUTO_INCREMENT,
  `notice_titre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `notice_date_parution` date NOT NULL,
  `notice_synopsis` text CHARACTER SET latin1 NOT NULL,
  `notice_auteur_id` int(3) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `FK_notice_auteur_id` (`notice_auteur_id`)
  
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;



--
-- Structure de la table `editeur`
--

CREATE TABLE IF NOT EXISTS `editeur` (
  `editeur_id` int(11) NOT NULL AUTO_INCREMENT,
  `editeur_nom` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`editeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


--
-- Structure de la table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `collection_id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_nom` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `editeur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`collection_id`),
  KEY `FK_collection_editeur_id` (`editeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `fournisseur_id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur_nom` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


--
-- Structure de la table `exemplaire`
--

CREATE TABLE IF NOT EXISTS `exemplaire` (
  `exemplaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `exemplaire_ISBN` varchar(13) CHARACTER SET latin1 NOT NULL,
  `exemplaire_notice_id` int(11) NOT NULL,
  `exemplaire_collection_id` int(11) NOT NULL,
  `exemplaire_fournisseur_id` int(11) NOT NULL,
  PRIMARY KEY (`exemplaire_id`),
  KEY `FK_exemplaire_collection_id` (`exemplaire_collection_id`),
  KEY `FK_exemplaire_fournisseur_id` (`exemplaire_fournisseur_id`),
  KEY `FK_exemplaire_notice_id` (`exemplaire_notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;


--
-- Structure de la table `emprunte`
--

CREATE TABLE IF NOT EXISTS `emprunte` (
  `emprunt_date` date DEFAULT NULL,
  `emprunt_retour` date DEFAULT NULL,
  `is_reservation` tinyint(1) DEFAULT NULL,
  `user_num` int(11) NOT NULL,
  `exemplaire_id` int(11) NOT NULL,
  PRIMARY KEY (`user_num`,`exemplaire_id`),
  KEY `FK_emprunte_exemplaire_id` (`exemplaire_id`),
  KEY `FK_emprunte_user_num` (`user_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;








--
-- Vider la table avant d'insérer `utilisateur`
--

TRUNCATE TABLE `utilisateur`;
--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user_num`, `user_nom`, `user_prenom`, `user_mail`, `user_mdp`, `is_admin`) VALUES
(13, 'Gardin', 'Kélian', 'kelian.gardin@ynov.com', '$2y$10$pTUeCeGzVS0bPzPvXh/3XueMdhTz2qYfXGMtjhMR1.bpLLKsKjNpe', 0),
(14, 'Hanotel', 'Guillaume', 'guillaume.hanotel@ynov.com', '$2y$10$78R2G1ffl5EM0lsi9cICbeSut/AL0A1bwMmRoZw8LOxhZ9QpLCCOS', 0),
(15, 'Pitault', 'Cyriaque', 'cyriaque.pitault@ynov.com', '$2y$10$PWib195Jk.zZMHyDkwXbvekuWAklPxdPMWJdoadbqQVYrk.gV3ILC', 0),
(16, 'Monfouga', 'Hugo', 'hugo.monfouga@ynov.com', '$2y$10$CpTCxfE6gxaH1FoBNqegl.7JBihDqf5mNkGE3Ekjnl/CBL.7CpCoC', 0),
(17, 'Giralt', 'Benjamin', 'benjamin.giralt@ynov.com', '$2y$10$4oU8hU6NVcSx50pE37clL.v68GK86ZEBpjIB.Ff2UrB4kTOJrZ6/G', 0),
(18, 'Cardarelli', 'Clément', 'clement.cardarelli@ynov.com', '$2y$10$EIvgd6JV2nxcBKDT6muVOOIgK8RrVi2R8lGXQRCqyUI9ZrkZ/QMgO', 0),
(19, 'Aubineau', 'Alexis', 'alexis.aubineau@ynov.com', '$2y$10$1PzvNwwYPNZsqixjpkpAVurMGdi.dPm3uotcMO3bfQn28DFJSL3Q6', 0),
(20, 'Engler', 'Dylan', 'dylan.engler@ynov.com', '$2y$10$nXAHpjbNCpjGl/oW5nZYNOUdmK2En0TxCeQZHJU5L2hymN8eOhrMO', 0),
(21, 'Brugères', 'Léo', 'leo.brugeres@ynov.com', '$2y$10$6rdyMzLhw6NFfiXE2KU5duuK638v35RHnaJoywcGc8SdzXPZnBDaS', 0),
(22, 'Desage', 'Alexandre', 'alexandre.desage@ynov.com', '$2y$10$WWMaXqz4nmWRDLigLFRvEuCW9q7.sn3E6C57ddNiM.kpFekph73bG', 0),
(23, 'Godrie', 'Paul', 'paul.godrie@ynov.com', '$2y$10$se3kdw71.ktfzrQBjb2li..Jr4Y77W06K4zgUlaUy6fHc2Zh7tACu', 0),
(24, 'Doret', 'Alexandre', 'alexandre.doret@ynov.com', '$2y$10$1wRzT8O7EvhSEBRmJSTe.eIJWSo9elJrk7zcJ9rxmGeVzEAkh3h8i', 0),
(25, 'Canteloup', 'Anthony', 'anthony.canteloup@ynov.com', '$2y$10$W06irsrAyp8ni.cnY5SDBu5DsiDAxOm8rrhJhhzxsjnw0E0BVBX2q', 0),
(26, 'Galle', 'Etoile', 'etoile.galle@ynov.com', '$2y$10$cqD/QzG1pjs9s0sD5JaLLevibPXvhd0C/0sj0jcaVxW/E3FjRBsxi', 0),
(27, 'Vretman', 'Maxence', 'maxence.vretman@ynov.com', '$2y$10$BQEQQM3XO8V6hqvA2LIC9OLKY2ZiMtYxLHUyvSca0wDbxtVREWd/W', 0),
(28, 'Chiny', 'Antoine', 'antoine.chiny@ynov.com', '$2y$10$NrLxA8MT50.6Z0c8fkM.WOmAHyOHIleOaydVjEwAnOvlN6e4wQuoC', 0),
(29, 'Cloux', 'Clément', 'clement.cloux@ynov.com', '$2y$10$AX6qZKQYiITdeQqcDHh/K.meYsleUGXXP/fMQuNc7SCsen6Laz9fC', 0),
(30, 'Marx', 'John', 'john.marx@ynov.com', '$2y$10$hiw1kWDvHyRNPH5m6j18I.BaX5eQVMIgmwf3/ylHCgWrsyTYlkC8.', 0),
(31, 'Flamant', 'Cédric', 'cedric.flamant@ynov.com', '$2y$10$svfsTZaW9NRRUoUccMJq7.cCDMKmP.3qx7CUqj.ri7/T6PXZoUONK', 0),
(32, 'Courrian', 'Yannick', 'yannick.courrian@ynov.com', '$2y$10$djDPh3ccqQalF357W/Dwm.o.XclIVFbO2JH9FI6fAdAnp01ehCpqS', 0),
(33, 'Lafon', 'Arnaud', 'arnaud.lafon@ynov.com', '$2y$10$Zyv6JiocUS.9WGHq6eFwPeYrqrAHqZc2KkPLatY5I4UQfy3NeODgi', 0),
(34, 'Java', 'Jean-Michel', 'olibrary@ynov.com', '$2y$10$OOA.t8ZdMHN3gOL8guFhSe8qTx8aaFK4SRG1UgBuKz38xrB/XgKi.', 1);

-- --------------------------------------------------------






--
-- Vider la table avant d'insérer `auteur`
--

TRUNCATE TABLE `auteur`;
--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`auteur_id`, `auteur_nom`, `auteur_prenom`) VALUES
(1, 'Rimbaud', 'Arthur'),
(2, 'Hugo', 'Victor'),
(3, 'Proust', 'Marcel'),
(4, 'Baudelaire', 'Charles'),
(5, 'Christie', 'Agatha'),
(6, 'Sartre', 'Jean-Paul'),
(7, 'Zola', 'Émile'),
(8, 'Camus', 'Albert');

-- --------------------------------------------------------






--
-- Vider la table avant d'insérer `notice`
--

TRUNCATE TABLE `notice`;
--
-- Contenu de la table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_titre`, `notice_date_parution`, `notice_synopsis`, `notice_auteur_id`) VALUES
(1, 'Une saison en enfer', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 1),
(2, 'Les Illuminations', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 1),
(3, 'Lettres dites "du Voyant"', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 1),
(4, 'Poèmes', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus\nadultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium \net nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 1),
(5, 'Quatrevingt-treize', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2),
(6, 'Actes et Paroles -I', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2),
(7, 'La Esmeralda', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2),
(8, 'Les misérables Tome I - Fantine', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella,\ndeinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, \niamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2),
(9, 'Claude Gueux', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2),
(10, 'Du Côté de chez Swann', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 3),
(11, 'Les Plaisirs et les Jours', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 3),
(12, 'Sodome et Gomorrhe - Volume 1', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella,\ndeinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, \niamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 3),
(13, 'Albertine disparue', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 3),
(14, 'A celle qui est trop gaie', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 4),
(15, 'A une dame créole', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 4),
(16, 'A une Madone', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 4),
(17, 'A une passante', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 4),
(18, 'La Nausée', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 5),
(19, 'Le Mur', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus\nadultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium \net nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 5),
(20, 'Les Mouches', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 5),
(21, 'L\'Etre et le Néant', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 5),
(22, 'Morts sans sépulture', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 5),
(23, 'Le Flambeau', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 6),
(24, 'Le crime de l\'Orient-Express', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella,\ndeinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, \niamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 6),
(25, 'Le meurtre de Roger Ackroyd', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella,\ndeinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, \niamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 6),
(26, 'Cartes sur table', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 6),
(27, 'Nana', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus\nadultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium \net nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 7),
(28, 'La fortune des Rougon', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 7),
(29, 'Son Excellence Eugène Rougon', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella,\ndeinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, \niamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 7),
(30, 'J\'Accuse', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 7),
(31, 'La Peste', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem\ningressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens \nin senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 8),
(32, 'L\'été', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus\nadultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium \net nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 8),
(33, 'L\'Envers et l\'Endroit', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 8),
(34, 'Adaptation des Possédés', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 8),
(35, 'Notre Dame de Paris', '1873-01-01', 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque \nvergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.', 2);

-- --------------------------------------------------------






--
-- Vider la table avant d'insérer `editeur`
--

TRUNCATE TABLE `editeur`;
--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`editeur_id`, `editeur_nom`) VALUES
(1, 'Gallimard'),
(2, 'Le Livre de Poche'),
(3, 'Larousse'),
(4, 'Hachette Education'),
(5, 'Pocket'),
(6, 'Hatier'),
(7, 'Flammarion'),
(8, 'Magnard');

-- --------------------------------------------------------






--
-- Vider la table avant d'insérer `collection`
--

TRUNCATE TABLE `collection`;
--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_nom`, `editeur_id`) VALUES
(1, 'Folio Classique', 1),
(2, 'Classiques', 2),
(3, 'Petits Classiques Larouss', 3),
(4, 'Bibliolycée', 4),
(5, 'Classiques', 5),
(6, 'Libretti', 2),
(7, 'Classiques & Cie Collège', 6),
(8, 'GF Etonnants classiques', 7),
(9, 'Classiques & contemporain', 8);

-- --------------------------------------------------------







--
-- Vider la table avant d'insérer `fournisseur`
--

TRUNCATE TABLE `fournisseur`;
--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`fournisseur_id`, `fournisseur_nom`) VALUES
(1, 'Mollat'),
(2, 'La Maison du Livre'),
(3, 'Fnac'),
(4, 'La boîte à Livres');

-- --------------------------------------------------------








--
-- Vider la table avant d'insérer `exemplaire`
--

TRUNCATE TABLE `exemplaire`;
--
-- Contenu de la table `exemplaire`
--

INSERT INTO `exemplaire` (`exemplaire_id`, `exemplaire_ISBN`, `exemplaire_notice_id`, `exemplaire_collection_id`, `exemplaire_fournisseur_id`) VALUES
(1, '978152012197', 1, 3, 1),
(2, '978152012197', 1, 3, 1),
(3, '978152012197', 1, 3, 1),
(4, '978152012197', 2, 5, 2),
(5, '978152012197', 2, 5, 2),
(6, '978152012197', 2, 5, 2),
(7, '978152012197', 3, 4, 4),
(8, '978152012197', 3, 4, 4),
(9, '978152012197', 3, 4, 4),
(10, '978152012197', 4, 1, 2),
(11, '978152012197', 4, 1, 2),
(12, '978152012197', 4, 1, 2),
(13, '978152012197', 5, 2, 4),
(14, '978152012197', 5, 2, 4),
(15, '978152012197', 6, 6, 2),
(16, '978152012197', 6, 6, 2),
(17, '978152012197', 6, 6, 2),
(18, '978152012197', 7, 9, 1),
(19, '978152012197', 7, 9, 1),
(20, '978152012197', 7, 9, 1),
(21, '978152012197', 8, 7, 4),
(22, '978152012197', 8, 7, 4),
(23, '978152012197', 8, 7, 4),
(24, '978152012197', 9, 5, 2),
(25, '978152012197', 9, 5, 2),
(26, '978152012197', 9, 5, 2),
(27, '978152012197', 10, 2, 3),
(28, '978152012197', 10, 2, 3),
(29, '978152012197', 11, 7, 1),
(30, '978152012197', 11, 7, 1),
(31, '978152012197', 11, 7, 1),
(32, '978152012197', 12, 5, 2),
(33, '978152012197', 12, 5, 2),
(34, '978152012197', 12, 5, 2),
(35, '978152012197', 13, 2, 1),
(36, '978152012197', 13, 2, 1),
(37, '978152012197', 13, 2, 1),
(38, '978152012197', 14, 4, 2),
(39, '978152012197', 14, 4, 2),
(40, '978152012197', 14, 4, 2),
(41, '978152012197', 15, 8, 3),
(42, '978152012197', 15, 8, 3),
(43, '978152012197', 15, 8, 3),
(44, '978152012197', 16, 4, 4),
(45, '978152012197', 16, 4, 4),
(46, '978152012197', 16, 4, 4),
(47, '978152012197', 17, 6, 2),
(48, '978152012197', 17, 6, 2),
(49, '978152012197', 17, 6, 2),
(50, '978152012197', 18, 2, 4),
(51, '978152012197', 18, 2, 4),
(52, '978152012197', 18, 2, 4),
(53, '978152012197', 19, 7, 1),
(54, '978152012197', 19, 7, 1),
(55, '978152012197', 19, 7, 1),
(56, '978152012197', 20, 1, 3),
(57, '978152012197', 20, 1, 3),
(58, '978152012197', 20, 1, 3),
(59, '978152012197', 21, 3, 2),
(60, '978152012197', 21, 3, 2),
(61, '978152012197', 21, 3, 2),
(62, '978152012197', 22, 6, 1),
(63, '978152012197', 22, 6, 1),
(64, '978152012197', 22, 6, 1),
(65, '978152012197', 23, 2, 4),
(66, '978152012197', 23, 2, 4),
(67, '978152012197', 24, 5, 3),
(68, '978152012197', 24, 5, 3),
(69, '978152012197', 24, 5, 3),
(70, '978152012197', 25, 8, 2),
(71, '978152012197', 25, 8, 2),
(72, '978152012197', 25, 8, 2),
(73, '978152012197', 26, 3, 4),
(74, '978152012197', 26, 3, 4),
(75, '978152012197', 26, 3, 4),
(76, '978152012197', 27, 6, 2),
(77, '978152012197', 27, 6, 2),
(78, '978152012169', 27, 6, 2),
(79, '978152012197', 28, 4, 1),
(80, '978152012197', 28, 4, 1),
(81, '978152012197', 28, 4, 1),
(82, '978152012197', 29, 2, 1),
(83, '978152012197', 29, 2, 1),
(84, '978152012197', 29, 2, 1),
(85, '978152012197', 30, 7, 3),
(86, '978152012197', 30, 7, 3),
(87, '978152012197', 30, 7, 3),
(88, '978152012197', 31, 4, 3),
(89, '978152012197', 31, 4, 3),
(90, '978152012197', 31, 4, 3),
(91, '978152012197', 32, 5, 1),
(92, '978152012197', 32, 5, 1),
(93, '978152012197', 32, 5, 1),
(94, '978152012197', 33, 8, 3),
(95, '978152012197', 33, 8, 3),
(96, '978152012197', 33, 8, 3),
(97, '978152012197', 34, 2, 1),
(98, '978152012197', 34, 2, 1),
(99, '978152012197', 34, 2, 1),
(100, '978152012197', 35, 4, 3),
(101, '978152012197', 35, 4, 3),
(102, '978152012197', 35, 4, 3),
(103, '978152012197', 5, 2, 4),
(104, '978152012197', 10, 2, 3),
(105, '978152012197', 23, 2, 4);

-- --------------------------------------------------------









--
-- Vider la table avant d'insérer `emprunte`
--

TRUNCATE TABLE `emprunte`;
--
-- Contenu de la table `emprunte`
--

INSERT INTO `emprunte` (`emprunt_date`, `emprunt_retour`, `is_reservation`, `user_num`, `exemplaire_id`) VALUES
('2017-06-01', '2017-06-14', 1, 13, 75),
('2017-06-01', '2017-06-14', 0, 14, 1),
('2017-06-08', '2017-06-22', 0, 15, 28),
('2017-06-08', '2017-06-22', 0, 15, 56),
('2017-06-08', '2017-06-22', 0, 16, 29),
('2017-06-08', '2017-06-22', 0, 17, 30),
('2017-06-08', '2017-06-22', 0, 18, 31),
('2017-06-08', '2017-06-22', 0, 19, 32),
('2017-06-08', '2017-06-22', 0, 20, 33),
('2017-06-08', '2017-06-22', 0, 21, 67),
('2017-06-08', '2017-06-22', 0, 22, 68),
('2017-06-08', '2017-06-22', 0, 23, 69),
('2017-06-08', '2017-06-22', 0, 24, 70),
('2017-06-08', '2017-06-22', 0, 25, 71),
('2017-06-18', '2017-06-22', 1, 26, 80),
('2017-06-18', '2017-06-22', 1, 27, 81),
('2017-06-18', '2017-06-22', 1, 28, 82),
('2017-06-18', '2017-06-22', 1, 29, 83),
('2017-06-18', '2017-06-22', 1, 30, 84);

-- --------------------------------------------------------







--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `FK_collection_editeur_id` 
  FOREIGN KEY (`editeur_id`) 
  REFERENCES `editeur` (`editeur_id`)
  ON DELETE CASCADE;
  
  
--
-- Contraintes pour la table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `FK_notice_auteur_id` 
  FOREIGN KEY (`notice_auteur_id`) 
  REFERENCES `auteur` (`auteur_id`)
  ON DELETE CASCADE;
  
  
--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_exemplaire_collection_id` 
  FOREIGN KEY (`exemplaire_collection_id`) 
  REFERENCES `collection` (`collection_id`)
  ON DELETE CASCADE;
  
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_fournisseur_collection_id` 
  FOREIGN KEY (`exemplaire_fournisseur_id`) 
  REFERENCES `fournisseur` (`fournisseur_id`)
  ON DELETE CASCADE;
  
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_fournisseur_notice_id` 
  FOREIGN KEY (`exemplaire_notice_id`) 
  REFERENCES `notice` (`notice_id`)
  ON DELETE CASCADE;
  
  
--
-- Contraintes pour la table `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `FK_emprunte_exemplaire_id` 
  FOREIGN KEY (`exemplaire_id`) 
  REFERENCES `exemplaire` (`exemplaire_id`)
  ON DELETE CASCADE;
  
ALTER TABLE `emprunte`
  ADD CONSTRAINT `FK_emprunte_user_num` 
  FOREIGN KEY (`user_num`) 
  REFERENCES `utilisateur` (`user_num`)
  ON DELETE CASCADE;
  
  
  
  

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
