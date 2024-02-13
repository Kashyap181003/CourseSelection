-- Create table for course_registrations
CREATE TABLE IF NOT EXISTS course_registrations (
  id INTEGER PRIMARY KEY,
  username TEXT,
  course_id TEXT,
  status TEXT DEFAULT 'in_progress',
  credits_earned INTEGER DEFAULT 0
);

-- Insert data into course_registrations
INSERT INTO course_registrations (id, username, course_id, status, credits_earned) VALUES
(1, 'patelj17', 'CSIT101', 'in_progress', 0),
(2, 'patelj17', 'CSIT107', 'in_progress', 0),
(3, 'patelj17', 'CSIT119', 'in_progress', 0),
(4, 'patelj17', 'CSIT104', 'in_progress', 0),
(5, 'shank6', 'CSIT103', 'in_progress', 0);

-- Create indexes
CREATE INDEX IF NOT EXISTS idx_username ON course_registrations (username);
CREATE INDEX IF NOT EXISTS idx_course_id ON course_registrations (course_id);

SELECT * FROM course_registrations;