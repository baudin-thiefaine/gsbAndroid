-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 18 Avril 2019 à 10:44
-- Version du serveur :  5.5.57-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `BAUDIN`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('MP', 'Mise en paiement'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE IF NOT EXISTS `fichefrais` (
`idFicheFrais` int(11) NOT NULL,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(128) NOT NULL,
  `annee` int(4) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idFicheFrais`, `idVisiteur`, `mois`, `annee`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
(1, 'a17', 'juin', 2018, 1, 45.20, '2018-10-11', 'CL'),
(5, 'a17', 'juillet', 2018, 1, NULL, '2018-10-11', 'CL'),
(6, 'b25', 'novembre', 2018, 0, 55.00, '2018-11-08', 'MP'),
(7, 'd51', 'Janvier', 2018, 6, 0.00, '2018-01-19', 'RB'),
(8, 'b25', 'Octobre', 2018, 3, 0.00, '2018-10-29', 'RB'),
(9, 'b25', 'janvier', 2019, 1, NULL, '2018-11-22', 'CL'),
(10, 'd51', 'janvier', 2019, 1, NULL, '2018-11-22', 'VA'),
(12, 'v666', 'novembre', 2018, NULL, NULL, '2018-12-13', 'CL'),
(20, 'a51', 'décembre', 2018, 0, NULL, '2018-12-20', 'CR'),
(21, 'v666', 'décembre', 2018, 0, NULL, '2018-12-20', 'CL'),
(23, 'v666', 'octobre', 2014, 3, 36.90, '2016-08-09', 'VA'),
(26, 'v666', 'mais', 2014, 6, 56.23, '2017-07-11', 'VA'),
(28, 'v666', 'juin', 2014, 3, 36.90, '2016-08-09', 'VA'),
(29, 'v666', 'janvier', 2014, 6, 56.23, '2017-07-11', 'VA'),
(30, 'v666', 'janvier', 2019, 0, NULL, '2019-01-10', 'CR'),
(31, 'v666', 'mars', 2019, 0, NULL, '2019-03-14', 'VA'),
(40, 'v666', 'février', 2019, 2, 20.00, '2019-02-13', 'VA'),
(41, 'a51', 'avril', 2019, 0, NULL, '2019-04-12', 'CR');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE IF NOT EXISTS `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', 110.00),
('KM', 'Frais Kilométrique', 0.62),
('NUI', 'Nuitée Hôtel', 80.00),
('REP', 'Repas Restaurant', 25.00);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
  `idFicheFrais` int(11) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idFicheFrais`, `idFraisForfait`, `quantite`) VALUES
(1, 'KM', 6663),
(6, 'KM', 500),
(6, 'NUI', 12),
(7, 'ETP', 3),
(7, 'KM', 210),
(7, 'NUI', 2),
(7, 'REP', 7),
(8, 'ETP', 1),
(8, 'KM', 125),
(8, 'NUI', 1),
(8, 'REP', 6),
(21, 'KM', 565385),
(21, 'NUI', 2),
(23, 'ETP', 2),
(23, 'KM', 59),
(30, 'ETP', 154),
(30, 'KM', 1003),
(30, 'NUI', 94),
(30, 'REP', 71),
(31, 'ETP', 3),
(31, 'KM', 350),
(31, 'NUI', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE IF NOT EXISTS `lignefraishorsforfait` (
`id` int(11) NOT NULL,
  `idFicheFrais` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idFicheFrais`, `libelle`, `date`, `montant`) VALUES
(1, 5, 'REFUSERrestaurant avec le patron de bayer', '2018-09-17', 724.91),
(2, 5, 'test', '2018-10-11', 399.25),
(3, 6, 'essai', '2018-11-13', 199.33),
(4, 9, 'Réparation voiture', '2018-10-03', 129.99),
(5, 8, 'REFUSER_paiement contravention stationnement', '2018-10-16', 39.00),
(6, 8, 'REFUSER_Repas PDG de PharmaLab', '2018-10-23', 164.35),
(7, 7, 'REFUSER_Avancement achat téléphone pro', '2018-01-16', 399.99),
(8, 7, 'REFUSER_Restaurant avec ma mère', '2018-01-03', 99.54),
(9, 7, 'REFUSER_Radar automatique', '2018-01-15', 135.00),
(10, 10, 'Achat cadeau Mme Goulmaye ', '2018-01-14', 99.17),
(11, 7, 'REFUSER_Achat valise', '2018-01-29', 129.50),
(12, 10, 'REFUSER_paiement parking', '2018-01-12', 12.65),
(13, 7, 'REFUSER_paiement parking', '2018-01-24', 19.21),
(24, 30, 'coucou', '2018-09-16', 54.00),
(26, 30, 'coucou', '2022-09-18', 200.00),
(27, 30, 'coucou', '2022-09-18', 200.00),
(28, 30, 'coucou', '2022-09-18', 200.00),
(29, 30, 'coucou', '2022-09-18', 200.00),
(30, 30, 'coucou', '2022-09-18', 200.00),
(31, 30, 'coucou', '2022-09-18', 200.00),
(32, 30, 'test', '2017-07-14', 120.00),
(33, 30, 'test', '2017-07-14', 120.00),
(34, 30, 'test', '2017-07-14', 120.00),
(35, 30, NULL, NULL, NULL),
(36, 30, 'rt', '2014-01-01', 14.00),
(96, 30, NULL, NULL, NULL),
(97, 30, 'restau avec patron BAYER', '2017-10-16', 200.00),
(98, 30, NULL, NULL, NULL),
(99, 31, NULL, NULL, NULL),
(100, 31, NULL, NULL, NULL),
(101, 31, NULL, NULL, NULL),
(102, 31, NULL, NULL, NULL),
(103, 31, NULL, NULL, NULL),
(104, 31, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(200) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `poste` char(30) DEFAULT 'visiteur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `poste`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillachane', '3abf9eb797afe468902101efe6b4b00f7d50802a', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21', 'visiteur'),
('a17', 'Andre', 'David', 'dandre', '12e0b9be32932a8028b0ef0432a0a0a99421f745', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23', 'visiteur'),
('a51', 'Thev', 'Alain', 'athev', '03de6c570bfe24bfc328ccd7ca46b76eadaf4334', '24 rue des Charmes', '46000', 'Cahors', '2005-01-21', 'comptable'),
('a55', 'Bedos', 'Christian', 'cbedos', 'a34b9dfadee33917a63c3cdebdc9526230611f0b', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12', 'visiteur'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'f1c1d39e9898f3202a2eaa3dc38ae61575cd77ad', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01', 'visiteur'),
('b13', 'Bentot', 'Pascal', 'pbentot', '178e1efaf000fdf2267edc43fad2a65197a0ab10', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09', 'visiteur'),
('b16', 'Bioret', 'Luc', 'lbioret', 'ab7fa51f9bf8fde35d9e5bcc5066d3b71dda00d2', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11', 'visiteur'),
('b19', 'Bunisset', 'Francis', 'fbunisset', 'aa710ca3a1f12234bc2872aa0a6f88d6cf896ae4', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21', 'visiteur'),
('b25', 'Bunisset', 'Denise', 'dbunisset', '40ff56dc0525aa08de29eba96271997a91e7d405', '23 rue Manin', '75019', 'paris', '2010-12-05', 'visiteur'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', '51a4fac4890def1ef8605f0b2e6554c86b2eb919', '114 rue Blanche', '75017', 'Paris', '2009-11-12', 'visiteur'),
('b34', 'Cadic', 'Eric', 'ecadic', '2ed5ee95d2588be3650a935ff7687dee46d70fc8', '123 avenue de la République', '75011', 'Paris', '2008-09-23', 'visiteur'),
('b4', 'Charoze', 'Catherine', 'ccharoze', '8b16cf71ab0842bd871bce99a1ba61dd7e9d4423', '100 rue Petit', '75019', 'Paris', '2005-11-12', 'visiteur'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', '7ddda57eca7a823c85ac0441adf56928b47ece76', '12 allée des Anges', '93230', 'Romainville', '2003-08-11', 'visiteur'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2f95d1cac7b8e7459376bf36b93ae7333026282d', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18', 'visiteur'),
('c14', 'Daburon', 'François', 'fdaburon', '5c7cc4a7f0123460c29c84d8f8a73bc86184adbb', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11', 'visiteur'),
('c3', 'De', 'Philippe', 'pde', '03b03872dd570959311f4fb9be01788e4d1a2abf', '13 rue Barthes', '94000', 'Créteil', '2010-12-14', 'visiteur'),
('c54', 'Debelle', 'Michel', 'mdebelle', '1fa95c2fac5b14c6386b73cbe958b663fc66fdfa', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23', 'visiteur'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', '18c2cad6adb7cee7884f70108cfd0a9b448be9be', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11', 'visiteur'),
('d51', 'Debroise', 'Michel', 'mdebroise', '46b609fe3aaa708f5606469b5bc1c0fa85010d76', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17', 'visiteur'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'abc20ea01dabd079ddd63fd9006e7232e442973c', '14 Place d Arc', '45000', 'Orléans', '2005-11-12', 'visiteur'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '8eaa8011ec8aa8baa63231a21d12f4138ccc1a3d', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05', 'visiteur'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '55072fa16c988da8f1fb31e40e4ac5f325ac145d', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01', 'visiteur'),
('e49', 'Duncombe', 'Claude', 'cduncombe', '577576f0b2c56c43b596f701b782870c8742c592', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10', 'visiteur'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'cc0fb4115bb04c613fd1b95f4792fc44f07e9f4f', '25 place de la gare', '23200', 'Gueret', '1995-09-01', 'visiteur'),
('e52', 'Eynde', 'Valérie', 'veynde', 'd06ace8d729693904c304625e6a6fab6ab9e9746', '3 Grand Place', '13015', 'Marseille', '1999-11-01', 'visiteur'),
('f21', 'Finck', 'Jacques', 'jfinck', '6d8b2060b60132d9bdb09d37913fbef637b295f2', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10', 'visiteur'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'aa45efe9ecbf37db0089beeedea62ceb57db7f17', '4 route de la mer', '13012', 'Allauh', '1998-10-01', 'visiteur'),
('f4', 'Gest', 'Alain', 'agest', '1af7dedacbbe8ce324e316429a816daeff4c542f', '30 avenue de la mer', '13025', 'Berre', '1985-11-01', 'visiteur'),
('v666', 'testNom', 'testPrenom', 'testVisiteur', '03de6c570bfe24bfc328ccd7ca46b76eadaf4334', NULL, NULL, NULL, NULL, 'visiteur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
 ADD PRIMARY KEY (`idFicheFrais`), ADD KEY `idEtat` (`idEtat`), ADD KEY `idVisiteur` (`idVisiteur`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
 ADD PRIMARY KEY (`idFicheFrais`,`idFraisForfait`), ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
 ADD PRIMARY KEY (`id`), ADD KEY `idFicheFrais` (`idFicheFrais`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
MODIFY `idFicheFrais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idFicheFrais`) REFERENCES `fichefrais` (`idFicheFrais`),
ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idFicheFrais`) REFERENCES `fichefrais` (`idFicheFrais`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
