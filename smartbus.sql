-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 03:33 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_id` int(11) NULL,
  `number` int(11) NULL,
  `plates` varchar(20) NULL,
  `longtitude` double NULL,
  `latitude` double NULL,
  `is_running` tinyint(1) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(11) UNSIGNED NOT NULL,
  `departure` datetime NULL,
  `arrival` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus_route_assignments`
--

CREATE TABLE `bus_route_assignments` (
  `id` int(11) UNSIGNED NOT NULL,
  `bus_id` int(11) NULL,
  `bus_route_id` int(11) NULL,
  `assigned` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus_stations`
--

CREATE TABLE `bus_stations` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NULL,
  `longtitude` double NULL,
  `latitude` double NULL,
  `terminus` tinyint(1) NULL,
  `address` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus_tickets`
--

CREATE TABLE `bus_tickets` (
  `id` int(11) UNSIGNED NOT NULL,
  `ticket_price_id` int(11) NULL,
  `bus_id` int(11) NULL,
  `portable_machine_id` int(11) NULL,
  `ticket_number` varchar(40) NULL,
  `is_used` tinyint(1) NULL,
  `used` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NULL,
  `address` varchar(255) NULL,
  `tax` varchar(20) NULL,
  `logo` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` int(11) NULL,
  `company_id` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) UNSIGNED NOT NULL,
  `series_number` int(11) NULL,
  `name` varchar(100) NULL,
  `is_running` tinyint(1) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device_attachments`
--

CREATE TABLE `device_attachments` (
  `id` int(11) UNSIGNED NOT NULL,
  `bus_id` int(11) NULL,
  `device_id` int(11) NULL,
  `attached` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portable_machines`
--

CREATE TABLE `portable_machines` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NULL,
  `series_number` varchar(100) NULL,
  `longtitude` double NULL,
  `latitude` double NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(50) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `route_stops`
--

CREATE TABLE `route_stops` (
  `id` int(11) UNSIGNED NOT NULL,
  `bus_route_id` int(11) NULL,
  `bus_station_id` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simcards`
--

CREATE TABLE `simcards` (
  `id` int(11) UNSIGNED NOT NULL,
  `phone_number` int(11) NULL,
  `service_provider` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simcard_attachments`
--

CREATE TABLE `simcard_attachments` (
  `id` int(11) UNSIGNED NOT NULL,
  `device_id` int(11) NULL,
  `portable_machine_id` int(11) NULL,
  `simcard_id` int(11) NULL,
  `attached` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simcard_recharges`
--

CREATE TABLE `simcard_recharges` (
  `id` int(11) UNSIGNED NOT NULL,
  `simcard_id` int(11) NULL,
  `recharged` datetime NULL,
  `amount` float NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) UNSIGNED NOT NULL,
  `department_id` int(11) NULL,
  `name` varchar(200) NULL,
  `birthday` date NULL,
  `address` varchar(255) NULL,
  `sidnumber` varchar(20) NULL,
  `gender` tinyint(1) NULL,
  `phone` varchar(20) NULL,
  `rfid` varchar(20) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_shiffs`
--

CREATE TABLE `staff_shiffs` (
  `id` int(11) UNSIGNED NOT NULL,
  `staff_id` int(11) NULL,
  `bus_id` int(11) NULL,
  `portable_machine_id` int(11) NULL,
  `started` datetime NULL,
  `ended` datetime NULL,
  `working_hours` float NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_prices`
--

CREATE TABLE `ticket_prices` (
  `id` int(11) UNSIGNED NOT NULL,
  `ticket_type_id` int(11) NULL,
  `price` float NULL,
  `updated` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NULL,
  `password` varchar(128) NULL,
  `passsalt` varchar(10) NULL,
  `email` varchar(255) NULL,
  `role_id` smallint(6) NULL,
  `created` datetime NULL,
  `updated` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_route_assignments`
--
ALTER TABLE `bus_route_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_stations`
--
ALTER TABLE `bus_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_tickets`
--
ALTER TABLE `bus_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_attachments`
--
ALTER TABLE `device_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portable_machines`
--
ALTER TABLE `portable_machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_stops`
--
ALTER TABLE `route_stops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simcards`
--
ALTER TABLE `simcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simcard_attachments`
--
ALTER TABLE `simcard_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simcard_recharges`
--
ALTER TABLE `simcard_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_shiffs`
--
ALTER TABLE `staff_shiffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_types`
--
ALTER TABLE `ticket_types`
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
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_route_assignments`
--
ALTER TABLE `bus_route_assignments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_stations`
--
ALTER TABLE `bus_stations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_tickets`
--
ALTER TABLE `bus_tickets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `device_attachments`
--
ALTER TABLE `device_attachments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portable_machines`
--
ALTER TABLE `portable_machines`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `route_stops`
--
ALTER TABLE `route_stops`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `simcards`
--
ALTER TABLE `simcards`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `simcard_attachments`
--
ALTER TABLE `simcard_attachments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `simcard_recharges`
--
ALTER TABLE `simcard_recharges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff_shiffs`
--
ALTER TABLE `staff_shiffs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
