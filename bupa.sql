-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2024 at 08:00 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taifatec_busia`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `surname` varchar(400) NOT NULL,
  `date` text NOT NULL,
  `profession` text NOT NULL,
  `telephone` text NOT NULL,
  `address` text NOT NULL,
  `code` text NOT NULL,
  `city` text NOT NULL,
  `email` text NOT NULL,
  `company` text NOT NULL,
  `street` text NOT NULL,
  `businessbox` text NOT NULL,
  `businesscode` text NOT NULL,
  `businesscity` text NOT NULL,
  `constituency` text NOT NULL,
  `agegroup` varchar(100) NOT NULL,
  `paid` varchar(20) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  `MerchantRequestID` text NOT NULL,
  `CheckoutRequestID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `surname`, `date`, `profession`, `telephone`, `address`, `code`, `city`, `email`, `company`, `street`, `businessbox`, `businesscode`, `businesscity`, `constituency`, `agegroup`, `paid`, `amount`, `status`, `MerchantRequestID`, `CheckoutRequestID`) VALUES
(3, 'Tamara Sargent', 'Jaquelyn Mcgee', 'Dotson', '2023-02-28 16:39:26', 'Deleniti tenetur cup', '254742543410', 'Nisi ut placeat nes', 'Fuga Tempor optio ', 'Officia ullamco quos', 'dakewe@mailinator.com', 'Dillon Keith Inc', 'citohyt@mailinator.com', '', 'Nisi commodo volupta', 'Quas vitae suscipit ', 'Ullamco necessitatib', '1', '0', '0', '0', '61817-25154242-1', 'ws_CO_28022023163928523742543410'),
(6, 'sam', 'Admin', 'Abbas', '2023-03-05 17:55:32', 'Tech', '254793601418', '00100 Nairobi', '00100', 'Nairobi', 'samson@mzawadi.com', 'Tech', 'Jameson Court', '1112', '2343', 'Jameson Court', 'Kilimani', '1', '1', '1', '1', '25708-49189343-1', 'ws_CO_05032023175534485793601418'),
(7, 'Pascale', 'Delgado', 'Buckner', '2023-03-11 19:44:34', 'Accusantium consecte', '254795920422', 'Maiores laboriosam', 'Laborum quos quas om', 'Accusantium dolore o', 'cigahu@mailinator.com', 'Baldwin Mack Associates', 'hivu@mailinator.com', 'Cillum id corporis s', 'Aliquam odit magna q', 'Dolore culpa fuga ', 'Aut qui aliquam in r', '2', '0', '0', '0', '110464-73126495-1', 'ws_CO_11032023194436202795920422'),
(8, 'Oliver', 'Cline', 'Lancaster', '2023-03-11 23:29:57', 'Dolore ipsa vero ea', '254723477523', 'Ad ut distinctio Do', 'Quos ea ea natus non', 'Quisquam incidunt e', 'getyfi@mailinator.com', 'Sims and Kemp Trading', 'vybol@mailinator.com', 'Debitis ipsum est e', 'Nostrud consequatur ', 'Ex non ut reprehende', 'Magnam at quam id p', '2', '0', '0', '0', '122143-75075362-1', 'ws_CO_11032023232958847723477523');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `id` int(11) NOT NULL,
  `ResultCode` varchar(40) NOT NULL,
  `MerchantRequestID` text NOT NULL,
  `CheckoutRequestID` text NOT NULL,
  `MpesaReceiptNumbe` text NOT NULL,
  `TransactionDate` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `CustomerMessage` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mpesa`
--

INSERT INTO `mpesa` (`id`, `ResultCode`, `MerchantRequestID`, `CheckoutRequestID`, `MpesaReceiptNumbe`, `TransactionDate`, `Amount`, `Phone`, `CustomerMessage`, `date`) VALUES
(2, '0', '109202-30565833-1', 'ws_CO_28022023163633686793601418', 'RBS4OIP5YI', '20230228163656', '1', '254793601418', 'The service request is processed successfully.', '2023-02-28'),
(3, '0', '101034-33079032-1', 'ws_CO_01032023103554189793601418', 'RC10QC142U', '20230301103603', '1', '254793601418', 'The service request is processed successfully.', '2023-03-01'),
(4, '0', '25708-49189343-1', 'ws_CO_05032023175534485793601418', 'RC543M4BVI', '20230305175545', '1', '254793601418', 'The service request is processed successfully.', '2023-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `id` int(11) NOT NULL,
  `receiver` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `created_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `receiver`, `message`, `created_on`) VALUES
(1, 'admin@gmail.com', 'Success account created use following to login phone : +254712345678 and password admin', '2023-02-28 10:25:06'),
(2, 'samson@mzawadi.com', 'Success Registered waiting for payment confirmation...', '2023-03-05 17:55:35'),
(3, 'getyfi@mailinator.com', 'Success Registered waiting for payment confirmation...', '2023-03-11 23:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `phone`, `email`, `password`, `type`, `date`) VALUES
(3, 'Sam', '+254793601418', 'Sammunene1012@gmail.com', '$2y$10$H5aBOV1SXn7J94iNbfwKYOuobA.Vb5mcqMOd22Et/HiwwOXOQlI7a', '1', '2023-02-26 16:14:57'),
(4, 'Admin', '+254712345678', 'admin@gmail.com', '$2y$10$Jyc9i1kjkL6gd1dlMH9llO4q6iOchfBQfiWbT5PMoDWyNQ9O0yH3e', '1', '2023-02-28 10:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
