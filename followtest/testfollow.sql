-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 11:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testfollow`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow_and_unfollow_activity`
--

CREATE TABLE `follow_and_unfollow_activity` (
  `id` int(100) NOT NULL,
  `page_owners_emails` varchar(200) NOT NULL,
  `followers_emails` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_and_unfollow_activity`
--

INSERT INTO `follow_and_unfollow_activity` (`id`, `page_owners_emails`, `followers_emails`, `date`) VALUES
(10, 'm@myserver.com', 'm@gmail.com', '26-05-2017'),
(8, 'm@yahoo.com', 'm@gmail.com', '26-05-2017'),
(11, 'm1@gmail.com', 'm@gmail.com', '26-05-2017'),
(14, 'vasplusblog@gmail.com', 'm.gmail.com', '26-05-2017'),
(13, 'm@yahoo.com', 'm.gmail.com', '26-05-2017'),
(15, 'm@gmail.com', 'm.gmail.com', '26-05-2017'),
(16, 'm@gmail.com', 'm2.gmail.com', '26-05-2017'),
(17, 'm1@gmail.com', 'm2.gmail.com', '26-05-2017'),
(18, 'm@yahoo.com', 'm2.gmail.com', '26-05-2017'),
(22, 'dmFzcGx1c2Jsb2dAZ21haWwuY29t', 'm2.gmail.com', '26-05-2017'),
(20, 'bUBnbWFpbC5jb20=', 'm2.gmail.com', '26-05-2017');

-- --------------------------------------------------------

--
-- Table structure for table `follow_and_unfollow_users_table`
--

CREATE TABLE `follow_and_unfollow_users_table` (
  `id` int(100) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_and_unfollow_users_table`
--

INSERT INTO `follow_and_unfollow_users_table` (`id`, `firstname`, `lastname`, `email`, `password`, `date`) VALUES
(1, 'Vasplus', 'Blog', 'm@myserver.com', '000', '15-10-2012'),
(2, 'admin', 'admin', 'm@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '18-11-2012'),
(3, 'Santhu', 'Great', 'm1@gmail.com', '0e1bb212e6a6a413f7f10cb5b809c9f6', '03-12-2012'),
(4, 'Appaji', 'Nagandla', 'm@yahoo.com', '0eaf41748ddd5da8d872e2b63b660ed6', '27-12-2012'),
(9, 'Emi', 'Nero', 'vasplusblog@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '02-02-2013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow_and_unfollow_activity`
--
ALTER TABLE `follow_and_unfollow_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_and_unfollow_users_table`
--
ALTER TABLE `follow_and_unfollow_users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow_and_unfollow_activity`
--
ALTER TABLE `follow_and_unfollow_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `follow_and_unfollow_users_table`
--
ALTER TABLE `follow_and_unfollow_users_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
