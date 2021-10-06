-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 01:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smile`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `NIC` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `email` text NOT NULL,
  `tp` text NOT NULL,
  `Password` text NOT NULL,
  `fundCount` int(10) NOT NULL,
  `postCount` int(10) NOT NULL,
  `donateCount` int(10) NOT NULL,
  `donateAmount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Fname`, `Lname`, `NIC`, `DOB`, `email`, `tp`, `Password`, `fundCount`, `postCount`, `donateCount`, `donateAmount`) VALUES
(1, 'Kalani', 'Bandara', 965685245, '1990-01-06', 'Kalani384bandara@gmail.com', '0764543476', 'jellybean', 7, 3, 9, 10000),
(2, 'Matheesha', 'Perera', 845251845, '1990-10-06', 'math24fer@gmail.com', '0783423876', 'artificialKite', 2, 1, 10, 5000),
(3, 'Kalani', 'Bandara', 965685245, '1990-01-06', 'Kalani84bandara@gmail.com', '0764543476', 'jellybean', 7, 3, 9, 10000),
(4, 'Matheesha', 'Perera', 845251845, '1990-10-06', 'math234fer@gmail.com', '0783423876', 'artificialKite', 2, 1, 10, 5000),
(5, 'Admin', '1', 892832983, '1998-10-06', 'admin@gmail.com', '8888888888', 'helloadmin', 7, 3, 9, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
