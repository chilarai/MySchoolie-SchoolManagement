-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2019 at 06:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschoolie`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `requested_date` datetime NOT NULL,
  `offered_date` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `submission_date` date NOT NULL,
  `homework` varchar(2000) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_type` enum('present','absent','leave','unmarked') DEFAULT NULL,
  `total_days` varchar(255) NOT NULL DEFAULT '0',
  `total_present` int(11) NOT NULL DEFAULT '0',
  `total_absent` int(11) NOT NULL DEFAULT '0',
  `total_leaves` int(11) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `circulars`
--

CREATE TABLE `circulars` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `media_link` varchar(1000) DEFAULT NULL,
  `media_type` enum('image','video','audio','document') DEFAULT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(10) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `section`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'I', 'A', 1, '2017-03-13 19:39:14', '2017-03-13 19:39:14'),
(2, 'I', 'B', 1, '2017-03-13 19:39:14', '2017-03-13 19:39:14'),
(3, 'II', 'A', 1, '2017-03-13 19:39:37', '2017-03-13 19:39:37'),
(4, 'IX', 'A', 1, '2017-03-13 19:39:37', '2017-03-13 19:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `class_id`, `student_id`, `year`, `roll_no`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 4, 1, 2017, '1', 1, '2017-03-13 19:40:48', '2017-03-19 10:13:34'),
(2, 4, 2, 2017, '2', 1, '2017-03-13 19:40:48', '2017-03-19 10:13:39'),
(3, 4, 3, 2017, '3', 1, '2017-03-20 13:28:22', '2017-03-20 13:28:22'),
(4, 4, 4, 2017, '4', 1, '2017-03-20 13:34:54', '2017-03-20 13:34:54'),
(5, 4, 5, 2017, '5', 1, '2017-03-20 13:34:54', '2017-03-20 13:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `class_id`, `user_detail_id`, `user_id`, `year`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 4, 3, 3, 2017, 1, '2017-03-18 06:50:27', '2017-03-18 06:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `leaves_students`
--

CREATE TABLE `leaves_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `leave_reason` varchar(255) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_teachers`
--

CREATE TABLE `leaves_teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_reason` varchar(255) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent_students`
--

CREATE TABLE `parent_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent_students`
--

INSERT INTO `parent_students` (`id`, `student_id`, `user_detail_id`, `user_id`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 1, 4, 4, 1, '2017-03-13 20:23:52', '2017-03-13 20:23:52'),
(2, 2, 4, 4, 1, '2017-03-13 20:23:52', '2017-03-13 20:23:52'),
(3, 3, 4, 4, 1, '2017-03-20 13:30:21', '2017-03-20 13:30:21'),
(4, 4, 4, 4, 1, '2017-03-20 13:30:21', '2017-03-20 13:30:21'),
(5, 5, 4, 4, 1, '2017-03-20 13:30:53', '2017-03-20 13:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `result_json` varchar(2000) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details_json` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `details_json`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'Aravali School', '{\n	\"logo\": \"https://bower.io/img/bower-logo.png\",\n	\"website\": \"http://aravalischool.com\",\n	\"address\": \"Plot B1, Rishikesh, Uttrakhand, 222444\",\n	\"phone\": \"1122334455\",\n	\"email\": \"hello@aravalischool.com\",\n	\"school_timing\": \"10am - 5pm\",\n	\"lat\": \"23.111\",\n	\"lon\": \"73.1234\",\n	\"alt_phone\": \"1234567890\"\n}', 1, '2017-03-13 15:51:34', '2017-03-21 01:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender_type` enum('male','female','other') NOT NULL,
  `details_json` varchar(1000) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `password`, `name`, `user_type_id`, `is_active`, `created_date`, `modified_date`) VALUES
(1, '1234567890', '202cb962ac59075b964b07152d234b70', 'admin', 1, 1, '2019-08-27 05:54:45', '2019-08-27 05:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `other_details` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `user_type_id`, `firstname`, `lastname`, `email`, `mobile`, `other_details`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'admin', 'admin', 'admin@demo-myschoolie.com', '1234567890', '', 1, '2019-08-27 05:56:37', '2019-08-27 05:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `detail`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'admin', 'overall system admin with all rights', 1, '2017-03-07 22:22:41', '2017-03-07 22:24:48'),
(2, 'principal', 'school principal', 1, '2017-03-07 22:22:41', '2017-03-07 22:22:41'),
(3, 'manager', 'overall manager for all the staffs', 1, '2017-03-07 22:24:13', '2017-03-07 22:24:13'),
(4, 'teacher', 'school teacher', 1, '2017-03-07 22:24:13', '2017-03-07 22:24:13'),
(5, 'parent', 'parent of students', 1, '2017-03-07 22:24:29', '2017-03-07 22:24:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circulars`
--
ALTER TABLE `circulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves_students`
--
ALTER TABLE `leaves_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves_teachers`
--
ALTER TABLE `leaves_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_students`
--
ALTER TABLE `parent_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circulars`
--
ALTER TABLE `circulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves_students`
--
ALTER TABLE `leaves_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves_teachers`
--
ALTER TABLE `leaves_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_students`
--
ALTER TABLE `parent_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
