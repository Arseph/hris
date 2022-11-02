-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 08:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris2`
--
CREATE DATABASE IF NOT EXISTS `hris2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hris2`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(255) NOT NULL,
  `depart_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depart_name`) VALUES
(1, 'IT'),
(2, 'Human Resource'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `agency_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pob` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `bloodtype` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulevel` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `agency_id`, `firstname`, `suffix`, `middlename`, `birthday`, `lastname`, `pob`, `sex`, `civilstatus`, `citizenship`, `weight`, `height`, `bloodtype`, `username`, `password`, `ulevel`, `imagepath`, `department`) VALUES
(1, '', 'charlie magne', '', '0', '', 'martinez', '', '', '', '', '', '', '', '', '', '', '', '1'),
(2, '', 'ALVIN', '', '0', '', 'sample lastname', '', '', '', '', '', '', '', '', '', '', '', '2'),
(3, '', 'suharto', '', '0', '', 'omar', '', '', '', '', '', '', '', '', '', '', '', '1'),
(4, '', 'samplename', '', '0', '', 'SampleSurname', '', '', '', '', '', '', '', '', '', '', '', '3'),
(20, 'kekw', 'kekw', 'kekw', 'kekw', '', 'kekw', 'kekw', '', 'Single', 'filipino', '3', '3', 'B', 'kekw', 'kekw', 'User Supervisors', '', ''),
(21, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `id` int(255) NOT NULL,
  `levelname` varchar(255) NOT NULL,
  `powerlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`id`, `levelname`, `powerlevel`) VALUES
(1, 'superadmin', '1'),
(2, 'admin', '2'),
(3, 'user', '3'),
(4, 'guest', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `creator_id` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `employee_id`, `creator_id`, `date_created`, `userlevel`) VALUES
(1, 'admin', 'password', '1', '1', '02/08/2022', '1'),
(9, 'ASD', 'ASD', '1', '1', '02/10/2022', '1'),
(10, 'cha', 'cha', '1', '1', '02/10/2022', '1'),
(11, 'aaa', 'aaa', '1', '1', '02/10/2022', '1'),
(12, 'werwerwer', 'werwerwerwer', '3', '1', '02/10/2022', '1'),
(13, 'ggggg', 'gggggg', '1', '1', '02/10/2022', '1'),
(14, 'test', 'test', '1', '1', '02/10/2022', '1'),
(15, 'testa', 'testa', '2', '1', '02/10/2022', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
