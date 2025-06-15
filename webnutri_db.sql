-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 05:27 AM
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
-- Database: `webnutri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `name`, `email`, `password`, `time_joined`, `role`) VALUES
(1, 'Jhonric', 'jhonricbaguisi09@gmail.com', '$2y$10$ZEQIO4ys18Gj/06/pRBexeiQClK2Xi8UUC0ZhIBBDjfdncpW42dE6', '2025-06-15 02:51:24', 'admin'),
(2, 'carlo', 'carlo@gmail.com', '$2y$10$KyhtPvxy2asl4YaHNb.0iu46MNssiK2UujfHp4.5fbRT0M4n/xVu.', '2025-06-15 02:51:24', 'user'),
(7, 'loyd', 'loyd@gmail.com', '$2y$10$rhQRK2AAegIEw07ocvPK9eyBAJKU78uEqv9NA7ONOfeUuLFA0JVXS', '2025-06-15 02:52:51', 'user'),
(8, 'Cir09', 'baguisi@gmail.com', '$2y$10$ebTAyJc7bSS/X/yCuQD9xOwFJVJyt1lqeYTJi.u99u48sTS4kS4z.', '2025-06-15 03:03:05', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
