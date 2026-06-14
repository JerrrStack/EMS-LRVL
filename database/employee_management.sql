-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 12:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', '2026-06-14 06:46:25', '2026-06-14 06:46:25', NULL),
(2, 'Human Resources', '2026-06-14 06:46:25', '2026-06-14 06:46:25', NULL),
(3, 'Finance', '2026-06-14 06:46:25', '2026-06-14 06:46:25', NULL),
(4, 'Marketing', '2026-06-14 06:46:25', '2026-06-14 06:46:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` decimal(10,2) DEFAULT 0.00,
  `hire_date` date NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_no`, `first_name`, `last_name`, `email`, `phone`, `department_id`, `position`, `salary`, `hire_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EMP001', 'Juan', 'Dela Cruz', 'juan@example.com', '09171234567', 1, 'PHP Developer', '35000.00', '2025-01-15', 'active', '2026-06-14 06:46:25', '2026-06-14 06:46:25', NULL),
(2, 'EMP002', 'Maria', 'Santos', 'maria@example.com', '09181234567', 2, 'HR Specialist', '28000.00', '2025-03-10', 'inactive', '2026-06-14 06:46:25', '2026-06-14 10:15:10', NULL),
(3, 'EMP003', 'Jose', 'Reyes', 'jose@example.com', '09191234567', 3, 'Accountant', '32000.00', '2025-02-20', 'active', '2026-06-14 06:46:25', '2026-06-14 09:40:35', '2026-06-14 09:40:35'),
(4, 'EMP004', 'Ana', 'Garcia', 'ana.garcia@example.com', '09171234001', 1, 'Frontend Developer', '34000.00', '2024-06-01', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(5, 'EMP005', 'Carlo', 'Mendoza', 'carlo.mendoza@example.com', '09171234002', 1, 'Backend Developer', '36000.00', '2024-07-15', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(6, 'EMP006', 'Liza', 'Torres', 'liza.torres@example.com', '09171234003', 2, 'Recruiter', '27000.00', '2024-08-20', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(7, 'EMP007', 'Mark', 'Villanueva', 'mark.villanueva@example.com', '09171234004', 2, 'HR Manager', '42000.00', '2023-11-05', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(8, 'EMP008', 'Grace', 'Lim', 'grace.lim@example.com', '09171234005', 3, 'Finance Analyst', '31000.00', '2024-09-10', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(9, 'EMP009', 'Ryan', 'Castillo', 'ryan.castillo@example.com', '09171234006', 3, 'Payroll Officer', '29000.00', '2025-01-08', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(10, 'EMP010', 'Sofia', 'Ramos', 'sofia.ramos@example.com', '09171234007', 4, 'Marketing Associate', '28000.00', '2024-10-01', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(11, 'EMP011', 'Daniel', 'Navarro', 'daniel.navarro@example.com', '09171234008', 4, 'Content Strategist', '30000.00', '2024-05-18', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(12, 'EMP012', 'Patricia', 'Bautista', 'patricia.bautista@example.com', '09171234009', 1, 'QA Engineer', '33000.00', '2024-12-02', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(13, 'EMP013', 'Eric', 'Flores', 'eric.flores@example.com', '09171234010', 3, 'Senior Accountant', '38000.00', '2023-03-22', 'inactive', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(14, 'EMP014', 'Hannah', 'Cruz', 'hannah.cruz@example.com', '09171234011', 4, 'Social Media Manager', '32000.00', '2025-02-14', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL),
(15, 'EMP015', 'Kevin', 'Aquino', 'kevin.aquino@example.com', '09171234012', 1, 'DevOps Engineer', '40000.00', '2024-04-30', 'active', '2026-06-14 10:13:53', '2026-06-14 10:13:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'System Administrator', 'first.user@gmail.com', '$2y$10$7wXAnBA65cbBdxqK2DbRZ.UfAqvYYBGVGIJmu69in2FI.EYE9vmvW', 'admin', '2026-06-14 06:46:25', '2026-06-14 10:12:57', NULL),
(4, 'System Administrator', 'second.user@gmail.com', '$2y$10$7wXAnBA65cbBdxqK2DbRZ.UfAqvYYBGVGIJmu69in2FI.EYE9vmvW', 'user', '2026-06-14 09:01:17', '2026-06-14 10:13:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_no` (`employee_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_employee_no` (`employee_no`),
  ADD KEY `idx_department_id` (`department_id`),
  ADD KEY `idx_employee_email` (`email`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
