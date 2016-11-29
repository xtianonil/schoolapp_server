-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2016 at 12:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolapp`
--
CREATE DATABASE IF NOT EXISTS `schoolapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `schoolapp`;

-- --------------------------------------------------------

--
-- Table structure for table `group_membership`
--

CREATE TABLE `group_membership` (
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `membership_status` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(11) NOT NULL,
  `payload` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_delivery`
--

CREATE TABLE `notif_delivery` (
  `delivery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notif_id` int(11) NOT NULL,
  `delivery_status` varchar(50) NOT NULL,
  `time_delivered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_read` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_target`
--

CREATE TABLE `notif_target` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `verif_code` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_id` varchar(255) DEFAULT NULL,
  `device_type` varchar(20) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `ts_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `verif_code`, `password`, `email`, `reg_id`, `device_type`, `user_type`, `user_status`, `first_name`, `last_name`, `ts_created`) VALUES
(1, 'xtianonil', '1234', '1234', 'chris_onil@yahoo.com', NULL, NULL, 'school_admin', 'registered', 'Christian Onil', 'Tolentino', '2016-11-29 11:52:42'),
(2, 'glenn', 'glenn', '1234', '', NULL, NULL, 'teacher', 'registered', '', '', '2016-11-29 11:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `group_type`) VALUES
(1, 'Poveda', 'school'),
(2, 'Kinder-1', 'school_section'),
(3, 'Kinder-2', 'school_section');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_membership`
--
ALTER TABLE `group_membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_delivery`
--
ALTER TABLE `notif_delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_membership`
--
ALTER TABLE `group_membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notif_delivery`
--
ALTER TABLE `notif_delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
