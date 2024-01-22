-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `creditId` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `amaunt` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) DEFAULT NULL,
  `workerEmail` text NOT NULL,
  `worker firstName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenseId` int(11) NOT NULL,
  `workerEmail` text NOT NULL,
  `worker firstName` text NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `amaunt` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenseId`, `workerEmail`, `worker firstName`, `descriptions`, `amaunt`, `comments`, `createdAt`, `userid`) VALUES
(1, '', '', 'Electricity', 1000, '', '0000-00-00 00:00:00', NULL),
(2, '', '', 'trasport', 2000, 'hy', '2024-01-23 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Passwordconfirm` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `FirstName`, `LastName`, `Email`, `Position`, `Birthday`, `Gender`, `Password`, `Passwordconfirm`, `created_date`) VALUES
(0, 'Kevine', 'Umutoni', 'kevine@gmail.com', 'Sales and Marketing', '2000-08-05', 'female', '234', '234', '2024-01-22 05:07:33'),
(3, 'Umutesi', 'Kelia', 'keliumutesi@gmail.com', 'owner', '2003-11-11', 'female', '123', '123', '2024-01-21 19:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `specificItem` varchar(255) NOT NULL,
  `opening` int(11) NOT NULL,
  `added` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `closingStock` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `unitPrice` float NOT NULL,
  `totalSales` float NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) DEFAULT NULL,
  `workerEmail` text NOT NULL,
  `worker firstName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `itemType`, `specificItem`, `opening`, `added`, `total`, `closingStock`, `sales`, `unitPrice`, `totalSales`, `createdAt`, `userid`, `workerEmail`, `worker firstName`) VALUES
(1, 'wine', 'White Wine', 12, 3, 15, 3, 12, 1000, 12000, '2024-01-20 22:00:00', NULL, '', ''),
(2, 'softdrink', 'Sprite', 20, 30, 50, 12, 38, 1000, 38000, '2024-01-20 22:00:00', NULL, '', ''),
(3, 'importeddrink', 'Champagne', 10, 20, 30, 10, 20, 1000, 20000, '2024-01-20 22:00:00', NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`creditId`),
  ADD KEY `fk_credit_user` (`userid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenseId`),
  ADD KEY `fk_expenses_user` (`userid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_user` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `creditId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `fk_credit_user` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_expenses_user` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_user` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
