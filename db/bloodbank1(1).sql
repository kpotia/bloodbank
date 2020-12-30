-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 11:52 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `usersname` varchar(40) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `usersname`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bloodunit`
--

DROP TABLE IF EXISTS `bloodunit`;
CREATE TABLE IF NOT EXISTS `bloodunit` (
  `buid` int(11) NOT NULL AUTO_INCREMENT,
  `donation` int(11) DEFAULT NULL,
  `bloodGroup` varchar(5) DEFAULT NULL,
  `available` int(11) DEFAULT '1',
  `request` int(11) DEFAULT NULL,
  PRIMARY KEY (`buid`),
  KEY `donation` (`donation`),
  KEY `request` (`request`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodunit`
--

INSERT INTO `bloodunit` (`buid`, `donation`, `bloodGroup`, `available`, `request`) VALUES
(1, 1, 'O+', 1, NULL),
(2, 1, 'O+', 1, NULL),
(3, 2, 'A+', 1, NULL),
(4, 2, 'A+', 1, NULL),
(5, 2, 'A+', 1, NULL),
(6, 3, 'AB+', 1, NULL),
(7, 3, 'AB+', 1, NULL),
(8, 4, 'A+', 1, NULL),
(9, 4, 'A+', 1, NULL),
(10, 4, 'A+', 1, NULL),
(11, 5, 'AB+', 1, NULL),
(12, 5, 'AB+', 1, NULL),
(13, 6, 'O+', 1, NULL),
(14, 6, 'O+', 1, NULL),
(15, 7, 'O+', 1, NULL),
(16, 7, 'O+', 1, NULL),
(17, 8, 'O+', 1, NULL),
(18, 8, 'O+', 1, NULL),
(19, 8, 'O+', 1, NULL),
(20, 9, 'O+', 1, NULL),
(21, 9, 'O+', 1, NULL),
(22, 9, 'O+', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

DROP TABLE IF EXISTS `camp`;
CREATE TABLE IF NOT EXISTS `camp` (
  `cpid` int(9) NOT NULL AUTO_INCREMENT,
  `cp_name` varchar(150) DEFAULT NULL,
  `city` int(5) DEFAULT NULL,
  `region` int(5) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cpid`),
  KEY `city` (`city`),
  KEY `region` (`region`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`cpid`, `cp_name`, `city`, `region`, `street`, `phone`) VALUES
(1, 'Kokomlemle', 2, 1, 'Adjo 13', '+233306686'),
(2, 'Airport', 2, 1, 'RRishman 13', '+2333052096'),
(3, 'Ortega ', 1, 1, 'Liberation 89 ', '+233 300 520 96'),
(5, 'IPMC', 1, 1, 'viesnln', '+233 78748747'),
(6, 'Dambai Cp', 3, 2, 'trii', '1345452');

-- --------------------------------------------------------

--
-- Table structure for table `campmanager`
--

DROP TABLE IF EXISTS `campmanager`;
CREATE TABLE IF NOT EXISTS `campmanager` (
  `cmid` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `camp` int(9) DEFAULT NULL,
  PRIMARY KEY (`cmid`),
  KEY `camp` (`camp`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campmanager`
--

INSERT INTO `campmanager` (`cmid`, `username`, `password`, `camp`) VALUES
(1, 'campmgr', '1234', 2),
(2, 'ortegamgr', '1234', 3),
(3, 'otimgr', '1234', 4),
(4, 'ipmc_mgr', '1234', 5),
(5, 'Dambai', '1234', 6);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) DEFAULT NULL,
  `region` int(3) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `region` (`region`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `c_name`, `region`) VALUES
(1, 'tema', 1),
(2, 'Accra', 1),
(3, 'Dambai', 2),
(4, 'Techiman', 3),
(5, 'Goaso', 4),
(6, 'Sunyani', 5),
(7, 'Nalerigu', 6),
(8, 'Koforidua', 11),
(9, 'Kumasu', 12),
(10, 'Cape Coast', 13),
(11, 'Tamale', 14),
(12, 'Bolgatanaga', 15),
(13, 'Wa', 16),
(14, 'Aflao', 9);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `camp` int(9) DEFAULT NULL,
  `units` int(2) DEFAULT NULL,
  `dateofdon` date DEFAULT NULL,
  `donor` int(7) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `camp` (`camp`),
  KEY `donor` (`donor`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`did`, `camp`, `units`, `dateofdon`, `donor`) VALUES
(1, 2, 2, '2019-10-01', 1),
(2, 1, 3, '2019-10-01', 2),
(3, 3, 2, '2019-10-01', 3),
(4, 3, 3, '2019-10-01', 2),
(5, 2, 2, '2019-11-05', 3),
(6, 1, 2, '2019-11-23', 6),
(7, 1, 2, '2019-11-23', 6),
(8, 1, 3, '2019-11-23', 20),
(9, 6, 3, '2019-11-23', 20);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(5) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`rid`, `r_name`) VALUES
(1, 'Greater Accra'),
(2, 'Oti'),
(3, 'Bono East'),
(4, 'Ahafo '),
(5, 'Bono '),
(6, 'North East'),
(7, 'Savannah '),
(8, 'Western Region'),
(9, 'Volta '),
(10, 'Western North'),
(11, 'Eastern'),
(12, 'Ashanti'),
(13, 'Central '),
(14, 'Northern '),
(15, 'Upper East'),
(16, 'Upper West');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `rqid` int(11) NOT NULL AUTO_INCREMENT,
  `city` int(5) DEFAULT NULL,
  `bloodGroup` varchar(5) DEFAULT NULL,
  `nb_of_units` int(2) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rqid`),
  KEY `city` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rqid`, `city`, `bloodGroup`, `nb_of_units`, `datetime`) VALUES
