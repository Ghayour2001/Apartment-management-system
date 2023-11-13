-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 11:51 AM
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
-- Database: `ams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bill`
--

CREATE TABLE `add_bill` (
  `bill_id` int(11) NOT NULL,
  `water_bill` varchar(200) NOT NULL,
  `gas_bill` varchar(200) NOT NULL,
  `electric_bill` varchar(200) NOT NULL,
  `issue_date` varchar(200) NOT NULL,
  `bill_month` varchar(11) NOT NULL,
  `bill_year` varchar(11) NOT NULL,
  `total_bill` varchar(255) NOT NULL DEFAULT '0',
  `deposit_bank_name` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_bill`
--

INSERT INTO `add_bill` (`bill_id`, `water_bill`, `gas_bill`, `electric_bill`, `issue_date`, `bill_month`, `bill_year`, `total_bill`, `deposit_bank_name`, `added_date`) VALUES
(1, '51', '68', '34', '1990-07-30', '5', '2023', '153', 'HBL', '2023-06-10 08:38:32'),
(2, '30000', '4', '97', '2021-11-28', '7', '2003', '30101', 'Daryl Skinner', '2023-07-20 18:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `add_complain`
--

CREATE TABLE `add_complain` (
  `complain_id` int(11) NOT NULL,
  `c_title` varchar(200) NOT NULL,
  `c_description` varchar(1000) NOT NULL,
  `c_date` varchar(200) NOT NULL,
  `c_userid` varchar(255) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `job_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `assign_employee` varchar(255) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_complain`
--

INSERT INTO `add_complain` (`complain_id`, `c_title`, `c_description`, `c_date`, `c_userid`, `complainant_name`, `designation`, `job_status`, `assign_employee`, `added_date`) VALUES
(1, 'Quo qui Nam harum te', 'Rem voluptatum culpa', '1977-05-02', '1', 'Rayyan khan ', 'Owner', 'In-Progress', NULL, '2023-06-12 14:38:25'),
(2, 'Excepteur consequatu', 'Officia rerum saepe ', '1987-10-03', '1', 'Rayyan khan ', 'Owner', 'On-Hold', 'Sheharyar', '2023-06-12 14:38:50'),
(3, 'Laborum Ex temporib', 'Consequat Et mollit', '2014-11-19', '8', 'ahmad', 'Tenant', 'In-Progress', 'Sheharyar', '2023-07-20 18:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `add_designation`
--

CREATE TABLE `add_designation` (
  `designation_id` int(11) NOT NULL,
  `emp_designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_designation`
--

INSERT INTO `add_designation` (`designation_id`, `emp_designation`) VALUES
(1, 'Security Gaurd                                                                                            '),
(5, 'engineer');

-- --------------------------------------------------------

--
-- Table structure for table `add_employee_salary`
--

CREATE TABLE `add_employee_salary` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `month_id` varchar(11) NOT NULL,
  `xyear` varchar(11) NOT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `issue_date` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_employee_salary`
--

INSERT INTO `add_employee_salary` (`emp_id`, `emp_name`, `designation`, `month_id`, `xyear`, `amount`, `issue_date`, `added_date`) VALUES
(1, '1', 'Security Gaurd                                                                                            ', 'May', '2023', '10000', '2023-06-10', '2023-06-10 08:35:48'),
(2, '2', 'engineer', 'February', '2007', '15000', '2023-07-20', '2023-07-20 18:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `add_floor`
--

CREATE TABLE `add_floor` (
  `id` int(11) NOT NULL,
  `floor_no` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_floor`
--

INSERT INTO `add_floor` (`id`, `floor_no`, `date`) VALUES
(1, 'first floor', '2023-06-10 07:36:52'),
(8, 'ground floor', '2023-06-10 13:29:05'),
(11, '2nd ', '2023-07-20 17:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `add_funds`
--

CREATE TABLE `add_funds` (
  `fund_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `xyear` int(11) NOT NULL,
  `f_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_funds`
--

INSERT INTO `add_funds` (`fund_id`, `owner_id`, `month_id`, `xyear`, `f_date`, `total_amount`, `purpose`, `added_date`) VALUES
(2, 8, 8, 1999, '1988-12-01', '47.00', 'Recusandae Molestia', '2023-05-05 21:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `add_month`
--

CREATE TABLE `add_month` (
  `m_id` int(11) NOT NULL,
  `month_name` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_month`
--

INSERT INTO `add_month` (`m_id`, `month_name`, `added_date`) VALUES
(1, 'January', '2016-04-11 12:16:15'),
(2, 'February', '2016-04-11 12:16:25'),
(3, 'March', '2016-04-11 12:16:30'),
(4, 'April', '2016-04-11 12:16:36'),
(5, 'May', '2016-04-11 12:16:41'),
(6, 'June', '2016-04-11 12:16:48'),
(7, 'July', '2016-04-11 12:16:53'),
(8, 'August', '2016-04-11 12:16:59'),
(9, 'September', '2016-04-11 12:17:06'),
(10, 'Octobor', '2016-04-11 12:17:14'),
(11, 'November', '2016-04-11 12:17:24'),
(12, 'December', '2016-04-11 12:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `add_owner`
--

CREATE TABLE `add_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_username` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_contact` varchar(255) NOT NULL,
  `owner_pre_address` varchar(255) NOT NULL,
  `owner_cnic` varchar(255) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  `owner_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '2',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_owner`
--

INSERT INTO `add_owner` (`owner_id`, `owner_name`, `owner_username`, `owner_email`, `owner_contact`, `owner_pre_address`, `owner_cnic`, `owner_password`, `owner_image`, `status`, `role`, `added_date`) VALUES
(1, 'Rayyan khan ', 'ownar', 'rayyan@gmail.com', '03159140592', 'nowshera', '2347899005678', '1234', 'images/1686382941usman-yousaf-GFOlzpLuiCg-unsplash.jpg', '0', '2', '2023-06-10 07:42:21'),
(2, 'Sohail', 'sohail', 'sohail@gmail.com', '99146826381', 'nowshera', '2347899005678', '1111', 'images/16863874896.jpg', '0', '2', '2023-06-10 11:18:14'),
(3, 'zafar', 'kuvineru', 'muzyk@mailinator.com', '99146826381', 'Laboriosam excepteu', '2347899005678', 'Pa$$w0rd!', 'images/1686505813download (2).jpg', '0', '2', '2023-06-11 17:50:13'),
(4, 'jalees', 'nuniveh', 'ghayoorahmad0@gmail.com', '00000000000', 'Village: Pushtoon garshi, Tehsil: Pabbi, district:Nowshera', '1720131134255', 'Pa$$w0rd!', 'images/1689875967sabri-tuzcu-wunVFNvqhfE-unsplash.jpg', '0', '2', '2023-07-20 17:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `add_owner_unit_relation`
--

CREATE TABLE `add_owner_unit_relation` (
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_owner_utility`
--

CREATE TABLE `add_owner_utility` (
  `owner_utility_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `unit_no` int(11) NOT NULL,
  `lease_rent` varchar(255) NOT NULL DEFAULT '0',
  `total_rent` varchar(255) NOT NULL DEFAULT '0',
  `issue_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoice_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_owner_utility`
--

INSERT INTO `add_owner_utility` (`owner_utility_id`, `owner_id`, `floor_no`, `unit_no`, `lease_rent`, `total_rent`, `issue_date`, `status`, `added_date`, `invoice_number`) VALUES
(1, 1, 1, 1, '10000', '0', '2023-06-10', 0, '2023-06-10 07:44:33', 'INV-20230610-000001'),
(15, 4, 11, 14, '100000', '0', '2023-07-20', 0, '2023-07-20 18:04:17', 'INV-20230720-000002'),
(16, 4, 11, 15, '10000', '0', '2023-07-20', 0, '2023-07-20 18:05:32', 'INV-20230720-000003');

-- --------------------------------------------------------

--
-- Table structure for table `add_rent`
--

CREATE TABLE `add_rent` (
  `rent_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `floor_no` varchar(200) NOT NULL,
  `unit_no` varchar(200) NOT NULL,
  `rid` varchar(255) NOT NULL,
  `month_id` int(11) NOT NULL,
  `xyear` varchar(200) NOT NULL,
  `rent` decimal(15,2) NOT NULL DEFAULT 0.00,
  `water_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `electric_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `gas_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `security_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `utility_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `other_bill` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_rent` varchar(300) NOT NULL DEFAULT '0',
  `paid_rent` varchar(255) NOT NULL DEFAULT '0',
  `remaining_rent` varchar(255) NOT NULL,
  `issue_date` varchar(200) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0,
  `invoice_number` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_rent`
--

INSERT INTO `add_rent` (`rent_id`, `type`, `floor_no`, `unit_no`, `rid`, `month_id`, `xyear`, `rent`, `water_bill`, `electric_bill`, `gas_bill`, `security_bill`, `utility_bill`, `other_bill`, `total_rent`, `paid_rent`, `remaining_rent`, `issue_date`, `payment_date`, `bill_status`, `invoice_number`, `added_date`) VALUES
(1, '', '1', '1', '1', 6, '2023', '10000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '16000', '10000', '6000', '2023-06-10', '', 0, 'INV-20230610-000001', '2023-06-10 08:26:50'),
(4, '', '11', '14', '8', 7, '2023', '5.00', '100.00', '100.00', '100.00', '100.00', '100.00', '100.00', '605', '605', '0', '2023-07-20', '', 0, 'INV-20230720-000002', '2023-07-20 18:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `add_tenant`
--

CREATE TABLE `add_tenant` (
  `tid` int(11) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `t_email` varchar(200) NOT NULL,
  `t_contact` varchar(200) NOT NULL,
  `t_address` varchar(200) NOT NULL,
  `t_nid` varchar(200) NOT NULL,
  `t_floor_no` varchar(200) NOT NULL,
  `t_unit_no` varchar(200) NOT NULL,
  `t_advance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `t_rent_pm` decimal(15,2) NOT NULL DEFAULT 0.00,
  `t_date` varchar(200) NOT NULL,
  `t_gone_date` varchar(200) DEFAULT NULL,
  `t_password` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `t_status` int(1) NOT NULL DEFAULT 1,
  `t_month` int(11) NOT NULL,
  `t_year` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '3',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_tenant`
--

INSERT INTO `add_tenant` (`tid`, `t_name`, `username`, `t_email`, `t_contact`, `t_address`, `t_nid`, `t_floor_no`, `t_unit_no`, `t_advance`, `t_rent_pm`, `t_date`, `t_gone_date`, `t_password`, `image`, `t_status`, `t_month`, `t_year`, `role`, `added_date`) VALUES
(1, 'shahan', 'tenant', 'shahan@gmail.com', '03458685155', 'mardan', '1234567876543', '1', '1', '5000.00', '10000.00', '2023-06-10', NULL, '1234', 'images/1686385473WhatsApp Image 2022-12-27 at 4.23.05 PM.jpeg', 0, 0, '', '3', '2023-06-10 08:24:33'),
(8, 'ahmad', 'ahmad', 'ahmad@gmail.com', '22222222222', 'Odit laborum est ill', '0000000000000', '11', '14', '0.00', '5.00', '2007-05-12', NULL, '1234', 'images/1689876171ahmed-atef-8TzHYjGhzOw-unsplash.jpg', 0, 0, '', '3', '2023-07-20 18:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `add_units`
--

CREATE TABLE `add_units` (
  `unit_id` int(11) NOT NULL,
  `floor_no` varchar(255) NOT NULL,
  `unit_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `owner_status` int(11) NOT NULL DEFAULT 0,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_units`
--

INSERT INTO `add_units` (`unit_id`, `floor_no`, `unit_no`, `status`, `owner_status`, `added_date`) VALUES
(1, '1', 'A1', '1', 1, '2023-06-10 08:24:33'),
(12, '8', 'A2', '0', 0, '2023-06-12 06:36:17'),
(14, '11', 'A1', '1', 1, '2023-07-20 18:04:17'),
(15, '11', 'A2', '0', 1, '2023-07-20 18:05:32'),
(16, '1', 'A3', '0', 0, '2023-10-03 15:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `add_year`
--

CREATE TABLE `add_year` (
  `y_id` int(11) NOT NULL,
  `xyear` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_year`
--

INSERT INTO `add_year` (`y_id`, `xyear`, `added_date`) VALUES
(4, '2012', '2016-04-13 14:02:38'),
(5, '2013', '2016-04-13 14:02:42'),
(6, '2014', '2016-04-13 14:02:47'),
(7, '2015', '2016-04-13 14:02:51'),
(8, '2016', '2016-04-13 14:02:56'),
(9, '2017', '2016-04-13 14:03:04'),
(10, '2018', '2016-04-13 14:03:08'),
(11, '2019', '2016-04-13 14:03:12'),
(12, '2020', '2016-04-13 14:03:17'),
(13, '2021', '2018-04-20 06:12:54'),
(14, '2021', '2018-05-18 14:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL DEFAULT 'Admin',
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `username`, `password`, `designation`, `email`, `contact_no`, `image`, `status`, `role`) VALUES
(1, 'Ghayoor Ahmad', 'admin', '1234', 'Admin', 'ghayoor@gmail.com', '03139150591', 'images/1686382331samuel-raita-RiDxDgHg7pw-unsplash.jpg', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_username` varchar(255) NOT NULL,
  `emp_contact` varchar(255) NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `emp_nid` varchar(255) NOT NULL,
  `emp_designation` varchar(255) NOT NULL,
  `emp_date` varchar(255) NOT NULL,
  `emp_ending_date` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_status` varchar(100) NOT NULL DEFAULT '0',
  `image` varchar(1000) NOT NULL,
  `emp_role` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_username`, `emp_contact`, `pre_address`, `per_address`, `emp_nid`, `emp_designation`, `emp_date`, `emp_ending_date`, `emp_password`, `emp_status`, `image`, `emp_role`) VALUES
(1, 'Sheharyar', 'sheharyar@gmail.com', 'employee', '03179168992', 'Nizampur', 'Nizampur', '1234567876543', '1', '2023-06-10', '', '1234', '0', 'images/1686386090usman-yousaf-GFOlzpLuiCg-unsplash.jpg', 4),
(2, 'sameer', 'wiberipep@mailinator.com', 'qubyzam', '22222222222', 'Eiusmod quia consequ                                                ', 'At officiis sint rep', '5555555555556', '5', '2012-03-13', '2001-08-21', 'Pa$$w0rd!', '0', 'images/1689876986sabri-tuzcu-wunVFNvqhfE-unsplash.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) UNSIGNED NOT NULL,
  `maintenance_title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `maintenance_title`, `date`, `amount`, `location`, `added_date`) VALUES
(1, 'Light', '2023-06-10', '100', 'A1 flat first floor', '2023-06-12 06:07:43'),
(2, 'light', '2023-07-06', '1000', '1st floor', '2023-07-20 18:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(500) NOT NULL,
  `notice_description` text NOT NULL,
  `notice_designation` varchar(5000) NOT NULL,
  `notice_status` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`notice_id`, `notice_title`, `notice_description`, `notice_designation`, `notice_status`, `created_date`) VALUES
(1, 'Ea porro iste culpa ', 'Quia nisi incidunt ', 'Tenant', 0, '2023-06-10 08:40:54'),
(2, 'urgent meeting', 'Provident aut fugia', 'Tenant', 0, '2023-07-20 18:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `s_a_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL DEFAULT 'Super Admin',
  `role` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`s_a_id`, `name`, `email`, `contact_no`, `username`, `password`, `designation`, `role`) VALUES
(1, 'Muhammad Taleeb', 'taleeb@gmail.com', '03119145764', 'admin', '1111', 'Super Admin', '0'),
(2, 'Super Admin', 'superadmin@gmail.com', '111222333', 'super_admin', '1234', 'Super Admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `floor_no` varchar(20) NOT NULL,
  `unit_no` varchar(20) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `entry_date`, `name`, `mobile`, `address`, `floor_no`, `unit_no`, `in_time`, `out_time`) VALUES
(1, '2023-06-10', 'Muhammad Ali', '1234567890', 'Rigi model town', '1', '12', '14:50:00', '17:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bill`
--
ALTER TABLE `add_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `add_complain`
--
ALTER TABLE `add_complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `add_designation`
--
ALTER TABLE `add_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `add_employee_salary`
--
ALTER TABLE `add_employee_salary`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `add_floor`
--
ALTER TABLE `add_floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_funds`
--
ALTER TABLE `add_funds`
  ADD PRIMARY KEY (`fund_id`);

--
-- Indexes for table `add_month`
--
ALTER TABLE `add_month`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `add_owner`
--
ALTER TABLE `add_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `add_owner_utility`
--
ALTER TABLE `add_owner_utility`
  ADD PRIMARY KEY (`owner_utility_id`);

--
-- Indexes for table `add_rent`
--
ALTER TABLE `add_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `add_tenant`
--
ALTER TABLE `add_tenant`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `add_units`
--
ALTER TABLE `add_units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `add_year`
--
ALTER TABLE `add_year`
  ADD PRIMARY KEY (`y_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`s_a_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bill`
--
ALTER TABLE `add_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_complain`
--
ALTER TABLE `add_complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `add_designation`
--
ALTER TABLE `add_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_employee_salary`
--
ALTER TABLE `add_employee_salary`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_floor`
--
ALTER TABLE `add_floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `add_funds`
--
ALTER TABLE `add_funds`
  MODIFY `fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_month`
--
ALTER TABLE `add_month`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `add_owner`
--
ALTER TABLE `add_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `add_owner_utility`
--
ALTER TABLE `add_owner_utility`
  MODIFY `owner_utility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `add_rent`
--
ALTER TABLE `add_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `add_tenant`
--
ALTER TABLE `add_tenant`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_units`
--
ALTER TABLE `add_units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `add_year`
--
ALTER TABLE `add_year`
  MODIFY `y_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `s_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
