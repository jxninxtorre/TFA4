-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 11:10 AM
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
-- Database: `tfa4`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Janina Torre', 'jxninxxtorre@gmail.com', '0917-456-0987', '2026-09-22 16:09:22'),
(2, 'Julieta Christie A. Munoz', 'julieta.munoz@example.com', '0918-234-5678', '2026-09-22 16:09:22'),
(3, 'King Rugero P. Ambulo', 'king.ambulo@example.com', '0919-345-6789', '2026-09-22 16:09:22'),
(4, 'Hans Matthew Pomida', 'hans.pomida@example.com', '0920-456-7890', '2026-09-22 16:09:22'),
(5, 'Justin David Nepomuceno', 'justin.nepomuceno@example.com', '0921-567-8901', '2026-09-22 16:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'jtorre', '$2y$10$bmLjC5aCdKFnC1tbEyg8h.waDqUmG5ztpVh7MPFW/HQm0RL9/JnTG', 'Janina Charisse Torre', '1791191141_c4d3a0f0e28655ac5c43.jpg', '2026-09-22 16:09:22'),
(2, 'jmunoz', '$2y$10$TBDLNR.O6zjtJJB72A0MquvFP4q2ym5vqXiEicNYnZ2pXJrrTWSTO', 'Julieta Christie A. Munoz', NULL, '2026-09-22 16:09:22'),
(3, 'kambulo', '$2y$10$lxt9I3nsBSfVnS9A.012JeLfonr0KKNCXe1PXm.A5LRosqPqmPs96', 'King Rugero P. Ambulo', NULL, '2026-09-22 16:09:22'),
(4, 'hpomida', '$2y$10$XdhAztO76xYPDHmBnKju/eaywkiK3QZQ/y9uHcrFJXm19gwVnG12C', 'Hans Matthew Pomida', NULL, '2026-09-22 16:09:22'),
(5, 'jnepomuceno', '$2y$10$AOL38ZU7VpTO8pdfHKtq4ufA7C0KhiNp937gSzgs369Qgg215FD7K', 'Justin David Nepomuceno', NULL, '2026-09-22 16:09:22'),
(6, 'rene.tio', '$2y$10$rp2.cksNiPhwdgcwuA1jL.FDU0DvcZ4JWsJWC0/4ojUbS8YQdDTtC', 'Rene Christopher Tio', NULL, '2026-09-27 14:29:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
