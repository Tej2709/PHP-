-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 02:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `active` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`, `active`) VALUES
(1, 'Grocery', 'yes'),
(2, 'Home', 'yes'),
(3, 'Toys', 'yes'),
(4, 'Electronic', 'yes'),
(6, 'Sport', 'no'),
(8, 'Clothes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'testuser@kcsitglobal.com', 'secret');

-- --------------------------------------------------------

--
-- Table structure for table `newadmin`
--

CREATE TABLE `newadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `hobbies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newadmin`
--

INSERT INTO `newadmin` (`id`, `name`, `email`, `password`, `gender`, `hobbies`) VALUES
(4, 'Tej', 'tejsoni@gmail.com', 'Pass@12345', 'male', 'Cricket,Singing,Shopping'),
(8, 'Vishruti', 'vp@gmail.com', 'Pass@12345', 'female', 'Singing,Shopping'),
(12, 'yash', 'yp@gmail.com', 'pass@12345', 'male', 'Cricket,Singing,Swimming'),
(16, 'Nishant', 'np@gmail.com', 'Pass@12345', 'male', 'Cricket,Swimming,Shopping'),
(19, 'Sahil', 'sahil11@gmail.com', 'Pass@123', 'male', 'Cricket,Singing,Swimming,Shopping');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `catid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `createby` varchar(255) NOT NULL,
  `active` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `catid`, `image`, `createby`, `active`) VALUES
(1, '  Maggi          ', '1', 'maggi.jpg', 'testuser@kcsitglobal.com', 'yes'),
(2, 'Dinokids  ', '3', 'toy.jpg', 'testuser@kcsitglobal.com', 'yes'),
(10, 'T.V', '4', 'download-_1_.jpg', 'testuser@kcsitglobal.com', 'yes'),
(12, 'IRON', '4', 'iron.jpg', 'testuser@kcsitglobal.com', 'yes'),
(14, 'TATA Coffee', '1', 'download.jpg', 'testuser@kcsitglobal.com', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newadmin`
--
ALTER TABLE `newadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newadmin`
--
ALTER TABLE `newadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
