CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('user','admin') DEFAULT 'user',
  `name` VARCHAR(255) DEFAULT NULL,
  `address` TEXT,
  `interested_topics` TEXT,
  `application_description` TEXT,
  `courses_completed` TEXT,
  `credits_earned` INT DEFAULT NULL,
  `demographics` TEXT,
  `feedback` TEXT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `address`, `interested_topics`, `application_description`, `courses_completed`, `credits_earned`, `demographics`, `feedback`) VALUES
(1, 'ADMIN', 'ADMIN123', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 'shank6', 'Montclair_18', 'user', 'Kashyap Shah', '1 Normal Ave', 'English', NULL, '5', 30, '0', ''),
(9, 'patelj17', 'Karamsad*213', 'user', 'Jay Patel', '43 Spruce St', 'Computer Science', NULL, '40', 126, '0', '');

ALTER TABLE `users`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;

COMMIT;
