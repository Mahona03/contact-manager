-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2025 at 09:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_manager_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `photo`) VALUES
(1, 'Jomae Alexander', 'emanuelmahona3@gmail.com', '0748411314', '3MMA 4.jpg'),
(2, 'Emanuel Mahona', 'mahona@gmail.com', '0687215739', 'IMG-20250326-WA0050.jpg'),
(3, 'Irene Moses', 'irenemoses12@gmail.com', '0788115612', 'IMG-20250326-WA0048.jpg'),
(4, 'Jackline Yohana', 'jachyoh@gmail.com', '0675345672', 'IMG-20250326-WA0053.jpg'),
(5, 'Yohana Jackob', 'yohanajackob@gmail.com', '0612567421', 'IMG-20250326-WA0051.jpg'),
(6, 'Hafidh Juma', 'juma.hafidh@gmail.com', '0766504030', 'IMG-20250326-WA0054.jpg'),
(7, 'Masanja Anord', 'masanja..anorld@gmail.com', '0788655783', 'IMG-20250326-WA0049.jpg'),
(8, 'Halima Mdee', 'halimamdee@gmail.com', '0675412361', 'IMG-20250326-WA0052.jpg'),
(9, 'Emanuel Alexander', 'emanuelalex13@gmail.com', '0627026662', 'IMG-20250326-WA0050.jpg'),
(10, 'Julius Mnanka', 'juliusmnznka@gamail.com', '0654326709', 'IMG-20250326-WA0054.jpg'),
(11, 'Hamis Juma', 'hamisjuma@gmail.com', '0740302713', 'IMG-20250326-WA0054.jpg'),
(13, 'Hamis Gimbui', 'hamisgimbui@gmail.com', '0697345613', 'IMG-20250326-WA0050.jpg'),
(14, 'Jihango Mahona', 'johangomahona@gmail.com', '0748611312', 'IMG-20250326-WA0054.jpg'),
(15, 'Aisha Shaban', 'aishashaban@gmail.com', '0682545691', 'IMG-20250326-WA0048.jpg'),
(16, 'Hamis Gimbui', 'hamisgimbui@gmail.com', '0748411315', 'IMG-20250326-WA0049.jpg'),
(17, 'Ibrahim Dickson', 'ibrah@gmail.com', '0687215739', 'h7rj-BEnRWs8HOC2UFvIssDTYkyNqVYo_1668523333.jpg'),
(18, 'Edwin Mhondela', 'edwinmhondera3@gmail.com', '0748399123', 'screencapture-library-local-1450375550068_115413.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$dfw61s4I0G4oHim4LQToQurIbzmp/uwmPtzopLcPXQ7CKUGRfzZpG', '2025-04-26 17:18:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
