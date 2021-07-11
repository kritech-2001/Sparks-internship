-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 05:49 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparksfoundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `sparkstransact`
--

CREATE TABLE `transfermoney` (
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfermoney`
--

INSERT INTO `transfermoney` (`sender`, `receiver`, `balance`, `datetime`) VALUES
('AYIMEN', 'POOJA', 2000, '2021-01-05 16:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `balance`) VALUES
(10111, 'AYIMEN', 'aiymen234@gmail.com', 563454321, 2000),
(10112, 'BINURAJ', 'binu345@gmail.com', 946784322, 5000),
(10113, 'ADITHYA', 'adithya@gmail.com', 946324678, 4000),
(10114, 'POOJA', 'poojar@gmail.com', 676567543, 7000),
(10115, 'LEYA', 'leya123@gmail.com', 568228617, 2000),
(10116, 'FAHIM', 'fahim@gmail.com', 456465678, 6000),
(10117, 'SIDHARTH', 'sidharth@gmail.com', 345678435, 7000),
(10118, 'KAILAS', 'kailas33@gmail.com', 676548127, 5000),
(10119, 'NAVEEN', 'navz12@gmail.com', 567448971, 2000),
(10120, 'VIPIN', 'vipin11@gmail.com', 600334561, 9000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
