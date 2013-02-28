-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2013 at 09:19 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ASCapstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `OrderDetailID` int(11) NOT NULL,
  `CommentDetailID` int(11) DEFAULT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`OrderDetailID`),
  KEY `CommentDetailID` (`CommentDetailID`),
  KEY `CommentDetailID_2` (`CommentDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CommentDetail`
--

CREATE TABLE IF NOT EXISTS `CommentDetail` (
  `CommentDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `CommentType` varchar(30) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CommentDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE IF NOT EXISTS `OrderDetail` (
  `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `Quantity` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `StatusID` int(2) DEFAULT '1',
  `ProjectedShipDate` date DEFAULT NULL,
  `ActualShipDate` date DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `ShipDate` date DEFAULT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `PONumber` int(11) DEFAULT NULL,
  `SpecialAssignment1` varchar(250) DEFAULT NULL,
  `SpecialAssignment2` varchar(250) DEFAULT NULL,
  `SpecialAssignment3` varchar(250) DEFAULT NULL,
  `PricePaid` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  `Comments` text,
  `LeadPerson` varchar(3) DEFAULT NULL,
  `Credit` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`OrderDetailID`),
  KEY `OrderID` (`UserID`),
  KEY `ProductID` (`ProductID`),
  KEY `TaskID` (`TaskID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `OrderDetail`
--

INSERT INTO `OrderDetail` (`OrderDetailID`, `Quantity`, `ProductID`, `StatusID`, `ProjectedShipDate`, `ActualShipDate`, `OrderDate`, `ShipDate`, `TaskID`, `PONumber`, `SpecialAssignment1`, `SpecialAssignment2`, `SpecialAssignment3`, `PricePaid`, `UserID`, `Inactive`, `Comments`, `LeadPerson`, `Credit`) VALUES
(14, 233, NULL, NULL, NULL, NULL, '2013-02-12', NULL, NULL, 2147483647, NULL, NULL, NULL, 0, NULL, NULL, 'jkmbmhmhv', NULL, NULL),
(15, 3, NULL, NULL, NULL, NULL, '2013-02-12', NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 'asasda', NULL, NULL),
(16, 3, NULL, NULL, NULL, NULL, '2013-02-12', NULL, NULL, 1111, NULL, NULL, NULL, 0, 10, NULL, 'estes', NULL, NULL),
(20, 1, 8, NULL, NULL, NULL, '2013-02-13', NULL, NULL, 123123, NULL, NULL, NULL, 0, 10, NULL, 'yryyutyytu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(30) NOT NULL,
  `ProductDescription` varchar(150) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `Inactive`) VALUES
(3, 'Series1000', 'Series 1000', 100, NULL),
(4, 'Series2000', 'Series 2000', 200, NULL),
(5, 'Series3000', 'Series 3000', 300, NULL),
(6, 'Series4000', 'Series 4000', 400, NULL),
(7, 'Series5000', 'Series 5000', 500, NULL),
(8, 'Productbot 1900', 'Featured on product bot magazine as best product bot of the year.', 1900, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDesc` varchar(30) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`StatusID`, `StatusDesc`, `Inactive`) VALUES
(1, 'Ordered', NULL),
(2, 'In Process', NULL),
(3, 'In Process', NULL),
(4, 'Completed', NULL),
(5, 'Shipped', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TaskTable`
--

CREATE TABLE IF NOT EXISTS `TaskTable` (
  `TaskID` int(5) NOT NULL,
  `OrderDetailID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`TaskID`),
  KEY `OrderDetailID` (`OrderDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserTable`
--

CREATE TABLE IF NOT EXISTS `UserTable` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Company` varchar(30) DEFAULT NULL,
  `Street` varchar(50) NOT NULL,
  `Street2` varchar(50) DEFAULT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `DOB` date NOT NULL,
  `PermissionLevel` int(2) NOT NULL DEFAULT '1',
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  `Credit` text,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `UserTable`
--

INSERT INTO `UserTable` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `Company`, `Street`, `Street2`, `City`, `State`, `Zip`, `Phone`, `Email`, `DOB`, `PermissionLevel`, `Username`, `Password`, `Department`, `Inactive`, `Credit`) VALUES
(1, 'admin', '', 'admin', 'Administrator', 'admin', NULL, 'admin', 'am', 'admin', '5555555555', 'admin', '2013-02-01', 1, 'admin', 'admin', NULL, NULL, NULL),
(10, 'Seth', '', 'Krasnianski', 'SJK Studios', '155 county street', '', 'rehoboth', 'MA', '02769', '5082521273', 'sethkrasnianski@mac.com', '1990-10-05', 3, 'sjkedo38', '123', NULL, NULL, NULL),
(35, 'Seth', '', 'Krasnianski', '1', '155 county street', '', 'rehoboth', 'MA', '02769', '5082521273', 'sethkrasnianski@msac.com', '0000-00-00', 3, '1', '1', NULL, NULL, NULL),
(36, 'joh', '', 'alan', 'J. Alen company', '123 street', '', 'city', 'ca', '09112', '4119223232', 'jalen@jalen.com', '1990-10-05', 1, 'jalen', '123', NULL, NULL, NULL),
(40, 'test', '', 'test', 'test', 'test', '', 'test', 'te', '12333', '1999999999', 'test@test.com', '1990-10-05', 2, 'test', 'test', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_4` FOREIGN KEY (`OrderDetailID`) REFERENCES `OrderDetail` (`OrderDetailID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Comment_ibfk_6` FOREIGN KEY (`CommentDetailID`) REFERENCES `CommentDetail` (`CommentDetailID`) ON DELETE SET NULL;

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `OrderDetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Product` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `TaskTable`
--
ALTER TABLE `TaskTable`
  ADD CONSTRAINT `TaskTable_ibfk_1` FOREIGN KEY (`OrderDetailID`) REFERENCES `OrderDetail` (`OrderDetailID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `TaskTable_ibfk_2` FOREIGN KEY (`TaskID`) REFERENCES `OrderDetail` (`TaskID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
