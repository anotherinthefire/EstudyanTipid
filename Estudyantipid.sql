-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 12:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estudyantipid`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budgetid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `budget` int(11) NOT NULL,
  `period` date NOT NULL,
  `budget_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budgetid`, `userid`, `bname`, `budget`, `period`, `budget_status`) VALUES
(4, 1, 'Budget of April', 200000, '2023-04-16', ''),
(8, 13, 'Budget of March', 10000000, '2023-04-30', ''),
(9, 13, 'Budget of April', 100000, '2023-04-17', 'expired'),
(11, 17, 'April Onsite ', 4716, '2023-05-06', 'expired'),
(12, 17, 'June Onsite', 8000, '2023-06-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `xname` varchar(200) NOT NULL,
  `xpayee` varchar(200) NOT NULL,
  `xamount` int(200) NOT NULL,
  `xdate` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `budgetid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exid`, `userid`, `xname`, `xpayee`, `xamount`, `xdate`, `status`, `budgetid`) VALUES
(9, 13, 'Meralco Bills', '', 1000, '2023-03-18', 'PAID', 0),
(11, 13, 'Meralco Bills', 'Miguel', 1000, '2023-03-18', 'PAID', 0),
(12, 13, 'tite operation', 'hotdog', 420, '2023-04-28', 'PAID', 0),
(13, 1, 'Utang', 'Miguel', 100000, '2023-04-17', 'PAID', 0),
(14, 17, 'Mix and Match', 'Mc Donalds', 79, '2023-05-10', 'PAID', 0),
(15, 17, 'test payment ', 'Jollibee', 90, '2023-05-09', 'PAID', 11),
(17, 17, 'mixnmatch', 'mdcolibee', 86, '2023-05-26', 'PAID', 12),
(18, 17, 'tumesting ka', 'mang boy', 50, '2023-05-24', 'PAID', 12),
(19, 17, 'Pamasahe', 'jeepbeep', 50, '2023-05-17', 'PAID', 11),
(20, 17, 'Starbs', 'Stabs Parih', 250, '2023-05-24', 'PAID', 12),
(23, 17, 'mixnmatch', 'mdcolibee', 502, '2023-05-27', 'PAID', 11),
(24, 17, 'test payment  2', 'jabilee', 1992, '2023-05-31', 'PAID', 12);

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `gid` int(11) NOT NULL,
  `gtitle` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `gtamount` int(200) NOT NULL,
  `gddate` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`gid`, `gtitle`, `userid`, `gtamount`, `gddate`, `status`) VALUES
(3, ' GeForce RTX 3060', 1, 222, '2023-03-07', 'ACHIEVED'),
(6, 'Bike', 1, 15000, '2023-03-23', 'achieved'),
(7, 'Cellphone', 1, 16000, '2023-03-18', 'ACHIEVED'),
(16, 'Desktop', 1, 50000, '2024-06-08', 'pending'),
(30, 'Gunting', 1, 10, '2023-04-01', 'pending'),
(31, 'Electric Fan', 13, 12312312, '2023-03-25', 'ACHIEVED'),
(33, 'Cellphone', 13, 5000, '2023-03-18', 'PENDING'),
(34, 'Gunting', 13, 4000, '2023-03-18', 'PENDING'),
(35, ' GeForce RTX 3060', 17, 25000, '2023-05-31', 'ACHIEVED'),
(36, 'Keyboard + Mouse Set', 17, 2000, '2023-05-29', 'ACHIEVED'),
(37, 'KZ Z! Pro', 17, 1041, '2023-05-25', 'ACHIEVED'),
(38, 'KZ VX PRO', 17, 3658, '2023-06-10', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `first_name`, `last_name`, `balance`, `img`) VALUES
(1, 'test', 'elaijhasolitario@gmail.com', 'test', 'Elaijha Luis', 'Solitario', 10134, ''),
(2, 'user', 'toledo@gmail.com', 'user', 'jan Vincent ', 'Toledo', 5000, ''),
(7, 'admin1', 'monique@gmail.com', 'admin1', 'Monique', 'Pascual', 5000, ''),
(13, 'miggy', 'paulo@gmail.com', 'miggy', 'Paulo Miguel', 'Inigo', 10000, ''),
(14, 'asd', 'asd@gmail.com', 'asd', 'asd', 'asd', 0, ''),
(15, 'Ron', 'Ron@gmail.com', 'Ron', 'Ron', 'Ron', 10000, ''),
(16, 'Kurt', 'Kurt@gmail.com', 'Kurt', 'Kurt', 'Kurt', 10000, ''),
(17, 'Jhonil', 'Jhonil@gmail.com', 'Jhonil', 'Jhonil', 'Jhonil', 3775, ''),
(18, 'test1', 'elaijhasolitario@gmail.com', 'test1', 'Juan', 'Solitario', 0, ''),
(19, 'admin', 'paulo@gmail.com', 'admin', 'Katrina Mae', 'Biay', 123456, ''),
(20, 'asdd', 'asd@gmail.com', 'asdd', 'Elaijha Luis', 'asda', 123333, ''),
(21, 'fasd', 'fafs@gmail.com', 'fasd', 'fasd', 'fasd', 100000, ''),
(22, 'Jairus', 'Jairus@gmail.com', 'jairus', 'Jairus', 'Jairus', 12312, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budgetid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budgetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
