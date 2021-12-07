-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 05:45 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeservice`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `assigntostaff` (IN `userid` INT(11))  BEGIN
SELECT * FROM staff s INNER JOIN staffassign sa INNER JOIN booking b INNER JOIN user u INNER JOIN service ON s.StaffID=sa.StaffID AND sa.BookingID=b.BookingID AND b.UserID=u.UserID AND service.ServiceID= b.ServiceID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `UserID`, `ServiceID`, `PaymentID`, `Date`, `Time`) VALUES
(13, 21, 1, 3, '2021-12-01', '10:30:00'),
(14, 21, 5, 3, '2021-12-01', '11:30:00'),
(15, 21, 2, 3, '2021-12-01', '13:30:00'),
(16, 26, 4, 3, '2021-12-01', '15:40:00'),
(17, 31, 3, 2, '2021-12-01', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `UserID`, `ServiceID`, `Date`, `Time`) VALUES
(29, 29, 3, '2021-12-01', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `PaymentMethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentMethod`) VALUES
(1, 'Credit  Card'),
(2, 'Bank Transfer'),
(3, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `ServiceID`, `Rating`, `Comment`) VALUES
(3, 31, 1, 4, 'Cool');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(11) NOT NULL,
  `picture` varchar(11) NOT NULL,
  `ServiceName` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceID`, `picture`, `ServiceName`, `Description`, `Price`) VALUES
(1, '1.jpg', 'Fix Air Condition', 'Fix air condition service', 350),
(2, '2.jpg', 'Room Cleaning', 'Room cleaning service', 300),
(3, '3.jpg', 'CCTV Setting', 'CCTV setting service', 250),
(4, '4.jpg', 'Fix leaking pipe', 'Fix leaking pipe service', 300),
(5, '5.jpg', 'Mow the lawn', 'Mow the lawn service', 200),
(7, '6.jpg', 'Painting', 'Painting', 500);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `UserID`) VALUES
(12, 22),
(14, 28);

-- --------------------------------------------------------

--
-- Table structure for table `staffassign`
--

CREATE TABLE `staffassign` (
  `StaffAssignID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `BookingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffassign`
--

INSERT INTO `staffassign` (`StaffAssignID`, `StaffID`, `BookingID`) VALUES
(7, 12, 13),
(8, 12, 14),
(9, 12, 15),
(10, 14, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `UserType`, `FirstName`, `LastName`, `Gender`, `Address`, `PhoneNo`) VALUES
(21, 'adams@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'Adams', 'Baker', 'Male', 'Bangkok', '0812345678'),
(22, 'amanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'staff', 'Amanda', 'Brown', 'Female', 'Bangkok', '0834469782'),
(23, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'Rose', 'Oliver', 'Female', 'Bangkok', '0895632157'),
(26, 'abc@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'Frank', 'Baker', 'Female', 'Bangkok', '0945236815'),
(28, 'apichayalux@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'staff', 'Aun', 'Aun', 'Female', 'Bangkok', '0651234567'),
(29, 'abcde@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'asdfg', 'ygehj', 'Female', 'Bangkok', '0564285368'),
(30, 'abchgk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'asdfg', 'ygehj', 'Male', 'tcfdytgtkbl', '0654129852'),
(31, '12345@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'nh;jkng', 'jgit;hsg', 'Male', ';jhtbfikb', '0945236815');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ServiceID` (`ServiceID`),
  ADD KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`,`ServiceID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `staffassign`
--
ALTER TABLE `staffassign`
  ADD PRIMARY KEY (`StaffAssignID`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staffassign`
--
ALTER TABLE `staffassign`
  MODIFY `StaffAssignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `staffassign`
--
ALTER TABLE `staffassign`
  ADD CONSTRAINT `staffassign_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `staffassign_ibfk_2` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
