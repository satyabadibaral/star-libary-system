-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:3307
-- Generation Time: Mar 29, 2025 at 04:02 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publication_year` varchar(10) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `catagory_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publication_year`, `isbn`, `catagory_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bhagabat  geeta', 'ramachandrasahoo', '2024', '1', 1, 0, '2025-02-23 02:18:34', '2025-02-23 00:31:48'),
(2, 'matha', 'satya', '2345', '1se', 2, 1, '2025-02-23 02:30:25', NULL),
(4, 'sds', 'ferr', '2024', '3t', 1, 1, '2025-02-23 02:31:39', NULL),
(5, 'harihar', 'raghusahoo', '2980', '5f', 1, 1, '2025-02-23 02:32:18', '2025-02-23 04:53:03'),
(6, 'fdgdvg', 'sq', '2023', '6s', 3, 1, '2025-02-23 02:32:45', NULL),
(8, 'dsvghd', 'qgjwvqwg', '3020', 'dvshvd', 2, 1, '2025-02-23 02:33:55', NULL),
(9, 'test 3', 'sdf', '123', '34ty', 3, 1, '2025-02-23 02:34:15', '2025-02-23 00:30:41'),
(10, 'jkhefdfgf', 'somy sahoo', '234', '2345', 3, 1, '2025-02-23 02:34:37', '2025-02-26 02:16:21'),
(11, 'raghu', 'happy', '2376', '23ert', 3, 0, '2025-02-23 02:35:03', '2025-02-26 01:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `book_loans`
--

CREATE TABLE `book_loans` (
  `id` int(11) NOT NULL,
  `books_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `is_return` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book_loans`
--

INSERT INTO `book_loans` (`id`, `books_id`, `student_id`, `loan_date`, `return_date`, `is_return`, `created_at`, `updated_at`) VALUES
(2, 4, 17, '2025-02-20', '2025-02-12', 0, '2025-02-28 16:11:28', NULL),
(3, 4, 17, '2025-02-20', '2025-02-12', 0, '2025-02-28 16:21:16', NULL),
(4, 4, 17, '2025-02-20', '2025-02-12', 0, '2025-02-28 16:21:27', NULL),
(6, 6, 17, '2025-02-13', '2025-02-10', 0, '2025-02-28 16:22:49', NULL),
(8, 1, 18, '2025-02-28', '2025-03-06', 0, '2025-02-28 17:44:34', NULL),
(9, 4, 19, '2025-03-07', '2025-03-22', 0, '0000-00-00 00:00:00', '2025-03-06 11:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SCC', '2025-01-30 02:45:31', NULL),
(2, 'UPSC', '2025-01-30 02:46:56', '2025-01-31 02:46:34'),
(3, 'Railway', '2025-02-07 14:48:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `f`
--

CREATE TABLE `f` (
  `COL 1` varchar(10) DEFAULT NULL,
  `COL 2` varchar(10) DEFAULT NULL,
  `COL 3` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `f`
--

INSERT INTO `f` (`COL 1`, `COL 2`, `COL 3`) VALUES
('product_id', 'ip_address', 'quantity'),
('3', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone_no`, `email`, `address`, `status`, `dob`, `created_at`, `updated_at`) VALUES
(17, 'satyabadi baral', '7606861899', 's@gmail.com', 'aSA', 1, '2025-02-12', '2025-02-26 14:32:15', '2025-02-26 10:27:15'),
(18, 'raghunath sahoovd', '75812369', 'raghu23@gmail.com', 'mayurajhalia', 0, '2025-02-14', '2025-02-28 17:44:04', '2025-03-06 10:52:29'),
(19, 'rajat nayak', '76089452', 'rajeswari@gmail.com', 'mayurajhalia', 1, '2025-03-15', '2025-03-06 15:33:11', NULL),
(20, 'Rojalin swain', '9178428157', 'rojalin@gmail.com', 'jajapur,dharmasal', 1, '2025-03-12', '2025-03-21 00:56:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `student_id`, `plan_id`, `amount`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 17, 3, 452.00, '2025-03-20', '2025-03-18', '2025-03-16 03:23:29', NULL),
(2, 19, 4, 4350.00, '2025-03-16', '2025-04-16', '2025-03-16 03:24:57', NULL),
(3, 19, 4, 4350.00, '2025-03-16', '2025-04-16', '2025-03-16 03:27:06', NULL),
(4, 18, 4, 4350.00, '2025-03-20', '2025-04-20', '2025-03-20 02:49:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `duration` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `title`, `amount`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(3, 'wq', 452, 1, 1, '2025-03-14 14:43:22', NULL),
(4, 'annualy', 4350, 1, 1, '2025-03-14 14:44:03', '2025-03-15 03:23:23'),
(5, 'wd', 452, 5, 1, '2025-03-14 14:48:23', '2025-03-15 03:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone_no`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'satyabadi', 's@gmail.com', '7606861899', '123', NULL, '2025-03-25 01:19:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_loans`
--
ALTER TABLE `book_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_loans`
--
ALTER TABLE `book_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
