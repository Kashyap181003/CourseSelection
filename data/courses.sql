-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2024 at 06:05 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shahk6_CourseManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `number_of_attendees` int(11) DEFAULT NULL,
  `modality` varchar(100) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `topic`, `number_of_attendees`, `modality`, `credits`) VALUES
('CSIT101', 'Introduction to Computer Science', 30, 'In Person', 3),
('CSIT102', 'Fundamentals of Programming', 30, 'Online', 4),
('CSIT103', 'Basic Web Development', 35, 'In Person', 3),
('CSIT104', 'Introduction to Databases', 25, 'Online', 4),
('CSIT105', 'Computer Systems and Hardware', 30, 'In Person', 3),
('CSIT106', 'Foundations of Network Technology', 30, 'Online', 3),
('CSIT107', 'Principles of Software Engineering', 25, 'In Person', 4),
('CSIT108', 'Operating Systems Basics', 30, 'Online', 4),
('CSIT109', 'Data Structures and Algorithms', 35, 'In Person', 4),
('CSIT110', 'Cybersecurity Fundamentals', 25, 'In Person', 3),
('CSIT111', 'Digital Logic and Design', 30, 'In Person', 3),
('CSIT112', 'Object-Oriented Programming', 30, 'In Person', 4),
('CSIT113', 'Introduction to Cloud Computing', 25, 'In Person', 3),
('CSIT114', 'Human-Computer Interaction', 30, 'In Person', 3),
('CSIT115', 'Mobile Application Development', 25, 'In Person', 4),
('CSIT116', 'Introduction to Machine Learning', 30, 'In Person', 4),
('CSIT117', 'Computer Graphics and Visualization', 25, 'In Person', 3),
('CSIT118', 'Artificial Intelligence Basics', 30, 'Online', 4),
('CSIT119', 'Ethical Hacking and Network Security', 25, 'Online', 4),
('CSIT120', 'Big Data and Analytics', 30, 'In Person', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
