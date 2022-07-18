-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2022 at 06:00 PM
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
-- Table structure for table `anecdotes`
--

DROP TABLE IF EXISTS `anecdotes`;
CREATE TABLE IF NOT EXISTS `anecdotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anecdote` varchar(3000) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `subject_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `homework` varchar(2000) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendances`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

DROP TABLE IF EXISTS `attendance_details`;
CREATE TABLE IF NOT EXISTS `attendance_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `attendance_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `attendance_teachers`
--

DROP TABLE IF EXISTS `attendance_teachers`;
CREATE TABLE IF NOT EXISTS `attendance_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_teachers`
--


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
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genre` varchar(255) DEFAULT NULL,
  `book_code` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--


-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
CREATE TABLE IF NOT EXISTS `book_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `name`, `code`, `description`) VALUES
(1, 'cat1', '123', NULL),
(2, 'cat2', 'cat2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `canteens`
--

DROP TABLE IF EXISTS `canteens`;
CREATE TABLE IF NOT EXISTS `canteens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL,
  `breakfast` varchar(1000) NOT NULL,
  `lunch` varchar(1000) NOT NULL,
  `week_number` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `circulars`
--

INSERT INTO `circulars` (`id`, `heading`, `body`, `event_date`, `media_link`, `media_type`, `year`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 'cname', 'sadsadsadsad', '2022-07-18 00:00:00', '1658152579.png', 'image', 2022, 1, '2022-07-18 13:56:19', '2022-07-18 13:56:19'),
(2, 'cname', 'sadsadsadsad', '2022-07-18 00:00:00', '1658152622.png', 'image', 2022, 1, '2022-07-18 13:57:02', '2022-07-18 13:57:02');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `class_id`, `student_id`, `year`, `roll_no`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 4, 1, 2017, '1', 1, '2017-03-13 19:40:48', '2017-03-19 10:13:34'),
(2, 4, 2, 2017, '2', 1, '2017-03-13 19:40:48', '2017-03-19 10:13:39'),
(3, 4, 3, 2017, '3', 1, '2017-03-20 13:28:22', '2017-03-20 13:28:22'),
(4, 4, 4, 2017, '4', 1, '2017-03-20 13:34:54', '2017-03-20 13:34:54'),
(5, 4, 5, 2017, '5', 1, '2017-03-20 13:34:54', '2017-03-20 13:34:54'),
(6, 1, 1, 2021, '1', 1, '2022-07-15 09:30:12', '2022-07-15 09:30:12'),
(7, 1, 2, 2021, '2', 1, '2022-07-15 09:30:28', '2022-07-15 09:30:28'),
(8, 1, 4, 2021, '3', 1, '2022-07-18 10:06:15', '2022-07-18 10:06:15');

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
(1, 1, 3, 3, 2017, 1, '2017-03-18 06:50:27', '2022-07-18 10:54:22');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `total_subjects`, `remark`, `mark_type`) VALUES
(1, 'science', 11, 'hemmo science', 'sadsad'),
(2, 'general', 3, 'sadsadsad', 'mark');

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
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`id`, `course_id`, `subject_id`, `subject_type`, `is_active`) VALUES
(1, 2, 1, 'main', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_number`, `license_expiry`, `vendor_id`) VALUES
(1, 'sdasd', 'sadsad', '2333-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_cycles`
--

DROP TABLE IF EXISTS `fee_cycles`;
CREATE TABLE IF NOT EXISTS `fee_cycles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cycle_name` varchar(255) NOT NULL,
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
-- Table structure for table `fee_student_status`
--

DROP TABLE IF EXISTS `fee_student_status`;
CREATE TABLE IF NOT EXISTS `fee_student_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL,
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
  `device_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `gps_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleets`
--

INSERT INTO `fleets` (`id`, `vehicle_type`, `vehicle_no`, `vehicle_name`, `device_id`, `vendor_id`, `gps_no`) VALUES
(1, 'Bus', 'sadasd', 'sadsad', NULL, 1, 'sadsad');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_routes`
--

INSERT INTO `fleet_routes` (`id`, `driver_id`, `session`, `fleet_id`, `route_id`, `user_id`) VALUES
(1, 1, 'morning', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fleet_vendors`
--

DROP TABLE IF EXISTS `fleet_vendors`;
CREATE TABLE IF NOT EXISTS `fleet_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank_details_json` varchar(2000) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `photograph` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_vendors`
--

INSERT INTO `fleet_vendors` (`id`, `vendor_name`, `contact_person`, `phone`, `email`, `address`, `bank_details_json`, `pan`, `photograph`, `ownership`, `account_number`, `ifsc`) VALUES
(1, 'sadsadsadww', 'sadsadsad', '112233', 'sadsad@gmail.com', 'sadsadsad', '', 'sadsad', 'sadsad', 'owner', '', ''),
(2, 'vendor1', 'contact', '112233', 'sadsad@gmail.com', 'sadsad', '{\"account_number\":\"11233\",\"bank_name\":\"1212\",\"ifsc\":\"1212\"}', 'sadsad', '1658167202.png', '1658167202.png', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `user_id`, `user_detail_id`, `student_id`, `heading`, `details`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 3, 3, 1, 'sadsad', 'sadsadsad', 1, '2022-07-18 17:50:08', '2022-07-18 17:50:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent_students`
--

INSERT INTO `parent_students` (`id`, `student_id`, `user_detail_id`, `user_id`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 1, 4, 4, 1, '2017-03-13 20:23:52', '2017-03-13 20:23:52'),
(2, 2, 4, 4, 1, '2017-03-13 20:23:52', '2017-03-13 20:23:52'),
(3, 3, 4, 4, 1, '2017-03-20 13:30:21', '2017-03-20 13:30:21'),
(4, 4, 4, 4, 1, '2017-03-20 13:30:21', '2017-03-20 13:30:21'),
(5, 5, 4, 4, 1, '2017-03-20 13:30:53', '2017-03-20 13:30:53'),
(6, 4, 2, 2, 1, '2022-07-18 10:06:15', '2022-07-18 10:06:15');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `student_id`, `fleet_route_id`, `drop_address`) VALUES
(1, 1, 1, 'sadsadsad');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `reports_json` varchar(20000) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `wordsketch` varchar(255) NOT NULL,
  `atsjs` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term` varchar(255) NOT NULL,
  `createddate` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `student_id`, `reports_json`, `teacher_id`, `wordsketch`, `atsjs`, `class_id`, `term`, `createddate`) VALUES
(1, 1, '{\"Subject\":\"<h1>\\u0939\\u093f\\u0902\\u0926\\u0940<\\/h1>\",\"Sub Heading\":\"<h1>Response & Participation<\\/h1>\",\"Is_able_to_grasp_the_main_idea\":\"3\",\"Understands_the_text\":\"3\",\"Is_able_to_Summarize\":\"\",\"Is_Attentive\":\"\",\"Follows_Multiple_Instructions\":\"\",\"Speaks_fluently_and_confidently\":\"\",\"Has_good_pronunciation\":\"\",\"Contributes_to_discussions\":\"\",\"Has_a_rich_vocabulary\":\"\",\"Is_interested_in_reading\":\"\",\"Reads_with_fluency\":\"\",\"Understands_contexts\":\"\",\"Writes_legibly_and_neatly\":\"\",\"Puts_information_in_vocabulary\":\"\",\"Has_creative_expression\":\"\",\"Has_conceptual_understanding\":\"\",\"Has_operational_skills\":\"\",\"Can_apply_the_operation_efficiently\":\"\",\"Is_able_to_interpret_word_problems_and_apply_the_correct_operation\":\"\",\"Is_able_to_apply_concepts_and_operational_skills_to_solve_problems\":\"\",\"Exhibits_curiosity\":\"\",\"Relates_to_his_her_personal_experience\":\"\",\"Can_Recall\":\"\",\"Understands_texts_and_visuals\":\"\",\"Is_able_to_organize_and_sequence_information\":\"\",\"Applies_and_Infers\":\"\",\"Asks_questions\":\"\",\"Enjoys_group_work\":\"\",\"Remains_focussed\":\"\",\"Does_research\":\"\",\"Is_fit_and_agile\":\"\",\"Is_a_team_player\":\"\",\"Exhibits_sportsmanship\":\"\",\"Is_interested_in_knowing_the_rules_of_games\":\"\",\"Is_disciplined_and_focussed_and_enthusiastic\":\"\",\"Participates_enthusiastically\":\"\",\"Observes_and_responds_well_to_design_and_colour\":\"\",\"Is_creative_and_imaginative\":\"\",\"Has_well_developed_motor_skills\":\"\",\"Respectful_and_considerate\":\"\",\"Is_team_player\":\"\",\"Is_self_assured\":\"\",\"Accepts_responsibility\":\"\",\"Is_Expressive\":\"\",\"Accepts_challenges_and_changes\":\"\",\"Uses_the_available_technology_enthusiastically\":\"\",\"Comfortable_in_understanding_technology\":\"\",\"Presents_work_neatly\":\"\",\"Responds_to_instructions\":\"\",\"Submits_work_promptly\":\"\",\"Works_Independently\":\"\",\"Internalizes_concepts\":\"\",\"Is_able_to_analyze_apply_and_enquire\":\"\",\"Has_a_good_sense_of_melody\":\"\",\"Has_a_good_sense_of_rhythm\":\"\",\"Shows_interests_and_makes_effort\":\"\",\"Participates_well_in_a_group\":\"\",\"Has_poise_and_expression\":\"\",\"Shows_interest_and_effort\":\"\",\"Has_sense_of_rhythm\":\"\",\"Participates_well_in_group\":\"\",\"\\u0909\\u092a \\u0936\\u0940\\u0930\\u094d\\u0937\\u0915\":\"<h1>\\u0932\\u0947\\u0916\\u0928 \\u0915\\u094c\\u0936\\u0932<\\/h1>\",\"\\u092e\\u0941\\u0916\\u094d\\u092f_\\u0935\\u093f\\u0937\\u092f_\\u0915\\u094b_\\u0938\\u092e\\u091d\\u0928\\u0947_\\u0915\\u0940_\\u0915\\u094d\\u0937\\u092e\\u0924\\u093e\":\"\",\"\\u092a\\u093e\\u0920_\\u0915\\u0940_\\u0938\\u092e\\u091d\":\"\",\"\\u092a\\u093e\\u0920_\\u0915\\u093e_\\u0938\\u093e\\u0930_\\u0938\\u092e\\u091d\\u0928\\u0947_\\u0915\\u0940_\\u0915\\u094d\\u0937\\u092e\\u0924\\u093e\":\"\",\"\\u090f\\u0915\\u093e\\u0917\\u094d\\u0930\\u0924\\u093e\":\"\",\"\\u0905\\u0928\\u0947\\u0915_\\u0928\\u093f\\u0930\\u094d\\u0926\\u0947\\u0936\\u094b\\u0902_\\u0915\\u094b_\\u0938\\u092e\\u091d\\u0928\\u0947_\\u0915\\u0940_\\u0915\\u094d\\u0937\\u092e\\u0924\\u093e\":\"\",\"\\u0906\\u0924\\u094d\\u092e\\u0935\\u093f\\u0936\\u094d\\u0935\\u093e\\u0938_\\u0915\\u0947_\\u0938\\u093e\\u0925_\\u0927\\u093e\\u0930\\u093e_\\u092a\\u094d\\u0930\\u0935\\u093e\\u0939_\\u092c\\u094b\\u0932\\u0928\\u093e\":\"\",\"\\u0938\\u0939\\u0940_\\u0909\\u091a\\u094d\\u091a\\u093e\\u0930\\u0923\":\"\",\"\\u091a\\u0930\\u094d\\u091a\\u093e_\\u092e\\u0947\\u0902_\\u092d\\u093e\\u0917_\\u0932\\u0947\\u0928\\u093e\":\"\",\"\\u092a\\u094d\\u0930\\u091a\\u0941\\u0930_\\u0936\\u092c\\u094d\\u0926_\\u092d\\u0902\\u0921\\u093e\\u0930_\\u092f\\u093e_\\u0936\\u092c\\u094d\\u0926\\u094b\\u0902_\\u0915\\u0940_\\u091c\\u093e\\u0928\\u0915\\u093e\\u0930\\u0940\":\"\",\"\\u092a\\u095d\\u0928\\u0947_\\u092e\\u0947\\u0902_\\u0930\\u0942\\u091a\\u093f_\\u0932\\u0947\\u0928\\u093e\":\"\",\"\\u0927\\u093e\\u0930\\u093e_\\u092a\\u094d\\u0930\\u0935\\u093e\\u0939_\\u092a\\u095d\\u0928\\u093e\":\"\",\"\\u0935\\u093f\\u0937\\u092f_\\u0935\\u0938\\u094d\\u0924\\u0941_\\u0938\\u092e\\u091d\\u0928\\u093e\":\"\",\"\\u092a\\u095d\\u0928\\u0947_\\u092f\\u094b\\u0917\\u094d\\u092f_\\u0938\\u093e\\u092b_\\u0932\\u0947\\u0916\":\"\",\"\\u0915\\u094d\\u0930\\u092e_\\u0938\\u0947_\\u0938\\u0939\\u0940_\\u091c\\u093e\\u0928\\u0915\\u093e\\u0930\\u0940_\\u0926\\u0947\\u0928\\u093e\":\"\",\"\\u0928\\u0935\\u0940\\u0928_\\u0936\\u092c\\u094d\\u0926\\u094b\\u0902_\\u0915\\u093e_\\u092a\\u094d\\u0930\\u092f\\u094b\\u0917\":\"\",\"\\u0930\\u091a\\u0928\\u093e\\u0924\\u094d\\u092e\\u0915_\\u0905\\u092d\\u093f\\u0935\\u0915\\u094d\\u0924\\u093f\":\"\"}', 3, 'kkk', '1658141696.png', 1, '1', '2022-11-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

DROP TABLE IF EXISTS `resignations`;
CREATE TABLE IF NOT EXISTS `resignations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `resign_date` timestamp NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `remarks` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resignations`
--

INSERT INTO `resignations` (`id`, `user_id`, `resign_date`, `reason`, `remarks`) VALUES
(1, 19, '2022-07-18 00:00:00', 'sadsad', 'sadsad');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `number`) VALUES
(1, 'sadsad', 'sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `salary_status_user`
--

DROP TABLE IF EXISTS `salary_status_user`;
CREATE TABLE IF NOT EXISTS `salary_status_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `total_salary` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_structures`
--

INSERT INTO `salary_structures` (`id`, `grade`, `basic`, `hra`, `conveyance`, `deduction`, `total`, `is_active`) VALUES
(1, 'grade 1', 1000, 100, 10, 200, 910, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_user`
--

