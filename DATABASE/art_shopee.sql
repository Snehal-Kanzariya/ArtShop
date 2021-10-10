-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 04:10 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--
-- Creation: Aug 13, 2021 at 09:25 AM
--

DROP TABLE IF EXISTS `admin_register`;
CREATE TABLE `admin_register` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admin_register`:
--

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'abc@gmail.com', 'admin'),
(3, 'snehal', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artist_register`
--
-- Creation: Sep 13, 2021 at 07:02 AM
--

DROP TABLE IF EXISTS `artist_register`;
CREATE TABLE `artist_register` (
  `id` int(15) NOT NULL,
  `Artist_name` varchar(50) NOT NULL,
  `Artist_email` varchar(50) NOT NULL,
  `Artist_password` varchar(8) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `artist_register`:
--

--
-- Dumping data for table `artist_register`
--

INSERT INTO `artist_register` (`id`, `Artist_name`, `Artist_email`, `Artist_password`, `timestamp`, `status`) VALUES
(0, 'root', 'artist@gmail.com', 'artist', '2021-09-13 07:06:40.355258', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Oct 02, 2021 at 03:09 PM
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_img` varchar(100) NOT NULL,
  `time` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `category`:
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_img`, `time`) VALUES
(1, 'Drawing', 'eye.jpg', 20211002205312),
(2, 'Painting', '181632.jpg', 20210922194758),
(3, 'Digital Art', '181622.jpg', 20210922194840),
(6, 'street art', 'streetart1.jpg', 1633343928),
(7, 'photography', 'photo.jpg', 1633344082),
(8, 'Printmaking', '181644.jpg', 1633344118),
(9, 'Sculpture', 'sculpture.jpg', 1633344269);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--
-- Creation: Oct 03, 2021 at 07:08 AM
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `c_id` int(30) NOT NULL,
  `c_unm` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_mno` bigint(10) NOT NULL,
  `c_msg` mediumtext NOT NULL,
  `c_time` bigint(30) NOT NULL,
  `c_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `contact`:
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Sep 12, 2021 at 05:19 AM
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_desc` varchar(300) NOT NULL,
  `price` mediumint(230) NOT NULL,
  `sale_price` mediumint(230) NOT NULL,
  `qty` int(50) NOT NULL,
  `stock_status` varchar(20) NOT NULL,
  `p_cat` varchar(200) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `time` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `product`:
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_desc`, `price`, `sale_price`, `qty`, `stock_status`, `p_cat`, `p_img`, `time`) VALUES
(1, 'the boy in farm', '17 X 23 In | 43 X 58 Cm', 30000, 29999, 1, '1', '2', '181660.jpg', 0),
(2, 'Forest', 'watercolor art', 30000, 29999, 1, '1', '2', '181670.jpg', 0),
(3, 'city of life', 'Artwork has been created digitally in an imaging software', 40000, 35000, 1, '1', '3', '181630.jpg', 20211003111602),
(4, 'sunset', 'sunset at river', 20000, 40000, 2, '1', '2', 'riverhigh.jpg', 20211003111533),
(5, 'Buddha', '40 X 24 In | 102 X 61 Cm', 50000, 50000, 1, '1', '2', 'budhha.jpg', 1633342624);

-- --------------------------------------------------------

--
-- Table structure for table `sell_art`
--
-- Creation: Oct 04, 2021 at 08:50 AM
--

DROP TABLE IF EXISTS `sell_art`;
CREATE TABLE `sell_art` (
  `sp_id` int(50) NOT NULL,
  `sp_name` varchar(100) NOT NULL,
  `sp_desc` varchar(300) NOT NULL,
  `price` mediumint(230) NOT NULL,
  `sale_price` mediumint(230) NOT NULL,
  `sp_qty` int(50) NOT NULL,
  `stock_status` varchar(20) NOT NULL,
  `sp_cat` varchar(200) NOT NULL,
  `sp_img` varchar(200) NOT NULL,
  `time` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sell_art`:
--

-- --------------------------------------------------------

--
-- Table structure for table `signup_user`
--
-- Creation: Aug 04, 2021 at 12:52 PM
--

DROP TABLE IF EXISTS `signup_user`;
CREATE TABLE `signup_user` (
  `id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `signup_user`:
--

--
-- Dumping data for table `signup_user`
--

INSERT INTO `signup_user` (`id`, `email`, `username`, `password`) VALUES
(1, 'snehal@gmail.com', 'snehal', 'snehal'),
(2, 'abc123@gmail.com', 'monika', 'monika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_register`
--
ALTER TABLE `artist_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_art`
--
ALTER TABLE `sell_art`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `signup_user`
--
ALTER TABLE `signup_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup_user`
--
ALTER TABLE `signup_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
