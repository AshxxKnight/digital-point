-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2021 at 06:47 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `toner`
--

CREATE TABLE `toner` (
  `req_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `machine` varchar(128) DEFAULT NULL,
  `colour` varchar(128) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toner`
--

INSERT INTO `toner` (`req_id`, `name`, `machine`, `colour`, `quantity`, `date_time`) VALUES
(2, 'Abhishek Nishad', 'hp', 'Magenta', 4, '2021-01-11 00:11:46'),
(10, 'Abhishek Nishad', 'hp', 'Cyan', 56, '2021-01-14 22:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobile`, `password`) VALUES
(19, 'Abhishek Nishad', 'abhishek.nishad.1069@gmail.com', '7054111705', '187ef4436122d1cc2f40dc2b92f0eba0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toner`
--
ALTER TABLE `toner`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toner`
--
ALTER TABLE `toner`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
