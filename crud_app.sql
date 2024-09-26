-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 05:55 PM
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
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `created_at`, `updated_At`) VALUES
(9, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:33:58', '2024-09-26 01:33:58'),
(10, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 01:38:17', '2024-09-26 01:38:17'),
(11, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 01:38:17', '2024-09-26 01:38:17'),
(12, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:38:17', '2024-09-26 01:38:17'),
(14, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 01:41:00', '2024-09-26 01:41:00'),
(15, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:41:00', '2024-09-26 01:41:00'),
(16, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 01:46:30', '2024-09-26 01:46:30'),
(18, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:46:30', '2024-09-26 01:46:30'),
(20, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 01:47:29', '2024-09-26 01:47:29'),
(21, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:47:29', '2024-09-26 01:47:29'),
(22, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 01:48:17', '2024-09-26 01:48:17'),
(23, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 01:48:17', '2024-09-26 01:48:17'),
(24, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:48:17', '2024-09-26 01:48:17'),
(25, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 01:49:12', '2024-09-26 01:49:12'),
(26, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 01:49:12', '2024-09-26 01:49:12'),
(27, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 01:49:12', '2024-09-26 01:49:12'),
(28, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:43:57', '2024-09-26 02:43:57'),
(29, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:43:57', '2024-09-26 02:43:57'),
(30, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:43:57', '2024-09-26 02:43:57'),
(31, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:45:15', '2024-09-26 02:45:15'),
(32, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:45:15', '2024-09-26 02:45:15'),
(33, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:45:15', '2024-09-26 02:45:15'),
(34, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:47:10', '2024-09-26 02:47:10'),
(35, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:47:10', '2024-09-26 02:47:10'),
(36, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:47:10', '2024-09-26 02:47:10'),
(37, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:47:21', '2024-09-26 02:47:21'),
(38, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:47:21', '2024-09-26 02:47:21'),
(39, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:47:21', '2024-09-26 02:47:21'),
(40, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:49:15', '2024-09-26 02:49:15'),
(41, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:49:15', '2024-09-26 02:49:15'),
(42, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:49:15', '2024-09-26 02:49:15'),
(43, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:56:31', '2024-09-26 02:56:31'),
(44, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:56:31', '2024-09-26 02:56:31'),
(45, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:56:31', '2024-09-26 02:56:31'),
(46, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:57:19', '2024-09-26 02:57:19'),
(47, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:57:19', '2024-09-26 02:57:19'),
(48, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:57:19', '2024-09-26 02:57:19'),
(49, 'John Doe', 'johndoe@example.com', '1234567890', '2024-09-26 02:58:19', '2024-09-26 02:58:19'),
(50, 'Jane Doe', 'janedoe@example.com', '0998876446', '2024-09-26 02:58:19', '2024-09-26 02:58:19'),
(51, 'Mark Doe', 'markdoe@example.com', '575646777', '2024-09-26 02:58:19', '2024-09-26 02:58:19'),
(54, 'seun mayo', 'seunmayor@admin.com', '4759843793857', '2024-09-26 04:04:01', '2024-09-26 04:04:01'),
(55, 'Wale Walexy', 'walexy@adminn.com', '984758947', '2024-09-26 04:27:23', '2024-09-26 04:27:23'),
(56, 'want to Update More Details', 'testng@mail.com', '76853478', '2024-09-26 07:22:27', '2024-09-26 08:13:48'),
(58, 'Updated user', 'updatedaccountmail@gmail.com', '089584958', '2024-09-26 07:25:37', '2024-09-26 08:38:48'),
(59, 'Recent User', 'testsample@user.com', '785634786', '2024-09-26 07:28:27', '2024-09-26 08:12:59'),
(60, 'test', 'test@mail.com', '3839448989', '2024-09-26 07:30:31', '2024-09-26 07:30:31'),
(61, 'new user', 'newuser@mail.com', '63478263', '2024-09-26 07:32:17', '2024-09-26 07:32:17'),
(64, 'Benson Idahosa', 'benson.id@gmail.com', '6786473', '2024-09-26 12:15:43', '2024-09-26 12:15:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
