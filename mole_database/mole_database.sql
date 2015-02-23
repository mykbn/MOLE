-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2015 at 02:14 PM
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
`ID` int(10) NOT NULL,
  `Lists` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `capstone`
--

INSERT INTO `capstone` (`ID`, `Lists`) VALUES
(37, 'To-Do-List'),
(38, 'asdasda'),
(39, 'List');

-- --------------------------------------------------------

--
-- Table structure for table `capstone_cards`
--

CREATE TABLE IF NOT EXISTS `capstone_cards` (
`ID` int(11) NOT NULL,
  `List` varchar(100) NOT NULL,
  `CardTitle` varchar(100) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Created_By` varchar(200) NOT NULL,
  `Date_Created` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `capstone_cards`
--

INSERT INTO `capstone_cards` (`ID`, `List`, `CardTitle`, `Description`, `Created_By`, `Date_Created`) VALUES
(1, 'To-Do-List', '123', '', '', ''),
(2, 'asdasda', '456', '', '', ''),
(3, 'To-Do-List', 'PANGET SI PAT', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cisco`
--

CREATE TABLE IF NOT EXISTS `cisco` (
`ID` int(10) NOT NULL,
  `Lists` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cisco`
--

INSERT INTO `cisco` (`ID`, `Lists`) VALUES
(1, 'List1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `Classes`, `Password`, `Class_Description`, `Created_By`) VALUES
(1, 'Capstone', '123', 'asdadwdqdqwe', 'Mykel Abania'),
(2, 'Cisco', '123', 'Floooooorrrr Plaaaaaannn', 'Mykel Abania'),
(3, 'PHP', '123', 'LALALALALALALA', 'Steph Macaraeg'),
(4, 'History', '123', 'HISTORYYYY!', 'Mykel Abania'),
(5, 'Math', '123', 'asdasdasdas', 'Mykel Abania');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
`ID` int(10) NOT NULL,
  `1101373` varchar(50) NOT NULL,
  `1111111` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`ID`, `1101373`, `1111111`) VALUES
(3, '', 'Capstone'),
(19, 'Capstone', ''),
(20, 'Cisco', ''),
(21, 'PHP', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`ID` int(10) NOT NULL,
  `Lists` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `math`
--

CREATE TABLE IF NOT EXISTS `math` (
`ID` int(10) NOT NULL,
  `Lists` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `php`
--

CREATE TABLE IF NOT EXISTS `php` (
`ID` int(10) NOT NULL,
  `Lists` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Indexes for table `capstone_cards`
--
ALTER TABLE `capstone_cards`
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
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `math`
--
ALTER TABLE `math`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `php`
--
ALTER TABLE `php`
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
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `capstone_cards`
--
ALTER TABLE `capstone_cards`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cisco`
--
ALTER TABLE `cisco`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `math`
--
ALTER TABLE `math`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `php`
--
ALTER TABLE `php`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
