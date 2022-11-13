-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 05:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `start_of_contract` date NOT NULL,
  `end_of_contract` date NOT NULL,
  `duration` int(50) NOT NULL,
  `date_of_signing` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL,
  `rent_per_terms_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `house_images` varchar(255) NOT NULL,
  `is_available` tinyint(2) NOT NULL,
  `house_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_images`, `is_available`, `house_type_id`) VALUES
(2, '1668115633_apartment-image-1.jpg', 1, 1),
(3, '1668115651_apartment-image-1.jpg', 1, 1),
(4, '1668115660_apartment-image-1.jpg', 1, 1),
(5, '1668115874_maisonette-image-1.png', 0, 2),
(6, '1668115883_maisonette-image-1.png', 0, 2),
(7, '1668115891_maisonette-image-1.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `house_type`
--

CREATE TABLE `house_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `no_of_bedrooms` varchar(50) NOT NULL,
  `rent` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_type`
--

INSERT INTO `house_type` (`id`, `name`, `no_of_bedrooms`, `rent`, `deposit`) VALUES
(1, 'apartment', '2', '8000', '3000'),
(2, 'maisonette', '3', '10000', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `total_rent` int(50) NOT NULL,
  `balance` int(50) NOT NULL,
  `due_date` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `issue_status_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE `issue_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'active'),
(3, 'resolved');

-- --------------------------------------------------------

--
-- Table structure for table `paid_for`
--

CREATE TABLE `paid_for` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid_for`
--

INSERT INTO `paid_for` (`id`, `name`) VALUES
(1, 'rent'),
(2, 'deposit');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `amount` int(50) NOT NULL,
  `paid_for_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent_per_terms`
--

CREATE TABLE `rent_per_terms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_per_terms`
--

INSERT INTO `rent_per_terms` (`id`, `name`) VALUES
(1, 'weekly'),
(2, 'monthly'),
(3, 'annually');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_type`) VALUES
(1, 'admin'),
(2, 'landlord'),
(3, 'tenant');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `national_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `first_name`, `last_name`, `email`, `address`, `phone_no`, `national_id`, `user_id`) VALUES
(4, 'Rowland', 'Koech', 'rowkibet@gmail.com', '7567', '0717105322', '12342', 1),
(5, 'Mike', 'Koech', 'mike@gmail.com', '7567', '0772497252', '12342', 8),
(11, 'Jane', 'Cheptoo', 'jane@gmail.com', '7567', '0723868921', '12342', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'Rowland', '$2y$10$wEwkA7NCa2B2bYl6etQ6Y./BNZhSqdF5Oe/vUnWxSoXwh8eL2618y', 3),
(7, 'admin', '$2y$10$/kxi5QnMBzBVDBG8vLEpc.Ul6MVL4Ob1Eh1KD5ompDo7XxJY7g7H.', 1),
(8, 'Mike', '$2y$10$L/d7pz4c5DXTvsknz.cLHOFghG9iLWlMwiYpEKX3xENBlpLQAiTV6', 3),
(14, 'Jane', '$2y$10$uUo67PpWb2kgrPPisHtk2eoVp4mqwJwSLz6O/Wg2klzAyhPZi8Pyu', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `rent_per_terms_id` (`rent_per_terms_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_type`
--
ALTER TABLE `house_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_status`
--
ALTER TABLE `issue_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_for`
--
ALTER TABLE `paid_for`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `paid_for_id` (`paid_for_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `rent_per_terms`
--
ALTER TABLE `rent_per_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tenants_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `house_type`
--
ALTER TABLE `house_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_status`
--
ALTER TABLE `issue_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paid_for`
--
ALTER TABLE `paid_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rent_per_terms`
--
ALTER TABLE `rent_per_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`rent_per_terms_id`) REFERENCES `rent_per_terms` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`paid_for_id`) REFERENCES `paid_for` (`id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
