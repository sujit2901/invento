-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221113.0eded7bb43
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 12:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invento`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(255) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `catimage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `catimage`, `created_at`) VALUES
(4, 'dairy', 'cat1673713280.jpg', '2023-01-14 16:21:20'),
(5, 'hardware', 'cat1673716346.png', '2023-01-14 17:12:26'),
(6, 'Medical', 'cat1673716494.jpg', '2023-01-14 17:14:54'),
(7, 'edible oil', 'cat1673801432.png', '2023-01-15 16:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dealerid` int(255) NOT NULL,
  `dealername` varchar(255) NOT NULL,
  `dealerphone` varchar(11) NOT NULL,
  `dealeremail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealerid`, `dealername`, `dealerphone`, `dealeremail`, `created_at`) VALUES
(1, 'sujit', '7506321051', 'ak47sujit2901@gmail.com', '2023-01-14 20:38:08'),
(2, 'shyam', '8286170877', 'shyam@gmail.com', '2023-01-15 17:23:28'),
(3, 'deva', '8286170877', 'deva.naidu@somaiya.edu', '2023-01-15 17:24:16'),
(4, 'gaurav', '7306123051', 'gaurav@gmail.com', '2023-01-15 17:25:04'),
(5, 'dilip', '9856432198', 'sujit.bs2901@gmail.com', '2023-01-15 19:30:38'),
(6, 'shyam', '4321986756', 'shyamnarayan.v@somaiya.edu', '2023-01-15 20:17:03'),
(7, 'shrikant', '4321987623', 'shrikant339336@gmail.coom', '2023-01-17 15:16:58'),
(8, 'shrikant', '7506321051', 'shrikant339336@gmail.com', '2023-01-17 15:19:01'),
(9, 'sujit', '7681738173', 'sujit.bs2901@gmail.com', '2023-01-19 07:42:40'),
(10, 'sujit', '7681738173', 'sujit.bs2901@gmail.com', '2023-01-19 07:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodid` int(255) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `prodimage` varchar(255) NOT NULL,
  `category` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `prodname`, `prodimage`, `category`, `qty`, `price`, `updated_at`) VALUES
(1, 'milk', 'prod1673726566.png', 4, 22, 60, '2023-01-14 20:02:46'),
(2, '     panners', 'prod1674122813.png', 4, 0, 0, '2023-01-15 17:00:55'),
(3, 'ram', 'prod1673802188.png', 5, 200, 1000, '2023-01-15 17:03:08'),
(4, 'ssd', 'prod1673802290.png', 5, 100, 3000, '2023-01-15 17:04:50'),
(7, 'curd', 'prod1673846671.png', 4, 0, 0, '2023-01-16 05:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transcationid` int(255) NOT NULL,
  `dealer` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transcationid`, `dealer`, `product`, `qty`, `price`, `created_at`) VALUES
(1, 1, 1, 100, 60, '2023-01-15 08:26:41'),
(2, 1, 1, 10, 60, '2023-01-15 08:27:53'),
(3, 2, 3, 200, 1000, '2023-01-15 17:51:44'),
(4, 3, 4, 100, 3000, '2023-01-15 17:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'megmo@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-02 18:46:44'),
(2, 'ajit@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-02 18:51:21'),
(3, 'megmfo@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-03 14:31:16'),
(4, 'nikhil@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-03 14:32:07'),
(5, 'nikhil1@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-03 14:36:08'),
(6, 'sujit@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-03 14:42:30'),
(7, 'megm23o@gmail.com', '95e5aeb2eca763d044c8fd23331460e1512c4b0c', '2023-01-03 14:44:36'),
(8, 'raj@gmail.com', '3055effa054a24f84cf42cea946db4cdf445cb76', '2023-01-14 07:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dealerid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transcationid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `dealerid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transcationid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