DROP TABLE IF EXISTS `salary_structure_user`;
CREATE TABLE IF NOT EXISTS `salary_structure_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_structure_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_structure_user`
--

INSERT INTO `salary_structure_user` (`id`, `salary_structure_id`, `user_id`) VALUES
(1, 1, 4),
(2, 1, 10),
(3, 1, 11),
(4, 1, 12),
(5, 1, 13),
(6, 1, 14),
(7, 1, 15),
(8, 1, 16),
(9, 1, 17),
(10, 1, 18),
(11, 1, 19);

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
  `aadhar_number` varchar(255) NOT NULL,
  `aadhar_card` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `gender_type` enum('male','female','other') NOT NULL,
  `country` varchar(255) NOT NULL,
  `handicap` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `details_json` varchar(3000) DEFAULT NULL,
  `admission_no` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `joining_date` timestamp NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `aadhar_number`, `aadhar_card`, `birthday`, `course_id`, `gender_type`, `country`, `handicap`, `marital_status`, `details_json`, `admission_no`, `is_active`, `joining_date`, `created_date`, `modified_date`) VALUES
(1, 'c', 'm', '', '', '1986-11-03', 0, 'male', '', '', '', '{\"blood_group\":\"A+\",\"caste\":\"General\",\"medical_history\":null,\"allergy\":null,\"address\":\"noid\",\"pin_code\":\"201301\",\"city\":\"noda\",\"state\":\"Uttar Pradesh\",\"father_occupation\":\"Service\",\"mother_name\":\"cm\",\"mother_mobile\":\"+918130400000\",\"mother_occupation\":\"Business\",\"mother_email\":\"cm@gmail.com1\",\"fee_exemption\":\"No\",\"exempted_amount\":\"0\",\"exemption_reason\":\"\",\"special_remarks\":\"sadsad\",\"guardian_name\":\"cm\",\"guardian_email\":\"sadsad@gmail.com\",\"guardian_mobile\":\"+918130400000\",\"guardian_address\":null,\"m_office_contact\":\"\",\"f_office_contact\":\"sadsad\",\"m_workplace\":\"home\",\"f_workplace\":\"\",\"m_designation\":\"founder\",\"f_designation\":\"sadsad\",\"father_name\":\"sadsad\",\"father_mobile\":\"asdsad\",\"single_parent_m\":null,\"single_parent_f\":null,\"birth_certificate\":\"1657877412.jpg\",\"caste_certificate\":\"1657877412.jpg\",\"transfer_certificate\":\"1657877412.jpg\",\"academic_qualification\":\"1657877412.jpg\",\"picture_link\":\"1657877412.jpg\",\"temp\":\"temp\"}', '', 1, '2022-07-04 10:10:33', '2022-07-15 09:30:12', '2022-07-18 10:10:40'),
(2, 'c', 'm', '', '', '1986-11-03', 0, 'male', '', '', '', '{\"blood_group\":\"A+\",\"caste\":\"General\",\"medical_history\":null,\"allergy\":null,\"address\":\"noid\",\"pin_code\":\"201301\",\"city\":\"noda\",\"state\":\"Uttar Pradesh\",\"father_occupation\":\"Service\",\"mother_name\":\"cm\",\"mother_mobile\":\"+918130400000\",\"mother_occupation\":\"Business\",\"mother_email\":\"cm@gmail.com1\",\"fee_exemption\":\"No\",\"exempted_amount\":\"0\",\"exemption_reason\":\"\",\"special_remarks\":\"sadsad\",\"guardian_name\":\"cm\",\"guardian_email\":\"sadsad@gmail.com\",\"guardian_mobile\":\"+918130400000\",\"guardian_address\":null,\"m_office_contact\":\"\",\"f_office_contact\":\"sadsad\",\"m_workplace\":\"home\",\"f_workplace\":\"\",\"m_designation\":\"founder\",\"f_designation\":\"sadsad\",\"father_name\":\"sadsad\",\"father_mobile\":\"asdsad\",\"single_parent_m\":null,\"single_parent_f\":null,\"birth_certificate\":\"1657877427.jpg\",\"caste_certificate\":\"1657877427.jpg\",\"transfer_certificate\":\"1657877427.jpg\",\"academic_qualification\":\"1657877427.jpg\",\"picture_link\":\"1657877427.jpg\",\"temp\":\"temp\"}', '', 1, '2022-07-05 10:10:41', '2022-07-15 09:30:27', '2022-07-18 10:10:43'),
(3, 'c', 'm', '', '', '1986-11-03', 0, 'male', '', '', '', '{\"blood_group\":\"A+\",\"caste\":\"General\",\"medical_history\":null,\"allergy\":null,\"address\":\"79, Sector 28\\r\\nNOIDA\",\"pin_code\":\"60007\",\"city\":\"Des Moines\",\"state\":\"Karnataka\",\"father_occupation\":\"Service\",\"mother_name\":\"sd\",\"mother_mobile\":\"1122334455\",\"mother_occupation\":\"Business\",\"mother_email\":\"cm+21@gmail.com\",\"fee_exemption\":\"No\",\"exempted_amount\":\"01\",\"exemption_reason\":\"sadsad\",\"special_remarks\":\"sadsad\",\"guardian_name\":\"cm\",\"guardian_email\":\"iwreken@gmail.com\",\"guardian_mobile\":\"1122334455\",\"guardian_address\":null,\"m_office_contact\":\"11111122\",\"f_office_contact\":\"11111122\",\"m_workplace\":\"office\",\"f_workplace\":\"office2\",\"m_designation\":\"officer\",\"f_designation\":\"officer\",\"father_name\":\"sadsad\",\"father_mobile\":\"11111121\",\"single_parent_m\":null,\"single_parent_f\":\"on\",\"birth_certificate\":\"1658137470.png\",\"caste_certificate\":\"1658137470.png\",\"transfer_certificate\":\"1658137470.png\",\"academic_qualification\":\"1658137470.png\",\"picture_link\":\"1658137470.png\",\"temp\":\"temp\"}', '', 1, '2022-07-04 10:10:45', '2022-07-18 09:44:30', '2022-07-18 10:10:47'),
(4, 'c', 'm', '', '', '1986-11-03', 0, 'male', '', '', '', '{\"blood_group\":\"A+\",\"caste\":\"General\",\"medical_history\":null,\"allergy\":null,\"address\":\"79, Sector 28\\r\\nNOIDA\",\"pin_code\":\"60007\",\"city\":\"Des Moines\",\"state\":\"Karnataka\",\"father_occupation\":\"Business\",\"mother_name\":\"cm\",\"mother_mobile\":\"1122334455\",\"mother_occupation\":\"Business\",\"mother_email\":\"cm+21@gmail.com\",\"fee_exemption\":\"No\",\"exempted_amount\":\"0\",\"exemption_reason\":\"sd\",\"special_remarks\":\"sdsd\",\"guardian_name\":\"cm\",\"guardian_email\":\"iwreken@gmail.com\",\"guardian_mobile\":\"+918130400000\",\"guardian_address\":null,\"m_office_contact\":\"\",\"f_office_contact\":\"11111122\",\"m_workplace\":\"home\",\"f_workplace\":\"office2\",\"m_designation\":\"founder\",\"f_designation\":\"officer\",\"father_name\":\"amazon1\",\"father_mobile\":\"1122334455\",\"single_parent_m\":\"on\",\"single_parent_f\":null,\"birth_certificate\":\"1658138775.png\",\"caste_certificate\":\"1658138775.png\",\"transfer_certificate\":\"1658138775.png\",\"academic_qualification\":\"1658138775.png\",\"picture_link\":\"1658138775.png\",\"temp\":\"temp\"}', '', 1, '2022-07-04 10:10:48', '2022-07-18 10:06:15', '2022-07-18 10:10:50');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `remark`) VALUES
(1, 'test', 'tssadsad');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
CREATE TABLE IF NOT EXISTS `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_json` varchar(2000) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `timetable_json`, `course_id`) VALUES
(1, '{\"d1p1\":\"\",\"d1p2\":\"\",\"d1p3\":\"\",\"d1p4\":\"\",\"d1p5\":\"\",\"d1p6\":\"\",\"d1p7\":\"\",\"d1p8\":\"\",\"d1p9\":\"\",\"d2p1\":\"\",\"d2p2\":\"\",\"d2p3\":\"\",\"d2p4\":\"\",\"d2p5\":\"\",\"d2p6\":\"\",\"d2p7\":\"\",\"d2p8\":\"\",\"d2p9\":\"\",\"d3p1\":\"\",\"d3p2\":\"\",\"d3p3\":\"\",\"d3p4\":\"\",\"d3p5\":\"\",\"d3p6\":\"\",\"d3p7\":\"\",\"d3p8\":\"\",\"d3p9\":\"\",\"d4p1\":\"\",\"d4p2\":\"\",\"d4p3\":\"\",\"d4p4\":\"\",\"d4p5\":\"\",\"d4p6\":\"\",\"d4p7\":\"\",\"d4p8\":\"\",\"d4p9\":\"\",\"d5p1\":\"\",\"d5p2\":\"\",\"d5p3\":\"\",\"d5p4\":\"\",\"d5p5\":\"\",\"d5p6\":\"\",\"d5p7\":\"\",\"d5p8\":\"\",\"d5p9\":\"\",\"d6p1\":\"\",\"d6p2\":\"\",\"d6p3\":\"\",\"d6p4\":\"\",\"d6p5\":\"\",\"d6p6\":\"\",\"d6p7\":\"\",\"d6p8\":\"\",\"d6p9\":\"\"}', 16);

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
  `fcm_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `password`, `name`, `user_type_id`, `fcm_id`, `is_active`, `created_date`, `modified_date`) VALUES
(1, '1234567890', '202cb962ac59075b964b07152d234b70', 'admin', 1, 0, 1, '2019-08-27 05:54:45', '2019-08-27 05:54:45'),
(2, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 5, 0, 1, '2022-07-18 10:06:15', '2022-07-18 10:06:15'),
(3, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'Aryan', 4, 0, 1, '2022-07-18 10:37:06', '2022-07-18 10:37:06'),
(4, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:54:02', '2022-07-18 11:54:02'),
(5, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:54:10', '2022-07-18 11:54:10'),
(6, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:56:17', '2022-07-18 11:56:17'),
(7, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:57:02', '2022-07-18 11:57:02'),
(8, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:58:01', '2022-07-18 11:58:01'),
(9, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 11:58:51', '2022-07-18 11:58:51'),
(10, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:00:19', '2022-07-18 12:00:19'),
(11, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:00:26', '2022-07-18 12:00:26'),
(12, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:02:48', '2022-07-18 12:02:48'),
(13, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:05:51', '2022-07-18 12:05:51'),
(14, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:05:58', '2022-07-18 12:05:58'),
(15, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:06:22', '2022-07-18 12:06:22'),
(16, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:08:01', '2022-07-18 12:08:01'),
(17, '1122334455', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', 4, 0, 1, '2022-07-18 12:08:10', '2022-07-18 12:08:10'),
(18, '8130400000', '81dc9bdb52d04dc20036dbd8313ed055', 'Wreken asdsad', 4, 0, 1, '2022-07-18 12:09:58', '2022-07-18 12:09:58'),
(19, '8130400000', '81dc9bdb52d04dc20036dbd8313ed055', 'Wreken asdsad', 4, 0, 0, '2022-07-18 12:10:40', '2022-07-18 12:22:20');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `user_type_id`, `firstname`, `lastname`, `email`, `mobile`, `other_details`, `is_active`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'admin', 'admin', 'admin@demo-myschoolie.com', '1234567890', '', 1, '2019-08-27 05:56:37', '2019-08-27 05:56:37'),
(2, 2, 5, 'c', 'm', 'cm@gmail.com1', '1122334455', '[]', 1, '2022-07-18 10:06:15', '2022-07-18 10:06:15'),
(4, 4, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145242.png\",\"marksheet\":\"1658145242.png\",\"resume\":\"1658145242.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"16581452421906997404_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:54:02', '2022-07-18 11:54:02'),
(5, 5, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145250.png\",\"marksheet\":\"1658145250.png\",\"resume\":\"1658145250.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"165814525071633661_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:54:10', '2022-07-18 11:54:10'),
(6, 6, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145376.png\",\"marksheet\":\"1658145376.png\",\"resume\":\"1658145376.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"1658145376948621461_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:56:17', '2022-07-18 11:56:17'),
(7, 7, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145421.png\",\"marksheet\":\"1658145421.png\",\"resume\":\"1658145422.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"16581454222007747942_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:57:02', '2022-07-18 11:57:02'),
(8, 8, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145481.png\",\"marksheet\":\"1658145481.png\",\"resume\":\"1658145481.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"1658145481475983382_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:58:01', '2022-07-18 11:58:01'),
(9, 9, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145531.png\",\"marksheet\":\"1658145531.png\",\"resume\":\"1658145531.png\",\"academic_details_array\":[{\"exam\":\"adssad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"88\",\"attachment\":\"16581455311918164543_1600x840.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"11\\/03\\/1984\",\"to\":\"11\\/03\\/1975\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/1976\",\"spouse_name\":\"test\",\"spouse_occupation\":\"test\",\"address\":\"79, Sector 28\",\"father_name\":\"asdsad\",\"mother_name\":\"sadsadsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"asdsad\"}', 1, '2022-07-18 11:58:51', '2022-07-18 11:58:51'),
(10, 10, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145619.png\",\"marksheet\":\"1658145619.png\",\"resume\":\"1658145619.png\",\"academic_details_array\":[{\"exam\":\"asdsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"22\",\"attachment\":\"1658145619816879333_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadasd\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"female\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2022\",\"spouse_name\":\"sad\",\"spouse_occupation\":\"sad\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"sadsad\",\"probation\":\"5\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:00:20', '2022-07-18 12:00:20'),
(11, 11, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145626.png\",\"marksheet\":\"1658145626.png\",\"resume\":\"1658145626.png\",\"academic_details_array\":[{\"exam\":\"asdsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"22\",\"attachment\":\"1658145626509496643_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadasd\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"female\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2022\",\"spouse_name\":\"sad\",\"spouse_occupation\":\"sad\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"sadsad\",\"probation\":\"5\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:00:26', '2022-07-18 12:00:26'),
(12, 12, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145768.png\",\"marksheet\":\"1658145768.png\",\"resume\":\"1658145768.png\",\"academic_details_array\":[{\"exam\":\"asdsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"22\",\"attachment\":\"16581457681260699614_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadasd\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"female\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2022\",\"spouse_name\":\"sad\",\"spouse_occupation\":\"sad\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"sadsad\",\"probation\":\"5\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:02:48', '2022-07-18 12:02:48'),
(13, 13, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145951.png\",\"marksheet\":\"1658145951.png\",\"resume\":\"1658145951.png\",\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"16581459511578382196_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2021\",\"spouse_name\":\"sadasd\",\"spouse_occupation\":\"sadasd\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"asdsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"sadasd\"}', 1, '2022-07-18 12:05:51', '2022-07-18 12:05:51'),
(14, 14, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145958.png\",\"marksheet\":\"1658145958.png\",\"resume\":\"1658145958.png\",\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"1658145958513601949_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2021\",\"spouse_name\":\"sadasd\",\"spouse_occupation\":\"sadasd\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"asdsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"sadasd\"}', 1, '2022-07-18 12:05:58', '2022-07-18 12:05:58'),
(15, 15, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658145982.png\",\"marksheet\":\"1658145982.png\",\"resume\":\"1658145982.png\",\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"sadsad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"165814598225365126_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"General\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"11\\/03\\/2021\",\"spouse_name\":\"sadasd\",\"spouse_occupation\":\"sadasd\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"asdsad\",\"probation\":\"2\",\"contract\":\"yes\",\"confirmation\":\"sadasd\"}', 1, '2022-07-18 12:06:22', '2022-07-18 12:06:22'),
(16, 16, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658146081.png\",\"marksheet\":\"1658146081.png\",\"resume\":\"1658146081.png\",\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"wdasad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"16581460812075067818_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsd\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"ST\",\"gender\":\"female\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"07\\/18\\/2022\",\"spouse_name\":\"sadsad\",\"spouse_occupation\":\"sadad\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"sadasd\",\"probation\":\"3\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:08:01', '2022-07-18 12:08:01'),
(17, 17, 4, 'c', 'm', 'cm+21@gmail.com', '1122334455', '{\"caste_certificate\":\"1658146089.png\",\"marksheet\":\"1658146089.png\",\"resume\":\"1658146089.png\",\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"wdasad\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"1658146090319584725_12.png\"}],\"experience_details_array\":[{\"organization\":\"sadsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsd\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"ST\",\"gender\":\"female\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"TGT\",\"joining_date\":\"07\\/18\\/2022\",\"spouse_name\":\"sadsad\",\"spouse_occupation\":\"sadad\",\"address\":\"79, Sector 28\",\"father_name\":\"sadsad\",\"mother_name\":\"sadasd\",\"probation\":\"3\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:08:10', '2022-07-18 12:08:10'),
(18, 18, 4, 'Wreken', 'asdsad', 'iwreken@gmail.com', '8130400000', '{\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"sadasd\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"16581461981728973917_12.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"ST\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"PGT\",\"joining_date\":\"07\\/18\\/2022\",\"spouse_name\":\"sadsad\",\"spouse_occupation\":\"asdsad\",\"address\":\"79\",\"father_name\":\"sadsad\",\"mother_name\":\"sadsad\",\"probation\":\"14\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 1, '2022-07-18 12:09:59', '2022-07-18 12:09:59'),
(19, 19, 4, 'Wreken', 'asdsad', 'iwreken@gmail.com', '8130400000', '{\"academic_details_array\":[{\"exam\":\"sadsad\",\"board\":\"sadasd\",\"year\":\"07\\/18\\/2022\",\"percentage\":\"55\",\"attachment\":\"1658146240576930004_12.png\"}],\"experience_details_array\":[{\"organization\":\"asdsad\",\"from\":\"07\\/18\\/2022\",\"to\":\"07\\/18\\/2022\",\"designation\":\"sadsad\",\"description\":\"sadsad\"}],\"blood_group\":\"O+\",\"caste\":\"ST\",\"gender\":\"male\",\"dob\":\"11\\/03\\/1986\",\"applied_for\":\"PGT\",\"joining_date\":\"07\\/18\\/2022\",\"spouse_name\":\"sadsad\",\"spouse_occupation\":\"asdsad\",\"address\":\"79\",\"father_name\":\"sadsad\",\"mother_name\":\"sadsad\",\"probation\":\"14\",\"contract\":\"yes\",\"confirmation\":\"sadsad\"}', 0, '2022-07-18 12:10:40', '2022-07-18 12:22:20');

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
  `qualification` varchar(255) NOT NULL,
  `closing_date` timestamp NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `course_id`, `qualification`, `closing_date`, `employment_type`, `vacancy`) VALUES
(1, 1, 'sadasd', '2022-07-20 12:04:24', 'permanent', '-1'),
(2, 1, 'Graduate', '2022-11-11 00:00:00', 'Temporary', '22');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_users`
--

DROP TABLE IF EXISTS `vacancy_users`;
CREATE TABLE IF NOT EXISTS `vacancy_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vaccancy_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy_users`
--

INSERT INTO `vacancy_users` (`id`, `user_id`, `vaccancy_id`) VALUES
(1, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

DROP TABLE IF EXISTS `working_days`;
CREATE TABLE IF NOT EXISTS `working_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(255) NOT NULL,
  `working_days` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `month`, `working_days`, `class_id`) VALUES
(1, 'January', 9, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
