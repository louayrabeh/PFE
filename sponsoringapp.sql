-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 04:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sponsoringapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `achatpack`
--

CREATE TABLE `achatpack` (
  `idAchat` int(11) NOT NULL,
  `idPack` int(11) DEFAULT NULL,
  `idSpons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achatpack`
--

INSERT INTO `achatpack` (`idAchat`, `idPack`, `idSpons`) VALUES
(1, 1, 7478877),
(2, 1, 7478877);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(15) NOT NULL,
  `login` varchar(15) DEFAULT NULL,
  `motdepasse` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `login`, `motdepasse`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCateg` varchar(15) NOT NULL,
  `libCateg` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCateg`, `libCateg`) VALUES
('3', 'Cinéma'),
('7', 'Education'),
('8', 'Gallerie'),
('1', 'GameDev'),
('2', 'Gaming'),
('4', 'Musiques'),
('5', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `codeconf`
--

CREATE TABLE `codeconf` (
  `idConf` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeconf`
--

INSERT INTO `codeconf` (`idConf`, `code`) VALUES
(2, 'c7b7a7'),
(3, '073af3'),
(4, '6da390'),
(5, '1292e1'),
(6, '3258ec');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `idEvent` int(11) DEFAULT NULL,
  `idSpons` int(11) DEFAULT NULL,
  `idOrg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`idDemande`, `idEvent`, `idSpons`, `idOrg`) VALUES
(5, 9, 7478877, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `idEvent` int(15) NOT NULL,
  `nomEvent` varchar(15) DEFAULT NULL,
  `dateDeb` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `heureEvent` varchar(5) DEFAULT NULL,
  `lieuEvent` varchar(15) DEFAULT NULL,
  `descriptionEvent` varchar(2000) DEFAULT NULL,
  `URL_Image` varchar(50) DEFAULT NULL,
  `categ` varchar(20) DEFAULT NULL,
  `sous_categ` varchar(20) DEFAULT NULL,
  `budget` varchar(20) DEFAULT NULL,
  `idOrg` int(11) DEFAULT NULL,
  `isfree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`idEvent`, `nomEvent`, `dateDeb`, `dateFin`, `heureEvent`, `lieuEvent`, `descriptionEvent`, `URL_Image`, `categ`, `sous_categ`, `budget`, `idOrg`, `isfree`) VALUES
(1, 'GGJ', '2019-01-25', '2019-01-27', '17:00', 'manouba', 'lorem ipsum', 'gears.png', 'GameDev', 'Game design', '100', 1, 1),
(2, 'Global Game Jam', '2019-01-25', '2019-01-27', '17:00', 'manouba', 'lorem ipsum', '62495-200.png', 'GameDev', 'Game design', '80', NULL, 0),
(3, 'Event1', '2019-02-28', '2019-08-30', NULL, 'Soukra', NULL, '48363367_521092361741670_8023485094930939904_n.jpg', 'Cinema', NULL, '50', NULL, 1),
(4, 'evnt2', '2019-04-17', '2019-04-27', NULL, 'soukra', NULL, 'capt.png', 'sports', NULL, '60', NULL, 0),
(5, 'event3', NULL, NULL, NULL, NULL, NULL, 'Crush.jpg', NULL, NULL, NULL, NULL, 0),
(6, 'ev4', NULL, NULL, NULL, NULL, NULL, 'bechamel.png', NULL, NULL, NULL, NULL, 0),
(7, 'evenement', NULL, NULL, NULL, NULL, NULL, 'alone1.png', NULL, NULL, NULL, NULL, 0),
(8, 'aaaaaaaaaaaa', NULL, NULL, NULL, NULL, NULL, 'ggj.png', NULL, NULL, NULL, NULL, 1),
(9, 'InstaJam', '2019-01-25', '2019-01-27', '17', 'manouba', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. LLorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? ILorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.d, dolorum.orem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.Sapiente tempora, voluptate dignissimos voluptates quidem hic ea, natus eum ullam saepe at, quaerat nulla itaque veniam iusLorem ipsum dolor sit amet consectetur, adipisicing elit. LLorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? ILorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.d, dolorum.orem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? Id, dolorum.Sapiente tempora, voluptate dignissimos voluuhjdlajkelkue esse? Id, ue esse? Id, ', 'louay_rabeh_nametag_insta.png', 'GameDev', 'Game design', '100', 1, 0),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 'TIM.png', NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(18, 'bla', '2019-01-25', '2019-01-25', 'bla', 'bla', 'bla', 'bla', 'bla', 'bla', '20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifadmin`
--

CREATE TABLE `notifadmin` (
  `idNotif_admin` int(11) NOT NULL,
  `titreNotif_admin` varchar(100) DEFAULT NULL,
  `stat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifadmin`
--

INSERT INTO `notifadmin` (`idNotif_admin`, `titreNotif_admin`, `stat`) VALUES
(1, 'mmmm', '1'),
(2, 'mmmm', '1'),
(3, 'louay is a new sponsor', '1'),
(4, 'louay is a new sponsor', '1'),
(5, 'louay is a new sponsor', '1'),
(6, 'law is a new sponsor', '1'),
(7, 'Mohamed Louay is a new sponsor', '1'),
(8, 'Mohamed Louay is a new sponsor', '1'),
(9, 'Mohamed Louay is a new sponsor', '1'),
(10, 'Mohamed Louay is a new sponsor', '1'),
(11, 'Mohamed Louay is a new sponsor', '1'),
(12, 'Mohamed Louay is a new sponsor', '1'),
(13, 'Mohamed Louay is a new sponsor', '1'),
(14, 'Mohamed Louay is a new sponsor', '1'),
(15, 'Mohamed Louay is a new sponsor', '1'),
(16, 'Mohamed Louay is a new sponsor', '1'),
(17, 'Mohamed Louay is a new sponsor', '1'),
(18, 'Mohamed Louay is a new sponsor', '1'),
(19, 'Mohamed Louay is a new sponsor', '1'),
(20, 'Mohamed Louay is a new sponsor', '1'),
(21, 'Mohamed Louay is a new sponsor', '1'),
(22, 'Mohamed Louay is a new sponsor', '1'),
(23, 'Mohamed Louay is a new sponsor', '1'),
(24, 'Mohamed Louay is a new sponsor', '1'),
(25, 'Mohamed Louay is a new sponsor', '1'),
(26, 'Mohamed Louay is a new sponsor', '1'),
(27, 'Mohamed Louay is a new sponsor', '1'),
(28, 'Mohamed Louay is a new sponsor', '1'),
(29, 'Mohamed Louay is a new sponsor', '1'),
(30, 'Mohamed Louay is a new sponsor', '1'),
(31, 'Mohamed Louay is a new sponsor', '1'),
(32, 'Mohamed Louay is a new sponsor', '1'),
(33, 'Mohamed Louay is a new sponsor', '1'),
(34, 'Mohamed Louay is a new sponsor', '1'),
(35, 'Mohamed Louay is a new sponsor', '1'),
(36, 'Mohamed Louay is a new sponsor', '1'),
(37, 'Mohamed Louay is a new sponsor', '1'),
(38, 'Mohamed Louay is a new sponsor', '1'),
(39, 'Mohamed Louay is a new sponsor', '1'),
(40, 'Mohamed Louay is a new sponsor', '1'),
(41, 'Mohamed Louay is a new sponsor', '1'),
(42, 'Mohamed Louay is a new sponsor', '1'),
(43, 'Mohamed Louay is a new sponsor', '1'),
(44, 'Mohamed Louay is a new sponsor', '1'),
(45, 'Mohamed Louay is a new sponsor', '1'),
(46, 'Mohamed Louay is a new sponsor', '1'),
(47, 'Mohamed Louay is a new sponsor', '1'),
(48, 'Mohamed Louay is a new sponsor', '1'),
(49, ' is a new sponsor', '1'),
(50, ' is a new sponsor', '1'),
(51, ' is a new sponsor', '1'),
(52, ' is a new sponsor', '1'),
(53, ' is a new sponsor', '1'),
(54, ' is a new sponsor', '1'),
(55, 'a is a new sponsor', '1'),
(56, 'a is a new sponsor', '1'),
(57, 'a is a new sponsor', '1'),
(58, 'a is a new sponsor', '1'),
(59, 'a is a new sponsor', '1'),
(60, 'a is a new sponsor', '1'),
(61, 'op is a new sponsor', '1'),
(62, 'mohamed louay is a new sponsor', '1'),
(63, 'mohamed louay is a new sponsor', '1'),
(64, 'mohamed louay is a new sponsor', '1'),
(65, 'louay is a new sponsor', '1'),
(66, 'mohamed louay is a new sponsor', '1'),
(67, 'mohamed louay is a new sponsor', '1'),
(68, 'mohamed louay is a new sponsor', '1'),
(69, 'mohamed louay is a new sponsor', '1'),
(70, 'mohamed louay is a new sponsor', '1'),
(71, 'Louay is a new sponsor', '1'),
(72, 'Anas is a new sponsor', '1'),
(73, 'Anas is a new sponsor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `organisateur`
--

CREATE TABLE `organisateur` (
  `idOrg` int(15) NOT NULL,
  `nomOrg` varchar(15) DEFAULT NULL,
  `prenomOrg` varchar(15) DEFAULT NULL,
  `adrOrg` varchar(5) DEFAULT NULL,
  `telOrg` varchar(15) DEFAULT NULL,
  `emailOrg` varchar(20) DEFAULT NULL,
  `mdpOrg` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisateur`
--

INSERT INTO `organisateur` (`idOrg`, `nomOrg`, `prenomOrg`, `adrOrg`, `telOrg`, `emailOrg`, `mdpOrg`) VALUES
(1, 'louay', 'rabeh', NULL, '21154905', 'louayrabah@gmail.com', '21154905'),
(2, 'lou', '', 'tunis', '21543599', 'louayrabah@gail.com', '21154905');

-- --------------------------------------------------------

--
-- Table structure for table `pack`
--

CREATE TABLE `pack` (
  `idPack` int(15) NOT NULL,
  `nomPack` varchar(15) DEFAULT NULL,
  `descriptionPack` varchar(1000) DEFAULT NULL,
  `idEvent` int(15) DEFAULT NULL,
  `typePack` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `audience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`idPack`, `nomPack`, `descriptionPack`, `idEvent`, `typePack`, `montant`, `audience`) VALUES
(1, 'Bronze', '*transmigrant+\r\n*transmigrant+\r\n*transmigrant', 9, NULL, NULL, NULL),
(2, 'Silver', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. LLorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta voluptatem, est repellat ducimus aut maiores dicta ullam reiciendis itaque esse? ILorem, ipsum dolor sit amet consectetur adipisicing elit. A, sequi amet architecto fugit possimus nemo beatae soluta vo', 9, NULL, NULL, NULL),
(3, 'rrrrrrrrrrrrrrr', '*transmigrant\r\n*transmigrant\r\n*transmigrant', 9, NULL, NULL, NULL),
(4, 'Silver', 'gjfhdzakuduadja+kgjf+hdzakuduadjak+gjfhdzakuduadjakgjfhdzakudu+adjgjfhdzakuduad+jakgjfhdzakuduadjakgjfhdzakuduad6+jakgjfhdzakuduadjakgjfh+dzakuduadj+akgjfhdzakuduadjakgjfhdzakuduadjakgjf+hdzakudu', 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `idSous_categ` int(15) NOT NULL,
  `libSous_categ` varchar(20) DEFAULT NULL,
  `idCateg` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sous_categorie`
--

INSERT INTO `sous_categorie` (`idSous_categ`, `libSous_categ`, `idCateg`) VALUES
(3, 'Football', '5'),
(4, 'Basketball', '5'),
(5, 'Game design', '1'),
(6, 'GDD', '1'),
(7, 'Spriting', '1'),
(9, 'info', '7'),
(10, 'maths', '7'),
(11, 'physiques', '7'),
(12, 'sciences', '7'),
(14, 'Photographie', '8'),
(15, 'Peinture', '8');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `idSpons` int(15) NOT NULL,
  `nomSpons` varchar(30) DEFAULT NULL,
  `prenomSpons` varchar(30) DEFAULT NULL,
  `organismeSpons` varchar(30) DEFAULT NULL,
  `adrSpons` varchar(50) DEFAULT NULL,
  `telSpons` varchar(15) DEFAULT NULL,
  `emailSpons` varchar(30) DEFAULT NULL,
  `mdpSpons` varchar(20) DEFAULT NULL,
  `img` varchar(400) DEFAULT NULL,
  `isactive` varchar(1) DEFAULT NULL,
  `centre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`idSpons`, `nomSpons`, `prenomSpons`, `organismeSpons`, `adrSpons`, `telSpons`, `emailSpons`, `mdpSpons`, `img`, `isactive`, `centre`) VALUES
(7478877, 'mohamed louay', 'rabeh', NULL, 'la soukra', '21154905', 'louayrabah@gmail.com', NULL, 'Capture_d’écran_(2).png', '1', NULL),
(7478882, 'mohamed louay', 'rabeh', NULL, 'la soukra', '21154905', 'louayrabah@yahoo.com', '21154900', 'bechamel1.PNG', '1', NULL),
(7478884, 'louay', 'rabeh', NULL, 'soukra', '21154905', 'peakyblinders2im8@gmail.com', '21154905', 'capt1.PNG', '1', NULL),
(7478890, 'mohamed louay', 'rabeh', NULL, 'la soukra', '21154905', 'admin@a', 'a', 'gears47.png', '0', NULL),
(7478895, 'mohamed louay', 'rabeh', NULL, 'la soukra', '21154905', 'admin@k', 'aa', 'gears52.png', '0', NULL),
(7478900, 'Louay', 'Rabeh', NULL, 'soukra', '21154905', 'moh@lou', 'rabeh', 'round-star_394731.png', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorconf`
--

CREATE TABLE `sponsorconf` (
  `idSpons` int(15) NOT NULL,
  `nomSpons` varchar(30) DEFAULT NULL,
  `prenomSpons` varchar(30) DEFAULT NULL,
  `organismeSpons` varchar(30) DEFAULT NULL,
  `adrSpons` varchar(50) DEFAULT NULL,
  `telSpons` varchar(15) DEFAULT NULL,
  `emailSpons` varchar(30) DEFAULT NULL,
  `mdpSpons` varchar(20) DEFAULT NULL,
  `img` varchar(400) DEFAULT NULL,
  `isactive` varchar(1) DEFAULT NULL,
  `centre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorconf`
--

INSERT INTO `sponsorconf` (`idSpons`, `nomSpons`, `prenomSpons`, `organismeSpons`, `adrSpons`, `telSpons`, `emailSpons`, `mdpSpons`, `img`, `isactive`, `centre`) VALUES
(1, 'ughjklm', 'ghjk', 'jhkj', 'birmi', '+21621154905', 'peakyblinders2im8@gm', 's1', NULL, '1', NULL),
(7478818, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7478830, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7478831, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7478833, 'anas', 'Rabeh', 'iga', '111111111', '11111', 'louayrabah@gmail.com', 'GameDev', '48363367_521092361741670_8023485094930939904_n4.jpg', '1', NULL),
(7478838, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7478842, 'louay', 'rabeh', 'iga', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'GameDev', 'software_development_3903871.png', '1', NULL),
(7478846, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears.png', '1', 'GameDev'),
(7478847, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears1.png', '1', 'GameDev'),
(7478848, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears2.png', '1', 'GameDev'),
(7478849, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears3.png', '1', 'GameDev'),
(7478850, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears4.png', '1', 'GameDev'),
(7478851, 'Mohamed Louay', 'Rabeh', 'Indie Games Association', 'La Soukra', '21154905', 'louayrabah@gmail.com', 'Rabeh21154905', 'gears5.png', '1', 'GameDev'),
(7478885, 'mohamed louay', 'rabeh', NULL, 'la soukra', '21154905', 'admin@ad', 'admin', 'gears42.png', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achatpack`
--
ALTER TABLE `achatpack`
  ADD PRIMARY KEY (`idAchat`),
  ADD KEY `fk_achat1` (`idPack`),
  ADD KEY `fk_achat2` (`idSpons`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCateg`),
  ADD UNIQUE KEY `libCateg` (`libCateg`);

--
-- Indexes for table `codeconf`
--
ALTER TABLE `codeconf`
  ADD PRIMARY KEY (`idConf`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `fk_demande1` (`idEvent`),
  ADD KEY `fk_demande2` (`idSpons`),
  ADD KEY `fk_demande3` (`idOrg`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `fk_event` (`idOrg`);

--
-- Indexes for table `notifadmin`
--
ALTER TABLE `notifadmin`
  ADD PRIMARY KEY (`idNotif_admin`);

--
-- Indexes for table `organisateur`
--
ALTER TABLE `organisateur`
  ADD PRIMARY KEY (`idOrg`);

--
-- Indexes for table `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`idPack`),
  ADD KEY `FK_pack` (`idEvent`) USING BTREE;

--
-- Indexes for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`idSous_categ`),
  ADD UNIQUE KEY `libSous_categ` (`libSous_categ`),
  ADD KEY `Fk_sous_categ` (`idCateg`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`idSpons`),
  ADD UNIQUE KEY `emailSpons` (`emailSpons`),
  ADD UNIQUE KEY `mdpSpons` (`mdpSpons`);

--
-- Indexes for table `sponsorconf`
--
ALTER TABLE `sponsorconf`
  ADD PRIMARY KEY (`idSpons`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achatpack`
--
ALTER TABLE `achatpack`
  MODIFY `idAchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `codeconf`
--
ALTER TABLE `codeconf`
  MODIFY `idConf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvent` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifadmin`
--
ALTER TABLE `notifadmin`
  MODIFY `idNotif_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `organisateur`
--
ALTER TABLE `organisateur`
  MODIFY `idOrg` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pack`
--
ALTER TABLE `pack`
  MODIFY `idPack` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `idSous_categ` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `idSpons` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7478913;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achatpack`
--
ALTER TABLE `achatpack`
  ADD CONSTRAINT `fk_achat1` FOREIGN KEY (`idPack`) REFERENCES `pack` (`idPack`),
  ADD CONSTRAINT `fk_achat2` FOREIGN KEY (`idSpons`) REFERENCES `sponsor` (`idSpons`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande1` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`),
  ADD CONSTRAINT `fk_demande2` FOREIGN KEY (`idSpons`) REFERENCES `sponsor` (`idSpons`),
  ADD CONSTRAINT `fk_demande3` FOREIGN KEY (`idOrg`) REFERENCES `organisateur` (`idOrg`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`idOrg`) REFERENCES `organisateur` (`idOrg`);

--
-- Constraints for table `pack`
--
ALTER TABLE `pack`
  ADD CONSTRAINT `FK_pack` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`) ON DELETE CASCADE;

--
-- Constraints for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `Fk_sous_categ` FOREIGN KEY (`idCateg`) REFERENCES `categorie` (`idCateg`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
