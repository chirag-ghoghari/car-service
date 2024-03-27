-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 03:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `serviceDesc` varchar(10000) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `sname`, `image`, `serviceDesc`, `isActive`, `price`) VALUES
(1, 'Oil / Filter', 'high-performance-simple-coated-intel-cpu-processor-i7-for-computer-laptop-460.jpg', 'werewer', 1, 2000),
(2, 'Car Servicing', 'https___images.webp', 'WQEQWEQ', 1, 6000),
(3, 'Windshield / Lights', '653a9b1b11b24c08aa219a84-sony-playstation-4-slim-1tb-gaming.jpg', 'WQERWQRW', 1, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `vnumber` varchar(20) NOT NULL,
  `vname` varchar(100) NOT NULL,
  `services` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`id`, `oname`, `contact`, `address`, `vnumber`, `vname`, `services`, `status`) VALUES
(1, 'Chirag', '3434343', 'dfgdfgf', '4234234234', 'Maruti Suzuki', 'Oil / Filter', 0),
(2, 'Chirag', '99999999', 'rgthdfgghdg', '9999999', 'Bmw', 'Oil / Filter', 0),
(3, 'Meet Ghoghari', '2147483647', 'Kanteswer Lalita', 'GJ05MR9270', 'McLaren', 'Oil / Filter', 0),
(4, 'Meet Ghoghari', '74185963', 'fhfghfgh', '547457787', 'Maruti Suzuki', 'Oil / Filter', 0),
(5, 'Meet Ghoghari', '646786456', 'bgfnbvnvbnvn', '7897879798', 'Bugatti', 'Oil / Filter', 0),
(6, 'Meet Ghoghari', '646786456', 'bgfnbvnvbnvn', '7897879798', 'Bugatti', 'Oil / Filter', 0),
(7, 'Meet Ghoghari', '54545454', 'dfgdfgdgd', '4545454455454', 'Hyundai', 'Oil / Filter', 0),
(8, 'Meet Ghoghari', '678678678', 'fghfgtughfg', '768678678', 'Hyundai', 'Oil / Filter', 0),
(9, 'Meet Ghoghari', '4535353453', 'sfdsdf', '345345345', 'Hyundai', 'Oil / Filter', 0),
(10, 'Meet Ghoghari', '345345345', 'ERWERWER', '345345', 'Ferrari', 'Oil / Filter', 0),
(11, 'Meet Ghoghari', '2323423423', 'sadraerwq', '4234234234', 'Porsche', 'Oil / Filter', 0),
(12, 'Meet Ghoghari', '234234234', 'qweqweqweqw', '234234', 'Lamborghini', 'Oil / Filter', 0),
(13, 'Meet Ghoghari', '43534534', 'wrerwr', '53453453', 'Ferrari', 'Oil / Filter', 0),
(14, 'Meet Ghoghari', '3423423', 'wqerwerwer', '4234234', 'Lamborghini', 'Oil / Filter', 0),
(15, 'Meet Ghoghari', '213123', 'qweqweqwe', '3123123', 'Porsche', 'Oil / Filter', 0),
(16, 'Meet Ghoghari', '4534534', 'erwerewr', '5345345', 'Lamborghini', 'Oil / Filter', 0),
(17, 'Meet Ghoghari', '234234', 'qweqweqw', '2342342', 'Hyundai', 'Oil / Filter', 0),
(18, 'Meet Ghoghari', '23423423', 'asdasdasda', '4234234', 'Lamborghini', 'Oil / Filter', 0),
(19, 'Meet Ghoghari', '3123123123', 'adsasdasdsada', '21312312312', 'Porsche', 'Oil / Filter', 0),
(20, 'Meet Ghoghari', '23423423', 'sadasdasd', '4234234', 'Hyundai', 'Oil / Filter', 0),
(21, 'Meet Ghoghari', '2321321', 'sadasdasdasdasd', '234234', 'Ferrari', 'Oil / Filter', 0),
(22, 'Meet Ghoghari', '231231', 'asdadasd', '31231231', 'Lamborghini', 'Oil / Filter', 0),
(23, 'Meet Ghoghari', '23213213', 'qwsadasda', '23132131', 'McLaren', 'Oil / Filter', 0),
(24, 'Meet Ghoghari', '23213213', 'qwsadasda', '23132131', 'McLaren', 'Oil / Filter', 0),
(25, 'Meet Ghoghari', '234242', 'asdasdasd', '4234234', 'Lamborghini', 'Oil / Filter', 0),
(26, 'Meet Ghoghari', '34234234', 'QEQWEQWEQWE', '34242342', 'Porsche', 'Oil / Filter', 0),
(27, 'Meet Ghoghari', '3424234', 'SDSADAD', '234234', 'Lamborghini', 'Oil / Filter', 0),
(28, 'Meet Ghoghari', '23423423', 'QEWQEQWE', '234234234234', 'McLaren', 'Oil / Filter,Car Servicing', 0),
(29, 'Meet Ghoghari', '345345634', 'ERWERWER', '534534534', 'Porsche', 'Oil / Filter,Car Servicing,Windshield / Lights', 0),
(30, 'Meet Ghoghari', '5646456', 'DFGDGDFGDFG', '456456', 'Lamborghini', 'Oil / Filter,Car Servicing,Windshield / Lights', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `img` varchar(100) DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `type`, `img`) VALUES
(0, 'Chirag', '123', 'chiragghoghari399@gmail.com', 'user', 'profile.png'),
(1, 'meet', '123', 'meetghoghari1242@gmail.com', 'admin', 'download (1).png'),
(0, 'Meet Ghoghari', '123', 'meetghoghari1336@gmail.com', 'user', 'profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sname` (`sname`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
