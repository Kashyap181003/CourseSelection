SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `number_of_attendees` int(11) DEFAULT NULL,
  `modality` varchar(100) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `course_registrations` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'in_progress',
  `credits_earned` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `course_registrations` (`id`, `username`, `course_id`, `status`, `credits_earned`) VALUES
(1, 'patelj17', 'CSIT101', 'in_progress', 0),
(2, 'patelj17', 'CSIT107', 'in_progress', 0),
(3, 'patelj17', 'CSIT119', 'in_progress', 0),
(4, 'patelj17', 'CSIT104', 'in_progress', 0),
(5, 'shank6', 'CSIT103', 'in_progress', 0);

CREATE TABLE `user_progress` (
  `user_id` int(11) DEFAULT NULL,
  `total_credits_earned` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `courses` ADD PRIMARY KEY (`course_id`);
ALTER TABLE `course_registrations` ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`), ADD KEY `course_id` (`course_id`);
ALTER TABLE `user_progress` ADD KEY `user_id` (`user_id`);

ALTER TABLE `course_registrations` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;
