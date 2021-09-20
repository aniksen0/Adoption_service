-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 08:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sn` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sn`, `name`, `email`, `phone`, `message`) VALUES
(3, 'Anik Sen', 'qwe', 'qwe', 'qweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `sn` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `pass`, `sn`) VALUES
(1, '123', 1),
(2, '123', 2),
(3, '123', 4),
(4, '123', 5),
(5, '123', 6);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `sn` int(11) NOT NULL,
  `id` int(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`sn`, `id`, `status`) VALUES
(7, 2, 'active'),
(8, 1, 'active'),
(9, 2, 'active'),
(10, 3, 'active'),
(11, 1, 'active'),
(12, 1, 'active'),
(13, 2, 'active'),
(14, 2, 'active'),
(15, 2, 'active'),
(16, 5, 'active'),
(17, 2, 'active'),
(18, 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `sn` int(30) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`sn`, `role`) VALUES
(1, 'admin'),
(2, 'system_admin'),
(3, 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(255) DEFAULT NULL,
  `role` int(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `service_status` varchar(255) DEFAULT NULL,
  `last_renewed` varchar(255) DEFAULT NULL,
  `children` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_address`, `email`, `phone`, `role`, `marital_status`, `gender`, `profession`, `dob`, `created_at`, `service_status`, `last_renewed`, `children`, `nid`, `image`, `permanent_address`) VALUES
(1, 'Tester', 'Tester', 'admin@admin.com', 1231244, 1, 'Tester', 'Tester', 'Tester', 'Tester', '2021-09-12 18:12:43', 'Tester', '2021/09/11', 'Tester', 'Tester', 'gopalvar.png', 'Tester'),
(2, 'Tester', 'Tester', 'Tester', 123123, 3, 'Tester', 'Tester', 'Tester', 'Tester', '2021-09-12 18:12:38', 'Tester', '2021/09/10', 'Tester', 'Tester', 'gopalvar.png', 'Tester'),
(3, 'Anik Sen', ' 123', 'megporiarju418@gmail.com', 1842184018, 3, 'married', 'M', '123123', '2021-09-01', '2021-09-11 17:34:14', 'new', '2021/09/11', '123123', '123213', 'parent/img/gopalvar.png', ' 123123123'),
(4, '12323', ' 123123', 'anik.sen001@gmail.com', 123, 3, 'married', 'M', 're', '2021-09-02', '2021-09-12 18:35:16', 'new', '2021/09/11', '1', '123123123123', 'Untitled.png', ' 123123123'),
(5, 'tester', ' asdasd', 'mesaca5254@vy89.com', 123123, 3, 'Single Father', 'nb', 're', '2021-09-01', '2021-09-12 18:35:22', 'new', '2021/09/12', '12', '12312313', 'old.jpg', 'teester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sn` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sn` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`sn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
