-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2022 at 04:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltce`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_paid`
--

CREATE TABLE `fees_paid` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `syear` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees_paid`
--

INSERT INTO `fees_paid` (`id`, `uid`, `txn_id`, `syear`, `course`, `createdAt`, `updatedAt`) VALUES
(1, 8, 'pay_KHU7X2H2JO08Kf', 'Final Year', 'Information Technology', '2022-09-13 18:35:47', '2022-09-13 18:35:47'),
(2, 8, 'pay_KHUul1qxu7jtbC', 'Third Year', 'Information Technology', '2022-09-13 19:19:48', '2022-09-13 19:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `password`, `is_verified`) VALUES
(4, 'Sahil', 'sahilkatore@gmail.com', 'sahil', 1),
(8, 'Sahil', 'fakeb82@gmail.com', '123', 2),
(9, 'sexy', 'royalrp800@gmail.com', '123123123', 1),
(10, 'Sahil', '123@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `fatname` varchar(255) NOT NULL,
  `fatoccu` varchar(255) NOT NULL,
  `fatnum` bigint(20) NOT NULL,
  `motname` varchar(255) NOT NULL,
  `motoccu` varchar(255) NOT NULL,
  `motnum` bigint(20) NOT NULL,
  `address` varchar(800) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `uid`, `lname`, `phno`, `fatname`, `fatoccu`, `fatnum`, `motname`, `motoccu`, `motnum`, `address`, `year`, `course`) VALUES
(17, 8, 'Katore', 7218896568, 'Anil', 'LIC', 7218896568, 'Meena', 'House Wife', 7218896568, 'Aravalli 304, DIpti Sky City, Old Ambernath Gaon, Ambernath East', 'Final Year', 'Information Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_paid`
--
ALTER TABLE `fees_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_paid`
--
ALTER TABLE `fees_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
