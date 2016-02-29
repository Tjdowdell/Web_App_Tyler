-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 05:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_tyler`
--
CREATE DATABASE IF NOT EXISTS `database_tyler` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database_tyler`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Feb 09, 2016 at 01:04 AM
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifying number of cars category',
  `Description` varchar(300) NOT NULL COMMENT 'Description of cars category',
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This table is the category table containing information about a cars category' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Description`) VALUES
(1, '4 Wheel Drive'),
(2, 'Wagon'),
(3, 'Ute'),
(4, 'Sedan'),
(5, 'Hatchback');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Feb 08, 2016 at 11:51 PM
--

CREATE TABLE IF NOT EXISTS `customers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifying number of customer',
  `First_Name` varchar(50) NOT NULL COMMENT 'First name of customer',
  `Last_Name` varchar(100) NOT NULL COMMENT 'Last name of customer',
  `Address` varchar(50) NOT NULL COMMENT 'Address of customer',
  `City` varchar(100) NOT NULL COMMENT 'City customer lives in',
  `State` varchar(50) NOT NULL COMMENT 'State customer lives in',
  `Postcode` varchar(20) NOT NULL COMMENT 'Postcode of the customer',
  `Email_Address` varchar(100) NOT NULL COMMENT 'Email address of the customer',
  `Phone_Number` varchar(10) NOT NULL COMMENT 'Phone number of the customer',
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This table is the customer table containing information about customers' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `First_Name`, `Last_Name`, `Address`, `City`, `State`, `Postcode`, `Email_Address`, `Phone_Number`) VALUES
(1, 'Steve', 'Smith', '123 Random Street', 'Townsville', 'Queensland', '4818', 'steve@email.com', '1234567890'),
(2, 'Paul', 'McDonald', '456 Big Street', 'Townsville', 'Queensland', '4815', 'pmacca@email.com', '4652318771'),
(3, 'Jack', 'Daniels', '34 Alcohol Street', 'Townsville', 'Queensland', '4812', 'jdan@email.com', '9876543210'),
(5, 'Jane', 'Doe', '456 Hell Road', 'Townsville', 'Queensland', '4810', 'jdoe@email.com', '1236549870'),
(6, 'Eric', 'Cartman', '5342 South Park Street', 'Townsville', 'Queensland', '4812', 'eric@cartman.com', '655422198'),
(8, 'Bob', 'Smith', '65 Butcher Street', 'Townsville', 'Queensland', '4813', 'bob@smith.com', '6543298710');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--
-- Creation: Feb 09, 2016 at 01:03 AM
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `Manufacturer_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifying number of car manufacturer',
  `Name` varchar(100) NOT NULL COMMENT 'Name of car manufacturer',
  PRIMARY KEY (`Manufacturer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This is the table that contains info about the manufacturer' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`Manufacturer_ID`, `Name`) VALUES
(1, 'Toyota'),
(2, 'Holden'),
(3, 'Mazda'),
(4, 'Ford'),
(5, 'Nissan'),
(6, 'Mitsubishi'),
(7, 'Subaru');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--
-- Creation: Feb 09, 2016 at 11:41 PM
--

CREATE TABLE IF NOT EXISTS `sale` (
  `Recipt_No` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique number for purchase of vehicle',
  `Staff_ID` int(11) NOT NULL COMMENT 'Unique identifier for staff',
  `Customer_ID` int(11) NOT NULL COMMENT 'Unique identifier for customer',
  `Date` timestamp NOT NULL COMMENT 'Date and time of purchase',
  `Stock_No` int(11) NOT NULL COMMENT 'Unique number for number of cars in caryard',
  PRIMARY KEY (`Recipt_No`),
  KEY `Staff_ID` (`Staff_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `Stock_No` (`Stock_No`),
  KEY `Stock_No_2` (`Stock_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This is the junction table' AUTO_INCREMENT=9 ;

--
-- RELATIONS FOR TABLE `sale`:
--   `Customer_ID`
--       `customers` -> `Customer_ID`
--   `Staff_ID`
--       `salesperson` -> `Staff_ID`
--   `Stock_No`
--       `vehicles` -> `Stock_No`
--

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`Recipt_No`, `Staff_ID`, `Customer_ID`, `Date`, `Stock_No`) VALUES
(1, 1, 1, '2016-02-23 14:00:00', 1),
(2, 2, 2, '2016-03-15 14:00:00', 2),
(3, 3, 3, '2016-03-26 14:00:00', 3),
(4, 2, 3, '0000-00-00 00:00:00', 2),
(5, 2, 2, '2016-02-24 01:49:34', 3),
(6, 1, 1, '2016-02-24 01:56:47', 1),
(7, 2, 5, '2016-02-24 02:10:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--
-- Creation: Feb 09, 2016 at 01:04 AM
--

CREATE TABLE IF NOT EXISTS `salesperson` (
  `Staff_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifying number of staff',
  `First_Name` varchar(50) NOT NULL COMMENT 'First name of staff',
  `Last_Name` varchar(100) NOT NULL COMMENT 'Last name of staff',
  `Email_Address` varchar(100) NOT NULL COMMENT 'Email address of staff',
  `Phone_Number` varchar(10) NOT NULL COMMENT 'Phone number of staff',
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This is the table that contains info about the staff' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Staff_ID`, `First_Name`, `Last_Name`, `Email_Address`, `Phone_Number`) VALUES
(1, 'Donald', 'Trump', 'trumpcard@email.com', '4564564561'),
(2, 'Darryl', 'Goonbag', 'goonie@email.com', '7897897896'),
(3, 'Allahu', 'Ackbar', 'boom@email.com', '1592634870');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 15, 2016 at 02:08 AM
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Privilege` varchar(20) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Privilege`) VALUES
(1, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'Staff', '1253208465b1efa876f982d8a9e73eef', 'Staff'),
(3, 'Customer', '91ec1f9324753048c0096d036a694f86', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--
-- Creation: Feb 28, 2016 at 11:30 PM
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `VIN` int(11) NOT NULL COMMENT 'Vehicle identification number',
  `Stock_No` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique number for car in car yard',
  `Manufacturer_ID` int(11) NOT NULL COMMENT 'Unique identifying number of manufacturer',
  `Model` varchar(20) NOT NULL COMMENT 'Name of model of car',
  `Category_ID` int(11) NOT NULL COMMENT 'Unique identifying number of car category',
  `Year` varchar(4) NOT NULL COMMENT 'Year car was produced',
  `Price` varchar(10) NOT NULL COMMENT 'Price of car',
  `Kilometers` varchar(10) NOT NULL COMMENT 'Kilometers car has driven',
  `Colour` varchar(20) NOT NULL COMMENT 'Colour of car',
  `Registration` varchar(10) NOT NULL COMMENT 'Registration number of car',
  `Cylinders` varchar(3) NOT NULL COMMENT 'Number of Cylinders the car has',
  `Fuel` varchar(20) NOT NULL COMMENT 'Type of fuel the car uses',
  `Transmission` varchar(20) NOT NULL COMMENT 'Transmission of the car',
  PRIMARY KEY (`Stock_No`),
  KEY `Manufacturer_ID` (`Manufacturer_ID`,`Category_ID`),
  KEY `Category_ID` (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='This is the table that contains information about the cars' AUTO_INCREMENT=11 ;

--
-- RELATIONS FOR TABLE `vehicles`:
--   `Manufacturer_ID`
--       `manufacturer` -> `Manufacturer_ID`
--   `Category_ID`
--       `category` -> `Category_ID`
--

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`VIN`, `Stock_No`, `Manufacturer_ID`, `Model`, `Category_ID`, `Year`, `Price`, `Kilometers`, `Colour`, `Registration`, `Cylinders`, `Fuel`, `Transmission`) VALUES
(1, 1, 1, 'Land Cruiser', 1, '1991', '$7500', '420000', 'White', '123 WEB', '6', 'Diesel', 'Manual'),
(2, 2, 2, 'Maloo', 3, '2015', '$30000', '10000', 'Yellow', '345 VVV', '8', 'Unleaded', 'Manual'),
(3, 3, 3, 'Mazda 6', 2, '2008', '$19999', '50000', 'Red', '934 RVS', '6', 'Unleaded', 'Automatic'),
(4, 4, 4, 'Falcon', 4, '2007', '$9000', '110000', 'Blue', '951 RBT', '6', 'Unleaded', 'Manual'),
(5, 5, 5, 'Patrol', 1, '1995', '$5000', '300000', 'Red', '789 JZD', '6', 'Diesel', 'Manual'),
(6, 6, 6, 'Lancer', 4, '2011', '$10000', '70000', 'Silver', '685 SLV', '8', 'Unleaded', 'Automatic'),
(7, 7, 7, 'Impreza', 5, '2012', '$12000', '50000', 'Silver', '852 SBT', '8', 'Unleaded', 'Automatic'),
(8, 8, 1, 'Yaris', 5, '2010', '$6500', '40000', 'Red', '963 RBD', '6', 'Unleaded', 'Automatic'),
(9, 9, 3, 'BT-50', 3, '2006', '$7500', '80000', 'Blue', '753 LMG', '6', 'Diesel', 'Manual'),
(10, 10, 2, 'Commodore', 4, '2006', '$8000', '75000', 'White', '351 MFI', '6', 'Unleaded', 'Manual');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `salesperson` (`Staff_ID`),
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`Stock_No`) REFERENCES `vehicles` (`Stock_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`Manufacturer_ID`) REFERENCES `manufacturer` (`Manufacturer_ID`),
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
