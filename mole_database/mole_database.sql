-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 09:50 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mole_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `capstone`
--

CREATE TABLE IF NOT EXISTS `capstone` (
`ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cisco`
--

CREATE TABLE IF NOT EXISTS `cisco` (
`ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`ID` int(11) NOT NULL,
  `Classes` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Class_Description` varchar(200) NOT NULL,
  `Created_By` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `Classes`, `Password`, `Class_Description`, `Created_By`) VALUES
(1, 'Capstone', '123', 'lalala', 'Mykel Abania'),
(2, 'CISCO', '123', 'asdasdasdadsa', 'Mykel Abania');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
`ID` int(10) NOT NULL,
  `1101373` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`ID`, `1101373`) VALUES
(4, 'Capstone'),
(5, 'CISCO'),
(6, 'Capstone');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE IF NOT EXISTS `professors` (
  `ID_No` varchar(8) NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `School_College` text NOT NULL,
  `Position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`ID_No`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`) VALUES
('1101373', 'Mykel', 'Abania', 'admin', 'admin', 'mntabania@ceu.edu.ph', 'Sci-Tech', 'Professor'),
('1111112', 'Patricia PAMPAHABAasdasdasdwadaddwd', 'Dela Rosa', 'pat', 'pass', 'pudelarosa@ceu.edu.ph', 'Sci-Tech', 'Professor'),
('1111113', 'Steph', 'Macaraeg', 'steph', 'pass', 'mntabania@ceu.edu.ph', 'Sci-Tech', 'Professor'),
('1111114', 'Channa', 'Reyes', 'channa', 'pass', 'mntabania@ceu.edu.ph', 'Sci-Tech', 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ID_No` varchar(8) NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `School_College` text NOT NULL,
  `Position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID_No`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`) VALUES
('1111111', 'Mykel', 'Abania', 'stud', 'stud', 'mntabania@ceu.edu.ph', 'Sci-Tech', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capstone`
--
ALTER TABLE `capstone`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cisco`
--
ALTER TABLE `cisco`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
 ADD PRIMARY KEY (`ID_No`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`ID_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capstone`
--
ALTER TABLE `capstone`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cisco`
--
ALTER TABLE `cisco`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
