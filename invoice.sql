-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 01:04 PM
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
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `bank_address` varchar(250) NOT NULL,
  `account_holder` varchar(250) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `branch_code` varchar(250) NOT NULL,
  `ifsc` varchar(250) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `phone`, `address`, `product`, `price`, `bank`, `bank_address`, `account_holder`, `account_no`, `branch_code`, `ifsc`, `invoice_no`, `invoice_date`, `created_at`) VALUES
(18, 'Suriya', '1234567890', 'xxx', 'Mobile', 13000, 'STATE BANK OF INDIA', 'xxx', 'staff', '1234567890', '12SBI102', '19SBI209', 'INVO-181223-01', '', '2023-12-18 11:47:16'),
(19, 'Suriya', '1234567890', 'xxx', 'Tab', 15000, 'STATE BANK OF INDIA', 'xxx', 'staff', '1234567890', '12SBI102', '19SBI209', 'INVO-181223-01', '', '2023-12-18 11:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
