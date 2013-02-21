-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2013 at 03:58 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ASCapstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
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

CREATE TABLE `CommentDetail` (
  `CommentDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `CommentType` varchar(30) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CommentDetailID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `Qantity` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `StatusID` int(2) NOT NULL DEFAULT '1',
  `ProjectedShipDate` date NOT NULL,
  `OrderDate` date NOT NULL,
  `ShipDate` date DEFAULT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `PONumber` int(11) DEFAULT NULL,
  `SpecialAssignment1` varchar(250) DEFAULT NULL,
  `SpecialAssignment2` varchar(250) DEFAULT NULL,
  `SpecialAssignment3` varchar(250) DEFAULT NULL,
  `PricePaid` int(11) DEFAULT NULL,
  `OrderID` int(11) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`OrderDetailID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`),
  KEY `TaskID` (`TaskID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(30) NOT NULL,
  `ProductDescription` varchar(150) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `Inactive`) VALUES
(3, 'Series1000', 'Series 1000', 100, NULL),
(4, 'Series2000', 'Series 2000', 200, NULL),
(5, 'Series3000', 'Series 3000', 300, NULL),
(6, 'Series4000', 'Series 4000', 400, NULL),
(7, 'Series5000', 'Series 5000', 500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDesc` varchar(30) NOT NULL,
  `Inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE `TaskTable` (
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

CREATE TABLE `UserTable` (
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
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `UserTable`
--

INSERT INTO `UserTable` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `Company`, `Street`, `Street2`, `City`, `State`, `Zip`, `Phone`, `Email`, `DOB`, `PermissionLevel`, `Username`, `Password`, `Department`, `Inactive`) VALUES
(1, 'admin', '', 'admin', NULL, 'admin', NULL, 'admin', 'am', 'admin', '5555555555', 'admin', '2013-02-01', 1, 'admin', 'admin', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_6` FOREIGN KEY (`CommentDetailID`) REFERENCES `CommentDetail` (`CommentDetailID`) ON DELETE SET NULL,
  ADD CONSTRAINT `Comment_ibfk_4` FOREIGN KEY (`OrderDetailID`) REFERENCES `OrderDetail` (`OrderDetailID`) ON UPDATE CASCADE;

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `OrderDetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderDetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Product` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `UserTable` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `TaskTable`
--
ALTER TABLE `TaskTable`
  ADD CONSTRAINT `TaskTable_ibfk_2` FOREIGN KEY (`TaskID`) REFERENCES `OrderDetail` (`TaskID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `TaskTable_ibfk_1` FOREIGN KEY (`OrderDetailID`) REFERENCES `OrderDetail` (`OrderDetailID`) ON UPDATE CASCADE;
