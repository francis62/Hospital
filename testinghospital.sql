-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 04:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testinghospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `principalusers`
--

CREATE TABLE `principalusers` (
  `id` int(4) NOT NULL,
  `doctorSpecilization` varchar(50) NOT NULL,
  `doctorName` varchar(50) NOT NULL,
  `doctorAddress` varchar(50) NOT NULL,
  `doctorContact` bigint(50) NOT NULL,
  `doctorEmail` varchar(50) NOT NULL,
  `doctorPassword` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principalusers`
--

INSERT INTO `principalusers` (`id`, `doctorSpecilization`, `doctorName`, `doctorAddress`, `doctorContact`, `doctorEmail`, `doctorPassword`, `userType`, `creationDate`, `updationDate`) VALUES
(1, 'S/N', 'Francisco Moyano', 'S/N', 2612195094, 'admin@hotmail.com', '80fdda0de466393a882a7cfaca9fc7f7', 'admin', '2023-04-23', '2023-04-23 23:10:31'),
(2, 'Odontologia general', 'Adriana Arenas', 'Vandor 1647', 4231423423342, 'adriana@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 'doctor', '2023-04-23', '2023-04-23 23:11:47'),
(3, 'Kinesiologia', 'Karen Arencibo', 'Vandor 1647', 5656566554, 'karen@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 'doctor', '2023-04-23', '2023-04-23 23:12:28'),
(4, 'Bioquimica', 'Irene Lark', 'Vandor 1647', 545343455446, 'irene@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 'doctor', '2023-04-23', '2023-04-23 23:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `bloodPressure` varchar(50) NOT NULL,
  `bloodSugar` varchar(50) NOT NULL,
  `weightKg` int(50) NOT NULL,
  `temperature` int(50) NOT NULL,
  `diagnostic` varchar(50) NOT NULL,
  `recipe` longblob NOT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`id`, `patientId`, `bloodPressure`, `bloodSugar`, `weightKg`, `temperature`, `diagnostic`, `recipe`, `creationDate`, `updationDate`) VALUES
(1, 1, '125 / 85 ', '14.4', 69, 37, 'Control', '', '2023-05-04', '2023-05-04 13:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `patientContact` int(50) NOT NULL,
  `patientEmail` varchar(50) NOT NULL,
  `patientGender` varchar(50) NOT NULL,
  `patientAddress` varchar(50) NOT NULL,
  `patientAge` int(50) NOT NULL,
  `patientMedHis` varchar(50) NOT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `docId`, `patientName`, `patientContact`, `patientEmail`, `patientGender`, `patientAddress`, `patientAge`, `patientMedHis`, `creationDate`, `updationDate`) VALUES
(1, 2, 'Carla Echenort', 1231231231, 'carla@hotmail.com', 'Mujer', 'bandera de los andes 1500', 27, 'Diabetes', '2023-04-25', '2023-04-27 12:15:17'),
(2, 2, 'Marcos Adrede', 1231245345, 'marcos@hotmail.com', 'Hombre', 'barcala 100', 40, 'Hipertension', '2023-04-25', '2023-04-25 11:43:47'),
(3, 2, 'Franchesca Mundro', 2147483647, 'franchesca@hotmail.com', 'Mujer', 'Sarmiento 560', 20, 'Migrañas', '2023-04-25', '2023-04-25 11:44:11'),
(4, 2, 'Macarena Cronloco', 2147483647, 'macarena@hotmail.com', 'Mujer', 'perito moreno 100', 30, 'cefaleas', '2023-04-26', '2023-04-26 12:25:47'),
(5, 3, 'Nazarena Moyano', 2147483647, 'nazarena@hotmail.com', 'Mujer', 'Olascoaga 100', 21, 'S/EP', '2023-05-04', '2023-05-04 13:08:13'),
(6, 3, 'Francisco Moyano', 2147483647, 'francisco@hotmail.com', 'Hombre', 'Tarantino 1100', 21, 'S/EP', '2023-05-04', '2023-05-04 13:08:47'),
(7, 4, 'Marco Peña', 2147483647, 'marco@hotmail.com', 'Hombre', 'Tres rosas 1150', 20, 'S/EP', '2023-05-04', '2023-05-04 13:10:25'),
(8, 2, 'Lucas Graro', 2147483647, 'lucas@hotmail.com', 'Hombre', 'San Martin 2000', 21, 'S/EP', '2023-05-04', '2023-05-04 13:11:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `principalusers`
--
ALTER TABLE `principalusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `principalusers`
--
ALTER TABLE `principalusers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
