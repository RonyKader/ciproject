-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 05:58 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_developer`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_service`
--

CREATE TABLE `master_service` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `restaurantname` varchar(55) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `restaurantname`, `created_date`, `updated_date`, `status`) VALUES
(1, 'KFC', '2016-11-04 07:19:23', '2016-11-04 07:19:23', 1),
(2, 'Pizza Hut', '2016-11-04 07:19:23', '2016-11-04 07:19:23', 1),
(3, 'Abacus Restaurant', '2016-11-04 07:20:32', '2016-11-04 07:20:32', 1),
(4, 'Nandus Chinise', '2016-11-04 07:20:32', '2016-11-04 07:20:32', 1),
(5, 'Katbadam Chinese Restaurant', '2016-11-04 07:21:43', '2016-11-04 07:21:43', 1),
(6, 'Blue Lagoon Thai', '2016-11-04 07:21:43', '2016-11-04 07:21:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `servicename` varchar(55) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`, `created_date`, `updated_date`, `status`) VALUES
(1, 'Web Site Developement', '2016-11-04 07:23:09', '2016-11-04 07:23:09', 1),
(2, 'Epos system ', '2016-11-04 07:23:09', '2016-11-04 07:23:09', 1),
(3, 'Mobile App Android and IOS', '2016-11-04 07:24:02', '2016-11-04 07:24:02', 1),
(4, 'Customer Support ', '2016-11-04 07:24:02', '2016-11-04 07:24:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_service`
--
ALTER TABLE `master_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_service`
--
ALTER TABLE `master_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
