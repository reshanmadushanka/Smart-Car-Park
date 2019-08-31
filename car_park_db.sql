-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2019 at 04:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_park_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `slot_id` int(11) NOT NULL,
  `vehical_no` varchar(11) NOT NULL,
  `location` int(11) NOT NULL,
  `no_of_hours` int(11) NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `user_id`, `book_date`, `from`, `to`, `slot_id`, `vehical_no`, `location`, `no_of_hours`, `is_show`, `timestamp`) VALUES
(18, 3, '2019-04-26', '10:00:00', '11:00:00', 2, 'BN-6785', 1, 1, 1, '2019-04-06 17:32:16'),
(19, 3, '2019-04-16', '19:00:00', '20:00:00', 2, 'VX-2345', 1, 1, 1, '2019-04-06 17:40:42'),
(27, 3, '2019-04-10', '01:00:00', '03:00:00', 2, 'VX-2345', 1, 2, 1, '2019-04-06 18:31:24'),
(28, 3, '2019-04-10', '01:00:00', '03:00:00', 2, 'BB-6666', 1, 2, 1, '2019-04-06 18:32:06'),
(30, 3, '2019-04-10', '01:00:00', '03:00:00', 2, 'ccv-4444', 1, 2, 1, '2019-04-06 18:36:21'),
(36, 3, '2019-04-29', '11:00:00', '13:00:00', 2, 'SXD-7897', 1, 2, 1, '2019-04-07 03:45:52'),
(37, 4, '2019-04-08', '08:00:00', '11:00:00', 1, 'BFX-5674', 1, 3, 1, '2019-04-07 10:54:46'),
(38, 4, '2019-04-08', '08:00:00', '11:00:00', 1, 'BFX-5674', 1, 3, 1, '2019-04-07 10:55:29'),
(39, 5, '2019-08-27', '13:00:00', '20:00:00', 3, 'TRS-5503', 1, 7, 1, '2019-04-07 11:01:54'),
(40, 5, '2019-08-27', '13:00:00', '19:00:00', 3, 'YTS-8235', 1, 6, 1, '2019-04-07 11:03:33'),
(41, 9, '2019-08-28', '23:00:00', '21:00:00', 1, '764f', 1, 2, 1, '2019-08-28 13:36:42'),
(42, 7, '2019-08-30', '18:00:00', '19:00:00', 1, 'BAS-4157', 1, 1, 1, '2019-08-31 15:54:20'),
(43, 7, '2019-08-29', '19:00:00', '20:00:00', 3, 'BAS-4157', 1, 1, 1, '2019-08-31 16:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'Colombo', '2019-08-31 11:59:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `user_id`, `booking_id`, `amount`, `status`) VALUES
(1, 0, 35, 100, ''),
(2, 3, 36, 200, 'online'),
(3, 4, 37, 300, 'online'),
(4, 4, 38, 300, 'online'),
(5, 5, 39, 700, 'online'),
(6, 5, 40, 600, 'online'),
(7, 9, 41, 200, 'online'),
(8, 7, 43, 100, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `timestamp`) VALUES
(1, 'admin', '2019-03-20 06:48:31'),
(2, 'customer', '2019-03-20 06:48:31'),
(3, 'manager', '2019-03-20 06:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `image`, `title`, `timestamp`) VALUES
(1, 'SVPRS5.jpeg', 'Display Available Free Parking Slots', '2019-04-02 19:14:33'),
(2, 'SVPRS7.jpg', 'Parking Space Management', '2019-04-02 19:15:29'),
(3, 'SVPRS2.jpg', 'Online Slot Booking Facility', '2019-04-06 03:16:34'),
(4, 'SVPRS5.jpg', 'Automated Parking Environment', '2019-04-06 16:10:46'),
(5, 'SVPRS1.jpg', 'Slot Status Indication', '2019-04-06 16:11:33'),
(6, 'SVPRS3.jpg', 'Userfriendly Parking Managment System', '2019-04-06 16:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slot`
--

CREATE TABLE `tbl_slot` (
  `id` int(11) NOT NULL,
  `slot_name` varchar(55) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slot`
--

INSERT INTO `tbl_slot` (`id`, `slot_name`, `status`, `timestamp`) VALUES
(1, 'slot1', 1, '2019-03-09 18:16:57'),
(2, 'slot2', 1, '2019-03-09 18:16:57'),
(3, 'slot3', 1, '2019-04-01 16:20:41'),
(4, 'slot4', 0, '2019-04-01 16:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `f_name`, `l_name`, `NIC`, `mobile`, `city`, `email`, `password`, `role_id`, `timestamp`) VALUES
(2, 'Admin', 'user', '912455663v', '0714852233', 'galle', 'admin@gmail.com', '$2y$10$5t0i53k7uTQSIG5QDE9/LedOK.IZfpEBYivGJlsrtrV1sXUb7IWEG', 1, '2019-03-20 07:15:06'),
(3, 'Amal', 'Viraj', '945634564V', '0713422134', 'Colombo', 'amal@gmail.com', '$2y$10$ywyVwa0RqbdZGDseSZhkc.fiblcHiARqh0Eogu6yEjwuQJvM9FoJS', 2, '2019-04-06 09:50:55'),
(4, 'Harsha', 'Kumara', '945673421V', '0786533149', 'kandy', 'harsha@gmail.com', '$2y$10$IsFEl9ey/NzTkxA.Sm7n3uDDHjNVpm28kehxtIrGywLitVO.QQMMm', 2, '2019-04-07 10:45:14'),
(5, 'Chamari', 'Herath', '954397890V', '0715564388', 'Gampola', 'chamari@yahoo.com', '$2y$10$iYYT76PTrFma8egpcS1o0udNOZVGF0K1jownwJYlhxtlp5LbIGglO', 2, '2019-04-07 10:46:31'),
(6, 'Tharuka', 'Rathnayaka', '936753781V', '0775561341', 'Kegalle', 'tharuka@gmail.com', '$2y$10$71MOjQ3LvwRyXCqSHajo5O68qgA05VbNcH7KwsRqRy23DzpimaoVq', 2, '2019-04-07 10:47:32'),
(7, 'Saman', ' Kumara', '924567390V', '0712239871', 'Mathara', 'saman@yahoo.com', '$2y$10$pi7T8rzriCdEp0iYBw1i5O4gCrPpd0bCuHLwDNeMGyZ9XSFcI2UxW', 2, '2019-04-07 10:49:21'),
(8, 'Omega', 'Rathnayaka', '924453920V', '0713409864', 'Colombo', 'omega@gmail.com', '$2y$10$ldDi.K.Z8snTA/CLRA1Vp.x.MEqrcyRd5WsC32f231xzdl2vnC7DS', 2, '2019-04-07 10:50:46'),
(10, 'reshan', 'madushanka', '912345674v', '0987765544', 'galle', 'tharusha@gmail.com', '$2y$10$vNyJbDs4uclnnYQJHS7D1e12XMlKAoRyVzNPrLPVaayez3.IQPhIq', 3, '2019-08-29 18:44:58'),
(11, 'test', 'test', '902531335v', '0712320922', 'Galle', 'test@test.com', '$2y$10$68DGg7DqYGys7q/sKM488OwrL69CBUIGqTlJaNhUz2afUuwdIBNOK', 2, '2019-08-31 16:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slot`
--
ALTER TABLE `tbl_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`),
  ADD KEY `role_id_3` (`role_id`),
  ADD KEY `role_id_4` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_slot`
--
ALTER TABLE `tbl_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