(1, 1, 'B+', 3, '2019-10-02 07:45:35'),
(2, 2, 'B+', 3, '2019-10-02 07:45:35'),
(3, 3, 'B+', 2, '2019-10-02 07:45:35'),
(4, 2, 'A+', 3, '2019-11-23 11:29:56'),
(5, 4, 'A+', 6, '2019-11-23 11:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(7) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `bloodGroup` varchar(5) DEFAULT NULL,
  `city` int(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `city` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `gender`, `bloodGroup`, `city`, `email`, `password`, `phone`) VALUES
(1, 'junior', 'francisco', NULL, 'O+', 3, 'jr@mail.com', '1234', '+229 0907047'),
(2, 'Kwamena ', 'kk', NULL, 'A+', 2, 'kwamena@mail.com', '1234', '+233 0908083'),
(4, 'patrick', 'ametepe', NULL, 'B+', 1, 'pat@gmail.com', '1234', '054 363 1164'),
(3, 'patrick', 'kpoti', NULL, 'AB+', 1, 'kpoti@mail.com', '1234', '6789'),
(6, 'test ', 'tes1``', NULL, 'O+', 4, 'pat@gmail.com', '1234', ''),
(7, 'claude', 'ametepe', NULL, 'O-', 1, 'pat@mail.com', '1234', '+233 78748747'),
(8, 'Hammond', 'NII', NULL, 'A+', 1, 'hammond@mail.com', '1234', '1010101'),
(9, 'Hammond', 'Kwa', NULL, 'O-', 3, 'pat@gmail.com', '1234', '+233 78748747'),
(19, 'Kojo', 'Thom', NULL, 'B+', 2, 'kojo@gmail.com', '1234', NULL),
(20, 'Hammond', 'Kwa', NULL, 'O+', 2, 'kwam@gmail.com', '1234', NULL),
(21, 'JOoko', 'koKO', NULL, 'O-', 11, 'ree@koko', '1234', '+233 78748747');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
