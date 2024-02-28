-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 06:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` bigint(12) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `userRole` int(1) DEFAULT NULL,
  `isActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `userRole`, `isActive`) VALUES
                (1, 'TowntechInnovations', 'admin@admin.com', 09560563149, 'towntechinnovations@gmail.com', 'ecb2dfbe7d2cb1ee6a0b9862f523cd8e', '2022-10-20 18:30:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblemergencyreport`
--

CREATE TABLE `tblemergencyreport` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `location` mediumtext DEFAULT NULL,
  `messgae` mediumtext DEFAULT NULL,
  `assignTo` int(11) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `assignTime` varchar(255) DEFAULT NULL,
  `assignTme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemergencyreport`
--

INSERT INTO `tblemergencyreport` (`id`, `fullName`, `mobileNumber`, `location`, `messgae`, `assignTo`, `status`, `postingDate`, `assignTime`, `assignTme`) VALUES
(1, 'Anuj Kumar', 1234567890, 'New Delhi india', 'NA', 2, 'Request Completed', '2022-04-19 14:55:50', NULL, '26-04-22 03:04:11'),
(2, 'Rahul', 1425362514, 'H 23423 ABC Street  Noida Sector 2 UP', 'NA', 3, 'Request Completed', '2022-04-23 09:02:18', NULL, '20-10-22 11:10:01'),
(3, 'Amit Kumar', 4758963210, 'A 123 Sector4 Noida UP', 'Fire in Home', 2, 'Request Completed', '2022-04-27 01:46:41', NULL, '27-04-22 03:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblemergencyrequesthistory`
--

CREATE TABLE `tblemergencyrequesthistory` (
  `id` int(11) NOT NULL,
  `requestId` int(11) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemergencyrequesthistory`
--

INSERT INTO `tblemergencyrequesthistory` (`id`, `requestId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'Team On the Way', 'Team is on the way.', '2022-04-26 01:35:35'),
(2, 1, 'Fire Relief Work in Progress', 'Team work in progress.', '2022-04-26 01:42:18'),
(3, 1, 'Request Completed', 'Fire controlled. Request completed', '2022-04-26 01:43:29'),
(4, 3, 'Team On the Way', 'Team is on the for relief work.', '2022-04-27 01:47:48'),
(5, 3, 'Fire Relief Work in Progress', 'Fire relief work in progress. Team will control the fire soon.', '2022-04-27 01:48:20'),
(6, 3, 'Request Completed', 'Job FInished. Fire is under control now.', '2022-04-27 01:48:49'),
(7, 2, 'Team On the Way', 'as', '2022-10-20 09:49:46'),
(8, 2, 'Fire Relief Work in Progress', ',', '2022-10-20 09:51:09'),
(9, 2, 'Request Completed', 'd', '2022-10-20 09:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblsite`
--

CREATE TABLE `tblsite` (
  `id` int(11) NOT NULL,
  `siteTitle` varchar(255) DEFAULT NULL,
  `siteLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsite`
--

INSERT INTO `tblsite` (`id`, `siteTitle`, `siteLogo`) VALUES
(1, 'OFRS', 'd29fc9cfae64c7c76f8066fa7f4919af.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblteams`
--

CREATE TABLE `tblteams` (
  `id` int(11) NOT NULL,
  `teamName` varchar(255) DEFAULT NULL,
  `teamLeaderName` varchar(255) DEFAULT NULL,
  `teamLeadMobno` bigint(12) DEFAULT NULL,
  `teamMembers` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteams`
--

INSERT INTO `tblteams` (`id`, `teamName`, `teamLeaderName`, `teamLeadMobno`, `teamMembers`, `postingDate`) VALUES
(6, 'SOLID GROUP', 'Dugs', 9999, 'Sophia, Jecktopher, Emel, Dugay', '2022-10-20 16:29:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemergencyreport`
--
ALTER TABLE `tblemergencyreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemergencyrequesthistory`
--
ALTER TABLE `tblemergencyrequesthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsite`
--
ALTER TABLE `tblsite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteams`
--
ALTER TABLE `tblteams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemergencyreport`
--
ALTER TABLE `tblemergencyreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemergencyrequesthistory`
--
ALTER TABLE `tblemergencyrequesthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsite`
--
ALTER TABLE `tblsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblteams`
--
ALTER TABLE `tblteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
