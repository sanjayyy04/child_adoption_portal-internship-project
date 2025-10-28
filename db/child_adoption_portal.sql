-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `child_adoption_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `adopted_children`
--

CREATE TABLE `adopted_children` (
  `id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `adopter_name` varchar(100) DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `message` text DEFAULT NULL,
  `adoption_date` date DEFAULT NULL,
  `child_name` varchar(100) DEFAULT NULL,
  `child_age` int(11) DEFAULT NULL,
  `child_gender` varchar(20) DEFAULT NULL,
  `child_health` text DEFAULT NULL,
  `child_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopted_children`
--

INSERT INTO `adopted_children` (`id`, `child_id`, `adopter_name`, `contact_info`, `appointment_date`, `message`, `adoption_date`, `child_name`, `child_age`, `child_gender`, `child_health`, `child_photo`) VALUES
(1, 5, 'mamu', '9789655456', '2025-07-15', ',', '2025-07-15', 'tino2', 4, 'Male', 'no', '027b6c5b0dfe1d9f1dccc9da3b069fc6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_inquiries`
--

CREATE TABLE `adoption_inquiries` (
  `id` int(11) NOT NULL,
  `adopter_name` varchar(100) DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL,
  `preferred_child` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_inquiries`
--

INSERT INTO `adoption_inquiries` (`id`, `adopter_name`, `contact_info`, `preferred_child`, `appointment_date`, `message`, `status`) VALUES
(1, 'rajudada', '9789655456', 'hitesh', '2025-07-15', 'i want to visit.', 'Approved'),
(2, 'rajumama', '9789655456', 'tino', '2025-07-15', ',', 'Approved'),
(3, 'mamu', '9789655456', 'tino2', '2025-07-15', ',', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `health_status` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `age`, `gender`, `health_status`, `photo`, `status`) VALUES
(6, 'mukesh', 4, 'Male', 'no problem ', '027b6c5b0dfe1d9f1dccc9da3b069fc6.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `public_inquiries`
--

CREATE TABLE `public_inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_inquiries`
--

INSERT INTO `public_inquiries` (`id`, `name`, `email`, `contact`, `message`, `submitted_at`) VALUES
(1, 'sanjay', 'smchauhan04@gmail.com', '9737327918', 'we want to visit', '2025-07-15 15:47:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `adopted_children`
--
ALTER TABLE `adopted_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_inquiries`
--
ALTER TABLE `adoption_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_inquiries`
--
ALTER TABLE `public_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adopted_children`
--
ALTER TABLE `adopted_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoption_inquiries`
--
ALTER TABLE `adoption_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `public_inquiries`
--
ALTER TABLE `public_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
