-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2022 at 06:13 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `requested_date` datetime NOT NULL,
  `offered_date` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_detail_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `submission_date` date NOT NULL,
  `homework` varchar(2000) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `attendance_type` enum('present','absent','leave','unmarked') DEFAULT NULL,
  `total_days` varchar(255) NOT NULL DEFAULT '0',
  `total_present` int(11) NOT NULL DEFAULT '0',
  `total_absent` int(11) NOT NULL DEFAULT '0',
  `total_leaves` int(11) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isbn_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_on` timestamp NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genre` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
CREATE TABLE IF NOT EXISTS `book_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `circulars`
--

DROP TABLE IF EXISTS `circulars`;
CREATE TABLE IF NOT EXISTS `circulars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `media_link` varchar(1000) DEFAULT NULL,
  `media_type` enum('image','video','audio','document') DEFAULT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(10) NOT NULL,
  `section` varchar(10) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `class_students`;
CREATE TABLE IF NOT EXISTS `class_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `class_teachers`;
CREATE TABLE IF NOT EXISTS `class_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `class_id`, `user_detail_id`, `user_id`, `year`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 4, 3, 3, 2017, 1, '2017-03-18 06:50:27', '2017-03-18 06:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `total_subjects` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `mark_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

DROP TABLE IF EXISTS `course_subjects`;
CREATE TABLE IF NOT EXISTS `course_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `license_expiry` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_exemptions`
--

DROP TABLE IF EXISTS `fee_exemptions`;
CREATE TABLE IF NOT EXISTS `fee_exemptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `reason` varchar(500) NOT NULL,
  `modified_date` timestamp NOT NULL,
  `exempted_on` timestamp NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

DROP TABLE IF EXISTS `fee_structures`;
CREATE TABLE IF NOT EXISTS `fee_structures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `total_fee` float NOT NULL,
  `fee_detail_json` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fleets`
--

DROP TABLE IF EXISTS `fleets`;
CREATE TABLE IF NOT EXISTS `fleets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `device_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `gps_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fleet_routes`
--

DROP TABLE IF EXISTS `fleet_routes`;
CREATE TABLE IF NOT EXISTS `fleet_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `fleet_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fleet_vendors`
--

DROP TABLE IF EXISTS `fleet_vendors`;
CREATE TABLE IF NOT EXISTS `fleet_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `photograph` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuances`
--

DROP TABLE IF EXISTS `issuances`;
CREATE TABLE IF NOT EXISTS `issuances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_date` timestamp NOT NULL,
  `issued_till_date` timestamp NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_students`
--

DROP TABLE IF EXISTS `leaves_students`;
CREATE TABLE IF NOT EXISTS `leaves_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `leave_reason` varchar(255) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_teachers`
--

DROP TABLE IF EXISTS `leaves_teachers`;
CREATE TABLE IF NOT EXISTS `leaves_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `leave_reason` varchar(255) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent_students`
--

DROP TABLE IF EXISTS `parent_students`;
CREATE TABLE IF NOT EXISTS `parent_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `fleet_route_id` int(11) NOT NULL,
  `drop_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `result_json` varchar(2000) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_structures`
--

DROP TABLE IF EXISTS `salary_structures`;
CREATE TABLE IF NOT EXISTS `salary_structures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) NOT NULL,
  `basic` float NOT NULL,
  `hra` float NOT NULL,
  `conveyance` float NOT NULL,
  `deduction` float NOT NULL,
  `total` float NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `details_json` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `details_json`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'Aravali School', '{\n	\"logo\": \"https://bower.io/img/bower-logo.png\",\n	\"website\": \"http://aravalischool.com\",\n	\"address\": \"Plot B1, Rishikesh, Uttrakhand, 222444\",\n	\"phone\": \"1122334455\",\n	\"email\": \"hello@aravalischool.com\",\n	\"school_timing\": \"10am - 5pm\",\n	\"lat\": \"23.111\",\n	\"lon\": \"73.1234\",\n	\"alt_phone\": \"1234567890\"\n}', 1, '2017-03-13 15:51:34', '2017-03-21 01:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender_type` enum('male','female','other') NOT NULL,
  `details_json` varchar(1000) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `remark` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `password`, `name`, `user_type_id`, `is_active`, `created_date`, `modified_date`) VALUES
(1, '1234567890', '202cb962ac59075b964b07152d234b70', 'admin', 1, 1, '2019-08-27 05:54:45', '2019-08-27 05:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `other_details` varchar(1000) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `user_type_id`, `firstname`, `lastname`, `email`, `mobile`, `other_details`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'admin', 'admin', 'admin@demo-myschoolie.com', '1234567890', '', 1, '2019-08-27 05:56:37', '2019-08-27 05:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(200) NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `detail`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'admin', 'overall system admin with all rights', 1, '2017-03-07 22:22:41', '2017-03-07 22:24:48'),
(2, 'principal', 'school principal', 1, '2017-03-07 22:22:41', '2017-03-07 22:22:41'),
(3, 'manager', 'overall manager for all the staffs', 1, '2017-03-07 22:24:13', '2017-03-07 22:24:13'),
(4, 'teacher', 'school teacher', 1, '2017-03-07 22:24:13', '2017-03-07 22:24:13'),
(5, 'parent', 'parent of students', 1, '2017-03-07 22:24:29', '2017-03-07 22:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `closing_date` timestamp NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
