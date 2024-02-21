
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `interested_topics` text,
  `application_description` text,
  `courses_completed` text,
  `credits_earned` int(11) DEFAULT NULL,
  `demographics` text,
  `feedback` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `address`, `interested_topics`, `application_description`, `courses_completed`, `credits_earned`, `demographics`, `feedback`) VALUES
(1, 'ADMIN', 'ADMIN123', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'shank6', 'Montclair_18', 'user', 'Kashyap Shah', ' 1 normal ave', 'english', NULL, '5', 30, '0', ''),
(9, 'patelj17', 'Karamsad*213', 'user', 'Jay Patel', '43 Spruce st', 'Computer Science', NULL, '40', 126, '0', '');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
