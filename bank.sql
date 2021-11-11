-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 07:53 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `Name`, `Email`, `Balance`) VALUES
(1, 'Bibhudendu Dwibedi', 'bibhudendudwibedi@gmail.com', 54091.51),
(2, 'Biswajit Mishra', 'biswajitmishra@gmail.com', 140060.43),
(3, 'Rashmi ranjan Mishra', 'RashmiranjanMishra@yahoo.com', 22666.88),
(4, 'Rakesh Bhoi', 'rakeshbhoi@hotmail.com', 231033.21000000002),
(5, 'Nilesh Satapathy', 'nilusatapathy@gmail.com', 11543.76),
(6, 'Pralaya Kumar DAs', 'pk.das@yahoo.com', 565646.6599999999),
(7, 'Suraj Kumar Roy', 'roysurajkumar@gmail.com', 1234727.7999999998),
(8, 'Suryasmita Tripathy', 'surya123@gmail.com', 543125.0099999999),
(9, 'Satyabrata Dash', 'dash.satya@hotmail.com', 34798.46),
(10, 'Jitendra Bisoi', 'jitubisoi@gmail.com', 2354259.3100000005);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `S_Id` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL,
  `Sender_Name` varchar(50) NOT NULL,
  `Transfer_Amount` double NOT NULL,
  `Receiver_Id` int(11) NOT NULL,
  `Receiver_Name` varchar(50) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`S_Id`, `Sender_ID`, `Sender_Name`, `Transfer_Amount`, `Receiver_Id`, `Receiver_Name`, `Date`) VALUES
(1, 1, 'Bibhudendu Dwibedi', 45.54, 2, 'Biswajit Mishra', '2021-08-12 19:53:45'),
(2, 3, 'Rashmi ranjan Mishra', 498.87, 1, 'Bibhudendu Dwibedi', '2021-08-12 20:30:44'),
(3, 4, 'Rakesh Bhoi', 674.43, 10, 'Jitendra Bisoi', '2021-08-12 20:39:19'),
(4, 10, 'Jitendra Bisoi', 543.65, 9, 'Satyabrata Dash', '2021-08-12 20:43:22'),
(5, 5, 'Nilesh Satapathy', 459.87, 9, 'Satyabrata Dash', '2021-08-13 11:11:47'),
(6, 3, 'Rashmi ranjan Mishra', 679.89, 2, 'Biswajit Mishra', '2021-08-20 06:09:56'),
(7, 10, 'Jitendra Bisoi', 32.98, 7, 'Suraj Kumar Roy', '2021-08-20 06:10:48'),
(8, 4, 'Rakesh Bhoi', 874.4, 1, 'Bibhudendu Dwibedi', '2021-08-20 10:48:56'),
(9, 1, 'Bibhudendu Dwibedi', 76.5, 2, 'Biswajit Mishra', '2021-08-20 10:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
