-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 04:17 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id_admin_user` int(11) NOT NULL,
  `emri` varchar(80) NOT NULL,
  `email` text NOT NULL,
  `numri` int(11) DEFAULT NULL,
  `fjalekalimi` text NOT NULL,
  `data_regjistrimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipi` set('1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id_admin_user`, `emri`, `email`, `numri`, `fjalekalimi`, `data_regjistrimit`, `tipi`) VALUES
(9, 'DEMO', 'demo@my-course.cf', 690000000, 'demo', '2019-05-06 13:59:18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `klasa`
--

CREATE TABLE `klasa` (
  `id_klasa` int(11) NOT NULL,
  `id_kursi` int(11) DEFAULT NULL,
  `id_mesues` int(11) DEFAULT NULL,
  `id_admin_user` int(11) NOT NULL,
  `emri_klases` varchar(80) NOT NULL,
  `e_hene` time DEFAULT NULL,
  `e_marte` time DEFAULT NULL,
  `e_merkure` time DEFAULT NULL,
  `e_enjte` time DEFAULT NULL,
  `e_premte` time DEFAULT NULL,
  `e_shtune` time DEFAULT NULL,
  `e_diele` time DEFAULT NULL,
  `data_krijimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasa`
--

INSERT INTO `klasa` (`id_klasa`, `id_kursi`, `id_mesues`, `id_admin_user`, `emri_klases`, `e_hene`, `e_marte`, `e_merkure`, `e_enjte`, `e_premte`, `e_shtune`, `e_diele`, `data_krijimit`) VALUES
(30, 26, 12, 9, 'B2', '19:00:00', '19:00:00', '00:00:00', '00:00:00', '00:00:00', '19:00:00', '00:00:00', '2019-05-06 14:05:06'),
(31, 27, 13, 9, 'F2', '12:00:00', '00:00:00', '00:00:00', '12:00:00', '00:00:00', '00:00:00', '12:00:00', '2019-05-06 14:05:47'),
(32, 28, 14, 9, 'ANG B2', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '14:00:00', '14:00:00', '2019-05-06 14:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `id_admin_user` int(11) NOT NULL,
  `emri_kursit` varchar(80) NOT NULL,
  `data_krijimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `id_admin_user`, `emri_kursit`, `data_krijimit`) VALUES
(26, 9, 'BACK END', '2019-05-06 14:00:47'),
(27, 9, 'FRONT END', '2019-05-06 14:00:55'),
(28, 9, 'Anglisht -Nivel B2', '2019-05-06 14:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `mandat_pagese`
--

CREATE TABLE `mandat_pagese` (
  `id_mandat_pagese` int(11) NOT NULL,
  `id_admin_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `muaji` varchar(60) DEFAULT NULL,
  `shuma` int(11) DEFAULT NULL,
  `id_kursi` int(11) NOT NULL,
  `data_berjes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandat_pagese`
--

INSERT INTO `mandat_pagese` (`id_mandat_pagese`, `id_admin_user`, `id_student`, `muaji`, `shuma`, `id_kursi`, `data_berjes`) VALUES
(23, 9, 13, 'Janar', 3500, 26, '2019-05-06 14:10:26'),
(24, 9, 13, 'Shkurt', 3500, 26, '2019-05-06 14:10:51'),
(25, 9, 14, 'Janar', 3200, 27, '2019-05-06 14:11:10'),
(26, 9, 16, 'Janar', 1500, 28, '2019-05-06 14:12:01'),
(27, 9, 15, 'Janar', 3500, 26, '2019-05-06 14:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `mesues`
--

CREATE TABLE `mesues` (
  `id_mesues` int(11) NOT NULL,
  `id_admin_user` int(11) NOT NULL,
  `emri` varchar(60) NOT NULL,
  `mbiemri` varchar(60) NOT NULL,
  `email` text,
  `numri` int(11) DEFAULT NULL,
  `ditelindja` date DEFAULT NULL,
  `pershkrimi` text,
  `data_regjistrimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesues`
--

INSERT INTO `mesues` (`id_mesues`, `id_admin_user`, `emri`, `mbiemri`, `email`, `numri`, `ditelindja`, `pershkrimi`, `data_regjistrimit`) VALUES
(12, 9, 'John', 'Smith', 'john@gmail.com', 680000000, '1997-05-14', 'Mesues BACK END', '2019-05-06 14:02:13'),
(13, 9, 'Aleks', 'Alini', 'aleks@gmail.com', 690000000, '1992-05-23', 'Mesues FRONT END', '2019-05-06 14:03:07'),
(14, 9, 'Ledjo', 'Ledi', 'ledjo@gmail.com', 690000000, '1999-05-04', 'Mesues anglishtje ', '2019-05-06 14:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `shitje_artikulli`
--

CREATE TABLE `shitje_artikulli` (
  `id_artikull` int(11) NOT NULL,
  `id_admin_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `emri_artikullit` varchar(80) DEFAULT NULL,
  `sasia` int(11) DEFAULT NULL,
  `shuma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shitje_artikulli`
--

INSERT INTO `shitje_artikulli` (`id_artikull`, `id_admin_user`, `id_student`, `emri_artikullit`, `sasia`, `shuma`) VALUES
(6, 9, 13, 'Web Development', 1, 1800),
(7, 9, 14, 'Web Design', 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `id_admin_user` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL,
  `id_klasa` int(11) NOT NULL,
  `emri` varchar(60) DEFAULT NULL,
  `mbiemri` varchar(60) DEFAULT NULL,
  `email` text,
  `numri_personal` int(11) DEFAULT NULL,
  `numri_prindit` int(11) DEFAULT NULL,
  `ditelindja` date DEFAULT NULL,
  `pershkrimi` text,
  `data_regjistrimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `id_admin_user`, `id_kursi`, `id_klasa`, `emri`, `mbiemri`, `email`, `numri_personal`, `numri_prindit`, `ditelindja`, `pershkrimi`, `data_regjistrimit`) VALUES
(13, 9, 26, 30, 'Artur', 'Artur', 'artur@gmail.com', 690000000, 690000000, '2000-05-08', '', '2019-05-06 14:07:35'),
(14, 9, 27, 31, 'Armand', 'Armand', 'armand@gmail.com', 690000000, 690000000, '2001-05-08', '', '2019-05-06 14:08:16'),
(15, 9, 26, 30, 'Altin', 'Altin', 'altin@gmail.com', 690000000, 690000000, '1998-05-03', '', '2019-05-06 14:09:03'),
(16, 9, 28, 32, 'Arben', 'Arben', 'arben@gmail.com', 690000000, 690000000, '1999-05-15', '', '2019-05-06 14:09:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id_admin_user`);

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasa`),
  ADD KEY `id_kursi` (`id_kursi`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_admin_user` (`id_admin_user`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`),
  ADD KEY `id_admin_user` (`id_admin_user`);

--
-- Indexes for table `mandat_pagese`
--
ALTER TABLE `mandat_pagese`
  ADD PRIMARY KEY (`id_mandat_pagese`),
  ADD KEY `id_admin_user` (`id_admin_user`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Indexes for table `mesues`
--
ALTER TABLE `mesues`
  ADD PRIMARY KEY (`id_mesues`),
  ADD KEY `id_admin_user` (`id_admin_user`);

--
-- Indexes for table `shitje_artikulli`
--
ALTER TABLE `shitje_artikulli`
  ADD PRIMARY KEY (`id_artikull`),
  ADD KEY `id_admin_user` (`id_admin_user`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_admin_user` (`id_admin_user`),
  ADD KEY `id_kursi` (`id_kursi`),
  ADD KEY `id_klasa` (`id_klasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id_admin_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mandat_pagese`
--
ALTER TABLE `mandat_pagese`
  MODIFY `id_mandat_pagese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mesues`
--
ALTER TABLE `mesues`
  MODIFY `id_mesues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shitje_artikulli`
--
ALTER TABLE `shitje_artikulli`
  MODIFY `id_artikull` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`id_admin_user`) REFERENCES `admin_user` (`id_admin_user`);

--
-- Constraints for table `mandat_pagese`
--
ALTER TABLE `mandat_pagese`
  ADD CONSTRAINT `mandat_pagese_ibfk_1` FOREIGN KEY (`id_admin_user`) REFERENCES `admin_user` (`id_admin_user`);

--
-- Constraints for table `mesues`
--
ALTER TABLE `mesues`
  ADD CONSTRAINT `mesues_ibfk_1` FOREIGN KEY (`id_admin_user`) REFERENCES `admin_user` (`id_admin_user`);

--
-- Constraints for table `shitje_artikulli`
--
ALTER TABLE `shitje_artikulli`
  ADD CONSTRAINT `shitje_artikulli_ibfk_1` FOREIGN KEY (`id_admin_user`) REFERENCES `admin_user` (`id_admin_user`),
  ADD CONSTRAINT `shitje_artikulli_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_admin_user`) REFERENCES `admin_user` (`id_admin_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
