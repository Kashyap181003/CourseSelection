CREATE TABLE `user_progress` (
  `user_id` int(11) DEFAULT NULL,
  `total_credits_earned` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `user_progress`
  ADD KEY `user_id` (`user_id`);
COMMIT;
