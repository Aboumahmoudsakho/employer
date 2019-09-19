-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Septembre 2019 à 12:46
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `caserne`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `idc` int(11) NOT NULL,
  `codep` int(11) NOT NULL,
  `ido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `coden` int(11) NOT NULL,
  `libn` varchar(20) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`coden`, `libn`, `bonus`) VALUES
(1, 'facile', 0),
(2, 'moyen', 1),
(3, 'dificile', 2);

-- --------------------------------------------------------

--
-- Structure de la table `obstacle`
--

CREATE TABLE `obstacle` (
  `idobstacle` int(11) NOT NULL,
  `libob` varchar(20) NOT NULL,
  `notmin` int(11) NOT NULL,
  `idn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `obstacle`
--

INSERT INTO `obstacle` (`idobstacle`, `libob`, `notmin`, `idn`) VALUES
(1, 'foss', 10, 2),
(2, 'mbalka', 10, 3),
(3, 'esclade', 10, 1),
(4, 'rampage', 10, 2),
(5, 'feuyi', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parcour`
--

CREATE TABLE `parcour` (
  `idp` int(11) NOT NULL,
  `libp` varchar(15) NOT NULL,
  `dated` varchar(15) NOT NULL,
  `datef` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcour`
--

INSERT INTO `parcour` (`idp`, `libp`, `dated`, `datef`) VALUES
(1, 'combatant', '01/10/2019', '20/10/2019'),
(2, 'diambar', '01/01/2020', '21/01/2020');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `codep` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`codep`, `idp`, `ids`) VALUES
(5, 1, 3),
(6, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `passage`
--

CREATE TABLE `passage` (
  `codepassage` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `noteinst` int(11) NOT NULL,
  `notefinal` int(11) NOT NULL,
  `notereel` int(11) NOT NULL,
  `ids` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `ins` int(11) NOT NULL,
  `idobstacle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `soldat`
--

CREATE TABLE `soldat` (
  `ids` int(11) NOT NULL,
  `matsld` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soldat`
--

INSERT INTO `soldat` (`ids`, `matsld`, `nom`, `prenom`, `grade`, `mail`, `status`) VALUES
(1, 'SLD001', 'ndiaye', 'modou', 'caporale', 'moudou@gmail.com', 'eleve'),
(2, 'SLD002', 'sow', 'coumba', 'caporale', 'coumba@gmail.com', 'instructrice'),
(3, 'SLD003', 'fall', 'gora', 'sokhou', 'fall@gmail.com', 'eleve'),
(4, 'SLD004', 'gomis', 'jean', 'caporale', 'jean@gmail.com', 'intructeur'),
(5, 'SLD005', 'tall', 'koddou', 'caporale', 'koddou@gmail.com', 'eleve');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `codep` (`codep`),
  ADD KEY `ido` (`ido`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`coden`);

--
-- Index pour la table `obstacle`
--
ALTER TABLE `obstacle`
  ADD PRIMARY KEY (`idobstacle`),
  ADD KEY `idn` (`idn`);

--
-- Index pour la table `parcour`
--
ALTER TABLE `parcour`
  ADD PRIMARY KEY (`idp`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`codep`),
  ADD UNIQUE KEY `idp` (`idp`),
  ADD KEY `ids` (`ids`);

--
-- Index pour la table `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`codepassage`),
  ADD KEY `ids` (`ids`),
  ADD KEY `idp` (`idp`),
  ADD KEY `ins` (`ins`),
  ADD KEY `idobstacle` (`idobstacle`);

--
-- Index pour la table `soldat`
--
ALTER TABLE `soldat`
  ADD PRIMARY KEY (`ids`),
  ADD UNIQUE KEY `matsld` (`matsld`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contenir`
--
ALTER TABLE `contenir`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `coden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `obstacle`
--
ALTER TABLE `obstacle`
  MODIFY `idobstacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `parcour`
--
ALTER TABLE `parcour`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `participer`
--
ALTER TABLE `participer`
  MODIFY `codep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `passage`
--
ALTER TABLE `passage`
  MODIFY `codepassage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `soldat`
--
ALTER TABLE `soldat`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`codep`) REFERENCES `parcour` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`ido`) REFERENCES `obstacle` (`idobstacle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `obstacle`
--
ALTER TABLE `obstacle`
  ADD CONSTRAINT `obstacle_ibfk_1` FOREIGN KEY (`idn`) REFERENCES `niveau` (`coden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `parcour` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`ids`) REFERENCES `soldat` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `passage_ibfk_1` FOREIGN KEY (`ids`) REFERENCES `soldat` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passage_ibfk_2` FOREIGN KEY (`ins`) REFERENCES `soldat` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passage_ibfk_3` FOREIGN KEY (`idp`) REFERENCES `parcour` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passage_ibfk_4` FOREIGN KEY (`idobstacle`) REFERENCES `obstacle` (`idobstacle`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
